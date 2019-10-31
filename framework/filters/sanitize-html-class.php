<?php
  /* ==========================================================================
  Re-sanitize the html classes but all colons so that we can use the native
  tailwindcss separator
  - Place Yoast at the bottom of the edit screen
  ========================================================================== */
if ( ! function_exists( 'ab_sanitize_html_class' ) ) :
function ab_sanitize_html_class( $sanitized, $class, $fallback) {
  //Strip out any % encoded octets
  $sanitized = preg_replace( '|%[a-fA-F0-9][a-fA-F0-9]|', '', $class );

  //Limit to A-Z,a-z,0-9,_,-,:
  $sanitized = preg_replace( '/[^A-Za-z0-9:\/_-]/', '', $sanitized );
  if ( '' == $sanitized && $fallback ) {
    return ab_sanitize_html_class( $fallback );
  }
  return $sanitized;
}
endif;

add_filter( 'sanitize_html_class', 'ab_sanitize_html_class', 10, 3);

?>