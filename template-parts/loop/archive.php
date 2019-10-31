<?php
/**
 * Post Archive
 *
 * The main archive template.
 * See all archive parts at includes/loop/
 *
 */

?>

<?php if( ! is_paged() && ! is_category() && ! is_author() && ! is_search() ) : ?>

<section class="latest-post bg-fractal-bottom-center md:bg-fractal-bottom-right pt-24 lg:pt-32 pb-20 overflow-hidden">
  <div class="container-narrow mx-auto ">
    <?php

      $latest_post = ab_get_latest_post();

      if ($latest_post->have_posts()) : $latest_post->the_post();
        $latest_post_id = get_the_ID();
        get_template_part( 'template-parts/content/content', 'latest' );
      endif;

      /* Restore original Post Data */
      wp_reset_postdata();

    ?>
  </div>
</section>

<?php
  $featured_posts = ab_get_featured_posts( 3, array($latest_post_id) );

  if ( $featured_posts->have_posts() ) :
    ab_featured_post_slider_scripts(); //Please get rid of this
?>

<section class="featured-posts bg-white-to-gray-300 py-12">
  <div class="container-slider mx-auto">
    <h2 class="page-title sep mb-2">Popular Posts</h2>

    <div class="featured-posts-slider content-center items-center glide team-member-slider">
      <div class="glide__track" data-glide-el="track">
        <div class="glide__slides">
        <?php
          while ( $featured_posts->have_posts() ) : $featured_posts->the_post();
            get_template_part( 'template-parts/content/content', 'featured' );
          endwhile;
        ?>
        </div>
      </div>

      <div class="glide__arrows hidden md:inline-block lg:hidden" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="&#60;"><?= ab_get_icon_svg('chevron_left_thin', 94); ?></button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir="&#62;"><?= ab_get_icon_svg('chevron_right_thin', 94); ?></button>
      </div>

      <div class="glide__bullets pt-2 md:hidden text-center" data-glide-el="controls[nav]">
        <?php for ($i=0; $i < $featured_posts->post_count; $i++) : ?>
          <button class="glide__bullet" data-glide-dir="<?= '=' . $i; ?>"></button>
        <?php endfor; ?>
      </div>

    </div>

  </div>
</section>

<?php endif;
/* Restore original Post Data */
wp_reset_postdata();
?>

<?php endif; ?>

<section class="pt-12 pb-6">
  <div class="container-narrow mx-auto ">
    <?php do_action( 'ab_archive_start' ); ?>

    <div class="post-archive lg:w-3/4 mx-auto">

      <?php if ( have_posts() ) :

        // Get total number of posts.
        $total = $wp_query->post_count;

        the_archive_title( '<h2 class="page-title sep">', '</h2>' );

        while ( have_posts() ) : the_post();

          // Start counting posts.
          $current = $wp_query->current_post + 1;

          get_template_part( 'template-parts/content/content', 'archive' );

        endwhile;

        // Previous/next page navigation.
        echo '<div class="archive-pagination border-gray-300 border-t-2 border-solid py-4">';
          ab_posts_pagination();
        echo '</div>';

        do_action( 'ab_archive_loop_end' );

      else :

        get_template_part( 'template-parts/content/content', 'none' );

      endif;
      ?>

    </div> <!-- .post-archive -->

    <?php do_action( 'ab_archive_end' ); ?>

  </div>
</section>