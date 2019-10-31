<?php
/**
 * Filters
 *
 * All filters for native WordPress, plugins' and theme functions.
 *
 */

// Execute shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

//Remove the id's from menus
add_filter( 'nav_menu_item_id', '__return_null', 10, 3 );


/* -------------------------------------------------------------------------- *\
    Require the function files below
\* -------------------------------------------------------------------------- */
$ab_filters = array(
  //WP
  'body-class',
  'max-srcset-image-width',
  'nav-menu-css-class',
  'sanitize-html-class',
  'wp-get-attachment-image-attributes',

  //Plugins
  'yoast-seo',

  //Theme
  'ab-maincontainer-class',

);

wp_file_loader( $ab_filters, 'filters' );

// Unset the global variable.
unset( $ab_filters );

?>