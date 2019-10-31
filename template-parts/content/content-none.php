<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 */

?>

<section class="no-results not-found">

  <div class="page-content">
    <h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'arissberg' ); ?></h2>
    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

      <p><?php
        /* translators: 1. link opening tag, 2. link closing tag */
        printf( esc_html__( 'Ready to publish your first post? %1$sGet started here%2$s.', 'arissberg' ), '<a href="' . esc_url( admin_url( 'post-new.php' ) ) . '">', '</a>' ); ?></p>

    <?php elseif ( is_search() ) : ?>

      <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'arissberg' ); ?></p>
      <?php get_search_form(); ?>

    <?php else : ?>

      <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'arissberg' ); ?></p>
      <?php get_search_form(); ?>

    <?php endif; ?>
  </div><!-- .page-content -->
</section><!-- .no-results -->
