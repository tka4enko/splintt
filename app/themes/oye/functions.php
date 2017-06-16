<?php
//require_once (dirname(__FILE__) . '/includes/theme-functions.php');
//require_once (dirname(__FILE__) . '/includes/image_mask.php');
//require_once (dirname(__FILE__) . '/includes/helper.php');
//require_once (dirname(__FILE__) . '/includes/redux-config.php');
//require_once (dirname(__FILE__) . '/includes/field_redux_gruntcompile.php');

// Allow File Extension Upload Support
    add_filter('upload_mimes', 'my_myme_types', 1, 1);
if (class_exists('Timber')){
    Timber::$cache = true;
}
function my_myme_types($mime_types) {
    $mime_types['eps'] = 'application/eps';
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}

add_action('wp_enqueue_scripts', 'oye_scripts');
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
    echo '<style>
   .rwmb-image-item.thumbnail .rwmb-media-preview, .rwmb-image-item.thumbnail{
    background:#ccc;
    }
  </style>';
}
function oye_scripts() {
    $template_directory_url = get_template_directory_uri();
    /*wp_enqueue_style( 'jquery-ui', $template_directory_url . '/bower_components/jquery-ui/themes/smoothness/jquery-ui.css', array(), '');
    wp_enqueue_style( 'font-awesome', $template_directory_url . '/bower_components/font-awesome/css/font-awesome.css', array(), '');
    wp_enqueue_style( 'bootstrap', $template_directory_url . '/assets/css/bootstrap.css', array(), '');
    wp_enqueue_style( 'select2', $template_directory_url . '/bower_components/select2/dist/css/select2.css', array(), '');
    wp_enqueue_style( 'owl-style', $template_directory_url . '/bower_components/owl.carousel/dist/assets/owl.carousel.css', array(), '');
    wp_enqueue_style( 'owl-style-theme', $template_directory_url . '/bower_components/owl.carousel/dist/assets/owl.theme.default.css', array(), '');
    wp_enqueue_style( 'nice-select', $template_directory_url . '/bower_components/jquery-nice-select/css/nice-select.css', array(), '');
    wp_enqueue_style( 'helper_scss', $template_directory_url . '/css_sass/helper.css', array(), '');
    wp_enqueue_style( 'global_scss', $template_directory_url . '/css_sass/global.css', array(), '');
    wp_enqueue_style( 'app-scss', $template_directory_url . '/css_sass/app.css', array(), '');
    wp_enqueue_style( 'style', $template_directory_url . '/style.css', array(), '');

    wp_enqueue_script( "modernizr", $template_directory_url . "/bower_components/modernizr/modernizr.js", array('jquery'), '', false);
    wp_enqueue_script( "jquery-ui", $template_directory_url . "/bower_components/jquery-ui/jquery-ui.js", array('jquery'), '', false);
    wp_enqueue_script( "bootstrap", $template_directory_url . "/bower_components/bootstrap/dist/js/bootstrap.js", array('jquery'), '', false);
    wp_enqueue_script( "jquery-browser", $template_directory_url . "/bower_components/jquery.browser/dist/jquery.browser.js", array('jquery'), '', false);
    wp_enqueue_script( "js-cookie", $template_directory_url . "/bower_components/js-cookie/src/js.cookie.js", array('jquery'), '', false);
    wp_enqueue_script( "jquery-popup-overlay", $template_directory_url . "/bower_components/jquery-popup-overlay/jquery.popupoverlay.js", array('jquery'), '', false);
    wp_enqueue_script( "owl-script", $template_directory_url . "/bower_components/owl.carousel/dist/owl.carousel.js", array('jquery'), '', false);
    wp_enqueue_script( "nice-select", $template_directory_url . "/bower_components/jquery-nice-select/js/jquery.nice-select.min.js", array('jquery'), '', false);
    wp_enqueue_script( "edge", $template_directory_url."/assets/js/edge.6.0.0.min.js", array('jquery'), '', false );
    wp_enqueue_script( "js-common", $template_directory_url . "/assets/js/common.js", array('jquery'), '', false);
    wp_enqueue_script( "js-custom", $template_directory_url . "/assets/js/custom.js", array('jquery'), '', false);*/
    wp_enqueue_style( "css-vendor", $template_directory_url . "/compiled/vendor.min.css", array(), '');
    wp_enqueue_script( "js-vendor", $template_directory_url . "/compiled/vendor.min.js", array('jquery'), '', true);
    //wp_enqueue_script( "js-common", $template_directory_url . "/assets/js/custom.js", array('jquery'), '', false);
}

function languages_list() {
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if (!empty($languages)) {
        echo '<div id="footer_language_list"><ul>';
        foreach ($languages as $l) {
            echo '<li>';
            if ($l['country_flag_url']) {
                if (!$l['active'])
                    echo '<a href="' . $l['url'] . '">';
                echo '<img src="' . $l['country_flag_url'] . '" height="12" alt="' . $l['language_code'] . '" width="18" />';
                if (!$l['active'])
                    echo '</a>';
            }
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            echo icl_disp_language($l['language_code']);
            if(!$l['active']) echo '</a>';
            echo '</li>';
        }
        echo '</ul></div>';
    }
}

add_filter( 'nav_menu_link_attributes', 'wpse_100726_extra_atts', 10, 3 );

function wpse_100726_extra_atts( $atts, $item, $args )
{
    // inspect $item, then …
    $atts['custom'] = $item->classes[0];
    return $atts;
}
