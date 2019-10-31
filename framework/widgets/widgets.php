<?php
/* -------------------------------------------------------------------------- *\
    Require the widget files below
\* -------------------------------------------------------------------------- */
$ab_widgets = array(
  'register',                       // Setup the widget areas
  'share-buttons',                  // Social Share buttons

);

wp_file_loader( $ab_widgets, 'widgets' );


// Unset the global variable.
unset( $ab_widgets );

?>