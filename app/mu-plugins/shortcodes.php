<?php

/**
 * Plugin Name: Shortcodes
 * Description: Registers all shortcodes that are necessary for this website
 * Version: 1.0.0
 * Author: Webbio B.V.
 * Author URI: https://webbio.nl
 */

global $theme_opt;

function get_template_directory_uri_func($atts) {
    return get_template_directory_uri();
}

function reviewbox_post_block($atts) {

    $attr = shortcode_atts(array(
        'page_id' => '',
        'class' => '',
        'show_bottom' => '',
        'title' => '',
    ), $atts);
    global $theme_opt;

    $post = get_post($attr['page_id']);
    if(!$post) return '';
    $post_id = $post->ID;

    $referentieargs = array(
        'post_type' => 'referentie',
        'posts_per_page' => '-1',
        'order' => 'ASC',
        'suppress_filters' => false,
    );
    $referentieposts = get_posts($referentieargs);

    $i = 0;
    $slideritems = $sliderindicators = null;
    foreach ($referentieposts as $referentiepost) {
        $naam = get_post_meta($referentiepost->ID, "testimonials_written_by", true);
        $quote = get_post_meta($referentiepost->ID, "testimonials_quote", true);
        $functie = get_post_meta($referentiepost->ID, "testimonials_position", true);
        $star = get_post_meta($referentiepost->ID, "testimonials_rating", true);

        $activeclass = $i == 0 ? 'active' : '';
        $sliderindicators .= "<li data-target='#referentie-carousal' data-slide-to='$i' class='$activeclass'></li>";
        $slideritems .= "<div data-index='$i' class='item $activeclass' data-naam='$naam' data-functie='$functie' data-star='$star'>$quote</div>";
        $i++;
    }

    $data['show_bottom'] = $attr['show_bottom'];
    $data['title'] = $attr['title'];
    $data['textfirst'] = get_post_meta( $post_id, 'oyemetatpl_first_buttom_text', true );
    $data['textsecond'] = get_post_meta( $post_id, 'oyemetatpl_second_buttom_text', true );
    $data['reftitle'] = $theme_opt['referentie_title'];
    $data['linkfirst'] = get_permalink(493);
    $data['linksecond'] = get_permalink(495);
    $data['slideritems'] = $slideritems;
    $data['sliderindicators'] = $sliderindicators;

    $referentie = Timber::compile('twig/block-carousel-referentie.twig', $data);

    return $referentie;
}
add_shortcode('reviewbox_post_block', 'reviewbox_post_block');

function single_contact_box($atts) {
    $attr = shortcode_atts(array(
        'class' => '',
    ), $atts);

    global $theme_opt;

    $settings = get_option( 'general_option' );
    $phone = $settings['option_for_site_email'];
    $email = $settings['option_for_site_tel'];

    if ($settings['option_for_site_link_contact']) {
        $address = $settings['option_for_site_link_contact'];
    } else {
        $address = '';
    }
    $output = '<div class="row text-center">
        <div class="col-sm-4 col-xs-12">            
            <a href="tel:'.$phone.'"> <div class="phone"></div>'.$phone.'</a>
        </div>
        <div class="col-sm-4 col-xs-12">
            <a href="mailto:'.$email.'"> <div class="email"></div>'.$email.'</a>
        </div>
        <div class="col-sm-4 col-xs-12">
            <a href="'.$address.'" target="_blank"><div class="map"></div>'.__('adres & contact','oyetheme').'</a>
        </div>
    </div>';

    return $output;
}
add_shortcode('single_contact_box', 'single_contact_box');


function header_shortcode($atts) {
	$attr = shortcode_atts(array(
		'page_id' => '',
		'class' => '',
        'button' => '',
	), $atts);

	$post = get_post($attr['page_id']);
	if(!$post) return '';
	$post_id = $post->ID;
    
    $button = '';
    
    if($attr['button']){
        $button = '<a href="'.get_permalink(get_page_by_path($attr['button'])).'" class="btn btn-nobg btn-box header-button">'
                . $attr['button']
				. '<i class="iconc-arrow-button"></i>'
            . '</a>';
    }

	$header_style = get_post_meta( $post_id, 'oyemetatpl_header_style', true );

	$header_image_attachement_id = get_post_meta( $post_id, 'oyemetatpl_header_image', true );
	$header_image_url = wp_get_attachment_url( $header_image_attachement_id );

	$header_mobile_image_attachement_id = get_post_meta( $post_id, 'oyemetatpl_header_image_mobile', true ); 
	$header_mobile_image_url = wp_get_attachment_url( ( intval( $header_mobile_image_attachement_id )  > 0 ? intval( $header_mobile_image_attachement_id ) : $header_image_attachement_id ) );

	$header_title = get_post_meta( $post_id, 'oyemetatpl_header_title', true );
	$header_subtitle = get_post_meta( $post_id, 'oyemetatpl_header_subtitle', true );

	return Timber::compile( 'twig/block-header-banner.twig', array(
		'class' => $header_style.' '.$attr['class'],
		'title' => $header_title,
		'subtitle' => $header_subtitle,
		'header_image_url' => $header_image_url,
		'header_mobile_image_url' => $header_mobile_image_url,
        'button' => $button
	));
}
add_shortcode('header_shortcode', 'header_shortcode');


