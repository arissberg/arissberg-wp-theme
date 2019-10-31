<?php
if ( ! function_exists( 'can_show_post_thumbnail' ) ) :
 /**
* Determines if post thumbnail can be displayed.
*
* @return boolean
*/
function can_show_post_thumbnail() {
  return apply_filters( 'can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}
endif;

?>