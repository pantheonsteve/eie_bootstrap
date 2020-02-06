<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - : TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['header_middle']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
?>

<?php
/*  ==========================================================================
    Header Top
    ========================================================================== */ ?>

<header>

  <?php
  /*  ==========================================================================
      Header Middle
      ========================================================================== */ ?>
  <div class="mos-branding">
    <div class="row">
      <div class="container-fluid">
        <a href="https://www.mos.org/" target="_blank">
            <svg width="129px" height="16px" viewBox="0 0 129 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <!-- Generator: Sketch 49.1 (51147) - http://www.bohemiancoding.com/sketch -->
            <desc>Created with Sketch.</desc>
            <defs></defs>
            <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Header" transform="translate(-255.000000, -5.000000)">
                    <g id="Logo/MoS" transform="translate(255.000000, 5.000000)">
                        <g id="Logo-MoS">
                            <path d="M8.23582766,4.73060974 C7.49212841,4.73060577 6.77902083,5.03173624 6.25399766,5.56749528 C5.72897449,6.10325431 5.43523103,6.82956331 5.43764172,7.58601399 C5.43645801,8.13666877 5.59414243,8.67557548 5.89115646,9.13595878 C1.75510204,12.6233346 1.37868481,15.7416759 1.33333333,16 L4.09977324,16 C3.85487528,13.3060483 5.04761905,11.3870691 6.63945578,9.91554411 C7.49372174,10.5191326 8.60664712,10.5909381 9.52904661,10.1019794 C10.4514461,9.61302068 11.0310839,8.64399706 11.0340136,7.58601399 C11.0329601,7.36359336 11.0055515,7.14211279 10.952381,6.92636486 C12.4993945,5.96275478 14.2123014,5.30685397 16,4.9935468 L16,3.46666667 C14.0929617,4.09898574 12.2506429,4.91776228 10.4988662,5.91152006 C9.97421895,5.16925569 9.13006187,4.72963434 8.23129252,4.73060974" id="Shape" fill="#FFFFFF" fill-rule="nonzero"></path>
                            <path d="M11.0035912,7.85259631 C10.993409,8.87458067 10.4068591,9.80712624 9.4797048,10.2753973 C8.55255046,10.7436683 7.43705362,10.670763 6.5815871,10.0859855 C4.98145984,11.5332217 3.78250409,13.3869347 4.03323628,16 L16,16 L16,5.33333333 C14.2029617,5.63660874 12.481114,6.27173574 10.9260922,7.20491346 C10.9787357,7.41691196 11.0047613,7.63441595 11.0035912,7.85259631" id="Shape" fill="#EE3124" fill-rule="nonzero"></path>
                            <path d="M0,0 L0,16 L1.31177305,16 C1.33900709,15.7503546 1.73390071,12.6774468 5.87347518,9.24141844 C5.57510937,8.78723646 5.41723098,8.25518627 5.41957447,7.71177305 C5.4205761,6.49772735 6.20368196,5.42258214 7.35889524,5.0492321 C8.51410852,4.67588207 9.77831856,5.08936116 10.4896454,6.07319149 C12.244451,5.09527014 14.0898521,4.28961727 16,3.66751773 L16,0 L0,0 Z" id="Shape" fill="#EE3124" fill-rule="nonzero"></path>
                        </g>
                    </g>
                    <path d="M282.768,9.528 L285.072,9.528 L285.072,18 L283.524,18 L283.668,11.04 L281.844,18 L280.416,18 L278.58,11.04 L278.736,18 L277.188,18 L277.188,9.528 L279.492,9.528 L281.148,15.816 L282.768,9.528 Z M290.784,12 L292.224,12 L292.224,18 L290.784,18 L290.784,17.388 C290.532,17.628 289.944,18.144 288.84,18.144 C287.856,18.144 287.388,17.724 287.172,17.448 C286.764,16.932 286.764,16.368 286.764,15.468 L286.764,12 L288.216,12 L288.216,15.444 C288.216,15.684 288.216,15.888 288.264,16.044 C288.42,16.572 288.852,16.8 289.38,16.8 C289.98,16.8 290.352,16.476 290.544,16.164 C290.76,15.768 290.772,15.384 290.784,14.544 L290.784,12 Z M293.28,17.112 L294.348,16.224 C294.708,16.668 295.248,16.992 296.076,16.992 C296.904,16.992 297.264,16.584 297.264,16.284 C297.264,15.9 296.832,15.804 296.64,15.768 C296.436,15.72 295.452,15.54 295.236,15.48 C293.808,15.144 293.544,14.316 293.544,13.776 C293.544,12.756 294.468,11.82 296.112,11.82 C297.024,11.82 297.684,12.108 298.092,12.396 C298.392,12.588 298.584,12.792 298.704,12.936 L297.684,13.884 C297.516,13.56 297.108,12.972 296.052,12.972 C295.368,12.972 295.056,13.272 295.056,13.584 C295.056,14.016 295.5,14.136 296.268,14.268 C297.516,14.496 297.864,14.556 298.248,14.856 C298.62,15.144 298.86,15.624 298.86,16.128 C298.86,17.064 298.02,18.18 296.16,18.18 C295.092,18.18 294.036,17.844 293.28,17.112 Z M304.464,15.948 L305.688,16.656 C304.944,17.652 303.984,18.18 302.76,18.18 C301.188,18.18 299.676,17.184 299.676,14.976 C299.676,12.96 300.972,11.82 302.664,11.82 C304.248,11.82 304.908,12.768 305.028,12.948 C305.52,13.644 305.628,14.688 305.64,15.288 L301.2,15.288 C301.368,16.236 301.956,16.776 302.904,16.776 C303.888,16.776 304.284,16.2 304.464,15.948 Z M301.248,14.232 L304.056,14.232 C303.924,13.296 303.348,12.972 302.712,12.972 C301.944,12.972 301.416,13.416 301.248,14.232 Z M310.776,12 L312.216,12 L312.216,18 L310.776,18 L310.776,17.388 C310.524,17.628 309.936,18.144 308.832,18.144 C307.848,18.144 307.38,17.724 307.164,17.448 C306.756,16.932 306.756,16.368 306.756,15.468 L306.756,12 L308.208,12 L308.208,15.444 C308.208,15.684 308.208,15.888 308.256,16.044 C308.412,16.572 308.844,16.8 309.372,16.8 C309.972,16.8 310.344,16.476 310.536,16.164 C310.752,15.768 310.764,15.384 310.776,14.544 L310.776,12 Z M313.776,18 L313.776,12 L315.204,12 L315.204,12.672 C315.684,12.072 316.536,11.82 317.1,11.82 C317.664,11.82 318.372,12.036 318.768,12.744 C319.008,12.408 319.632,11.82 320.688,11.82 C321.288,11.82 321.864,11.988 322.272,12.432 C322.752,12.96 322.74,13.596 322.74,14.22 L322.740027,18 L321.312,18 L321.312,14.688 C321.312,14.124 321.396,13.176 320.304,13.176 C319.848,13.176 319.476,13.428 319.284,13.74 C319.008,14.184 318.972,14.664 318.972,15.18 L318.972,18 L317.544,18 L317.544,14.652 C317.544,14.22 317.544,14.064 317.496,13.884 C317.388,13.488 317.076,13.176 316.572,13.176 C316.14,13.176 315.72,13.428 315.468,13.872 C315.216,14.34 315.204,14.904 315.204,15.492 L315.204,18 L313.776,18 Z M333.348,14.976 C333.348,16.848 332.112,18.18 330.3,18.18 C328.428,18.18 327.18,16.812 327.18,14.976 C327.18,13.14 328.452,11.82 330.24,11.82 C331.908,11.82 333.336,12.984 333.348,14.976 Z M331.836,14.952 C331.812,13.956 331.236,13.116 330.228,13.116 C329.328,13.116 328.68,13.836 328.68,14.94 C328.68,16.176 329.436,16.86 330.3,16.86 C331.344,16.86 331.872,15.948 331.836,14.952 Z M337.452,13.02 L336.144,13.02 L336.144,18 L334.704,18 L334.704,13.02 L333.804,13.02 L333.804,11.988 L334.704,11.988 L334.704,11.304 C334.692,10.452 334.692,9.516 336.636,9.516 C336.924,9.516 337.188,9.54 337.452,9.564 L337.452,10.788 C337.332,10.764 337.2,10.752 336.996,10.752 C336.612,10.752 336.384,10.836 336.24,11.052 C336.192,11.136 336.144,11.316 336.144,11.496 L336.144,11.988 L337.452,11.988 L337.452,13.02 Z M341.04,16.416 L342.372,15.48 C342.576,15.792 343.212,16.764 345,16.764 C345.3,16.764 345.612,16.74 345.912,16.62 C346.524,16.368 346.632,15.936 346.632,15.648 C346.632,15.108 346.26,14.916 345.996,14.808 C345.804,14.736 345.78,14.724 345.012,14.544 L343.992,14.328 C343.452,14.196 343.188,14.136 342.924,14.028 C342.54,13.872 341.496,13.356 341.496,11.952 C341.496,10.344 342.852,9.312 344.844,9.312 C346.668,9.312 347.652,10.212 348.252,11.028 L346.956,12 C346.668,11.58 346.116,10.74 344.76,10.74 C343.908,10.74 343.164,11.124 343.164,11.772 C343.164,12.492 343.956,12.636 344.724,12.78 L345.6,12.972 C346.74,13.212 348.348,13.68 348.348,15.492 C348.348,17.436 346.548,18.216 344.748,18.216 C344.28,18.216 343.752,18.168 343.236,18.024 C342.672,17.856 341.676,17.448 341.04,16.416 Z M354.672,13.524 L353.388,14.124 C353.28,13.728 352.86,13.104 352.032,13.104 C351.204,13.104 350.544,13.764 350.544,14.964 C350.544,16.044 351.108,16.836 352.056,16.836 C352.968,16.836 353.316,16.14 353.496,15.66 L354.732,16.308 C354.264,17.604 353.076,18.18 352.032,18.18 C350.364,18.18 349.056,16.896 349.056,15 C349.056,13.164 350.376,11.82 352.08,11.82 C353.592,11.82 354.36,12.828 354.672,13.524 Z M355.548,9.612 L356.976,9.612 L356.976,11.064 L355.548,11.064 L355.548,9.612 Z M355.548,12 L356.976,12 L356.976,18 L355.548,18 L355.548,12 Z M362.964,15.948 L364.188,16.656 C363.444,17.652 362.484,18.18 361.26,18.18 C359.688,18.18 358.176,17.184 358.176,14.976 C358.176,12.96 359.472,11.82 361.164,11.82 C362.748,11.82 363.408,12.768 363.528,12.948 C364.02,13.644 364.128,14.688 364.14,15.288 L359.7,15.288 C359.868,16.236 360.456,16.776 361.404,16.776 C362.388,16.776 362.784,16.2 362.964,15.948 Z M359.748,14.232 L362.556,14.232 C362.424,13.296 361.848,12.972 361.212,12.972 C360.444,12.972 359.916,13.416 359.748,14.232 Z M365.268,18 L365.268,12 L366.72,12 L366.72,12.708 C366.792,12.6 366.936,12.408 367.188,12.24 C367.548,11.976 368.1,11.82 368.568,11.82 C369.252,11.82 369.84,12.132 370.14,12.54 C370.512,13.044 370.512,13.692 370.512,14.472 L370.512,18 L369.084,18 L369.084,14.94 C369.084,14.496 369.084,14.196 369.036,14.028 C368.904,13.5 368.52,13.224 368.052,13.224 C367.584,13.224 367.152,13.5 366.948,13.896 C366.72,14.34 366.72,14.952 366.72,15.396 L366.72,18 L365.268,18 Z M377.16,13.524 L375.876,14.124 C375.768,13.728 375.348,13.104 374.52,13.104 C373.692,13.104 373.032,13.764 373.032,14.964 C373.032,16.044 373.596,16.836 374.544,16.836 C375.456,16.836 375.804,16.14 375.984,15.66 L377.22,16.308 C376.752,17.604 375.564,18.18 374.52,18.18 C372.852,18.18 371.544,16.896 371.544,15 C371.544,13.164 372.864,11.82 374.568,11.82 C376.08,11.82 376.848,12.828 377.16,13.524 Z M382.452,15.948 L383.676,16.656 C382.932,17.652 381.972,18.18 380.748,18.18 C379.176,18.18 377.664,17.184 377.664,14.976 C377.664,12.96 378.96,11.82 380.652,11.82 C382.236,11.82 382.896,12.768 383.016,12.948 C383.508,13.644 383.616,14.688 383.628,15.288 L379.188,15.288 C379.356,16.236 379.944,16.776 380.892,16.776 C381.876,16.776 382.272,16.2 382.452,15.948 Z M379.236,14.232 L382.044,14.232 C381.912,13.296 381.336,12.972 380.7,12.972 C379.932,12.972 379.404,13.416 379.236,14.232 Z" id="Museum-of-Science" fill="#000"></path>
                </g>
            </g>
            </svg>
        </a>
      </div>
    </div>
  </div>

  <div class="header-middle">
    <!-- <button class="mobile-menu-toggle fa fa-navicon"><span class="show-for-sr toggle-text">Click to open menu</span></button> -->
    <div class="row">

      <?php // ==== Product Logo ==== //?>
      <div class="product-logo col-sm-4">
        <?php if ($site_name || $site_slogan): ?>
            <?php if ($site_name): ?>
              <h1 class="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?>
                  <img alt="EiE Logo" src="/sites/all/themes/eie_theme/logo.svg" />
                </a>
              </h1>
            <?php endif; ?>
            <?php if ($site_slogan): ?>
              <p class="site-slogan element-invisible"><?php print $site_slogan; ?></p>
            <?php endif; ?>
        <?php endif; ?>
      </div>

      <?php // ==== Persistent Nav ==== //?>
      <div class="persistent-nav small-8 columns">
        <?php
        // wmm - changes
          //$utility_menu_tree1 = menu_navigation_links('menu-utility-navigation');
          $utility_menu_tree1 = menu_tree(variable_get('utility_menu_links_source', 'menu-utility-navigation'));
          //print render($utility_menu_tree1);
          print render($page['header_utility']);
          // eie shop
          print '<div class="shop-eie-link">
                    <a class="shop-eie" href="http://www.eiestore.com/" target="_blank">EiE Store</a>
                </div>';
        ?>

        <?php print render($page['header_middle']); ?>
      </div>
    </div>
  </div>

  <?php
  /*  ==========================================================================
      Header Bottom
      ========================================================================== */ ?>
    <div class="header-main-menu">
        <nav class="main-nav">
            <?php print render($page['header_main_menu']); ?>
        </nav>
    </div>
    <div class="header-bottom" scroll="no" style="overflow:hidden;">
      <?php print render($page['header_bottom']); ?>
      <?php
      /*  ======================================================================
          Slideshow
          ====================================================================== */   ?>
        <?php if (drupal_is_front_page()): ?>
          <div id="slideshow" class="slideshow-region">
            <div class="section">
              <?php if ($page['slideshow']): ?>
                <?php print render($page['slideshow']); ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
    </div>

