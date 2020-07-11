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

<main>
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
                    <a href="<?php the_sub_field('submenu_link'); ?>" class="specialItems__box">
                        <?php the_sub_field('submenu_title'); ?>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section><!-- Item Secondary Menu -->
    <section class="ourproducts">
        <div class="container mx-auto collectionSlick">
            <?php
                $terms = get_terms([
                    'taxonomy' => 'coleccion',
                    'hide_empty' => false,
                ]);
                
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                    
                    foreach ( $terms as $term ) {

                        $termino = get_term( $term->term_id, 'coleccion' );
                        $termino_link = get_term_link( $termino );
                        $icon = get_field('imagen_coleccion', $term->taxonomy . '_' . $term->term_id);
                        $terminoDescription = get_field('informacion_coleccion', $term->taxonomy . '_' . $term->term_id); 
            ?>
                        <article class="collection">
                            <div class="collection__left">
                                <img src="<?php echo $icon; ?>" alt="" srcset="">
                            </div>
                            <div class="collection__right">
                                <h2 class="title__section title__section--gold collection__right--title">
                                    <?php echo $term->name; ?>
                                </h2>
                                <div class="line line--gold"></div>
                                <div class="collection__right--description">
                                    <p><?php echo $terminoDescription; ?></p>
                                </div>
                                <div class="collection__right--btn">
                                    <a href="<?php echo $termino_link; ?>" class="btn btn--primary">Ver +</a>
                                </div>
                            </div>
                        </article><!-- Collection -->
            <?php
                    }
                    
                }
        ?>
            
        </div><!-- Collection Section -->
        
        <article class="ourproducts__margin">
            <h2 class="title__section title__section--gold">Nuestros Productos</h2>
            <div class="line line--gold"></div>
            <div class="container mx-auto">
                <div class="ourproducts__box">
                    <?php //the_field("productos_shortcode"); ?>

                    <?php
                    
                    $args = array(
                        'posts_per_page' => 9,
                        'post_type' => 'product',
                    );
                    
                    $query = new WP_Query( $args );
                    
                    ?>
                    
                    <?php if( $query->have_posts() ) : ?>
                        
                        <?php while ( $query->have_posts() ) : $query->the_post(); 
                              global $product;
                              $product = get_product( get_the_ID() ); ?>
                            <div class="ourproducts__item">
                                <div class="ourproducts__item--image">
                                    <figure>
                                        <a href="<?php the_permalink( ); ?>">
                                            <?php 
                                                the_post_thumbnail( 'full' );
                                            ?>
                                            
                                        </a>
                                    </figure>
                                    <div class="ourproducts__item--imageShare">
                                        <ul>
                                            <li><a href="<?php the_permalink(); ?>"><i class="marta-search"></i></a></li>
                                            <li><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?></li>
                                            <li><a href="<?php the_permalink(); ?>"><i class="marta-loop2"></i></a></li>
                                            <li><a href="<?php echo $product->add_to_cart_url(); ?>"><i class="marta-cart"></i></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="ourproducts__item--information">
                                    <div class="ourproducts__item--informationLeft">
                                        <h3 class="title--product">
                                            <a href="<?php the_permalink( ); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="ourproducts__item--informationPrice">
                                            <span>Precio:</span>
                                            <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                                            <?php echo wc_price( $price ); ?>
                                            
                                        </div>
                                    </div>
                                    <div class="ourproducts__item--informationRight">
                                        <?php echo wc_get_product_category_list($product->get_id()) ?> 
                                        
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
        <?php echo do_shortcode('[elfsight_instagram_feed id="1"]'); ?>
    </aside><!--Instagram-->
    <aside class="cta">
        <div class="cta__information">
            <?php the_field('cta'); ?>
        </div>
    </aside><!--CTA-->
</main>

<?php
get_footer();
?>

<script>
    jQuery(document).ready(function(){
        jQuery('.collectionSlick').slick({
            autoplay:true,
            adaptiveHeight: false,
            dots: true
        });
    });
// Slick

            
jQuery(".ourproducts__box").slick({
    dots: true,
    arrows: false,
    infinite: false,
    autoplay:true,
    speed: 3000,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
        {
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
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});
            



</script>
