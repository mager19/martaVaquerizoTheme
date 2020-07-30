<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required())
{
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action('woocommerce_before_single_product_summary');
	?>

	<div class="summary entry-summary orderSummary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action('woocommerce_single_product_summary');
		?>
		<!-- Prueba de atributos -->

		<?php
		$attributes = nt_product_attributes();
		if ($attributes->tallas)
		{ ?>
			<div class="buttonTallas">
				<a href="<?php echo esc_url(get_page_link(1204)); ?>" class="btn btn--primary btn--tallas" target="_blank">
					Guía de tallas
				</a>
				<a href="<?php echo esc_url(get_page_link(1131)); ?>" class="btn btn--primary btn--tallas" target="_blank">
					Cuidado de joyas
				</a>
			</div>
		<?php } ?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action('woocommerce_after_single_product_summary');
	?>
	<!-- Productos Relacionados -->
	<?php if ($products = get_field('productos_relacionados')) : ?>
		<?php global $product; ?>
		<section class="related products">
			<h2>Productos relacionados</h2>
			<div class="products columns-4">
				<?php foreach ($products as $p) : ?>
					<div class="ourproducts__item">
						<div class="ourproducts__item--image">
							<figure>
								<a href="<?php the_permalink($p->ID); ?>" title="<?php the_title_attribute(array('post' => $p->ID)); ?>">
									<?php echo get_the_post_thumbnail($p->ID, 'full'); ?>
								</a>
							</figure>
							<div class="ourproducts__item--imageShare">
								<ul>
									<li><a href="<?php the_permalink($p->ID); ?>">
											<i class="marta-search"></i></a></li>
									<li><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></li>
									<li><a href="<?php the_permalink($p->ID); ?>"><i class="marta-cart"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="ourproducts__item--information">
							<div class="ourproducts__item--informationLeft">
								<h3 class="title--product">
									<a href="<?php the_permalink($p->ID); ?>">
										<?php echo get_the_title($p->ID); ?>
									</a>
								</h3>
								<div class="ourproducts__item--informationPrice">
									<span>Precio:</span>
									<?php $price = get_post_meta($p->ID, '_price', true); ?>
									<?php echo wc_price($price); ?>
								</div>
							</div>

						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>