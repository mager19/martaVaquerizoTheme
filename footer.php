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
                         <li>
                             <a href="#">
                                 <i class="marta-twitter"></i>
                             </a>
                         </li>
                         <li>
                             <a href="#"><i class="marta-facebook"></i></a>
                         </li>
                         <li>
                             <a href="#"><i class="marta-instagram"></i></a>
                         </li>
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
                 <h4 class="widget__title">
                     Sobre nosotros
                 </h4>
                 <ul>
                     <li><a href="#">Quienes somos</a></li>
                     <li><a href="#">Nuestras colecciones</a></li>
                     <li><a href="#">Politica de Cookies</a></li>
                     <li><a href="#">Politica de privacidad</a></li>
                     <li><a href="#">Aviso legal</a></li>
                 </ul>
             </div>
             <!-- Footer Three-->
             <div class="footer__col footer__col--four md:w-2/12">
                 <h4 class="widget__title">
                     Marta Vaquerizo
                 </h4>
                 <ul>
                     <li><a href="#">Prensa</a></li>
                     <li><a href="#">Blog</a></li>
                 </ul>
             </div>
             <!-- Footer Four-->
             <div class="footer__col footer__col--five md:w-3/12 xl:w-2/12">
                 <h4 class="widget__title">¿Te Ayudamos?</h4>
                 <ul>
                     <li>
                         <a href="mailto:hola@martavarequizojewfery.com">hola@martavarequizojewfery.com</a>
                     </li>
                     <li><a href="#">Guia de tallas</a></li>
                 </ul>
                 <div class="newsletter">
                     <h4 class="widget__title">Newsletter</h4>
                     <form action="#" method="post" class="form">
                         <div class="newsletter__inputs">
                             <input type="text" name="name" />
                             <input type="button" value="Enviar" />
                         </div>
                         <div class="newsletter__checkbox">
                             <input type="checkbox" name="acepto" id="acepto" />
                             <label for="acepto">Acepto términos legales</label>
                         </div>
                     </form>
                 </div>
                 <!--newsletter-->
             </div>
             <!-- Footer Five-->
         </div>
     </div>
     <div class="footer__bottom px-4 lg:px-0">
         <p class="text-center">
             © 2020 Copyright by marta vaquerizo. Todos los derechos
             reservados
         </p>
     </div>
 </footer>

 <?php wp_footer(); ?>

 </body>

 </html>