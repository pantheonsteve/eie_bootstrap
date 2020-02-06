<?php
  $title = render($content['field_component_title']);
  $desc = render($content['field_component_description']);
?>
<section id="<?php print $paragraph_id; ?>" class="section--global-spacing section--button clearfix">
  <div class="row">
    
  <div class="column small-12">    
    <!-- Title -->
    <?php if($title): ?>
      <div class="section--button__title-column">
        <h4><?php print $title; ?></h4>
      </div>
    <?php endif; ?>

    <!-- Desc -->
    <?php if($desc): ?>
      <div class="section--button__desc-column">
        <p><?php print $desc; ?></p>
      </div>
    <?php endif; ?>
    
    <!-- CTA Button -->
    <div class="section--button__btn-column">
      <?php print render($content['field_component_cta_link']); ?>
    </div>
    
    </div>
  </div>  
  </div>
</section>
