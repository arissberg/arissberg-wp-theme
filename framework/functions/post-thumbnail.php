<?php
if ( ! function_exists( 'ab_post_thumbnail' ) ) :
  /**
   * Wrapper function for the_post_thumbnail
   *
   * Returns a default image set in the theme if no image is set
   *
   * @param string $size
   * @param array $att
   * @return void
   */
  function ab_post_thumbnail( $size = 'large', $attr = array() ) {

    if( has_post_thumbnail() ) {
      the_post_thumbnail($size, $attr);
    } else {
      $placeholder_id = get_theme_mod( 'placeholder_image', 509 );
      echo wp_get_attachment_image( $placeholder_id, $size, false, $attr );
    }

  }
endif;
?>