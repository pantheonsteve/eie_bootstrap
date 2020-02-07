<?php

/**
 * Implements template_preprocess_html().
 *
 */
function eie_bootstrap_preprocess_html(&$vars) {
  // Adding jQuery UI libraries
  // See https://www.drupal.org/node/2165555
  drupal_add_library('system', 'ui.tabs');
  drupal_add_library('system', 'ui.dialog');

  global $theme_path;
  $vars['placeholders_js'] = "/$theme_path/js/placeholders.min.js";
}

/**
 * Implements template_preprocess_page().
 *
 */
function eie_bootstrap_preprocess_page(&$vars) {
  //Setting defaults
  $vars['content_inner_grid_classes'] = "";
  $vars['content_region_row'] = "";
  $vars['content_sidebar_classes'] = "";
  $vars['content_grid_classes'] = "";


  // Setting main content class variable to control containers
  $vars['main_container_class'] = 'row';

  if (isset($vars['node']) && isset($vars['main_container_class'])) {
    if ($vars['node']->type == 'curriculum_unit') {
      $vars['main_container_class'] = 'full-width';
    }
  }

  if (isset($vars['node']) && isset($vars['main_container_class'])) {
    if ($vars['node']->type == 'home') {
      $vars['main_container_class'] = 'full-width';
    }
  }


  if (isset($vars['section_title']) && isset($vars['main_container_class'])) {
    if ($vars['section_title'] == 'product-home') {
      $vars['main_container_class'] = 'full-width';
    }
  }

  if ($vars['main_container_class'] !== 'full-width') {
    // Content Region Row Class
    $vars['content_region_row'] = 'row';

    //  Adding grid classes based on sidebars
    if ( !empty($vars['page']['sidebar_first']) ) {
      $vars['content_grid_classes'] = 'small-12 medium-9 columns';
    }
    if ( empty($vars['page']['sidebar_first']) ) {
      $vars['content_grid_classes'] = 'small-12 columns';
    }
    if ( !empty($vars['page']['sidebar_first']) &&
         !empty($vars['page']['sidebar_second']) ) {
      $vars['content_inner_grid_classes'] = 'small-12 medium-8 columns';
      $vars['content_sidebar_classes'] = 'small-12 medium-4 columns';
    }
    if ( empty($vars['page']['sidebar_first']) &&
         !empty($vars['page']['sidebar_second']) ) {
      $vars['content_inner_grid_classes'] = 'small-12 medium-9 columns';
      $vars['content_sidebar_classes'] = 'small-12 medium-3 columns';
    }
    if ( !empty($vars['page']['sidebar_first']) &&
         empty($vars['page']['sidebar_second']) ) {
      $vars['content_inner_grid_classes'] = 'small-12 columns';
    }
    if ( empty($vars['page']['sidebar_first']) &&
         empty($vars['page']['sidebar_second']) ) {
      $vars['content_inner_grid_classes'] = 'small-12 columns';
    }
  }

  if(isset($vars['node']) && ($vars['node']->type == 'resource' ||
     $vars['node']->type == 'curriculum_unit')) {
    // Remove the title
    $vars['title'] = '';
  }

  if(isset($vars['node']) && ($vars['node']->type == 'home' ||
     $vars['node']->type == 'curriculum_unit')) {
    // Remove the title
    $vars['title'] = '';
  }

  // if(isset($vars['node']) && $vars['node']->type == 'page') {
  //   $basic_page = $vars['node'];
  //   $node_wrapper = entity_metadata_wrapper('node', $basic_page);
  //   $basic_page_cards = $node_wrapper->field_basic_page_cards->value();
  //   // Add cards to the Content Bottom Full Width region
  //   if(!empty($basic_page_cards)) {
  //     $vars['basic_page_cards'] = node_view($basic_page, 'cards');
  //   }
  // }

  // Taxonomy term pages
  if(arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2)) && arg(2) > 0) {
    $tid = arg(2);
    $term = taxonomy_term_load($tid);
    if($term->vocabulary_machine_name == 'product') {
      // Remove the title
      $vars['title'] = '';
    }
  }


  // Redirect Teacher Educator Resources Page
  // See MOS-330
  if ( !empty($vars['node']) && $vars['node']->nid == 3826 ) {
    if (user_is_logged_in()) {
      drupal_goto(drupal_get_path_alias('node/2992'));
    }
  }
}


/**
 * Implements template_preprocess_node().
 */