function footer_shortcode($atts) {
    $attr = shortcode_atts(array(
        'page_id' => '',
        'class' => '',
        'bgimage' => '',
    ), $atts);

    $post = get_post($attr['page_id']);
    if(!$post) return '';
    $post_id = $post->ID;

    $oyemetatpl_footer_style = get_post_meta( $post_id, 'oyemetatpl_footer_style', true );
    $oyemetatpl_footer_before_image_attachement_id = get_post_meta( $post_id, 'oyemetatpl_footer_before_image', true );
    $oyemetatpl_footer_before_image_url = wp_get_attachment_url($oyemetatpl_footer_before_image_attachement_id);
    $oyemetatpl_footer_image_attachement_id = get_post_meta( $post_id, 'oyemetatpl_footer_image', true );
    $oyemetatpl_footer_image_url = wp_get_attachment_url($oyemetatpl_footer_image_attachement_id);
    $oyemetatpl_footer_before_content = get_post_meta( $post_id, 'oyemetatpl_footer_before_content', true );

    $footer_menu = wp_nav_menu(array(
        'theme_location' => 'footer_menu',
        'container' => false,
        'menu_class' => 'footer-menu',
        'echo' => false
    ));

    $legal_menu = wp_nav_menu(array(
        'theme_location' => 'legal_pages',
        'container' => false,
        'menu_class' => 'legal-page-menu mt40',
        'echo' => false
    ));

    // Catch component options in variable
    $settings = get_option( 'general_settings' );

    return Timber::compile('twig/footer.twig', [
        'class' => $oyemetatpl_footer_style.' '.$attr['class'],
        'before_footer_image_url' => $oyemetatpl_footer_before_image_url,
        'before_footer_content' =>  apply_filters( 'the_content', $oyemetatpl_footer_before_content ) ,
        'footer_image_url' => $oyemetatpl_footer_image_url,
        'footer_logo_url' => wp_get_attachment_url($settings['configuration_entire_website_logo'][0]),
        'footer_menu' => $footer_menu,
        'legal_menu' => $legal_menu,
        'volg_ons' => __('Volg ons op social media','oyetheme'),
        'deel_deze' => __('Deel deze pagina','oyetheme'),
        'contact' => __('Contact','oyetheme'),
        'share_page_url' => 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'],
        'footer_address' => $settings['configuration_entire_website_address'],
        'footer_telephone' => $settings['configuration_entire_website_telephone'],
        'footer_telephone_land' => $settings['configuration_entire_website_telephone_land'],
        'footer_email' => $settings['configuration_entire_website_email'],
        'footer_nrto_img' => wp_get_attachment_url($settings['configuration_entire_website_nrto_image'][0]),
        'footer_learning_img' => wp_get_attachment_url($settings['configuration_entire_website_learning-image'][0]),
    ]);
}
add_shortcode('footer_shortcode', 'footer_shortcode');

function footer_single_shortcode($atts) {

    $attr = shortcode_atts(array(
        'page_id' => '',
        'class' => '',
    ), $atts);

    $pageid = $attr['page_id'];

    if(defined('ICL_LANGUAGE_CODE' ) && function_exists('icl_object_id')) {
        $pageid = icl_object_id($pageid, 'page', false, ICL_LANGUAGE_CODE);
    }

    $post = get_post($pageid);

    if(!$post) return '';
    $post_id = $post->ID;

    $oyemetatpl_footer_single_style = get_post_meta( $post_id, 'oyemetatpl_footer_single_style', true );
    $oyemetatpl_footer_single_before_image_attachement_id = get_post_meta( $post_id, 'oyemetatpl_footer_single_before_image', true );
    $oyemetatpl_footer_single_before_image_url = wp_get_attachment_url($oyemetatpl_footer_single_before_image_attachement_id);

    $oyemetatpl_footer_single_before_content = get_post_meta( $post_id, 'oyemetatpl_footer_single_before_content', true );

    return Timber::compile('twig/footer-single.twig', [
        'single_class' => $oyemetatpl_footer_single_style.' '.$attr['class'],
        'before_footer_single_image_url' => $oyemetatpl_footer_single_before_image_url,
        'before_footer_single_content' =>  apply_filters( 'the_content', $oyemetatpl_footer_single_before_content),
        //'carousel'  =>   do_shortcode("[reviewbox_post_block  page_id='$pageid']" )
    ]);
}

add_shortcode('footer_single_shortcode', 'footer_single_shortcode');
function footer_single_shortcode_ajax($atts) {

    $attr = shortcode_atts(array(
        'page_id' => '',
        'class' => '',
    ), $atts);

    $pageid = $attr['page_id'];

    if(defined('ICL_LANGUAGE_CODE' ) && function_exists('icl_object_id')) {
        $pageid = icl_object_id($pageid, 'page', false, ICL_LANGUAGE_CODE);
    }

    $post = get_post($pageid);

    if(!$post) return '';
    $post_id = $post->ID;

    $oyemetatpl_footer_single_style = get_post_meta( $post_id, 'oyemetatpl_footer_single_style', true );
    $oyemetatpl_footer_single_before_image_attachement_id = get_post_meta( $post_id, 'oyemetatpl_footer_single_before_image', true );
    $oyemetatpl_footer_single_before_image_url = wp_get_attachment_url($oyemetatpl_footer_single_before_image_attachement_id);

    $oyemetatpl_footer_single_before_content = get_post_meta( $post_id, 'oyemetatpl_footer_single_before_content', true );

    return Timber::compile('twig/footer-single.twig', [
        'single_class' => $oyemetatpl_footer_single_style.' '.$attr['class'],
        'before_footer_single_image_url' => $oyemetatpl_footer_single_before_image_url,
        'before_footer_single_content' =>  apply_filters( 'the_content', $oyemetatpl_footer_single_before_content),
        'carousel'  =>   do_shortcode("[reviewbox_post_block  page_id='$pageid']" )
    ]);
}

add_shortcode('footer_single_shortcode_ajax', 'footer_single_shortcode_ajax');



