<?php

/**
 * Plugin Name: Metaboxes
 * Description: Registers all metaboxes that are necessary for this website
 * Version: 1.0.0
 * Author: Webbio B.V.
 * Author URI: https://webbio.nl
 */


/**
 * Settings page from here
 */

// Registering setting pages
add_filter( 'mb_settings_pages', 'admin_settings_pages' );
function admin_settings_pages( $settings_pages )
{
    // Register setting page: General
    $settings_pages[] = array(
        'id'            => 'general',
        'option_name'   => 'general_settings',
        'menu_title'    => __( 'Configuratie', 'textdomain' ),
        'icon_url'      => 'dashicons-layout',
    );
    // Register setting page: 'Option for site'
    $settings_pages[] = array(
        'id'          => 'admin_settings_general',
        'option_name' => 'general_option',
        'menu_title'  => __( 'Option for site', 'textdomain' ),
        'parent'      => 'general',
    );
    return $settings_pages;
}

// Meta boxes for client settings page where general components and content is managed which is not different per page
add_filter( 'rwmb_meta_boxes', 'admin_options_register_meta_boxes' );
function admin_options_register_meta_boxes( $meta_boxes )
{

    $meta_boxes[] = array(
        'id'             => 'admin_settings_general_item',
        'title'          => __( 'Option for site', 'webbio_theme' ),
        'settings_pages' => 'admin_settings_general',
        'fields'         => array(
            array (
                'id' => 'option_for_site_email',
                'type' => 'text',
                'name' => 'Email',
            ),
            array (
                'id' => 'option_for_site_tel',
                'type' => 'text',
                'name' => 'Phone',
            ),
            array (
                'id' => 'option_for_site_link_contact',
                'type' => 'text',
                'name' => 'Link to',
            ),
        ),
    );
/*
 * Register meta box: Component footer variant 1
 */

    $meta_boxes[] = array(
        'id'             => 'configuration_entire_website',
        'title'          => __( 'Configuratie', 'textdomain' ),
        'settings_pages' => 'general',
        'fields'         => array(
            array(
                'id'   => 'configuration_entire_website_logo',
                'name' => __( 'Logo (wit)', 'textdomain' ),
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
            ),
            array(
                'id'   => 'configuration_entire_website_address',
                'name' => __( 'Adres', 'rwmb' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'configuration_entire_website_telephone',
                'name' => __( 'Telefoonnummer', 'rwmb' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'configuration_entire_website_telephone_land',
                'name' => __( 'Telefoonnummer', 'rwmb' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'configuration_entire_website_email',
                'name' => __( 'E-mailadres', 'rwmb' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'configuration_entire_website_facebook',
                'name' => __( 'Facebook', 'rwmb' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'configuration_entire_website_twitter',
                'name' => __( 'Twitter', 'rwmb' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'configuration_entire_website_linkedin',
                'name' => __( 'LinkedIn', 'rwmb' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'configuration_entire_website_nrto_image',
                'name' => __( 'NRTO afbeelding', 'rwmb' ),
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
            ),
            array(
                'id'   => 'configuration_entire_website_learning-image',
                'name' => __( 'Learning afbeelding', 'rwmb' ),
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
            ),
        ),
    );



$oyeprefix = "oyemetatpl_";

// GET CURRENT PAGE TEMPLATE FILE NAME in order to show metabox page wise


$meta_boxes[] = array(
    'id' => 'oye_general_info',
    'title' => __('General Information', ''),
    'pages' => array('page'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Body Class', ''),
            'id' => "{$oyeprefix}bodyclass",
            'type' => 'text',
            'desc' => __(''),
        ),
    ),

);

    $meta_boxes[] = array(
        'id' => 'oye_box_title',
        'title' => __('Box Title', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Three Box Title', ''),
                'id' => "{$oyeprefix}three_box_title",
                'type' => 'text',
                'desc' => __(''),
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-overzicht-e-learning.php"
            ),
        ),
    );


    $meta_boxes[] = array(
        'id' => 'oye_box_title',
        'title' => __('Box Title', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Three Box Title', ''),
                'id' => "{$oyeprefix}three_box_title",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Two Box Title', ''),
                'id' => "{$oyeprefix}two_box_title",
                'type' => 'text',
                'desc' => __(''),
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-overzicht-leerplatform.php"
            ),
        ),
    );

    $meta_boxes[] = array(
        'id' => 'oye_data_to_andere_fields',
        'title' => __('Data for andere page', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Andere Header Image', ''),
                'id' => "{$oyeprefix}andere_header_image",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'desc' => __(''),
            ),
            array(
                'name' => __('Andere Header Title', ''),
                'id' => "{$oyeprefix}andere_header_title",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Andere Header Subtitle', ''),
                'id' => "{$oyeprefix}andere_header_subtitle",
                'type' => 'text',
                'desc' => __(''),
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-overzicht-leerplatform.php"
            ),
        ),
    );



    $meta_boxes[] = array(
        'id' => 'oye_data_to_single_fields',
        'title' => __('Data for single page', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Single Header Image', ''),
                'id' => "{$oyeprefix}single_header_image",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'desc' => __(''),
            ),
            array(
                'name' => __('Single Header Title', ''),
                'id' => "{$oyeprefix}single_header_title",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Single Header Subtitle', ''),
                'id' => "{$oyeprefix}single_header_subtitle",
                'type' => 'text',
                'desc' => __(''),
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-overzicht-e-learning.php",
                "pages/page-overzicht-leerplatform.php",
                "pages/page-nieuws.php"
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'oye_data_button_text',
        'title' => __('Button text for single page', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'low',
        'fields' => array(

            array(
                'name' => __('First button text', ''),
                'id' => "{$oyeprefix}first_buttom_text",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Second button text', ''),
                'id' => "{$oyeprefix}second_buttom_text",
                'type' => 'text',
                'desc' => __(''),
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-overzicht-e-learning.php",
                "pages/page-overzicht-leerplatform.php",
                "pages/page-nieuws.php"
            ),
        ),
    );



$meta_boxes[] = array(
    'id' => 'oye_general_info',
    'title' => __('General Information', ''),
    'pages' => array('vacature'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'id' => 'vacature_list_group',
            'type' => 'group',
            'clone' => true,
            'fields' => array(
                array(
                    'name' => __('Features', ''),
                    'id' => "vacature_list_data",
                    'type' => 'text',
                    'desc' => __(''),
                ),
            ),
        ),
        array(
            'name' => __('Avatar Image', ''),
            'id' => "{$oyeprefix}vacature_avatar",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Subtitle', ''),
            'id' => "{$oyeprefix}vacature_subtitle",
            'type' => 'text',
            'desc' => __(''),
        ),
        array(
            'name' => __('Reactietijd', ''),
            'id' => "{$oyeprefix}vacature_reactietijd",
            'type' => 'text',
            'desc' => __(''),
        ),
        array(
            'name' => __('Show three boxes', ''),
            'id' => "{$oyeprefix}vacature_boxes_option",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                '0' => 'No',
                '1' => 'Yes',
            )
        ),
        array(
            'name' => __('Je werk bestaat uit', ''),
            'id' => "{$oyeprefix}vacature_bestaattitle",
            'type' => 'heading',
            'desc' => __(''),
        ),
        array(
            'name' => __('Je werk bestaat uit TITLE', ''),
            'id' => "{$oyeprefix}vacature_bestaattitle_text",
            'type' => 'text',
            'desc' => __(''),
        ),
        array(
            'id' => 'vacature_bestaat_list_group',
            'type' => 'group',
            'clone' => true,
            'fields' => array(
                array(
                    'name' => __('List', ''),
                    'id' => "vacature_bestaat_list_data",
                    'type' => 'text',
                    'desc' => __(''),
                ),
            ),
        ),
        array(
            'name' => __('Je hebt het volgende in huis', ''),
            'id' => "{$oyeprefix}vacature_volgendetitle",
            'type' => 'heading',
            'desc' => __(''),
        ),
        array(
            'name' => __('Je hebt het volgende in huis TITLE', ''),
            'id' => "{$oyeprefix}vacature_volgendetitle_text",
            'type' => 'text',
            'desc' => __(''),
        ),
        array(
            'id' => 'vacature_volgende_list_group',
            'type' => 'group',
            'clone' => true,
            'fields' => array(
                array(
                    'name' => __('List', ''),
                    'id' => "vacature_volgende_list_data",
                    'type' => 'text',
                    'desc' => __(''),
                ),
            ),
        ),
        array(
            'name' => __('Extra\'s', ''),
            'id' => "{$oyeprefix}vacature_extratitle",
            'type' => 'heading',
            'desc' => __(''),
        ),
        array(
            'name' => __('Extra\'s TITLE', ''),
            'id' => "{$oyeprefix}vacature_extratitle_text",
            'type' => 'text',
            'desc' => __(''),
        ),
        array(
            'id' => 'vacature_extra_list_group',
            'type' => 'group',
            'clone' => true,
            'fields' => array(
                array(
                    'name' => __('List', ''),
                    'id' => "vacature_extra_list_data",
                    'type' => 'text',
                    'desc' => __(''),
                ),
            ),
        ),
        array(
            'name' => __('Collega Title', ''),
            'id' => "{$oyeprefix}vacature_collega",
            'type' => 'text',
            'desc' => __(''),
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'oye_general_info',
    'title' => __('General Information', ''),
    'pages' => array('collega'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Auteur', ''),
            'id' => "{$oyeprefix}collega_auteur",
            'type' => 'text',
            'desc' => __(''),
        ),
        array(
            'name' => __('Avatar', ''),
            'id' => "{$oyeprefix}collega_avatar",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Functie', ''),
            'id' => "{$oyeprefix}collega_functie",
            'type' => 'text',
            'desc' => __(''),
        ),
        array(
            'name' => __('Featured', ''),
            'id' => "{$oyeprefix}collega_featured",
            'type' => 'select',
            'options' => array(
                '0' => 'No',
                '1' => 'Yes',
            )
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'oye_general_info',
    'title' => __('General Information', ''),
    'pages' => array('partner'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Logo', ''),
            'id' => "{$oyeprefix}logo",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Box Style', ''),
            'id' => "{$oyeprefix}box_class",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'cut-left-top' => 'Cut Left Top Blue',
                'cut-left-top-sky-blue' => 'Cut Left Top Sky Blue',
                'cut-left-top-green' => 'Cut Left Top Green',
                'cut-left-top-light-green' => 'Cut Left Top Light Green',
                'cut-left-bottom' => 'Cut Left Bottom Blue',
                'cut-left-bottom-sky-blue' => 'Cut Left Bottom Sky Blue',
                'cut-left-bottom-green' => 'Cut Left Bottom Green',
                'cut-left-bottom-light-green' => 'Cut Left Bottom Light Green',
                'cut-right-top' => 'Cut Right Top Blue',
                'cut-right-top-sky-blue' => 'Cut Right Top Sky Blue',
                'cut-right-top-green' => 'Cut Right Top Green',
                'cut-right-top-light-green' => 'Cut Right Top Light Green',
                'cut-right-bottom' => 'Cut Right Bottom Blue',
                'cut-right-bottom-sky-blue' => 'Cut Right Bottom Sky Blue',
                'cut-right-bottom-green' => 'Cut Right Bottom Green',
                'cut-right-bottom-light-green' => 'Cut Right Bottom Light Green',
            )
        ),
        array(
            'name' => __('Link', ''),
            'id' => "{$oyeprefix}link",
            'type' => 'text',
            'desc' => __(''),
        ),
    )
);


$meta_boxes[] = array(
    'id' => 'oye_general_info',
    'title' => __('General Information', ''),
    'pages' => array('elearning'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Icon', ''),
            'id' => "{$oyeprefix}icon",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Box Style', ''),
            'id' => "{$oyeprefix}box_class",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'none-cut-corners' => 'None',
                'cut-left-top' => 'Cut Left Top Blue',
                'cut-left-top-sky-blue' => 'Cut Left Top Sky Blue',
                'cut-left-top-green' => 'Cut Left Top Green',
                'cut-left-top-light-green' => 'Cut Left Top Light Green',
                'cut-left-bottom' => 'Cut Left Bottom Blue',
                'cut-left-bottom-sky-blue' => 'Cut Left Bottom Sky Blue',
                'cut-left-bottom-green' => 'Cut Left Bottom Green',
                'cut-left-bottom-light-green' => 'Cut Left Bottom Light Green',
                'cut-right-top' => 'Cut Right Top Blue',
                'cut-right-top-sky-blue' => 'Cut Right Top Sky Blue',
                'cut-right-top-green' => 'Cut Right Top Green',
                'cut-right-top-light-green' => 'Cut Right Top Light Green',
                'cut-right-bottom' => 'Cut Right Bottom Blue',
                'cut-right-bottom-sky-blue' => 'Cut Right Bottom Sky Blue',
                'cut-right-bottom-green' => 'Cut Right Bottom Green',
                'cut-right-bottom-light-green' => 'Cut Right Bottom Light Green',
            )
        ),
        array(
            'name' => __('Image Corner', ''),
            'id' => "{$oyeprefix}image_corner",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'cut_corner_right_bottom' => 'Cut corner right bottom',
                'cut_corner_left_bottom' => 'Cut corner left bottom',
                'cut_corner_left_top' => 'Cut corner left top',
                'cut_corner_right_top' => 'Cut corner right top',
            )
        ),
        array(
            'name' => __('Menu Title', ''),
            'id' => "{$oyeprefix}menu_title",
            'type' => 'text',
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'oye_general_info',
    'title' => __('General Information', ''),
    'pages' => array('leerplatform'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Icon', ''),
            'id' => "{$oyeprefix}icon",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Box Style', ''),
            'id' => "{$oyeprefix}box_class",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'none-cut-corners' => 'None',
                'cut-left-top' => 'Cut Left Top Blue',
                'cut-left-top-sky-blue' => 'Cut Left Top Sky Blue',
                'cut-left-top-green' => 'Cut Left Top Green',
                'cut-left-top-light-green' => 'Cut Left Top Light Green',
                'cut-left-bottom' => 'Cut Left Bottom Blue',
                'cut-left-bottom-sky-blue' => 'Cut Left Bottom Sky Blue',
                'cut-left-bottom-green' => 'Cut Left Bottom Green',
                'cut-left-bottom-light-green' => 'Cut Left Bottom Light Green',
                'cut-right-top' => 'Cut Right Top Blue',
                'cut-right-top-sky-blue' => 'Cut Right Top Sky Blue',
                'cut-right-top-green' => 'Cut Right Top Green',
                'cut-right-top-light-green' => 'Cut Right Top Light Green',
                'cut-right-bottom' => 'Cut Right Bottom Blue',
                'cut-right-bottom-sky-blue' => 'Cut Right Bottom Sky Blue',
                'cut-right-bottom-green' => 'Cut Right Bottom Green',
                'cut-right-bottom-light-green' => 'Cut Right Bottom Light Green',
            )
        ),
        array(
            'name' => __('Image Corner', ''),
            'id' => "{$oyeprefix}image_corner",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'cut_corner_right_bottom' => 'Cut corner right bottom',
                'cut_corner_left_bottom' => 'Cut corner left bottom',
                'cut_corner_left_top' => 'Cut corner left top',
                'cut_corner_right_top' => 'Cut corner right top',
            )
        ),
        array(
            'name' => __('Menu Title', ''),
            'id' => "{$oyeprefix}menu_title",
            'type' => 'text',
        ),
    )
);


$meta_boxes[] = array(
    'id' => 'oye_general_info',
    'title' => __('General Information', ''),
    'pages' => array('andere_system'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Icon', ''),
            'id' => "{$oyeprefix}icon",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Box Style', ''),
            'id' => "{$oyeprefix}box_class",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'cut-left-top' => 'Cut Left Top Blue',
                'cut-left-top-sky-blue' => 'Cut Left Top Sky Blue',
                'cut-left-top-green' => 'Cut Left Top Green',
                'cut-left-top-light-green' => 'Cut Left Top Light Green',
                'cut-left-bottom' => 'Cut Left Bottom Blue',
                'cut-left-bottom-sky-blue' => 'Cut Left Bottom Sky Blue',
                'cut-left-bottom-green' => 'Cut Left Bottom Green',
                'cut-left-bottom-light-green' => 'Cut Left Bottom Light Green',
                'cut-right-top' => 'Cut Right Top Blue',
                'cut-right-top-sky-blue' => 'Cut Right Top Sky Blue',
                'cut-right-top-green' => 'Cut Right Top Green',
                'cut-right-top-light-green' => 'Cut Right Top Light Green',
                'cut-right-bottom' => 'Cut Right Bottom Blue',
                'cut-right-bottom-sky-blue' => 'Cut Right Bottom Sky Blue',
                'cut-right-bottom-green' => 'Cut Right Bottom Green',
                'cut-right-bottom-light-green' => 'Cut Right Bottom Light Green',
            )
        ),
        array(
            'name' => __('Image Corner', ''),
            'id' => "{$oyeprefix}image_corner",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'cut_corner_right_bottom' => 'Cut corner right bottom',
                'cut_corner_left_bottom' => 'Cut corner left bottom',
                'cut_corner_left_top' => 'Cut corner left top',
                'cut_corner_right_top' => 'Cut corner right top',
            )
        ),
        array(
            'name' => __('Menu Title', ''),
            'id' => "{$oyeprefix}header_menu_title",
            'type' => 'text',
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'page_header_section',
    'title' => __('Header Section', ''),
    'pages' => array('page'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Header Image', ''),
            'id' => "{$oyeprefix}header_image",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Header Image Mobile', ''),
            'id' => "{$oyeprefix}header_image_mobile",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Title', ''),
            'id' => "{$oyeprefix}header_title",
            'type' => 'text',
            'desc' => __(''),
        ),
        array(
            'name' => __('Sub Title', ''),
            'id' => "{$oyeprefix}header_subtitle",
            'type' => 'text',
            'desc' => __(''),
        ),
        array(
            'name' => __('Header Styles', ''),
            'id' => "{$oyeprefix}header_style",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'default' => 'Default',
                'style1' => 'Style1',
                'style2' => 'Style2'
            )
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'page_footer_section',
    'title' => __('Footer Section', ''),
    'pages' => array('page'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Image Before Footer', ''),
            'id' => "{$oyeprefix}footer_before_image",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Footer Before Content', ''),
            'id' => "{$oyeprefix}footer_before_content",
            'raw' => 'true',
            'type' => 'wysiwyg',
            'desc' => __(''),
        ),
        array(
            'name' => __('Footer Image', ''),
            'id' => "{$oyeprefix}footer_image",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Footer Styles', ''),
            'id' => "{$oyeprefix}footer_style",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'default' => 'Default',
                'style1' => 'Style1',
                'style2' => 'Style2'
            )
        ),
    )
);

    $meta_boxes[] = array(
        'id' => 'singlepage_footer_section',
        'title' => __('Single Page Footer Section', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Image Before Footer', ''),
                'id' => "{$oyeprefix}single_footer_before_image",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'desc' => __(''),
            ),
            array(
                'name' => __('Footer Before Content', ''),
                'id' => "{$oyeprefix}single_footer_before_content",
                'raw' => 'true',
                'type' => 'wysiwyg',
                'desc' => __(''),
            ),
            array(
                'name' => __('Footer Image', ''),
                'id' => "{$oyeprefix}single_footer_image",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'desc' => __(''),
            ),
            array(
                'name' => __('Footer Styles', ''),
                'id' => "{$oyeprefix}single_footer_style",
                'type' => 'select',
                'desc' => __(''),
                'options' => array(
                    'default' => 'Default',
                    'style1' => 'Style1',
                    'style2' => 'Style2'
                )
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-blog.php",
                "pages/page-werken-bij.php"
            ),
        ),
    );



    $meta_boxes[] = array(
        'id' => 'page_footer_single_section',
        'title' => __('Single Post Footer Section', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Image Before Single Footer', ''),
                'id' => "{$oyeprefix}footer_single_before_image",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'desc' => __(''),
            ),
            array(
                'name' => __('Footer Single Before Content', ''),
                'id' => "{$oyeprefix}footer_single_before_content",
                'raw' => 'true',
                'type' => 'wysiwyg',
                'desc' => __(''),
            ),
            array(
                'name' => __('Footer Single Styles', ''),
                'id' => "{$oyeprefix}footer_single_style",
                'type' => 'select',
                'desc' => __(''),
                'options' => array(
                    'default' => 'Default',
                    'style1' => 'Style1',
                    'style2' => 'Style2'
                )
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-portfolio.php",
                "pages/page-overzicht-e-learning.php",
                "pages/page-overzicht-leerplatform.php"
            ),
        ),
    );


