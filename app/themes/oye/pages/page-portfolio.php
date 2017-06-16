<?php
/*
 * Template Name: Page Portfolio
 */

get_header();

$page_id = $post->ID;

$portfolioargs = array(
    'post_type' => 'portfolio',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'suppress_filters' => false,
);

$portfolio = get_posts($portfolioargs);

$counter = 1;
$cat_args_portfolios = array(
    'orderby' => 'term_id',
    'order' => 'ASC',
    'hide_empty' => false,
);

$terms_portfolios = get_terms('portfolio_category', $cat_args_portfolios);
?>
<div class="portfolioCt" id="main">

    <!-- Used on contact, Wij-zijn-de-splinters, Werken-bij Overview, Portfolio Overview -->
    <div id="main-inner">
        <?php echo do_shortcode("[header_shortcode class='' page_id='$post->ID']"); ?>
        <div class="main-content">
            <div class="portfolio-posts">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <ul class="list font-soho-medium  hidden-xs hidden-sm">
                                <li class="active"><span class="bound" id="all"><?php echo _e('Alles', 'oyetheme'); ?></span></li>
                                <?php foreach ($terms_portfolios as $key => $value) {
                                    ?>
                                    <li><span class="bound" id="category-<?php echo $value->slug; ?>"><?php echo $value->name; ?></span></li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <select class="font-soho-medium category-selector" data-toggle="jquery-nice-select">
                                <option class="bound" value="all"><?php echo _e('Alles', 'oyetheme'); ?></option>
                                <?php foreach ($terms_portfolios as $key => $value) {
                                    ?>
                                    <option class="bound" value="category-<?php echo $value->slug; ?>"><?php echo $value->name; ?></option>
                                    <?php
                                }
                                ?>
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
                    <?php
                    // echo getportfolios(0); 
                    foreach ($portfolio as $portfoliosingle) {
                        $term = get_the_terms( intval($portfoliosingle->ID), 'portfolio_category' );
                        $category_class = '';
                        if(!empty($term)){
                            foreach ($term as $key => $value){
                                $category_class.=' category-'.$value->slug;
                            }
                        }

                        $class = '';
                        if ($counter == 4) {
                            $class = ' cut-cor-custom';
                        }
                        $metadata = get_post_meta($portfoliosingle->ID);

                        $logoRaw = $metadata['oyemetatpl_logo'][0];
                        $header_image_id = $metadata['oyemetatpl_header_image'][0];
                        $thumb_id = get_post_thumbnail_id($portfoliosingle->ID);
                        $featureimage = wp_get_attachment_image_src($thumb_id, 'full');
                        $thumb_url = $featureimage[0];

                        $fullsize_path = wp_get_attachment_url($thumb_id); // Full path
                        // $thumb_url = $thumb_url_array[0];
                        $template_directory = get_template_directory_uri();
                        $thumb_url_cropped = $fullsize_path;

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
                        ?>
                        <div class="wrapper-box row<?php echo $category_class;?> all splintter-box">
                            <div class="col-xs-12 col-sm-6 pr0 xs-px10">
                                <div class="left-side check-clippath cut-left-top">
                                    <div class="inner heightget">
                                        <p class="font-soho matchTitle"><?php echo $subtitle; ?></p>
                                        <figure>
                                            <img class="robeco" src="<?php echo $logoUrl; ?>">
                                        </figure>
                                        <span class="font-calibri-bold"><?php echo __('Ingezette diensten', 'oyetheme'); ?></span>
                                        <ul class="has-indent font-calibri">
                                            <?php foreach ($servicesArray as $service) { ?>
                                                <li><i class="iconc-checkmark"></i> <?php echo $service; ?></li>
                                            <?php } ?>
                                        </ul>
                                        <a data-pageid="<?php echo $portfoliosingle->ID?>" href="<?php echo get_permalink($portfoliosingle->ID);?>" class="btn open_portfolio_single"><?php echo __('Meer hierover lezen?', 'oyetheme'); ?> <i class="iconc-arrow-button"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 pl0 xs-px10">
                                <div class="right-side heightset">
                                    <div class="cut">
                                        <div class="image hidden-xs" style="background-image: url(' <?php echo $thumb_url_cropped; ?> ');"></div>
                                        <div class="image visible-xs" style="background-image: url(' <?php echo $thumb_url; ?> ');"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $counter++;
                    }
                    ?>         
                </div>
            </div>
        </div>
        <?php /*
          <section class="mb40 section-portfoliomore">
          <div class="container">
          <div class="row">
          <div class="col-xs-12 text-center">
          <div class="wie-zijnBtn-div">
          <a href="#" class="btn btn-pink btn-loadmore"><?php echo _e('Laad meer items', 'oyetheme'); ?> <i class="iconc-arrow-button"></i></a>
          </div>
          </div>
          </div>
          </div>
          </section>
         */ ?>
        <?php echo do_shortcode("[footer_shortcode bgimage='aligntop' class='' page_id='$page_id']"); ?>

    </div>
</div>

<?php get_footer(); ?>
