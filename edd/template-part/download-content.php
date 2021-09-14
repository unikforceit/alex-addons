<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4 download-content-wrapper'); ?>>
    <div class="download-content">
        <?php if (has_post_thumbnail()) { ?>
            <div class="download-thumb">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('full'); ?></a>
            </div>
        <?php } else ?>
        <h2 class="download-title"><a href="<?php the_permalink();?>"><?php echo wp_trim_words(get_the_title(), 2, ''); ?></a></h2>
        <div class="download-price">
            <?php
            $download_id = get_the_ID();
            edd_price($download_id);
            ?>
        </div>
        <div class="purchase-button">
            <a class="direct-cart" href="<?php echo esc_url(home_url('/').'checkout?edd_action=add_to_cart&download_id='.$download_id)?>"><?php esc_html_e('COMPRAR AHORA', 'alex');?></a>
        </div>
    </div>
</div>