function footer_overview_to_single_shortcode($atts) {
    $attr = shortcode_atts(array(
        'page_id' => '',
        'class' => '',
    ), $atts);

    $post = get_post($attr['page_id']);
    if(!$post) return '';
    $post_id = $post->ID;

    global $theme_opt;
    $phone = $theme_opt['contact_section_phone'];
    $email = $theme_opt['contact_section_email'];

    $oyemetatpl_footer_style = get_post_meta( $post_id, 'oyemetatpl_single_footer_style', true );
    $oyemetatpl_footer_before_image_attachement_id = get_post_meta( $post_id, 'oyemetatpl_single_footer_before_image', true );
    $oyemetatpl_footer_before_image_url = wp_get_attachment_url($oyemetatpl_footer_before_image_attachement_id);

    $oyemetatpl_footer_image_attachement_id = get_post_meta( $post_id, 'oyemetatpl_single_footer_image', true );
    $oyemetatpl_footer_image_url = wp_get_attachment_url($oyemetatpl_footer_image_attachement_id);
    
    $oyemetatpl_footer_before_content = get_post_meta( $post_id, 'oyemetatpl_single_footer_before_content', true );

    $footer_logo_url = get_template_directory_uri().'/images/footer/logo-splintt-white.png';

    $footer_menu = wp_nav_menu(array(
        'theme_location' => 'footer_menu',
        'container' => false,
        'menu_class' => 'footer-menu',
        'echo' => false
    ));

    $legal_menu = wp_nav_menu(array(
        'theme_location' => 'legal_pages',
        'container' => false,
        'menu_class' => 'legal-page-menu mt40',
        'echo' => false
    ));

    return Timber::compile('twig/footer.twig', [
        'theme_opt' => $theme_opt,
        'class' => $oyemetatpl_footer_style.' '.$attr['class'],
        'before_footer_image_url' => $oyemetatpl_footer_before_image_url,
        'before_footer_content' =>  apply_filters( 'the_content', $oyemetatpl_footer_before_content ) ,
        'footer_image_url' => $oyemetatpl_footer_image_url,
        'footer_logo_url' => $footer_logo_url,
        'footer_menu' => $footer_menu,
        'legal_menu' => $legal_menu,
        'volg_ons' => __('Volg ons op social media','oyetheme'),
        'contact' => __('Contact','oyetheme')
    ]);
}
add_shortcode('footer_overview_to_single_shortcode', 'footer_overview_to_single_shortcode');

function elearningajax() {
    $postid = $_POST['selectedmenu'];
    echo do_shortcode("[elearnigdata currentpost='$postid' class='footerbanner']");
    die();
}
add_action( 'wp_ajax_nopriv_elearningajax', 'elearningajax' );
add_action( 'wp_ajax_elearningajax', 'elearningajax' );

function elearnigdata($atts) {
    $attr = shortcode_atts(array(
        'overviewpage' => '',
        'class' => '',
        'currentpost' => '',
    ), $atts);

    $data['backurl'] = $attr['overviewpage'] ? get_permalink($attr['overviewpage']) : "#";

    $overviewtoid = 272;
    if(defined('ICL_LANGUAGE_CODE' ) && function_exists('icl_object_id')) {
        $overviewtoid = icl_object_id($overviewtoid, 'page', false, ICL_LANGUAGE_CODE);
    }

    $data['sectionhash'] = "post".$attr['currentpost'];

    $data['urlhistory'] = get_permalink($overviewtoid);

    $imageid = get_post_meta($overviewtoid, "oyemetatpl_single_header_image", true);
    $posttitle = get_post_meta($overviewtoid, "oyemetatpl_single_header_title", true);
    $postsubtitle = get_post_meta($overviewtoid, "oyemetatpl_single_header_subtitle", true);
    $featureimage = wp_get_attachment_image_src($imageid, 'full');

    $elearningargs = array(
        'post_type' => 'elearning',
        'posts_per_page' => '-1',
        'order' => 'ASC',
        'ignore_custom_sort' => true,
        'suppress_filters' => false,
    );

    $elearningposts = get_posts($elearningargs);

    $data['topmenu'] = '<ul class="elearning-single hidden-md hidden-sm hidden-xs">';
    foreach ($elearningposts as $singlemenu) {
        $menutitle = get_post_meta($singlemenu->ID, "oyemetatpl_menu_title", true);
        $data['topmenu'] .= '<li>
            <a href="#post'.$singlemenu->ID.'">'.$menutitle.'</a>
        </li>';
    }
    $data['topmenu'] .= '</ul>';

    $data['selectmenu'] = '<div class="hidden-lg"><div class="select-parent"><select class="select-anchor">';
    foreach ($elearningposts as $singlemenu) {
        $menutitle = get_post_meta($singlemenu->ID, "oyemetatpl_menu_title", true);
        $data['selectmenu'] .= '<option value="#post'.$singlemenu->ID.'">'.$menutitle.'</option>';
    }
    $data['selectmenu'] .= '</select></div></div>';

    $data['bannerheader'] = Timber::compile('twig/block-header-banner2.twig', [
        'title' => $posttitle,
        'subtitle' => $postsubtitle,
        'class' => 'layout-leerplatform',
        'background' => $featureimage[0],
    ]);

    $data['elearningposts'] = "";

    foreach ($elearningposts as $elearningpost) {
        $featureimage = wp_get_attachment_image_src(get_post_thumbnail_id($elearningpost->ID), 'full');
        $imageclass = get_post_meta($elearningpost->ID, "oyemetatpl_image_corner", true);
        $data['elearningposts'] .= '<section>
            <div class="section_data" id="post'.$elearningpost->ID.'">
                <div class="section_data_left">
                    <div class="content-wrapper">
                        <h4>'.$elearningpost->post_title.'</h4>
                        <div>'.wpautop($elearningpost->post_content).'</div>
                    </div>
                </div>
                <div class="section_data_right">
                    <div class="image-wrapper">
                        <img src="'.$featureimage[0].'" />
                        <div class="'.$imageclass.'"></div>
                    </div>
                </div>
            </div>
        </section>';
    }

    $data['footerdata'] = do_shortcode("[footer_single_shortcode class='has-content section-elearning-bottom-banner footerbanner' page_id='272']");
    $data['sluiten'] = __('Sluiten','oyetheme');
    // $data['footerclass'] = "footerbanner";

    return Timber::compile('twig/elearning-data.twig', $data);
}
add_shortcode('elearnigdata', 'elearnigdata');

