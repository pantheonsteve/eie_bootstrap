// --------------
// ANIMATE.JS
// --------------
(function($){
  $(document).ready(function() {

    // -------- Consecutive anim for buckets
    if($(".bucket").length) {
      $('.bucket').each(function(i) {
        var bucket = $(this).parents('li');
        if($(this).is(":in-viewport")) {
          setTimeout(function() {
            bucket.addClass('scale-up-down animate animate-active fade-in');
            bucket.css('opacity', "1");
          }, 500*i);
        }
      });
      $(window).scroll(function() {
        $('.bucket').each(function(i) {
          var bucket = $(this).parents('li');
          if($(this).is(":in-viewport")) {
            setTimeout(function() {
              bucket.addClass('scale-up-down animate animate-active fade-in');
              bucket.css('opacity', "1");
            }, 150*i);
          }
        });
      });
    }

    // -------- SVG Draw
    if($("svg").length) {
      $('main svg').each(function(i) {
        if($(this).is(":in-viewport")) {
          $(this).attr("data-active", "true");
        }
      });
      $(window).scroll(function() {
        $('main svg').each(function(i) {
          if($(this).is(":in-viewport")) {
            $(this).attr("data-active", "true");
          }
        });
      });
    }


    // -------- Map Interactions
    $(".btn--map").not(".btn--map.active").click(function(e) {
      e.preventDefault();
      if($(this).hasClass("active")) {
        $(".section--map__map-container__overlay").slideDown();
        $(this).removeClass("active");
        $(this).text("Explore the Map");        
      } else {
        $(".section--map__map-container__overlay").slideUp();
        $(this).addClass("active");
        $(this).text("Stop Using the Map");        
      }
    });


    // -------- AMIMATE DEFAULT
    if($(".animate").length) {
      $(".animate").each(function() {
        if($(this).is(":in-viewport")) {
          $(this).addClass("animate-active");
        }
      });
      $(window).scroll(function() {
        $(".animate").each(function(){
          if($(this).is(":in-viewport")) {
            $(this).addClass("animate-active");
          }
        });
      });
    }    
  });
})(jQuery);