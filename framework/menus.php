<?php
/**
 * Register menus
 */

function ab_register_menus() {

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus( array(
      'primary-menu'   => 'Primary Menu',
      'secondary-menu'  => 'Secondary Menu',
      'footer-menu'    => 'Footer Menu',
  ));

}
add_action('init', 'ab_register_menus');



if ( ! function_exists( 'ab_add_menu_link_classes' ) ) :
/**
 * Add menu item classes to the <a> tag
 *
 * Uses and ACF field defined in /framework/custom-fields/custom-fields.php
 *
 */
function ab_add_menu_link_classes( $atts, $item) {

  $link_classes = ab_get_field('link_css_class', $item, '');
  $link_anchor = ab_get_field('link_anchor', $item, '');

  if( $link_classes ) {
      $atts['class'] = $link_classes;
  }
  if( $link_anchor ) {
    if ($link_anchor[0] !== '#') {
      $link_anchor = '#' . $link_anchor;
    }

    $atts['href'] = $atts['href'] . $link_anchor;
  }

  return $atts;
}
endif;
add_filter('nav_menu_link_attributes', 'ab_add_menu_link_classes', 10, 2);

?>