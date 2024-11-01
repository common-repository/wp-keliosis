<?php

defined('ABSPATH') or die('Hey, you can\'t access this file, you silly human !');

/**
 * Changelog page
 *
 * @since 0.3
 * @author Florian Valois
 *
 * @return void
 */
if ( !function_exists( 'wpk__changelog' ) ) 
{
  
  function wpk__changelog()
  {    
    
    require WP_KELIOSIS_PATH_CHANGELOG . 'versions.php';
    
    echo wpk__title_page( __( 'Changelog', 'keliosis' ) );
?>
  
  <div class="wrap">
    
    <?php
    foreach( $versions as $key )
    {
      $i++;
      $version = $key['version'];
      $date = $key['date'];
      
      ?>
      
      <div class="changelog-accordion <?php echo ( $i === 1 ? 'active' : null ); ?>">
        <span class="title"><?php echo __('Version', 'keliosis') . ' ' . $version; ?></span>
        <div class="content">
          <span class="date"><?php echo $date; ?></span>
          <ul class="log-list">
      
      <?php
      
      foreach( $key['details'] as $key => $value )
      {
        
        $type = $key;
        $change_list = $value;
        
        switch( $type )
        {
            
          case 'added';
            $label = __('Added', 'keliosis' );
            break;
            
          case 'changed';
            $label = __('Changed', 'keliosis' );
            break;
            
          case 'deprecated';
            $label = __('Deprecated', 'keliosis' );
            break;
            
          case 'fixed';
            $label = __('Fixed', 'keliosis' );
            break;
            
          case 'removed';
            $label = __('Removed', 'keliosis' );
            break;
            
          case 'security';
            $label = __('Security', 'keliosis' );
            break;
        }
        ?>
        
        <li>
          <span class="log log-<?php echo $type; ?>"><?php echo $label; ?></span>
          <ul>
          
        <?php
        
        foreach( $change_list as $key)
        {
          $change = $key;
          
          ?>
            <li><?php echo $change; ?></li>
        <?php
        }
        
        ?>
          </ul>
        </li>
        <?php
      }
      
      ?>
      
        </ul>
      </div>
    </div>
      
      <?php
    }
    ?>
    
  </div>
  <?php
  }
}