function leerplatformajax() {
    $postid = $_POST['selectedmenu'];
    echo do_shortcode("[leerplatformdata currentpost='$postid' class='footerbanner']");
    die();
}
add_action( 'wp_ajax_nopriv_leerplatformajax', 'leerplatformajax' );
add_action( 'wp_ajax_leerplatformajax', 'leerplatformajax' );

function leerplatformdata($atts) {
    $attr = shortcode_atts(array(
        'overviewpage' => '',
        'class' => '',
        'currentpost' => '',
    ), $atts);

    $data['backurl'] = $attr['overviewpage'] ? get_permalink($attr['overviewpage']) : "#";

    $overviewtoid = 253;
    if(defined('ICL_LANGUAGE_CODE' ) && function_exists('icl_object_id')) {
        $overviewtoid = icl_object_id($overviewtoid, 'page', false, ICL_LANGUAGE_CODE);
    }

    $data['sectionhash'] = "post".$attr['currentpost'];

    $data['urlhistory'] = get_permalink($overviewtoid);

    $imageid = get_post_meta($overviewtoid, "oyemetatpl_single_header_image", true);
    $posttitle = get_post_meta($overviewtoid, "oyemetatpl_single_header_title", true);
    $postsubtitle = get_post_meta($overviewtoid, "oyemetatpl_single_header_subtitle", true);
    $featureimage = wp_get_attachment_image_src($imageid, 'full');

    $leerargs = array(
        'post_type' => 'leerplatform',
        'posts_per_page' => '-1',
        'order' => 'ASC',
        'ignore_custom_sort' => true,
        'suppress_filters' => false,
    );

    $leerposts = get_posts($leerargs);

    $data['topmenu'] = '<ul class="elearning-single hidden-md hidden-sm hidden-xs">';

    foreach ($leerposts as $singlemenu) {
        $menutitle = get_post_meta($singlemenu->ID, "oyemetatpl_menu_title", true);
        $data['topmenu'] .= '<li>
            <a href="#post'.$singlemenu->ID.'">'.$menutitle.'</a>
        </li>';
    }

    $data['topmenu'] .= '</ul>';

    $data['selectmenu'] = '<div class="hidden-lg"><div class="select-parent"><select class="select-anchor">';
    foreach ($leerposts as $singlemenu) {
        $menutitle = get_post_meta($singlemenu->ID, "oyemetatpl_menu_title", true);
        $data['selectmenu'] .= '<option value="#post'.$singlemenu->ID.'">'.$menutitle.'</option>';
    }
    $data['selectmenu'] .= '</select></div></div>';

    $data['bannerheader'] = Timber::compile('twig/block-header-banner2.twig', [
        'title' => $posttitle,
        'subtitle' => $postsubtitle,
        'class' => 'layout-leerplatform',
        'background' => $featureimage[0],
    ]);

    $data['leerposts'] = "";

    foreach ($leerposts as $leerpost) {
        $featureimage = wp_get_attachment_image_src(get_post_thumbnail_id($leerpost->ID), 'full');
        $imageclass = get_post_meta($leerpost->ID, "oyemetatpl_image_corner", true);
        $data['leerposts'] .= '<section>
            <div class="section_data" id="post'.$leerpost->ID.'">
                <div class="section_data_left">
                    <div class="content-wrapper">
                        <h4>'.$leerpost->post_title.'</h4>
                        <div>'.wpautop($leerpost->post_content).'</div>
                    </div>
                </div>
                <div class="section_data_right">
                    <div class="image-wrapper">
                        <img src="'.$featureimage[0].'" />
                        <div class="'.$imageclass.'"></div>
                    </div>
                </div>
            </div>
        </section>';
    }

    $data['footerdata'] = do_shortcode("[footer_single_shortcode class='has-content section-elearning-bottom-banner footerbanner' page_id='253']");
    $data['sluiten'] = __('Sluiten','oyetheme');
    // $data['footerclass'] = "footerbanner";

    return Timber::compile('twig/leerplatform-data.twig', $data);
}



add_shortcode('leerplatformdata', 'leerplatformdata');

function portfolioajax() {
    $postid = $_POST['selectedmenu'];
    echo do_shortcode("[portfoliodata_ajax currentpost='$postid' overviewpage='$postid']" );
    die();
}
add_action( 'wp_ajax_nopriv_portfolioajax', 'portfolioajax' );
add_action( 'wp_ajax_portfolioajax', 'portfolioajax' );




