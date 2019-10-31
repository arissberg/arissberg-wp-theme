<?php
/**
 * Video Overlay Template
 *
 */
?>
<div id="videoOverlayContainer" class="video-overlay video-hidden fixed bg-blueSemi w-full h-full inset-0">
  <button aria-label="Close" class="btn-close hide-video text-white absolute right-0 bg-blue-400 rounded-full p-2 m-2">
    <?= d6_get_icon_svg('close', '30') ?>
  </button>

  <div class="w-full h-full flex items-center justify-center">
    <div class="w-full max-w-6xl">
      <div id="yt_video" class="video shadow-2xl">
        <div id="yt_player"></div>
      </div>
    </div>
  </div>

</div>

