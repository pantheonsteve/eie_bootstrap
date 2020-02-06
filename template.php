<?php
/**
 * Generates gradient code snipped from field collection
 * Henry Saniuk (hsaniuk@mos.org)
 *
 * @var object gradient info from drupal field collection
 * @return string ex: linear-gradient(to bottom, rgb(54, 31, 56) , rgb(103, 187, 243, 0.56) 30%, rgb(173, 21, 117, 0.60) 65%, rgb(138, 29, 100, 0.90) 100%)
 */

function generateGradientCode($gradient_entity_id) {
    $full_gradient_entity = field_collection_item_load($gradient_entity_id);
    $gradient_direction = $full_gradient_entity->field_gradient_direction['und'][0]['value'];
    $colors = array();
    foreach($full_gradient_entity->field_color_picker['und'] as $color) {
        $color = field_collection_item_load($color['value']);
        $alpha = $color->field_alpha;
        $background_color = $color->field_background_color;
        $percent_of_gradient = $color->field_percent_of_gradient;
        // check to see if the color is set
        if (isset($background_color['und'][0]['jquery_colorpicker'])) {
            $background_color = hex2rgb($background_color['und'][0]['jquery_colorpicker']);
            // Now get the remaining parts of the gradient
            // get the perecent of the gradient
            if (isset($percent_of_gradient['und'][0]['value'])) {
                $percent_of_gradient = $percent_of_gradient['und'][0]['value'] . '%';
            } else {
                $percent_of_gradient = '';
            }
            // get the alpha of the color
            if (isset($alpha['und'][0]['value'])) {
                $alpha = $alpha['und'][0]['value'];
                // Push the info back to the $colors array
                $colors[] = "rgb($background_color, $alpha) $percent_of_gradient";
            } else {
                $alpha = '';
                // Push the info back to the $colors array
                $colors[] = "rgb($background_color) $percent_of_gradient";
            }
        }
    }
    // Gradients need more than one color, so if there is only one, double it so that it can make the gradient
    if (count($colors) == 1) {
        $colors[] = $colors[0];
    }
    // Now put it all together
    $code_snippet = "linear-gradient($gradient_direction, ";
    for($i = 0; $i < count($colors); $i++) {
        if ($i == count($colors)-1) {
            $code_snippet = $code_snippet . $colors[$i] . ')'; 
        } else {
            $code_snippet = $code_snippet . $colors[$i] . ', '; 
        }
    }
    return $code_snippet;
}

/**
 * This is the new function made by Henry for the refresh
 * Henry Saniuk (hsaniuk@mos.org)
 *
 * @var string $url The url string being formatted.
 * @return string
 */
function createUploadedResourceUrl($url) {

	if (stristr($url, 'public://')) {
		$url = str_replace('public://', '/sites/dev-elvis.mos.org/files/', $url);
	}

	return $url;
}
                                    
/**
 * Generates the HTMl for the explore teaser tiles.
 * Henry Saniuk (hsaniuk@mos.org)
 *
 * @return string
 */

function displayExploreTeasers($view, $explore = false, $add_on_title = false, $icon = 'fa-exhibit', $color = 'ffffff', $experience_type = '') {
    if (empty($view->result)) {
        return;
    }

    $teasers = array();

    foreach ($view->result as $result) {
        $teasers[] = getTeaser(node_load($result->nid));
    }
    ?>
            <div class="venue-attractions ml-4 mr-4 pl-1 pr-1 ml-md-5 mr-md-5">
               <div class="row row-eq-height">
                  <div class="offset-md-1 mr-md-5"></div>
            <?php foreach ($view->result as $result) {
            $node = node_load($result->nid);
            $teaser = getTeaser($node);

            $title = $node->field_title_h1['und'][0]['value'];
            $subtitle = $node->field_subtitle['und'][0]['value'];

            if ($teaser['url'][0] != '/') {
                $teaser['url'] = '/' . $teaser['url'];
            }

            ?>
            <div class="col-md-3 mb-4 card" data-url="<?php print $teaser['url']; ?>">
                <img class="tile" src="<?php print $teaser['image']; ?>" alt="<?php print $teaser['alt']; ?>">
                <div class="content-area">
                    <p style="color: #<?php print $color; ?>;" class="icon"><i class="fa <?php print $icon; ?> teaser-icon" aria-hidden="true"></i></p>
                    <h4 class="title"><a href="<?php print $teaser['url']; ?>"><?php print $title; ?></a></h4>
                    <p class="subtitle"><?php print $subtitle; ?></p>
                    <p class="description"><?php print $teaser['description']; ?></p>
                    <p class="type blue"><?php echo strtoupper(getSingularTypeFromMachineName($node->type)); ?></p>
                </div>
                <?php if (!empty($teaser['callout'])) { ?>
                <div class="callout">
                    <span class="callout-content"><?php print $teaser['callout']; ?></span>
                </div>
                <?php } ?>
            </div>
<?php
    }
    echo "</div></div>";
}

/**
 * Get font awesome icon from machine name
 * Henry Saniuk (hsaniuk@mos.org)
 *
 * @var string of machine name
 * @return string ex: fa-4d
 */

function getIconFromMachineName($machine_name) {
    return getMachineNames()[$machine_name]['icon'];
}

/**
 * Get readable singular type from machine name
 * Henry Saniuk (hsaniuk@mos.org)
 *
 * @var string of machine name
 * @return string ex: Exhibit
 */

function getSingularTypeFromMachineName($machine_name) {
    return getMachineNames()[$machine_name]['singular'];
}

/**
 * Get readable plural type from machine name
 * Henry Saniuk (hsaniuk@mos.org)
 *
 * @var string of machine name
 * @return string ex: Exhibit
 */

function getPluralTypeFromMachineName($machine_name) {
    return getMachineNames()[$machine_name]['plural'];
}

/**
 * Get Font Awesome icon code from the taxonomy ID
 * Henry Saniuk (hsaniuk@mos.org)
 *
 * @var int of taxonomy
 * @return string ex: fa-omni
 */
                                    
function getFontAwesomeFromTaxonomy($tid) {
    $term = taxonomy_term_load($tid);
    return $term->description;
}
                      
?>