function portfoliodata_ajax($atts) {
    $attr = shortcode_atts(array(
        'overviewpage' => '',
        'currentpost' => '',
    ), $atts);

    $post = get_post($attr['currentpost']);

    $data['backurl'] = $attr['overviewpage'] ? get_permalink($attr['overviewpage']) : "#";

    $overviewtoid = 493;
    if(defined('ICL_LANGUAGE_CODE' ) && function_exists('icl_object_id')) {
        $overviewtoid = icl_object_id($overviewtoid, 'page', false, ICL_LANGUAGE_CODE);
    }

    $data['urlhistory'] = get_permalink($overviewtoid);

    $featureimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
    $metadata = get_post_meta($post->ID);
    $logo_url = wp_get_attachment_url($metadata['oyemetatpl_logo'][0], 'full' );
    $header_image_url = wp_get_attachment_url($metadata['oyemetatpl_header_image'][0], 'full' );
    $current_page_url = 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    // $header_bg = get_post_meta($post->ID, 'oyemetatpl_header_image',true);
    // $header_image_url = wp_get_attachment_image_src($header_bg, 'full');

    $data['topmenu'] = '<ul class="elearning-single hidden-md hidden-sm hidden-xs">
        <li><a href="#post-devraag">'.__('De vraag','oyetheme').'</a></li>
        <li><a href="#post-deoplossing">'.__('De oplossing','oyetheme').'</a></li>
        <li><a href="#post-hetwoord">'.__('De klant aan het woord','oyetheme').'</a></li>
    </ul>';

    $data['selectmenu'] = '<div class="hidden-lg">
        <div class="select-parent">
            <select class="select-anchor">
                <option value="#post-devraag">'.__('De vraag','oyetheme').' </option>
                <option value="#post-deoplossing">'.__('De oplossing','oyetheme').'</option>
                <option value="#post-hetwoord">'.__('De klant aan het woord','oyetheme').'</option>
            </select>
        </div>
    </div>';

    $data['bannerheader'] = Timber::compile('twig/block-header-banner2.twig', [
        'title' => $metadata['oyemetatpl_portfolio_sub_titel'][0],
        'class' => 'layout-portfolio',
        'background' => $header_image_url,
        'logo_url' => $logo_url
    ]);

    $services = get_post_meta($post->ID, "oyemetatpl_portfolio_services", true);
    $data['listsdata'] = "";

    foreach ($services as $service) {
        $data['listsdata'] .= '<li><i class="iconc-checkmark"></i>'.$service.'</li>';
    }

    $data['portfoliodata'] = '<section class="portfolio-content">
        <ul class="portfolio-content-list">
            <li id="post-devraag">
                <div class="left-content">
                    <div class="content-wrapper">
                        <h2>'.__('De vraag','oyetheme').'</h2>
                        <div class="vraag-content">'.wpautop($metadata['oyemetatpl_portfolio_de_vraag_text'][0]).'</div>
                    </div>
                </div>
                <div class="right-content">
                    <div class="feature-wrapper">';
                        if ($metadata['oyemetatpl_portfolio_de_vraag_video'][0]) {
                            $data['portfoliodata'] .= '<iframe src="'.$metadata['oyemetatpl_portfolio_de_vraag_video'][0].'" width="100%" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                        } else {
                            $data['portfoliodata'] .= '<img src="'.wp_get_attachment_image_src($metadata['oyemetatpl_portfolio_de_vraag_image'][0], 'full')[0].'" /><div class="'.$metadata['oyemetatpl_vraag_image_corner'][0].'"></div>';
                        }
                    $data['portfoliodata'] .= '</div>
                </div>
            </li>
            <li id="post-deoplossing">
                <div class="left-content">
                    <div class="content-wrapper visible-xs">
                        <h2>'.__('De oplossing','oyetheme').'</h2>
                        <div class="vraag-content">'.wpautop($metadata['oyemetatpl_portfolio_de_oplossing_text'][0]).'</div>
                    </div>
                    <div class="feature-wrapper hidden-xs">';
                        if ($metadata['oyemetatpl_portfolio_de_oplossing_video'][0]) {
                            $data['portfoliodata'] .= '<iframe src="'.$metadata['oyemetatpl_portfolio_de_oplossing_video'][0].'" width="100%" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                        } else {
                            $data['portfoliodata'] .= '<img src="'.wp_get_attachment_image_src($metadata['oyemetatpl_portfolio_de_oplossing_image'][0], 'full')[0].'" /><div class="'.$metadata['oyemetatpl_oplossing_image_corner'][0].'"></div>';
                        }
                    $data['portfoliodata'] .= '</div>
                </div>
                <div class="right-content">
                    <div class="content-wrapper hidden-xs">
                        <h2>'.__('De oplossing','oyetheme').'</h2>
                        <div class="vraag-content">'.wpautop($metadata['oyemetatpl_portfolio_de_oplossing_text'][0]).'</div>
                    </div>
                    <div class="feature-wrapper visible-xs">';
                        if ($metadata['oyemetatpl_portfolio_de_oplossing_video'][0]) {
                            $data['portfoliodata'] .= '<iframe src="'.$metadata['oyemetatpl_portfolio_de_oplossing_video'][0].'" width="100%" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                        } else {
                            $data['portfoliodata'] .= '<img src="'.wp_get_attachment_image_src($metadata['oyemetatpl_portfolio_de_oplossing_image'][0], 'full')[0].'" /><div class="'.$metadata['oyemetatpl_oplossing_image_corner'][0].'"></div>';
                        }
                    $data['portfoliodata'] .= '</div>
                </div>
            </li>
            <li id="post-hetwoord">
                <div class="left-content">
                    <div class="content-wrapper">
                        <h2>'.__('De klant aan het woord','oyetheme').'</h2>
                        <div class="vraag-content">'.wpautop($metadata['oyemetatpl_portfolio_klant_text'][0]).'</div>
                    </div>
                </div>
                <div class="right-content">
                    <div class="feature-wrapper">';
                        if ($metadata['oyemetatpl_portfolio_klant_video'][0]) {
                             $data['portfoliodata'] .= '<iframe src="'.$metadata['oyemetatpl_portfolio_klant_video'][0].'" width="100%" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                        } else {
                            $data['portfoliodata'] .= '<img src="'.wp_get_attachment_image_src($metadata['oyemetatpl_portfolio_klant_image'][0], 'full')[0].'" /><div class="'.$metadata['oyemetatpl_klant_image_corner'][0].'"></div>';
                        }
                    $data['portfoliodata'] .= '</div>
                </div>
            </li>
        </ul>
        <div class="social-icons text-center mt40 mb60 xs-mt20 xs-mb30">
            <ul class="social-icons-ul social-style1">
                <span class="volg-text">'.__('Deel deze pagina','oyetheme').'</span>
                <li><a id="twitter_link" href="https://twitter.com/intent/tweet?url="'.$current_page_url.'" target="_blank" class="trans"><span class="iconc-twitter"></span></a></li>
                <li><a id="linkedin_link" href="https://www.linkedin.com/cws/share?url="'.$current_page_url.'" target="_blank" class="trans"><span class="iconc-linkedin"></span></a></li>
                <li><a id="facebool_link" href="https://www.facebook.com/sharer.php?u="'.$current_page_url.'" target="_blank" class="trans"><span class="iconc-facebook"></span></a></li>
            </ul>
        </div>
        <div class="anders">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="pink mb50">
                    '.__('<span>Wil je ook</span> zoiets, <span>maar dan</span> anders?','oyetheme').' 
                    </h2>   
                </div>
            </div>
            '.do_shortcode('[single_contact_box]').'
        </div>
    </section>';

   $data['footerdata'] = do_shortcode("[footer_single_shortcode_ajax class='has-content single-portfolio-footer' page_id='493']");
    $data['sluiten'] = __('Sluiten','oyetheme');
    $data['ingezette'] = __('Ingezette diensten','oyetheme');
    
    return Timber::compile('twig/portfolio-data.twig', $data);
}
add_shortcode('portfoliodata_ajax', 'portfoliodata_ajax');