function eie_bootstrap_preprocess_node(&$vars, $hook) {

  $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];

  if($vars['type'] == 'preparatory_lesson') {
    $product = _eie_bootstrap_get_product_from_path();
    $vars['extension_lesson_query_url'] = "/$product/resources/listing?resourceType=192";
  }

  if($vars['type'] == 'resource') {
    if(!empty($vars['field_resource_curriculum_unit'])
      && !empty($vars['field_resource_curriculum_unit'][0])
      && !isset($vars['field_resource_curriculum_unit'][1])) {
      $unit_nid = $vars['field_resource_curriculum_unit'][0]['entity']->nid;
      $vars['resource_unit_url'] = '/' . drupal_get_path_alias("node/$unit_nid");
    }
    if (isset($vars['resource_unit_url'])) {
      $vars['resource_title_group_class'] = 'small-9 columns';
    }
    if (!isset($vars['resource_unit_url'])) {
      $vars['resource_title_group_class'] = 'small-12 columns';
    }

    if($vars['view_mode'] == 'resource_block') {
      // Truncate and add ellipsis
      $vars['title'] = truncate_utf8($vars['title'], 40, TRUE, TRUE);
    }
  }

  if($vars['type'] == 'curriculum_unit') {
    $show_sticky_nav = false;
    $field_curriculum_unit_sticky_nav = field_get_items('node', $vars['node'], 'field_curriculum_unit_sticky_nav');
    if($field_curriculum_unit_sticky_nav) {
      $show_sticky_nav = $field_curriculum_unit_sticky_nav[0]['value'];
    }
    $vars['show_sticky_nav'] = $show_sticky_nav;

    $has_prep_lesson = false;
    $field_preparatory_lesson = field_get_items('node', $vars['node'], 'field_preparatory_lesson');
    $has_prep_lesson = !empty($field_preparatory_lesson);
    $vars['has_prep_lesson'] = $has_prep_lesson;
  }

  if ($vars['node_url'] == '/newsletter') {
    array_unshift($vars['theme_hook_suggestions'], 'node__newsletter');
  }
  if ($vars['node_url'] == '/newsletter/archive') {
    array_unshift($vars['theme_hook_suggestions'], 'node__newsletter__archive');
  }

  // Load ShareThis block as variable based on node type
  // so we can print it in the node tpl files as needed
  switch ($vars['type']) {
    case 'eie_news':
    case 'workshop':
      $sharethis_block = block_load('sharethis','sharethis_block');
      $sharethis_render_block = _block_get_renderable_array(_block_render_blocks(array($sharethis_block)));
      $vars['sharethis'] = render($sharethis_render_block);
    break;
  }

  // Adding class to webform on contact us page
  if ($vars['node_url'] == '/contact-us') {
    if (isset($vars['webform'])) {
      $vars['content']['webform']['#form']['#attributes']['class'][] = 'contact-us-form';
    }
  }
}

/**
* Implements template_process_user().
*/
function eie_bootstrap_preprocess_user_profile(&$vars) {
  global $user;

  if ($user->uid == $vars['user']->uid) {
    $roles = array('administrator', 'editor', 'Reviewer');
    if (array_intersect($user->roles, $roles)) {
      $vars['user_profile']['summary']['resources'] = array(
        '#type' => 'user_profile_item',
        '#title' => 'Staff Resources',
        '#markup' => '<a href="/staffresources">Click Here for Staff Resources on Mini Quark</a>',
      );
    }
  }
}

/**
 * Implements template_preprocess_entity().
 */
function eie_bootstrap_preprocess_entity(&$vars) {
  if($vars['elements']['#bundle'] == 'field_unit_lessons') {
    $lesson_videos_count = count($vars['content']['field_lesson_videos']['#items']);
    $show_video_tabs = ($lesson_videos_count > 1);
    $show_sample_video_title = ($lesson_videos_count > 1 || ($lesson_videos_count == 1 && $vars['content']['field_lesson_videos']['#items'][0]['target_id'] != 3122));
    $vars['show_video_tabs'] = $show_video_tabs;
    $vars['show_sample_video_title'] = $show_sample_video_title;
  }
  if($vars['entity_type'] == 'field_collection_item') {
    $field_collection_item = $vars['field_collection_item'];
    if ($vars['elements']['#bundle'] == 'field_robust_card_cards') {
      $vars['button_style'] = $vars['field_robust_card_button_style'][0]['value'];
    }
    if ($vars['elements']['#bundle'] == 'field_checkerboard') {
      $fcwrapper = entity_metadata_wrapper('field_collection_item', $vars['field_collection_item']);
      if (isset($fcwrapper->field_component_video_colorbox)
        && $fcwrapper->field_component_video_colorbox->raw()) {
        if ($fcwrapper->field_component_video_colorbox->value() == 1) {
          $vars['colorbox_enabled'] = 'colorbox-enabled';
          $vars['content']['field_component_video_embed_cb'] = $vars['content']['field_component_video_embed'];
          $thumb = $fcwrapper->field_component_image->value()['uri'];
          $vars['content']['field_component_video_embed_cb']['#formatter'] = 'video_embed_field_thumbnail_colorbox';
          $vars['content']['field_component_video_embed_cb'][0][0]['#theme'] = 'video_embed_field_colorbox_code';
          $vars['content']['field_component_video_embed_cb'][0][0]['#video_url'] = $vars['elements']['field_component_video_embed'][0][0]['#url'];
          $vars['content']['field_component_video_embed_cb'][0][0]['#video_style'] = $vars['elements']['field_component_video_embed'][0][0]['#style'];
          $vars['content']['field_component_video_embed_cb'][0][0]['#image_url'] = $thumb;
          $vars['content']['field_component_video_embed_cb'][0][0]['#image_style'] = 'checkerboard_465w';
          //kpr($vars);
        }
      }
    }
  }

  if ($vars['entity_type'] == 'paragraphs_item') {
    $pwrapper = entity_metadata_wrapper('paragraphs_item', $vars['paragraphs_item']);
    if ($pwrapper->field_paragraph_id->raw()) {
      $vars['paragraph_id'] = $pwrapper->field_paragraph_id->value();
    } else {
      $vars['paragraph_id'] = '';
    }
  }
}

