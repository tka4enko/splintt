<?php

function oyetheme_setup() {
    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // This theme supports a variety of post formats.
    add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu( 'primary', __( 'Primary Menu', 'oye' ) );

}
add_action( 'after_setup_theme', 'oyetheme_setup' );

// add featured Image
add_theme_support( 'post-thumbnails' );


// OLD BROWSER PAGE
add_action('init', function() {
    $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
    //if ( $url_path === 'all/wordpress_boilperate/oldbrowser' ) {
    if (strpos($url_path, 'oldbrowser') !== false) {
        // load the file if exists
        $load = locate_template('pages/oldbrowser.php', true);
        if ($load) {
            exit(); // just exit if template was found and loaded
        }
    } else {
        // If Less than IE 9 then redirect
        if(preg_match('/(?i)msie [5-9]/',$_SERVER['HTTP_USER_AGENT'])) {
            // if IE<=8
            wp_redirect( site_url().'/oldbrowser' );
            exit;
        }
    }
});



function es_add_body_class( $new_classes ) {
    // Turn the input into an array we can loop through
    if ( ! is_array( $new_classes ) )
        $new_classes = explode( ' ', $new_classes );

        // Add a filter on the fly
    add_filter( 'body_class', function( $classes ) use( $new_classes ) {
        foreach( $new_classes as $new_class )
        $classes[] = $new_class;

        return $classes;
    });
}

