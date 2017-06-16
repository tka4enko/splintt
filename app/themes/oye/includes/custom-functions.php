<?php

add_shortcode('cookie', 'cookie');

function cookie($atts) {
    $attr = shortcode_atts(array(
        'catid' => '',
            ), $atts);

    $catid = $attr['catid'];

    $catid = $catid ? $catid : 0;

    if ($catid == 0) {
        $tax_query = [];
    } else {
        $catidarray = explode(',', $catid);
        $tax_query[] = array(
            'taxonomy' => 'cookie_manager_cat',
            'field' => 'term_id',
            'terms' => $catidarray
        );
    }

    $args = array(
        'post_type' => 'cookie_manager',
        'posts_per_page' => '10',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'tax_query' => $tax_query,
        "suppress_filters" => false
    );

    $cookieposts = get_posts($args);
    $output = '<table class="table"><tbody>';

    foreach ($cookieposts as $cmpost) {
        $geplaatstfield = get_post_meta($cmpost->ID, 'oyemetatpl_geplaatst_door', true);
        ;
        $termijn = get_post_meta($cmpost->ID, 'oyemetatpl_termijn', true);
        $output .= "<tr class=cookie-" . $cmpost->ID . ">
                    <td><h4>" . __('Naam', 'oyetheme') . "</h4><p>" . $cmpost->post_title . "</p></td>
                    <td><h4>" . __('Geplaatst door', 'oyetheme') . "</h4><p>" . $geplaatstfield . "</p></td>
                    <td><h4>" . __('Waarvoor', 'oyetheme') . "</h4><p>" . $cmpost->post_content . "</p></td>
                    <td><h4>" . __('Termijn', 'oyetheme') . "</h4><p>" . $termijn . "</p></td>
                </tr>";
    }

    $output .= "</tbody></table>";

    return $output;
}

add_action('wp_head', 'cookie_load_json_head');

function cookie_load_json_head() {
    $categories = get_terms('cookie_manager_cat');
    $chjson = array();
    foreach ($categories as $category) {
        $chjson[$category->term_id] = generatejson($category->term_id);
    }

    $cookieexception = array(
        "cookie_catid" => "cookie_catid",
    );

    $cookieoutput = "<script>var cookiejsondata = " . json_encode($chjson) . "; var exceptionarray = " . json_encode($cookieexception) . "</script>";

    echo $cookieoutput;
}

add_action('wp_ajax_nopriv_loadmoreportfolio', 'loadmoreportfolio');
add_action('wp_ajax_loadmoreportfolio', 'loadmoreportfolio');

function loadmoreportfolio() {
    $page = $_POST['pagenum'];
    echo getportfolios($page);
    die();
}

function getportfolios($paged) {

    $portfolioargs = array(
        'post_type' => 'portfolio',
        'posts_per_page' => '4',
        'paged' => $paged,
        'orderby'     => 'menu_order',
        'order' => 'ASC',
        'suppress_filters' => false,
    );

    $portfolio = get_posts($portfolioargs);
    $counter=1;

    foreach ($portfolio as $portfoliosingle) {
        $class= '';
        if ($counter == 4){
            $class=' cut-cor-custom';
        }
        $metadata = get_post_meta($portfoliosingle->ID);
        
        $logoRaw = $metadata['oyemetatpl_logo'][0];
        $header_image_id = $metadata['oyemetatpl_header_image'][0];
        $thumb_id = get_post_thumbnail_id($portfoliosingle->ID);
        $featureimage = wp_get_attachment_image_src($thumb_id, 'full');
        $thumb_url = $featureimage[0];

        $fullsize_path = get_attached_file( $thumb_id ); // Full path
        // $thumb_url = $thumb_url_array[0];
        $thumb_url_cropped  = site_url()."/image_mask.php?path=".urlencode($fullsize_path);

        if (!empty($logoRaw)) {
            $logoUrl = wp_get_attachment_image_src($logoRaw, 'full')[0];
        } else {
            $logoUrl = get_template_directory_uri() . '/images/home/image-placeholder.svg';
        }

        $servicesArray = unserialize($metadata['oyemetatpl_portfolio_services'][0]);
        
        // if (!empty($thumb_id)) {
        //     $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
            
        // } else {
        //     $thumb_url = get_template_directory_uri() . '/images/home/image-placeholder.svg';
        // }

        $subtitle = $metadata['oyemetatpl_portfolio_sub_titel'][0];

        $output.='<div class="wrapper-box row">
                <div class="col-xs-12 col-sm-6 pr0 xs-px10">
                    <div class="left-side check-clippath cut-left-top">
                        <div class="inner heightget">
                            <p class="font-soho matchTitle">' . $subtitle . '</p>
                            <figure>
                                <img class="robeco" src="' . $logoUrl . '">
                            </figure>
                           <span class="font-calibri-bold">'.__('Ingezette diensten','oyetheme').'</span>';
                            $output .= '<ul class="has-indent font-calibri">';
                            foreach ($servicesArray as $service) {
                                $output .= '<li><i class="iconc-checkmark"></i>' . $service . '</li>';
                            }
                            $output .= '</ul>';
                            $output .= '<a data-pageid="'.$portfoliosingle->ID.'" href="' . get_permalink($portfoliosingle->ID) . '" class="btn open_portfolio_single">'.__('Meer hierover lezen?','oyetheme').' <i class="iconc-arrow-button"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 pl0 xs-px10">
                    <div class="right-side heightset">
                        <div class="cut">
                            <div class="image hidden-xs" style="background-image: url(' ."'". $thumb_url_cropped . "'".');"></div>
                            <div class="image visible-xs" style="background-image: url(' ."'". $thumb_url . "'".');"></div>
                        </div>
                    </div>
                </div>
            </div>';
   $counter++;
                            }

    return $output;
}