$meta_boxes[] = array(
    'id' => 'blog_data_section',
    'title' => __('Data Section', ''),
    'pages' => array('post'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Leestijd', ''),
            'id' => "{$oyeprefix}blog_leestijd",
            'type' => 'text',
            'desc' => __(''),
        ),
        array(
            'name' => __('Author Image', ''),
            'id' => "{$oyeprefix}blog_author_image",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Author Name', ''),
            'id' => "{$oyeprefix}blog_author_name",
            'type' => 'text',
            'desc' => __(''),
        ),
    )
);


$meta_boxes[] = array(
    'id' => 'privacy_fields',
    'title' => __('General Fields', ''),
    'pages' => array('portfolio'),
    'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
    'priority' => 'high',
    'autosave' => false,
    'fields' => array(
        array('name' => __('Stared', ''),
            'id' => "{$oyeprefix}portfolio_stared",
            'type' => 'checkbox',
            'desc' => __('Check if you want this portfolio to appear on the homepage', ''),

        ),
        array(
            'name' => __('Ingezette diensten', ''),
            'id' => "{$oyeprefix}portfolio_services",
            'type' => 'text',
            'desc' => __(''),
            'clone' => true,
        ),
        array(
            'name' => __('Sub Titel', ''),
            'id' => "{$oyeprefix}portfolio_sub_titel",
            'type' => 'textarea',
            'desc' => __(''),
        ),
        array(
            'name' => __('Text after title', ''),
            'id' => "{$oyeprefix}portfolio_text_after_title",
            'type' => 'text',
            'desc' => __(''),
        ),
        array(
            'name' => __('Header Image', ''),
            'id' => "{$oyeprefix}header_image",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('De vraag - tekst', ''),
            'id' => "{$oyeprefix}portfolio_de_vraag_text",
            'raw' => 'true',
            'type' => 'wysiwyg',
            'desc' => __(''),
            'class' => 'font-calibri'
        ),
        array(
            'name' => __('De vraag - image', ''),
            'id' => "{$oyeprefix}portfolio_de_vraag_image",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('De vraag - Video URL', ''),
            'id' => "{$oyeprefix}portfolio_de_vraag_video",
            'type' => 'oembed',
            'desc' => __('For youtube video add url https://www.youtube.com/embed/{id} like this, For vimeo video add url https://player.vimeo.com/video/{id} like this.'),
        ),
        array(
            'name' => __('De vraag Image Corner', ''),
            'id' => "{$oyeprefix}vraag_image_corner",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'cut_corner_right_bottom' => 'Cut corner right bottom',
                'cut_corner_left_bottom' => 'Cut corner left bottom',
                'cut_corner_left_top' => 'Cut corner left top',
                'cut_corner_right_top' => 'Cut corner right top',
            )
        ),
        array(
            'name' => __('De oplossing  - tekst', ''),
            'id' => "{$oyeprefix}portfolio_de_oplossing_text",
            'raw' => 'true',
            'type' => 'wysiwyg',
            'desc' => __(''),
        ),
        array(
            'name' => __('De oplossing - image', ''),
            'id' => "{$oyeprefix}portfolio_de_oplossing_image",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('De oplossing - Video URL', ''),
            'id' => "{$oyeprefix}portfolio_de_oplossing_video",
            'type' => 'oembed',
            'desc' => __('For youtube video add url https://www.youtube.com/embed/{id} like this, For vimeo video add url https://player.vimeo.com/video/{id} like this.'),
        ),
        array(
            'name' => __('De oplossing Image Corner', ''),
            'id' => "{$oyeprefix}oplossing_image_corner",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'cut_corner_right_bottom' => 'Cut corner right bottom',
                'cut_corner_left_bottom' => 'Cut corner left bottom',
                'cut_corner_left_top' => 'Cut corner left top',
                'cut_corner_right_top' => 'Cut corner right top',
            )
        ),
        array(
            'name' => __('Klant aan het woord  - tekst', ''),
            'id' => "{$oyeprefix}portfolio_klant_text",
            'raw' => 'true',
            'type' => 'wysiwyg',
            'desc' => __(''),
        ),
        array(
            'name' => __('Klant aan het woord - image', ''),
            'id' => "{$oyeprefix}portfolio_klant_image",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Klant aan het woord - Video URL', ''),
            'id' => "{$oyeprefix}portfolio_klant_video",
            'type' => 'oembed',
            'desc' => __('For youtube video add url https://www.youtube.com/embed/{id} like this, For vimeo video add url https://player.vimeo.com/video/{id} like this.'),
        ),
        array(
            'name' => __('Klant Image Corner', ''),
            'id' => "{$oyeprefix}klant_image_corner",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'cut_corner_right_bottom' => 'Cut corner right bottom',
                'cut_corner_left_bottom' => 'Cut corner left bottom',
                'cut_corner_left_top' => 'Cut corner left top',
                'cut_corner_right_top' => 'Cut corner right top',
            )
        ),
        array(
            'name' => __('List Heading', ''),
            'desc' => __('Displayed on the homepage list'),
            'id' => "{$oyeprefix}list_heading",
            'type' => 'text'
        ),
        array(
            'name' => __('Button Text', ''),
            'desc' => __('Displayed on the homepage list'),
            'id' => "{$oyeprefix}btn_text",
            'type' => 'text'
        ),
    ),
);



    $meta_boxes[] = array(
        'id' => 'privacy_fields',
        'title' => __('General Fields', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Header Title', ''),
                'desc' => __(''),
                'id' => "privacy_header_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Header Title Image', ''),
                'id' => "header_title_img",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'desc' => __(''),
            ),
            array(
                'name' => __('Pdf', ''),
                'id' => "{$oyeprefix}pdf",
                'type' => 'file_advanced',
                'max_file_uploads' => 1,
                'desc' => __(''),
            ),
            array(
                'name' => __('Pdf Title', ''),
                'id' => "{$oyeprefix}pdf_title",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Pdf Link Title', ''),
                'id' => "{$oyeprefix}pdf_link_title",
                'type' => 'text',
                'desc' => __(''),
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-legal.php"
            ),
        ),
    );


