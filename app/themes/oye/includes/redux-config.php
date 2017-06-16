<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_opt";
    
    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }
$icons = array(
    "fa-adn",
    "fa-android",
    "fa-apple",
    "fa-behance",
    "fa-behance-square",
    "fa-bitbucket",
    "fa-bitbucket-square",
    "fa-bitcoin",
    "fa-btc",
    "fa-codepen",
    "fa-css3",
    "fa-delicious",
    "fa-deviantart",
    "fa-digg",
    "fa-dribbble",
    "fa-dropbox",
    "fa-drupal",
    "fa-empire",
    "fa-facebook",
    "fa-facebook-square",
    "fa-flickr",
    "fa-foursquare",
    "fa-ge",
    "fa-git",
    "fa-git-square",
    "fa-github",
    "fa-github-alt",
    "fa-github-square",
    "fa-gittip",
    "fa-google",
    "fa-google-plus",
    "fa-google-plus-square",
    "fa-hacker-news",
    "fa-html5",
    "fa-instagram",
    "fa-joomla",
    "fa-jsfiddle",
    "fa-linkedin",
    "fa-linkedin-square",
    "fa-linux",
    "fa-maxcdn",
    "fa-openid",
    "fa-pagelines",
    "fa-pied-piper",
    "fa-pied-piper-alt",
    "fa-pied-piper-square",
    "fa-pinterest",
    "fa-pinterest-square",
    "fa-qq",
    "fa-ra",
    "fa-rebel",
    "fa-reddit",
    "fa-reddit-square",
    "fa-renren",
    "fa-share-alt",
    "fa-share-alt-square",
    "fa-skype",
    "fa-slack",
    "fa-soundcloud",
    "fa-spotify",
    "fa-stack-exchange",
    "fa-stack-overflow",
    "fa-steam",
    "fa-steam-square",
    "fa-stumbleupon",
    "fa-stumbleupon-circle",
    "fa-tencent-weibo",
    "fa-trello",
    "fa-tumblr",
    "fa-tumblr-square",
    "fa-twitter",
    "fa-twitter-square",
    "fa-vimeo-square",
    "fa-vine",
    "fa-vk",
    "fa-wechat",
    "fa-weibo",
    "fa-weixin",
    "fa-windows",
    "fa-wordpress",
    "fa-xing",
    "fa-xing-square",
    "fa-yahoo",
    "fa-youtube",
    "fa-youtube-play",
    "fa-youtube-square"
);
preg_match_all("/(fa-.*?):before/", $toParse, $output_array);

