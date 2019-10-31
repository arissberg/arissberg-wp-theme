<?php

if ( ! function_exists('d6_sc_get_image_from_media_library') ) :

function d6_sc_get_image_from_media_library( $attr, $content = null ) {

    if ( ! isset( $attr['id'] ) ) {
        $output = '';
    }

    $output = apply_filters( 'd6_media_library_shortcode', '', $attr, $content );

    if ( $output != '' )
        return $output;


    $attr = shortcode_atts(
        array(
            'id'        => '',
            'size'      => 'thumbnail',
            'class'     => '',
        ),
        $attr
    );

    $classes = [
        "attachment-" . $attr['size'],
        "size-" . $attr['size']
    ];

    $classes = array_merge( $classes, explode(' ', $attr['class']) );

    $img_attr = array(
        'class' => arr_to_str($classes, ' ')
    );

    $output = wp_get_attachment_image( esc_attr($attr['id'] ), esc_attr($attr['size']), false, $img_attr);

    return $output;
}

add_shortcode( 'media_library', 'd6_sc_get_image_from_media_library' );

endif;

?>