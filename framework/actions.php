<?php
/**
 * All core theme actions registrations.
 *
 */

 /* -------------------------------------------------------------------------- *\
    Setup Theme
\* -------------------------------------------------------------------------- */


/* -------------------------------------------------------------------------- *\
    After Setup Theme
\* -------------------------------------------------------------------------- */
add_action( 'after_setup_theme', 'ab_theme_support');



/* -------------------------------------------------------------------------- *\
    After Switch Theme
\* -------------------------------------------------------------------------- */
add_action( 'after_switch_theme', 'ab_default_image_sizes' );


/* -------------------------------------------------------------------------- *\
    Init
    Add any custom post type initialization here
\* -------------------------------------------------------------------------- */



/* -------------------------------------------------------------------------- *\
    Widgets Init
\* -------------------------------------------------------------------------- */
//Register Widget Areas
add_action( 'widgets_init', 'ab_register_widget_areas' );

//Remove some defaults widgets
add_action( 'widgets_init', 'ab_unregister_default_widgets' );

/* -------------------------------------------------------------------------- *\
    Modify Main Query
\* -------------------------------------------------------------------------- */
add_action( 'pre_get_posts', 'alter_query_with_conditional_tags' );


/* -------------------------------------------------------------------------- *\
    WP Head
\* -------------------------------------------------------------------------- */
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action('wp_head', 'rel_canonical');
//REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

add_action( 'wp_head', 'ab_add_favicon' ); //Add Favicon


/* -------------------------------------------------------------------------- */
/* -------------------------- THEME SPECIFIC -------------------------------- */
/* -------------------------------------------------------------------------- */

/**
 * Admin Init
 *
 */
add_action( 'ab_admin_init', 'add_admin_menu_separator' );


/**
 * Body
 *
 * Available hooks: ab_body_start, ab_body_end
 */
add_action( 'ab_body_start', 'ab_skip_to_content' );
add_action( 'ab_body_start', 'ab_navbar_primary' );


 /**
 * Main Site Container
 *
 * Available hooks: ab_site_start, ab_site_end
 */
//add_action( 'ab_site_start', 'ab_get_page_header', 15 );
//add_action( 'ab_site_start', 'ab_open_page_layout_container', 16 );

//add_action( 'ab_site_end', 'ab_close_page_layout_container', 16 );


/**
 * Main Site Footer
 */
add_action( 'ab_site_footer', 'ab_footer_widgets', 10 );



/**
 * Pages
*/
//add_action( 'ab_page_before', $function_to_add );
//add_action( 'ab_page_start', $function_to_add );
//add_action( 'ab_page_end', $function_to_add );
//add_action( 'ab_page_after', $function_to_add );

/**
 * Archives
 */
//add_action( 'ab_archive_loop_end', 'ab_posts_load_more', 10);


/**
 * Posts
 */