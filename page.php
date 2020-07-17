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
    <div class="container mx-auto content-area">
        <div class="flex flex-wrap">
            <div class="w-full px-4">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<!-- post navigation -->

<?php
get_footer();
