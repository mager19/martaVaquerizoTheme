<?php
/*hero content*/
?>

<section class="hero-content">
    <div class="container mx-auto">
        <div class="row">
            <div class="w-3/4 mx-auto">
                <h1 class="title__section title__section--gold">
                    <?php 
                        if(is_shop()){
                            woocommerce_page_title();
                        }elseif(is_product_category()){
                            foreach((get_the_terms( $post->ID, 'product_cat' )) as $category) {
                                        echo $category->name . '</br>';
                            }
                        }else{
                            the_title();
                        }
                    ?>
                    
                </h1>
                <div class="line line--gold"></div>
            </div>
        </div>
    </div>
</section>
<?php 
    get_template_part( 'inc/content', 'breadcrumbs' );
?>
