<?php


// check function exists.
if( function_exists('acf_register_block_type') && ! function_exists('register_page_properties_block') ) :

function register_page_properties_block() {
  // register a testimonial block.
  acf_register_block_type(
    array(
      'name'              => 'page-properties',
      'title'             => 'Page Properties',
      'render_callback'   => 'ab_page_properties_block_render_callback',
      'category'          => 'common',
      'icon'              => 'images-alt2',
      'keywords'          => array('meta', 'navigation'),
      'post_types'        => array('post', 'page'),
      'mode'              => 'preview',
      'align'             => '',
      'supports'          => array(
        'multiple' => false,
      ),
    )
  );
}

// Register the block.
add_action('acf/init', 'register_page_properties_block');

endif;



function ab_page_properties_block_render_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {

    //Only Show in backend
    if ( ! $is_preview ) return;

    //$transparent_nav = get_field('transparent_main_navigation_on_load') ?: 'Author name';
    $transparent_nav = ab_get_field('transparent_main_navigation_on_load');

    echo '<span class="page-property">Transparent Navigation: ' . $transparent_nav . '</span>';


}

// Automatically add the block to every page
function ab_register_template() {
    $post_type_object = get_post_type_object( 'page' );
    $post_type_object->template = array(
        array( 'acf/page-properties' ),
    );
}
add_action( 'init', 'ab_register_template' );

?>