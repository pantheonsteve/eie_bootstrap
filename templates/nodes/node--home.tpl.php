<?php $image = render($content['field_hero_image']); ?>
<?php $video = render($content['field_home_video_url']); ?>
<?php $strong_msg_area = render($content['field_strong_messaging_area']); ?>
<?php $product_card = render($content['field_product_card']); ?>
<?php $resources_block = render($content['field_resources_block']); ?>
<?php $resources_block2 = render($content['field_cta_banner']); ?>
<?php $checkerboards = render($content['field_checkerboards']); ?>
<?php $cta_bar = render($content['field_cta_bar']); ?>

<!-- Header Image/Video -->
<!-- Image/Video Hero -->
<section <?php if ($video) : ?>id="hero-video"<?php endif; ?> class="video-container hero hero--video hero--home parallax">
  <?php if ($video) : ?>
    <div aria-hidden="true" class="hero__overlay hero__overlay--img"></div>
      <div class="video-feature">
        <video preload="none" loop muted poster="<?php print $image; ?>">
          <source src="<?php print $video; ?>">
        </video>
        <img class="video-feature--mobile-img" src="<?php print $image; ?>">
      </div>
    <?php else: ?>
      <div style="background-image: url('<?php print $image; ?>');" class="hero__img"></div>
    <?php endif; ?>
  <div aria-hidden="true" class="video-overlay"></div>
  <div class="hero__content">
    <div class="row">
      <h1 class="animate fade-in"><?php print $title; ?></h1>
    </div>
  </div>
</section>

<div class="parallax-overlay clearfix">

  <!-- Strong Messaging Area -->
  <?php if($strong_msg_area): ?>
    <div class="home-strong-message">
      <?php print $strong_msg_area; ?>
    </div>
  <?php endif; ?>

  <!-- Product Card -->
  <?php if($product_card): ?>
    <div class="product-cards-wrapper">
      <?php print $product_card; ?>
    </div>
  <?php endif; ?>

  <!-- Resources Block -->
  <?php if($resources_block): ?>
    <div class="home-resources-block">
      <?php print $resources_block; ?>
    </div>
  <?php endif; ?>

  <!-- Checkerboards -->
  <?php if($checkerboards): ?>
    <div class="home-checkerboard">
      <?php print $checkerboards; ?>
    </div>
  <?php endif; ?>

    <!-- Resources Block -->
  <?php if($resources_block2): ?>
    <div class="home-resources-block-2">
      <?php print $resources_block2; ?>
    </div>
  <?php endif; ?>

  <!-- CTA Bar -->
  <?php if($cta_bar): ?>
    <div class="home-cta-bar">
      <?php print $cta_bar; ?>
    </div>
  <?php endif; ?>
</div>
