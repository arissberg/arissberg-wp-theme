<?php
/**
 * Wordpress Admin Area Dashboard
 *
 * Functions that clean up the base wordpress admin setup
 *
 * @author Steve Ariss steve@arissberg.com
 * @version 1.0
 */


/* -------------------------------------------------------------------------- *\
    Custom Admin Login Logo
\* -------------------------------------------------------------------------- */
if ( ! function_exists( 'ab_custom_login_logo' ) ) :
function ab_custom_login_logo() {
  $theme_logo_id = get_theme_mod( 'custom_logo' );
  $theme_logo_url = ($theme_logo_id) ? wp_get_attachment_url($theme_logo_id) : __t() . 'public/img/default-logo-black.svg';

  echo '<style type="text/css">
  h1 a { background-image: url(' . $theme_logo_url . ') !important; height: 80px!important; width:300px!important; background-size: contain!important;}
  body.login{ background: #fff; }
  </style>';
}
endif;
add_action( 'login_head', 'ab_custom_login_logo' );


/* -------------------------------------------------------------------------- *\
    Disable wp admin for subscribers
\* -------------------------------------------------------------------------- */
function disable_dashboard() {
  if ( ! is_user_logged_in() ) {
      return null;
  }
  if ( ! current_user_can('administrator') && is_admin() ) {
      wp_redirect( home_url() );
      exit;
  }
}
add_action('admin_init', 'disable_dashboard');



/* -------------------------------------------------------------------------- *\
    Remove the Admin bar if you're not an admin
\* -------------------------------------------------------------------------- */
function remove_admin_bar() {
  if ( ! current_user_can('administrator') && ! is_admin()) {
      show_admin_bar(false);
  }
}
add_action('after_setup_theme', 'remove_admin_bar');



/* -------------------------------------------------------------------------- *\
    Clean up the admin area of functionality we don't need
\* -------------------------------------------------------------------------- */
if( !function_exists('wps_admin_bar') ) :
  function wps_admin_bar() {
      global $wp_admin_bar;
      $wp_admin_bar->remove_menu('wp-logo');
      $wp_admin_bar->remove_menu('about');
      $wp_admin_bar->remove_menu('wporg');
      $wp_admin_bar->remove_menu('documentation');
      $wp_admin_bar->remove_menu('support-forums');
      $wp_admin_bar->remove_menu('feedback');
      $wp_admin_bar->remove_menu('view-site');
  }
  add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );
endif;

remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");


/* -------------------------------------------------------------------------- *\
    Disable some dashboard widgets
\* -------------------------------------------------------------------------- */
if( !function_exists('ab_remove_dashboard_widgets') ) :
  function ab_remove_dashboard_widgets() {
      // Globalize the metaboxes array, this holds all the widgets for wp-admin
      global $wp_meta_boxes;

      // Remove the incomming links widget
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

      // Remove right now
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_getshopped_news']);
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  }
  add_action('wp_dashboard_setup', 'ab_remove_dashboard_widgets' );
endif;


/* -------------------------------------------------------------------------- *\
    Add separators to the admin menu
\* -------------------------------------------------------------------------- */
if( ! function_exists('ab_add_admin_menu_separator') ) :
  function ab_add_admin_menu_separator( $position ) {
    global $menu;

    $menu[ $position ] = array(
      0	=>	'',
      1	=>	'read',
      2	=>	'separator' . $position,
      3	=>	'',
      4	=>	'wp-menu-separator'
    );
  }
endif;

function set_admin_menu_separator() {
  ab_add_admin_menu_separator(50); // Where we'll put Custom Post Types
  ab_add_admin_menu_separator(55); // Where we'll put Custom Post Types
}
//add_action( 'admin_menu', 'set_admin_menu_separator' );



/* -------------------------------------------------------------------------- *\
    Add media library support for SVG's
\* -------------------------------------------------------------------------- */
if( ! function_exists('wps_mime_types"') ) :
  function wps_mime_types( $mimes ){
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
  }
  add_filter( 'upload_mimes', 'wps_mime_types' );
endif;


/* -------------------------------------------------------------------------- *\
    Sanitize File names
\* -------------------------------------------------------------------------- */
/**
 * Filter {@see sanitize_file_name()} and return the lower case.
 *
 * @param string $filename
 * @return string
 */
if( !function_exists('ab_make_filename_lowercase') ) :
  function ab_make_filename_lowercase($filename) {
      $info = pathinfo($filename);
      $ext  = empty($info['extension']) ? '' : '.' . $info['extension'];
      $name = basename($filename, $ext);
      return strtolower($name) . $ext;
  }
  add_filter('sanitize_file_name', 'ab_make_filename_lowercase', 10);
endif;


/* -------------------------------------------------------------------------- *\
    WP Customizer
\* -------------------------------------------------------------------------- */

function ab_customize_register( $wp_customize ) {
  // Do stuff with $wp_customize, the WP_Customize_Manager object.
  $wp_customize->add_setting(
    'custom_logo_white',
    array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'absint'
    )
  );

  $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'custom_logo_white',
    array(
      'label' => __( 'White Logo' ),
      'description' => esc_html__( 'Upload an optional white version of the logo to be used on non-white backgrounds' ),
      'section' => 'title_tagline',
      'priority' => 9,
      'mime_type' => 'image',  // Required. Can be image, audio, video, application, text
      'button_labels' => array( // Optional
        'select' => __( 'Select File' ),
        'change' => __( 'Change File' ),
        'default' => __( 'Default' ),
        'remove' => __( 'Remove' ),
        'placeholder' => __( 'No file selected' ),
        'frame_title' => __( 'Select File' ),
        'frame_button' => __( 'Choose File' ),
      )
    )
  ));
}
add_action( 'customize_register', 'ab_customize_register' );