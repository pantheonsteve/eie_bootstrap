<section id="<?php print $paragraph_id; ?>" class="section--global-padding section--global-spacing section--reasources-block clearfix">
  <div class="row columns">
    <!-- Section Title -->
    <div class="small-12 medium-7 columns section--reasources-block__title-column">
      <h2><?php print render($content['field_component_title']); ?></h2>
    </div>

    <div class="small-12 medium-5 columns">
      <p><?php print render($content['field_component_description']); ?></p>
      <!-- CTA Button -->
      <div class="btn-container">
        <?php print render($content['field_component_cta_link']); ?>
      </div>
    </div>
  </div>
</section>
