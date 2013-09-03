/* TechScoopr.com - Tyler Normile
 * 
 */
data = '';
defurl = "http://techscoopr.com/frontpage/outputAjax";
default_image = "http://techscoopr.com/assets/img/techscoopr.png";
path = window.location.pathname.split( '/' );
myurl = defurl;
index = 0;
seen = [];
layoutNumber = 1;
shareUrl = "";
loadCount = 12;

$(document).ready(function()
{  
    /* Check window width on load, alter initial loadCount accordingly
      * to force a full frame of content to display
      */
    var w_w = $(window).width();
    if( w_w >= 1900 ) 
        loadCount = 25;
    else if( w_w >= 1600 ) 
        loadCount = 20;
     
     
    /* user login */
    $(".userfancy").fancybox({
        type : 'iframe',
        scrolling : 'no',
        height : 400,
        width : 450,
        fitToView : false,
        autoSize : false
         
    });
     
    /* news viewer */
    $(".fancybox")
    .attr('rel', 'news')
    .fancybox({
        type : 'iframe',
        scrolling : 'no',
        fitToView : false,
        autoSize : false,
        height : 600,
        width : 600,
        beforeShow : function() {
            shareUrl = "http://techscoopr.com/n/index/";
            shareUrl += $(this.element).attr("value");
            saveValue = $(this.element).attr("value");
                
            this.title += '<br /><hr class="hr-dark">';
                
            // Add tweet button
            this.title += '<a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-url="'+ shareUrl +'">Tweet</a> ';
                
            // Add FaceBook like button
            this.title += '<iframe src="//www.facebook.com/plugins/like.php?href=' + this.href + '&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:23px;" allowTransparency="true"></iframe>';

            // Add save story button
            this.title += '<div id="fancy-save"><a class="star-button" value="'+ saveValue +'" href="#"><i class="icon-ok-sign icon-white thumb-button"></i> Save</a></div>';
        },
        afterShow: function() {
            // Render tweet button
            twttr.widgets.load();
            fancyboxSaveButton();
        },
        helpers : {
            title : {
                type: 'inside'
            }
        }  
         
    });
     
    /* save button news viwer modal */
    function fancyboxSaveButton(){
        $("#fancy-save").on('click', 'a.star-button', function() {
            if ($(this).hasClass("saved"))
            {
                $(this).children('i.thumb-button').removeClass("icon-remove-sign");
                $(this).removeClass("saved");
                $(this).children('i.thumb-button').addClass("icon-ok-sign");
                this.childNodes[1].nodeValue = " Save";
            }
            else
            {
                $(this).children('i.thumb-button').removeClass("icon-ok-sign");
                $(this).children('i.thumb-button').addClass("icon-remove-sign");
                $(this).addClass("saved");
                this.childNodes[1].nodeValue = " Saved";
            } 
                    
            var newsId = $(this).attr("value"); 
            var save_url = "frontpage/ajaxSave";
            $.ajax({  
                type: "POST",  
                url: save_url,  
                data: {
                    id: newsId
                },  
                success: function(output_string) {
                    if (output_string == 'No'){
                    
                        loginPop();
                    }
                }  
            });
            return false;
        });
    
        /* User must login to perform action */
        function loginPop() {
            $.fancybox.open([
            {
                href : 'auth/login'
            }
        
            ], {
                type : 'iframe',
                scrolling : 'no',
                height : 400,
                width : 450,
                fitToView : false,
                autoSize : false,
                afterLoad   : function() {
                    this.inner.prepend( '<h4 class="login-error">You must be logged in to do that!</h4>' );
                }

            }
            )
        }
    }
     
     activeNav();
     


    // check for window scroll and load new data
    $(window).scroll(function () {
        
        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 5) 
        {
            fillData(12);
        }
    });
    
    /****** CHECKS FOR ITEM HOVER, ADDS CLASS AND DISPLAYS ITEM DESCRIPTION *******/                
    var pause_area = $(".masonry");
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
                
    /*** sets json data url for sidebar links - QUICK TEST ***/
    $('#tag-latest').click(function() {
        myurl = "http://techscoopr.com/frontpage/outputAjax";
        startData();
    });
    $('#tag-apple').click(function() {
        myurl = "http://techscoopr.com/tag/apple";
        startData();
    });
    $('#tag-google').click(function() {
        myurl = "http://techscoopr.com/tag/google";
        startData();
    });
    $('#tag-microsoft').click(function() {
        myurl = "http://techscoopr.com/tag/microsoft";
        startData();
    });
    $('#tag-facebook').click(function() {
        myurl = "http://techscoopr.com/tag/facebook";
        startData();
    });
    $('#tag-mashable').click(function() {
        myurl = "http://techscoopr.com/tag/mashable";
        startData();
    });
    $('#tag-gizmodo').click(function() {
        myurl = "http://techscoopr.com/tag/gizmodo";
        startData();
    });
    $('#tag-gigaom').click(function() {
        myurl = "http://techscoopr.com/tag/gigaom";
        startData();
    });
    $('#tag-techcrunch').click(function() {
        myurl = "http://techscoopr.com/tag/techcrunch";
        startData();
    });
    $('#tag-digitaltrends').click(function() {
        myurl = "http://techscoopr.com/tag/digitaltrends";
        startData();
    });
    $('#tag-slashgear').click(function() {
        myurl = "http://techscoopr.com/tag/slashgear";
        startData();
    });  
    $('#tag-venturebeat').click(function() {
        myurl = "http://techscoopr.com/tag/venturebeat";
        startData();
    });
    $('#tag-geek').click(function() {
        myurl = "http://techscoopr.com/tag/geek";
        startData();
    });
    $('#tag-engadget').click(function() {
        myurl = "http://techscoopr.com/tag/engadget";
        startData();
    });
    $('#tag-wired').click(function() {
        myurl = "http://techscoopr.com/tag/wired";
        startData();
    });  
       
    /****** sets active and inactive class for sidebar nav links ******/
    $('.links li a').on('click', function() {
        $(this).parent().parent().find('.active').removeClass('active');
        $(this).parent().addClass('active');
    });

    startData();
    
    /**** fetches json data after new url is set ****/    
    function startData() {
    
        $.getJSON(myurl, function (JSON) {
            data = JSON;
            setLayout(loadCount);
        });

    }
    /* masonry config */
    $('#mason-container').masonry({
        itemSelector: '.item',
        columnWidth: function( containerWidth ){
            return containerWidth / 3;
        },
        isAnimated: true
    }).imagesLoaded(function() { 
        $('#mason-container').masonry('reload');
    });

});// end ready

