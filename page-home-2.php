<?php

/**
 * The template for displaying Home page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gforce
 */

get_header(); ?>

<main class="main">
    <section class="hero hero__mobile">
        <?php if (have_rows('imagenes_hero_home', 'option')) : ?>
            <?php while (have_rows('imagenes_hero_home', 'option')) : the_row(); ?>
                <div class="hero__item">
                    <figure>
                        <?php $image = get_sub_field('imagen', 'option'); ?>
                        <img src="<?php echo $image['url'];  ?>" alt="" />
                    </figure>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <section class="hero">
        <?php if (have_rows('imagenes_hero_home', 'option')) : ?>
            <?php while (have_rows('imagenes_hero_home', 'option')) : the_row(); ?>
                <div class="hero__item">
                    <figure>
                        <?php $image = get_sub_field('imagen', 'option'); ?>
                        <img src="<?php echo $image['url'];  ?>" alt="" />
                    </figure>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section><!-- Hero Image -->

    <section class="specialItems">
        <div class="container mx-auto">
            <?php if (have_rows('submenu_item')) : ?>
                <?php while (have_rows('submenu_item')) : the_row(); ?>
                    <?php
                    $link = get_sub_field('submenu_link');
                    if ($link) :
                        $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                        <a class="specialItems__box" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">

                            <?php if (get_sub_field('submenu_title')) : ?>
                                <?php echo get_sub_field('submenu_title'); ?>
                            <?php endif; ?>


                        </a>
                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section><!-- Item Secondary Menu -->
    <section class="ourproducts">
        <div class="container mx-auto collectionSlick">
            <?php
            $terms = get_terms([
                'taxonomy'   => 'coleccion',
                'hide_empty' => false,
                'parent'     => 0
            ]);

            if (!empty($terms) && !is_wp_error($terms))
            {

                foreach ($terms as $term)
                {

                    $termino = get_term($term->term_id, 'coleccion');
                    $termino_link = get_term_link($termino);
                    $icon = get_field('imagen_coleccion', $term->taxonomy . '_' . $term->term_id);
                    $terminoDescription = get_field('informacion_coleccion', $term->taxonomy . '_' . $term->term_id);
            ?>
                    <article class="collection">
                        <div class="collection__left">
                            <a href="<?php echo $termino_link; ?>">
                                <img src="<?php echo $icon; ?>" alt="" srcset="">
                            </a>
                        </div>
                        <div class="collection__right">
                            <h2 class="title__section title__section--gold collection__right--title">
                                <a href="<?php echo $termino_link; ?>" class="no-underline">
                                    <?php echo $term->name; ?>
                                </a>
                            </h2>
                            <div class="line line--gold"></div>
                            <div class="collection__right--description">
                                <p><?php echo $terminoDescription; ?></p>
                            </div>
                            <div class="collection__right--btn">
                                <a href="<?php echo $termino_link; ?>" class="btn btn--primary no-underline">Ver +</a>
                            </div>
                        </div>
                    </article><!-- Collection -->
            <?php
                }
            }
            ?>

        </div><!-- Collection Section -->

        <article class="ourproducts__margin">
            <?php if (get_field('titulo_producto')) : ?>
                <h2 class="title__section title__section--gold"><?php echo get_field('titulo_producto'); ?></h2>
            <?php endif; ?>
            <div class="line line--gold"></div>
            <div class="container mx-auto">
                <div class="ourproducts__box">
                    <?php
                    $meta_query  = WC()->query->get_meta_query();
                    $tax_query   = WC()->query->get_tax_query();
                    $tax_query[] = array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                        'operator' => 'IN',
                    );
                    $args = array(
                        'posts_per_page'  => 9,
                        'post_type'       => 'product',
                        'post_status'         => 'publish',
                        'orderby'             => $atts['orderby'],
                        'order'               => $atts['order'],
                        'meta_query'          => $meta_query,
                        'tax_query'           => $tax_query,
                    );

                    $query = new WP_Query($args);

                    ?>

                    <?php if ($query->have_posts()) : ?>

                        <?php while ($query->have_posts()) : $query->the_post();
                            global $product;
                            $product = get_product(get_the_ID()); ?>
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
                                <div class="ourproducts__item--information items-center">
                                    <div class="ourproducts__item--informationLeft">
                                        <h3 class="title--product">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                    </div>

                                </div>
                            </div>
                        <?php endwhile; ?>

                    <?php endif; ?>

                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </article><!-- Nuestros Productos -->

    </section><!-- Collection and Our products -->
    <aside class="instagram">
        <div class="instagram__plugin">
            <?php echo do_shortcode('[elfsight_instagram_feed id="1"]'); ?>
        </div>
        <div class="instagram__message">
            <a href="https://www.instagram.com/martavaquerizooficial/" target="_blank">
                <h4>Sigueme en:</h4>
                <i class="marta-instagram"></i>
                <span>#martavaquerizo</span>
            </a>
        </div>
    </aside>
    <!--Instagram-->

    <?php $backgroundImage = get_field('background_section_cta'); ?>
    <aside class="cta" <?php if ($backgroundImage)
                        { ?> style="background-image:url('<?php echo $backgroundImage; ?>');" <?php } ?>>
        <div class="cta__information">
            <?php the_field('cta'); ?>
        </div>
    </aside>
    <!--CTA-->
</main>

<?php
get_footer();
?>

<script>
    jQuery(document).ready(function() {
        jQuery('.collectionSlick').slick({
            autoplay: true,
            dots: true,
            customPaging: function(slider, i) {
                // this example would render "tabs" with titles
                return '<span class="dotCollection"></span>';
            },
            arrows: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        adaptiveHeight: false,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        adaptiveHeight: true,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        adaptiveHeight: true,
                    },
                },

            ],
        });

        jQuery('.hero__mobile').slick({
            autoplay: true,
            dots: true,
            arrows: false,
            customPaging: function(slider, i) {
                // this example would render "tabs" with titles
                return '<span class="dotCollection"></span>';
            },
        });

        jQuery(".ourproducts__box").slick({
            dots: true,
            customPaging: function(slider, i) {
                // this example would render "tabs" with titles
                return '<span class="dotCollection"></span>';
            },
            arrows: false,
            infinite: false,
            autoplay: true,
            speed: 3000,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1366,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true,
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },

            ],
        });
    });
</script>