<?php
/**
 * Register Widget Areas
 */
if ( ! function_exists( 'ab_register_widget_areas' ) ) :
function ab_register_widget_areas() {

  // Main Sidebar
  register_sidebar( array(
    'name'          => __( 'Blog Sidebar', 'arissberg' ),
    'id'            => 'Blog-sidebar',
    'description'   => __( 'Widgets for Blog Sidebar.', 'arissberg' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>'
  ) );

  // Footer
  register_sidebars(
    5, array(
      'name'          => esc_html__( 'Footer Sidebar %d', 'arissberg' ),
      'id'            => 'sidebar-footer',
      'before_widget' => '<div class="widget %1$s %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h5 class="title-block title-widget">',
      'after_title'   => '</h5>',
    )
  );
}
endif;


/**
 * Unregister Widget Areas
 */
if ( ! function_exists( 'ab_unregister_default_widgets' ) ) :
function ab_unregister_default_widgets() {
  //unregister_widget( 'WP_Widget_Pages' );
  unregister_widget( 'WP_Widget_Calendar' );
  //unregister_widget( 'WP_Widget_Archives' );
  unregister_widget( 'WP_Widget_Links' );
  unregister_widget( 'WP_Widget_Meta' );
  unregister_widget( 'WP_Widget_Search' );
  //unregister_widget( 'WP_Widget_Text' );
  //unregister_widget( 'WP_Widget_Categories' );
  //unregister_widget( 'WP_Widget_Recent_Posts' );
  unregister_widget( 'WP_Widget_Recent_Comments' );
  unregister_widget( 'WP_Widget_RSS' );
  unregister_widget( 'WP_Widget_Tag_Cloud' );
  //unregister_widget( 'WP_Nav_Menu_Widget' );
  unregister_widget( 'Twenty_Eleven_Ephemera_Widget' );
}
endif;