<?php

defined('ABSPATH') or die('Hey, you can\'t access this file, you silly human !');

/**
 * Function to save data in database
 *
 * @since 0.2
 * @author Florian Valois
 *
 * @return array
 */
if ( !function_exists( 'wpk__save_data' ) ) {
  function wpk__save_data(){

    global $wpdb;

    $table_name = $wpdb->prefix . 'keliosis';
    $d = $_POST['form'];
    $data = [];

    $params = array();
    parse_str($d, $params);

    // Prepare form data for update
    foreach($params as $key => $value){

      $name = $key;
      $value = htmlspecialchars($value);

      // Check if meta_key exist. If not, create meta_key.
      $meta_key_exist = $wpdb->get_results("SELECT `meta_key` FROM $table_name WHERE `meta_key` = '$name'")[0]->meta_key ;

      if($meta_key_exist === null){
        // Create value
        $create_data = $wpdb->insert($table_name, array('meta_key' => $name));
      }

      // Update value
      $update_data[] = $wpdb->update($table_name, array('meta_value' => $value), array('meta_key' => $name));

    }

    if( in_array(1, $update_data) ){
      $response = true;
    } else{
      $response = false;
    }

    // Var for JS verification and message
    $update_message = json_encode(array(
      'update' => $response
    ));

    echo $update_message;

    // die(); to delete "0"
    die();

  }
}
//if(keliosis_access_security()){
  add_action( 'wp_ajax_' . 'wpk__save_data', 'wpk__save_data' );
  add_action( 'wp_ajax_nopriv_' . 'wpk__save_data', 'wpk__save_data' );
//}