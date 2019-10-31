<?php
/**
 * Output the main nav / top bar
 *
 * Called with action: ab_body_start
 *
 * @return void
 */
if ( ! function_exists( 'ab_navbar_primary' ) ) :

  function ab_navbar_primary() {

    $template_args = array();

    // Get navbar settings.
    $template_args['logo_text']           = get_theme_mod( 'navbar_logo_text', get_bloginfo( 'name' ) );
    $template_args['logo_default_url']    = get_theme_mod( 'navbar_logo_default_url', __t() . 'dist/img/aquent-dev6.svg' );
    $template_args['logo_white_url']      = get_theme_mod( 'navbar_logo_white_url', __t() . 'dist/img/aquent-dev6-white.svg' );

    // Primary Menu
    if ( has_nav_menu( 'primary-menu' ) ) :
      $template_args['primary_menu'] = wp_nav_menu(
        array(
          'theme_location'  => 'primary-menu',
          'menu_id'         => 'primaryMenu',
          'container'       => 'nav',
          'menu_class'      => 'menu',
          'container_class' => 'primary-menu',
          'depth'           => 2,
          'echo'            => false
        )
      );
    endif;

    // Primary Menu
    if ( has_nav_menu( 'secondary-menu' ) ) :
      $template_args['secondary_menu'] = wp_nav_menu(
        array(
          'theme_location'  => 'secondary-menu',
          'menu_id'         => 'secondaryMenu',
          'container'       => 'nav',
          'menu_class'      => 'menu inline-flex',
          'container_class' => 'secondary-menu',
          'depth'           => 1,
          'echo'            => false
        )
      );
    endif;

    get_template_part_props( 'template-parts/header/header', $template_args );

  }

endif;

?>