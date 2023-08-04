<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ogrud_botamiczny
 */

$logos = get_field('logo', 'options');
$description = get_field('description', 'options');
$contact_title = get_field('contact_title', 'options');
$contacts = get_field('contact', 'options');
$greenhouse_title = get_field('greenhouse_title', 'options');
$greenhouse_descr = get_field('greenhouse_descr', 'options');
$magic_title = get_field('magic_title', 'options');
$magic_descr = get_field('magic_descr', 'options');
$menu_title = get_field('menu_title', 'options');
$menu_links = get_field('menu_links', 'options');
$block_title = get_field('block_title', 'options');
$block_links = get_field('block_links', 'options');
$title_schedules = get_field('title_schedules', 'options');
$schedules = get_field('schedule', 'options');
$new_footer_fild = get_field('new_footer_fild', 'options');
$new_footer_fild_right = get_field('new_footer_fild_copy', 'options');
$new_logo_text = get_field('new_logo_text', 'options');


// MAP
$map = get_field('map', 'options');
// NEWSLETTER
$bag_image = get_field('bag_image', 'options');
$settings_bg = get_field('settings_bg', 'options');
echo !is_front_page() ? newsletter_creating($bag_image, $settings_bg) : '';
echo !is_front_page() ? schedule_creating($title_schedules, $schedules) : '';
echo !is_front_page() ? map_creating($map)  : ''; ?>

<footer id="colophon" class="footer">
	<div class="container footer__container">
		<div class="footer__container_item item">
			<?php if ($logos) { ?>
				<div class="item__logo">
					<div class="item__logo_links">
						<?php foreach ($logos as $key => $logo) {
							$link_url = $logo['link']['url'];
							$link_target = $logo['link']['target'] ? $logo['link']['target'] : '_self'; ?>
							<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo wp_get_attachment_image($logo['icon']); ?></a>
						<?php } ?>
					</div>
					<div class="item__logo_text"><?php echo $new_logo_text; ?></div>
				</div>
			<?php } ?>
			<div class="item__content content">
				<div class="content__left">
					<?php echo $new_footer_fild; ?>
				</div>
			</div>
		</div>
		<div class="footer__container_item item">
			<div class="item__socials socials">
				<p class="socials__descr"><?php echo $description; ?></p>
				<ul class="socials__items">
					<?php
					$soicals = get_field('socials', 'options');
					foreach ($soicals as $key => $social) { ?>
						<li>
							<a href="<?php echo  $social["link"] ?>" target="_blank"><?php echo wp_get_attachment_image($social["icon"], 'full') ?></a>
						</li>
					<?php } ?>
				</ul>
			</div>

			<div class="item__content content">
				<div class="content__left">
					<?php echo $new_footer_fild_right; ?>
				</div>
				<div class="content__right new">
					<div class="news">
						<h6>Zapisz się do newslettera,
							a nic Cię nie ominie</h6>
						<p>Pracujemy nad uruchomieniem newslettera. Potrzebujemy jednak jeszcze trochę czasu. Zajrzyj do nas niebawem!</p>
					</div>
				</div>

			</div>
		</div>
		<p class="privacy">
			Ogród Botaniczny UW © 2023 | wykonanie <a href="https://thenewlook.pl/" target="_blank" rel="noopener noreferrer">THENEWLOOK</a>
		</p>
	</div>

</footer><!-- #colophon -->

<div class="cookies">
	<div class="cookies__flex">
		<p>Używamy plików cookie, aby poprawić komfort korzystania z naszej witryny. Przeglądając tę stronę, zgadzasz się na używanie przez nas plików cookie.</p>
		<div class="buttons">
			<a href="https://onecommerce.pl/ogrody/polityka-prywatnosci/" class="cookies__btn btn">Więcej</a>
			<a href="javascript:;" class="cookies__btn btn submit">Akceptuję</a>
		</div>
	</div>
</div><!-- cookies -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>