add_action('wp_ajax_nopriv_generatejson', 'generatejson');
add_action('wp_ajax_generatejson', 'generatejson');

function generatejson($catid) {
    $tax_query = '';
    $defargs = '';
    $tax_query = array(
        'taxonomy' => 'cookie_manager_cat',
        'field' => 'term_id',
        'terms' => $catid
    );

    $defargs = array(
        'post_type' => 'cookie_manager',
        'posts_per_page' => '10',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'tax_query' => $tax_query
    );

    $postsdata = get_posts($defargs);
    $ineerdata = array();
    foreach ($postsdata as $postarray) {
        $ineerdata[$postarray->post_title] = $postarray->post_title;
    }

    return $ineerdata;
}

function get_faq_custom($post_meta){
    
    // get the meta for the faq section
    $faq_meta = $post_meta['oyemetatpl_faq_block'];
    
    // get the faq posts ids
    $faq_meta = unserialize($faq_meta[0]);
    $meta_arr = $faq_meta['oyemetatpl_faq_block_posts'];
    
    // get the faq posts
    $questions_args = array(
        'post_type' => 'veelgestelde_vragen',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
//        'suppress_filters' => false,
        'status' => 'published',
        'post__in' => $meta_arr
    );
    $questions = get_posts($questions_args);
    
    // get faq link depending on the current language
    $link_slug='';
    if (ICL_LANGUAGE_CODE == 'en'){
        $link_slug = 'faq';
    }
    else{
        $link_slug = 'veelgestelde-vragen';
    }
    
    //start creating the faq block itself
    $return = '<div class="landing-faq-block '.$faq_meta['oyemetatpl_faq_block_corner_class'].'" style="background-color:'.$faq_meta['oyemetatpl_faq_block_color'].'">'
            . '<div class="landing-faq-block_title">'.$faq_meta['oyemetatpl_faq_block_title'].'</div>';            
    foreach ($questions as $key => $value){
            $landing_title = get_post_meta($value->ID, 'oyemetatpl_faq_title');            
            $link = get_permalink( get_page_by_path( $link_slug ) );
            $return .= '<div class="landing-faq-block-item">'
                    . '<a href="' . $link . '#' . $value->post_name . '">'
                    . '<span>'.$landing_title[0].'</span>'
                    . '</a>'
                    . '</div>';
    }
    $return .= '<div class="landing-faq-block-link">'
            . '<a href="'.$faq_meta['oyemetatpl_faq_block_url'][0].'">'
            . '<span>'
            . $faq_meta['oyemetatpl-faq-block-url-text'][0]
            . '</span>'
            . '</div>'
            . '</div>';
    
    return $return;
}

function get_landingpage_content_custom($post_meta){
    
    // get the meta for the content section
    $content_meta = $post_meta['oyemetatpl_content_block'];
    $content_meta = unserialize($content_meta[0]);
    
    // start creating the content blocks themselves
    
    foreach ($content_meta as $key => $value){
        $return .= '<div class="landingpage-content-block '.$value['oyemetatpl_content_block_corner_class'].'" style="background-color:'.$value['oyemetatpl_content_block_color'].'">'
                . '<div class="landingpage-content-block-title">'
                . $value['oyemetatpl_content_block_title']
                . '</div>'
                . '<div class="landingpage-content-block-text">'
                . $value['oyemetatpl_content_block_beschrijving']
                . '</div>'
                . '<div class="landingpage-content-block-link">'
                . '<a href="'.$value['oyemetatpl_content_block_url'].'">'
                . '<span>'
                . $value['oyemetatpl_content_block_url_text']
                . '</span>'
                . '</a>'
                . '</div>'
                . '</div>';
    }
    return $return;
}

