<?php
/**
 * Category Archive
 *
 * The main archive template.
 * See all archive parts at includes/loop/
 *
 */
?>

<section class="latest-post mt-24 pb-16">
  <div class="container-narrow mx-auto ">
  <?php do_action( 'ab_archive_start' ); ?>

    <div class="post-archive lg:w-3/4">

      <?php if ( have_posts() ) :

        // Get total number of posts.
        $total = $wp_query->post_count;

        echo '<h2 class="page-title">Post Category:</h2>';

        while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/content/content', 'archive' );

        endwhile;

        // Previous/next page navigation.
        echo '<div class="archive-pagination border-gray-200 border-t-2 border-solid my-8 py-4">';
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