/**
 * Implements template_preprocess_field().
 */
function eie_bootstrap_preprocess_field(&$vars) {
  if($vars['element']['#field_name'] == 'field_science_category' ||
     $vars['element']['#field_name'] == 'field_grade' ||
     $vars['element']['#field_name'] == 'field_curriculum_unit_audience' ||
     ($vars['element']['#bundle'] == 'resource' && $vars['element']['#field_name'] == 'field_product') ||
     ($vars['element']['#bundle'] == 'workshop' && $vars['element']['#field_name'] == 'field_product')) {
    // Print the full taxonomy term
    foreach($vars['element']['#items'] as $delta => $item) {
      $items[$delta] = taxonomy_term_view($item['taxonomy_term']);
    }
    $vars['items'] = $items;
  }
}

/**
 * Implements hook_views_pre_render().
 */
function eie_bootstrap_views_pre_render(&$view) {
  if($view->name == 'curriculum_units') {
    // Print the full taxonomy term
    foreach($view->result as $delta => $row) {
      foreach($row->field_field_science_category as $key => $item) {
        $term_render_array = taxonomy_term_view($row->field_field_science_category[$key]['raw']['taxonomy_term']);
        $row->field_field_science_category[$key]['rendered']['#markup'] = render($term_render_array);
      }

      foreach($row->field_field_grade as $key => $item) {
        $term_render_array = taxonomy_term_view($row->field_field_grade[$key]['raw']['taxonomy_term']);
        $row->field_field_grade[$key]['rendered']['#markup'] = render($term_render_array);
      }

      foreach($row->field_field_curriculum_unit_audience as $key => $item) {
        $term_render_array = taxonomy_term_view($row->field_field_curriculum_unit_audience[$key]['raw']['taxonomy_term']);
        $row->field_field_curriculum_unit_audience[$key]['rendered']['#markup'] = render($term_render_array);
      }
    }
  }

  if($view->name == 'resource' ||
     $view->name == 'research' ||
     $view->name == 'workshops' ||
     $view->name == 'workshop_calendar' ||
     $view->name == 'news') {
    if($view->current_display == 'resource_listing_block' ||
       $view->current_display == 'research_listing_block' ||
       $view->current_display == 'workshop_listing_block' ||
       $view->current_display == 'upcoming_workshops_listing_block' ||
       $view->current_display == 'workshop_calendar_block' ||
       $view->current_display == 'news_listing_page') {
      // Print the full taxonomy term
      foreach($view->result as $delta => $row) {
        if (isset($row->field_field_product)) {
          foreach($row->field_field_product as $key => $item) {
            $term_render_array = taxonomy_term_view($row->field_field_product[$key]['raw']['taxonomy_term']);
            $row->field_field_product[$key]['rendered']['#markup'] = render($term_render_array);
          }
        }
      }
    }
  }
}

/**
 * Implements template_preprocess_views_view().
 */
