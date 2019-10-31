<?php
if ( ! function_exists( 'ab_main_class' ) ) :
  /**
   * Add classes to the themes 'main' dom element
   *
   * @param [type] $classes
   * @return void
   */
  function ab_main_class( $classes ) {

    // $header_type = ab_get_page_header_type();

    // if ( 'homepage' !== $header_type) {
    //   $classes[] = 'push-content';
    // }

    return $classes;
  }
endif;
add_filter('ab_maincontainer_class', 'ab_main_class');


?>