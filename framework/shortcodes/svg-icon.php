<?php
if ( ! function_exists( 'ab_sc_get_svg_icon' ) ) :
/**
* Get an SVG icon from the icon library
*
* Usage:
* [svg_icon icon="<icon name in icon class>" size="36"]
*/
function ab_sc_get_svg_icon( $attr ) {

  if ( ! isset( $attr['icon'] ) ) {
    $output = '';
  }

  $output = apply_filters( 'ab_svg_icon_shortcode', '', $attr );

  if ( $output != '' ) {
    return $output;
  }

  $attr = shortcode_atts(
    array(
        'icon'      => '',
        'size'      => 24,
    ),
    $attr
  );

  return ab_get_icon_svg( esc_attr($attr['icon']),esc_attr($attr['size'] ) );

}

add_shortcode( 'svg_icon', 'ab_sc_get_svg_icon' );

endif;

?>