add_action('wp_ajax_nopriv_loadmoreblogs', 'loadmoreblogs');
add_action('wp_ajax_loadmoreblogs', 'loadmoreblogs');

function loadmoreblogs() {
    $paged = $_POST['page'];
    $template = $_POST['template'];
    $excludepost = $_POST['excludeid'];
    $postperpage = $_POST['postcount'];

    $blogargs = array(
        'post_type' => 'post',
        'posts_per_page' => $postperpage,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'ignore_custom_sort' => true,
    );

    if ($excludepost) {
        $blogargs['post__not_in'] = array($excludepost);
    }

    $loadblogdata = getblogposts($blogargs,$template);
    echo $loadblogdata;
    die();
}

function getblogposts($blogargs,$template) {
    $blogposts = get_posts($blogargs);
    $output = '';
    foreach ($blogposts as $blogpost) {
        $metadata = get_post_meta($blogpost->ID);
        $data['posttitle'] = $blogpost->post_title;
        $data['postdate'] = get_the_date('d M Y', $blogpost->ID);
        $data['singleurl'] = get_permalink($blogpost->ID);
        $data['fieldleestijd'] = $metadata['oyemetatpl_blog_leestijd'][0];
        $data['fieldauthor'] = $metadata['oyemetatpl_blog_author_name'][0];
        $imageauthor = $metadata['oyemetatpl_blog_author_image'][0];
        $data['avatarurl'] = wp_get_attachment_image_src($imageauthor,'full')[0];
        $contentlimit = $template ? "250" : "100";
        $data['postcontent'] = strip_tags($blogpost->post_content);
        $data['postcontent'] = substr($data['postcontent'], 0, $contentlimit);
        $data['postcontent'] = substr($data['postcontent'], 0, strrpos($data['postcontent'], ' '));
        $data['postcontent'] = $data['postcontent'].'...';
        $data['leestijd'] = __('Leestijd','oyetheme');
        $data['door'] = __('Door','oyetheme');
        $data['lees'] = __('Lees','oyetheme');
        $data['hierover'] = __('Meer hierover lezen?','oyetheme');

        if ($template) {
            $output .= Timber::compile('twig/block-blog-design1.twig', $data);
        } else {
            $output .= Timber::compile('twig/block-blog-design.twig', $data);
        }
    }

    return $output;
}


add_action('wp_ajax_nopriv_loadmorecollegas', 'loadmorecollegas');
add_action('wp_ajax_loadmorecollegas', 'loadmorecollegas');

function loadmorecollegas() {
    $paged = $_POST['page'];
    $postperpage = $_POST['postcount'];
    
    $collegaargs = array(
        'post_type'   => 'collega',
        'posts_per_page'   => $postperpage,
        'paged' => $paged,
        'orderby'     => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'meta_query' => array(
            array(
                'key' => 'oyemetatpl_collega_featured',
                'value' => '0',
                'compare' => "="
            )
        ),
    );

    $loadcollegadata = getcollegaposts($collegaargs);
    echo $loadcollegadata;
    die();
}

function getcollegaposts($collegaargs) {
    $collegaposts = get_posts($collegaargs);

    foreach ($collegaposts as $collegapost) {
        $data['postid'] = $collegapost->ID;
        $avatar = get_post_meta($collegapost->ID, "oyemetatpl_collega_avatar", true);
        $data['avatarurl'] = wp_get_attachment_image_src($avatar,'full')[0];
        $data['auteur'] = get_post_meta($collegapost->ID, "oyemetatpl_collega_auteur", true);
        $data['function'] = get_post_meta($collegapost->ID, "oyemetatpl_collega_functie", true);
        // $mijn = _e('Mijn verhaal');
        // $data['mijn_verhaal'] = $mijn;
        $data['theme_url'] =  get_template_directory_uri();
        $data['post_excerpt'] = $collegapost->post_excerpt;
        $data['post_title'] = $collegapost->post_title;
        $data['post_content'] = $collegapost->post_content;
        $data['sluiten'] = __('Sluiten','oyetheme');
        $data['mijn_verhaal'] = __('Mijn verhaal','oyetheme');

        if ($template) {
            $output .= Timber::compile('twig/block-werken-bij-collega-post.twig', $data);
        } else {
            $output .= Timber::compile('twig/block-werken-bij-collega-post.twig', $data);
        }
    }

    return $output;
}

add_action('wp_ajax_nopriv_loadmorenieuws', 'loadmorenieuws');
add_action('wp_ajax_loadmorenieuws', 'loadmorenieuws');

function loadmorenieuws() {
    $page = $_POST['pagenum'];
    echo getnieuws($page);
    die();
}

