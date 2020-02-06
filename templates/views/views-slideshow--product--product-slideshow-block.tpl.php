<?php

/**
 * @file
 * Default views template for displaying a slideshow.
 *
 * - $view: The View object.
 * - $options: Settings for the active style.
 * - $rows: The rows output from the View.
 * - $title: The title of this group of rows. May be empty.
 *
 * @ingroup views_templates
 */
?>

<div class="header-slider skin-<?php print $skin; ?>">
  <?php if (!empty($top_widget_rendered)): ?>
    <div class="header-slider--controls-top">
      <div class="views-slideshow-controls-top clearfix">
        <?php print $top_widget_rendered; ?>
      </div>
    </div>
  <?php endif; ?>
  
  <div class="header-slider--main">
    <?php print $slideshow; ?>
  </div>

  <?php if (!empty($bottom_widget_rendered)): ?>
    <div class="header-slider--controls-bottom">
      <div class="views-slideshow-controls-bottom clearfix">
        <?php print $bottom_widget_rendered; ?>
      </div>
    </div>
  <?php endif; ?>
</div>