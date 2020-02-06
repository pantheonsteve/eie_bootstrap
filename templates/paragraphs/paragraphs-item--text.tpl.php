<?php
  $title = render($content['field_text_title']);
  $video = render($content['field_text_video']);
?>
<section id="<?php print $paragraph_id; ?>" class="section--global-spacing mobile-block-stack section--text clearfix">

  <div class="row">
    <div class="column small-12">
      <!-- Title -->
      <?php if($title): ?>
        <h4><?php print $title; ?></h4>
      <?php endif; ?>

      <!-- Text -->
      <p><?php print render($content['field_text_desc']); ?></p>

      <!-- Video -->
      <?php if($video):?>
        <div><?php print $video; ?></div>
      <?php endif; ?>

    </div>
  </div><!-- /.row -->
</section>
