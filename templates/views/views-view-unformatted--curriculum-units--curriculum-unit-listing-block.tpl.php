<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<?php foreach ($rows as $id => $row): ?>
  <?php if($id % 4 == 0){ print '<div class="curriculum-unit-block-row">'; } ?>
    <div <?php if ($classes_array[$id]) { print 'class="' . $classes_array[$id] .'"';  } ?>>
      <?php print $row; ?>
    </div>
  <?php if($id % 4 == 3){ print '</div>'; } ?>
<?php endforeach; ?>