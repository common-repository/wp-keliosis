<?php

defined('ABSPATH') or die('Hey, you can\'t access this file, you silly human !');

/**
 * Init WP Keliosis in WP
 *
 * @since 0.1
 */
if ( !function_exists( 'wpk__init' ) ) {
  add_action( 'after_setup_theme', 'wpk__init' );
  function wpk__init() {
    
    // Admin
    require WP_KELIOSIS_PATH_INC_ADMIN . 'admin_menu.inc.php';
    require WP_KELIOSIS_PATH_INC_ADMIN . 'options.inc.php';
    
    // Data
    require WP_KELIOSIS_PATH_INC_DATA . 'save.inc.php';
    
    // Admin UI
    require WP_KELIOSIS_PATH_INC_ADMIN_UI . 'enqueue.inc.php';
    
    // Template
    require WP_KELIOSIS_PATH_INC_TEMPLATE . 'title.inc.php';
    
    // Functions
    /* Medias */
    require WP_KELIOSIS_PATH_INC_FUNC . 'medias/rewrite_filename.inc.php';
    require WP_KELIOSIS_PATH_INC_FUNC . 'email/default_information.inc.php';
    
    // Views
    require WP_KELIOSIS_PATH_VIEWS . 'dashboard.php';
    require WP_KELIOSIS_PATH_VIEWS . 'email.php';
    require WP_KELIOSIS_PATH_VIEWS . 'medias.php';
    require WP_KELIOSIS_PATH_VIEWS . 'changelog.php';

  }
}