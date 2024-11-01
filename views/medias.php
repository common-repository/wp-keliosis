<?php

defined('ABSPATH') or die('Hey, you can\'t access this file, you silly human !');

/**
 * Media page
 *
 * @since 0.1
 * @author Florian Valois
 *
 * @return void
 */
if ( !function_exists( 'wpk__medias' ) ) 
{
  function wpk__medias()
  {  
    
  echo wpk__title_page( __( 'Medias', 'keliosis' ) ); 
    
?>
  
  <div class="wrap">
  
  <form class="wpk-form" method="post" action="" name="wpk_medias">
  
    <div class="row">
     
      <div class="col-xl-6">
        <div class="wpk-card">
          <h2 class="title"><?php echo __('Rewrite filename', 'keliosis'); ?></h2>
          <div class="content">
            <div class="check-group">
              <label for="medias__rewrite_filename">
                <input id="medias__rewrite_filename" class="form-control" type="checkbox" name="medias__rewrite_filename" value="1" <?php checked( wpk_options('medias__rewrite_filename'), 1 ); ?>>
                <?php echo __('Active this option to rewrite filename during upload.', 'keliosis'); ?>
              </label>
              <p class="description">
                  <?php echo __('Enabling this option to turn filename into a web optimized filename.', 'keliosis'); ?><br>
                  <?php echo __('Example : F@_pf42çfèdg.JPG in f-pf42cfedg.jpg', 'keliosis'); ?>
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