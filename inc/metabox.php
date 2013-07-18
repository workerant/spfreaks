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

function themeslug_enqueue_style() {
  wp_enqueue_style( 'core', get_template_directory_uri().'/css/global.css', false ); 
}

add_action( 'login_enqueue_scripts', 'themeslug_enqueue_style', 10 );

function my_connection_types() {

  p2p_register_connection_type( array(
      'title' => 'Track to Item',
      'name' => 'track_to_item',
      'from' => 'track',
      'to' => 'item',
      'sortable' => 'any'
  ) );

  p2p_register_connection_type( array(
      'title' => 'Track to Concert',
      'name' => 'track_to_concert',
      'from' => 'track',
      'to' => 'concert',
      'sortable' => 'any'
  ) );

  p2p_register_connection_type( array(
      'title' => 'I Attended',
      'name' => 'i_attended',
      'from' => 'concert',
      'to' => 'user',
      'self_connections' => true
  ) );

  p2p_register_connection_type( array(
      'title' => 'I Want',
      'name' => 'i_want',
      'from' => 'item',
      'to' => 'user',
      'self_connections' => true,
  ) );

  p2p_register_connection_type( array(
      'title' => 'I Own',
      'name' => 'i_own',
      'from' => 'item',
      'to' => 'user',
      'self_connections' => true,
      'fields' => array(
          'additional_info' => array(
            'title' => 'Additional Information',
            'type' => 'textarea',
          ),
          'owned_since' => array(
            'title' => 'Owned Since',
            'type' => 'text',
          ),
          'quanity' => array(
            'title' => 'Quanity',
            'type' => 'text',
          ),
          'grade' => array( 
            'title' => 'Grade',
            'type' => 'select',
            'values' => array( 'N/A', 'Mint', 'Excellent', 'Very Good', 'Good', 'Fair', 'Poor/Bad' )
          )
        )
  ) );

  p2p_register_connection_type( array(
      'title' => 'Sell/Trade',
      'name' => 'sell_trade',
      'from' => 'item',
      'to' => 'user',
      'self_connections' => true,
      'fields' => array(
          'additional_info' => array(
            'title' => 'Additional Information',
            'type' => 'textarea',
          ),
          'price' => array(
            'title' => 'Price',
            'type' => 'text',
          ),
          'quanity' => array(
            'title' => 'Quanity',
            'type' => 'text',
          ),
          'grade' => array( 
            'title' => 'Grade',
            'type' => 'select',
            'values' => array( 'N/A', 'Mint', 'Excellent', 'Very Good', 'Good', 'Fair', 'Poor/Bad' )
          )
      )
  ) );

}
add_action( 'p2p_init', 'my_connection_types', 100 );



// add_action( 'add_meta_boxes', 'myplugin_add_custom_box' );
// add_action( 'save_post', 'myplugin_save_postdata' );

function myplugin_add_custom_box() {
  add_meta_box( 'myplugin_sectionid', 'I Want/ Own Sell', 'myplugin_inner_custom_box', 'item'  );
}

function myplugin_inner_custom_box( $post ) {

  $users = get_users( array(
    'connected_type' => 'i_want',
    'connected_items' => $post
  ) );

?>
  <ul>
  <?php foreach ($users as $user) {
    echo '<li>' . $user->user_email . '</li>';
  }
  ?>
  </ul>

<?php

  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );

  $value = get_post_meta( $post->ID, '_my_meta_value_key', true );
  echo '<label for="myplugin_new_field">';
       _e("Description for this field", 'myplugin_textdomain' );
  echo '</label> ';
  echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="'.esc_attr($value).'" size="25" />';


}

function myplugin_save_postdata( $post_id ) {


  if ( 'page' == $_POST['post_type'] ) {
    if ( ! current_user_can( 'edit_page', $post_id ) )
        return;
  } else {
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // Secondly we need to check if the user intended to change this value.
  if ( ! isset( $_POST['myplugin_noncename'] ) || ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename( __FILE__ ) ) )
      return;

  // Thirdly we can save the value to the database

  //if saving in a custom table, get post_ID
  $post_ID = $_POST['post_ID'];
  //sanitize user input
  $mydata = sanitize_text_field( $_POST['myplugin_new_field'] );

  // Do something with $mydata 
  // either using 
  add_post_meta($post_ID, '_my_meta_value_key', $mydata, true) or
    update_post_meta($post_ID, '_my_meta_value_key', $mydata);
  // or a custom table (see Further Reading section below)
}


















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