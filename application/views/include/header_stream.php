<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="TechScoopr - Stream - Looking to get the scoop on the latest technology related news? TechScoopr gathers the news for you, so you don't have to.">
   <meta name="keywords" content="TechScoopr, techscoopr.com, stream, scoop, Tech News, tech, Tyler Normile, Normile, stream, tech stream">
   <meta name="author" content="Tyler Normile - @Tyler_N">
   
   <title>TechScoopr - Stream</title>

   <link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css')?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/custom-default.css')?>" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo base_url('assets/fancybox/source/jquery.fancybox.css')?>" type="text/css" media="screen" />
   <link rel="stylesheet" href="<?php echo base_url('assets/fancybox/source/helpers/jquery.fancybox-buttons.css')?>" type="text/css" media="screen" />
   <link rel="stylesheet" href="<?php echo base_url('assets/fancybox/source/helpers/jquery.fancybox-thumbs.css')?>" type="text/css" media="screen" />
   
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
   <script src="<?php echo base_url('assets/js/modernizr-transitions.js')?>"></script>
   <script src="<?php echo base_url('assets/js/masonry.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/fancybox/source/jquery.fancybox.pack.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/fancybox/source/helpers/jquery.fancybox-buttons.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/fancybox/source/helpers/jquery.fancybox-media.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/fancybox/source/helpers/jquery.fancybox-thumbs.js')?>"></script>
   <script src="<?php echo base_url('assets/js/login-form.js') ?>"></script> 
   <script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37368569-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script> 
<style>
#mason-content {
	margin: 0 auto;
        width: auto;
}
.item {
	float:left;
        height: 300px;
        width: 300px;
        border: -1px #0099cc solid;
        margin: 10px;
        padding: 10px;
        left: 10px;
        background-color: #333333;
         webkit-border-radius: 5px;
         -moz-border-radius: 5px;
         border-radius: 5px;
         -webkit-transition: left .4s ease-in-out, top .4s ease-in-out .4s;
         -moz-transition: left .4s ease-in-out, top .4s ease-in-out .4s;
         -ms-transition: left .4s ease-in-out, top .4s ease-in-out .4s;
         -o-transition: left .4s ease-in-out, top .4s ease-in-out .4s;
         transition: left .4s ease-in-out, top .4s ease-in-out .4s;
}
.item:hover {
        border: 0px #0099cc solid;
        -moz-box-shadow: 0 0 1em #888;
        -webkit-box-shadow: 0 0 1em #888;
	box-shadow: 0 0 1em #888;
}
.art-details {
	display: none;
        font-size: 14px;
	position: relative;
	padding: 4px;
        color: #FFF;
}
#title-container{
    	height: 40px;
	overflow: hidden;
}
.art-title {
	font-size: 16px;
}
.art-title a {
	color: white;
}
.art-title a:hover {
	color: #33B5E5;
}
.art-thumb {
    margin: 0 auto;
}
.img-cont {
        margin: 0 auto;
	margin-top: 5px;
}
.art-info {
	display: none;
}
.mouse-inside-article {
                
}
.news-id {
        display: none;
}
.art-info {
        padding-top: 20px;
        clear: both;
        height: 10px;
        position: relative;
        bottom: 0;
}
.ribbon {
        background-color: #a00;
        overflow: hidden;
        /* top left corner */
        position: absolute;
        left: -2.2em;
        top: .8em;
        width: 132px;
        /* 45 deg ccw rotation */
        -moz-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        /* shadow */
        -moz-box-shadow: 0 0 1em #888;
        -webkit-box-shadow: 0 0 1em #888;
}
.ribbon p {
        border: 1px solid #faa;
        color: #fff;
        display: block;
        font: bold 95.25% 'Helvetiva Neue', Helvetica, Arial, sans-serif;
        margin: 0.05em 0 0.075em 0;
        padding: 0.6em 3.5em;
        text-align: center;
        text-decoration: none;
        /* shadow */
        text-shadow: 0 0 0.5em #444;
}      
#beta-ribbon {
    -moz-animation-duration: 3s;
    -moz-animation-delay: 1s;
    -moz-animation-iteration-count: 1;
    -webkit-animation-duration: 3s;
    -webkit-animation-delay: 1s;
    -webkit-animation-iteration-count: 1;
}
#beta-ribbon:hover {
	cursor: pointer;
}
.social-container {
        margin-left: 30px;
        margin-top: 28px;
}
.social-container a img:hover{
        -moz-box-shadow: 0 0 1em #888;
        -webkit-box-shadow: 0 0 1em #888;
}
.links a {
        margin-right:50px;
        color:white;
}
.links a:hover {
        color: #33B5E5;
}
#start-stop {
    -moz-animation-duration: 2s;
    -moz-animation-delay: 8s;
    -moz-animation-iteration-count: infinite;
    -webkit-animation-duration: 2s;
    -webkit-animation-delay: 8s;
    -webkit-animation-iteration-count: infinite;
}
#start-stop:hover {
    	-moz-box-shadow: 0 0 2em #FFF;
        -webkit-box-shadow: 0 0 2em #FFF;
}
#status {
    -moz-animation-duration: 2s;
    -moz-animation-delay: 1s;
    -moz-animation-iteration-count: 1;
    -webkit-animation-duration: 2s;
    -webkit-animation-delay: 1s;
    -webkit-animation-iteration-count: 1;
}

