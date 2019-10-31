<?php
/* -------------------------------------------------------------------------- *\
    Require the plugin files below
\* -------------------------------------------------------------------------- */
$ab_plugins = array(
  'acf/acf-field-reg',
  'acf/acf-pro',

  'acf/blocks/page-properties',
  //'acf/blocks/team-member-slider',

);

wp_file_loader( $ab_plugins, 'plugins' );


// Unset the global variable.
unset( $ab_plugins );

?>