</header>

<?php
/*  ==========================================================================
    Main
    ========================================================================== */ ?>

<main class="main">

  <div class="main-container <?php print $main_container_class; ?>">
    <?php //<a id="main-content"></a>// ?>

    <?php
    //  Sidebar First Region
    //  ====================
    // <?php if ($title == "EiE News"): ?>
      <?php if ($title == "EiE News"): ?>
      <div class="sidebar small-12 medium-3 columns">
        <h2 class="more-in-this-section"><a href="#">More in this Section...</a><span class="toggle-text-state show-for-sr">Click to open if on a mobile device</span></h2>
        <?php print render($page['sidebar_first']); ?>
      </div>
    <?php endif; ?>

    <?php
    //  Content
    //  =======  ?>
    <div class="main-content<?php print ' ' . $content_grid_classes; ?>
    <?php if ($title == "EiE News"): ?>
    medium-9-newshack
    <?php endif; ?>
    ">
      <?php
      //  Messages
      //  ========  ?>
      <?php if ($messages): ?>
        <div class="messages">
          <?php print $messages; ?>
        </div>
      <?php endif; ?>

      <?php
      //  Admin Tabs & Links
      //  ==================  ?>
      <?php if ($tabs || $action_links): ?>
        <div class="admin-tabs">
          <?php print render($tabs); ?>
          <?php print render($action_links); ?>
        </div>
      <?php endif; ?>
      <?php print render($page['help']); ?>

      <?php
      //  Breadcrumbs
      //  ===========  ?>
      <?php if ($breadcrumb): ?>
        <?php print $breadcrumb; ?>
      <?php endif; ?>

      <?php
      //  Content Top
      //  ===========  ?>
      <div class="content-top-region">

        <?php
        //  Title
        //  =====  ?>
        <?php if ($title): ?>
          <h1 class="page-title"><?php print $title; ?></h1>
        <?php endif; ?>

        <?php
        //  Content Top
        //  (Intro text, etc.)
        //  ==================  ?>
        <?php if ($page['content_top']): ?>
          <?php print render($page['content_top']); ?>
        <?php endif; ?>
      </div>

      <div class="content-region <?php print $content_region_row; ?>">
        <?php
        //  Content Region
        //  ==============  ?>
        <div class="content-inner <?php print $content_inner_grid_classes; ?>">
          <?php print render($page['content']); ?>
        </div>

        <?php
        //  Content Sidebar
        //  (Sidebar Second Region)
        //  =======================  ?>
        <?php if ($page['sidebar_second']): ?>
          <div class="content-sidebar <?php print $content_sidebar_classes; ?>">
            <?php print render($page['sidebar_second']); ?>
          </div>
        <?php endif; ?>
      </div>

      <?php
      //  Content Sidebar
      //  (Sidebar Second Region)
      //  =======================  ?>
      <?php if ($page['content_bottom']): ?>
        <div class="content-bottom-region">
          <?php print render($page['content_bottom']); ?>
        </div>
      <?php endif; ?>

    </div>
  </div>

  <?php
  //  Content Bottom Full Width
  //  =======================  ?>
  <?php if (isset($basic_page_cards)): ?>
    <div class="content-bottom-full-width-region">
      <?php print render($basic_page_cards); ?>
    </div>
  <?php endif; ?>

</main>


<?php
/*  ==========================================================================
    Footer
    ========================================================================== */ ?>

<div class="footer">
    <div class="row">

        <?php
        //  Footer Resources & Links
        //  ========================  ?>
        <div class="footer-resources small-10 columns">

            <?php
            //  Footer Row 1
            //  ============ ?>
            <?php print render($page['footer_row_1']); ?>

            <?php
            //  Footer Row 2
            //  ============ ?>
            <?php print render($page['footer_row_2']); ?>


        </div>

        <?php
        //  Footer Logo Right
        //  =================  ?>
        <div class="footer-logo small-2 columns">
            <a href="http://www.mos.org/" target="_blank">Museum of Science</a>
        </div>
    </div>
</div>
