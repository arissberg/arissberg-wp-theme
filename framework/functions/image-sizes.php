<?php

if ( ! function_exists( 'ab_default_image_sizes' ) ) :
  /**
   * Define default image sizes
   * Only called when the theme is initially setup
   * The ab_default_image_sizes_set row in the options table needs to be deleted to reset this
   */
  function ab_default_image_sizes() {

    if ( get_option( 'ab_default_image_sizes_set' ) ) {
      return;
    }

    //Update the default sizes
    update_option( 'thumbnail_size_w', 200 );
    update_option( 'thumbnail_size_h', 200 );
    update_option( 'thumbnail_crop', true );

    update_option( 'medium_size_w', 800 );
    update_option( 'medium_size_h', 0 );

    update_option( 'medium_large_size_w', 1024 );
    update_option( 'medium_large_size_h', 0 );

    update_option( 'large_size_w', 1280 );
    update_option( 'large_size_h', 0 );

    //Add additional sizes below
    $additional_image_sizes = array(
      array(
        'slug'   => 'medium-portrait',
        'width'  => 0,
        'height' => 640,
        'crop'   => false,
      ),
      array(
        'slug'   => 'large-portrait',
        'width'  => 720,
        'height' => 0,
        'crop'   => false,
      ),
    );

    //Register new image sizes with WP
    foreach ( $additional_image_sizes as $image_size ) {
      add_image_size( $image_size['slug'], $image_size['width'], $image_size['height'], $image_size['crop'] );
    }

    update_option( 'ab_default_image_sizes_set', true );
  }
endif;


if ( ! function_exists( 'ab_calculate_image_orientation' ) ) {
  /**
   * Calculate Image Orientation
   *
   * @param array  $image_sizes Image sizes.
   * @param string $prefix      Prefix for image size name.
   */
  function ab_calculate_image_orientation( $image_sizes, $prefix ) {
    if ( ! is_array( $image_sizes ) ) {
      return;
    }
    $choices = array();
    foreach ( $image_sizes as $image_size ) {
      if ( ! is_int( $image_size ) ) {
        return;
      }
      $choices[] = array(
        array(
          'slug'   => $prefix . '-' . $image_size,
          'width'  => $image_size,
          'height' => 0,
          'crop'   => false,
        ),
        array(
          'slug'   => $prefix . '-' . $image_size . '-landscape',
          'width'  => $image_size,
          'height' => (int) round( $image_size * 0.75 ),
          'crop'   => true,
        ),
        array(
          'slug'   => $prefix . '-' . $image_size . '-portrait',
          'width'  => $image_size,
          'height' => (int) round( $image_size / 0.75 ),
          'crop'   => true,
        ),
        array(
          'slug'   => $prefix . '-' . $image_size . '-square',
          'width'  => $image_size,
          'height' => $image_size,
          'crop'   => true,
        ),
      );
    }
    return $choices;
  }
}
?>