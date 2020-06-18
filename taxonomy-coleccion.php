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
    <section class="hero hidden">
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
    <section class="collection container mx-auto">
        <article class="collection__margin">
            <?php
                $id = get_queried_object()->term_id;;
                $taxonomy = 'coleccion';
                $term = get_term( $id, $taxonomy );
                $slug = $term->slug;
                $name = $term->name;
            ?>
            <h2 class="collection__title"><?php echo $name; ?></h2>
            <div class="line line--gold"></div>
            <div class="collection__information">
                <?php $terminoDescription = get_field('informacion_coleccion', $taxonomy. '_' . $id); ?>
                <?php echo $terminoDescription; ?>
            </div>
            <div class="container mx-auto">
                <div class="collection__box">
                   
                    <?php
                    
                    $args = array(
                        'posts_per_page' => 9,
                        'post_type' => 'product',
                        'taxonomy' => 'coleccion',
                        'term' => $slug,
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
    
</main>

<?php
get_footer();
?>


