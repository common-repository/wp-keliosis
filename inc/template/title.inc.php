<?php

defined('ABSPATH') or die('Hey, you can\'t access this file, you silly human !');

/**
 * Title page function
 *
 * @since 0.3
 * @author Florian Valois
 *
 * @return this
 */

function wpk__title_page($title)
{
  ?>
	<div class="wpk__title_page">
      <h1><?php echo $title; ?> - WP Keliosis</h1>
	</div>
	<?php
}