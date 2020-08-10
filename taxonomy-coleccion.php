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

<main class="bg-white">

    <?php
    $id = get_queried_object()->term_id;;
    $taxonomy = 'coleccion';
    $term = get_term($id, $taxonomy);
    $slug = $term->slug;
    $name = $term->name;
    ?>
    <section class="hero__collection">
        <div class="container mx-auto hero__collection--box">
            <figure class="hero__collection--image md:w-4/12 lg:w-5/12">
                <?php $imageColeccion = get_field('imagen_pequena', $taxonomy . '_' . $id); ?>
                <img src="<?php echo $imageColeccion; ?>" alt="" />
            </figure>
            <div class="hero__collection--information md:w-6/12 lg:w-5/12 md:ml-auto">
                <h1 class="title__section"><?php echo $name; ?></h1>
                <div class="line line--gold mb-5"></div>
                <?php $resumenColeccion = get_field('resumen_coleccion', $taxonomy . '_' . $id); ?>
                <?php echo $resumenColeccion; ?>
            </div>
        </div>
    </section><!-- Hero Image -->
    <div class="container mx-auto content-area">
        <div class="flex flex-wrap">
            <div class="w-full md:w-2/12 px-4 bg-gray">

                <div class="sidebar__collection footer--topCol">
                    <?php
                    $taxonomies = get_terms(array(
                        'taxonomy' => 'coleccion',
                        'hide_empty' => true
                    ));
                    if (!empty($taxonomies)) :

                        foreach ($taxonomies as $category)
                        {
                            if ($category->parent == 0)
                            {
                                $term_linkParent = get_term_link($category);
                    ?>
                                <div class="collection__sidebar--box">
                                    <?php
                                    $titleCategory = $category->name;
                                    $titleShortCategory = str_replace('Colección', '', $titleCategory);
                                    ?>
                                    <h4 class="titlesidebar"><a href="<?php echo $term_linkParent ?>"><?php echo $titleShortCategory; ?></a></h4>
                                    <ul class="collection__sidebar--list">
                                        <?php

                                        foreach ($taxonomies as $subcategory)
                                        {
                                            if ($subcategory->parent == $category->term_id)
                                            { ?>
                                                <?php $term_link = get_term_link($subcategory); ?>
                                                <li>
                                                    <a href="<?php echo $term_link; ?> " class="collection__sidebar--link">
                                                        <?php echo esc_attr($subcategory->name); ?>
                                                    </a>
                                                </li>
                                        <?php }
                                        }
                                        ?>
                                    </ul>
                                </div>
                    <?php
                            }
                        }
                    endif;
                    ?>
                </div>
                <?php if (is_active_sidebar('sidebar__collection')) : ?>
                    <div class="page__shop footer--topCol">
                        <?php dynamic_sidebar('sidebar__collection'); ?>
                    </div>
                <?php endif; ?>

            </div>
            <div class="collection w-full md:w-10/12 px-4 pt-0">
                <article class="collection__margin">
                    <h3 class="collection__title"><?php echo $name; ?></h3>
                    <div class="line line--gold ml-0"></div>
                    <div class="collection__information">
                        <?php $terminoDescription = get_field('informacion_coleccion', $taxonomy . '_' . $id); ?>
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
                                                    <?php the_post_thumbnail('full'); ?>
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
                                <?php endwhile; ?>

                            <?php endif; ?>

                            <?php wp_reset_query(); ?>
                        </div>
                    </div>
                </article><!-- Nuestros Productos -->
            </div><!-- Collection and Our products -->
        </div>
    </div>


</main>

<?php
get_footer();
?>