<?php
if ( ! function_exists( 'ab_max_srcset_image_width' ) ) :
  /**
   * Change max image width in srcset attribute
   *
   * @param int   $max_width  The maximum image width to be included in the 'srcset'. Default '1600'.
   * @param array $size_array Array of width and height values in pixels (in that order).
   */
  function ab_max_srcset_image_width( $max_width, $size_array ) {
    return 2800;
  }
endif;
add_filter( 'max_srcset_image_width', 'ab_max_srcset_image_width', 10, 2 );


?>