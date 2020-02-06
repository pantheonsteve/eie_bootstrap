<div class="small-12 medium-6 columns">
  <article class="strong-messaging-item cta-block scale-up-down animate fade-in">
    <a href="<?php print render($content['field_component_cta_link'])?>">
      <!-- Icon -->
      <div class="strong-messaging-item__img cta-block__icon">
        <span class="fa fa-<?php print render($content['field_cta_block_icon']); ?> fa-fw" aria-hidden="true"></span>
      </div>
      <!-- Title -->
      <h3 class="strong-messaging-item__title h2">
        <?php print render($content['field_component_title']); ?>
      </h3>
  
      <!-- Description -->
      <div class="strong-messaging-item__desc">
        <p><?php print render($content['field_component_description']); ?></p>
      </div>
      <!-- CTA Link -->
        <span class="btn"><?php print render($content['field_component_cta_link_title']); ?></span>
    </a>
  </article>
</div>