function portfoliodata($atts) {
    $attr = shortcode_atts(array(
        'overviewpage' => '',
        'currentpost' => '',
    ), $atts);

    $post = get_post($attr['currentpost']);

    $data['backurl'] = $attr['overviewpage'] ? get_permalink($attr['overviewpage']) : "#";

    $overviewtoid = 493;
    if(defined('ICL_LANGUAGE_CODE' ) && function_exists('icl_object_id')) {
        $overviewtoid = icl_object_id($overviewtoid, 'page', false, ICL_LANGUAGE_CODE);
    }

    $data['urlhistory'] = get_permalink($overviewtoid);

    $featureimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
    $metadata = get_post_meta($post->ID);
    $logo_url = wp_get_attachment_url($metadata['oyemetatpl_logo'][0], 'full' );
    $header_image_url = wp_get_attachment_url($metadata['oyemetatpl_header_image'][0], 'full' );
    $current_page_url = 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    // $header_bg = get_post_meta($post->ID, 'oyemetatpl_header_image',true);
    // $header_image_url = wp_get_attachment_image_src($header_bg, 'full');

    $data['topmenu'] = '<ul class="elearning-single hidden-md hidden-sm hidden-xs">
        <li><a href="#post-devraag">'.__('De vraag','oyetheme').'</a></li>
        <li><a href="#post-deoplossing">'.__('De oplossing','oyetheme').'</a></li>
        <li><a href="#post-hetwoord">'.__('De klant aan het woord','oyetheme').'</a></li>
    </ul>';

    $data['selectmenu'] = '<div class="hidden-lg">
        <div class="select-parent">
            <select class="select-anchor">
                <option value="#post-devraag">'.__('De vraag','oyetheme').' </option>
                <option value="#post-deoplossing">'.__('De oplossing','oyetheme').'</option>
                <option value="#post-hetwoord">'.__('De klant aan het woord','oyetheme').'</option>
            </select>
        </div>
    </div>';

    $data['bannerheader'] = Timber::compile('twig/block-header-banner2.twig', [
        'title' => $metadata['oyemetatpl_portfolio_sub_titel'][0],
        'class' => 'layout-portfolio',
        'background' => $header_image_url,
        'logo_url' => $logo_url
    ]);

    $services = get_post_meta($post->ID, "oyemetatpl_portfolio_services", true);
    $data['listsdata'] = "";

    foreach ($services as $service) {
        $data['listsdata'] .= '<li><i class="iconc-checkmark"></i>'.$service.'</li>';
    }

    $data['portfoliodata'] = '<section class="portfolio-content">
        <ul class="portfolio-content-list">
            <li id="post-devraag">
                <div class="left-content">
                    <div class="content-wrapper">
                        <h2>'.__('De vraag','oyetheme').'</h2>
                        <div class="vraag-content">'.wpautop($metadata['oyemetatpl_portfolio_de_vraag_text'][0]).'</div>
                    </div>
                </div>
                <div class="right-content">
                    <div class="feature-wrapper">';
                        if ($metadata['oyemetatpl_portfolio_de_vraag_video'][0]) {
                            $data['portfoliodata'] .= '<iframe src="'.$metadata['oyemetatpl_portfolio_de_vraag_video'][0].'" width="100%" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                        } else {
                            $data['portfoliodata'] .= '<img src="'.wp_get_attachment_image_src($metadata['oyemetatpl_portfolio_de_vraag_image'][0], 'full')[0].'" /><div class="'.$metadata['oyemetatpl_vraag_image_corner'][0].'"></div>';
                        }
                    $data['portfoliodata'] .= '</div>
                </div>
            </li>
            <li id="post-deoplossing">
                <div class="left-content">
                    <div class="content-wrapper visible-xs">
                        <h2>'.__('De oplossing','oyetheme').'</h2>
                        <div class="vraag-content">'.wpautop($metadata['oyemetatpl_portfolio_de_oplossing_text'][0]).'</div>
                    </div>
                    <div class="feature-wrapper hidden-xs">';
                        if ($metadata['oyemetatpl_portfolio_de_oplossing_video'][0]) {
                            $data['portfoliodata'] .= '<iframe src="'.$metadata['oyemetatpl_portfolio_de_oplossing_video'][0].'" width="100%" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                        } else {
                            $data['portfoliodata'] .= '<img src="'.wp_get_attachment_image_src($metadata['oyemetatpl_portfolio_de_oplossing_image'][0], 'full')[0].'" /><div class="'.$metadata['oyemetatpl_oplossing_image_corner'][0].'"></div>';
                        }
                    $data['portfoliodata'] .= '</div>
                </div>
                <div class="right-content">
                    <div class="content-wrapper hidden-xs">
                        <h2>'.__('De oplossing','oyetheme').'</h2>
                        <div class="vraag-content">'.wpautop($metadata['oyemetatpl_portfolio_de_oplossing_text'][0]).'</div>
                    </div>
                    <div class="feature-wrapper visible-xs">';
                        if ($metadata['oyemetatpl_portfolio_de_oplossing_video'][0]) {
                            $data['portfoliodata'] .= '<iframe src="'.$metadata['oyemetatpl_portfolio_de_oplossing_video'][0].'" width="100%" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                        } else {
                            $data['portfoliodata'] .= '<img src="'.wp_get_attachment_image_src($metadata['oyemetatpl_portfolio_de_oplossing_image'][0], 'full')[0].'" /><div class="'.$metadata['oyemetatpl_oplossing_image_corner'][0].'"></div>';
                        }
                    $data['portfoliodata'] .= '</div>
                </div>
            </li>
            <li id="post-hetwoord">
                <div class="left-content">
                    <div class="content-wrapper">
                        <h2>'.__('De klant aan het woord','oyetheme').'</h2>
                        <div class="vraag-content">'.wpautop($metadata['oyemetatpl_portfolio_klant_text'][0]).'</div>
                    </div>
                </div>
                <div class="right-content">
                    <div class="feature-wrapper">';
                        if ($metadata['oyemetatpl_portfolio_klant_video'][0]) {
                             $data['portfoliodata'] .= '<iframe src="'.$metadata['oyemetatpl_portfolio_klant_video'][0].'" width="100%" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                        } else {
                            $data['portfoliodata'] .= '<img src="'.wp_get_attachment_image_src($metadata['oyemetatpl_portfolio_klant_image'][0], 'full')[0].'" /><div class="'.$metadata['oyemetatpl_klant_image_corner'][0].'"></div>';
                        }
                    $data['portfoliodata'] .= '</div>
                </div>
            </li>
        </ul>
        <div class="social-icons text-center mt40 mb60 xs-mt20 xs-mb30">
            <ul class="social-icons-ul social-style1">
                <span class="volg-text">'.__('Deel deze pagina','oyetheme').'</span>
                <li><a id="twitter_link" href="https://twitter.com/intent/tweet?url="'.$current_page_url.'" target="_blank" class="trans"><span class="iconc-twitter"></span></a></li>
                <li><a id="linkedin_link" href="https://www.linkedin.com/cws/share?url="'.$current_page_url.'" target="_blank" class="trans"><span class="iconc-linkedin"></span></a></li>
                <li><a id="facebool_link" href="https://www.facebook.com/sharer.php?u="'.$current_page_url.'" target="_blank" class="trans"><span class="iconc-facebook"></span></a></li>
            </ul>
        </div>
        <div class="anders">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="pink mb50">
                    '.__('<span>Wil je ook</span> zoiets, <span>maar dan</span> anders?','oyetheme').' 
                    </h2>   
                </div>
            </div>
            '.do_shortcode('[single_contact_box]').'
        </div>
    </section>';

   $data['footerdata'] = do_shortcode("[footer_single_shortcode class='has-content single-portfolio-footer' page_id='493']");
    $data['sluiten'] = __('Sluiten','oyetheme');
    $data['ingezette'] = __('Ingezette diensten','oyetheme');

    return Timber::compile('twig/portfolio-data.twig', $data);
}
add_shortcode('portfoliodata', 'portfoliodata');