function eie_bootstrap_preprocess_views_view(&$vars) {
  $view = $vars['view'];

  if($view->name == 'resource') {
    if($view->current_display == 'additional_resources_block') {
      $short_code = _eie_bootstrap_get_product_short_code();
      $block_name = $short_code . '_resource_add_resource_block';
      $block = block_load('boxes',$block_name);
      $render_block = _block_get_renderable_array(_block_render_blocks(array($block)));
      $vars['resource_content_block'] = render($render_block);
    }
    else if($view->current_display == 'videos_block') {
      $short_code = _eie_bootstrap_get_product_short_code();
      $block_name = $short_code . '_resource_video_block';
      $block = block_load('boxes',$block_name);
      $render_block = _block_get_renderable_array(_block_render_blocks(array($block)));
      $vars['resource_content_block'] = render($render_block);
    }
    else if($view->current_display == 'extension_lessons_block') {
      $short_code = _eie_bootstrap_get_product_short_code();
      $block_name = $short_code . '_resource_ext_lesson_block';
      $block = block_load('boxes',$block_name);
      $render_block = _block_get_renderable_array(_block_render_blocks(array($block)));
      $vars['resource_content_block'] = render($render_block);
    }
    else if($view->current_display == 'student_assessments_block') {
      $short_code = _eie_bootstrap_get_product_short_code();
      $block_name = $short_code . '_resource_assessment_block';
      $block = block_load('boxes',$block_name);
      $render_block = _block_get_renderable_array(_block_render_blocks(array($block)));
      $vars['resource_content_block'] = render($render_block);
    }
  }

  if($view->name == 'curriculum_unit_jump_menus') {
    if($view->current_display == 'life_science_block') {
      $tid = 164;
    }
    else if($view->current_display == 'earth_space_science_block') {
      $tid = 163;
    }
    else if($view->current_display == 'physical_science_block') {
      $tid = 165;
    }

    $term = taxonomy_term_load($tid);
    $term_view = taxonomy_term_view($term);
    $vars['science_term'] = $term_view;
  }

  // View Template Suggestions
  // Specifiy views to use views-view--no-wrapper.tpl.php
  switch($view->name) {
    case 'intro_text':
      array_unshift($vars['theme_hook_suggestions'], 'views_view__no_wrapper');
      break;
  }
  if ($view->name == 'product') {
    if($view->current_display == 'product_slideshow_block') {
      // Determine number of slide items
      // Add Class if there is only one slide item
      $number_of_slide_items = count($view->result);
      if ($number_of_slide_items <= 1) {
        $vars['classes_array'][] = 'header-slider--no-pager';
      }
    }
  }
  if ($view->name == 'featured_curriculum_unit') {
    // Get featured curriculum unit path alias
    $featured_curriculum_unit_nid = $view->result[0]->nid;
    $featured_curriculum_unit_alias = drupal_get_path_alias('node/' . $featured_curriculum_unit_nid);
    // Create var for alias for use in tpl file
    $vars['featured_curriculum_unit_alias'] = $featured_curriculum_unit_alias;
  }
}


/**
 * Implements template_preprocess_region().
 */
function eie_bootstrap_preprocess_region(&$vars, $hook) {
  // Region Template Suggestions
  // Specify cases to use region--no-wrapper.tpl.php
  switch($vars['region']) {
    case 'header_top':
    case 'header_middle':
    case 'header_main_menu':
    case 'header_bottom':
    case 'sidebar_first':
    case 'content_top':
    case 'content':
    case 'footer_row_1':
    case 'footer_row_2':
      array_unshift($vars['theme_hook_suggestions'], 'region__no_wrapper');
      break;
  }
}


/**
 * Implements template_preprocess_block().
 */
