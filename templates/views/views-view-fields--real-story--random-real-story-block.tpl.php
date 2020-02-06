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
<div class="real-story">
  <div class="real-story--row">


    <?php if(isset($fields['field_real_story_photo'])): ?>
      <div class="real-story--photo">
        <?php print $fields['field_real_story_photo']->content; ?>
      </div>
    <?php else: ?>
      <div class="real-story--statistic">
        <div class="real-story--statistic--value">
          <?php print $fields['field_real_story_statistic']->content; ?>
        </div>
        <div class="real-story--statistic--text">
          <?php print $fields['field_real_story_statistic_text']->content; ?>
        </div>
      </div>
    <?php endif; ?>
    
    <div class="real-story--body">
      <div class="real-story--body--quote">
        <?php print $fields['body']->content; ?>
      </div>
      <div class="real-story--body--cite">
        
        <?php if (isset($fields['field_real_story_quoted_person']->content)): ?>
          <div class="real-story--body--person">
            <?php print $fields['field_real_story_quoted_person']->content; ?>
          </div>
        <?php endif; ?>
      
        <?php if (isset($fields['field_real_story_source']->content)): ?>
          <div class="real-story--body--source">
            <?php print $fields['field_real_story_source']->content; ?>
          </div>
        <?php endif; ?>
      
      </div>
    </div>
    
  </div>
</div>