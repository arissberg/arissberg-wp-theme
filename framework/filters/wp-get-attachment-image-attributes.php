<?php
if ( ! function_exists( 'ab_attachment_image_attributes' ) ) :
  /**
   * Force browser to base their calculations on viewport height, if the screen ratio is vertical.
   * Valid for Large Page Headers.
   *
   * @param array        $attr        Attributes for the image markup.
   * @param WP_Post      $attachment  Image attachment post.
   * @param string|array $size        Requested size. Image size or array of width and height values (in that order). Default 'thumbnail'.
   */
  function ab_attachment_image_attributes( $attr, $attachment, $size ) {

    if ( 'd6-1920' === $size ) {
      $attr['sizes'] = '(min-aspect-ratio: 1/1) 100vw, 100vh';
    }

    //Don't LQIP SVG's
    if ( 'image/svg+xml' === $attachment->post_mime_type ) {
      // $attr['class'] .= ' pk-lazyload-disabled';
      $attr['class'] .= ' pk-lazyload-disabled type-svg';
    }
    return $attr;
  }
endif;
add_filter( 'wp_get_attachment_image_attributes', 'ab_attachment_image_attributes', 10, 3 );


?>
