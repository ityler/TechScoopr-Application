// INITS
data = '';
dataurl = "https://techscoopr.com/index.php/frontpage/outputAjax";
index = 0;
seen = [];
layoutNumber = 1;
shareUrl = "";
loadCount = 20;

$(document).ready(function(){
  getDeviceDimention();   // Write out device specs to log
  var w_w = $(window).width();
  if (w_w >= 1600){
    loadCount = 25;
  }
  console.log("LOADCOUNT: "+loadCount);
  $(".userfancy").fancybox({
    type: 'iframe',
    scrolling: 'no',
    height: 400,
    width: 450,
    fitToView: false,
    autoSize: false
  });
  $(".fancybox")
    .attr('rel', 'news')
    .fancybox({
      type: 'iframe',
      scrolling: 'no',
      fitToView: true,
      autoSize: true,
      beforeShow: function() {
        shareUrl = "https://techscoopr.com/n/index/";
        shareUrl += $(this.element).attr("value");
        saveValue = $(this.element).attr("value");
        this.title += '<br /><hr class="hr-dark">';
        // Add tweet button
        this.title += '<a href="https://twitter.com/share" \
                  class="twitter-share-button" \
                  data-count="none" \
                  data-url="' + shareUrl + '">Tweet</a> ';
        // Add FaceBook like button
        this.title += '<iframe src="//www.facebook.com/plugins/like.php?\
                href=' + this.href + '&amp;\
                layout=button_count&amp;\
                show_faces=true&amp;\
                width=500&amp;\
                action=like&amp;\
                font&amp;colorscheme=light&amp;\
                height=23" \
                scrolling="no" \
                frameborder="0" \
                style="border:none; \
                overflow:hidden; \
                width:110px; \
                height:23px;" \
                allowTransparency="true">\
                 </iframe>';
        // Add save story button
        this.title += '<div id="fancy-save">\
                <a class="star-button" value="' + saveValue + '" href="#">\
                  <i class="icon-ok-sign icon-white thumb-button"></i> Save</a></div>';
      },
      afterShow: function() {
        // Render tweet button
        twttr.widgets.load();
        fancyboxSaveButton();
      },
      helpers: {
        title: {
          type: 'inside'
        }
      }

    });
  /* checks for on click of save button in fancybox popup view of news item
   *
   */
  function fancyboxSaveButton() {
    $("#fancy-save").on('click', 'a.star-button', function() {
      if ($(this).hasClass("saved")) {
        $(this).children('i.thumb-button').removeClass("icon-remove-sign");
        $(this).removeClass("saved");
        $(this).children('i.thumb-button').addClass("icon-ok-sign");
        this.childNodes[1].nodeValue = " Save";
      } else {
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
          if (output_string == 'No') {

            loginPop();
          }
        }
      });
      return false;
    });

    function loginPop() {
      $.fancybox.open([{
        href: 'auth/login'
      }], {
        type: 'iframe',
        scrolling: 'no',
        fitToView: true,
        autoSize: true,
        afterLoad: function() {
          this.inner.prepend('<h4 class="login-error">You must be logged in to do that!</h4>');
        }
      })
    }
  }

  // check for window scroll and load new data
  $(window).scroll(function() {
    if ($(window).scrollTop() >= $(document).height() - $(window).height() - 5) {
      fillData(12);
    }
  });

  /****** CHECKS FOR ITEM HOVER, ADDS CLASS AND DISPLAYS ITEM DESCRIPTION *******/
  var pause_area = $(".masonry");
  pause_area.on({
    mouseenter: function() {
      $(this).find(".news-hover").slideDown(150); // ( speed value ) Lower is faster 
      $(this).find(".art-image").slideUp(150);
    },
    mouseleave: function() {
      $(this).find(".news-hover").slideUp(150);
      $(this).find(".art-image").slideDown(150);
    }
  }, ".item");

  $(".tag").click(function() {
    var td = $(this).data("tag"); // Get data-tag from url
    var su = "https://techscoopr.com/index.php/tag/" + td // Construct source url
    startData(su); // Pass tag url to api
  });

  /****** sets active and inactive class for sidebar nav links ******/
  $('.links li a').on('click', function() {
    $(this).parent().parent().find('.active').removeClass('active');
    $(this).parent().addClass('active');
  });

  startData(dataurl);

  /**** fetches json data after new url is set ****/
  function startData(x) {
    console.log("startData() called");
    var url = x;
    $.getJSON(url, function(JSON) {
      data = JSON;
      setLayout(loadCount);
    });
  }

  $('#mason-container').masonry({
    itemSelector: '.item',
    columnWidth: function(containerWidth) {
      return containerWidth / 3;
    },
    isAnimated: true
  }).imagesLoaded(function() {
    $('#mason-container').masonry('reload');
  });

  /*** Touch Swipe Control ***/
  var swipeArea = document.getElementById("mason-container");

  Hammer(swipeArea).on("swipeleft", function(ev) { // On (swipeleft)
    console.log("swipeleft"); // Write to log
    console.log(ev.target);
    var swipeObj = $(ev.target); // Callback object
    if ($(swipeObj).hasClass("item")) { // Did not swipe description
      var ni = $(ev.target); // Swiped element (item box)
      $(ni).removeClass("swiped");
      $(ni).find(".art-image").show("slide", {
        direction: "left",
        duration: 200
      });
      //  $(ni).find(".news-hover").slideUp( 150 );
      //  $(ni).find(".art-image").slideDown( 150 );
    } else {
      var ni = $(ev.target).parent().closest('div.item'); // Get swiped item
      $(ni).removeClass("swiped");
      console.log(ni);
      console.log($(ni).html());
      $(ni).find(".art-image").show("slide", {
        direction: "left",
        duration: 200
      });
      // $(ni).find(".news-hover").slideUp( 150 );
      // $(ni).find(".art-image").slideDown( 150 );
    }
  });
  Hammer(swipeArea).on("swiperight", function(ev) {
    console.log("swiperight");
    var ni = $(ev.target).parent().closest('div.item');
    if ($(ni).hasClass("swiped")) { // Same item swiped again
      $(ni).find(".art-image").show("slide", {
        direction: "left",
        duration: 200
      }); // Show image
      $(ni).removeClass("swiped");
    } else if ($(".swiped")[0]) { // Different item already swiped
      $(".swiped").find(".art-image").show("slide", {
        direction: "left",
        duration: 200
      }); // Show image
      $(".swiped").removeClass("swiped"); // remove swiped class
      $(ni).addClass("swiped");
      $(ni).find(".art-image").hide("slide", {
        direction: "right",
        duration: 200
      });
    } else {
      $(ni).addClass("swiped");
      $(ni).find(".art-image").effect("")
      $(ni).find(".art-image").hide("slide", {
        direction: "right",
        duration: 200
      });
      //$(ni).find(".news-hover").slideDown( 150 ); // ( speed value ) Lower is faster     
      // $(ni).find(".art-image").slideUp( 150 );
    }
  });
}); // End dom.ready()



