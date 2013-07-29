$(document).ready(function()
 {  
    $.getJSON(news_url, function (JSON) { news_data = JSON; newsPop(); });
    
    
    $(".newsfancybox")
         .attr('rel', 'news')
         .fancybox({
         type : 'iframe',
         scrolling : 'no',
         fitToView : false,
         autoSize : false,
         height : 600,
         width : 600,
         beforeShow : function() {
                this.title += '<br />';
                
                // Add tweet button
                this.title += '<a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-url="' + this.href + '">Tweet</a> ';
                
                // Add FaceBook like button
                this.title += '<iframe src="//www.facebook.com/plugins/like.php?href=' + this.href + '&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:23px;" allowTransparency="true"></iframe>';

        },
         afterShow: function() {
            // Render tweet button
            twttr.widgets.load();
        },
        helpers : {
            title : {
                type: 'inside'
            }
        }  
         
     });
    
    
    
    
 });
