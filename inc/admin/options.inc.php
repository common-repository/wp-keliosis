<?php

defined('ABSPATH') or die('Hey, you can\'t access this file, you silly human !');

/**
 * Function to display meta_value with meta_key ($name)
 *
 * @since 0.2
 * @author Florian Valois
 *
 * @return boolean
 */
function wpk_options($name){
  
  global $wpdb;
  
  $table_name = $wpdb->prefix . 'keliosis';
  $results = $wpdb->get_results( "SELECT meta_value FROM {$table_name} WHERE meta_key = '$name'", ARRAY_A )[0]['meta_value'];
  
  if( $results === '1' ){
    return true;
  } elseif( $results === '0' ){
    return false;
  } else{ 
    return $results;
  }
}