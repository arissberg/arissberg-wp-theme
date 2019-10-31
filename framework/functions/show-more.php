<?php
if ( ! function_exists( 'ab_show_more' ) ) :
/**
* Show More functionality
*/
function ab_show_more( $text, $length = 155, $after = '&hellip;' ) {

  if ( strlen($text) <= $length ) {
    return $text;
  };

  $visible = ab_limit_chars( $text, $length, '' );

  $hidden = substr( $text, strlen($visible) );

  $formatted = '';
  $formatted .= '<p class="show-more__content">';
  $formatted .= '%s<span class="break-character">%s</span><span class="hidden-text hidden">%s</span>';
  $formatted .= '</p>';
  $formatted .= '<button class="show-more__btn text-blue-400 hover:text-blue-300 font-semibold ">Read more</button>';

  return sprintf( $formatted, $visible, $after, $hidden );
  //return $visible . '<span class="">' . $after . '</span><span class="hidden">' . $hidden .'</span>';
}
endif;
?>