function eie_bootstrap_preprocess_block(&$vars, $hook) {
  // Block Template Suggestions
  // Specify cases to use block--no-wrapper.tpl.php
  switch($vars['elements']['#block']->bid) {
    case 'menu-menu-utility-navigation':
    case 'menu-menu-footer-links':
    case 'menu-menu-footer-links-2':
    case 'views-intro_text-intro_text':
      array_unshift($vars['theme_hook_suggestions'], 'block__no_wrapper');
      break;
  }
  // Adding classes to curriculum featured unit blocks
  switch ($vars['elements']['#block']->bid) {
    case 'views-c546b1290c0400d133dad3f8157776e5':
    case 'views-c106a2a1b2d468c456edb1597b5c56e5':
    case 'views-af1aa7ad4554f786ffdcfe85aceb92f0':
      $vars['classes_array'][] = 'featured-curriculum-unit-block';
      break;
  }
  // Horizontal shadow line break block
  if ($vars['elements']['#block']->bid == 'boxes-horizontal_shadow_line' ||
      $vars['elements']['#block']->bid == 'boxes-horizontal_shadow_line_2') {
    // remove wrappers
    array_unshift($vars['theme_hook_suggestions'], 'block__no_wrapper');
    // override output
    $vars['content'] = '<hr class="horizontal-shadow-line"></hr>';
  }
  if ($vars['elements']['#block']->bid == 'boxes-horizontal_shadow_line_top') {
    // remove wrappers
    array_unshift($vars['theme_hook_suggestions'], 'block__no_wrapper');
    // override output
    $vars['content'] = '<hr class="horizontal-shadow-line-top"></hr>';
  }
  // Adding classes to blocks
  switch ($vars['elements']['#block']->bid) {
    // Resources listing block
    case 'views-7cbd2c462b5edb740d3a84e814e9a9a4':
    case 'views--exp-news-news_listing_page';
      $vars['classes_array'][] = 'sidebar-box';
      break;
    // Research browse block
    case 'views-ddb667d0184d051694c34d126fa6ca27':
      $vars['classes_array'][] = 'sidebar-box browse-research-box';
      break;
    // Research listing block
    case 'views-research-research_listing_block':
      $vars['classes_array'][] = 'research-listing-block';
      break;
    // Featured News block
    case 'views-news-block_1':
      $vars['classes_array'][] = 'featured-news-block';
      break;
    // 3 Articles below featured news block
    case 'views-news-block_2':
      $vars['classes_array'][] = 'articles-below-featured-news';
      break;
    // 3 Articles below featured news block
    case 'views-news-block_3':
      $vars['classes_array'][] = 'more-news-block';
      break;
    // 3 Articles below featured news block
    case 'views-in_the_news-itn_listing_block':
      $vars['classes_array'][] = 'in-the-news-block';
      break;
    // Similar workshops block
    case 'views-00d8eb1bd138d0ecac2f3e9aa429cde9';
      $vars['classes_array'][] = 'sidebar-box similar-workshops-block';
      break;
    // Browse all workshops block
    case 'views-8fe7e5499a90fcd78f4c7e5ba72a9463';
      $vars['classes_array'][] = 'sidebar-box browse-all-workshops-block';
      break;
    // Upcoming workshops block
    case 'views-8e6da486919924a5ff8d32e85abe96e4';
      $vars['classes_array'][] = 'upcoming-workshops-block';
      break;
    // Workshops listing block
    case 'views-612f0e034f3fc7f13eb002a49d1d27b9';
      $vars['classes_array'][] = 'workshops-listing-block';
      break;
    case 'menu_block-14';
      $vars['classes_array'][] = 'sitemap-block eie';
      break;
    case 'menu_block-15';
      $vars['classes_array'][] = 'sitemap-block ec';
      break;
    case 'menu_block-16';
      $vars['classes_array'][] = 'sitemap-block ea';
      break;
    case 'menu_block-17';
      $vars['classes_array'][] = 'sitemap-block ee';
      break;
  }
}

// Utility Navigation
function eie_bootstrap_menu_tree__menu_utility_navigation(&$vars) {
  print '<div class="row">';
  print '<div class="small-12 columns">';
  print '<ul class="persistent-nav-links">' . $vars['tree'] . '</ul>';
  print '</div>';
  print '</div>';
}
// Footer Links
function eie_bootstrap_menu_tree__menu_footer_links(&$vars) {
  print '<div class="footer-row-1 row">';
  print '<div class="small-12 columns">';
  print '<ul class="footer-links">' . $vars['tree'] . '</ul>';
  print '</div>';
  print '</div>';
}
function eie_bootstrap_menu_tree__menu_footer_links_2(&$vars) {
  print '<div class="footer-row-2 row">';
  print '<div class="small-12 columns">';
  print '<ul class="footer-links secondary">';
  print '<li>Copyright © ' . date("Y") . ' EiE | Museum of Science, Boston</li>';
  print $vars['tree'];
  print '</ul>';
  print '</div>';
  print '</div>';
}


/**
 * Implements hook_form_alter().
 */
function eie_bootstrap_form_alter(&$form, &$form_state, $form_id) {
  // Search Form Block
  // Adding placeholder attribute "Search"
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#attributes']['placeholder'] = t('Search');
  }
}


/**
 * Implements template_preprocess_search_block_form().
 */
function eie_bootstrap_preprocess_search_block_form(&$vars) {
  // Changing input attribute type
  $vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
}


/**
 * Implements theme_status_messages().
 *
 * Adding support for Foundations alert styles so that
 * we can make Drupal feel just a little bit nicer.
 */
function eie_bootstrap_status_messages($vars) {
  $display = $vars['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );
  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= "<div data-alert class=\"$type\">\n";
    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= '<p>' . $messages[0] . '</p>';
    }
    // $output .= '<a href="#" class="close">&times;</a>';
    $output .= "</div>\n";
  }
  return $output;
}

/**
 * Implements hook_menu_breadcrumb_alter().
 *
 * Removing special menu items(<nolink>) from breadcrumb
 */
function eie_bootstrap_menu_breadcrumb_alter(&$active_trail, $item) {
  foreach($active_trail as $i => $breadcrumb){
    if($breadcrumb['href'] == "<nolink>") {
      unset($active_trail[$i]);
    }
  }
}

/**
 * Implements theme_breadcrumb().
 *
 * Changing breadcrumb markup to an unordered list structure
 */
