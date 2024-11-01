<?php
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Function to change default author name of email send by default by WOrdPress.
 *
 * @since 0.2
 * @author Florian Valois
 */

( wpk_options('email__author_name') ) ? add_filter('wp_mail_from_name', 'wpk__email__default_author_name') : '';

if ( !function_exists( 'wpk__email__default_author_name' ) ) {
  function wpk__email__default_author_name($original_email_from){
    
    global $wpdb;

    $table_name = $wpdb->prefix . 'keliosis';
    $results = $wpdb->get_results( "SELECT `meta_value` FROM {$table_name} WHERE `meta_key` = 'email__author_name'" )[0]->meta_value;

    return $results;
  }
}



/**
 * Function to change default author email of email send by default by WOrdPress.
 *
 * @since 0.2
 * @author Florian Valois
 */

( wpk_options('email__author_email') ) ? add_filter('wp_mail_from', 'wpk__email__default_author_email') : '';

if ( !function_exists( 'wpk__email__default_author_email' ) ) {
  function wpk__email__default_author_email($original_email_address){
    
    global $wpdb;

    $table_name = $wpdb->prefix . 'keliosis';
    $results = $wpdb->get_results( "SELECT `meta_value` FROM {$table_name} WHERE `meta_key` = 'email__author_email'" )[0]->meta_value;

    return $results;
  }
}