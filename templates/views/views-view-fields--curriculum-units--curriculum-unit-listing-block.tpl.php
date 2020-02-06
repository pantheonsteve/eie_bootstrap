<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<?php 
  // Getting unit thumbnail image so we can use later as a background-image inline
  $row_index = $view->row_index;
  $unit_thumbnail_image_uri = $view->result[$row_index]->_field_data['nid']['entity']->field_unit_thumbnail_image['und'][0]['uri'];
  if (isset($unit_thumbnail_image_uri)) {
    $unit_thumbnail_image_src = image_style_url('medium', $unit_thumbnail_image_uri);
  }
?>

<a href="<?php print $fields['path']->content; ?>">

<div class="unit-subtitle">
  <?php print $fields['field_subtitle']->content; ?>
</div>

<div class="unit-content">
  
  <?php if (isset($unit_thumbnail_image_src)): ?>
    <div class="unit-image" style="background-image: url(<?php print $unit_thumbnail_image_src ?>);">
      <?php // print $fields['field_unit_thumbnail_image']->content; ?>
    </div>
  <?php endif; ?>

  <div class="unit-title">
    <?php print $fields['title']->content; ?>
  </div>

  <div class="unit-terms">  
    <?php print $fields['field_science_category']->content; ?>
    <?php print $fields['field_grade']->content; ?>
    <?php print $fields['field_curriculum_unit_audience']->content; ?>    
  </div>

</div>

<?php if (isset($fields['field_engineering']->content)): ?>
  <div class="unit-field">
    <?php print $fields['field_engineering']->content; ?>
  </div>
<?php endif; ?>

</a>
