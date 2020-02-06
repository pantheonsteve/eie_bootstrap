<?php 
// Get page fields
$fields = array(
    'field_hero', 
    'field_featured_attractions',
    'field_featured_events',
    'field_membership_photo',
    'field_membership_text',
    'field_membership_attribution',
    'field_hpa_title',
    'field_hpa_body'
);
$content = getContent($fields);
// Print header specific for homepage so that it can scroll
?>

<script>
    <!-- Facebook Pixel Code -->
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');

	fbq('init', '774683455990818');
	fbq('track', "PageView");

	/**
	 * jQuery Once Plugin v1.2
	 * http://plugins.jquery.com/project/once
	 *
	 * Dual licensed under the MIT and GPL licenses:
	 *   http://www.opensource.org/licenses/mit-license.php
	 *   http://www.gnu.org/licenses/gpl.html
	 */

	(function ($) {
		var cache = {}, uuid = 0;
		/**
		 * Filters elements by whether they have not yet been processed.
		 *
		 * @param id
		 *   (Optional) If this is a string, then it will be used as the CSS class
		 *   name that is applied to the elements for determining whether it has
		 *   already been processed. The elements will get a class in the form of
		 *   "id-processed".
		 *
		 *   If the id parameter is a function, it will be passed off to the fn
		 *   parameter and the id will become a unique identifier, represented as a
		 *   number.
		 *
		 *   When the id is neither a string or a function, it becomes a unique
		 *   identifier, depicted as a number. The element's class will then be
		 *   represented in the form of "jquery-once-#-processed".
		 *
		 *   Take note that the id must be valid for usage as an element's class name.
		 * @param fn
		 *   (Optional) If given, this function will be called for each element that
		 *   has not yet been processed. The function's return value follows the same
		 *   logic as $.each(). Returning true will continue to the next matched
		 *   element in the set, while returning false will entirely break the
		 *   iteration.
		 */
		$.fn.once = function (id, fn) {
			if (typeof id != 'string') {
				// Generate a numeric ID if the id passed can't be used as a CSS class.
				if (!(id in cache)) {
					cache[id] = ++uuid;
				}

				// When the fn parameter is not passed, we interpret it from the id.
				if (!fn) {
					fn = id;
				}
				id = 'jquery-once-' + cache[id];
			}

			// Remove elements from the set that have already been processed.
			var name = id + '-processed';
			var elements = this.not('.' + name).addClass(name);

			return $.isFunction(fn) ? elements.each(fn) : elements;
		};
		/**
		 * Filters elements that have been processed once already.
		 *
		 * @param id
		 *   A required string representing the name of the class which should be used
		 *   when filtering the elements. This only filters elements that have already
		 *   been processed by the once function. The id should be the same id that
		 *   was originally passed to the once() function.
		 * @param fn
		 *   (Optional) If given, this function will be called for each element that
		 *   has not yet been processed. The function's return value follows the same
		 *   logic as $.each(). Returning true will continue to the next matched
		 *   element in the set, while returning false will entirely break the
		 *   iteration.
		 */
		$.fn.removeOnce = function (id, fn) {
			var name = id + '-processed';
			var elements = this.filter('.' + name).removeClass(name);

			return $.isFunction(fn) ? elements.each(fn) : elements;
		};
	})(jQuery);
</script>

<noscript>
	<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=774683455990818&ev=PageView&noscript=1" alt="null" />
</noscript>
<!-- End Facebook Pixel Code -->

<!-- 
Start of global snippet: Please do not remove
Place this snippet between the <head> and </head> tags on every page of your site.
-->
<!-- Global site tag (gtag.js) - Google Marketing Platform -->
<script async src="https://www.googletagmanager.com/gtag/js?id=DC-3725131"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'DC-3725131');
</script>
<!-- End of global snippet: Please do not remove -->

<?php
    $menu_node = node_load(45161341);
    $nav_items = field_get_items('node', $menu_node, 'field_navigation_item');
    $first_nav_item = field_collection_field_get_entity($nav_items[0]);
    $second_nav_item = field_collection_field_get_entity($nav_items[1]);
    $third_nav_item = field_collection_field_get_entity($nav_items[2]);
?>

