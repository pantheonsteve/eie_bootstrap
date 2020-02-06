// --------------------------------------------------
// mobile-touch-scroll-behavior.JS
// --------------------------------------------------
(function($){
  $(document).ready(function(){

    // A GLOBAL SOLUTION FOR SMOOTH HASH NAVIGATION WITH STICKY HEADERS

    // hash Navigation by clicking
    $("a[href*='#']").on('click', function(e) {

      var anchorHash = $(this).attr("href");
      if (anchorHash.indexOf(window.location.href) < 0) {
        e.preventDefault;
        $(anchorHash).show(function() {
          $('html, body').animate({
            scrollTop: $(anchorHash).offset().top
          }, 800);
        });
      }
    });

    if(window.location.hash) {
      var hash = window.location.hash;

      // hash Navigation by URL
      $(window).on('load', function() {
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800);
      });
    }
  });
})(jQuery);
