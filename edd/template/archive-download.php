<?php
get_header();
?>
    <section class="alex-edd-features download-archive">
        <div class="container">
            <div class="row">
            <?php
            $per_page = alexaddons_option('post_per');
            $cat = alexaddons_option('download_cate');
            $id = alexaddons_option('download_item');
            $query = alexaddons_option('query', 'individual');

            if($query == 'category'){
                $query_args = array(
                    'post_type' => 'download',
                    'posts_per_page' => $per_page,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'download_category',
                            'field' => 'term_id',
                            'terms' => $cat,
                        ) ,
                    ) ,
                );
            }

            if($query == 'individual'){
                $query_args = array(
                    'post_type' => 'download',
                    'posts_per_page' => $per_page,
                    'post__in' =>$id,
                    'orderby' => 'post__in'
                );
            }

            $wp_query = new \WP_Query($query_args);

            if ($wp_query->have_posts()) :
                /* Start the Loop */
                while ($wp_query->have_posts()) : $wp_query->the_post();
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