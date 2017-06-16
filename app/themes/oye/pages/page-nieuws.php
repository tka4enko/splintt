<?php
/*
 * Template Name: Page Nieuws
 */

get_header();

$imageid = get_post_meta($post->ID, "oyemetatpl_single_header_image", true);
$posttitle = get_post_meta($post->ID, "oyemetatpl_single_header_title", true);
$postsubtitle = get_post_meta($post->ID, "oyemetatpl_single_header_subtitle", true);
$featureimage = wp_get_attachment_image_src($imageid, 'full');

$nieuwsargs = array(
    'post_type'   => 'nieuwsberichten',
	'posts_per_page'   => '5',
	'orderby'     => 'menu_order',
	'order' => 'ASC',
	'post_status' => 'publish',
	'suppress_filters' => false,
	'ignore_custom_sort' => true,
);

$nieuws = get_posts($nieuwsargs);
$counter = 0;
?>
<div class="nieuwsCt" id="main">
    <div id="main-inner">

    	<?php echo Timber::compile('twig/block-header-banner2.twig', [
		        'title' => $posttitle,
		        'subtitle' => $postsubtitle,
		        'class' => 'layout-leerplatform',
		        'background' => $featureimage[0],
	    	]);
	    ?>

    	<div class="nieuwsCt-inner">
    		<section class="portfolio-content">
                <ul class="portfolio-content-list">
                	<?php
                	foreach ($nieuws as $nieuwssingle) {
				        $metadata = get_post_meta($nieuwssingle->ID);
				        
				        $desc = $metadata['oyemetatpl_description'][0];
				        $image = $metadata['oyemetatpl_image'];
				        // $video = $metadata['oyemetatpl_video'];
					    $video = rwmb_meta( 'oyemetatpl_video1', [], $nieuwssingle->ID);
				        $btn_text = $metadata['oyemetatpl_btn_text'][0];
				        $btn_link = $metadata['oyemetatpl_btn_link'][0];
				        $image_corner = $metadata['oyemetatpl_image_corner'];
					    $image_out = '';
					    $image_out1 = '';
					    $video_out = '';
					    $video_out1 = '';
					    // var_dump($video);
					    // die();

				        if ($counter%2) { ?>
		                	<li>
		                        <div class="li-inner">
		                        	<div class="left-content">
			                            <div class="content-wrapper">
			                                <h2><?php echo $nieuwssingle->post_title; ?></h2>
			                                <div class="vraag-content"><?php echo wpautop($desc); ?></div>
			                                <?php if ($btn_text) { ?>
				                                <div class="text-center mt40">
													<a href="<?php echo $btn_link; ?>" class="btn btn-white"><?php echo $btn_text; ?> <i class="iconc-arrow-button"></i></a>
												</div>
			                                <?php } ?>
			                            </div>
			                        </div>
			                        <div class="right-content">
			                            <?php if ($image) {
									        foreach ($image as $imageSingle) {
									            $img_url = wp_get_attachment_image_src($imageSingle, 'full');
									            $image_out.= '<div class="feature-wrapper" style="background-image: url('.$img_url[0].');"><div class="'.$image_corner[0].'"></div></div>';
									        }
									    }
									    if ($video) {
									        foreach ($video as $videoSingle) {
									            $video_out.= '<div class="feature-wrapper"><iframe src="'.$videoSingle["oyemetatpl_video_url"].'" width="100%" height="320" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
									        }
									    } ?>
									    <?php echo $image_out;
			                                echo $video_out; ?>
			                        </div>
		                        </div>
		                    </li>
				        <?php } else { ?>
				        	<li>
			                	<div class="li-inner">
			                		<div class="left-content">
			                            <?php if ($image) {
									        foreach ($image as $imageSingle) {
									            $img_url = wp_get_attachment_image_src($imageSingle, 'full');
									            $image_out1.= '<div class="feature-wrapper hidden-xs" style="background-image: url('.$img_url[0].');"><div class="'.$image_corner[0].'"></div></div>';
									        }
									    }
									    if ($video) {
									        foreach ($video as $videoSingle) {
									            $video_out1.= '<div class="feature-wrapper hidden-xs"><iframe src="'.$videoSingle["oyemetatpl_video_url"].'" width="100%" height="320" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
									        }
									    } ?>
									    <?php echo $image_out1;
			                                echo $video_out1; ?>
			                            <div class="content-wrapper visible-xs">
			                                <h2><?php echo $nieuwssingle->post_title; ?></h2>
			                                <div class="vraag-content"><?php echo wpautop($desc); ?></div>
			                                <?php if ($btn_text) { ?>
				                                <div class="text-center mt40">
													<a href="<?php echo $btn_link; ?>" class="btn btn-white"><?php echo $btn_text; ?> <i class="iconc-arrow-button"></i></a>
												</div>
											<?php } ?>
			                            </div>
			                        </div>
			                        <div class="right-content">
			                        	<div class="content-wrapper hidden-xs">
			                                <h2><?php echo $nieuwssingle->post_title; ?></h2>
			                                <div class="vraag-content"><?php echo wpautop($desc); ?></div>
			                                <?php if ($btn_text) { ?>
				                                <div class="text-center mt40">
													<a href="<?php echo $btn_link; ?>" class="btn btn-white"><?php echo $btn_text; ?> <i class="iconc-arrow-button"></i></a>
												</div>
											<?php } ?>
			                            </div>
			                            <?php if ($image) {
									        foreach ($image as $imageSingle) {
									            $img_url = wp_get_attachment_image_src($imageSingle, 'full');
									            $image_out.= '<div class="feature-wrapper visible-xs" style="background-image: url('.$img_url[0].');"><div class="'.$image_corner[0].'"></div></div>';
									        }
									    }
									    if ($video) {
									        foreach ($video as $videoSingle) {
									            $video_out2.= '<div class="feature-wrapper visible-xs"><iframe src="'.$videoSingle["oyemetatpl_video_url"].'" width="100%" height="320" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
									        }
									    } ?>
									    <?php echo $image_out;
			                                echo $video_out2; ?>
			                        </div>
			                	</div>
		                    </li>
                	<?php } ?>
                    <?php $counter++; } ?>
                </ul>
                <div class="text-center">
                	<a class="btn btn-pink btn-loadmore" id="blog-btn-loadmore" href="javascript:void(0);"><?php echo _e('Laad meer nieuws','oyetheme'); ?> <i class="iconc-arrow-button"></i></a>
                </div>
            </section>
    	</div>
    	<?php echo do_shortcode("[footer_shortcode class='has-content' page_id='$page_id']"); ?>
    </div>	
</div>


<?php get_footer(); ?>