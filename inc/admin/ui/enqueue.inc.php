<?php

defined('ABSPATH') or die('Hey, you can\'t access this file, you silly human !');

/**
 * Add CSS and JS files for WP Keliosis settings page
 *
 * @since 0.1
 * @author Florian Valois
 */
if ( !function_exists( 'wpk__enqueue_style_script' ) ) {
  function wpk__enqueue_style_script() {
    // Call of CSS and JS files of keliosis plugin theme
    wp_enqueue_style( 'wp-keliosis', WP_KELIOSIS_URL . 'style.min.css', null, null );
    wp_enqueue_script( 'wp-keliosis', WP_KELIOSIS_URL . 'script.min.js', array('jquery', 'jquery-ui-core'), null, true );
    
    // Translations
    require WP_KELIOSIS_PATH_INC_ADMIN_UI . 'translations.inc.php';
    wp_localize_script( 'wp-keliosis', 'wpk_ajax', $translations );
    
    // Google Fonts
    wp_enqueue_style( 'wp-keliosis-google-font', 'https://fonts.googleapis.com/css?family=Poppins:400,400i,600,600i,700,700i,800,800i,900,900i&display=swap', null, '');
    
    // FontAwesome
    wp_enqueue_style( 'wp-keliosis-font-awesome', 'https://use.fontawesome.com/releases/v5.15.0/css/all.css', null, null );

  }
}

/**
 * Function to call CSS and JS only on WP Keliosis options page
 *
 * @since 0.1
 * @author Florian Valois
 */
if ( !function_exists( 'wpk__load_enqueue_style_script' ) ) {
  function wpk__load_enqueue_style_script(){
    add_action( 'admin_print_styles', 'wpk__enqueue_style_script' );
  }
}