function eie_bootstrap_breadcrumb($vars) {
  $breadcrumb = $vars['breadcrumb'];

  $crumbs = "";
  if (!empty($breadcrumb)) {
    $crumbs = '<ul class="breadcrumbs">';

    foreach($breadcrumb as $value) {
      $crumbs .= '<li>'.$value.'</li>';
    }

    $crumbs .= '</ul>';
  }
  return $crumbs;
}

function eie_bootstrap_form_views_exposed_form_alter(&$form, &$form_state) {
  if($form['#id'] == 'views-exposed-form-workshop-calendar-workshop-calendar-block') {
    $current_product_tid = _eie_bootstrap_get_product_tid();
    if($current_product_tid != 155 && isset($form['unit'])) {
      foreach($form['unit']['#options'] as $unit_nid => $unit_title) {
        if(is_int($unit_nid)) {
          $unit_entity_wrapper = entity_metadata_wrapper('node', $unit_nid);
          $product = $unit_entity_wrapper->field_product->value();
          if($product->tid != $current_product_tid) {
            unset($form['unit']['#options'][$unit_nid]);
          }
        }
      }
    }
  }
  else if($form['#id'] == 'views-exposed-form-workshops-workshop-listing-filter-page') {
    // Set the target url to the workshop listing page
    $path_alias = drupal_get_path_alias();
    $path_alias_array = explode('/',$path_alias);
    $tax_alias = $path_alias_array[0];
    $form['#action'] = "/$tax_alias/workshops-and-professional-development/workshops-listing";

    // Remove the product filter for all pages not under the main product
    $node = node_load(arg(1));
    if($node->field_product['und'][0]['tid'] != 155) {
      unset($form['product'], $form['#info']['filter-field_product_tid'], $form_state['view']->display_handler->handlers['filter']['field_product_tid'], $form_state['view']->filter['field_product_tid']);
    }
  }
  else if($form['#id'] == 'views-exposed-form-resource-resource-listing-filter-page') {
    // Set the target url to the resource listing page
    $path_alias = drupal_get_path_alias();
    $path_alias_array = explode('/',$path_alias);
    $tax_alias = $path_alias_array[0];
    $form['#action'] = "/$tax_alias/resources/listing";

    // Remove the product filter for all pages not under the main product
    $node = node_load(arg(1));
    if($node->field_product['und'][0]['tid'] != 155) {
      unset($form['product'], $form['#info']['filter-field_product_tid'], $form_state['view']->display_handler->handlers['filter']['field_product_tid'], $form_state['view']->filter['field_product_tid']);
    }

    // Remove empty filters
    if(isset($form['lesson']) && count($form['lesson']['#options']) <= 1) {
      unset($form['lesson'], $form['#info']['filter-field_lesson_number_tid_selective'], $form_state['view']->display_handler->handlers['filter']['field_lesson_number_tid_selective'], $form_state['view']->filter['field_lesson_number_tid_selective']);
    }

    if(isset($form['science']) && count($form['science']['#options']) <= 1) {
      unset($form['science'], $form['#info']['filter-field_science_category_tid_selective'], $form_state['view']->display_handler->handlers['filter']['field_science_category_tid_selective'], $form_state['view']->filter['field_science_category_tid_selective']);

    }

    if(isset($form['unit']) && count($form['unit']['#options']) <= 1) {
      unset($form['unit'], $form['#info']['filter-field_resource_curriculum_unit_target_id_selective'], $form_state['view']->display_handler->handlers['filter']['field_resource_curriculum_unit_target_id_selective'], $form_state['view']->filter['field_resource_curriculum_unit_target_id_selective']);
    }

    // Add the more and less markup to the unit filter
    if(isset($form['unit']) && count($form['unit']['#options']) > 5) {
      $more_markup = '<div><a class="listings-see-more" href="">' . t('See More') . '</a></div>';
      $less_markup = '<div><a class="listings-see-less" href="">' . t('See Less') . '</a></div>';
      $form['unit']['#suffix'] = $more_markup . $less_markup;
    }
  }
  else if($form['#id'] == 'views-exposed-form-research-research-listing-page') {
    // Set the target url to the resource listing page
    $path_alias = drupal_get_path_alias();
    $path_alias_array = explode('/',$path_alias);
    $tax_alias = $path_alias_array[0];
    $form['#action'] = "/$tax_alias/research/articles";

    // Remove the product filter for all pages not under the main product
    $node = node_load(arg(1));
    if($node->field_product['und'][0]['tid'] != 155) {
      unset($form['product'], $form['#info']['filter-field_product_tid'], $form_state['view']->display_handler->handlers['filter']['field_product_tid'], $form_state['view']->filter['field_product_tid']);
    }

    // Refactor date form field
    if(isset($form['date']) && isset($form['date']['min']) && isset($form['date']['max'])) {
      $form['date']['min']['#title'] = '';
      $toLabel = '<div>' . t('to') . '</div>';
      $form['date']['min']['#suffix'] = $form['date']['min']['#suffix'] . $toLabel;
      $form['date']['max']['#title'] = '';
    }
  }
}

