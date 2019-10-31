<?php
/**
 * Add Classes to the main body
 */

if ( ! function_exists( 'ab_body_class' ) ) :

    function ab_body_class( $classes ) {
        global $post;

        $new_classes = array();

        // if ( is_home() && ! is_paged() ) {
        //     $new_classes[] = 'navbar--white';
        // }

        // if ( is_paged() || is_archive() || is_category() || is_search() ) {
        //     $new_classes[] = 'mt-10';
        // }

        //If there's post content then parse the blocks
        if ( ! is_null( $post) ) :

            $blocks = parse_blocks( $post->post_content );

            foreach( $blocks as $block ) {
                if( 'acf/page-properties' === $block['blockName'] ) {

                    if( !empty( $block['attrs']['data']['transparent_main_navigation_on_load'] ) )
                        $new_classes[] = ( ! $block['attrs']['data']['transparent_main_navigation_on_load'] ) ?: 'navbar--white';

                    break;

                }
            }

        endif;

        return array_merge( $classes, $new_classes );
    }

add_filter( 'body_class', 'ab_body_class' );

endif;


?>