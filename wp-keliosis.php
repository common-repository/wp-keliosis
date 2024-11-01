<?php
/*
 * Plugin Name: WP Keliosis
 * Plugin URI: https://wordpress.org/plugins/wp-keliosis/
 * Description: The best all-in-one plugin to customize default options of WordPress.
 * Version: 0.3.2
 * Author: Florian Valois
 * Author URI: https://florian-valois.com
 * Licence: GPLv2 or later
 *
 * Text Domain: keliosis
 * Domain Path: /languages
 */

defined('ABSPATH') or die('Hey, you can\'t access this file, you silly human !');


/**
 * Define constants
 *
 * @since 0.1
 * @author Florian Valois
 */
define( 'WP_KELIOSIS_VERSION',                  '0.3.2' );
define( 'WP_KELIOSIS_NAME',                     'keliosis' );
define( 'WP_KELIOSIS_SLUG',                     'wp-keliosis' );
define( 'WP_KELIOSIS_FILE',                     __FILE__ );
define( 'WP_KELIOSIS_PATH',                     realpath( plugin_dir_path( WP_KELIOSIS_FILE ) ) . '/' );

define( 'WP_KELIOSIS_PATH_INC',                 realpath( WP_KELIOSIS_PATH . 'inc/' ) . '/' );
define( 'WP_KELIOSIS_PATH_INC_ADMIN',           realpath( WP_KELIOSIS_PATH_INC . 'admin/' ) . '/' );
define( 'WP_KELIOSIS_PATH_INC_ADMIN_UI',        realpath( WP_KELIOSIS_PATH_INC_ADMIN . 'ui/' ) . '/' );
define( 'WP_KELIOSIS_PATH_INC_TEMPLATE',        realpath( WP_KELIOSIS_PATH_INC . 'template/' ) . '/' );
define( 'WP_KELIOSIS_PATH_INC_DATA',            realpath( WP_KELIOSIS_PATH_INC . 'data/' ) . '/' );
define( 'WP_KELIOSIS_PATH_INC_FUNC',            realpath( WP_KELIOSIS_PATH_INC . 'functions/' ) . '/' );
define( 'WP_KELIOSIS_PATH_VIEWS',               realpath( WP_KELIOSIS_PATH . 'views/' ) . '/' );
define( 'WP_KELIOSIS_PATH_CHANGELOG',           realpath( WP_KELIOSIS_PATH . 'changelog/' ) . '/' );

define( 'WP_KELIOSIS_URL',                      plugin_dir_url( WP_KELIOSIS_FILE ) );
define( 'WP_KELIOSIS_URL_ASSETS',               WP_KELIOSIS_URL . 'assets/' );

/**
 * Loads WP Keliosis translations
 *
 * @since 0.1
 * @author Florian Valois
 */
if ( !function_exists( 'wpk__load_textdomain' ) ) 
{
  add_action( 'plugins_loaded', 'wpk__load_textdomain' );
  function wpk__load_textdomain() 
  {
    $locale = get_locale();
    $locale = apply_filters( 'plugin_locale', $locale, 'keliosis' );
    load_textdomain( 'keliosis', WP_LANG_DIR . '/plugins/wp-keliosis-' . $locale . '.mo' );
    load_plugin_textdomain( 'keliosis', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
  }
}

/**
 * Create table 'keliosis' in database
 *
 * @since 0.2
 * @author Florian Valois
 */

if ( !function_exists( 'wpk__create_table' ) ) {
	register_activation_hook( WP_KELIOSIS_FILE, 'wpk__create_table' );
	function wpk__create_table() {
		
		global $table_prefix, $wpdb;
		
		$table_name = 'keliosis';
		$wp_check_table = $table_prefix . '$table_name';
		
		// Check if 'keliosis' table exist
		if($wpdb->get_var( "show tables like '$wp_check_table'" ) != $wp_check_table ){
		
			$charset_collate = $wpdb->get_charset_collate();
			$table_name = $wpdb->prefix . 'keliosis';

			$sql = "CREATE TABLE $table_name (
				id bigint(20) NOT NULL AUTO_INCREMENT,
				meta_key varchar(191) NOT NULL,
				meta_value longtext NOT NULL,
				PRIMARY KEY (id),
				UNIQUE KEY (meta_key)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

			dbDelta( $sql );
		}
	}
}

require_once WP_KELIOSIS_PATH . 'settings.php';