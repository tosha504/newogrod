<?php

/**

 * Banner

 *

 * @package  ogrud_botamiczny

 */



// Exit if accessed directly.

defined('ABSPATH') || exit;



$slider_items = get_sub_field('slider_items');
?>
<!-- Banner Start -->
<section class="slider">
  <?php foreach ($slider_items as $key => $slider_item) {
    $background_image = $slider_item['background_image'];
    $invite = $slider_item['invite'];
    $title = $invite['title'];
    $bg_img = $invite['bg_img'];
    $link = $invite['link'];
  ?>


    <div class="banner" <?php if ($background_image) {
                          echo 'style="background: url(' . wp_get_attachment_image_url($background_image, 'full') . '); background-repeat: no-repeat;  background-position: center; background-size: cover;"';
                        } ?>>

      <div class="banner__invite" <?php if ($bg_img) {
                                    echo 'style="background: url(' . wp_get_attachment_image_url($bg_img, 'full') . ');background-repeat: no-repeat;   background-size: cover;"';
                                  } ?>>

        <div class="banner__invite_wrap">

          <?php if ($title) { ?><h1 class="banner__invite_wrap-title"><?php echo $title; ?></h1><?php } ?>

          <?php

          if ($link) {

            $link_url = $link['url'];

            $link_title = $link['title'];

            $link_target = $link['target'] ? $link['target'] : '_self'; ?>

            <a class="link-arrow" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>

          <?php } ?>

        </div>

      </div>

    </div>
  <?php } ?>
</section><!-- Banner End -->