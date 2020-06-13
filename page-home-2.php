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
    </section>

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
    </section>
    <section class="ourproducts">
        <div class="container mx-auto collectionSlick">
            
            <article class="collection">
                <div class="collection__left">
                    <img src="http://marta.local/wp-content/uploads/2020/06/coleccion-lynx.png" alt="" srcset="">
                </div>
                <div class="collection__right">
                    <h2 class="title__section title__section--gold collection__right--title">Colección Gold & Black</h2>
                    <div class="line line--gold"></div>
                    <div class="collection__right--description">
                        <p>Lorem IpsuLorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="collection__right--btn">
                        <a href="#" class="btn btn--primary">Ver +</a>
                    </div>
                </div>
            </article><!-- Collection -->
            <article class="collection">
                <div class="collection__left">
                    <img src="http://marta.local/wp-content/uploads/2020/06/coleccion-lynx.png" alt="" srcset="">
                </div>
                <div class="collection__right">
                    <h2 class="title__section title__section--gold collection__right--title">Colección Gold & Black</h2>
                    <div class="line line--gold"></div>
                    <div class="collection__right--description">
                        <p>Lorem IpsuLorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="collection__right--btn">
                        <a href="#" class="btn btn--primary">Ver +</a>
                    </div>
                </div>
            </article><!-- Collection -->
            <article class="collection">
                <div class="collection__left">
                    <img src="http://marta.local/wp-content/uploads/2020/06/coleccion-lynx.png" alt="" srcset="">
                </div>
                <div class="collection__right">
                    <h2 class="title__section title__section--gold collection__right--title">Colección Gold & Black</h2>
                    <div class="line line--gold"></div>
                    <div class="collection__right--description">
                        <p>Lorem IpsuLorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="collection__right--btn">
                        <a href="#" class="btn btn--primary">Ver +</a>
                    </div>
                </div>
            </article><!-- Collection -->
         </div><!-- Collection Section -->
        
        <article class="ourproducts__margin">
            <h2 class="title__section title__section--gold">Nuestros Productos</h2>
            <div class="line line--gold"></div>
            <div class="container mx-auto">
                <div class="ourproducts__box">
                    <?php the_field("productos_shortcode"); ?>
                    <!-- <div class="ourproducts__item">
                        <div class="ourproducts__item--image">
                            <figure>
                                <a href="#">
                                    <img src="img/anillo.png" alt="" />
                                </a>
                            </figure>
                            <div class="ourproducts__item--imageShare">
                                <ul>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ourproducts__item--information">
                            <div class="ourproducts__item--informationLeft">
                                <h3 class="title--product">
                                    <a href="#">Platinum CJ 2145</a>
                                </h3>
                                <div class="ourproducts__item--informationPrice">
                                    <span>Precio:</span>
                                    <strong>200€</strong>
                                </div>
                            </div>
                            <div class="ourproducts__item--informationRight">
                                <span>Anillo</span>
                            </div>
                        </div>
                    </div>
                    <div class="ourproducts__item">
                        <div class="ourproducts__item--image">
                            <figure>
                                <a href="#">
                                    <img src="img/anillo.png" alt="" />
                                </a>
                            </figure>
                            <div class="ourproducts__item--imageShare">
                                <ul>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ourproducts__item--information">
                            <div class="ourproducts__item--informationLeft">
                                <h3 class="title--product">
                                    <a href="#">Platinum CJ 2145</a>
                                </h3>
                                <div class="ourproducts__item--informationPrice">
                                    <span>Precio:</span>
                                    <strong>200€</strong>
                                </div>
                            </div>
                            <div class="ourproducts__item--informationRight">
                                <span>Anillo</span>
                            </div>
                        </div>
                    </div>
                    <div class="ourproducts__item">
                        <div class="ourproducts__item--image">
                            <figure>
                                <a href="#">
                                    <img src="img/anillo.png" alt="" />
                                </a>
                            </figure>
                            <div class="ourproducts__item--imageShare">
                                <ul>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ourproducts__item--information">
                            <div class="ourproducts__item--informationLeft">
                                <h3 class="title--product">
                                    <a href="#">Platinum CJ 2145</a>
                                </h3>
                                <div class="ourproducts__item--informationPrice">
                                    <span>Precio:</span>
                                    <strong>200€</strong>
                                </div>
                            </div>
                            <div class="ourproducts__item--informationRight">
                                <span>Anillo</span>
                            </div>
                        </div>
                    </div>
                    <div class="ourproducts__item">
                        <div class="ourproducts__item--image">
                            <figure>
                                <a href="#">
                                    <img src="img/anillo.png" alt="" />
                                </a>
                            </figure>
                            <div class="ourproducts__item--imageShare">
                                <ul>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ourproducts__item--information">
                            <div class="ourproducts__item--informationLeft">
                                <h3 class="title--product">
                                    <a href="#">Platinum CJ 2145</a>
                                </h3>
                                <div class="ourproducts__item--informationPrice">
                                    <span>Precio:</span>
                                    <strong>200€</strong>
                                </div>
                            </div>
                            <div class="ourproducts__item--informationRight">
                                <span>Anillo</span>
                            </div>
                        </div>
                    </div>
                    <div class="ourproducts__item">
                        <div class="ourproducts__item--image">
                            <figure>
                                <a href="#">
                                    <img src="img/anillo.png" alt="" />
                                </a>
                            </figure>
                            <div class="ourproducts__item--imageShare">
                                <ul>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ourproducts__item--information">
                            <div class="ourproducts__item--informationLeft">
                                <h3 class="title--product">
                                    <a href="#">Platinum CJ 2145</a>
                                </h3>
                                <div class="ourproducts__item--informationPrice">
                                    <span>Precio:</span>
                                    <strong>200€</strong>
                                </div>
                            </div>
                            <div class="ourproducts__item--informationRight">
                                <span>Anillo</span>
                            </div>
                        </div>
                    </div>
                    <div class="ourproducts__item">
                        <div class="ourproducts__item--image">
                            <figure>
                                <a href="#">
                                    <img src="img/anillo.png" alt="" />
                                </a>
                            </figure>
                            <div class="ourproducts__item--imageShare">
                                <ul>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                    <li><a href="#">T</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ourproducts__item--information">
                            <div class="ourproducts__item--informationLeft">
                                <h3 class="title--product">
                                    <a href="#">Platinum CJ 2145</a>
                                </h3>
                                <div class="ourproducts__item--informationPrice">
                                    <span>Precio:</span>
                                    <strong>200€</strong>
                                </div>
                            </div>
                            <div class="ourproducts__item--informationRight">
                                <span>Anillo</span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </article><!-- Nuestros Productos -->
    </section>
    <aside class="instagram">
        <?php echo do_shortcode('[elfsight_instagram_feed id="1"]'); ?>
    </aside>
    <!--iNSTAGRAM-->
    <aside class="cta">
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
    jQuery(document).ready(function(){
        jQuery('.collectionSlick').slick({
            autoplay:true,
            adaptiveHeight: true,
            dots: true
        });
    });
</script>
