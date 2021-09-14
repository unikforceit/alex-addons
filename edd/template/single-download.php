<?php
get_header();
?>
    <section class="alex-edd-features download-single">
        <div class="container">
            <?php
            if (have_posts()) :
                /* Start the Loop */
                while (have_posts()) : the_post();
                    include ALEXADDONS_DIRNAME . 'edd/template-part/download-single.php';
                endwhile;
            else :
                include ALEXADDONS_DIRNAME . 'edd/template-part/download-content-none.php';
            endif;
            wp_reset_postdata(); ?>
        </div>
    </section>
<?php
get_footer();
?>