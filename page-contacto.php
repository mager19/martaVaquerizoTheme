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

            <div class="w-2/3 mx-auto lg:w-1/3 px-4 mt-12">
                <div class="items__emails lg:pl-8 lg:pt-6">
                    <?php if (have_rows('emails', 'option')) : ?>
                        <?php while (have_rows('emails', 'option')) : the_row(); ?>
                            <a href="mailto:<?php the_sub_field('email', 'option'); ?>" class="mb-4">
                                <?php the_sub_field('email', 'option'); ?>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="contacto__links lg:pl-8">
                    <div class="socialnetworks">
                        <div class="socialnetworks--hashtag">
                            <strong><?php the_field("hashtag", 'option'); ?></strong>
                        </div>
                        <ul class="socialnetworks__item mt-4">
                            <?php if (have_rows('social_icons', 'option')) : ?>

                                <?php while (have_rows('social_icons', 'option')) : the_row(); ?>
                                    <li>
                                        <a href="<?php the_sub_field('social_profile', 'option'); ?>">
                                            <i class="marta-<?php the_sub_field('social_icon', 'option'); ?>"></i>
                                        </a>
                                    </li>

                                <?php endwhile; ?>

                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<!-- post navigation -->

<?php
get_footer();
