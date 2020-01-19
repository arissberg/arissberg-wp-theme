<?php
/**
 * Add Theme Support
 *
 * Called with action after_setup_theme
 *
 */

if (!function_exists('ab_theme_support')):
  function ab_theme_support()
  {
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag'); // Enable plugins to manage the document title
    add_theme_support('html5', array(
      'comment-list',
      'comment-form',
      'search-form',
      'gallery',
      'caption'
    ));
    add_theme_support('post-formats', array('gallery', 'video', 'image'));

    // Add RSS links to head
    add_theme_support('automatic-feed-links');

    //Add Post Type Support
    add_post_type_support('page', 'excerpt');

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for Block Styles.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align in Gutenberg.
    add_theme_support('align-wide');

    // Add support for editor styles.
    add_theme_support('editor-styles');

    // Enqueue editor styles.
    add_editor_style('public/css/style-editor.css');
    add_editor_style('public/css/site.css');

    //Customizer
    add_theme_support('custom-logo');

    // Add custom editor font sizes.
    add_theme_support('editor-font-sizes', array(
      array(
        'name' => __('Small', 'arissberg'),
        'shortName' => __('S', 'arissberg'),
        'size' => 19.5,
        'slug' => 'small'
      ),
      array(
        'name' => __('Normal', 'arissberg'),
        'shortName' => __('M', 'arissberg'),
        'size' => 22,
        'slug' => 'normal'
      ),
      array(
        'name' => __('Large', 'arissberg'),
        'shortName' => __('L', 'arissberg'),
        'size' => 36.5,
        'slug' => 'large'
      ),
      array(
        'name' => __('Huge', 'arissberg'),
        'shortName' => __('XL', 'arissberg'),
        'size' => 49.5,
        'slug' => 'huge'
      )
    ));

    // Editor color palette.
    add_theme_support('editor-color-palette', array(
      array(
        'name' => __('Primary', 'arissberg'),
        'slug' => 'primary',
        'color' => hsl_to_hex(
          'default' === get_theme_mod('primary_color')
            ? 199
            : get_theme_mod('primary_color_hue', 199),
          100,
          33
        )
      ),
      array(
        'name' => __('Secondary', 'arissberg'),
        'slug' => 'secondary',
        'color' => hsl_to_hex(
          'default' === get_theme_mod('primary_color')
            ? 199
            : get_theme_mod('primary_color_hue', 199),
          100,
          23
        )
      ),
      array(
        'name' => __('Dark Gray', 'arissberg'),
        'slug' => 'dark-gray',
        'color' => '#111'
      ),
      array(
        'name' => __('Light Gray', 'arissberg'),
        'slug' => 'light-gray',
        'color' => '#767676'
      ),
      array(
        'name' => __('White', 'arissberg'),
        'slug' => 'white',
        'color' => '#FFF'
      )
    ));
  }
endif;
