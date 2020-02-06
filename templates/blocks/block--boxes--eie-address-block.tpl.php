<?php if($attributes): ?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
<?php endif; ?>

  <?php print render($title_prefix); ?>
<?php if ($block->subject): ?>
  <h3<?php print $title_attributes; ?>><?php print $block->subject ?></h3>
<?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="content address-block"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>

<?php if($attributes): ?>
</div>
<?php endif; ?>