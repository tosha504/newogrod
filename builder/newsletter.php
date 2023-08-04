<?php 
/**
 * Newsletter
 *
 * @package  ogrud_botamiczny
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$bag_image = get_field('bag_image', 'options');
$settings_bg = get_field('settings_bg', 'options'); 
echo newsletter_creating( $bag_image, $settings_bg );

