<?php
/* -------------------------------------------------------------------------- *\
    Queue Assets
\* -------------------------------------------------------------------------- */

function hop_queue_theme_assets() {
  wp_enqueue_script( 'script-bundle', mix('/dist/js/bundle.min.js'), array(), wp_get_theme()->get('Version'), true );
  wp_enqueue_style( 'style-bundle', mix('/dist/css/bundle.min.css'), array(), wp_get_theme()->get('Version') );
};
add_action( 'wp_enqueue_scripts', 'hop_queue_theme_assets' );


function hop_gutenberg_scripts() {
	wp_enqueue_script( 'be-editor', mix('/dist/js/editor.min.js'), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get('Version'), true);
}
//add_action( 'enqueue_block_editor_assets', 'hop_gutenberg_scripts' );


/* -------------------------------------------------------------------------- *\
    defer or asynchronously load scripts
\* -------------------------------------------------------------------------- */
function js_async_attr($tag) {

  # add defer or async attribute to these scripts
  $scripts_to_include = array(
    'use.typekit.net',
    'maps.googleapis.com'
  );

  foreach ( $scripts_to_include as $include_script ) {
    if ( false == strpos($tag, $include_script ) )
      return $tag;
  }

  # Defer or async all remaining scripts not excluded above
  return str_replace( ' src', ' defer async src', $tag );
}
add_filter( 'script_loader_tag', 'js_async_attr', 10 );
