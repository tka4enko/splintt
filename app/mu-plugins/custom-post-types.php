<?php
/**
 * Plugin Name: Custom post types
 * Description: Registers all custom post types that are necessary for this website
 * Version: 1.0.0
 * Author: Webbio B.V.
 * Author URI: https://webbio.nl
 */

add_action( 'init', 'cookie_manager' );
function cookie_manager() {
    register_post_type( 'cookie_manager',
        array(
            'labels' => array(
                'name' => 'Cookie Manager',
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false
        )
    );
}

add_action( 'init', 'portfolio_posttype' );
function portfolio_posttype() {
    register_post_type( 'portfolio',
        array(
            'labels' => array(
                'name' => 'Portfolio',
            ),
            'public' => true,
            'supports' => array( 'title', 'thumbnail', 'custom-fields' ),
            'has_archive' => false,
        )
    );
}

add_action( 'init', 'referentie_posttype' );
function referentie_posttype() {
    register_post_type( 'referentie',
        array(
            'labels' => array(
                'name' => 'Referenties',
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'custom-fields' ),
            'has_archive' => false,
        )
    );
}

add_action( 'init', 'vacatures_posttype' );
function vacatures_posttype() {
    register_post_type('vacature',
        array(
            'labels' => array(
                'name' => 'Vacatures',
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false,
        )
    );
}

add_action( 'init', 'collega_posttype' );
function collega_posttype() {
    register_post_type('collega',
        array(
            'labels' => array(
                'name' => 'Verhalen nieuwe collega\'s',
            ),
            'public' => true,
            'supports' => array( 'title', 'excerpt', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false,
        )
    );
}

add_action( 'init', 'elearning_posttype' );
function elearning_posttype() {
    register_post_type( 'elearning',
        array(
            'labels' => array(
                'name' => 'E-Learning',
            ),
            'public' => true,
            'supports' => array( 'title', 'excerpt', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false,
        )
    );
}

add_action( 'init', 'leerplatform_posttype' );
function leerplatform_posttype() {
    register_post_type( 'leerplatform',
        array(
            'labels' => array(
                'name' => 'Leerplatform',
            ),
            'public' => true,
            'supports' => array( 'title', 'excerpt', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false,
        )
    );
}

add_action( 'init', 'andere_system_posttype' );
function andere_system_posttype() {
    register_post_type( 'andere_system',
        array(
            'labels' => array(
                'name' => 'Andere Systemen',
            ),
            'public' => true,
            'supports' => array( 'title', 'excerpt', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false,
        )
    );
}

add_action( 'init', 'partners_posttype' );
function partners_posttype() {
    register_post_type( 'partner',
        array(
            'labels' => array(
                'name' => 'Partners',
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false,
        )
    );
}


add_action( 'init', 'splintter_posttype' );
function splintter_posttype() {
    register_post_type( 'splintter',
        array(
            'labels' => array(
                'name' => 'Splintters',
            ),
            'public' => true,
            'supports' => array( 'title', 'custom-fields' ),
            'has_archive' => false,
        )
    );
}

add_action( 'init', 'veelgestelde_vragen_posttype' );
function veelgestelde_vragen_posttype() {
    register_post_type( 'veelgestelde_vragen',
        array(
            'labels' => array(
                'name' => 'Veelgestelde Vragen',
            ),
            'public' => true,
            'supports' => array( 'title', 'custom-fields', 'editor' ),
            'has_archive' => false,
        )
    );
}

add_action( 'init', 'nieuwsberichten_posttype' );
function nieuwsberichten_posttype() {
    register_post_type( 'nieuwsberichten',
        array(
            'labels' => array(
                'name' => 'Nieuwsberichten',
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false,
        )
    );
}
