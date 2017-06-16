<?php
/*
 * Template Name: Page Wij-zijn-de-splinters
 */

get_header();

$blogargs = array(
    'post_type'   => 'post',
    'posts_per_page'   => '2',
    'orderby'     => 'date',
    'order' => 'DESC',
    'post_status' => 'publish',
    'suppress_filters' => false,
    'ignore_custom_sort' => true,
);

$blogoverview = 151;
if(defined('ICL_LANGUAGE_CODE' ) && function_exists('icl_object_id')) {
    $blogoverview = icl_object_id($blogoverview, 'page', false, ICL_LANGUAGE_CODE);
}

?>

<div class="wij-zijn-de-splintersCt" id="main">
    <div id="main-inner">
 
        <?php echo do_shortcode("[header_shortcode class='' page_id='$post->ID']"); ?>

        <div class="wrapper-background-image">
        <section class="container-boxes">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 padding10 mb10">
                        <div class="left-side boxinfo cut-left-top-sky-blue">
                            <div class="inner">
                                <span class="font-calibri-bold">
                                    <?php echo get_post_meta($post->ID, "about_us_left_title", true); ?>
                                </span>
                                <?php echo wpautop(get_post_meta($post->ID, "about_us_left_content", true)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 padding10">
                        <div class="right-side boxinfo cut-right-bottom">
                            <div class="inner">
                                <span class="font-calibri-bold">
                                    <?php echo get_post_meta($post->ID, "about_us_right_title", true); ?>
                                </span>
                                <?php echo wpautop(get_post_meta($post->ID, "about_us_right_content", true)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="onze-plintters">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h2 class="pink mt60"><?php echo _e('Onze Splintters','oyetheme'); ?></h2>
                        <ul class="list font-soho-medium  hidden-xs hidden-sm">
                            <li class="active"><span class="bound" id="all"><?php echo _e('Alle Splintters','oyetheme'); ?></span></li>
                            <li><span class="bound" id="category-roemeense"><?php echo _e('Roemeense Splintters','oyetheme'); ?></span></li>
                            <li><span class="bound" id="category-nederlandse"><?php echo _e('Nederlandse Splintters','oyetheme'); ?></span></li>
                            <li><span class="bound" id="category-flex"><?php echo _e('Flex Splintters','oyetheme'); ?></span></li>
                        </ul>

                        <select class="font-soho-medium category-selector" data-toggle="jquery-nice-select">
                            <option class="bound" value="all"><?php echo _e('Alle Splintters','oyetheme'); ?></option>
                            <option class="bound" value="category-roemeense"><?php echo _e('Roemeense Splintters','oyetheme'); ?></option>
                            <option class="bound" value="category-nederlandse"><?php echo _e('Nederlandse Splintters','oyetheme'); ?></option>
                            <option class="bound" value="category-flex"><?php echo _e('Flex Splintters','oyetheme'); ?></option>
                        </select>
                       <!--  <ul class="visible-xs visible-sm font-soho-medium menu-small">
                            <li id="trigger"><span class="bound first-item" id="all">Alle Splintters
                                <img  id="arrow-down"src="<?php echo get_template_directory_uri() ?>/images/portfolio/arrow-down.png" alt=""/> 
                                <img  id="arrow-up"src="<?php echo get_template_directory_uri() ?>/images/portfolio/arrow-up.png" alt=""/></span>
                                <ul id="hide">
                                    <li><span class="bound" id="category-roemeense">Roemeense Splintters</span></li>
                                    <li><span class="bound" id="category-nederlandse">Nederlandse Splintters</span></li>
                                    <li><span class="bound" id="category-flex">Flex Splintters</span></li>
                                </ul>
                            </li>
                        </ul> -->
                    </div>
                </div>
                <div class="row desktop-splintters visible-lg">
                    <?php
                        $args = array(
                            'post_type' => "splintter",
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'orderby' => 'menu_order',
                        );

                        $splintters = get_posts($args);
                        $counter = 1;

                        foreach ($splintters as $splinnter) {

                            if ($counter > 4) {
                                $counter = 1;
                            }

                            $postMeta = get_post_meta($splinnter->ID);

                            $class = '';
                            $image_class = '';
                            $content_class = '';
                            $column_class = '';
                            $top_content_class = '';

                            switch ($postMeta['splintter_category'][0]) {
                                case 'roemeense' : $class = 'bg-blue';
                                    break;
                                case 'nederlandse' : $class = 'bg-skyblue';
                                    break;
                                case 'flex' : $class = 'bg-green';
                                    break;
                            }

                            switch ($counter) {
                                case 1 : $image_class = 'cut-corner-top-left';
                                    $column_class = 'float-right-medium';
                                    break;

                                case 2 : $content_class = 'cut-corner-bottom-left-content';
                                    break;

                                case 3 : $image_class = 'cut-corner-top-right';
                                    $column_class = 'float-right-medium';
                                    break;

                                case 4 : $content_class = 'cut-corner-bottom-right-content';
                                    break;
                            }
                        ?>
                        <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-3 category-<?php echo $postMeta['splintter_category'][0]; ?> all splintter-box">
                            <div class="boxinfo <?php echo $column_class; ?> <?php echo $class; ?>-container">
                                <div class="top-content <?php echo $class; ?> <?php echo $top_content_class; ?>">
                                    <p><?php echo $postMeta['splintter_text_hover'][0]; ?></p>
                                </div>
                                <div class="image <?php echo $image_class; ?> <?php echo $class; ?> splintter-image-container">
                                    <img src="<?php echo wp_get_attachment_url(intval($postMeta['splintter_image_normal'][0])); ?>" class="image-visible"/>
                                    <img src="<?php echo wp_get_attachment_url(intval($postMeta['splintter_image_hover'][0])); ?>" class="image-not-visible" style="display: none;"/>
                                    <?php if (!empty($postMeta['splintter_linkedin'][0])) { ?>
                                        <div class="in">
                                            <a href="<?php echo $postMeta['splintter_linkedin'][0]; ?>" target="_blank">
                                                <i class="iconc-linkedin-box-normal"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="content inner matchHeight <?php echo $class; ?> <?php echo $content_class; ?>">
                                    <h3><?php echo get_the_title($splinnter->ID); ?></h3>
                                    <p class="font-calibri-bold"><?php echo $postMeta['splintter_functie'][0]; ?></p>
                                    <div class="wrapper-link">
                                        <a href="mailto:<?php echo $postMeta['splintter_email'][0]; ?>"><?php echo $postMeta['splintter_email'][0]; ?></a><br>
                                        <a href="tel"><?php echo $postMeta['splintter_phone'][0]; ?></a>
                                    </div>
                                    <p class="splintter"><?php echo _e('Ik ben een','oyetheme'); ?> <span><?php
                                    _e($postMeta['splintter_category'][0], 'oyetheme');
                                    ?> Splintter</span></p>
                                </div>
                            </div>
                        </div>
                    <?php $counter++; } ?>
                </div>
                <div class="row hidden-lg">
                    <?php
                        $args = array(
                            'post_type' => "splintter",
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'orderby' => 'menu_order',
                        );
                        $splintters = get_posts($args);
                        $counter = 1;

                        foreach ($splintters as $splinnter) {

                            if ($counter > 4) {
                                $counter = 1;
                            }

                            $postMeta = get_post_meta($splinnter->ID);

                            $class = '';
                            $image_class = '';
                            $content_class = '';
                            $column_class = '';
                            $top_content_class = '';

                            switch ($postMeta['splintter_category'][0]) {
                                case 'roemeense' : $class = 'bg-blue';
                                    break;
                                case 'nederlandse' : $class = 'bg-skyblue';
                                    break;
                                case 'flex' : $class = 'bg-green';
                                    break;
                            }

                            switch ($counter) {
                                case 1 : $image_class = 'cut-corner-top-left';
                                    $column_class = 'float-right-medium';
                                    break;

                                case 2 : $content_class = 'cut-corner-bottom-left-content';
                                    break;

                                case 3 : $image_class = 'cut-corner-top-right';
                                    $column_class = 'float-right-medium';
                                    break;

                                case 4 : $content_class = 'cut-corner-bottom-right-content';
                                    break;
                            }
                        ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 category-<?php echo $postMeta['splintter_category'][0]; ?> all splintter-box">
                            <div class="boxinfo <?php echo $column_class; ?> <?php echo $class; ?>-container">
                                <div class="top-content <?php echo $class; ?> <?php echo $top_content_class; ?>">
                                    <p><?php echo $postMeta['splintter_text_hover'][0]; ?></p>
                                </div>
                                <div class="owl-common owl-carousel owl-theme slider-<?php echo $splinnter->ID; ?>">
                                    <div class="item">
                                        <img src="<?php echo wp_get_attachment_url(intval($postMeta['splintter_image_normal'][0])); ?>" />
                                    </div>
                                    <div class="item">
                                        <img src="<?php echo wp_get_attachment_url(intval($postMeta['splintter_image_hover'][0])); ?>" />
                                    </div>
                                </div>
                                <div class="content inner matchHeight <?php echo $class; ?> <?php echo $content_class; ?>">
                                    <?php if (!empty($postMeta['splintter_linkedin'][0])) { ?>
                                        <div class="in">
                                            <a href="<?php echo $postMeta['splintter_linkedin'][0]; ?>" target="_blank">
                                                <i class="iconc-linkedin-box-normal"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <h3><?php echo get_the_title($splinnter->ID); ?></h3>
                                    <p class="font-calibri-bold"><?php echo $postMeta['splintter_functie'][0]; ?></p>
                                    <div class="wrapper-link">
                                        <a href="mailto"><?php echo $postMeta['splintter_email'][0]; ?></a><br>
                                        <a href="tel"><?php echo $postMeta['splintter_phone'][0]; ?></a>
                                    </div>
                                    <p class="splintter"><?php echo _e('Ik ben een','oyetheme'); ?> <span><?php echo ucfirst($postMeta['splintter_category'][0]); ?> Splintter</span></p>
                                </div>
                            </div>
                        </div>
                    <?php $counter++; } ?>
                </div>
            </div>
        </section>

        <div class="blogpost-boxes">
            <div class="blog-posts">
                <div class="section-title text-center my80">
                    <h2 class="color-pink"><?php echo _e('Leuk leren, dicht bij de strategie','oyetheme'); ?></h2>
                </div>
                <ul class="blog-posts-lists content-block">
                    <?php echo getblogposts($blogargs,0); ?>
                </ul>
                <div class="werken-overview loadmore-section my75 xs-pb50 text-center">
                    <a class="btn btn-pink btn-loadmore" href="<?php echo get_permalink($blogoverview); ?>"><?php echo _e('Meer blogs lezen?','oyetheme'); ?> <i class="iconc-arrow-button"></i></a>
                </div>
            </div>
        </div>

        <?php echo do_shortcode("[footer_shortcode class='' page_id='$post->ID']"); ?>
    </div>
</div>

<?php get_footer(); ?>
