<?php
if ( ! function_exists( 'ab_posts_pagination' ) ) :
	/**
	 * Documentation for function.
	 */
	function ab_posts_pagination() {

		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					ab_get_icon_svg( 'chevron_left', 22 ),
					__( 'Newer posts', 'd6' )
				),
				'next_text' => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					__( 'Older posts', 'd6' ),
					ab_get_icon_svg( 'chevron_right', 22 )
				),
			)
		);

	}
endif;

?>