foreach( $output_array[1] as $icon ) {
    echo $icon;
}
    /*
     *
     * --> Action hook examples
     *
     */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => false,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'system_info'          => false,
        // REMOVE

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>To access any of your saved options from within your code you can use global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        
        //$args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    //$args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields

    Redux::setSection( $opt_name, array(
        'title' => __( 'Basic Fields', 'redux-framework-demo' ),
        'id'    => 'basic',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-home'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'General', 'redux-framework-demo' ),
        'id'         => 'general-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'            => 'opt-import-export',
                'type'          => 'gruntcompile',
                'title'         => 'Import Export',
                'subtitle'      => 'Save and restore your Redux options',
                'full_width'    => false,
            ),
            array(
                'id'       => 'is_debug',
                'type'     => 'switch',
                'title'    => 'Debug Mode',
                'default'  => '1',
                'private' => 1
            ),
            array(
                'id'       => 'is_pageloader',
                'type'     => 'switch',
                'title'    => 'Show Pageloader',
                'default'  => '0',
            ),
            array(
                'id'       => 'is_compresspage',
                'type'     => 'switch',
                'title'    => 'Compress Pages',
                'default'  => '0',
            ),
            array(
                'id'       => 'disable_emoji',
                'type'     => 'switch',
                'title'    => 'Disable Emoji Script',
                'default'  => '0',
            ),

             array(
                'id'       => 'code_before_head_closingtag',
                'type'     => 'textarea',
                'title'    => 'Code Before Head Closing Tag',
                'default'  => '',
            ),

            array(
                'id'       => 'code_after_body_starttag',
                'type'     => 'textarea',
                'title'    => 'Code After Body Start Tag',
                'default'  => '',
            ),
            array(
                'id'       => 'code_before_body_closingtag',
                'type'     => 'textarea',
                'title'    => 'Code Before Body Closing Tag',
                'default'  => '',
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Header', 'redux-framework-demo' ),
        'id'         => 'header-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'header_logo_normal',
                'type'     => 'media',
                'title'    => 'Logo Normal',
                'default'  => '',
            ),

            array(
                'id'       => 'header_logo_light',
                'type'     => 'media',
                'title'    => 'Logo Light',
                'default'  => '',
            ),

            array(
                'id'       => 'header_logo_dark',
                'type'     => 'media',
                'title'    => 'Logo Dark',
                'default'  => '',
            ),
            array(
                'id'       => 'hide_menu_on',
                'type'     => 'text',
                'title'    => 'Hide menu on',
                'subtitle' => 'Set slug of the pages you want to hide the menu separated by comma',
                'default'  => 'landingspage',
            ),
            array(
                'id'       => 'hide_menu_language_on',
                'type'     => 'text',
                'title'    => 'Hide menu language on',
                'subtitle' => 'Set slug of the pages you want to hide menu language separated by comma',
                'default'  => 'demo',
            )
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer', 'redux-framework-demo' ),
        'id'         => 'footer-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'footer_copyright',
                'type'     => 'text',
                'title'    => 'Copyright',
                'default'  => '',
                'description' => 'Custom Tags: {year}'
            ),

            array(
                'id'       => 'footer_branding_title',
                'type'     => 'text',
                'title'    => 'Branding Title',
                'default'  => '',
            ),

            array(
                'id'       => 'footer_branding_link',
                'type'     => 'text',
                'title'    => 'Branding Link',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_splintt_logo',
                'type'     => 'media',
                'title'    => 'Splintt Logo',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_address',
                'type'     => 'text',
                'title'    => 'Address',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_telephone',
                'type'     => 'text',
                'title'    => 'Tel:',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_email',
                'type'     => 'text',
                'title'    => 'Email:',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_nrto_img',
                'type'     => 'media',
                'title'    => 'NRTO Image',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_nrto_link',
                'type'     => 'text',
                'title'    => 'NRTO Link',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_learning_img',
                'type'     => 'media',
                'title'    => 'Learning Image',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_learning_link',
                'type'     => 'text',
                'title'    => 'Learning Link',
                'default'  => '',
            ),
        )
    ));
   
    
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Referentie Box', 'redux-framework-demo' ),
        'id'         => 'referentie-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'referentie_title',
                'type'     => 'text',
                'title'    => 'Title',
                'default'  => '',
            ),
            array(
                'id'       => 'referentie_btn1',
                'type'     => 'text',
                'title'    => 'First buttom text',
                'default'  => '',
            ),
            // array(
            //     'id'       => 'referentie_btn1_link',
            //     'type'     => 'text',
            //     'title'    => 'Button1 Link',
            //     'default'  => '',
            // ),
            array(
                'id'       => 'referentie_btn2',
                'type'     => 'text',
                'title'    => 'Second button text',
                'default'  => '',
            ),
            // array(
            //     'id'       => 'referentie_btn2_link',
            //     'type'     => 'text',
            //     'title'    => 'Button2 Link',
            //     'default'  => '',
            // ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Contact', 'redux-framework-demo' ),
        'id'         => 'contact-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'contact_section_title',
                'type'     => 'text',
                'title'    => 'Contact Section Title',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_section_subtitle',
                'type'     => 'text',
                'title'    => 'Contact Section Subtitle',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_section_phone',
                'type'     => 'text',
                'title'    => 'Contact Section Phone Number',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_section_email',
                'type'     => 'text',
                'title'    => 'Contact Section Email Address',
                'default'  => '',
            ),

            array(
                'id'       => 'address_line',
                'type'     => 'textarea',
                'title'    => 'Address Line',
                'default'  => '',
            ),
