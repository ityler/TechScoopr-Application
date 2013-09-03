<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="TechScoopr - Looking to get the scoop on the latest technology related news? TechScoopr gathers the news for you, so you don't have to.">
   <meta name="keywords" content="TechScoopr, techscoopr.com, scoop, Tech News, tech, Tyler Normile, Normile">
   <meta name="author" content="Tyler Normile - @Tyler_N">
   
   <title>TechScoopr - Home</title>

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
   <script src="http://platform.twitter.com/widgets.js"></script>
   <script src="<?php echo base_url('assets/js/tyler.js')?>"></script>
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
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top" style="position:fixed;">
   <div class="navbar-inner">
     <div class="container-fluid">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="<?php echo base_url();?>">TechScoopr</a>
       <div class="btn-group pull-right" style="padding-right:10px;">
         <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
           <i class="icon-user"> <?php echo $username; ?></i>
           <span class="caret"></span>
         </a>
         <ul class="dropdown-menu">
             <?php if (!$this->tank_auth->is_logged_in()) { echo "<li><a class='userfancy fancybox.iframe' href='auth/login#'>Sign In</a></li>"; }?>
           <?php if ($this->tank_auth->is_logged_in()) {
               echo "<li><a href='".base_url('/mynews')."'>My News</a></li>";
               echo "<li class='divider'></li>";
               echo "<li><a href='".base_url('/auth/logout')."'>Sign Out</a></li>";
               }?>
         </ul>
       </div>
       <div class="nav-collapse">
         <ul class="nav top-nav">
           <li><a class="" href="<?php echo base_url();?>"><i class="icon-home icon-white"></i> Home</a></li>
           <li><a class="" href="<?php echo base_url('/stream');?>"><i class="icon-play-circle icon-white"></i> Stream</a></li>
           <?php if ($this->tank_auth->is_logged_in()){
               echo "<li><a class='' href='".base_url('/mynews')."'><i class=icon-inbox icon-white></i> My News</a></li>";
           }?>
           <li><a class="" href="#about"><i class="icon-info-sign icon-white"></i> About</a></li>
         </ul>
       </div><!--/.nav-collapse -->
    </div><!--/container-fluid -->
   </div><!--/navbar-inner -->
</div><!--/navbar -->