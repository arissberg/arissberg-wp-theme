<?php

/**
 * Team Member Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

global $post;

// Create id attribute allowing for custom "anchor" value.
$id = 'teamMemberSlider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'glide team-member-slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>

<div id="<?php echo esc_attr($id); ?>" class="content-center items-center <?php echo esc_attr($className); ?>">

<?php if( ab_have_rows('team_members') ) :
  $tm_count = count( ab_get_field('team_members') );
  $show_job_title = ab_get_field('show_job_title');
  $bio_to_display = ab_get_field('bio_to_display');
  $show_social_links = ab_get_field('show_social_links');

?>
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">

    <?php while( ab_have_rows('team_members') ) : the_row();
      $team_member = ab_get_sub_field('team_member');

      if( $team_member ) :
        // override $post
        $post = $team_member;
        setup_postdata( $post );

    ?>
      <li class="glide__slide text-left list-none">
        <div class="photo pb-8"><?= get_the_post_thumbnail( $post->ID, 'medium' ); ?></div>
        <h3 class="pb-4 block"><?php the_title(); ?></h3>

        <?php if ($show_job_title && $job_title = ab_get_field('job_title', $post->ID) ) : ?>
          <p class="text-xs font-bold"><?= $job_title; ?></p>
        <?php endif; ?>

        <?php if ($bio_to_display == 'bio' && $bio = ab_get_field('bio', $post->ID) ) : ?>
          <div class="bio show-more text-sm pb-4"><?= ab_show_more($bio); ?></div>
        <?php endif; ?>

        <?php if ($bio_to_display == 'training' && $training = ab_get_field('training_bio', $post->ID) ) : ?>
          <div class="bio show-more text-sm pb-4"><?= ab_show_more($training); ?></div>
        <?php endif; ?>

        <?php
          if ($show_social_links ) :
            $social_items = [];
            (! ab_get_field('linkedin', $post->ID))?: $social_items['linkedin'] = ab_get_field('linkedin', $post->ID);
            (! ab_get_field('twitter', $post->ID))?: $social_items['twitter'] = ab_get_field('twitter', $post->ID);
        ?>
        <p class="social-links inline-flex">
          <?= ab_social_links( $social_items ) ?>
        </p>
        <?php endif; ?>

      </li>
      <?php wp_reset_postdata(); endif; ?>

    <?php endwhile; ?>

    </ul>

  </div>


  <div class="glide__arrows lg:hidden" data-glide-el="controls">
    <button class="glide__arrow glide__arrow--left -mr-10" data-glide-dir="&#60;"><?= ab_get_icon_svg('chevron_left_thin', 94); ?></button>
    <button class="glide__arrow glide__arrow--right" data-glide-dir="&#62;"><?= ab_get_icon_svg('chevron_right_thin', 94); ?></button>
  </div>

  <div class="glide__bullets pt-2 md:hidden" data-glide-el="controls[nav]">
    <?php for ($i=0; $i < $tm_count; $i++) : ?>
      <button class="glide__bullet" data-glide-dir="<?= '=' . $i; ?>"></button>
    <?php endfor; ?>

  </div>

<?php else : ?>
  <p>Please add some team members.</p>
<?php endif; ?>

</div>