hr {
    border-top: 1px solid rgba(226, 226, 226, 0.72);
    border-bottom: none;
    margin: 5px;
}

</style>  
</head>
    <body>     
<script type="text/javascript" language="Javascript">
data = '';
myurl = '<?php echo base_url('/stream/outputAjax')?>';
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
    $.getJSON(myurl, function (JSON) { data = JSON; setLayout(12); });
    
    
/* configures initial masonry layout */
    $('#mason-container').masonry({
                    itemSelector: '.item',
                    isAnimated: !Modernizr.csstransitions,
                    // isFitWidth: true, (Throwing undefined error, disabled for now...)
                    columnWidth: function( containerWidth ){
                        return containerWidth / 4;
                    }
                }).imagesLoaded(function() {
                    $('#mason-container').masonry('reload');
                });
                
$('#start-stop').click(function() { toggle_speed_display(); });
/* checks for item hover and displays description under action */                
               
               // Flips article image and description on mouseover
                var pause_area_JQ = $("#mason-container");
                pause_area_JQ.on( 
                {   mouseenter: function() 
                    {
                            $(this).addClass("mouse-inside-article");
                
                        $(this).find(".art-details").slideDown( 150 ); // ( speed value )
                        $(this).find(".img-cont").slideUp( 150 );
                    }, 
                    mouseleave: function() 
                    {
                            $(this).removeClass("mouse-inside-article");
                
                        $(this).find(".art-details").slideUp( 150 );
                        $(this).find(".img-cont").slideDown( 150 );
                    }
                }, ".item"); 
                
                refreshIntervalId = setInterval(reloadNews, DEFAULT_INTERVAL);

/* handles pause and start functionality */
function toggle_speed_display() {
	if ($('#start-stop').hasClass("stop"))
	{
		$(".anchor").toggleClass("stop").addClass("paused-stop").html("<i class='icon-play icon-white'></i>");
		$(".speed_status").html("<span style='font-size:19px;color:#2FA4E7;margin-left:4px;'><b>Paused</b></span>");
		$('#status').removeClass('bounce');
            	$('#status').removeClass('wobble');
            	$('#status').addClass('shake');
		DEFAULT_INTERVAL = 1000000;
		clearInterval(refreshIntervalId);
		$("#start-stop").addClass('animate flash');
	}
	else if ($('#start-stop').hasClass("paused-stop"))
	{
		$(".anchor").toggleClass("paused-stop").addClass("stop").html("<i class='icon-pause icon-white'></i>");
		$(".speed_status").html("<span style='font-size:19px;color:#2FA4E7;margin-left:4px;'><b>Playing</b></span>");
		$('#status').removeClass('shake');
            	$('#status').removeClass('bounce');
            	$('#status').addClass('wobble');
		DEFAULT_INTERVAL = 5000;
                refreshIntervalId = setInterval(reloadNews, DEFAULT_INTERVAL);
		$("#start-stop").removeClass('animate flash');
	}
}                

$('#mason-container').click(function() {
    if ($('#start-stop').hasClass("stop"))
        {
            toggle_speed_display();
        }
        else
            {
            $('#start-stop').addClass("stop");
            toggle_speed_display();
            }
 });                
});

/* wireframe layout and fill initial load news items */
function setLayout(num) {
    $("#mason-container").empty();
    var randomNumber=Math.floor(Math.random()*401) //returns random number
    var imageFix = "<?php echo base_url('imagefix/thumb.php/?src=') ?>";
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
        
        $("#mason-container").append('<div id="news'+contentNum+'"class="item well' + ' loading-article"><div id="news-wrap"><span class="news-id">'+ news_id + '</span><div id="title-container"><p class="art-title"><a href="'
                                    + news_link + '" target="_blank">'
                                    + news_title + '</a></p></div><div class="art-details"><hr>'
                                    + news_description + '<a class="more_link" href="'+ news_link +'"target="_blank"> ...More</a><div class="art-info"><p>'
                                    + news_date + 'Source: '
                                    + news_source + '</p></div></div><div class="img-cont"><img class="art-thumb" src="'
                                    + news_image + '"></div></div>');
                           
    }
    index += num;
    
}

/* refreshing of news items */
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
                                    + news_title + '</a></p></div><div class="art-details"><hr>'
                                    + news_description + '<a class="more_link" href="'+ news_link +'"target="_blank"> ...More</a><div class="art-info"><p>'
                                    + news_date + 'Source: '
                                    + news_source + '</p></div></div><div class="img-cont"><img class="art-thumb" src="'
                                    + news_image + '"></div></div>').fadeIn("50");

            layoutNumber ++;
   
} 

/* Stop refreshing of articles in layout */
function stopReload() {
    clearInterval(DEFAULT_INTERVAL);
}

/* Start refreshing of articles in layout */
function startReload() {
    window.setInterval(function(){
        reloadNews();
    }, DEFAULT_INTERVAL);
}
</script>