$meta_boxes[] = array(
    'id' => 'faqfields',
    'title' => __('General Fields', ''),
    'pages' => array('veelgestelde_vragen'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Korte titel landingpage', ''),
            'desc' => __(''),
            'id' => "{$oyeprefix}faq_title",
            'type' => 'text',
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'postfields',
    'title' => __('General Fields', ''),
    'pages' => array('nieuwsberichten'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Description', ''),
            'desc' => __(''),
            'id' => "{$oyeprefix}description",
            'type' => 'wysiwyg',
        ),
        array(
            'name' => 'Image',
            'id' => "{$oyeprefix}image",
            'type' => 'image_advanced',
            'max_file_uploads' => 10,
        ),
        array(
            'name' => 'Video',
            'id' => "{$oyeprefix}video1",
            'type' => 'group',
            'clone'  => true,
            'sort_clone'  => true,
            'autosave'   => true,
            'fields' => array(
                array(
                    'name' => __('Video URL', ''),
                    'id' => "{$oyeprefix}video_url",
                    'type' => 'oembed',
                    'desc' => __('For youtube video add url https://www.youtube.com/embed/{id} like this, For vimeo video add url https://player.vimeo.com/video/{id} like this.'),
                ),
            ),
        ),
        array(
            'name' => __('Button text', ''),
            'desc' => __(''),
            'id' => "{$oyeprefix}btn_text",
            'type' => 'text',
        ),
        array(
            'name' => __('Button link', ''),
            'desc' => __(''),
            'id' => "{$oyeprefix}btn_link",
            'type' => 'text',
        ),
        array(
            'name' => __('Image Corner', ''),
            'id' => "{$oyeprefix}image_corner",
            'type' => 'select',
            'desc' => __(''),
            'options' => array(
                'cut_corner_right_bottom' => 'Cut corner right bottom',
                'cut_corner_left_bottom' => 'Cut corner left bottom',
                'cut_corner_left_top' => 'Cut corner left top',
                'cut_corner_right_top' => 'Cut corner right top',
            )
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'cookiesfields',
    'title' => __('General Fields', ''),
    'pages' => array('cookie_manager'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Geplaatst door', ''),
            'desc' => __(''),
            'id' => "{$oyeprefix}geplaatst_door",
            'type' => 'text',
        ),
        array(
            'name' => __('Termijn', ''),
            'desc' => __(''),
            'id' => "{$oyeprefix}termijn",
            'type' => 'text',
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'referenties_sfields',
    'title' => __('Referentie Fields', ''),
    'pages' => array('referentie'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Naam'),
            'desc' => __(''),
            'id' => "testimonials_written_by",
            'type' => 'text',
        ),
        array(
            'name' => __('Quote'),
            'desc' => __(''),
            'id' => "testimonials_quote",
            'type' => 'textarea',
        ),
        array(
            'name' => __('Functie'),
            'desc' => __(''),
            'id' => "testimonials_position",
            'type' => 'text',
        ),
        array(
            'name' => __('Stars'),
            'desc' => __(''),
            'id' => "testimonials_rating",
            'type' => 'number',
            'min' => 1,
            'placeholder' => 1
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'splintter_fields',
    'title' => __('Splintter Fields', ''),
    'pages' => array('splintter'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Medewerker afbeelding normaal', ''),
            'id' => "splintter_image_normal",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Medewerker afbeelding hover', ''),
            'id' => "splintter_image_hover",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Functie', ''),
            'desc' => __(''),
            'id' => "splintter_functie",
            'type' => 'text',
        ),
        array(
            'name' => __('E-mailadres', ''),
            'desc' => __(''),
            'id' => "splintter_email",
            'type' => 'text',
        ),
        array(
            'name' => __('Telefoonummer', ''),
            'desc' => __(''),
            'id' => "splintter_phone",
            'type' => 'text',
        ),
        array(
            'name' => __('Category', ''),
            'desc' => __(''),
            'id' => "splintter_category",
            'type' => 'radio',
            'options' => array(__('roemeense', 'oyetheme') => 'Roemeense Splintters',
                __('nederlandse', 'oyetheme') => 'Nederlandse Splintters',
                __('flex', 'oyetheme') => 'Flex Splintters'),
        ),
        array(
            'name' => __('Linkedin', ''),
            'desc' => __(''),
            'id' => "splintter_linkedin",
            'type' => 'text',
        ),
        array(
            'name' => __('Hover tekst', ''),
            'desc' => __(''),
            'id' => "splintter_text_hover",
            'type' => 'textarea',
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'general_werkenbij',
    'title' => __('General Fields', ''),
    'pages' => array('page'),
    'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Recent collega title', ''),
            'id' => "{$oyeprefix}collega_title",
            'type' => 'text',
            'desc' => __(''),
        ),
        array(
            'name' => __('Strategie title', ''),
            'id' => "{$oyeprefix}strategie_title",
            'type' => 'text',
            'desc' => __(''),
        ),
    ),
    'show' =>   array (
        'relation' => 'OR',
        'template' =>     array (
            "pages/page-werken-bij.php"
        ),
    ),
);


//create a metabox for the quote on the homepage

    $meta_boxes[] = array(
        'id' => 'homepage_fields',
        'title' => __('Homepage Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Homepage Header Image', ''),
                'id' => "homepage_header_image",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'desc' => __(''),
            ),
            array(
                'name' => __('Homepage Header Title', ''),
                'desc' => __(''),
                'id' => "homepage_header_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Homepage Header Subtitle', ''),
                'desc' => __(''),
                'id' => "homepage_header_subtitle",
                'type' => 'text'
            ),
            array(
                'name' => __('Homepage Quote', ''),
                'desc' => __(''),
                'id' => "homepage_field_quote",
                'raw' => 'true',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => __('Section leren title text', ''),
                'desc' => __(''),
                'id' => "homepage_section_leren_title_text",
                'type' => 'text'
            ),
            array(
                'name' => __('Section leren link text', ''),
                'desc' => __(''),
                'id' => "homepage_section_leren_link_text",
                'type' => 'text'
            ),
            array(
                'name' => __('Section leren link url', ''),
                'desc' => __(''),
                'id' => "homepage_section_leren_link_url",
                'type' => 'text'
            ),
            array(
                'name' => __('E-learning Presentation Image', ''),
                'desc' => __(''),
                'id' => "homepage_elearning_presentation_image",
                'type' => 'file_advanced'
            ),
            array(
                'name' => __('E-learning Presentation Title', ''),
                'desc' => __(''),
                'id' => "homepage_elearning_presentation_title",
                'type' => 'text'
            ),
            array(
                'name' => __('E-learning Presentation Content', ''),
                'desc' => __(''),
                'id' => "homepage_elearning_presentation_content",
                'raw' => 'true',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => __('E-learning Presentation Link Left', ''),
                'desc' => __(''),
                'id' => "homepage_elearning_presentation_link_left",
                'type' => 'text'
            ),
            array(
                'name' => __('E-learning Presentation Link Right', ''),
                'desc' => __(''),
                'id' => "homepage_elearning_presentation_link_right",
                'type' => 'text'
            ),
            array(
                'name' => __('Homepage Blog Posts Title', ''),
                'desc' => __(''),
                'id' => "homepage_blog_posts_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Recent Projecten Title', ''),
                'desc' => __(''),
                'id' => "homepage_recent_projecten_title",
                'type' => 'text'
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-home.php"
            ),
        ),
    );



    $meta_boxes[] = array(
        'id' => 'oye_contact_general_info',
        'title' => __('Onze gegevens', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Title', ''),
                'id' => "{$oyeprefix}onzetitle",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Data', ''),
                'id' => "{$oyeprefix}onzedata",
                'raw' => 'true',
                'type' => 'wysiwyg',
                'desc' => __(''),
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-contact.php"
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'oye_service_general_info',
        'title' => __('Service & Support', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Title', ''),
                'id' => "{$oyeprefix}servicetitle",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Data', ''),
                'id' => "{$oyeprefix}servicedata",
                'raw' => 'true',
                'type' => 'wysiwyg',
                'desc' => __(''),
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-contact.php"
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'oye_wat_kunnen_general_info',
        'title' => __('Wat kunnen we voor je doen?', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Title', ''),
                'id' => "{$oyeprefix}wat_kunnentitle",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Data', ''),
                'id' => "{$oyeprefix}wat_kunnendata",
                'raw' => 'true',
                'type' => 'wysiwyg',
                'desc' => __(''),
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-contact.php"
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'oye_routeplanner_general_info',
        'title' => __('Routeplanner', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Title', ''),
                'id' => "{$oyeprefix}routeplannertitle",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Routeplanner Image', ''),
                'id' => "{$oyeprefix}routeplannerimage",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'desc' => __(''),
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-contact.php"
            ),
        ),
    );

    $meta_boxes[] = array(
        'id' => 'about_us_fields',
        'title' => __('Wij zijn de Splintters Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Wij zijn de Splintters Left Title', ''),
                'desc' => __(''),
                'id' => "about_us_left_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Wij zijn de Splintters Left Content', ''),
                'desc' => __(''),
                'id' => "about_us_left_content",
                'raw' => 'true',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => __('Wij zijn de Splintters Right Title', ''),
                'desc' => __(''),
                'id' => "about_us_right_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Wij zijn de Splintters Right Content', ''),
                'desc' => __(''),
                'id' => "about_us_right_content",
                'raw' => 'true',
                'type' => 'wysiwyg'
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-wij-zijn-de-splinters.php"
            ),
        ),
    ); 


    $meta_boxes[] = array(
        'id' => 'oye_general_fields',
        'title' => __("General", ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('URL tekst', ''),
                'desc' => __(''),
                'id' => "url_text",
                'type' => 'text'
            ),
            array(
                'name' => __('URL', ''),
                'desc' => __(''),
                'id' => "url",
                'type' => 'text'
            )
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-demo.php"
            ),
        ),
    );

        $meta_boxes[] = array(
            'id' => 'oye_demo_fields',
            'title' => __('Demo page', ''),
            'pages' => array('page'),
            'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => __("Demo's",''),
                    'desc' => __(''),
                    'id' => "demo",
                    'type' => 'group',
                    'clone'       => true,
                    'sort_clone'  => true,
                    'collapsible' => true,
                    'group_title' => array( 'field' => 'titel' ),
                    'save_state'   => true,
                    'fields' => array(
                        array(
                            'name' => __('Afbeelding', ''),
                            'desc' => __(''),
                            'id' => "afbeelding",
                            'type' => 'image',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => __('Kleur blok', ''),
                            'desc' => __(''),
                            'id' => "kleur_blok",
                            'type' => 'select',
                            'options' => array(
                                '0' => 'Blue',
                                '1' => 'Light blue',
                                '2' => 'Green',
                                '3' => 'Light green',
                            )
                        ),
                        array(
                            'name' => __('Titel', ''),
                            'desc' => __(''),
                            'id' => "titel",
                            'type' => 'text'
                        ),
                        array(
                            'name' => __('Beschrijving', ''),
                            'desc' => __(''),
                            'id' => "beschrijving",
                            'type' => 'wysiwyg'
                        ),
                        array(
                            'name' => 'Feature', // Optional
                            'id' => 'feature',
                            'type' => 'group',
                            'clone' => 'true',
                            // List of sub-fields
                            'fields' => array(
                                array(
                                    'name' => 'Icoon',
                                    'id' => 'icoon',
                                    'type' => 'image_advanced',
                                    'max_file_uploads' => 1,
                                ),
                                array(
                                    'name' => 'Tekst',
                                    'id' => 'tekst',
                                    'type' => 'text',
                                )
                            ),
                        ),
                        array(
                            'name' => __('URL tekst', ''),
                            'desc' => __(''),
                            'id' => "url_text",
                            'type' => 'text'
                        ),
                        array(
                            'name' => __('URL', ''),
                            'desc' => __(''),
                            'id' => "url",
                            'type' => 'text'
                        )
                    )
                )
                
            ),
            'show' =>   array (
                'relation' => 'OR',
                'template' =>     array (
                    "pages/page-demo.php"
                ),
            ),
        );


    $meta_boxes[] = array(
        'id' => 'landingpage_fields',
        'title' => __('Landingpage Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Featured blocks', ''),
                'id' => "{$oyeprefix}featured_block",
                'type' => 'group',
                'clone' => true,
                'desc' => __(''),
                'fields' => array(
                    array(
                        'name' => __('Hidden block on front-end'),
                        'id' => "{$oyeprefix}featured_block_hidden",
                        'type' => 'checkbox',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('Titel'),
                        'id' => "{$oyeprefix}featured_block_title",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('Beschrijving'),
                        'id' => "{$oyeprefix}featured_block_beschrijving",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('URL tekst'),
                        'id' => "{$oyeprefix}featured_block_url_text",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('URL'),
                        'id' => "{$oyeprefix}featured_block_url",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('Open URL in new tab'),
                        'id' => "{$oyeprefix}featured_block_url_checkbox",
                        'type' => 'Checkbox',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('Achtergrondafbeelding'),
                        'id' => "{$oyeprefix}featured_block_achtergrondafbeelding",
                        'type' => 'image_advanced',
                        'desc' => __('We recommend for this picture to have portrait proportions in order for cutted corners to work'),
                        'max_file_uploads' => 1,
                    ),
                    array(
                        'name' => __('Corner Class'),
                        'id' => "{$oyeprefix}featured_block_corner_class",
                        'type' => 'select',
                        'desc' => __(''),
                        'options' => array(
                            'top-left' => 'Top Left',
                            'top-right' => 'Top Right',
                            'bottom-left' => 'Botton Left',
                            'bottom-right' => 'Bottom Right'
                        ),
                    )
                ),
            ),
            array(
                'name' => __('Intro tekst & bullets', ''),
                'id' => "{$oyeprefix}intro_block",
                'type' => 'group',
//                'clone' => true,
                'desc' => __(''),
                'fields' => array(
                    array(
                        'name' => __('Icoon'),
                        'id' => "{$oyeprefix}intro_block_icoon",
                        'type' => 'image_advanced',
                        'desc' => __(''),
                        'max_file_uploads' => 1,
                    ),
                    array(
                        'name' => __('Titel'),
                        'id' => "{$oyeprefix}intro_block_title",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('Beschrijving'),
                        'id' => "{$oyeprefix}intro_block_beschrijving",
                        'type' => 'wysiwyg',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('Bullets Title'),
                        'id' => "{$oyeprefix}intro_block_title_bullets",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('Bullets style type'),
                        'id' => "{$oyeprefix}intro_block_type_bullets",
                        'type' => 'select',
                        'desc' => __(''),
                        'options' => array(
                            'ul' => __('checks'),
                            'ol' => __('numbers')
                        ),
                    ),
                    array(
                        'name' => __('Bullets'),
                        'id' => "{$oyeprefix}intro_block_bullets",
                        'type' => 'text',
                        'clone' => true,
                        'desc' => __(''),
                    ),
                ),
            ),
            array(
                'name' => __('Content blocks', ''),
                'id' => "{$oyeprefix}content_block",
                'type' => 'group',
                'clone' => true,
                'desc' => __(''),
                'fields' => array(
                    array(
                        'name' => __('Achtergrondkleur'),
                        'id' => "{$oyeprefix}content_block_color",
                        'type' => 'select',
                        'desc' => __(''),
                        'options' => array(
                            'splintt-blue' => 'Sky Blue',
                            'splintt-dark-blue' => 'Dark Blue',
                            'splintt-green' => 'Yellow Green',
                            'splintt-dark-green' => 'Dark Green'
                        ),
                        'placeholder' => __('Select an option'),
                    ),
                    array(
                        'name' => __('Titel'),
                        'id' => "{$oyeprefix}content_block_title",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('Beschrijving'),
                        'id' => "{$oyeprefix}content_block_beschrijving",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('URL tekst'),
                        'id' => "{$oyeprefix}content_block_url_text",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('URL'),
                        'id' => "{$oyeprefix}content_block_url",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('Corner Class'),
                        'id' => "{$oyeprefix}content_block_corner_class",
                        'type' => 'select',
                        'desc' => __(''),
                        'options' => array(
                            'top-left' => __('Top Left'),
                            'top-right' => __('Top Right'),
                            'bottom-left' => __('Botton Left'),
                            'bottom-right' => __('Bottom Right')
                        ),
                    ),
                ),
            ),
            array(
                'name' => __('FAQ block', ''),
                'id' => "{$oyeprefix}faq_block",
                'type' => 'group',
                'desc' => __(''),
                'fields' => array(
                    array(
                        'name' => __('Achtergrondkleur'),
                        'id' => "{$oyeprefix}faq_block_color",
                        'type' => 'select',
                        'desc' => __(''),
                        'options' => array(
                            'splintt-blue' => __('Sky Blue'),
                            'splintt-dark-blue' => __('Dark Blue'),
                            'splintt-green' => __('Yellow Green'),
                            'splintt-dark-green' => __('Dark Green')
                        ),
                        'placeholder' => __('Select an option')
                    ),
                    array(
                        'name' => __('Titel'),
                        'id' => "{$oyeprefix}faq_block_title",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => 'Veelgestelde vragen',
                        'id' => "{$oyeprefix}faq_block_posts",
                        'type' => 'post',
                        'post_type' => 'veelgestelde_vragen',
                        'field_type' => 'select_advanced',
                        'multiple' => true,
                        'placeholder' => 'Select one or more items',
                        'query_args' => array(
                            'post_status' => 'publish',
                            'posts_per_page' => - 1,
                        ),
                    ),
                    array(
                        'name' => __('URL tekst'),
                        'id' => "{$oyeprefix}faq_block_url_text",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('URL'),
                        'id' => "{$oyeprefix}faq_block_url",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name' => __('Corner Class'),
                        'id' => "{$oyeprefix}faq_block_corner_class",
                        'type' => 'select',
                        'desc' => __(''),
                        'options' => array(
                            'top-left' => __('Top Left'),
                            'top-right' => __('Top Right'),
                            'bottom-left' => __('Botton Left'),
                            'bottom-right' => __('Bottom Right')
                        ),
                    ),
                ),
            ),
        ),
        'show' =>   array (
            'relation' => 'OR',
            'template' =>     array (
                "pages/page-landingspage.php"
            ),
        ),
    );

    return $meta_boxes;
}
function oyemetatpl_register_taxonomy_meta_boxes($meta_boxes) {
    $oyeprefix = "oyemetatpl_";

    $meta_boxes[] = array(
        'title' => 'Veelgestelde vragen categorieën Fields',
        'taxonomies' => 'veelgestelde_vragen_category', // List of taxonomies. Array or string
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('color', ''),
                'id' => "{$oyeprefix}veelgestelde_vragen_color",
                'type' => 'color',
                'desc' => __(''),
            ),
        ),
    );
    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'oyemetatpl_register_taxonomy_meta_boxes');