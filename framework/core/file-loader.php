<?php

/* -------------------------------------------------------------------------- *\
    Theme Framework File Loader
\* -------------------------------------------------------------------------- */
if ( ! function_exists( 'wp_file_loader' ) ) :
function wp_file_loader( $files = array(), $subdir = '' ) {

  if ( empty($files) ) {
    return;
  }

  $file_extension = '.php';

  $dir = get_template_directory() . '/framework/';
  $dir .= ( !empty($subdir) ) ? trailingslashit($subdir) : '';

  // Include files from supplied array
  foreach ($files as $file) {

    $path = "{$dir}{$file}{$file_extension}";

    if ( file_exists( $path ) ) {
      include_once $path;
    }

  }

}
endif;

?>