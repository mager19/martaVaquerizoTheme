<?php

/**
 * martavaquerizo Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package martavaquerizo
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define('CHILD_THEME_MARTAVAQUERIZO_VERSION', '1.0.0');

/**
 * Enqueue styles
 */
function child_enqueue_styles()
{

	wp_enqueue_style('martavaquerizo-theme-css', get_stylesheet_directory_uri() . '/css/main.css', array('astra-theme-css'), CHILD_THEME_MARTAVAQUERIZO_VERSION, 'all');

	
	//Fonts
	wp_enqueue_style('fontGoogle', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Prata&display=swap');

	// Slick
	wp_enqueue_style('slickCSS', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', null, '1.9.0', false);
	wp_enqueue_style('slickThemeCSS', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', null, '1.9.0', false);

	wp_enqueue_style('responsiveNav', get_template_directory() . '/css/responsive.min.css', null, '2.0', false);

	//Tailwind
	wp_enqueue_style('taildwind', 'https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css');
	

	wp_enqueue_script('slickJs', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), null, true);
	wp_enqueue_script('responsiveNav', get_template_directory() . '/js/responsive.min.js', array('jquery'), '0.1', true);
	wp_enqueue_script('main', get_template_directory() . '/js/main.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);

function register_my_menu()
{
	register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_my_menu');


if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

//Actual Year
function gforce_displaydate()
{
	return date('Y');
}
add_shortcode('date', 'gforce_displaydate');
