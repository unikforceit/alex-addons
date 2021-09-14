<?php
class Alex_EDD
{
    function __construct()
    {
        add_action( 'template_redirect', [$this, 'alex_remove_review'], 99 );
        add_filter("single_template", [$this, 'download_single'], 99, 1);
        add_filter("archive_template", [$this, 'download_archive'], 99, 1);
        add_filter("template_include", [$this, 'taxonomy_cat_archive'], 99, 1);
        add_filter("template_include", [$this, 'taxonomy_tag_archive'], 99, 1);
    }
    /**
     * Remove default edd review from content
     *
     * @since 2.5
     */
    function alex_remove_review() {
        if ( class_exists( 'EDD_Reviews' ) ) {
            $edd_reviews = edd_reviews();
            remove_filter( 'the_content', array( $edd_reviews, 'load_frontend' ) );
        }
    }

    public function download_single($download_single)
    {
        global $post;
        if ('download' === $post->post_type) {
            $download_single = ALEXADDONS_DIRNAME . 'edd/template/single-download.php';
        }
        return $download_single;
    }
    public function download_archive($download_archive)
    {
        global $post;
        if ('download' === $post->post_type) {
            $download_archive = ALEXADDONS_DIRNAME . 'edd/template/archive-download.php';
        }
        return $download_archive;
    }
    public function taxonomy_cat_archive($download_cat)
    {
        if (is_tax('download_category')) {
            $download_cat = ALEXADDONS_DIRNAME . 'edd/template/taxonomy-download_category.php';
        }
        return $download_cat;
    }
    public function taxonomy_tag_archive($download_tag)
    {
        if (is_tax('download_tag')) {
            $download_tag = ALEXADDONS_DIRNAME . 'edd/template/taxonomy-download_tag.php';
        }
        return $download_tag;
    }
}
new Alex_EDD();