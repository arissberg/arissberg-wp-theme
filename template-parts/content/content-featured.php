<?php
/**
 *  Template part for displaying the latest post
 *
 * @since 1.0.0
 */

$post_meta            = array( 'author' );
$image_classes        = array( 'featured-post-thumb' );
$size                 = 'medium';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('featured-post glide__slide'); ?>>

	<div class="flex flex-col md:flex-no-wrap items-center justify-start relative shadow-lg">

		<div class="<?php echo arr_to_str($image_classes); ?>">
			<?php ab_post_thumbnail( apply_filters( 'ab_archive_post_thumb_size', $size ) ); ?>
			<a href="<?php the_permalink(); ?>" class="overlay-link"></a>
		</div>

		<div class="featured-post-content">
			<header class="article-header">
				<?php ab_get_post_meta( $post_meta, true ); ?>
				<?php the_title( sprintf( '<h3 class="article-title sep"><a href="%s" class="article-title-link" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			</header>

			<div class="article-content">
				<?php the_excerpt(); ?>
			</div>
		</div>

	</div>

</article>