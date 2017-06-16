<?php
/*
 * Template Name: Page Home
 */

get_header();

$blogoverview = 151;
if (defined('ICL_LANGUAGE_CODE') && function_exists('icl_object_id')) {
    $blogoverview = icl_object_id($blogoverview, 'page', false, ICL_LANGUAGE_CODE);
}
$page_id = $post->ID;
$leren_title = get_post_meta($page_id, 'homepage_section_leren_title_text');
$neiuws_page_text = get_post_meta($page_id, 'homepage_section_leren_link_text');
$neiuws_page_url = get_post_meta($page_id, 'homepage_section_leren_link_url');
// $neiuws_page_url = site_url().'/splintt-het-nieuws-page';
// $leren_italic_title = get_post_meta($page_id, 'homepage_section_leren_title_italic_text');
?>

<div class="homeCt" id="main">
    <div id="main-inner">
        <?php echo do_shortcode("[header_shortcode class='' page_id='$page_id']"); ?>

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();

                // Initialize Timber
                $context = Timber::get_context();


                // Retrieve data for and compile the homepage header image
                // $context['homepage_header_title'] = rwmb_meta('homepage_header_title');
                // $context['homepage_header_subtitle'] = rwmb_meta('homepage_header_subtitle');
                // echo Timber::compile('twig/homepage/homepage-header-image.twig', $context);
                // Retrieve data for and compile the homepage quote section
                $context['homepage_quote_image'] = get_template_directory_uri() . '/images/icons/coin.svg';
                $context['homepage_quote_text'] = wpautop(rwmb_meta('homepage_field_quote'));
                $context['leren_en_groeien'] = $leren_title[0];
                $context['neiuws_page_url'] = $neiuws_page_url[0];
                $context['neiuws_page_text'] = $neiuws_page_text[0];
                // $context['sides_of_same_coin'] = $leren_italic_title[0];

                echo Timber::compile('twig/homepage/homepage-quote.twig', $context);


                // Retrieve data for and compile the homepage recent portfolios section
                // Get all portfolios 
                $args = array(
                    'post_type' => "portfolio",
                    'post_status' => 'publish',
                    'orderby' => 'modified',
                    'order' => 'DESC',
                    'posts_per_page' => -1,
                );
                $portfolios = get_posts($args);
                $portfoliosStarred = array();
                
                
                // Check which portfolios have the 'stared' checkmarl
                foreach ($portfolios as $item) {
                    $starred = get_post_meta($item->ID, 'oyemetatpl_portfolio_stared');
                    if (!empty($starred) && ($starred[0] == 1)) {
                        $portfoliosStarred[] = $item;
                    }
                }
                // If there are more than 2 stared portfolios, keep only the first (most recent) 2
                if (count($portfoliosStarred) > 2) {
                    array_splice($portfoliosStarred, 2);
                    
                // If there is only one portfolio stared, keep it    
                } elseif (count($portfoliosStarred) == 1) {
                    
                // Check if the kept portfolio is also the most recently modified and if not, add the most recent to the list of stared portfolios
                if ($portfoliosStarred[0] != $portfolios[0]) {
                    $portfoliosStarred[1] = $porfolios[0];

                // Else keep the second most recently modified portfolio and add it to the list of starred portfolios
                } else {
                    $portfoliosStarred[1] = $portfolios[1];
                }
                
                // If there are no stared portfolios, get the most recently two modified portfolios    
                // Could've just gotten $portfolios[0] and $portfolios[1] but had some bugs on that approach so preferred to create another query    
                } elseif (count($portfoliosStarred) == 0) {
                    $argsFallback = array(
                        'post_type' => "portfolio",
                        'post_status' => 'publish',
                        'orderby' => 'modified',
                        'order' => 'DESC',
                        'posts_per_page' => 2,
                    );
                    $portfoliosStarred = get_posts($argsFallback);
                }

                $i = 1;
                foreach ($portfoliosStarred as $portfolio) {
                    $data[$portfolio->ID]['position'] = 'left';
                    if ($i % 2 == 0) {
                        $data[$portfolio->ID]['position'] = 'right';
                    }

                    if (!empty(get_post_meta($portfolio->ID, 'oyemetatpl_list_heading'))) {
                        $data[$portfolio->ID]['heading'] = get_post_meta($portfolio->ID, 'oyemetatpl_list_heading');
                        $data[$portfolio->ID]['heading'] = $data[$portfolio->ID]['heading'][0];
                    } else {
                        $text = get_post_meta($portfolio->ID, 'oyemetatpl_portfolio_sub_titel');
                        $text = $text[0];
//                        $data[$portfolio->ID]['heading'] = strlen($text) > 75 ? substr($text, 0, 75) . "..." : $text;
                        $data[$portfolio->ID]['heading'] = $text;
                    }

                    $data[$portfolio->ID]['text_after_title'] = get_post_meta($portfolio->ID, "oyemetatpl_portfolio_text_after_title", true);

                    $logoID = get_post_meta($portfolio->ID, 'oyemetatpl_logo');
                    $logoID = intval($logoID[0]);
                    if (!empty($logoID)) {
                        $data[$portfolio->ID]['logo'] = wp_get_attachment_url(intval($logoID));
                    } else {
                        $data[$portfolio->ID]['logo'] = get_template_directory_uri() . '/images/home/image-placeholder.svg';
                    }

                    if (!empty(get_post_meta($portfolio->ID, 'oyemetatpl_btn_text'))) {
                        $data[$portfolio->ID]['button'] = get_post_meta($portfolio->ID, 'oyemetatpl_btn_text');
                        $data[$portfolio->ID]['button'] = $data[$portfolio->ID]['button'][0];
                    } else {
                        $data[$portfolio->ID]['button'] = __('Meer hierover lezen?','oyetheme');
                    }
                    $data[$portfolio->ID]['link'] = get_permalink($portfolio->ID);

                    $thumbID = get_post_thumbnail_id($portfolio->ID);
                    if (!empty($thumbID)) {
                        $data[$portfolio->ID]['image'] = wp_get_attachment_url(get_post_thumbnail_id($portfolio->ID));
                    } else {
                        $data[$portfolio->ID]['image'] = get_template_directory_uri() . '/images/home/image-placeholder.svg';
                    }
                    $i++;
                }
                $context['portfolios'] = $data;
                $context['currentpage'] = $page_id;
                $context['homepage_recent_projecten_title'] = rwmb_meta('homepage_recent_projecten_title');
                $context['portfolio']['pattern'] = get_template_directory_uri() . '/images/icons/header-footer/1920-header-no-pattern-down.svg';
                echo Timber::compile('twig/homepage/homepage_recent_portfolio.twig', $context);



                // Retrieve data for and compile the homepage elearning section 
                // TODO: Check the links on this section 

                $about['image'] = rwmb_meta('homepage_elearning_presentation_image');
                $about['image'] = wp_get_attachment_url(intval($about['image']));
                $about['title'] = rwmb_meta('homepage_elearning_presentation_title');
                $about['content'] = wpautop(rwmb_meta('homepage_elearning_presentation_content'));
                $about['textleft'] = rwmb_meta('homepage_elearning_presentation_link_left');
                $about['textright'] = rwmb_meta('homepage_elearning_presentation_link_right');
                $about['linkleft'] = get_permalink(493);
                $about['linkright'] = get_permalink(495);
                $context['about'] = $about;
                echo Timber::compile('twig/homepage/homepage_about.twig', $context);


                //// Retrieve data for and compile the homepage recent posts section
                $data = array();
                $data['info']['blogposts_pattern'] = get_template_directory_uri() . '/images/icons/header-footer/1920-header-no-pattern-down.svg';
                $data['info']['blogposts_title'] = rwmb_meta('homepage_blog_posts_title');
                $data['info']['overviewlink'] = get_permalink($blogoverview);
                //$data['info']['blogposts_left'] = rwmb_meta('homepage_blog_posts_left_color');
                //$data['info']['blogposts_right'] = rwmb_meta('homepage_blog_posts_right_color');
                $args = array(
                    'post_type'   => 'post',
                    'posts_per_page'   => '2',
                    'orderby'     => 'date',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'suppress_filters' => false,
                    'ignore_custom_sort' => true,
                );
                $posts = get_posts($args);
                $i = 0;
                foreach ($posts as $post) {
                    if ($i % 2 == 0) {
                        $data['posts'][$post->ID]['class'] = 'left-side';
                        //$data['posts'][$post->ID]['bg'] = $data['info']['blogposts_left'];
                    } else {
                        $data['posts'][$post->ID]['class'] = 'right-side';
                        //$data['posts'][$post->ID]['bg'] = $data['info']['blogposts_right'];
                    }
                    $data['posts'][$post->ID]['title'] = get_the_title($post->ID);
                    $data['posts'][$post->ID]['author'] = get_post_meta($post->ID, "oyemetatpl_blog_author_name", true);
                    $imageauthor = get_post_meta($post->ID, "oyemetatpl_blog_author_image", true);
                    $data['posts'][$post->ID]['avatarurl'] = wp_get_attachment_image_src($imageauthor, 'full')[0];
                    $data['posts'][$post->ID]['date'] = get_the_date('d M y', $post->ID);
                    $data['posts'][$post->ID]['leestijd'] = get_post_meta($post->ID, "oyemetatpl_blog_leestijd", true);
					$postcontent = strip_tags(get_post_field('post_content', $post->ID));
                    $postcontent = substr($postcontent, 0, 100);
                    $postcontent = substr($postcontent, 0, strrpos($postcontent, ' '));
                    $data['posts'][$post->ID]['excerpt'] = $postcontent . '...';
                    // $data['posts'][$post->ID]['excerpt'] = strlen(get_post_field('post_content', $post->ID)) > 250 ? substr(get_post_field('post_content', $post->ID), 0, 250) . "..." : get_post_field('post_content', $post->ID);
                    $data['posts'][$post->ID]['link'] = get_the_permalink($post->ID);
                    $i++;
                }
                $data['leestijd'] = __('Leestijd','oyetheme');
                $data['door'] = __('Door','oyetheme');
                $data['lees'] = __('Lees','oyetheme');
                $data['meer_blogs_lezen'] = __('Meer blogs lezen?','oyetheme');
                $context['blog'] = $data;

                echo Timber::compile('twig/homepage/homepage_recent_blog.twig', $context['blog']);
                ?>

                <?php echo do_shortcode("[footer_shortcode class='' page_id='$page_id']"); ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
