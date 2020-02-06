<?php $product_link = render($content['field_component_cta_link']); ?>

<div class="small-6 large-3 medium-4 columns">
  <?php if ($product_link): ?>
  <a class="basic-card" href="<?php print $product_link; ?>">
  <?php else: ?>
  <article class="basic-card">
  <?php endif ?>
    <!-- Image -->
    <div class="basic-cards__img">
      <?php print render($content['field_basic_card_image']); ?>
    </div>
    <!-- Title -->
      <h2 class="h5"><?php print render($content['field_basic_card_title']); ?></h2>
  <?php if ($product_link): ?>
  </a>
  <? else: ?>
  </article>
  <?php endif ?>
</div>