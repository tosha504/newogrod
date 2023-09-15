<?php

/**

 * Blog

 *

 * @package  ogrud_botamiczny

 */



// Exit if accessed directly.

defined('ABSPATH') || exit;



$title = get_sub_field('title');
$text = get_sub_field('text');
$link = get_sub_field('see_all');

$post_types = array(
  'post_status' => 'publish',
  'posts_per_page' => 3,
  'order' => 'DESC',
  'post_type' => array('post'),
  'category_name' => 'aktualnosci',
);

$query = new WP_Query($post_types);
?>

<!-- Blog Start -->

<section class="section-blog">

  <div class="container">

    <?php echo !empty($title) ? '<h5 class="section-blog__title">' . $title . '</h5>' : '';

    echo $text ? '<p class="section-blog__text">' . $text . '</p>' : '';



    echo '<div class="section-blog__cards">';

    if ($query->have_posts()) {

      while ($query->have_posts()) {
        $query->the_post();
        echo create_blog_card(get_the_ID(), get_the_title(), get_the_excerpt(), $term_for_custom_page); ?>

    <?php

      }
    }

    echo '</div>';


    if ($link) {
      createButton($link, 'btn-primary');
    }
    wp_reset_postdata();

    ?>

  </div>

</section><!-- Blog End -->