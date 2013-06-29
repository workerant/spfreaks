<?php


if (!isset($content_width)) $content_width = 600;

set_post_thumbnail_size(300, 300, true);

update_option('thumbnail_size_w', 300);
update_option('thumbnail_size_h', 300);

update_option('medium_size_w', 600);
update_option('medium_size_h', 99999);

update_option('large_size_w', 990);
update_option('large_size_h', 99999);

update_option('embed_size_w', 600);
update_option('embed_size_h', 600);

function my_connection_types() {

  p2p_register_connection_type(
    array(
      'name' => 'track_to_item',
      'from' => 'track',
      'to' => 'item',
      'sortable' => 'any'
    )
  );

  p2p_register_connection_type(
    array(
      'name' => 'track_to_concert',
      'from' => 'track',
      'to' => 'concert',
      'sortable' => 'any'
    )
  );
}
add_action( 'p2p_init', 'my_connection_types' );




// https://github.com/rilwis/meta-box/blob/master/demo/demo.php
$prefix = 'spf_';
global $meta_boxes;
$meta_boxes = array();
$meta_boxes[] = array(
  'id' => 'standard',
  'title' => __( 'Track Information', 'rwmb' ),
  'pages' => array( 'track' ),
  'context' => 'normal',
  'priority' => 'high',
  'autosave' => true,
  'fields' => array(
    array(
      'name'  => __( 'Track Length', 'rwmb' ),
      'id'    => "{$prefix}track-length",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'Written By', 'rwmb' ),
      'id'    => "{$prefix}written-by",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'BMI Number', 'rwmb' ),
      'id'    => "{$prefix}bmi-number",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'Locations', 'rwmb' ),
      'id'    => "{$prefix}locations",
      'type'  => 'textare'
    )
  )
);


$meta_boxes[] = array(
  'id' => 'standard',
  'title' => __( 'Track Information', 'rwmb' ),
  'pages' => array( 'concert' ),
  'context' => 'normal',
  'priority' => 'high',
  'autosave' => true,
  'fields' => array(
    array(
      'name'  => __( 'Start Date', 'rwmb' ),
      'id'    => "{$prefix}start-date",
      'type'  => 'text'
    ),
    // array(
    //   'name'  => __( 'End Date', 'rwmb' ),
    //   'id'    => "{$prefix}end-date",
    //   'type'  => 'text'
    // )
  )
);


$meta_boxes[] = array(
  'id' => 'standard',
  'title' => __( 'Item Details', 'rwmb' ),
  'pages' => array( 'item' ),
  'context' => 'normal',
  'priority' => 'high',
  'autosave' => true,
  'fields' => array(
    array(
      'name'  => __( 'Release Date', 'rwmb' ),
      'id'    => "{$prefix}release-date",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'Package', 'rwmb' ),
      'id'    => "{$prefix}package",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'Release Code', 'rwmb' ),
      'id'    => "{$prefix}release-code",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'UPC', 'rwmb' ),
      'id'    => "{$prefix}upc",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'Maxtix Codes', 'rwmb' ),
      'id'    => "{$prefix}maxtix-codes",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'Other Code', 'rwmb' ),
      'id'    => "{$prefix}other-code",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'RPM', 'rwmb' ),
      'id'    => "{$prefix}rpm",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'Amount Pressed', 'rwmb' ),
      'id'    => "{$prefix}amount-pressed",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'Label', 'rwmb' ),
      'id'    => "{$prefix}label",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'Additional Information', 'rwmb' ),
      'id'    => "{$prefix}additional-information",
      'type'  => 'textarea',
      'cols' => 20,
      'rows' => 3,
    ),
    array(
      'name'  => __( 'Country Manufactured', 'rwmb' ),
      'id'    => "{$prefix}country-manufactured",
      'type'  => 'text'
    ),
    array(
      'name'  => __( 'Country Printed', 'rwmb' ),
      'id'    => "{$prefix}country-printed",
      'type'  => 'text'
    )
  )
);

function spf_register_meta_boxes() {
  if ( !class_exists( 'RW_Meta_Box' ) )
    return;
  global $meta_boxes;
  foreach ( $meta_boxes as $meta_box ) {
    new RW_Meta_Box( $meta_box );
  }
}
add_action( 'admin_init', 'spf_register_meta_boxes' );