<?php
if ( ! function_exists( 'ab_social_links' ) ) :
/*
* Undocumented Function
*/
function ab_social_links( array $links = array() ) {

  $output = '';

  //Should be a theme option
  $url_map = array(
    'twitter' => 'https://twitter.com/',
    'linkedin' => 'https://www.linkedin.com/in/',
  );

  foreach ($links as $key => $value) {
    $url = esc_url( $url_map[$key] . $value );
    $class = sanitize_html_class( $key );
    $title = esc_html( ucfirst($key) );
    $icon = ab_get_social_link_svg( $url );
    $output .= sprintf( '<a href="%s" class="social-link %s" title="%s" target="_blank">%s</a>', $url, $class, $title, $icon );
  }

  return $output;

}
endif;

?>