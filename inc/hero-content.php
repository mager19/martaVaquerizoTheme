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
