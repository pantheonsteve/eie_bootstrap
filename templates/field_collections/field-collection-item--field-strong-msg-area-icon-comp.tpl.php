<div class="small-12  columns scale-up-down animate fade-in strong-messaging-column">
  <article class="strong-messaging-item">
    <a href="<?php print render($content['field_component_cta_link'])?>">
      <!-- Icon -->
      <div class="strong-messaging-item__img">
        <?php print render($content['field_component_image']); ?>
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