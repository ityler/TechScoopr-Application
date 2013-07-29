// GLOBAL VARS
data = '';
myurl = '../TechScoopr-Application/ajax.json';
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
     $.getJSON(myurl, function (JSON) { data = JSON; setLayout(15); });

    
  $(function(){
    
    var $container = $('#mason-container');
    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: '.box',
          columnWidth: 100,
          gutterWidth: 3,
          isFitWidth: true,
          isAnimated: true,
          animationOptions: {
            duration: 150
          }
      });
    });
  });
                
/****** CHECKS FOR ITEM HOVER, ADDS CLASS AND DISPLAYS ITEM DESCRIPTION *******/                
               
               // Flips article image and description on mouseover
                var pause_area_JQ = $(".pause_area");
                pause_area_JQ.on( 
                {   mouseenter: function() 
                    {
                        // Hover in
                        //if (!$(this).hasClass("loading-article"))
                            $(this).addClass("mouse-inside-article");
                
                        $(this).find(".art-details").slideDown( 150 ); // ( speed value ) Lower is faster 
                        $(this).find(".img-cont").slideUp( 150 );
                    }, 
                    mouseleave: function() 
                    {
                        // hover out
                       // if (!$(this).hasClass("loading-article"))
                            $(this).removeClass("mouse-inside-article");
                
                        $(this).find(".art-details").slideUp( 150 );
                        $(this).find(".img-cont").slideDown( 150 );
                    }
                }, ".item"); 
});

/******** SET LAYOUT AND FILL INITIAL ITEMS ***********/
function setLayout(num) {
    $("#mason-container").empty();
    var randomNumber=Math.floor(Math.random()*401) //returns random number between 0 and 400
    index = randomNumber;
    var contentNum = 0;
    
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
          contentNum ++; // first item starts with value of 1
        
        $("#mason-container").append('<div id="news'+contentNum+'"class="item box">\
            <img src="' + news_image + '"/><div class="img-overlay">\
                          <p class="item-title">' + news_title + '</p>\
                        </div></div>');
                           
    }
    index += num; // same as (index = index + num)
}

/***************** Reload of news items *******************/
function reloadNews() {
    var newsItemTotal = $('div.item').length; // Total number of news items pre loaded
    var randomNumber=Math.floor(Math.random()*401)
    var imageFix = "<?php echo base_url('imagefix/thumb.php/?src=') ?>";
    index = randomNumber; // Gets random JSON item index 
     
    if (layoutNumber > newsItemTotal)
    {
        layoutNumber = 0;
    }   
    if ($('#news'+layoutNumber).hasClass("mouse-inside-article")) // skips item if hover is in use
    { 
        layoutNumber ++;
    }     
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
                
                $('#news'+layoutNumber).hide().html('<div id="news-wrap"><span class="news-id">'+ news_id + '</span><div id="title-container"><p class="art-title"><a href="'
                                    + news_link + '" target="_blank">'
                                    + news_title + '</a></p></div><div class="art-details">'
                                    + news_description + '<a class="more_link" href="'+ news_link +'"target="_blank"> ...More</a><div class="art-info"><p>'
                                    + news_date + 'Source: '
                                    + news_source + '</p></div></div><div class="img-cont"><img class="art-thumb" src="' + imageFix  
                                    + news_image + '&q=90&w=290&h=250"></div></div>').fadeIn("50");

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
