<div class="unit-lesson <?php print $classes; ?>" id="node-<?php print $node->nid; ?>" <?php print $attributes; ?>>

    <div class="unit-lesson--title" id="nav-preplesson">
      <h4>Preparatory Lesson</h4>
      <h3><?php print $title; ?></h3>
    </div>

    <div class="unit-lesson--body">
      <?php print render($content['body']); ?>
    </div>

    <div class="unit-lesson--materials">
      <h3 class="mobile-accordion-toggle">Supporting Materials for this Lesson</h3><!-- ACCORDION DROPDOWN -->
      <div class="mobile-accordion-content">
        <div class="materials-row">
          <div class="materials-videos">
            <h6>Videos</h6>
            <?php print render($content['field_lesson_part1_videos']); ?>
          </div>
          <div class="materials-lessons">
            <h6>Extension Lessons</h6>
            <?php print render($content['field_extension_lesson_intro']); ?>
            <?php print render($content['field_extension_lessons']); ?>
            <a href="<?php print $extension_lesson_query_url; ?>"><?php print t('View all Extension Lessons'); ?> &raquo;</a>
          </div>
        </div>
      </div>
    </div>

</div>