/*** Generate random id for news index ***/
function randomId() {
    var rid = Math.floor(Math.random() * data.results.length);
    if (seen.length == data.results.length) 
    { 
        seen.length = 0;
    }
    if ($.inArray(rid, seen) == -1) 
    {
        seen.push(rid);
        return rid;
    } else 
        {   
            return randomId();
        }
}


/******** SET LAYOUT AND FILL INITIAL ITEMS ***********/
function setLayout(num) {
    $("#mason-container").empty();
    for (var i = 0 ; i < num; i++) // starts index at random number and progresses to set layout number
    {
        var rid = randomId();
        var news_id = data.results[rid].id;
        var news_link = data.results[rid].Link;
        var news_title = data.results[rid].Title;
        var news_description = data.results[rid].Description;
        var news_image = data.results[rid].Image;
        var news_date = data.results[rid].PubDate;
        var news_source = data.results[rid].Source;
    
        // super fallback image
        if (news_image == '')
        {
            news_image = default_image;
        }
        $("#mason-container").append('<div id="news" class="item box"><img onload="this.style.opacity=1;" class="art-image image-fade" src="' + news_image + '"><div class="img-overlay"><p class="item-title">' + news_title + '</p></div><div class="news-hover"><a title="" id="news" rel="news" class="fancybox fancybox.iframe news-link" href="' + news_link + '"target="_blank" value="' + news_id + '"><p class="art-description">' + news_description + '</p></a><div class="news-actions"><a class="star-button" value="'+ news_id +'" href="#"><i class="icon-ok-sign icon-white thumb-button"></i> Save</a></div></div></div>');                 
    }
}

/******** FILL MORE NEWS ITEMS ***********/
function fillData(num) {
    for (var i = 0 ; i < num; i++) // starts index at random number and progresses to set layout number
    {
        var rid = randomId();
        var news_id = data.results[rid].id;
        var news_link = data.results[rid].Link;
        var news_title = data.results[rid].Title;
        var news_description = data.results[rid].Description;
        var news_image = data.results[rid].Image;
        var news_date = data.results[rid].PubDate;
        var news_source = data.results[rid].Source;
    
        if (news_image == '')
        {
            news_image = default_image;
        }   
        $("#mason-container").append('<div id="news" class="item box"><img onload="this.style.opacity=1;" class="art-image image-fade" src="' + news_image + '"><div class="img-overlay"><p class="item-title">' + news_title + '</p></div><div class="news-hover"><a title="" id="news" rel="news" class="fancybox fancybox.iframe news-link" href="' + news_link + '"target="_blank" value="' + news_id + '"><p class="art-description">' + news_description + '</p></a><div class="news-actions"><a class="star-button" href="#" value="'+ news_id +'"><i class="icon-ok-sign icon-white thumb-button"></i> Save</a></div></div></div>');                
    }
}

function activeNav() {
  function stripSlash(str) {
    if(str.substr(-1) == '/') {
      return str.substr(0, str.length - 1);
    }
    return str;
  }

  var url = window.location.pathname;  
  var activePage = stripSlash(url);

  $('.top-nav li a').each(function(){  
    var currentPage = stripSlash($(this).attr('href'));

    if (activePage == currentPage) {
      $(this).addClass('nav-link-active'); 
    } 
  });
};

