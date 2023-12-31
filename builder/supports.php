<?php

/**

 * Supports

 *

 * @package  ogrud_botamiczny

 */



// Exit if accessed directly.

defined('ABSPATH') || exit;



$title = get_sub_field('title');

$link = get_sub_field('link');

$icons = get_sub_field('icons'); ?>

<!-- Supports Start -->

<section class="supports">

  <?php if ($title) echo '<h6 class="supports__title">' . $title . '</h6>';

  if ($link) createButton($link, 'btn-primary');

  if ($icons) {

    echo '<div class="supports__icons">';

    foreach ($icons as $key => $icon) {
      echo '<a href="' . esc_url($icon['link_to']) . '" target="_blank">' . wp_get_attachment_image($icon["icon"], 'full') . '</a>';
    }

    echo '</div>';
  }

  ?>

</section><!-- Supports End -->