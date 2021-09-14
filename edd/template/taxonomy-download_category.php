<?php
get_header();
?>
<section class="alex-edd-features download-tax-cate">
    <div class="container">
        <?php
        the_archive_title('<h1 class="archive-title">', '</h1>');
        the_archive_description('<div class="archive-description">', '</div>');
        ?>
        <div class="row">
            <?php
            if (have_posts()) :
                /* Start the Loop */
                while (have_posts()) : the_post();
                    include ALEXADDONS_DIRNAME . 'edd/template-part/download-content.php';
                endwhile;
            else :
                include ALEXADDONS_DIRNAME . 'edd/template-part/download-content-none.php';
            endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>
