<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if (empty($product) || !$product->is_visible())
{
	return;
}
?>


<div class="ourproducts__item">
	<div class="ourproducts__item--image">
		<figure>
			<a href="<?php the_permalink(); ?>">
				<?php
				the_post_thumbnail('full');
				?>

			</a>
		</figure>
		<div class="ourproducts__item--imageShare">
			<ul>
				<li><a href="<?php the_permalink(); ?>"><i class="marta-search"></i></a></li>
				<li><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></li>
				<li><a href="<?php echo $product->add_to_cart_url(); ?>"><i class="marta-cart"></i></a></li>
			</ul>
		</div>
	</div>
	<div class="ourproducts__item--information">
		<div class="ourproducts__item--informationLeft">
			<h3 class="title--product">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
			<div class="ourproducts__item--informationPrice">
				<span>Precio:</span>
				<?php $price = get_post_meta(get_the_ID(), '_price', true); ?>
				<?php echo wc_price($price); ?>

			</div>
		</div>

	</div>
</div>