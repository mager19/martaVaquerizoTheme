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

    wp_enqueue_style('responsiveNav', get_stylesheet_directory_uri() . '/css/responsive-nav.css', null, '2.0', false);

    //Tailwind
    wp_enqueue_style('taildwind', get_stylesheet_directory_uri() . '/css/tailwind.css', null, '2.0', false);

    wp_enqueue_script('slickJs', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('responsiveNav', get_stylesheet_directory_uri() . '/js/responsive-nav.min.js', array('jquery'), '0.1', true);
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);

function register_my_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_my_menu');


if (function_exists('acf_add_options_page'))
{
    acf_add_options_page();
}

//Actual Year
function gforce_displaydate()
{
    return date('Y');
}
add_shortcode('date', 'gforce_displaydate');


// Sidebar Page Shop

function marta_registerSidebar()
{
    register_sidebar(array(
        'name'          => __('Page Shop', 'marta'),
        'id'            => 'page__shop',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5 class="footer__title--widget">',
        'after_title'   => '</h5>',
    ));
    register_sidebar(array(
        'name'          => __('Sidebar Collección', 'marta'),
        'id'            => 'sidebar__collection',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5 class="footer__title--widget">',
        'after_title'   => '</h5>',
    ));
}

add_action('widgets_init', 'marta_registerSidebar');


// Remove additional information tab
add_filter('woocommerce_product_tabs', 'remove_additional_information_tab', 100, 1);
function remove_additional_information_tab($tabs)
{
    unset($tabs['additional_information']);

    return $tabs;
}

// Add "additional information" after add to cart
add_action('woocommerce_single_product_summary', 'additional_info_under_add_to_cart', 10);
function additional_info_under_add_to_cart()
{
    global $product;

    if ($product && ($product->has_attributes() || apply_filters('wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions())))
    {
        wc_display_product_attributes($product);
    }
}

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);
function woo_remove_product_tabs($tabs)
{
    unset($tabs['description']); // Remove the description tab
    unset($tabs['reviews']); // Remove the reviews tab
    unset($tabs['additional_information']); // Remove the additional information tab
    return $tabs;
}

function nt_product_attributes()
{
    global $product;
    if ($product->has_attributes())
    {

        $attributes = (object) array(
            'tallas' => $product->get_attribute('tallas')
        );
        return $attributes;
    }
}


// Add option metabox variation products

// Change availability text - Single product page
function change_stock_text($text, $product)
{
    // Managing stock enabled
    if ($product->managing_stock())
    {

        // var_dump($product);

        // Get stock status
        $stock_quantity = $product->get_stock_quantity();

        if ($stock_quantity == 0)
        {
            $nombreBoton = get_field('nombre_del_boton', 'option');
            $titleProduct = 'Anillo Sweet Mami';
            $text = __("<a href='https://martavaquerizojewelry.com/encargos-especiales?nameproduct=${titleProduct}' class='btn btn--primary btn--tallas btn--preorden'>" . $nombreBoton . "</a>", "woocommerce");
        }
    }

    // Output
    return $text;
}
add_filter('woocommerce_get_availability_text', 'change_stock_text', 10, 2);

add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size)
{
    return array(
        'width' => 200,
        'height' => 200,
        'crop' => 0,
    );
});



function billingadvantage__yoasttobottom()
{
    return 'low';
}

add_filter('wpseo_metabox_prio', 'billingadvantage__yoasttobottom');

// Mostrar texto si no hay precio en Woocommerce
add_filter('woocommerce_get_price_html', 'hiddenPriceWoocommerce', 100, 2);
function hiddenPriceWoocommerce($price, $product)
{
    if ($product->price <= 0)
    {
        return '<span class="preOrderHidden">Pre Order</span>';
    }
    else
    {
        return $price;
    }
}

// quitamos la posibilidad de agregarlos al carrito

function removePurchaseZeroPrice($purchasable, $product)
{
    if ($product->get_price() == 0)
        $purchasable = false;
    return $purchasable;
}
add_filter('woocommerce_is_purchasable', 'removePurchaseZeroPrice', 10, 2);
