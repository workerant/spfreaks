<?php

function your_excerpt_length($length) {
    return 100;
}
add_filter('excerpt_length', 'your_excerpt_length');

function get_terms_chekboxes($taxonomies, $args) {
  $terms = get_terms($taxonomies, $args);
  foreach($terms as $term){
    $output .= '<label for="'.$term->slug.'"><input type="checkbox" id="'.$term->slug.'" name="'.$term->taxonomy.'" value="'.$term->slug.'"> '.$term->name.'</label>';
  }
  return $output;
}

function the_post_meta($post_id, $key, $before, $after, $empty) {
  $meta = get_post_meta($post_id, $key);

  if($meta != '') {

  } else {

  }

  return ;
}