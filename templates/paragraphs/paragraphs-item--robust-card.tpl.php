<?php
  $sect_title = render($content['field_card_title']);
  $sect_desc = render($content['field_card_desc']);
?>
<section id="<?php print $paragraph_id; ?>" class="section--global-spacing mobile-block-stack section--strong-messaging section--robust-cards clearfix">
  <div class="row"> <div class="column small-12">    
  
  <!-- Section Title -->
  <?php if($sect_title): ?>
    <h4><?php print $sect_title; ?></h4>
  <?php endif; ?>

  <!-- Section Desc -->
  <?php if($sect_desc): ?>
    <p><?php print $sect_desc; ?></p>
  <?php endif; ?>

  </div></div><!-- /.row -->

  <!-- Icon Components -->
  <div class="row">
    <?php print render($content['field_robust_card_cards']); ?>
  </div>
</section>