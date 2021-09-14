<div id="post-<?php the_ID(); ?>" <?php post_class('download-single-content-wrapper'); ?>>
    <div class="download-content-single">
        <div class="download-breadcrumb">
            <?php alex_breadcrumb(); ?>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="download-item-img-rating">
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="download-thumb">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                    <?php } ?>
                    <?php echo alex_avarage_rating(); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-download-text-wrapper">
                    <?php the_title('<h2 class="download-item-title">', '</h2>'); ?>
                    <div class="download-item-content"><?php the_content(); ?></div>
                    <div class="download-item-price">
                        <?php
                        $download_id = get_the_ID();
                        if (edd_has_variable_prices($download_id)) {
                            echo '<h5 class="plan-title">' . edd_price_range($download_id) . '</h5>';
                        } else {
                            edd_price($download_id);
                        }
                        echo edd_get_purchase_link([
                            'download_id' => $download_id,
                            'text' => 'AÑADIR AL CARRITO',
                            'price' => false,
                            'checkout' => 'Checkout',
                            'class' => 'single-cart-btn',
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>