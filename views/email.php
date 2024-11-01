<?php

defined('ABSPATH') or die('Hey, you can\'t access this file, you silly human !');

/**
 * Email page
 *
 * @since 0.3
 * @author Florian Valois
 *
 * @return void
 */
if ( !function_exists( 'wpk__email' ) ) 
{
  function wpk__email()
  {  
    
  echo wpk__title_page( __( 'Email', 'keliosis' ) ); 
      
?>
  
  <div class="wrap">
  
  <form class="wpk-form" method="post" action="" name="wpk_email">
  
    <div class="row">
     
      <div class="col-xl-6">
        <div class="wpk-card">
          <h2 class="title"><?php echo __('Default information for email', 'keliosis'); ?></h2>
          <div class="content">
            <div class="input-group">
              <div>
                <label for="email__author_name">
                  <?php _e('Author name', 'keliosis'); ?>
                </label>

                <input id="email__author_name" class="form-control" type="text" name="email__author_name" value="<?php echo ( wpk_options('email__author_name') ) ? wpk_options('email__author_name') : '' ;?>" >
              </div>
              <p class="description">
                  <?php echo __('Change default author \'WordPress\' by your custom author name.', 'keliosis'); ?>
              </p>
            </div>
            <div class="input-group">
              <div>
                <label for="email__author_email">
                  <?php _e('Author email', 'keliosis'); ?>
                </label>
                <input id="email__author_email" class="form-control" type="text" name="email__author_email" value="<?php echo ( wpk_options('email__author_email') ) ? wpk_options('email__author_email') : '' ;?>" >
              </div>
              <p class="description">
                  <?php echo __('Change default email \'wordpress@...\' by your custom email.', 'keliosis'); ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      
    </div>

    <button type="submit"><?php echo __('Save changes', 'keliosis'); ?></button>
  
  </form>
  
  </div>
  <?php
  }
}