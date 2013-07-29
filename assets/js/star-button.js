$(document).ready(function()
 {  

$("#mason-container").on('click', 'a.star-button', function() {
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
            data: {id: newsId},  
            success: function(output_string) {
                if (output_string == 'No'){
                    
                    loginPop();
                }
            }  
        });
        return false;
    });
    
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
)};








});

