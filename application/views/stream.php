<div class="navbar navbar-inverse navbar-fixed-top" style="position:fixed;"><!--position:fixed; counters media query with smaller displays-->
   <div class="navbar-inner">
     <div class="container-fluid">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="#">TechScoopr</a>
       <div class="btn-group pull-right" style="padding-right:5px;">
         <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
           <i class="icon-user"> <?php echo $username; ?></i>
           <span class="caret"></span>
         </a>
         <ul class="dropdown-menu">
             <?php if (!$this->tank_auth->is_logged_in()){echo "<li><a class='userfancy fancybox.iframe' href='auth/login#'>Sign In</a></li>";}?>
           <?php if ($this->tank_auth->is_logged_in()){
               echo "<li><a href='#'>My News</a></li>";
               echo "<li class='divider'></li>";
               echo "<li><a href='".base_url('/auth/logout')."'>Sign Out</a></li>";
               }?>
         </ul>
       </div>
       <div class="nav-collapse">
         <ul class="nav">
           <li><a href="<?php echo base_url();?>"><i class="icon-home icon-white"></i> Home</a></li>
           <li><a class="nav-link-active" href="<?php echo base_url('/stream');?>"><i class="icon-play-circle icon-white"></i> Stream</a></li>
            <?php if ($this->tank_auth->is_logged_in()){
               echo "<li><a href='".base_url('/mynews')."'><i class=icon-inbox icon-white></i> My News</a></li>";
           }?>
           <li><a href="#about"><i class="icon-info-sign icon-white"></i> About</a></li>
         </ul>
       </div><!--/.nav-collapse -->
    </div><!--/container-fluid -->
   </div><!--/navbar-inner -->
</div><!--/navbar -->
<div class="second-nav-container" style="min-height: 47px; width:450px; margin-left:auto; margin-right:auto; margin-top:10px;">
        <div class="container" style="width:100%;">
            <div class="navbar-inner" style="min-height:45px; background-color: #1b1b1b !important; background-image:none !important;">
                <div class="span4 speed-box" style="width:100%; padding-left:50px;">
                    <div class="span2" style="width:30px; padding-right: 5px; ">
                        <button class="btn slow" type="button" style="display:none;"><i class="icon-minus"></i></button>
                    </div>
                    <div class="span2" style="width:30px; padding-right: 5px; padding-top:8px;">
                        <button id="start-stop" class="btn anchor stop" type="button"><i class="icon-pause"></i></button><!-- JS toggle icon class pause/play -->
                    </div>
                    <div class="span2" style="width:30px; padding-right: 5px;">
                        <button class="btn fast" type="button" style="display:none;"><i class="icon-plus"></i></button>
                    </div>
                    <div class="span2" style="padding:12px; float:right;">
                        <div id="status" class="speed_status animate bounce"> 
                            <span class="" style="font-size:19px;color:#2FA4E7;margin-left:4px;"><b>Playing</b></span> <!-- JS toggle speed status -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="container-fluid container-set">
   <div class="row-fluid">
     <div id="news-container "class="span12">
        <div class="row-fluid">
         <div id="mason-container" class="masonry">
                     
         </div>
       </div><!--/row-fluid-->
        </div><!--/span12-->
       </div><!--/row-fluid-->
     </div><!--/container-fluid-->
