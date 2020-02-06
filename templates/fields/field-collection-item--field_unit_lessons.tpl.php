<?php

/**
 * @file
 * Default theme implementation for field collection items.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) field collection item label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-field-collection-item
 *   - field-collection-item-{field_name}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
<div class="unit-lesson <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>

    <div class="unit-lesson--title" id="nav-lesson<?php print $id; ?>">
      <h4>
      <?php
        print render($content['field_lesson_number']);
      ?>
      </h4>
      <h3><?php print render($content['field_lesson_title']); ?></h3>
    </div>

    <?php if ($content['field_lesson_image']): ?>
      <div class="unit-lesson--image">
        <?php print render($content['field_lesson_image']); ?>
      </div>
    <?php endif; ?>

    <div class="unit-lesson--body">
      <?php print render($content['field_lesson_content']); ?>
      <?php print render($content['field_lesson_purchase_link']); ?>
    </div>

    <div class="unit-lesson--materials">
      <h3 class="mobile-accordion-toggle">Supporting Materials for this Lesson</h3> <!-- ACCORDION TOGGLE -->
      <div class="mobile-accordion-content">
         <div class="materials-row">
           <div class="materials-sample-video">
            <?php if($show_sample_video_title): ?>
              <h6>Sample Classroom Video</h6>
            <?php endif; ?>
  
            <div class="video-content">
              <?php if($show_video_tabs): ?>
                <div class="video-tabs">
  
                  <ul class="video-part-tabs">
                    <?php for($i = 0; $i < count($content['field_lesson_videos']['#items']); $i++): ?>
                      <?php if(isset($content['field_lesson_tabs'][$i]) && !empty($content['field_lesson_tabs'][$i])): ?>
  
                        <li><a href="#lesson-part<?php print ($i + 1); ?>">
                          <?php print render($content['field_lesson_tabs'][$i]); ?>
                        </a></li>
  
                      <?php else: ?>
  
                        <li><a href="#lesson-part<?php print ($i + 1); ?>">
                          <?php print t('Part '. ($i + 1)); ?>
                        </a></li>
  
                      <?php endif; ?>
                    <?php endfor; ?>
                  </ul>
  
                  <?php for($i = 0; $i < count($content['field_lesson_videos']['#items']); $i++): ?>
                    <div class="video-part-container" id="lesson-part<?php print ($i + 1); ?>">
                      <?php print render($content['field_lesson_videos'][$i]); ?>
                    </div>
                  <?php endfor; ?>
  
                </div>
              <?php else: ?>
  
                <?php print render($content['field_lesson_videos']); ?>
  
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
