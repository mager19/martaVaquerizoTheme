<div class="container mx-auto">
    <div class="row">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('
                <div id="breadcrumbs" class="breadcrumbs">','</div>
                ');
            }
        ?>
    </div>
</div>
