 <footer class="footer">
     <div class="container mx-auto px-4 lg:px-0">
         <div class="footer__logo">
             <figure>
                 <?php $GETlogo = get_field('logo_site', 'option'); ?>
                 <a href="<?php echo esc_url(get_bloginfo('url')); ?>"><img src="<?php echo $GETlogo['url']; ?>" height="<?php echo $GETlogo['height'] / 2; ?>" width="<?php echo $GETlogo['width'] / 2; ?>" /></a>
             </figure>
         </div>
         <div class="footer__top">
             <div class="footer__col footer__col--one md:w-3/12">
                 <?php the_field("footer_left", 'option') ?>
                 <div class="socialnetworks">
                     <ul class="socialnetworks__item">
                        <?php if ( have_rows('social_icons','option') ) : ?>
                            
                            <?php while( have_rows('social_icons','option') ) : the_row(); ?>
                                <li>
                                    <a href="<?php the_sub_field('social_profile','option'); ?>">
                                        <i class="marta-<?php the_sub_field('social_icon','option'); ?>"></i>
                                    </a>
                                </li>
                        
                            <?php endwhile; ?>
                        
                        <?php endif; ?>
                        
                    </ul>
                     <div class="socialnetworks--hashtag">
                         <strong><?php the_field("hashtag", 'option'); ?></strong>
                     </div>
                 </div>
             </div>
             <!-- Footer One-->
             <div class="footer__col footer__col--two md:w-2/12 xl:ml-auto">
                 <?php the_field("footer_column_1", "option"); ?>
             </div>
             <!-- Footer Two-->
             <div class="footer__col footer__col--three md:w-2/12">
                 <?php the_field("footer_column_2", "option"); ?>
             </div>
             <!-- Footer Three-->
             <div class="footer__col footer__col--four md:w-2/12">
                 <?php the_field("footer_column_3", "option"); ?>
             </div>
             <!-- Footer Four-->
             <div class="footer__col footer__col--five md:w-3/12 xl:w-2/12">
                 <?php the_field("footer_column_4", "option"); ?>
             </div>
             <!-- Footer Five-->
         </div>
     </div>
     <div class="footer__bottom px-4 lg:px-0">
         <?php the_field("copyright", 'option'); ?>
     </div>
 </footer>

 <?php wp_footer(); ?>

 </body>

 </html>