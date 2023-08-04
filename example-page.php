<?php
/**
 * Template Name: Example-page
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
      if ( function_exists( 'yoast_breadcrumb' ) ) {
        yoast_breadcrumb( '<nav class="breadcrumbs-nav"><p id="breadcrumbs">','</p></nav>' );
      }
      $image = get_field('image');
      $content = get_field('content');
      echo '<section class="taxonomy">';
        
          echo '<div class="taxonomy__top">'; 
           echo '<h2>' . get_the_title() . '</h2>'; 
          echo '</div>'; 
         
          echo '<div class="taxonomy__bottom">'; 
            if ( $image ) {
              echo '<div class="taxonomy__bottom_img">' . 
                wp_get_attachment_image( $image, 'full' ) .
              '</div>'; 
            } 
  
            
            if ( $content  ) echo '<div class="taxonomy__bottom_content">' .
               $content . 
            '</div>';
			if($links){ echo '<div class="section-blog__cards">';
			 
				 
			 foreach($links as $link){ 
				  $image = $link["image"] ?  wp_get_attachment_image($link["image"], 'full') : '<img src="' .  get_template_directory_uri() . '/assets/img/tlo-green-ogrod-botaniczny-uw.svg">';
				  $trimWordsExcerpt = 15;
				  $excerptCount = $link["description"] ? wp_trim_words( $link["description"], $trimWordsExcerpt, ' ...' ) : null;
				    echo '<article class="section-blog__cards_card card"><a href="' . esc_url( $link["link"]["url"] ) . '">' .
						'<div class="card__image">' . $image . '</div>';
				  echo '<div class="card__body">';
				  echo '<h6 class="card__body_title">' . $link["link"]["title"] . '</h6>';
				  echo $excerptCount ? '<p class="card__body_excerpt">' . $excerptCount . '</p>' : '';
				  echo '<span class="link-arrow-green">' . __( 'Read more', 'garden' ) . '</span>';
				  echo '</div>';
				  echo '</a></article>';
			  }
			echo '</div>' ; } 

          echo '</div>'; 

        echo '</section>';?>
    </div>

	</main><!-- #main -->

<?php
get_footer();
