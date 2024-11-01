<?php

defined('ABSPATH') or die('Hey, you can\'t access this file, you silly human !');

/**
 * Dashboard page
 *
 * @since 0.1
 * @author Florian Valois
 *
 * @return void
 */
if ( !function_exists( 'wpk__dashboard' ) ) 
{
  function wpk__dashboard()
  {        
  
  wpk__title_page( __( 'Dashboard', 'keliosis' ) );
  ?>
  <div class="wrap">
  
  <div class="row">
    <div class="col-lg-8">
     
      <div class="wpk-card">
        <h2 class="title"><?php _e('Welcome to WP Keliosis !', 'keliosis'); ?></h2>
        <div class="content">
          <p><?php _e('This plugin was created for only purpose : Make life easier.', 'keliosis'); ?></p>
          <p><?php _e('Thanks to a whole panel of options, distributed among differents sections of WordPress environment, you will be able to modify default options to give more power and personnalisation to your WordPress site.', 'keliosis'); ?></p>
          <p><?php _e('All options are available in the menu on the left and their explanations have been added to each of them.', 'keliosis'); ?></p>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="wpk-card">
        <h2 class="title">WP Keliosis <?php echo WP_KELIOSIS_VERSION . ' ' . __('is now available !', 'keliosis'); ?></h2>
        <div class="content">
          <p><?php _e('Check changelog section to know more.', 'keliosis'); ?></p>
          <a href="<?php echo admin_url('admin.php?page=wpk_changelog'); ?>" class="cta cta-primary cta-anchor"><i class="fas fa-code-branch"></i> <?php _e('Read changelog', 'keliosis'); ?></a>
        </div>
      </div>

      <div class="wpk-card">
        <h2 class="title"><?php _e('Support', 'keliosis'); ?></h2>
        <div class="content">
          <p><?php _e('Need help or any suggestions to improve the plugin ?', 'keliosis'); ?></p>
          <p><?php _e('Ask your questions/suggestions on our forum.', 'keliosis'); ?></p>
          <a href="https://wordpress.org/support/plugin/wp-keliosis/" class="cta cta-primary" target="_blank" title="<?php _e('Go to support', 'keliosis'); ?>"><i class="far fa-life-ring"></i> <?php _e('Go to support', 'keliosis'); ?></a>
        </div>
      </div>
    </div>
  </div>
  
  </div>
  <?php
  }
}