function eie_bootstrap_block_view_alter(&$data, $block) {
  if($block->module == 'views' && isset($block->info) && stristr($block->info,'workshops-workshop_listing_filter_page')) {
    $data['subject'] = t('Browse All Workshops By');
  }
  else if($block->module == 'views'&& isset($block->info) && stristr($block->info,'resource-resource_listing_filter_page')) {
    $data['subject'] = t('Browse Resources By');
  }
  else if($block->module == 'views'&& isset($block->info) && stristr($block->info,'research-research_listing_page')) {
    $data['subject'] = t('Browse Research By');
  }
  else if($block->module == 'views'&& isset($block->info) && stristr($block->info,'news-news_listing_page')) {
    $data['subject'] = t('Browse News By');
  }
}

/**
 * Overrides the theme_file_link() in core in order to add a target
 * to the file link.
 *
 * Returns HTML for a link to a file.
 *
 * @param $variables
 *   An associative array containing:
 *   - file: A file object to which the link will be created.
 *   - icon_directory: (optional) A path to a directory of icons to be used for
 *     files. Defaults to the value of the "file_icon_directory" variable.
 *
 * @ingroup themeable
 */
function eie_bootstrap_file_link($variables) {
  $file = $variables['file'];
  $icon_directory = $variables['icon_directory'];

  $url = file_create_url($file->uri);
  $icon = theme('file_icon', array('file' => $file, 'icon_directory' => $icon_directory));

  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  $options = array(
    'attributes' => array(
      'type' => $file->filemime . '; length=' . $file->filesize,
    ),
  );

  // Use the description as the link text if available.
  if (empty($file->description)) {
    $link_text = $file->filename;
  }
  else {
    $link_text = $file->description;
    $options['attributes']['title'] = check_plain($file->filename);
  }

  // Set the file link target to open in a new window
  $options['attributes']['target'] = '_blank';

  return '<span class="file">' . $icon . ' ' . l($link_text, $url, $options) . '</span>';
}

/*
 * Get the product name.
 */
function _eie_bootstrap_get_product_from_path() {
  $path_alias = drupal_get_path_alias();
  $path_alias_array = explode('/',$path_alias);
  $tax_alias = $path_alias_array[0];
  return $tax_alias;
}

/*
 * Get the product short code.
 */
function _eie_bootstrap_get_product_short_code() {
  $node = node_load(arg(1));
  $product_tid = $node->field_product['und'][0]['tid'];
  $term = taxonomy_term_load($product_tid);
  $product_short_code = $term->field_product_short_code['und'][0]['value'];
  return $product_short_code;
}

/*
 * Get the product tid.
 */
function _eie_bootstrap_get_product_tid() {
  $node_wrapper = entity_metadata_wrapper('node', arg(1));
  $product = $node_wrapper->field_product->value();
  $product_tid = $product->tid;
  return $product_tid;
}

/**
 * Implements template_preprocess_calendar_item().
 */
function eie_bootstrap_preprocess_calendar_item(&$vars) {
  $view = $vars['view'];

  // Add template suggestions for calendar item
  $view_name = $view->name;
  $view_display = $view->current_display;
  $vars['theme_hook_suggestions'][] = "calendar_item__{$view_name}__{$view_display}";
}

/**
 * Implements theme_menu_link().
 *
 * Mega Menu - Regional Navigation: Menu Block
 */
