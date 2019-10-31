<?php
/* -------------------------------------------------------------------------- *\
    Require the partial files below
\* -------------------------------------------------------------------------- */
$ab_partials = array(
  'favicon',
  'skip-to-content',
  'nav-primary',
  'footer-widgets',
  'footer-menu'
);

wp_file_loader( $ab_partials, 'partials' );


// Unset the global variable.
unset( $ab_partials );

?>