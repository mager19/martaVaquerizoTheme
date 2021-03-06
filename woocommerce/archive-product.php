<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */

?>
<?php get_template_part("inc/hero", "content"); ?>


<div class="container mx-auto content-area">
	<div class="flex flex-wrap">
		<div class="w-full md:w-2/12 px-4 bg-gray">
			<?php if (is_active_sidebar('page__shop')) : ?>
				<div class="page__shop footer--topCol">
					<?php dynamic_sidebar('page__shop'); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="w-full md:w-10/12 px-4">
			<?php
			if (woocommerce_product_loop())
			{

				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action('woocommerce_before_shop_loop');

			?>

				<?php
				echo do_shortcode('[ajax_load_more  woocommerce="true" container_type="div" css_classes="collection__box shop__box w-full ajaxShop" post_type="product" posts_per_page="6" button_label="Más productos"]');
				woocommerce_product_loop_end();
				?>


			<?php

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action('woocommerce_after_shop_loop');
			}
			else
			{
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action('woocommerce_no_products_found');
			}

			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action('woocommerce_after_main_content'); ?>
		</div>
	</div>
</div>

a

<?php


get_footer('shop');
