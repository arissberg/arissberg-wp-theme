<?php
/**
 * Template part for displaying posts
 *
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if ( ! ab_can_show_post_thumbnail() ) : ?>
	<header class="entry-header text-center">
		<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
	</header>
  <?php endif; ?>

  <?php do_action( 'ab_post_start' ); ?>

  <div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'arissberg' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'arissberg' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

  <?php do_action( 'ab_post_end' ); ?>

</article>