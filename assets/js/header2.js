// GLOBAL VARS
data = '';
myurl = 'frontpage/outputAjax';
index = 0;
arrUsed = [];
layoutNumber = 1;

var DEFAULT_INTERVAL = 5000;
var START_INTERVAL = 300;
var refreshIntervalId = null;
var reload_interval = START_INTERVAL; // 1000 = 1 second, default = 2500, start = 600
var saved_interval = reload_interval;


$(document).ready(function()
{        
     $.getJSON(myurl, function (JSON) { data = JSON; setLayout(30); });

    $('#mason-container').masonry({
            itemSelector: '.item',
            isAnimated: !Modernizr.csstransitions,
            columnWidth: function( containerWidth ){
                return containerWidth / 3;
            }
        }).imagesLoaded(function() { 
            $('#mason-container').masonry('reload');
        });
            
    });

/******** SET LAYOUT AND FILL INITIAL ITEMS ***********/
function setLayout(num) {
    $("#mason-container").empty();
    var randomNumber=Math.floor(Math.random()*401) //returns random number between 0 and 400
    index = randomNumber;
    
    for (var i = index ; i < index + num; i++) // starts index at random number and progresses to set layout number
    {
        var news_id = data.results[i].id;
        var news_link = data.results[i].Link;
        var news_title = data.results[i].Title;
        var news_description = data.results[i].Description;
        var news_image = data.results[i].Image;
        var news_date = data.results[i].PubDate;
        var news_source = data.results[i].Source;
    
	if (news_image == '')
            {
                news_image = "<?php echo base_url('assets/img/techscoopr.png')?>";
            }
    
          arrUsed.push(news_id); // adds each items output to array
        
        $("#mason-container").append('<div id="news" class="item box" onclick="location.href=' + news_link + '" target="_blank">\
            <img src="' + news_image + '"/><div class="img-overlay">\
                          <p class="item-title">' + news_title + '</p></div></div>');
                           
    }
    index += num; // same as (index = index + num)
    
}

function reloadNews() {
    var newsItemTotal = $('div.item').length; // Total number of news items pre loaded
    var randomNumber=Math.floor(Math.random()*401)
    var imageFix = "<?php echo base_url('imagefix/thumb.php/?src=') ?>";
    index = randomNumber; // Gets random JSON item index 

 var news_id = data.results[index].id;
                var news_link = data.results[index].Link;
                var news_title = data.results[index].Title;
                var news_description = data.results[index].Description;
                var news_image = data.results[index].Image;
                var news_date = data.results[index].PubDate;
                var news_source = data.results[index].Source;
            
        if (news_image == '')
            {
                    news_image = "<?php echo base_url('assets/img/techscoopr.png')?>";
                }
 
                arrUsed.push(index);
                
                $("#mason-container").append('<div id="news" class="item box">\
            <img src="' + news_image + '"/><div class="img-overlay">\
                          <p class="item-title">' + news_title + '</p></div></div>');

            layoutNumber ++;


        }
 

/**** Stop refreshing of articles in layout ****/
function stopReload() {
    clearInterval(DEFAULT_INTERVAL);
}

/**** Start refreshing of articles in layout ****/
function startReload() {
    window.setInterval(function(){
        reloadNews();
    }, DEFAULT_INTERVAL);
}
