<?php
/**
 *  Template part for displaying post archives and search results
 *
 * @since 1.0.0
 */

$post_meta            = array( 'author', 'date', 'category', 'reading_time' );
$image_classes        = array( 'archive-post-thumb shadow-md' );
$size                 = 'medium';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inline-block py-6 border-gray-300 border-b-2 border-solid '); ?>>

	<div class="archive-container flex flex-wrap md:flex-no-wrap items-center">

		<div class="<?php echo arr_to_str($image_classes); ?>">
        <?php ab_post_thumbnail( apply_filters( 'ab_archive_post_thumb_size', $size ) ); ?>
        <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
		</div>

		<div class="py-2 md:pl-8">
			<header class="article-header">
				<?php ab_get_post_meta( $post_meta, true ); ?>
				<?php the_title( sprintf( '<h3 class="article-title text-2xl sep"><a href="%s" class="article-title-link" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			</header>

			<div class="article-content">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>

</article>