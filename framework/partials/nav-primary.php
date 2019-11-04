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

    $theme_logo_id = get_theme_mod( 'custom_logo' );
    $theme_logo_white_id = get_theme_mod( 'custom_logo_white' );

    $template_args = array();

    // Get navbar settings.
    $template_args['logo_text']           = get_theme_mod( 'navbar_logo_text', get_bloginfo( 'name' ) );
    $template_args['logo_default_url']    = ($theme_logo_id) ? wp_get_attachment_url($theme_logo_id) : __t() . 'public/img/default-logo-black.svg';
    $template_args['logo_white_url']      = ($theme_logo_white_id) ? wp_get_attachment_url($theme_logo_white_id) : false;

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