/*** Generatet random id for news index ***/
function randomId() {
  var rid = Math.floor(Math.random() * data.results.length);
  if (seen.length == data.results.length) {
    seen.length = 0;
  }
  if ($.inArray(rid, seen) == -1) {
    seen.push(rid);
    return rid;
  } else {
    return randomId();
  }
}


/******** SET LAYOUT AND FILL INITIAL ITEMS ***********/
function setLayout(num) {
  var dt = new Date($.now());
  console.log(dt);
  var mc = $("#mason-container");
  mc.empty();
  for (var i = 0; i < num; i++) // starts index at random number and progresses to set layout number
  {
    var rid = randomId();
    var ns_id = data.results[rid].id;
    var ns_lnk = data.results[rid].Link;
    ns_lnk = ns_lnk.replace(/^http:\/\//i, 'https://');
    var ns_ttl = data.results[rid].Title;
    var ns_desc = data.results[rid].Description;
    var ns_img = fallbackImg(data.results[rid].Image);
    var ns_dt = data.results[rid].PubDate;
    var ns_src = data.results[rid].Source;
    console.log(ns_dt);
    // super fallback image
    mc.append('<div id="news" class="item box">\
           <img onload="this.style.opacity=1;" \
             class="art-image image-fade" \
             src="' + ns_img + '">\
           <div class="img-overlay">\
             <p class="item-title">' + ns_ttl + '</p>\
           </div>\
           <div class="news-hover">\
             <a title="" \
              id="news" \
              rel="news" \
              class="fancybox fancybox.iframe news-link" \
              href="' + ns_lnk + '" \
              target="_blank" value="' + ns_id + '">\
             <p class="art-description">' + ns_desc + '</p>\
             </a>\
             <div class="news-actions">\
             <a class="star-button" value="' + ns_id + '" href="#">\
             <i class="icon-ok-sign icon-white thumb-button"></i> Save</a>\
             </div>\
           </div>\
           </div>');
  }
}

/******** SET LAYOUT AND FILL INITIAL ITEMS ***********/
function fillData(num) {
  for (var i = 0; i < num; i++){
    var rid = randomId();
    var news_id = data.results[rid].id;
    var news_link = data.results[rid].Link;
    news_link = news_link.replace(/^http:\/\//i, 'https://');
    var news_title = data.results[rid].Title;
    var news_description = data.results[rid].Description;
    var news_image = data.results[rid].Image;
    var news_date = data.results[rid].PubDate;
    var news_source = data.results[rid].Source;
    if (news_image == ''){
      news_image = "https://techscoopr.com/assets/img/techscoopr.png";
    }
    $("#mason-container").append('<div id="news" class="item box">\
      <img onload="this.style.opacity=1;" class="art-image image-fade" src="' + news_image + '">\
      <div class="img-overlay"><p class="item-title">' + news_title + '</p></div>\
      <div class="news-hover">\
        <a title="Controls" id="news" rel="news" class="fancybox fancybox.iframe news-link" href="' + news_link + '"target="_blank" value="' + news_id + '">\
        <p class="art-description">' + news_description + '</p></a>\
        <div class="news-actions"><a class="star-button" href="#" value="' + news_id + '">\
        <i class="icon-ok-sign icon-white thumb-button"></i> Save</a></div></div></div>');
  }
}

function getDeviceDimention() {
  console.log("Device Dimention");
  console.log("Width = " + $(window).width());
  console.log("Height = " + $(window).height());
}

// Img error check
function fallbackImg(x){
  var y = "https://techscoopr.com/assets/img/techscoopr.png";
  if(!(x == '')){
    return x;       // Good img
  } else {
    return y;       // Default img
  }
}