<body class="bg-light">
    <div id="blue-overlay"></div>
    <div id="hero">
        <div class="hero-background-image" id="bottom"></div>
        <div class="hero-background-image" id="top"></div>
        <!-- Start of mobile nav -->
        <div class="container-fluid mobile-nav-container d-md-block d-lg-none">
            <div class="hamburger">
                <nav class="navbar navbar-light light-blue lighten-4">

                    <!-- Navbar brand -->
                    <div class="col-4">
                        <a class="navbar-brand pt-3 p-0 m-0" href="#">
                            <img class="p-0 m-0" style="background-color:#fff" src="https://mos-general-assets.s3.amazonaws.com/webrefresh/mos-square-cropped.png" width="30">
                        </a>
                    </div>
                    <div class="col-8 ml-auto text-right nav-area">
                        <a id="mobile-shopping-button" class="navbar-icons fa fa-tickets fa-lg fa-fw pale-yellow" href="#"></a>
                        <a id="mobile-ticket-button" class="navbar-icons open-schedule fa fa-clock fa-lg fa-fw pale-yellow" href="#"></a>
                        <a id="mobile-schedule-button" class="open-schedule fa fa-clock fa-lg light-purple" style="display:none;" href="#"></a>

                        <!-- Collapse button -->
                        <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                            <div class="animated-icon"><span></span><span></span><span></span><span></span></div>
                        </button>
                    </div>

                    <!-- Collapsible content -->
                    <div class="collapse navbar-collapse mobile-nav" id="navbarSupportedContent1">

                        <!-- Links -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active purple-background">
                                <form class="search" action="/search/node/" method="GET" id="search-form-mobile">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="search..." aria-label="Search" aria-describedby="search-icon" id="search-query-mobile">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="search-icon"><i
                                                    class="search-icon fa fa-search"></i></span>
                                        </div>
                                    </div>
                                    <hr>
                                </form>
                            </li>
                            
                            <li class="nav-item blue-background" data-toggle="collapse" data-target="#visit-content" aria-controls="visit-content" aria-expanded="false" aria-label="Toggle Visit Navigation">
                                <span><?php print $first_nav_item->field_menu_title['und'][0]['safe_value']; ?> <span class="float-right"><i id="visit-arrow"
                                            class="fa fa-chevron-right"></i></span></span>
                            </li>
                            <li class="collapse navbar-collapse detailed-nav" id="visit-content">
                                <div class="blue-background">
                                    <p class="text-center">
                                        <a href="/<?php print $first_nav_item->field_menu_cta['und'][0]['url']; ?>"><button class="cta blue"><?php print $first_nav_item->field_menu_cta['und'][0]['title']; ?></button></a>
                                    </p>
                                    <!-- <div class="vl"></div> -->
                                    <ul class="side-line">
                                        <?php
                                            foreach($first_nav_item->field_menu_primary_links['und'] as $item) {
                                                echo "<li>" . generateURLForNavigation($item['url'], $item['title']) . " <i class='fa fa-long-arrow-right pale-yellow'></i></li>";
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="dark-blue-background secondary-nav">
                                    <ul>
                                        <?php
                                            foreach($first_nav_item->field_menu_secondary_links['und'] as $item) {
                                               echo "<li>" . generateURLForNavigation($item['url'], $item['title']) . " <i class='fa fa-long-arrow-right'></i></li>";
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item pink-background" data-toggle="collapse" data-target="#explore-content" aria-controls="explore-content" aria-expanded="false" aria-label="Toggle Explore Navigation">
                                <span><?php print $second_nav_item->field_menu_title['und'][0]['safe_value']; ?> <span class="float-right"><i id="explore-arrow"
                                            class="fa fa-chevron-right"></i></span></span>
                            </li>
                            <li class="collapse navbar-collapse detailed-nav" id="explore-content">
                                <div class="pink-background">
                                    <p class="text-center">
                                        <a href="/<?php print $second_nav_item->field_menu_cta['und'][0]['url']; ?>"><button class="cta pink"><?php print $second_nav_item->field_menu_cta['und'][0]['title']; ?></button></a>
                                    </p>
                                    <ul>
                                        <?php
                                            foreach($second_nav_item->field_menu_primary_links['und'] as $item) {
                                                echo "<li>" . generateURLForNavigation($item['url'], $item['title']) . " <i class='fa fa-long-arrow-right pale-yellow'></i></li>";
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="dark-pink-background secondary-nav">
                                    <ul>
                                        <?php
                                            foreach($second_nav_item->field_menu_secondary_links['und'] as $item) {
                                                echo "<li>" . generateURLForNavigation($item['url'], $item['title']) . " <i class='fa fa-long-arrow-right'></i></li>";
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item orange-background" data-toggle="collapse" data-target="#support-content" aria-controls="support-content" aria-expanded="false" aria-label="Toggle Support Navigation">
                                <span><?php print $third_nav_item->field_menu_title['und'][0]['safe_value']; ?><span class="float-right"><i id="support-arrow"
                                            class="fa fa-chevron-right"></i></span></span>
                            </li>
                            <li class="collapse navbar-collapse detailed-nav" id="support-content">
                                <div class="orange-background">
                                    <p class="text-center">
                                        <a href="/<?php print $third_nav_item->field_menu_cta['und'][0]['url']; ?>"><button class="cta orange"><?php print $third_nav_item->field_menu_cta['und'][0]['title']; ?></button></a>
                                    </p>
                                    <ul>
                                        <?php
                                            foreach($third_nav_item->field_menu_primary_links['und'] as $item) {
                                                echo "<li>" . generateURLForNavigation($item['url'], $item['title']) . " <i class='fa fa-long-arrow-right pale-yellow'></i></li>";
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="dark-orange-background secondary-nav">
                                    <ul>
                                        <?php
                                            foreach($third_nav_item->field_menu_secondary_links['und'] as $item) {
                                                echo "<li>" . generateURLForNavigation($item['url'], $item['title']) . " <i class='fa fa-long-arrow-right'></i></li>";
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item nav-item-with-divider white-background">
                                <a class="utility" href="/membership">Membership</a>
                            </li>
                            <li class="nav-item utility nav-item-with-divider white-background">
                                <a class="utility" href="#">Educators</a>
                            </li>
                            <li class="nav-item utility white-background">
                                <a class="utility" href="/login">Login</a>
                            </li>
                        </ul>
                        <!-- Links -->

                    </div>
                    <!-- Collapsible content -->

                </nav>
                <!--/.Navbar-->
            </div>
        </div>
        <!-- End of mobile nav -->
        <!-- Start of desktop nav -->
        <div class="container-fluid d-none d-md-none d-lg-block nav-gradient">
            <div class="header">
                <div class="row">
                    <div class="col-md-12 pl-0 pr-0">
                        <nav class="navbar navbar-expand-lg navbar-dark utility-nav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">Membership</li>
                                <li class="nav-item">Educators</li>
                                 <?php if (!isMaintenanceModeActive()) { ?>
		<!-- NEW GLOBAL TOOLBAR -->
		<div
			ng-controller="GlobalToolbarController"
			data-poll-interval="10"
			login-url="/login"
			my-account-link="/my-account"
			ng-cloak
		 style="display: inherit;">
            <li class="nav-item">
			<a ng-if="!user.isLoggedIn && !user.isGuest" href="{{ login_url }}">Log In / Register</a>
            </li>
            
            <li class="nav-item" ng-if="user.isLoggedIn">
            <a href="{{ account_link }}" ng-disabled="disabled">{{ (user.isLoggedIn) ? 'My Account' : 'Guest' }}</a>
            </li>
            <li class="nav-item" ng-if="user.isLoggedIn">
                <a ng-show="user.isLoggedIn" id="logout" href="#" ng-click="logout()">Logout</a>
            </li>
            <li class="nav-item" ng-if="user.isGuest">
                <a ng-show="user.isGuest" id="logout" href="#" ng-click="logout()">Guest Checkout</a>
            </li>
		</div>
	<?php } ?>
                                <li><i class="fa fa-search" id="search-button-desktop"></i></li>
                                <li id="search-form-desktop-container" style="display:none;"><form id="search-form-desktop"><input type="text" placeholder="Search..." id="search-query-desktop"></form></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 p-0">
                        <nav class="navbar navbar-expand-lg pt-4 main-nav">
                            <a class="navbar-brand pl-4 ml-3" href="/"><img src="https://mosboston.github.io/MOS-Web-Mockup/assets/images/mos-logo.svg" height="36"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item dropdown p-3 ml-2 mr-2">
                                        <a class="nav-link" href="/<?php print $first_nav_item->field_menu_cta['und'][0]['url']; ?>" data-dropdown-view="#visit-menu" data-underline="#visit-underline" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <?php print $first_nav_item->field_menu_title['und'][0]['safe_value']; ?><div class="underline" id="visit-underline"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown p-3 ml-2 mr-2">
                                        <a class="nav-link" href="/<?php print $second_nav_item->field_menu_cta['und'][0]['url']; ?>" data-dropdown-view="#explore-menu" data-underline="#explore-underline" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php print $second_nav_item->field_menu_title['und'][0]['safe_value']; ?><div class="underline" id="explore-underline"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown p-3 ml-2 mr-2">
                                        <a class="nav-link" href="/<?php print $third_nav_item->field_menu_cta['und'][0]['url']; ?>" data-dropdown-view="#support-menu" data-underline="#support-underline" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php print $third_nav_item->field_menu_title['und'][0]['safe_value']; ?><div class="underline" id="support-underline"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="offset-md-2">
                    </div>
                    <div class="col-md-1 cart-container navbar navbar-expand-lg pt-4 main-nav align-items-center">
                        <a href="#">Tickets</a> <i class="fa fa-shopping-cart fa-2x pl-3" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-3 schedule-container animated slideInRight">
                        <div id="todays-schedule" class="open-schedule ml-4">
                            <p>View Today&apos;s Schedule &nbsp;<i class="fa fa-clock fa-lg peach"></i></p>
                            <hr>
                            <span>Open from 9:00 am to 4:00 pm</span>
                        </div>
                    </div>
                </div>

                <!-- Visit -->
                <div class="dropdowns d-none d-lg-block">
                    <div id="visit-menu" class="dropdown-view d-none">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="visit-img-container" id="visit-menu-cta">
                                    <div class="vist-img-content">
                                        <div class="visit-gradient">
                                            <img src="<?php print createUploadedResourceUrl($first_nav_item->field_menu_image['und'][0]['uri']); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="visit-img-container">
                                            <?php echo generateURLForNavigation($first_nav_item->field_menu_cta['und'][0]['url'], '<i class="fa ' . getFontAwesomeFromTaxonomy($first_nav_item->field_menu_cta_icon['und'][0]['tid']).'"></i> ' . $first_nav_item->field_menu_cta['und'][0]['title'], 'nav-btn-solid-large-explore'); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php generateDesktopMenuLinks($first_nav_item->field_menu_primary_links['und'], 'primary'); ?>
                            </div>
                            <div class="col-lg-4">
                                <div class="visit-container nav-secondary">
                                    <ul>
                                        <?php generateDesktopMenuLinks($first_nav_item->field_menu_secondary_links['und'], 'secondary'); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Explore -->
                    <div id="explore-menu" class="dropdown-view d-none">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="visit-img-container">
                                    <div class="visit-gradient">
                                        <img src="<?php print createUploadedResourceUrl($second_nav_item->field_menu_image['und'][0]['uri']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="visit-img-container">
                                            <?php echo generateURLForNavigation($second_nav_item->field_menu_cta['und'][0]['url'], '<i class="fa ' . getFontAwesomeFromTaxonomy($second_nav_item->field_menu_cta_icon['und'][0]['tid']).'"></i> ' . $second_nav_item->field_menu_cta['und'][0]['title'], 'nav-btn-solid-large-explore'); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php generateDesktopMenuLinks($second_nav_item->field_menu_primary_links['und'], 'primary'); ?>
                            </div>
                            <div class="col-lg-4">
                                <div class="visit-container nav-secondary">
                                    <ul>
                                        <?php generateDesktopMenuLinks($second_nav_item->field_menu_secondary_links['und'], 'secondary'); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Support -->
                    <div id="support-menu" class="dropdown-view d-none">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="visit-img-container">
                                    <div class="visit-gradient">
                                        <img src="<?php print createUploadedResourceUrl($third_nav_item->field_menu_image['und'][0]['uri']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="visit-img-container">
                                           <?php echo generateURLForNavigation($third_nav_item->field_menu_cta['und'][0]['url'], '<i class="fa ' . getFontAwesomeFromTaxonomy($third_nav_item->field_menu_cta_icon['und'][0]['tid']).'"></i> ' . $third_nav_item->field_menu_cta['und'][0]['title'], 'nav-btn-solid-large-explore'); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php generateDesktopMenuLinks($third_nav_item->field_menu_primary_links['und'], 'primary'); ?>
                            </div>
                            <div class="col-lg-4">
                                <div class="visit-container nav-secondary">
                                    <ul>
                                        <?php generateDesktopMenuLinks($third_nav_item->field_menu_secondary_links['und'], 'secondary'); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Desktop Nav -->

        <!-- Start of daily schedule -->
        <div class="menu-ds push push-right daily-schedule">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-11">
                        <div class="row">
                            <div class="col-sm-4 col-6 text-center date-chooser active">
                                May 29, 2019
                            </div>
                            <div class="col-sm-4 col-6 text-center date-chooser second">
                                May 30, 2019
                            </div>
                            <div class="col-sm-4 d-none d-sm-block text-center date-chooser third">
                                May 31, 2019
                            </div>
                        </div>
                    </div>
                    <div class="col-1 text-center date-chooser more">
                        <i class="fa fa-ellipsis-v"></i>
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-10">
                        <h2><strong>Today's Schedule</strong></h2>
                    </div>
                    <div class="col-1 d-none d-lg-block">
                        <p class="text-center"><i class="fa fa-print-me cta-icon light-purple"></i></p>
                    </div>
                    <div class="col-1">
                        <p class="text-center"><i class="fa fa-times cta-icon backBtn purple"></i></p>
                    </div>
                </div>
                <?php print views_embed_view('web_bulletin', 'hours_overrides'); ?>
                <div class="row ongoing-content-area">
                    <div class="col-12">
                        <p class="title">ONGOING </p>

                        <div class="row">
                            <div class="col-2 col-md-1 icon-area">
                                <h4><i class="fa fa-exhibits colored"></i></h4>
                            </div>
                            <div class="col-10 col-md-5">
                                <h4><a href="#">Exhibit Halls</a></h4>
                                <p><strong>9:00 am &mdash; 4:00 pm</strong></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 offset-md-1 pb-3">
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2 col-md-1 icon-area">
                                <h4><i class="fa fa-drop-in colored"></i></h4>
                            </div>
                            <div class="col-10 col-md-5">
                                <h5><a href="#">Design Challenges</a></h5>
                                <p><strong>10:00 am &mdash; 3:00 pm</strong>
                                    <br>Blue Wing, Level 1</p>
                            </div>
                            <div class="col-2 col-md-1 icon-area">
                                <h4><i class="fa fa-drop-in colored"></i></h4>
                            </div>
                            <div class="col-10 col-md-5">
                                <h5><a href="#">Hands-On Laboratory</a></h5>
                                <p><strong>10:00 am &mdash; 3:00 pm</strong>
                                    <br>Suit/Cabot Lab</p>
                            </div>
                            <div class="col-2 col-md-1 icon-area">
                                <h4><i class="fa fa-exhibits colored"></i></h4>
                            </div>
                            <div class="col-10 col-md-5">
                                <h5><a href="#">Butterfly Garden</a></h5>
                                <p><strong>9:00 am &mdash; 5:00 pm</strong>
                                    <br>Timed entry every 15 minutes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="schedule-content"></div>

            </div>
        </div>
        <!-- End of daily schedule -->

<?php
$scrolling_hero_content = field_get_items('node', $node, 'field_scrolling_hero');
$scrolling_hero_content_count = count($scrolling_hero_content);
$hero_content = array();

foreach($scrolling_hero_content as $hero_entity) {
    $hero_entity = field_collection_item_load($hero_entity['value']);
    $hero['background'] = $hero_entity->field_background_color['und'][0]['jquery_colorpicker'];
    $hero['url'] = createUploadedResourceUrl($hero_entity->field_scrolling_hero_image['und'][0]['uri']);
    $hero['mobile_url'] = createUploadedResourceUrl($hero_entity->field_m_hero_background_image['und'][0]['uri']);
    $hero['additionalInformation'] = '';
    foreach($hero_entity->field_icon_with_text['und'] as $additional_info) {
        $additional_info_entity = field_collection_item_load($additional_info['value']);
        $icon_text = $additional_info_entity->field_icon_text['und'][0]['value'];
        $icon = getFontAwesomeFromTaxonomy($additional_info_entity->field_icon['und'][0]['tid']);
        $hero['additionalInformation'] = $hero['additionalInformation'] . "<i class='fa pale-yellow " . $icon . "'></i> " . $icon_text . "<span class='spacing'></span>";
    }
    $hero['experienceType'] = "<i class='fa white " . getFontAwesomeFromTaxonomy($hero_entity->field_icon['und'][0]['tid']) . "'></i> " . $hero_entity->field_icon_text['und'][0]['value'];
    $hero['headline'] = $hero_entity->field_scrolling_hero_headline['und'][0]['value'];
    $hero['subheadline'] = $hero_entity->field_scrolling_hero_subheadline['und'][0]['value'];
    $hero['description'] = $hero_entity->field_scrolling_hero_description['und'][0]['value'];
    $hero_content[] = $hero;
}
?>

<style>
#hero {
  position: relative; 
  width: 100%;
  height: 100%;
}
.hero-background-image#top {
    position: absolute; 
    width: 100%;
    height: 100%;
    background-image: url("<?php print $hero_content[0]['url']; ?>");
    background-repeat: no-repeat;
    background-position: center;
    background-size: 2300px;
    background-color: #<?php print $hero_content[0]['background']; ?>;
    z-index: -1;
}

.hero-background-image#bottom {
    position: absolute; 
    width: 100%;
    height: 100%;
    background-image: url("<?php print $hero_content[1]['url']; ?>");
    background-repeat: no-repeat;
    background-position: center;
    background-size: 2300px;
    background-color: #<?php print $hero_content[0]['background']; ?>;
     z-index: -2;
}
</style>
    <div id="hero-content-section">
    <!-- Start of Homepage Content -->
    <div class="container-fluid gray-border">
        <div class="row">
            <div class="col-md-12 pl-lg-5 pr-lg-5">
                <div class="hero-controls">
                    <a id="hero-previous-button" role="button">
                        <i class="fa fa-up pale-yellow"></i>
                        <br>
                    </a>
                    <a id="hero-play-button" class="d-none" role="button">
                        <i class="fa fa-play pale-yellow"></i>
                        <br>
                    </a>
                    <a id="hero-pause-button" role="button">
                        <i id="hero-pause-button" class="fa fa-pause pale-yellow"></i>
                        <br>
                    </a>
                    <a id="hero-next-button" role="button">
                        <i class="fa fa-down pale-yellow"></i>
                        <br>
                    </a>
                </div>
                <div class="hero-content pb-5">
                    <h3 id="hero-experience-type-content"><?php print $hero_content[0]['experienceType']; ?></h3>
                    <h1 id="hero-headline-content"><?php print $hero_content[0]['headline']; ?></h1>
                    <h4 id="hero-subheadline-content"><?php print $hero_content[0]['subheadline']; ?></h4>
                    <h2 id="hero-description-content"><?php print $hero_content[0]['description']; ?></h2>
                    <h5 id="hero-additional-information-content"><?php print $hero_content[0]['additionalInformation']; ?></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-md-5 ml-md-5 visiting-the-museum">
        <div class="row mt-md-5">
            <div class="col-md-2 d-none d-md-block">
                <hr class="ml-md-3">
            </div>
            <div class="col-md-9 ml-md-5">
                <h2>Visiting the Museum of Science?</h2>
            </div>
        </div>
        <div class="row pt-4 ml-md-5">
            <div class="col-md-4 mb-md-5 offset-md-2">
                <h3><i class="fa fa-clock fa-lg pr-1"></i> Exhibit Halls open today from<br /><a class="time">9:00 am
                        to 4:00 pm</a></h3><br class="d-block d-md-none">
                <a href="#" class="ml-md-4 border-cta dark-bg btn-block">
                    Buy Tickets
                </a>
            </div>
            <div class="col-md-2 homepage-cta">
                <br class="d-block d-md-none"><h3><a href="#" class="underline-link dark-bg">Directions and Parking </a><i class="fa fa-arrow-right pale-yellow"></i></h3>
            </div>
            <div class="col-md-2 homepage-cta">
                <h3><a href="#" class="underline-link dark-bg">Eating at the Museum </a><i class="fa fa-arrow-right pale-yellow"></i></h3>
            </div>
            <div class="col-md-2 homepage-cta">
                <h3><a href="#" class="underline-link dark-bg">Accessibility </a><i class="fa fa-arrow-right pale-yellow"></i></h3>
            </div>
        </div>
        </div>
    </div>
    <!-- End of hero content -->
        </div>
    </div>

  <!-- Start of Just Imagine Section -->
    <?php 

    print render( field_view_field( 'node', $node, 'field_featured_attractions' ) );

    ?>
    <!-- End of Just Imagine section -->
    <!-- Start of highlighted events section -->
    <?php 

    print render( field_view_field( 'node', $node, 'field_featured_events' ) );

    ?>
    <!-- End of highlighted events section -->
    <br><br>
    <!-- Start of venue tiles -->
    <div class="container-fluid container-padding animated fadeInDown slower delay-3s">
        <div class="row">
            <div class="d-none d-md-block col-md-1 offset-md-2">
                <div class="light-blue-hr"></div>
            </div>
            <div class="col-md-9 col-12">
                <h3><strong>Ask. Imagine. Create.</strong></h3>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5 pb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-3 explore-tile pr-1 pl-1 wow fadeInUp slow">
                        <div class="purple-background">
                            <h1 class="d-none d-lg-block mb-md-0 pb-md-0"><i class="icon fa fa-featured featured-i white"></i></h1>
                            <h4 class="pt-md-1">Featured Experiences <i class="fa fa-long-arrow-right pale-yellow d-lg-none"></i></h4>
                            <p class="subline white-transparent">6 Experiences</p>
                            <div class="footer-text">
                                <p><span class="featured-attraction">Featured Experience</span><br><span
                                        class="subline white-transparent">Body Worlds</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 explore-tile pr-1 pl-1 wow fadeInDown slow">
                        <div class="light-blue-background">
                            <h1 class="d-none d-lg-block mb-md-0 pt-md-1"><i class="icon fa fa-exhibits exhibits-i white"></i></h1>
                            <h4 class="exhibits-i-h4">Exhibits <i class="fa fa-long-arrow-right pale-yellow d-lg-none"></i></h4>
                            <p class="subline white-transparent">24 Exhibits</p>
                            <div class="footer-text">
                                <p><span class="featured-attraction">Featured Exhibit</span><br><span
                                        class="subline white-transparent">Butterfly Garden</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 explore-tile pr-1 pl-1 wow fadeInUp slow">
                        <div class="dark-blue-background">
                            <h1 class="d-none d-lg-block"><i class="icon fa fa-omni omni-i white"></i></h1>
                            <h4 class="pt-md-1">Omni Films <i class="fa fa-long-arrow-right pale-yellow d-lg-none"></i></h4>
                            <p class="subline white-transparent">15 Films</p>
                            <div class="footer-text">
                                <p><span class="featured-attraction">Featured Film</span><br><span
                                        class="subline white-transparent">Volcanoes</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 explore-tile pr-1 pl-1 wow fadeInDown slow">
                        <div class="green-background">
                            <h1 class="d-none d-lg-block mb-md-0"><i class="icon fa fa-planetarium planetarium-i white"></i></h1>
                            <h4 class="planetarium-i-h4">Planetarium Shows <i class="fa fa-long-arrow-right pale-yellow d-lg-none"></i></h4>
                            <p class="subline white-transparent">8 Shows</p>
                            <div class="footer-text">
                                <p><span class="featured-attraction">Featured Show</span><br><span
                                        class="subline white-transparent">Destination Mars</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-3 explore-tile pr-1 pl-1 wow fadeInUp slow">
                        <div class="light-green-background">
                            <h1 class="d-none d-lg-block mt-md-3 mb-md-0"><i class="icon fa fa-4d fourd-i white"></i></h1>
                            <h4 class="p-md-0 m-md-0 fourd-i-h4">4-D Films <i class="fa fa-long-arrow-right pale-yellow d-lg-none"></i></h4>
                            <p class="subline white-transparent">3 Films</p>
                            <div class="footer-text">
                                <p><span class="featured-attraction">Featured Film</span><br><span
                                        class="subline white-transparent">Smallfoot</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 explore-tile pr-1 pl-1 wow fadeInDown slow">
                        <div class="light-purple-background">
                            <h1 class="d-none d-lg-block mb-md-0"><i class="icon fa fa-presentations presentations-i white"></i></h1>
                            <h4 class="presentations-i-h4">Live Presentations <i class="fa fa-long-arrow-right pale-yellow d-lg-none"></i></h4>
                            <p class="subline white-transparent">5 Presentations</p>
                            <div class="footer-text">
                                <p><span class="featured-attraction">Featured Presentation</span><br><span
                                        class="subline white-transparent">Lightning!</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 explore-tile pr-1 pl-1 wow fadeInUp slow">
                        <div class="orange-background">
                            <h1 class="d-none d-lg-block mt-md-2"><i class="icon fa fa-drop-in dropin-i white"></i></h1>
                            <h4 class="dropin-i-h4">Drop-In Activities <i class="fa fa-long-arrow-right pale-yellow d-lg-none"></i></h4>
                            <p class="subline white-transparent">8 Activities</p>
                            <div class="footer-text">
                                <p><span class="featured-attraction">Featured Activity</span><br><span
                                        class="subline white-transparent">Design Challenges</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 explore-tile pr-1 pl-1 wow fadeInDown slow">
                        <div class="maroon-background">
                            <h1 class="d-none d-lg-block mt-md-0"><i class="icon fa fa-events events-i white"></i></h1>
                            <h4 class="events-i-h4">Public Events <i class="fa fa-long-arrow-right pale-yellow d-lg-none"></i></h4>
                            <p class="subline white-transparent">14 Events</p>
                            <div class="footer-text">
                                <p><span class="featured-attraction">Featured Event</span><br><span
                                        class="subline white-transparent">Synethesia Suite</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of venue tiles -->
    <br><br>
    <!-- Start of testimonial section -->
    <div class="container-fluid container-padding">
        <div class="row">
            <div class="d-none d-md-block col-md-3 col-lg-2 offset-lg-1 wow fadeInLeft slow">
                <img width="100%" src="<?php print file_create_url($node->field_membership_photo['und'][0]['uri']); ?>" />
            </div>
            <div class="col-md-5">
                <p class="testimonial wow fadeInDown slow">"<?php print $node->field_membership_text['und'][0]['value']; ?>"</p>
                <p class="d-none d-md-block wow fadeInUp slow">
                    <i class="fa fa-quote-left orange"></i>
                    <strong><?php print $node->field_membership_attribution['und'][0]['value']; ?></strong>
                </p>
            </div>
            <div class="col-md-4 col-lg-3 wow fadeInRight slow delay-1s">
                <p><a href="#" class="btn btn-solid btn-block">Become a Member</a></p>
                <p><a href="#" class="underline-link-blue">Membership Login <i
                        class="fa fa-arrow-right orange"></i></a></p>
            </div>
        </div>
    </div>
    <p>&nbsp;</p><p>&nbsp;</p>
    <!-- End of testimonial section -->
    <!-- Start of advancement desktop section -->
    <div class="container-fluid d-none d-md-block mt-5s pl-0 pr-0">
        <div class="row">
            <div class="col-md-12 advancement-section">
                <div id="advancement">
                    <div class="row">
                        <div class="col-md-12">
                            <h1><?php print render( field_view_field( 'node', $node, 'field_hpa_title' ) ); ?></h1> 
                            <p><?php print render( field_view_field( 'node', $node, 'field_hpa_body' ) ); ?></p>
                        </div>
                    </div>
                    <div class="row ml-md-5 pl-md-5 pl-0 pr-0 ml-0 mr-0">
<!--                        Start of carousel-->
                        <style>
                            .advancement-box {
                                position: relative;
                                padding: 30px;
                                min-height: 300px;
                                margin-right: 10px;
                                margin-top: 0px;
                            }
                            
                            .advancement-box.box-1{
                                background-image: linear-gradient(225deg, #a20067, #a20067);
                                min-height: 320px;

                            }
                            
                            .advancement-box.box-2{
                                background-image: linear-gradient(227deg, #7d1ca1, #470c68);
                            }
                            
                            #advancement-carousel {
                                bottom:-100px;
                            }
                        
                        </style>
                            <div class="col-5">
                                <div id="advancement-carousel" class="carousel slide" data-ride="carousel">
                                    <?php print render( field_view_field( 'node', $node, 'field_advancement_facts' ) ); ?>
                            </div>
                        </div>
<!--                        End of carousel-->
                        <div class="col-md-1">
                            <!-- blank -->
                            <div class="advancement-control-container">
                                <a href="#advancement-carousel" id="advancement-play-button" class="yellow-controls d-none" role="button" data-slide="cycle"><i class="fa fa-play pale-yellow"></i></a>
                                <a href="#advancement-carousel" id="advancement-pause-button" class="yellow-controls" role="button" data-slide="pause"><i class="fa fa-pause pale-yellow"></i></a>
                                <a href="#advancement-carousel" class="yellow-controls" role="button" data-slide="next"><i class="fa fa-right pale-yellow"></i></a>
                                <a href="#advancement-carousel" class="yellow-controls" role="button" data-slide="prev"><i class="fa fa-left pale-yellow"></i></a>
                            </div>
                        </div>
                        <div class="col-md-3 overlap-advancement-box-3 homepage-cta">
                            <a href="#" class="border-cta dark-bg btn-block">Make a Gift</a>
                            <p>&nbsp;</p>
                            <a href="#" class="underline-link dark-bg">Giving Societies <i
                            class="fa fa-arrow-right pale-yellow"></i></a>
                            <p style="line-height: 2px;">&nbsp;</p>
                            <a class="underline-link dark-bg" href="#">Special Events <i
                            class="fa fa-arrow-right pale-yellow"></i></a>
                        </div>
                    </div>
            </div>

                <style>
                    #advancement {
                        min-height: 650px;
                        width: 100%;
                        background: linear-gradient(137deg, rgb(179,45,119, .86), rgb(71,12,104, .86)), url('https://mos-general-assets.s3.amazonaws.com/webrefresh/advancement-background.png') no-repeat;
                        background-size: cover;
                        background-position: cover;
                        background-repeat: no-repeat;
                        background-attachment: fixed !important;
                    }
                    </style>
            </div>
        </div>
    </div>
<!-- End of advancement desktop section -->

<!-- Start of advancement mobile section -->
<div class="container-fluid container-padding pt-5 d-block d-md-none events-blue-background">
        <div class="row">
            <div class="col-12 pb-3">
                <h1><?php print render( field_view_field( 'node', $node, 'field_hpa_title' ) ); ?></h1> 
                <p><?php print render( field_view_field( 'node', $node, 'field_hpa_body' ) ); ?></p>
            </div>
            <div class="col-12 control-container">
                <a class="left carousel-control controls" href="#advancement-carousel-mobile" role="button" data-slide="prev">
                    <i class="fa fa-left dark-blue"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                <a id="advancement-play-button-mobile" class="left carousel-control controls d-none" href="#advancement-carousel-mobile" role="button" data-slide="cycle">
                    <i class="fa fa-play dark-blue"></i>
                    <span class="sr-only">Play</span>
                  </a>
                <a id="advancement-pause-button-mobile" class="left carousel-control controls" href="#advancement-carousel-mobile" role="button" data-slide="pause">
                    <i class="fa fa-pause dark-blue"></i>
                    <span class="sr-only">Pause</span>
                  </a>
                <a class="right carousel-control controls" href="#advancement-carousel-mobile" role="button" data-slide="next">
                    <i class="fa fa-right dark-blue"></i>
                    <span class="sr-only">Next</span>
                  </a>
            </div>
        </div>
</div>

<div id="advancement-carousel-mobile" class="carousel slide advancement-section mobile d-block d-md-none" data-ride="carousel">
  <div class="carousel-inner">
<?php
$advancement_facts = field_get_items('node', $node, 'field_advancement_facts');
$first = true;
foreach($advancement_facts as $fact_entity) {
    $fact = field_collection_item_load($fact_entity['value']);
    $box_title = $fact->field_af_title['und'][0]['value'];
    $box_body = $fact->field_af_body['und'][0]['value'];
    if ($first) {
        echo '<div class="carousel-item active blue-background">';
    } else {
        echo '<div class="carousel-item purple-background">';
    }
    echo '<h2>' . $box_title . '</h2>';
    echo '<h3>' . $box_body . '</h3>';
    echo '</div>';
    $first = false;
}
?>
  </div>
</div>
    
<div class="container-fluid container-padding pb-5 pt-5 mb-5 d-block d-md-none events-blue-background">
        <div class="row">
            <div class="col-12">
               <p><a href="#" class="btn btn-solid btn-block">Make a Gift</a></p>
                <p>
                    <a href="#" class="underline-link-blue">Giving Societies <i class="fa fa-arrow-right orange"></i></a><br>
                    <a href="#" class="underline-link-blue">Special Events <i class="fa fa-arrow-right orange"></i></a>
                </p>
            </div>
        </div>
    </div>
<!-- End of advancement mobile section -->
    
    <div class="container-fluid container-padding pb-5">
        <div class="row">
            <div class="d-none d-md-block col-md-1 offset-md-2">
                <div class="light-blue-hr"></div>
            </div>
            <div class="col-md-9">
                <h3><strong>Lifelong Learning</strong></h3>
            </div>
        </div>
    </div>
    <?php print render( field_view_field( 'node', $node, 'field_home_page_tiles' ) ); ?>

<script>
jQuery(document).ready(function($) {
    $(document).ready(function() {
        let currentSlideReference = '.hero-background-image#top';
        let nextSlideReference = ".hero-background-image#bottom";
        let isPlaying = true;
        let index = 0;
        const images = <?php echo json_encode($hero_content); ?>;
        const desktop_images = <?php echo json_encode($hero_content); ?>;
        const mobile_images = <?php echo json_encode($hero_content); ?>;
        
        //set first background image based on screen size
        var image_url;
        if ($(window).width() <= 992) {
            $(currentSlideReference).css("background-image", "url('" + images[0].mobile_url + "')");
        } else {
            $(currentSlideReference).css("background-image", "url('" + images[0].url + "')");
        }

        function playSlideshow() {
            if (isPlaying) {
                index++;
                if (index == images.length) {
                    index = 0;
                }
                nextSlide(index);
            }
            setTimeout(playSlideshow, 14000);
        }

        function toggleSlideshow() {
            isPlaying = !isPlaying;
        }

        function nextSlide(index) {
            // Update bottom div to be upcoming image
            var image_url;
            if ($(window).width() <= 992) {
                image_url = images[index].mobile_url;
            } else {
                image_url = images[index].url;
            }
            $(nextSlideReference).css("background-image", "url('" + image_url + "')");
            $(nextSlideReference).css("background-color", "#" + images[index].background);
            $(".hero-content").css({
                opacity: 0,
                transition: 'opacity .5s'
            });
            $(currentSlideReference).css({
                opacity: 0,
                transition: 'opacity .5s',
                'transition-delay': '.5s'
            }).slideUp(1000, function() {
                // Callback function
                // Update text
                $("#hero-headline-content").html(images[index].headline);
                $("#hero-description-content").html(images[index].description);
                $("#hero-subheadline-content").html(images[index].subheadline);
                $("#hero-additional-information-content").html(images[index].additionalInformation);
                $("#hero-experience-type-content").html(images[index].experienceType);
                $(".hero-content").css({
                    opacity: 1,
                    transition: 'opacity 1s'
                });
                // Change z-index
                $(nextSlideReference).css("z-index", "-1");
                $(currentSlideReference).css("z-index", "-2");
                // Move image back down behind current image
                $(currentSlideReference).css({
                    opacity: 1,
                    transition: 'opacity 0s'
                }).slideDown();
                // Swap variables of current and next slides
                const temp = currentSlideReference;
                currentSlideReference = nextSlideReference;
                nextSlideReference = temp;
            });
        }

        setTimeout(playSlideshow, 14000);

        // Hero next button
        $('#hero-next-button').click(function() {
            index++;
            if (index == images.length) {
                index = 0;
            }
            nextSlide(index);
            if (isPlaying) {
                $('#hero-play-button').toggleClass("d-none");
                $('#hero-pause-button').toggleClass("d-none");
                isPlaying = false;
            }
        });

        // Hero previous button
        $('#hero-previous-button').click(function() {
            index--;
            if (index < 0) {
                index = images.length - 1;
            }
            nextSlide(index);
            if (isPlaying) {
                $('#hero-play-button').toggleClass("d-none");
                $('#hero-pause-button').toggleClass("d-none");
                isPlaying = false;
            }
        });

        // Hero play/pause
        $('#hero-play-button').click(function() {
            $(this).toggleClass("d-none");
            $('#hero-pause-button').toggleClass("d-none");
            toggleSlideshow();
        });
        $('#hero-pause-button').click(function() {
            $(this).toggleClass("d-none");
            $('#hero-play-button').toggleClass("d-none");
            toggleSlideshow();
        });

    });

});
    </script>

<?php
print render($page['footer']);
?>