//            array(
//                'id'       => 'address_line2',
//                'type'     => 'textarea',
//                'title'    => 'Address Line2',
//                'default'  => '',
//            ),
            array(
                'id'       => 'uninstall_info',
                'type'     => 'textarea',
                'title'    => 'Uninstall Info',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_social_fb',
                'type'     => 'text',
                'title'    => 'Social Facebook Link',
                'default'  => '',
            ),

            array(
                'id'       => 'contact_social_twitter',
                'type'     => 'text',
                'title'    => 'Social Twitter Link',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_social_youtube',
                'type'     => 'text',
                'title'    => 'Social Youtube Link',
                'default'  => '',
            ),

            array(
                'id'       => 'contact_social_in',
                'type'     => 'text',
                'title'    => 'Social Linkedin Link',
                'default'  => '',
            ),
        )
    ) );



    Redux::setSection( $opt_name, array(
        'title'      => __( '404', 'redux-framework-demo' ),
        'id'         => 'error-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'error-image',
                'type'     => 'media',
                'title'    => 'Image',
                'default'  => '',
            ),
            array(
                'id'       => 'error-style-pagebg',
                'type'     => 'color',
                'title'    => 'Page Background',
                'default'  => '#009241',
            ),
            array(
                'id'       => 'error-style-textcolor',
                'type'     => 'color',
                'title'    => 'Text Color',
                'default'  => '#ffffff',
            ),
            array(
                'id'       => 'error-style-buttonbg',
                'type'     => 'color',
                'title'    => 'Button Background',
                'default'  => '#ffffff',
            ),
            array(
                'id'       => 'error-style-buttontextcolor',
                'type'     => 'color',
                'title'    => 'Button Text Color',
                'default'  => '#333333',
            ),
            array(
                'id'       => 'error-style-buttonbghover',
                'type'     => 'color',
                'title'    => 'Button Background Hover',
                'default'  => '#e6e6e6',
            ),
            array(
                'id'       => 'error-style-buttontextcolorhover',
                'type'     => 'color',
                'title'    => 'Button Text Color Hover',
                'default'  => '#333333',
            ),

        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Old Browser', 'redux-framework-demo' ),
        'id'         => 'oldbrowser-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'oldbrowser-chrome-image',
                'type'     => 'media',
                'title'    => 'Chrome Image',
                'default'  => '',
            ),
            array(
                'id'       => 'oldbrowser-chrome-downloadlink',
                'type'     => 'text',
                'title'    => 'Chrome Download Link',
                'default'  => 'https://www.google.nl/chrome/browser/desktop/',
            ),
            array(
                'id'       => 'oldbrowser-firefox-image',
                'type'     => 'media',
                'title'    => 'Firefox Image',
                'default'  => '',
            ),
            array(
                'id'       => 'oldbrowser-firefox-downloadlink',
                'type'     => 'text',
                'title'    => 'Firefox Download Link',
                'default'  => 'https://www.mozilla.org/nl/firefox/new/',
            ),
            array(
                'id'       => 'oldbrowser-ie-image',
                'type'     => 'media',
                'title'    => 'IE Image',
                'default'  => '',
            ),
            array(
                'id'       => 'oldbrowser-ie-downloadlink',
                'type'     => 'text',
                'title'    => 'IE Download Link',
                'default'  => 'http://windows.microsoft.com/en-IN/internet-explorer/download-ie',
            ),
            array(
                'id'       => 'oldbrowser-style-pagebg',
                'type'     => 'color',
                'title'    => 'Page Background',
                'default'  => '#009241',
            ),
            array(
                'id'       => 'oldbrowser-style-textcolor',
                'type'     => 'color',
                'title'    => 'Text Color',
                'default'  => '#ffffff',
            ),
        )
    ));





    Redux::setSection( $opt_name, array(
        'title'      => __( 'API', 'redux-framework-demo' ),
        'id'         => 'api-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'googlemap_apikey',
                'type'     => 'text',
                'title'    => 'Google Map API Key',
                'default'  => '',
            ),

            array(
                'id'       => 'mailchimp_apikey',
                'type'     => 'text',
                'title'    => 'Mailchimp API Key',
                'default'  => '',
            ),

            array(
                'id'       => 'mailchimp_apifieldkey',
                'type'     => 'text',
                'title'    => 'Mailchimp List Field Key',
                'default'  => '',
            ),
            array(
                'id'       => 'mailchimp_successmessge',
                'type'     => 'textarea',
                'title'    => 'Mailchimp Success Message',
                'default'  => '',
                'public' => 1
            ),
            array(
                'id'       => 'mailchimp_failmessge',
                'type'     => 'textarea',
                'title'    => 'Mailchimp Fail Message',
                'default'  => '',
            ),
            array(
                'id'       => 'mailchimp_alreadymessge',
                'type'     => 'textarea',
                'title'    => 'Mailchimp Already Registered Message',
                'default'  => '',
            ),
            array(
                'id'       => 'feedback_company_url',
                'type'     => 'textarea',
                'title'    => 'Feedback Company URL',
                'default'  => '',
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Mail Configuration', 'redux-framework-demo' ),
        'id'         => 'mail_configuration',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'mailcfg_admin_email',
                'type'     => 'text',
                'title'    => 'Admin Email',
                'default'  => '',
            ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'General Pages', 'redux-framework-demo' ),
        'id'         => 'general-pages-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            // array(
            //     'id'       => 'gebeurtenissen_overview_page_id',
            //     'type'     => 'select',
            //     'data'     => 'pages',
            //     'title'    => 'Gebeurtenissen Overview Page'
            // ),
       
        )
    ));

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework-demo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content'  => file_get_contents( dirname( __FILE__ ) . '/../README.md' )
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    function dynamic_section( $sections ) {
        //$sections = array();
        $sections[] = array(
            'title'  => __( 'Section via hook', 'redux-framework-demo' ),
            'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    function change_arguments( $args ) {
        $args['dev_mode'] = false;

        return $args;
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }

    // Remove the demo link and the notice of integrated demo from the redux-framework plugin
    function remove_demo() {

        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
