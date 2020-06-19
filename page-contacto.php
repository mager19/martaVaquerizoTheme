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

<?php get_template_part("inc/hero", "content"); ?>

<?php

while (have_posts()) : the_post(); ?>
    <div class="container mx-auto content-area contacto">
        <div class="flex flex-wrap">
            <div class="w-full px-4">
                <div class="title__section title__section--gold">
                    <?php the_title(); ?>
                </div>
            </div>
            <div class="w-full px-4">
                <?php the_content(); ?>
            </div>

            <div class="w-full lg:w-2/3 px-4 mt-12">
                <?php the_field("form"); ?>
            </div>

            <div class="w-full lg:w-1/3 px-4 mt-12">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur itaque nihil, laboriosam labore, hic neque libero quisquam mollitia placeat corrupti numquam tenetur fuga cumque est ab voluptate dolorem a esse?
            </div>
        </div>
    </div>
<?php endwhile; ?>
<!-- post navigation -->

<?php
get_footer();
