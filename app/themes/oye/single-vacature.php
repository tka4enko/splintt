<?php

get_header();

$vacatureposts = get_posts($vacatureargs);

$collegaargs = array(
    'post_type'   => 'collega',
    'posts_per_page'   => '1',
    'orderby'     => 'date',
    'order' => 'ASC',
    'post_status' => 'publish',
    'suppress_filters' => false,
    'meta_query' => array(
        array(
            'key' => 'oyemetatpl_collega_featured',
            'value' => '1',
            'compare' => "="
        )
    ),
);

$collegaposts = get_posts($collegaargs);

$postid = $post->ID;
$metadata = get_post_meta($post->ID);
$subtitle = $metadata['oyemetatpl_vacature_subtitle'][0];
$reactie = $metadata['oyemetatpl_vacature_reactietijd'][0];
$imageauthor = $metadata['oyemetatpl_vacature_avatar'][0];
$avatarurl = wp_get_attachment_image_src($imageauthor, 'full')[0];

$collegatitle = $metadata['oyemetatpl_vacature_collega'][0];

$featureimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

$page_id = '221'; //TODO change this with the id of the template that shows these singles 

$showboxes = $metadata['oyemetatpl_vacature_boxes_option'][0];

$bestaatTitle = $metadata['oyemetatpl_vacature_bestaattitle_text'][0];
$bestaatArray = unserialize($metadata['vacature_bestaat_list_group'][0]);

$volgendeTitle = $metadata['oyemetatpl_vacature_volgendetitle_text'][0];
$volgendeArray = unserialize($metadata['vacature_volgende_list_group'][0]);

$extraTitle = $metadata['oyemetatpl_vacature_extratitle_text'][0];
$extraArray = unserialize($metadata['vacature_extra_list_group'][0]);

$current_page_url = 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

?>

<div class="singleblogCt" id="main">
    <div class="inner blogpost-boxes" id="main-inner">
        <?php
            echo Timber::compile('twig/block-header-banner2.twig', [
                'background' => $featureimage[0],
                'title' => $post->post_title,
                'subtitle' => $subtitle,
                'author_title' => __('Wil jij deze functie?','oyetheme'),
                'author_url' => $avatarurl,
                'author_description' => $reactie,
                'class' => 'layout-vacature'
            ]);
        ?>
        <div class="wrapper-image-background11 main-content">
            <section class="service-engineer text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php echo $post->post_content; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php if ($showboxes) { ?>
                <section class="vacature">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <h2 class="pink"><?php echo _e('Wat je moet weten over deze vacature:','oyetheme'); ?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-4 padding-right">
                                <div class="boxinfo cut-left-top-sky-blue">
                                    <div class="inner check-clippath control-float matchHeight">
                                        <h3><?php echo $bestaatTitle; ?></h3>
                                        <ul>
                                            <?php foreach ($bestaatArray as $item) { ?>
                                                <li class="media"><span class="iconc-checkmark"></span> 
                                                    <div class="media-body">
                                                        <?php echo $item['vacature_bestaat_list_data']; ?>
                                                    </div>
                                                </li>
                                            <?php }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-4 padding-left">
                                <div class="boxinfo cut-left-bottom">
                                    <div class="inner check-clippath matchHeight">
                                        <h3><?php echo $volgendeTitle; ?></h3>
                                        <ul>
                                            <?php foreach ($volgendeArray as $item) { ?>
                                                <li class="media"><span class="iconc-checkmark"></span> 
                                                    <div class="media-body">
                                                        <?php echo $item['vacature_volgende_list_data']; ?>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-4 padding10">
                                <div class="boxinfo cut-right-top-light-green ">
                                    <div class="inner check-clippath control-block matchHeight">
                                        <h3><?php echo $extraTitle; ?></h3>
                                        <ul>
                                            <?php foreach ($extraArray as $item) { ?>
                                                <li class="media"><span class="iconc-checkmark"></span> 
                                                    <div class="media-body">
                                                        <?php echo $item['vacature_extra_list_data']; ?>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>

        </div>

        <div class="social-icons text-center mt60 mb100 xs-mt20 xs-mb30">
            <ul class="social-icons-ul social-style1">
                <span class="volg-text"><?php echo __('Deel deze pagina','oyetheme'); ?></span>
                <li><a id="twitter_link" href="https://twitter.com/intent/tweet?url=<?php echo $current_page_url; ?>" target="_blank" class="trans"><span class="iconc-twitter"></span></a></li>
                <li><a id="linkedin_link" href="https://www.linkedin.com/cws/share?url=<?php echo $current_page_url; ?>" target="_blank" class="trans"><span class="iconc-linkedin"></span></a></li>
                <li><a id="facebool_link" href="https://www.facebook.com/sharer.php?u=<?php echo $current_page_url; ?>" target="_blank" class="trans"><span class="iconc-facebook"></span></a></li>
            </ul>
        </div>

        <section class="vacature-functie vacature-common-blocks">
            <div class="vacature-footer-wrapper">
                <div class="werken-post">
                    <div class="section-title text-center mb50 px10">
                        <h2 class="color-pink m0"><?php echo $collegatitle; ?></h2>
                    </div>
                    <ul class="werken-post-list collega-post">
                        <?php foreach ($collegaposts as $singlecollega) {
                            $postid = $singlecollega->ID;
                            $avatar = get_post_meta($singlecollega->ID, "oyemetatpl_collega_avatar", true);
                            $avatarurl = wp_get_attachment_image_src($avatar,'full')[0];
                            $auteur = get_post_meta($singlecollega->ID, "oyemetatpl_collega_auteur", true);
                            $function = get_post_meta($singlecollega->ID, "oyemetatpl_collega_functie", true);
                        ?>
                        <li class="single-collega">
                            <div class="werken-post-inner check-clippath">
                                <div class="werken-post-content">
                                    <div class="post-data">
                                        <h2><?php echo $function; ?></h2>
                                        <p><?php echo $singlecollega->post_excerpt; ?></p>
                                    </div>
                                    <div class="post-detail">
                                        <h3><?php echo $auteur; ?></h3>
                                        <div class="post-icon">
                                            <img src="<?php echo $avatarurl; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </section>
        <?php echo do_shortcode("[footer_overview_to_single_shortcode class='' page_id='221']"); ?>
    </div>
</div>

<?php get_footer(); ?>
