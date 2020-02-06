<section id="<?php print $paragraph_id; ?>" class="section--product-card section--global-spacing">
  <!-- Section Title -->
  <div class="row columns">
    <div class="section--product-card__description">
      <h2 class="h1"><?php print render($content['field_section_title']); ?></h2>
      <p><?php print render($content['field_section_description']); ?></p>
    </div>
  </div>
  <!-- Card Components -->
  <div class="row columns">
    <?php print render($content['field_product_card_components']); ?>
  </div>
</section>