<?php
  function phptemplate_theme_links($links, $attributes = array('class' => 'links')) {
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

        // Add active class to the active link
        if (arg(0) == 'node' && arg(1)) {
          $cUrl = drupal_get_path_alias(arg(0) .'/'. arg(1));
          $pos = strpos('/'.$cUrl, substr($link['href'], 0, -1));
          if ($pos == 1) {
            $class .= ' active';
          }
        }
        else if (arg(0) == 'taxonomy' && arg(2)) {
          $cUrl = drupal_get_path_alias(arg(0) .'/'. arg(1).'/'.arg(2));
          $pos = strpos('/'.$cUrl, substr($link['href'], 0, -1));
          if ($pos == 1) {
            $class .= ' active';
          }
        }
        else if (arg(0) !== 'node') {
          $pos = strpos('/'. arg(0), substr($link['href'], 0, -1));
          if ($pos == 1) {
            $class .= ' active';
          }
        }
        else {
          if ($i == 1) {
            $class .= ' active';
          }
        }

        if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))) {
          $class .= ' active';
        }
        $output .= '<li class="'. $class .'">';

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

  function phptemplate_menu_item_link($link) {
    if (empty($link['localized_options'])) {
      $link['localized_options'] = array();
    }

    $link['localized_options']['html'] = TRUE;

    return l($link['title'] .'<span></span>', $link['href'], $link['localized_options']);
  }

?>