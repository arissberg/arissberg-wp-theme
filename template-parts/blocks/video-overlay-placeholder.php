<?php

/**
 * Client Logo Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

?>

<button class="video-img shadow-2xl relative" data-video="<?= $video ?>">
  <?= $poster_img; ?>
  <div class="absolute bottom-0 text-white flex items-center p-4">
    <span class="mr-2"><?= ab_get_icon_svg('play_circle_outline', '48') ?></span>
    <?= $title; ?>
  </div>
</button>