<?php
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Function to rewrite filename in lowercase, number and dash during upload.
 *
 * @since 0.1
 * @author Florian Valois
 */

( wpk_options('medias__rewrite_filename') ) ? add_filter('sanitize_file_name', 'wpk__medias__rewrite_filename', 10) : '';

if ( !function_exists( 'wpk__medias__rewrite_filename' ) ) {
  function wpk__medias__rewrite_filename($filename){
    $clean_filename = remove_accents( $filename ); 

    $invalid = array(
        ' '   => '-',
        '%20' => '-',
        '_'   => '-',
    );

    $clean_filename = str_replace( array_keys( $invalid ), array_values( $invalid ), $clean_filename );
    $clean_filename = preg_replace('/[^A-Za-z0-9-\. ]/', '', $clean_filename); 
    $clean_filename = preg_replace('/\.(?=.*\.)/', '', $clean_filename);
    $clean_filename = preg_replace('/-+/', '-', $clean_filename); 
    $clean_filename = str_replace('-.', '.', $clean_filename);
    $clean_filename = strtolower( $clean_filename ); 

    return $clean_filename;
  }
}