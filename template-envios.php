<?php

/**
 * Template Name: Envio y Devoluciones
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since marta-vaquerizo
 */

get_header(); ?>

<?php get_template_part("inc/hero", "content"); ?>

<?php
while (have_posts()) : the_post(); ?>
    <section class="envios__header">
        <div class="container mx-auto content-area">
            <div class="flex flex-wrap">
                <div class="w-full px-4 lg:w-1/2 lg:pr-8 ">
                    <?php the_field('terminos_left'); ?>
                </div>
                <div class="w-full px-4 lg:w-1/2 lg:pl-8 ">
                    <?php the_field('terminos_right'); ?>
                </div>
            </div>
        </div>
    </section>

    <div class="container mx-auto content-area">
        <div class="flex">
            <div class="w-full px-4">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<!-- post navigation -->

<?php
get_footer();
