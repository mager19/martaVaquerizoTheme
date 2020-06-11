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

	//Tailwind
	wp_enqueue_style('taildwind', 'https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css');
	//Fonts
	wp_enqueue_style('fontGoogle', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Prata&display=swap');
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
