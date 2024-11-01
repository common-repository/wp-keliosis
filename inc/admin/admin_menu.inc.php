<?php

defined('ABSPATH') or die('Hey, you can\'t access this file, you silly human !');

/**
 * Display a link for WP Keliosis in dashboard and call enqueue only on WP Keliosis options page
 *
 * @since 0.1
 * @author Florian Valois
 */
if ( !function_exists( 'wpk__link_dashboard' ) ) 
{
  add_action('admin_menu','wpk__link_dashboard');
  function wpk__link_dashboard()
  {
    $wpk__admin_page = array(
      
      // Main plugin page
      add_menu_page(
        __( 'WP Keliosis', 'keliosis' ), 
        __( 'WP Keliosis', 'keliosis' ), 
        'manage_options', 
        'wp_keliosis', 
        'wpk__dashboard', 
        'dashicons-admin-plugins',  
        99 
      ),

      // Dashboard
      add_submenu_page( 
        'wp_keliosis', 
        __( 'Dashboard', 'keliosis' ), 
        __( 'Dashboard', 'keliosis' ),
        'manage_options', 
        'wp_keliosis',
        'wpk__dashboard'
      ),

      // Email
      add_submenu_page( 
        'wp_keliosis', 
        __( 'Email', 'keliosis' ), 
        __( 'Email', 'keliosis' ),
        'manage_options', 
        'wpk_email',
        'wpk__email'
      ),

      // Images
      add_submenu_page( 
        'wp_keliosis', 
        __( 'Medias', 'keliosis' ), 
        __( 'Medias', 'keliosis' ),
        'manage_options', 
        'wpk_medias',
        'wpk__medias'
      ),

      // Changelog
      add_submenu_page( 
        'wp_keliosis', 
        __( 'Changelog', 'keliosis' ), 
        __( 'Changelog', 'keliosis' ),
        'manage_options',
        'wpk_changelog',
        'wpk__changelog'
      )
    );
    

    // Load CSS and JS only on plugin page
    foreach($wpk__admin_page as $key){ 
      add_action('load-'.$key, 'wpk__load_enqueue_style_script');
    }
    
  }
}