function andereajax() {
    $postid = $_POST['selectedmenu'];
    echo do_shortcode("[anderedata currentpost='$postid' class='footerbanner']");
    die();
}
add_action( 'wp_ajax_nopriv_andereajax', 'andereajax' );
add_action( 'wp_ajax_andereajax', 'andereajax' );

function anderedata($atts) {
    $attr = shortcode_atts(array(
        'overviewpage' => '',
        'class' => '',
        'currentpost' => '',
    ), $atts);

    $data['backurl'] = $attr['overviewpage'] ? get_permalink($attr['overviewpage']) : "#";

    $overviewtoid = 253;
    if(defined('ICL_LANGUAGE_CODE' ) && function_exists('icl_object_id')) {
        $overviewtoid = icl_object_id($overviewtoid, 'page', false, ICL_LANGUAGE_CODE);
    }

    $data['sectionhash'] = "post".$attr['currentpost'];

    $data['urlhistory'] = get_permalink($overviewtoid);

    $imageid = get_post_meta($overviewtoid, "oyemetatpl_andere_header_image", true);
    $posttitle = get_post_meta($overviewtoid, "oyemetatpl_andere_header_title", true);
    $postsubtitle = get_post_meta($overviewtoid, "oyemetatpl_andere_header_subtitle", true);
    $featureimage = wp_get_attachment_image_src($imageid, 'full');

    $leerargs = array(
        'post_type' => 'andere_system',
        'posts_per_page' => '-1',
        'order' => 'ASC',
        'ignore_custom_sort' => true,
        'suppress_filters' => false,
    );

    $leerposts = get_posts($leerargs);

    $data['topmenu'] = '<ul class="elearning-single hidden-md hidden-sm hidden-xs">';

    foreach ($leerposts as $singlemenu) {
        $menutitle = get_post_meta($singlemenu->ID, "oyemetatpl_header_menu_title", true);
        $data['topmenu'] .= '<li>
            <a href="#post'.$singlemenu->ID.'">'.$menutitle.'</a>
        </li>';
    }

    $data['topmenu'] .= '</ul>';

    $data['selectmenu'] = '<div class="hidden-lg"><div class="select-parent"><select class="select-anchor">';
    foreach ($leerposts as $singlemenu) {
        $menutitle = get_post_meta($singlemenu->ID, "oyemetatpl_header_menu_title", true);
        $data['selectmenu'] .= '<option value="#post'.$singlemenu->ID.'">'.$menutitle.'</option>';
    }
    $data['selectmenu'] .= '</select></div></div>';

    $data['bannerheader'] = Timber::compile('twig/block-header-banner2.twig', [
        'title' => $posttitle,
        'subtitle' => $postsubtitle,
        'class' => 'layout-leerplatform',
        'background' => $featureimage[0],
    ]);


    $data['leerposts'] = "";

    foreach ($leerposts as $leerpost) {
        $featureimage = wp_get_attachment_image_src(get_post_thumbnail_id($leerpost->ID), 'full');
        $imageclass = get_post_meta($leerpost->ID, "oyemetatpl_image_corner", true);
        $data['leerposts'] .= '<section>
            <div class="section_data" id="post'.$leerpost->ID.'">
                <div class="section_data_left">
                    <div class="content-wrapper">
                        <h4>'.$leerpost->post_title.'</h4>
                        <div>'.wpautop($leerpost->post_content).'</div>
                    </div>
                </div>
                <div class="section_data_right">
                    <div class="image-wrapper">
                        <img src="'.$featureimage[0].'" />
                        <div class="'.$imageclass.'"></div>
                    </div>
                </div>
            </div>
        </section>';
    }

    $data['footerclass'] = "footerbanner";

    return Timber::compile('twig/leerplatform-data.twig', $data);
}
add_shortcode('anderedata', 'anderedata');


