<?php

/**
 * Implementation of hook_preprocess().
 *
 * @param $vars
 * @param $hook
 * @return Array
 */
function molsim_preprocess(&$vars, $hook) {

  // Only add the admin.css file to administrative pages
  if (arg(0) == 'admin') {
    drupal_add_css(path_to_theme() .'/css/admin.css', 'theme', 'all', TRUE);
  }

 /**
  * This function checks to see if a hook has a preprocess file associated with
  * it, and if so, loads it.
  */
  if (is_file(drupal_get_path('theme', 'molsim') .'/preprocess/preprocess-'. str_replace('_', '-', $hook) .'.inc')) {
    include('preprocess/preprocess-'. str_replace('_', '-', $hook) .'.inc');
  }

}

function phptemplate_links($links, $attributes = array('class' => 'links')) {
  global $language;
  $output = '';

  if (count($links) > 0) {
    $output = '<ul'. drupal_attributes($attributes) .'>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = $key;

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class .= ' first';
      }
      if ($i == $num_links) {
        $class .= ' last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
          && (empty($link['language']) || $link['language']->language == $language->language)) {
        $class .= ' active';
      }
      $output .= '<li'. drupal_attributes(array('class' => $class)) .'>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}
