<?php 
  // Grab image src to use as background image inline
  $img_src = file_create_url($view->result[$count]->field_field_product_slide_image[0]['raw']['uri']); 
?>

<div class="header-slider--slide-item <?php print $classes; ?>" id="views_slideshow_cycle_div_<?php print $variables['vss_id']; ?>_<?php print $variables['count']; ?>" style="background: url(<?php print $img_src; ?>) no-repeat center center; background-size: cover;">
  <?php print $rendered_items; ?>
</div>
