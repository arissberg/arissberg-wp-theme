<?php
/**
 *  Template part for displaying the latest post
 *
 * @since 1.0.0
 */

add_filter( 'ab_read_more', 'ab_post_read_more');
add_filter( 'excerpt_length', 'ab_latest_post_excerpt_length');

$post_meta            = array( 'author', 'date', 'category', 'reading_time' );
$image_classes        = array( 'latest-post-thumb hidden lg:inline-block order-first lg:order-last shadow-2xl' );
$size                 = 'large';
$excerpt							= get_the_excerpt();

remove_filter( 'excerpt_length', 'ab_latest_post_excerpt_length' );
remove_filter( 'ab_read_more', 'ab_post_read_more');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="archive-container flex flex-wrap lg:flex-no-wrap items-center justify-between">

		<div class="lg:w-1/2 py-8 lg:pr-8">
			<header class="article-header text-white">
				<?php ab_get_post_meta( $post_meta, true ); ?>
				<?php the_title( sprintf( '<h1 class="article-title text-4xl md:text-5xl sep"><a href="%s" class="article-title-link text-white leading-none" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			</header>

			<div class="article-content text-white">
				<?= $excerpt; ?>
			</div>
		</div>

		<div class="<?php echo arr_to_str($image_classes); ?>">
      <?php ab_post_thumbnail( apply_filters( 'ab_archive_post_thumb_size', $size ) ); ?>
      <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
		</div>

	</div>

</article>