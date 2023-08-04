<?php

/**
 * Template Name:Nauka i studia
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ogrud_botamiczny
 */

$links = get_field('links');
get_header(); ?>
<main id="primary" class="site-main">

  <?php show_archive_top(); ?>

  <div class="container">
    <?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<nav class="breadcrumbs-nav"><p id="breadcrumbs">', '</p></nav>');
    }
    $image = get_field('image');
    $content = get_field('content');
    echo '<section class="taxonomy">';

    echo '<div class="taxonomy__top">';
    echo '<h2>' . get_the_title() . '</h2>';
    echo '</div>';

    echo '<div class="taxonomy__bottom">';
    if ($image) {
      echo '<div class="taxonomy__bottom_img">' .
        wp_get_attachment_image($image, 'full') .
        '</div>';
    }


    if ($content) echo '<div class="taxonomy__bottom_content">' .
      $content .
      '</div>';
    if ($links) {
      echo '<div class="section-blog__cards">';


      foreach ($links as $link) {
        $image = $link["image"] ? wp_get_attachment_image($link["image"], 'full') : '<img src="' .  get_template_directory_uri() . '/assets/img/tlo-green-ogrod-botaniczny-uw.svg">';
        $trimWordsExcerpt = 15;
        $excerptCount = $link["description"] ? wp_trim_words($link["description"], $trimWordsExcerpt, ' ...') : null;
        echo '<article class="section-blog__cards_card card"><a href="' . esc_url($link["link"]["url"]) . '">' .
          '<div class="card__image">' . $image . '</div>';
        echo '<div class="card__body">';
        echo '<h6 class="card__body_title">' . $link["link"]["title"] . '</h6>';
        echo $excerptCount ? '<p class="card__body_excerpt">' . $excerptCount . '</p>' : '';
        echo '<span class="link-arrow-green">' . __('Read more', 'garden') . '</span>';
        echo '</div>';
        echo '</a></article>';
      }
      echo '</div>';
    }

    echo '</div>';

    echo '</section>';

    $selected_categories = get_field('choose_category');
    $terms_categories = [];
    foreach ($selected_categories as $key => $data_category) {
      $terms_categories[] = $data_category->slug;
    }

    $post_types = array(
      'posts_per_page' => -1,
      'post_type' => 'knoweledge_base',
      'tax_query' => array(
        array(
          'taxonomy' => 'knoweledge_categories',
          'field'    => 'slug',
          'terms'    => $terms_categories
        ),
      ),
    );

    $query = new WP_Query($post_types);
    if ($query->have_posts()) {

      echo '<div class="section-blog__cards">';
      while ($query->have_posts()) {

        $query->the_post();
        $terms = wp_get_post_terms($query->post->ID, array('knoweledge_categories'));
        $terms_list = array_column($terms, 'slug');
        $terms_list = array_filter($terms_list, function ($elem) use ($terms_categories) {
          return in_array($elem, $terms_categories);
        });
        $terms_string = implode(', ', $terms_list);
        echo create_blog_card(get_the_ID(), get_the_title(), get_the_excerpt(), $terms_string);
    ?>

    <?php

      }
      echo '</div>';
    }

    wp_reset_postdata();
    ?>



  </div>

</main><!-- #main -->

<?php
get_footer();
