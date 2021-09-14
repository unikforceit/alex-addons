<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = '_alexaddons';

    //
    // Create options
    CSF::createOptions( $prefix, array(
        'menu_title' => 'Alex Addons',
        'menu_slug'  => 'alex-addons',
        'framework_title'  => 'Alex Addons',
        'footer_credit'  => 'Developed by <a href="https://unikforce.com" target="_blank">UnikForce IT</a>',
        'menu_type'  => 'submenu',
        'nav'  => 'inline',
        //'theme'  => 'light',
        'show_in_customizer'  => true,
        'menu_parent'  => 'edit.php?post_type=download',
    ) );

    //
    // Create a section
    CSF::createSection( $prefix, array(
        'title'  => 'Alex Addons',
        'fields' => array(
            //
            array(
                'id'          => 'query',
                'type'        => 'select',
                'title'       => 'Query Type',
                'placeholder' => 'Select an option',
                'options'     => array(
                    'category'  => 'Category',
                    'individual'  => 'Individual',
                ),
                'default'     => 'individual'
            ),
            array(
                'id'          => 'download_item',
                'type'        => 'select',
                'title'       => 'Select Item',
                'multiple'       => true,
                'options'     => 'posts',
                'query_args'  => array(
                    'post_type' => 'download',
                ),
                'dependency' => array( 'query', '==', 'individual' ),
            ),
            array(
                'id'          => 'download_cate',
                'type'        => 'select',
                'title'       => 'Select Category',
                'multiple'       => true,
                'options'     => 'categories',
                'query_args'  => array(
                    'taxonomy' => 'download_category',
                ),
                'dependency' => array( 'query', '==', 'category' ),
            ),
            array(
                'id'    => 'post_per',
                'type'  => 'number',
                'title' => 'Post Per Page',
                'default'     => '6'
            ),

        )
    ) );
}