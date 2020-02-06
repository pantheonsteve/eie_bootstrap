<?php $image = render($content['field_product_card_image']); ?>
<?php $subtitle = render($content['field_product_card_subtitle']); ?>
<?php $school_class = render($content['field_product_card_school']); ?>
<?php $copyright = render($content['field_product_copyright']); ?>

<?php if($school_class): ?>
  <article class="product-card box-shadow-resting fade-in animate <?php print $school_class; ?>">
<?php else: ?>
  <article class="product-card box-shadow-resting fade-in animate">
<?php endif; ?>
  <a href="<?php print $term_url; ?>">

  <!-- We animate the border on hover - as a separate div 
       it eliminates jumpiness between toggled states -->
  <div aria-hidden="true" class="product-card__border"></div>

    <!-- Image -->
    <?php if($image): ?>
    <div class="small-12 medium-6">
      <?php print $image; ?>
    </div>
    <?php endif; ?>
  
    <div class="small-12 medium-6">
      <div class="product-card__content">
        <!-- Subtitle -->
        <?php if($subtitle): ?>
          <span class="product-card__subtitle"><?php print $subtitle; ?></span>
        <?php endif; ?>

        <h4 class="h1">
          <!-- Term name -->
          <?php print $term_name; ?>
          <!-- Copyright Superscript -->
          <?php if($copyright): ?>
            <?php if($copyright == 'copyright-tm'): ?>
              <sup>&trade;</sup>
            <?php elseif($copyright == 'copyright-registered'): ?>
              <sup>&reg;</sup>
            <?php endif; ?>
          <?php endif; ?>
        </h4>
      </div>
    </div>
  </a>
</article>