<?php $image = render($content['field_component_image']); ?>
<?php $video = render($content['field_component_video_embed']); ?>
<?php $video_cb = render($content['field_component_video_embed_cb']); ?>
<?php $title = render($content['field_component_title']); ?>
<?php $description = render($content['field_component_description']); ?>
<?php $cta_button = render($content['field_component_cta_link']); ?>

<div class="row row-reverse--medium--odd columns">
  <!-- Image/Video -->
  <div class="small-12 medium-6 fade-in-down animate">
    <?php if($video && $colorbox_enabled): ?>
      <div class="video-<?php print $colorbox_enabled; ?>">
        <?php print render($video_cb); ?>
        <a class="play-button colorbox" href=""><i class="fa fa-play"></i></a>
      </div>
      <?php print render($video); ?>
    <?php elseif ($video): ?>
      <?php print render($video); ?>
    <?php else: ?>
      <img src="<?php print $image; ?>">
    <?php endif; ?>
  </div>

  <!-- Title -->
  <div class="small-12 medium-6 section--checkerboard__content">
    <?php if($title): ?>
      <h2 class="heading-underline"><?php print $title; ?></h2>
    <?php endif; ?>

    <!-- Description -->
    <?php if($description): ?>
      <p><?php print $description; ?></p>
    <?php endif; ?>
  
    <!-- CTA Button -->
    <?php if($cta_button): ?>
      <div class="arrow-link-container">
        <?php print $cta_button; ?>
      </div>
    <?php endif; ?>
  </div>
</div>