function eie_bootstrap_menu_link__menu_block__19( &$vars ) {
  $element  = $vars['element'];
  $mlid     = $element['#original_link']['mlid'];
  $sub_menu = '';

  // Adding content (menu blocks) for the columns of each top level mega menu item
  switch ( $mlid ) {
    // About EIE
  case 2306:
    if ( ( $plugin = context_get_plugin('reaction', 'block'))) {
      $sub_menu = _eie_bootstrap_generate_mega_menu_content('about_eie_column_1', 'about_eie_column_2', 'about_eie_column_3', 'about-eie', $plugin);
    }
    $element['#localized_options']['attributes']['class'][] = 'global-nav-item';
    break;
    // Curriculum Products
  case 2336:
    if ( ( $plugin = context_get_plugin( 'reaction', 'block' ) ) ) {
      $sub_menu = _eie_bootstrap_generate_mega_menu_content('curric_products_column_1', 'curric_products_column_2', 'curric_products_column_3', 'curric-products', $plugin);
    }
    $element['#localized_options']['attributes']['class'][] = 'global-nav-item';
    break;
    // Professional Development
  case 2275:
    if ( ( $plugin = context_get_plugin( 'reaction', 'block' ) ) ) {
      $sub_menu = _eie_bootstrap_generate_mega_menu_content('prof_dev_column_1', 'prof_dev_column_2', '', 'professional-development', $plugin);
    }
    $element['#localized_options']['attributes']['class'][] = 'global-nav-item';
    break;
    // Video Library
  case 2291:
    if ( ( $plugin = context_get_plugin( 'reaction', 'block' ) ) ) {
      $sub_menu = _eie_bootstrap_generate_mega_menu_content('video_library_column_1', 'video_library_column_2', 'video_library_column_3', 'video-library', $plugin);
    }
    $element['#localized_options']['attributes']['class'][] = 'global-nav-item';
    break;
    // Research
  case 2234:
    if ( ( $plugin = context_get_plugin( 'reaction', 'block' ) ) ) {
      $sub_menu = _eie_bootstrap_generate_mega_menu_content('research_column_1', '', '', 'research-column', $plugin);
    }
    $element['#localized_options']['attributes']['class'][] = 'global-nav-item';
    break;
    // Contact Us

  default:
    if ( $element['#below'] ) {
      $sub_menu = drupal_render( $element['#below'] );
    }
    break;
  }
  $output = l( $element['#title'], $element['#href'], $element['#localized_options'] );
  return '<li' . drupal_attributes( $element['#attributes'] ) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Helper function to create the mega menu content for each top level menu item.
 *
 */
function _eie_bootstrap_generate_mega_menu_content($region_1, $region_2, $region_3, $menu_item, $plugin) {
  $column_1_block   = $plugin->block_get_blocks_by_region($region_1);
  $rendered_column_1_block = render($column_1_block);
  // Adding a wrapper div for each top level menu item
  $sub_menu  = '<div id='. "$menu_item-column". ' class="mega-menu mega-menu-sub-group">';
  // Adding a div for column 1
  $sub_menu  .= '<div id='. "$menu_item-column-1". ' class="mega-menu__column mega-menu-sub-group-1">';
  $sub_menu .= $rendered_column_1_block;
  $sub_menu .= '</div>';
  if(!empty($region_2)) {
    $column_2_block   = $plugin->block_get_blocks_by_region($region_2);
    $rendered_column_2_block = render($column_2_block);
    // Adding a div for column 2
    $sub_menu  .= '<div id='. "$menu_item-column-2". ' class="mega-menu__column mega-menu-sub-group-2">';
    $sub_menu .= $rendered_column_2_block;
    $sub_menu .= '</div>';
  }
  if(!empty($region_3)) {
    $column_3_block   = $plugin->block_get_blocks_by_region($region_3);
    $rendered_column_3_block = render($column_3_block);
    // Adding a div for column 3
    $sub_menu  .= '<div id='. "$menu_item-column-3". ' class="mega-menu__column mega-menu-sub-group-3">';
    $sub_menu .= $rendered_column_3_block;
    $sub_menu .= '</div>';
  }

  $sub_menu .= '</div>'; // Closing div for top level menu item

  return $sub_menu;
}

/*
function eie_bootstrap_menu_tree($vars) {
  // Get the level classes from the aready rendered list items
  // Only theme_menu_link has the information about depth
  $level_class = '';

*/ //  preg_match_all("/li--level-[a-zA-Z]*/", $vars['tree'], $levels);
/*  if (is_array($levels) && isset($levels[0][0])) {
    $level_class = $levels[0][0];
    $level_class = preg_replace("/li/", "ul", $level_class);
  }

  return '<ul class="menu ' . $level_class . '">' . $vars['tree'] . '</ul>';
}

/**
 * Implements theme_menu_link()
 * Add active class to <li> and <a>, not just <a>
 *
 * @param $vars
 * @return string
 */

/*
function eie_bootstrap_menu_link($vars) {
  $element = $vars['element'];
  $sub_menu = '';

  // Add active class to li, not just a
  if (!empty($element['#localized_options']['attributes']['class'])) {
    if (in_array('active', $element['#localized_options']['attributes']['class'])) {
      $element['#attributes']['class'][] = 'active';
    }
  }

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
    $element['#attributes']['class'][] = 'menu-item--has-children';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}
/**
 * Implements theme_menu_link().
 */
 /*
function eie_bootstrap_menu_link__menu_block($vars) {
  // Add classes to menu links
  $number_words = array(0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four');
  $depth = $vars['element']['#original_link']['depth'];
  $depth = $number_words[$depth];
  $vars['element']['#attributes']['class'][] = "li--level-$depth";
  return eie_bootstrap_menu_link($vars);
}

*/
