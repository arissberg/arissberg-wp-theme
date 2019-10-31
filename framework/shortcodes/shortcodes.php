<?php
/* -------------------------------------------------------------------------- *\
    Require the shortcode files below
\* -------------------------------------------------------------------------- */
$ab_shortcodes = array(
  'media-library',
  'svg-icon',
);

wp_file_loader( $ab_shortcodes, 'shortcodes' );

// Unset the global variable.
unset( $ab_shortcodes );

?>