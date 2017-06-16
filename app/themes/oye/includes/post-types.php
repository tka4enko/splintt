<?php
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

// add_action( 'init', 'reviewbox_posttype' );
// function reviewbox_posttype() {
//     register_post_type( 'reviewbox',
//         array(
//             'labels' => array(
//                 'name' => 'Reviewbox',
//             ),
//             'public' => true,
//             'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
//             'has_archive' => false,
//         )
//     );
// }

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

add_action('init', 'create_portfolio_taxonomies', 0);
//create a custom taxonomy name it topics for your posts

function create_portfolio_taxonomies() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

    $labels = array(
        'name' => 'Portfolio categorieën',
        'add_new_item' => 'Add New Portfolio categorieën',
        'new_item_name' => 'New Portfolio categorieën',
    );

// Now register the taxonomy

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

//create a custom taxonomy name it topics for your posts

function create_veelgestelde_vragen_taxonomies() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

    $labels = array(
        'name' => 'Veelgestelde vragen categorieën',
        'add_new_item' => 'Add New Veelgestelde vragen categorieën',
        'new_item_name' => 'New Veelgestelde vragen categorieën',
    );

// Now register the taxonomy

    register_taxonomy('veelgestelde_vragen_category', array('veelgestelde_vragen'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'veelgestelde_vragen_category'),
    ));
    
}
