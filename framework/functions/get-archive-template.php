<?php

if ( ! function_exists( 'ab_get_archive_template' ) ) :
  /**
   * Get the correct archive template based on the current page
   *
   * @return void
   */
  function ab_get_archive_template() {

    if ( is_post_type_archive() ) {

      get_template_part( 'template-parts/loop/' . get_post_type() . '-archive');

    } else {

      get_template_part( 'template-parts/loop/archive' );

    }
  }
endif;

?>