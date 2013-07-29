/* Tyler Normile - TechScoopr.com
 * mynews.js 
*/

data = '';
defurl = "mynews/savedNews";
myurl = defurl;
index = 0;
seen = [];
reader_url = "";

$(document).ready(function()
 {  
     String.prototype.trunc = 
      function(n){
          return this.substr(0,n-1)+(this.length>n?'&hellip;':'');
      };
      
     getSavedNews()


      /****** CHECKS FOR ITEM HOVER, ADDS CLASS AND DISPLAYS ITEM DESCRIPTION *******/                
     var pause_area = $(".main-news-container");
     pause_area.on( 
     {   
         mouseenter: function() 
         {
             $(this).find(".news-hover").slideDown( 150 ); // ( speed value ) Lower is faster 
             $(this).find(".art-image").slideUp( 150 );
         }, 
         mouseleave: function() 
         {
             $(this).find(".news-hover").slideUp( 150 );
             $(this).find(".art-image").slideDown( 150 );
         }
     }, ".item");         
     
     
     $("#main-news-container").on('click', 'a.star-button', function() {
         var newsId = $(this).attr("value"); 
         var save_url = "frontpage/ajaxSave";
         var item = $('#main-news-container').find('#news').attr('value', newsId);
         $.ajax({  
            type: "POST",  
            url: save_url,  
            data: {id: newsId},  
            success: function(output_string) {
                if (output_string == 'No'){
                    
                    loginPop();
                }
                else
                    {
                        $('#main-news-container').masonry( 'remove', item );
                    }
            }  
        });
        return false;
     });

function getSavedNews() {
    $.getJSON(myurl, function (JSON) 
        { 
            data = JSON;
            num = data.length;
            if (data == "Error"){
                 noSavedNews();
            }
            else
                {
                    setLayout(num);
                }
        });
}

$('#main-news-container').masonry({
    itemSelector: '.item',
        columnWidth: function( containerWidth ){
            return containerWidth / 3;
            },
            isAnimated: true
    }).imagesLoaded(function() { 
        $('#main-news-container').masonry('reload');
        });

    $("#main-news-container").on("click","#news", function(){
            reader_url = $(this).find('.link').text();
            $('#news-reader').find('.frame').attr('src', reader_url);
    });

});

 
/**** Set Initial layout of news items ****/
function setLayout(num) {
    $("main-news-container").empty();
    for (var i = 0 ; i < num; i++) // starts index at random number and progresses to set layout number
    {
        var news_id = data[i].id;
        var news_link = data[i].Link;
        var news_title = data[i].Title;
        var news_description = data[i].Description;
        news_description = news_description.trunc(270);
        var news_image = data[i].Image;
        var news_date = data[i].PubDate;
        var news_source = data[i].Source;
    
	// super fallback image
        if (news_image == '')
            {
                news_image = "<?php echo base_url('assets/img/techscoopr.png')?>";
            }
        
        $("#main-news-container").append('<div id="news" value="' + news_id + '" class="item box"><img class="art-image" src="' + news_image + '"><p class="link">'+ news_link + '</p><div class="img-overlay"><p class="item-title">' + news_title + '</p></div><div class="news-hover"><a class="news-link" href="' + news_link + '"target="_blank"><p class="art-description">' + news_description + '</p></a><div class="news-actions"><a class="star-button" value="'+ news_id +'" href="#"><i class="icon-remove-sign icon-white thumb-button"></i> Remove</a></div></div></div>');
                console.log(i);                  
    }
}

function noSavedNews() {
    $("#main-news-container").append('<h4 style="color:white; text-align:center;">You dont have any saved news!</h4>');
}
