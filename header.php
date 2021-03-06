<?php

/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>

<head>
    <?php astra_head_top(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>

    <header class="header">
        <div class="container mx-auto">
            <div class="header__top">
                <figure class="logo">
                    <?php $GETlogo = get_field('logo_site', 'option'); ?>
                    <a href="<?php echo esc_url(get_bloginfo('url')); ?>"><img src="<?php echo $GETlogo['url']; ?>" height="<?php echo $GETlogo['height'] / 2; ?>" width="<?php echo $GETlogo['width'] / 2; ?>" /></a>
                </figure>
                <div class="iconCart">
                    <?php echo do_shortcode("[astra_woo_mini_cart] "); ?>
                </div>
                <div class="loginHeader">
                    <?php if (is_user_logged_in())
                    { ?>
                        <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="Mi Cuenta">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-user.svg">
                        </a>
                    <?php }
                    else
                    { ?>
                        <a href="<?php echo esc_url(wp_login_url(get_permalink())); ?>" title="Iniciar Sesión">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-user.svg">
                        </a>

                    <?php } ?>

                </div>
            </div>
            <div class="header__information">
                <span><?php the_field('text_left_header', 'option'); ?></span>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container' => 'nav',
                'container_class' => 'nav-collapse',
            ));
            ?>
            <div class="clearfix"></div>
        </div>
    </header>
    <!--header-->