function getnieuws($paged) {

    $nieuwsargs = array(
        'post_type' => 'nieuwsberichten',
        'posts_per_page' => '5',
        'paged' => $paged,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'ignore_custom_sort' => true,
    );

    $nieuws = get_posts($nieuwsargs);
    $counter = 0;

    foreach ($nieuws as $nieuwssingle) {
        $metadata = get_post_meta($nieuwssingle->ID);
        
        $desc = $metadata['oyemetatpl_description'][0];
        $image = $metadata['oyemetatpl_image'];
        $video = rwmb_meta( 'oyemetatpl_video1', [], $nieuwssingle->ID);
        $btn_text = $metadata['oyemetatpl_btn_text'][0];
        $btn_link = $metadata['oyemetatpl_btn_link'][0];
        $image_corner = $metadata['oyemetatpl_image_corner'];
        $image_out = '';
        $video_out = '';

        if ($counter%2) {
            $output.='<li>
                        <div class="li-inner">
                            <div class="left-content">
                                <div class="content-wrapper">
                                    <h2>'.$nieuwssingle->post_title.'</h2>
                                    <div class="vraag-content">'.wpautop($desc).'</div>';
                                    if ($btn_text) { 
                                    $output.='<div class="text-center mt40">
                                                <a href="'.$btn_link.'" class="btn btn-white">'.$btn_text.' <i class="iconc-arrow-button"></i></a>
                                            </div>';
                                    }
                                $output.='</div>
                            </div>
                            <div class="right-content">';
                            if ($image) {
                                foreach ($image as $imageSingle) {
                                    $img_url = wp_get_attachment_image_src($imageSingle, 'full');
                                    $image_out.= '<div class="feature-wrapper" style="background-image: url('.$img_url[0].');"><div class="'.$image_corner[0].'"></div></div>';
                                }
                            }
                            if ($video) {
                                foreach ($video as $videoSingle) {
                                    $video_out.= '<div class="feature-wrapper"><iframe src="'.$videoSingle["oyemetatpl_video_url"].'" width="100%" height="320" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
                                }
                            }
                            $output .= $image_out;
                            $output .= $video_out;
                            '</div>
                        </div>
                    </li>';
        } else {
            $output.='<li>
                        <div class="li-inner">
                            <div class="left-content">';
                                if ($image) {
                                    foreach ($image as $imageSingle) {
                                        $img_url = wp_get_attachment_image_src($imageSingle, 'full');
                                        $image_out.= '<div class="feature-wrapper hidden-xs" style="background-image: url('.$img_url[0].');"><div class="'.$image_corner[0].'"></div></div>';
                                    }
                                }
                                if ($video) {
                                    foreach ($video as $videoSingle) {
                                        $video_out.= '<div class="feature-wrapper hidden-xs"><iframe src="'.$videoSingle["oyemetatpl_video_url"].'" width="100%" height="320" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
                                    }
                                }
                                $output .= $image_out;
                                $output .= $video_out;

                                $output.='<div class="content-wrapper visible-xs">
                                    <h2>'.$nieuwssingle->post_title.'</h2>
                                    <div class="vraag-content">'.wpautop($desc).'</div>';
                                    if ($btn_text) { 
                                        $output.='<div class="text-center mt40">
                                                <a href="'.$btn_link.'" class="btn btn-white">'.$btn_text.' <i class="iconc-arrow-button"></i></a>
                                            </div>';
                                        }
                            $output.='</div>
                            </div>
                            <div class="right-content">
                                <div class="content-wrapper hidden-xs">
                                    <h2>'.$nieuwssingle->post_title.'</h2>
                                    <div class="vraag-content">'.wpautop($desc).'</div>';
                                    if ($btn_text) { 
                                    $output.='<div class="text-center mt40">
                                                <a href="'.$btn_link.'" class="btn btn-white">'.$btn_text.' <i class="iconc-arrow-button"></i></a>
                                            </div>';
                                    }
                                $output.='</div>';
                                if ($image) {
                                    foreach ($image as $imageSingle) {
                                        $img_url = wp_get_attachment_image_src($imageSingle, 'full');
                                        $image_out1.= '<div class="feature-wrapper visible-xs" style="background-image: url('.$img_url[0].');"><div class="'.$image_corner[0].'"></div></div>';
                                    }
                                }
                                if ($video) {
                                    foreach ($video as $videoSingle) {
                                        $video_out1.= '<div class="feature-wrapper visible-xs"><iframe src="'.$videoSingle["oyemetatpl_video_url"].'" width="100%" height="320" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
                                    }
                                }
                                $output .= $image_out1;
                                $output .= $video_out1;
                            '</div>
                        </div>
                    </li>';
        }

        $counter++;
    }

    return $output;
}