function landingpage_boxes($atts) {
    $attr = shortcode_atts( array(), $atts );
	$post_meta = get_post_meta( get_the_ID() );
	$result = null;

	$contentBoxes = isset( $post_meta[ 'oyemetatpl_content_block' ][ 0 ] ) && $post_meta[ 'oyemetatpl_content_block' ][ 0 ] ? unserialize( $post_meta['oyemetatpl_content_block'][0] ) : array();
	$faqBox = isset( $post_meta[ 'oyemetatpl_faq_block' ][ 0 ] ) && $post_meta[ 'oyemetatpl_faq_block' ][ 0 ] ? unserialize( $post_meta['oyemetatpl_faq_block'][0] ) : array();

	if( !empty( $contentBoxes ) || !empty( $faqBox ) ){
		if( !empty( $contentBoxes ) ){
			foreach( $contentBoxes as $box ){
                $homeURL = get_home_url();
				$result .= '<li>';
				$result .= '<div class="splintt-cut ' . $box[ 'oyemetatpl_content_block_corner_class' ] . ' ' . $box[ 'oyemetatpl_content_block_color' ] . '">';
				$result .= '<div class="splintt-cut-section-top">
						<div class="splintt-cut-mask">
							<div class="splintt-cut-background"></div>
						</div>
					</div>';

				$result .= '<div class="splintt-cut-content matchHeight">
					<div class="landing-box-content ">
						<h3>' . $box[ 'oyemetatpl_content_block_title' ] . '</h3>

						<div class="box-description">
							<p>' . $box[ 'oyemetatpl_content_block_beschrijving' ] . '</p>
						</div>';

				if( $box[ 'oyemetatpl_content_block_url' ] && $box[ 'oyemetatpl_content_block_url_text' ] ){
					$result .= '<a class="btn btn-nobg font-soho-medium" id="landingpage_naar_de_website" href="'.$homeURL . $box[ 'oyemetatpl_content_block_url' ] . '">' .
						$box[ 'oyemetatpl_content_block_url_text' ] .
						'<i class="iconc-arrow-button"></i>' .
					'</a>';
				}

				$result .= '</div>
					</div>

						<div class="splintt-cut-section-bottom">
							<div class="splintt-cut-mask">
								<div class="splintt-cut-background"></div>
							</div>
						</div>
					</div>
				</li>';
			}
		}

		if( !empty( $faqBox ) && isset( $faqBox[ 'oyemetatpl_faq_block_title' ] ) && $faqBox[ 'oyemetatpl_faq_block_title' ] && !empty( $faqBox[ 'oyemetatpl_faq_block_posts' ] ) ){
			$result .= '<li>
				<div class="splintt-cut ' . $faqBox[ 'oyemetatpl_faq_block_corner_class' ] . ' ' . $faqBox[ 'oyemetatpl_faq_block_color' ] . '">
					<div class="splintt-cut-section-top">
						<div class="splintt-cut-mask">
							<div class="splintt-cut-background"></div>
						</div>
					</div>

					<div class="splintt-cut-content">
						<div class="landing-box-content">
							<h3>' . $faqBox[ 'oyemetatpl_faq_block_title' ] . '</h3>';

			if( !empty( $faqBox[ 'oyemetatpl_faq_block_posts' ] ) ){
				$result .= '<ul class="faq-items">';

				foreach( $faqBox[ 'oyemetatpl_faq_block_posts' ] as $faqItemId ){
					$faqItem = get_post( $faqItemId );
					$faqTitle = get_post_meta( $faqItemId, 'oyemetatpl_faq_title', true );
					$faqItemUrl = ( ICL_LANGUAGE_CODE != '' ? '/' . ICL_LANGUAGE_CODE : null ) . '/veelgestelde-vragen/#' . $faqItem->post_name;
					/* $faqItemUrl = get_permalink( $faqItemId ); */

					$result .= '<li>
						<a href="' . $faqItemUrl . '" id="faq-item-' . $faqItemId . '">' .
							$faqTitle . 
							'<i class="iconc-arrow-button"></i>
						</a>
					</li>';
				}

				$result .= '</ul>';
			}

			if( $faqBox[ 'oyemetatpl_faq_block_url' ] && $faqBox[ 'oyemetatpl_faq_block_url_text' ] ){
				$result .= '<a class="btn btn-nobg font-soho-medium" id="landingpage_naar_de_website" href="' . $faqBox[ 'oyemetatpl_faq_block_url' ] . '">' .
					$faqBox[ 'oyemetatpl_faq_block_url_text' ] . 
					'<i class="iconc-arrow-button"></i>
				</a>';
			}

			$result .= '</div>
						</div>

						<div class="splintt-cut-section-bottom">
							<div class="splintt-cut-mask">
								<div class="splintt-cut-background"></div>
							</div>
						</div>
					</div>
				</li>';
		}

		if( $result ){
			$result = '<ul class="landing-data-list">' . $result . '</ul>';
			$result = '<div class="boxes-section">' . $result . '</div>';
		}
	}

    return $result;
}
add_shortcode('landingpage_boxes', 'landingpage_boxes');