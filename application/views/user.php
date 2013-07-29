<style>
p {
   color: #FFF !important;
}

.item {
    float: left;
    position: relative;
    width: 200px;
        height: 175px;
        border: none;
        margin: 2px;
        padding: 0px;
        overflow: hidden;
        top: 0px;
        left: 0px;
        -webkit-transition: left .4s ease-in-out, top .4s ease-in-out .4s;
        -moz-transition: left .4s ease-in-out, top .4s ease-in-out .4s;
        -ms-transition: left .4s ease-in-out, top .4s ease-in-out .4s;
        -o-transition: left .4s ease-in-out, top .4s ease-in-out .4s;
        transition: left .4s ease-in-out, top .4s ease-in-out .4s;
}

.art-description {
    font-size: 13px;
    line-height: 14px;
    color: #FFF;
    margin: 3px;
}

.item-title {
    font-size: 14px;
    line-height: 14px;
    color: #FFF;
}

.sidebar-nav {
    padding: 3px 0;
    background-color: #282828;
    border: none;
}

.sidebar-nav-fixed {
    position: fixed;
    top: 48px;
    width: 430px;
}

.scrollable {
                height: 100%;
                overflow: auto;
}

.news-reader {
    margin-left: 430px !important;
}
</style>

<?php 
$username = $userInfo->username;
$email = $userInfo->email;
$last_login = $userInfo->last_login;
?>
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
             <?php if (!$this->tank_auth->is_logged_in()){echo "<li><a class='fancybox fancybox.iframe' href='auth/login#'>Sign In</a></li>";}?>
           <?php if ($this->tank_auth->is_logged_in()){
               echo "<li><a href='".base_url('/mynews')."'>My News</a></li>";
               echo "<li class='divider'></li>";
               echo "<li><a href='".base_url('/auth/logout')."'>Sign Out</a></li>";
               }?>
         </ul>
       </div>
       <div class="nav-collapse">
         <ul class="nav">
           <li><a href="<?php echo base_url();?>"><i class="icon-home icon-white"></i> Home</a></li>
           <li><a href="<?php echo base_url('/stream');?>"><i class="icon-play-circle icon-white"></i> Stream</a></li>
           <?php if ($this->tank_auth->is_logged_in()){
               echo "<li><a class='nav-link-active' href='".base_url('/mynews')."'><i class=icon-inbox icon-white></i> My News</a></li>";
           }?>
           <li><a href="#about"><i class="icon-info-sign icon-white"></i> About</a></li>
         </ul>
       </div><!--/.nav-collapse -->
    </div><!--/container-fluid -->
   </div><!--/navbar-inner -->
</div><!--/navbar -->
<div id="main-container" class="container-fluid">
    <div class="row-fluid">
        <div class="the-sidebar">
            <div id="sidebar-span">
                <div class="well sidebar-nav sidebar-nav-fixed scrollable">
                    <div id="main-news-container" class="main-news-container">
        

                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div id="news-reader" class="span8 news-reader" >
            <div id="viewer-page" class="article-view-space">
                <iframe id="frame" class="frame" src="" style="width:100%; height:900px;">
  
                </iframe>
            </div>
        </div>
    </div>
</div><!--/main-container-->