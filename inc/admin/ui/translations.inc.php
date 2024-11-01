<?php
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Translations of plugins for Ajax and other
 *
 * @since 0.1
 * @author Florian Valois
 *
 * return array
 */

$translations = array(
//  'wpk_' => __('', 'keliosis'),
  
  // Form
  'wpk_form_save_title_success' => __('Saved changes', 'keliosis'),
  'wpk_form_save_message_success' => __('Your changes have been successfully saved !', 'keliosis'),
  'wpk_form_save_title_warning' => __('Warning', 'keliosis'),
  'wpk_form_save_message_warning' => __('No change detected. Update canceled.', 'keliosis'),
  'wpk_form_save_title_error' => __('Error', 'keliosis'),
  'wpk_form_save_message_error' => __('The update could not be completed correctly. If the problem persists, contact the developer.', 'keliosis'),

  // Don't touch this human !!
  'nonce' => wp_create_nonce( 'keliosis-ajax' ),
  'ajaxurl' => admin_url( 'admin-ajax.php' )
);