<?php

get_header();

?>

<?php while ( have_posts() ) : the_post(); ?>

  <?php do_action( 'ab_page_before' ); ?>

  <article id="page-<?php the_ID(); ?>" <?php post_class('entry-content'); ?>>

    <?php do_action( 'ab_page_start' ); ?>

      <?php the_content(); ?>

    <?php do_action( 'ab_page_end' ); ?>

  </article>

  <?php do_action( 'ab_page_after' ); ?>

  <?php

  endwhile;
  ?>

<?php

get_footer();

?>