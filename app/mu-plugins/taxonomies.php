<?php
/**
 * Plugin Name: Taxonomies
 * Description: Registers all taxonomies that are necessary for this website
 * Version: 1.0.0
 * Author: Webbio B.V.
 * Author URI: https://webbio.nl
 */


add_action('init', 'create_portfolio_taxonomies', 0);
function create_portfolio_taxonomies() {

    $labels = array(
        'name' => 'Portfolio categorieën',
        'add_new_item' => 'Add New Portfolio categorieën',
        'new_item_name' => 'New Portfolio categorieën',
    );

    register_taxonomy('portfolio_category', array('portfolio'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio_category'),
        'supports' => array('custom-fields')
    ));
    
}

add_action('init', 'create_veelgestelde_vragen_taxonomies', 0);
function create_veelgestelde_vragen_taxonomies() {

    $labels = array(
        'name' => 'Veelgestelde vragen categorieën',
        'add_new_item' => 'Add New Veelgestelde vragen categorieën',
        'new_item_name' => 'New Veelgestelde vragen categorieën',
    );

    register_taxonomy('veelgestelde_vragen_category', array('veelgestelde_vragen'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'veelgestelde_vragen_category'),
    ));
    
}

add_action( 'init', 'cookie_manager_taxonomy' );
function cookie_manager_taxonomy() {
    register_taxonomy(
        'cookie_manager_cat',
        'cookie_manager',
        array(
            'label' => __( 'Cookies Manager Category' ),
            'rewrite' => array( 'slug' => 'cookie_manager_cat' ),
            'hierarchical' => false,
        )
    );
}