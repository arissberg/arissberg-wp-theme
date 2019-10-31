<?php


// check function exists.
if( function_exists('acf_register_block_type') && ! function_exists('register_video_overlay_block') ) :

function register_video_overlay_block() {
  // register a testimonial block.
  acf_register_block_type(
    array(
      'name'              => 'videooverlay',
      'title'             => __('Video Overlay'),
      'description'       => __('Display a YouTube video in an overlay.'),
      'render_callback'   => 'ab_video_overlay_block_render_callback',
      //'render_template'   => 'template-parts/blocks/video-overlay.php',
      'category'          => 'formatting',
      'icon'              => 'video-alt3',
      'keywords'          => array('video', 'Youtube'),
      'align'             => 'full',
      'supports'          => array(
        'multiple' => true,
      ),
      'enqueue_assets' 	=> function() {
        wp_enqueue_script( 'block-video-overlay', mix('/dist/js/video-overlay.min.js'), array(), wp_get_theme()->get('Version'), true );
      },
    )
  );
}

// Register the block.
add_action('acf/init', 'register_video_overlay_block');

endif;


function ab_video_overlay_block_render_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {

  //Only Show in backend
  //if ( ! $is_preview ) return;

  //Add the video modal code and YoutubeJS to the bottom of the page
  add_action( 'ab_body_end', function() {
    //get_template_part('template-parts/blocks/video-overlay');
  });

}

?>