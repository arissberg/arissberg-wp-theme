<?php
/**
 * Output the footer navigation at the bottom of the page
 *
 * Called with action: ab_body_start
 *
 * @return void
 */

if ( ! function_exists( 'ab_footer_navigation' ) ) :

  function ab_footer_navigation() {

    if ( has_nav_menu( 'footer-menu' ) ) :
      $template_args['footer_menu'] = wp_nav_menu(
        array(
          'theme_location'  => 'footer-menu',
          'menu_id'         => 'footerMenu',
          'container'       => 'nav',
          'menu_class'      => 'menu',
          'container_class' => 'footer-menu',
          'depth'           => 1,
          'echo'            => true
        )
      );
    endif;

  }
endif;