<?php

/**
 * Add a screen reader only link to the top of the page that scrolls to the content
 * Needed for AODA
 *
 * @return void
 */
if ( ! function_exists( 'ab_skip_to_content' ) ) :
  function ab_skip_to_content() {
    ?>
    <a class="sr-only" href="#content"><?php _e( 'Skip to content', 'arissberg' ); ?></a>
    <?php
  }
endif;


add_action( 'ab_body_start', 'ab_skip_to_content' );

?>