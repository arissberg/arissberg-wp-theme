<?php

if ( ! function_exists( 'extract_youtube_id' ) ) :
/**
 * Extract the video id from a youtube url
 *
 * @param string $url Youtube url
 *
 * @return string
*/
function extract_youtube_id( $url ) {

	parse_str( wp_parse_url( $url, PHP_URL_QUERY ), $vars );

	if ( ! isset( $vars['v'] ) ) {
		return '';
	}

	return $vars['v'];
}
endif;

?>