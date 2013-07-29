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
           <li><a class="nav-link-active" href="<?php echo base_url();?>"><i class="icon-home icon-white"></i> Home</a></li>
           <li><a href="<?php echo base_url('/stream');?>"><i class="icon-play-circle icon-white"></i> Stream</a></li>
           <?php if ($this->tank_auth->is_logged_in()){
               echo "<li><a href='".base_url('/mynews')."'><i class=icon-inbox icon-white></i> My News</a></li>";
           }?>
           <li><a href="#about"><i class="icon-info-sign icon-white"></i> About</a></li>
         </ul>
       </div><!--/.nav-collapse -->
    </div><!--/container-fluid -->
   </div><!--/navbar-inner -->
</div><!--/navbar -->
   <div id="the-sidebar" class="the-sidebar">
     <div id="sidebar-span">
       <div class="well sidebar-nav sidebar-nav-fixed">
         <ul class="nav links nav-list">
           <li class="nav-header"><i class="icon-filter icon-white"></i> Filters</li>
           <li><a id="tag-latest" href="#latest">Latest</a></li>
           <li><a id="tag-popular" href="#popular">Popular</a></li>
           <li class="nav-header"><i class="icon-tags icon-white"></i> Tags</li>
           <li><a id="tag-apple" href="#apple">Apple</a></li>
           <li><a id="tag-google" href="#google">Google</a></li>
           <li><a id="tag-microsoft" href="#microsoft">Microsoft</a></li>
           <li><a id="tag-facebook" href="#facebook">Facebook</a></li>
           <li class="nav-header"><i class="icon-globe icon-white"></i> Sources</li>
           <li><a id="tag-engadget" href="#Engadget">Engadget</a></li>           
           <li><a id="tag-mashable" href="#mashable">Mashable</a></li>
           <li><a id="tag-wired" href="#wired">Wired</a></li>
           <li><a id="tag-techcrunch" href="#techcrunch">TechCrunch</a></li>
           <li><a id="tag-geek" href="#geek">Geek</a></li>
           <li><a id="tag-gizmodo" href="#gizmodo">Gizmodo</a></li>
           <li><a id="tag-venturebeat" href="#venturebeat">VentureBeat</a></li>
           <li><a id="tag-gigaom" href="#gigaom">GigaOm</a></li>
           <li><a id="tag-digitaltrends" href="#digitaltrends">Digital Trends</a></li>
           <li><a id="tag-slashgear" href="#slashgear">SlashGear</a></li>
         </ul> 
       </div><!--/.well -->
     </div><!--/sidebar-span -->
     </div><!--/the-sidebar-->
     <div id="sidebar_shadow"></div>
     <div id="container-set" class="container-fluid container-set">
   <div class="row-fluid">
     <div class="span12 news-container">
        <div class="row-fluid">
         <div id="mason-container" class="masonry">
                     
         </div>
       </div><!--/row-fluid-->
        </div><!--/span12-->        
       </div><!--/row-fluid-->
     </div>
       
