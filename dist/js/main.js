(function ($) {
  Drupal.behaviors.eie_theme = {
    attach: function (context, settings) {

      // Toggles between two strings
      // Used for changing mobile menu button text on click
      $.fn.toggleText = (function(t1, t2) {
        this.each(function() {
          var $this = $(this)
          if ($this.text() == t1) { $this.text(t2); }

          else { $this.text(t1); }

        })
        return this;
      });

    /*
      -----------------------
      CURRICULUM DETAIL MOBILE ACCORDIONS
      -----------------------
    */
    enquire
      .register("screen and (min-width: 769px)", function() {
        $(".mobile-accordion-content").attr("style", "");
        $(".mobile-accordion-content").removeClass("active");
        $(".mobile-accordion-toggle").unbind("click");
      })

      .register("screen and (max-width: 768px)", function() {
        $(".mobile-accordion-toggle").click(function(){
          $(this).toggleClass("active");
          $(this).next(".mobile-accordion-content").slideToggle();
        });
      })


    /*
      -----------------------
      MORE IN THIS SECTION
      -----------------------
    */
          enquire
            .register("screen and (min-width: 641px)", function() {
              $(".more-in-this-section-container ul.menu").attr("style", "");
              $(".more-in-this-section").removeClass("more-in-this-section--active");
              $(".more-in-this-section a").unbind("click");
            })

            .register("screen and (max-width: 640px)", function() {
              $(".more-in-this-section a").click(function(e){
                $(this).parents(".more-in-this-section").toggleClass("more-in-this-section--active");
                $(this).parents(".more-in-this-section").next().slideToggle();
                $(this).parents(".more-in-this-section").find(".toggle-text-state").toggleText("Click to Close", "Click to open if on a mobile or tablet device");
                e.preventDefault();
              });
            })

        // $(".search-toggle").click(function(e) {
        //   e.preventDefault();
        //   $(this).toggleClass("fa-search--active");
        //   $(".search-form").toggle();
        //   if ($(this).hasClass("fa-search--active")) {
        //     //$(".main-nav").hide();
        //     $(".mobile-menu-toggle").removeClass("fa-navicon--active");
        //   }
        //   $("body").toggleClass("search-no-scroll");
        // })

        // Create an 'overview' link for mobile purposes
        // This needs to happend first or our 'has-ul'
        // class gets added where we don't want it
        $('li:has(".mega-menu") > a').each(function() {
          var $overview = $(this).clone();
          var $overviewDestinationSelector = $('li:has(".mega-menu")');
          var $overviewDestination = $(this).siblings(".mega-menu");

          $($overview).text('Overview').prependTo($overviewDestination).wrap('<div class="menu__overview-link js-processed"></div>');
        });

        // Separating Nav Levels using Vars
        var $ulLevelOne = $('.main-nav__top-level > .menu-level-1 > ul'),
            $liLevelOne = $('.main-nav__top-level > .menu-level-1 > ul > li'),

            $ulLevelTwo = $('.mega-menu__column .menu-level-1 > ul'),
            $liLevelTwo = $('.mega-menu__column .menu-level-1 > ul > li'),

            $ulLevelThree = $('.mega-menu__column .menu-level-1 > ul > li > ul'),
            $liLevelThree = $('.mega-menu__column .menu-level-1 > ul > li > ul > li'),

            $ulLevelFour = $('.mega-menu__column .menu-level-1 > ul > li > ul > li > ul'),
            $liLevelFour = $('.mega-menu__column .menu-level-1 > ul > li > ul > li > ul > li'),

            $ulLevelFive = $('.mega-menu__column .menu-level-1 > ul > li > ul > li > ul > li > ul'),
            $liLevelFive = $('.mega-menu__column .menu-level-1 > ul > li > ul > li > ul > li > ul > li');


        $(".mobile-menu-toggle").click(function(e) {
          e.preventDefault();
          $(this).toggleClass("fa-navicon--active");
          if ($(this).hasClass("fa-navicon--active")) {
            $(".search-form").hide();
            $(".search-toggle").removeClass("fa-search--active");
          }
          $(".main-nav").slideToggle();
        })

        // this bit adds a wrapper around Wistia videos to make the responsive

        $('iframe.wistia_embed').each(function(){
          $(this).wrap('<div class="iframe-video-container js-processed"></div>');
        });

        $('.paragraphs-items-field-checkerboards .row').find('a.play-button').each(function() {
          var cbHref = $(this).prev('a.colorbox-load').attr('href');
          $(this).attr('href', cbHref);

          var top = (317 - 80)/2;
          var right = ($(this).parent('.video-colorbox-enabled').width() - 63)/2;
          console.log(right);
          $(this).css({
            "top" : top + "px",
            "right" : right + "px",
          });
        });




        // SUPPORT FOR TOUCH
        if($(".touchevents").length) {

          enquire
            // Desktop
            .register("screen and (min-width:769px)", function() {

            $("li:has(.mega-menu) > a").click(function(e) {
              e.preventDefault();
              $(this).parents("ul").find(".touch-toggle-active").removeClass(".touch-toggle-active");
              $(this).siblings(".mega-menu").toggleClass(".touch-toggle-active");
            });
              $(".navigation, .navigation *").removeAttr("style").removeClass("has-ul-active");
            })

            // Mobile & Tablet
            .register("screen and (max-width:768px)", function() {

              $('li:has(".mega-menu") > a').click(function(event) {
                event.preventDefault();
                $(this).toggleClass("drop-down-active");
                $(this).siblings(".mega-menu").slideToggle();

              });
              $(".mega-menu__column .menu-level-1 > ul > li > .nolink").click(function() {
                $(this).toggleClass("drop-down-active");
              })
            })


        } else {

          enquire
            // Desktop
            .register("screen and (min-width:769px)", function() {
              $('li:has(".mega-menu") > a').unbind("click");
              $(".navigation, .navigation *").removeAttr("style").removeClass("has-ul-active");
            })

            // Mobile & Tablet
            .register("screen and (max-width:768px)", function() {

              $('li:has(".mega-menu") > a').click(function(event) {
                event.preventDefault();
                $(this).toggleClass("drop-down-active");
                $(this).siblings(".mega-menu").slideToggle();
                $(this).siblings('.mega-menu').find('.drop-down-active').removeClass('drop-down-active');
              });
              $(".mega-menu__column .menu-level-1 > ul > li > .nolink").click(function() {
                $(this).toggleClass("drop-down-active");
              });



            })
        }

      // Set Equal Column Height
/*
        function setEqualHeight(columns)
         {
         var tallestcolumn = 0;
         columns.each(
         function()
         {
         currentHeight = $(this).height();
         if(currentHeight > tallestcolumn)
         {
         tallestcolumn  = currentHeight;
         }
         }
         );
         columns.height(tallestcolumn);
         }
        $(document).ready(function() {
         setEqualHeight($(".resource-block"));
        });
*/

      // See More Listings toggle
      $('.listings-see-more').click(function(){
        $(this).hide();
        $('.listings-see-less').css('display', 'block')
        $('.sidebar-box .bef-checkboxes > .form-item:nth-child(n+6)').show();
      });

      $('.listings-see-less').click(function(){
        $(this).hide();
        $('.listings-see-more').show()
        $('.sidebar-box .bef-checkboxes > .form-item:nth-child(n+6)').hide();
      });

      $('.listings-see-less, .listings-see-more').click( function(e) {
        e.preventDefault();
      });

      // Collapsable Content
      if($('.collapsable', context).length) {
        var $collapsable = $('.collapsable')
        $collapsable.addClass('collapsed');
        $collapsable.find('.collapsable--header').click(function(){
          $(this).parent().toggleClass('collapsed');
        })
      }

      // Sticky Nav Menu Functionality
      if($('.sticky-nav', context).length) {

        var $stickyNav = $('.sticky-nav');

        // Scroll function to fix position upon scrolling down
        $(window).scroll(function(){
          var windowTop = $(window).scrollTop();

          if (windowTop >= 222) {
            $stickyNav.css({ position: 'fixed', top: '120px' });
          }
          else {
            $stickyNav.css('position','absolute');
          }
        });

        // Click function to add class to slide open menu
        $stickyNav.find('.menu-tab').click(function(){
          $(this).parent().toggleClass('open');
        })
      }

      // Sample Classroom Video Tabs
      $(document).ready(function(){
        if($('.unit-lesson--materials .video-tabs', context).length) {
          $('.unit-lesson--materials .video-tabs').tabs();
        }
      });

      // Workshop Calendar
      var workshopCalendar = $('.view-display-id-workshop_calendar_block');
      if(workshopCalendar.length) {
        workshopCalendar.find('.workshop-popup').once('eie', function() {
          $(this).dialog({
            autoOpen: false,
            draggable: false,
            resizable: false
          });
        });

        workshopCalendar.find('.workshop-popup-link').once('eie', function() {
          $(this).click(function(e) {
            e.preventDefault();
            var wid = $(this).attr('data-workshop-id');
            $('#workshop-popup-' + wid).dialog('open');
          });
        });
      }


      // Main Nav down menu interaction
      // if($('.header-bottom .block-menu-block', context).length) {

      //   var $headerBottomMenu = $('.header-bottom .menu-block-wrapper')
      //   var $menuItemExpanded = $('.header-bottom .menu-block-wrapper > .menu .expanded')
      //   var $menuItemDropdown = $('.header-bottom .menu-block-wrapper > .menu .expanded .menu')

      //   // Hide all dropdowns at first
      //   $menuItemDropdown.hide();

      //   // Hover functions
      //   $menuItemExpanded.hover(

      //     // Hover enter
      //     function(){
      //       // Make the dropdown visible, then add class which will trigger the css transition
      //       $(this).children('.menu').show(0, function(){
      //         $(this).parent().addClass('hover-active');
      //       });
      //     },
      //     // Hover exit
      //     function(){
      //       // Remove the class that triggers the css transition, then hide it when transition is complete
      //       $(this).removeClass('hover-active');
      //       $(this).one("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function() {
      //         $(this).children('.menu').hide();
      //       });
      //     }
      //   );
      // }

    }
  };
})(jQuery);
