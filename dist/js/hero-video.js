// --------------------------------------------------
// hero-video.js
// --------------------------------------------------
(function($){

  $(document).ready(function() {
    

    if($(".has-alert").length) {
      $(".hero__img").css("position", "absolute");
    }
    
    $(".hero__scroll").click(function(e) {
      $('html, body').animate({
          scrollTop:  $(".hero").next().offset().top
      }, 2000);
      e.preventDefault();
    })
    
    // Let's not run any extraneious code if there isn't a video present.    
    if ($(".video-container").length) {
            
      /*
        -----------------------
        Responsive Attributes
        -----------------------
      */
      
        // Desktop
        // Mobile & Tablet
        enquire.register("screen and (min-width:769px)", {
          match : function() {
            if($(".video-feature").length) {
              // We have to add autoplay because Safari will not adhere
              // to a .play() command with preload set to none
              $(".video-feature video").attr("autoplay", "true");
              $(".video-feature video").show().get(0).play();   
            }      
          },
          unmatch : function() {
            if($(".video-feature").length) {
              $(".video-feature video").attr("autoplay", "false");
              $(".video-feature video").hide().get(0).pause();
            }
          }      
        });
    }
    
    if($(".parallax").length && !$(".has-alert").length) {
      // Establish parallax for both the video & Images
      if($(".no-touchevents").length) {
         var parallaxScroll = function(){
              var scrolled = $(window).scrollTop();
                              
                $('.video-feature video, .video-feature--mobile-img, .hero__img').css('transform', 'translateY(' + (-1-(scrolled*.10))+ 'px');
          }
          $(window).bind("scroll", parallaxScroll);
          
      } else if($(".touchevents")) {
          var parallaxScroll = function(){
              var scrolled = $(window).scrollTop();
                              
                $('.video-feature video, .video-feature--mobile-img, .hero__img').css('transform', 'translateY(' + (-1-(scrolled*.02))+ 'px');
          }
          $(window).bind("scroll", parallaxScroll);        
      }    
    
    
        //Video has a position fixed attribute. Lets hide it when its not in the viewport
        //On Load
        if (!$(".parallax").is(":in-viewport")) {
          $(".parallax").css("visibility", "hidden");
        } else {
          $(".parallax").css("visibility", "visible");
        }
        
        //On Scroll
        $(window).scroll(function(){
          if (!$(".parallax").is(":in-viewport")) {
            $(".parallax").css("visibility", "hidden");
          } else {
            $(".parallax").css("visibility", "visible");
          }
        });

    }

  }); // END DOC READY
})(jQuery);