<?php $desc = render($content['field_robust_card_description']); ?>
<?php $cta_link = render($content['field_robust_card_cta_button']); ?>
<?php $cta_text = render($content['field_component_cta_link_title'])?>
<div class="small-12 medium-4 columns">
  <article class="strong-messaging-item robust-card <?php print $button_style; ?>">
    <?php if($cta_link): ?>
      <a href='<?php print $cta_link; ?>'>
    <?php else: ?>
      <div class="non-anchor">
    <?php endif; ?>
    
      <!-- Icon -->
      <div class="section--robust-cards__img">
        <?php print render($content['field_robust_card_image']); ?>
      </div>
      
      <div class="section--robust-card__content-container">
        <!-- Title -->
        <h3 class="strong-messaging-item__title h2">
          <?php print render($content['field_robust_card_title']); ?>
        </h3>
    
        <!-- Description -->
        <?php if($desc): ?>
          <div class="strong-messaging-item__desc">
            <p><?php print $desc; ?></p>
          </div>
        <?php endif ?>
        
        <!-- CTA Button -->
        <?php if($cta_link && $cta_text): ?>
          <span class="btn"><?php print $cta_text; ?></span>
        <?php endif ?>
      </div>
    <?php if($cta_link): ?>
      </a>
    <?php else: ?>
      </div>
    <?php endif ?>
  </article>
</div>