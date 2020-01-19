<?php
/* -------------------------------------------------------------------------- *\
    Queue Assets
\* -------------------------------------------------------------------------- */

function ab_queue_theme_assets()
{
  wp_enqueue_script(
    'script-bundle',
    mix('/public/js/site.js'),
    array(),
    wp_get_theme()->get('Version'),
    true
  );
  wp_enqueue_style(
    'style-bundle',
    mix('/public/css/site.css'),
    array(),
    wp_get_theme()->get('Version')
  );
}
add_action('wp_enqueue_scripts', 'ab_queue_theme_assets');

function ab_gutenberg_scripts()
{
  wp_enqueue_script(
    'be-editor',
    mix('/public/js/editor.js'),
    array('wp-blocks', 'wp-dom'),
    wp_get_theme()->get('Version'),
    true
  );
}
//add_action( 'enqueue_block_editor_assets', 'ab_gutenberg_scripts' );

function ab_remove_block_css()
{
  wp_dequeue_style('wp-block-library-theme');
  wp_dequeue_style('wp-block-library');
}
//add_action('wp_enqueue_scripts', 'ab_remove_block_css', 100);

/* -------------------------------------------------------------------------- *\
    defer or asynchronously load scripts
\* -------------------------------------------------------------------------- */
function js_async_attr($tag)
{
  # add defer or async attribute to these scripts
  $scripts_to_include = array('use.typekit.net', 'maps.googleapis.com');

  foreach ($scripts_to_include as $include_script) {
    if (false == strpos($tag, $include_script)) {
      return $tag;
    }
  }

  # Defer or async all remaining scripts not excluded above
  return str_replace(' src', ' defer async src', $tag);
}
add_filter('script_loader_tag', 'js_async_attr', 10);
