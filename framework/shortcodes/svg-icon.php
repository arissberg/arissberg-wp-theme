<?php
if ( ! function_exists( 'd6_sc_get_svg_icon' ) ) :
/**
* Get an SVG icon from the icon library
*/
function d6_sc_get_svg_icon( $attr ) {

  if ( ! isset( $attr['icon'] ) ) {
    $output = '';
  }

  $output = apply_filters( 'd6_svg_icon_shortcode', '', $attr );

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

  return d6_get_icon_svg( esc_attr($attr['icon']),esc_attr($attr['size'] ) );

}

add_shortcode( 'svg_icon', 'd6_sc_get_svg_icon' );

endif;

?>