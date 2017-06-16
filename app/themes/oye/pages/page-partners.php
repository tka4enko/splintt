<?php
/*
 * Template Name: Page Partners
 */

get_header();

global $post;
global $theme_opt;

$partnersargs = array(
    'post_type' => 'partner',
    'posts_per_page' => '-1',
    'orderby' => 'menu_order',
    'order' => 'ASC',
);

$partnersposts = get_posts($partnersargs);

?>

<div class="partnersCt" id="main">
	<div id="main-inner">
		<?php echo do_shortcode("[header_shortcode class='' page_id='$post->ID']"); ?>

		<div class="main-content">
			<div class="partnerBox">
				<div class="partner-box-style">
					<?php foreach ($partnersposts as $partnerspost) {
					$class = get_post_meta($partnerspost->ID, "oyemetatpl_box_class", true);
					$link = get_post_meta($partnerspost->ID, "oyemetatpl_link", true);

					$logo = get_post_meta($partnerspost->ID, "oyemetatpl_logo", true);
					$logo_url = wp_get_attachment_url($logo, 'full' ); ?>
						<div class="partner-boxinfo">
							<div class="partner-boxinfo-inner">
								<div class="logo-block">
									<img src="<?php echo $logo_url; ?>">
								</div>
								<div class="boxinfo <?php echo $class; ?>">
									<div class="inner check-clippath">
										<h2 class="heading"><?php echo $partnerspost->post_title; ?></h2>
										<p class="text"><?php echo $partnerspost->post_content; ?></p>
										<a target="_blank" href="<?php echo $link; ?>" class="btn btn-nobg"><?php echo _e('Bekijk de website','oyetheme'); ?> <i class="iconc-arrow-button"></i></a>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<?php echo do_shortcode("[footer_shortcode class='' page_id='$post->ID']"); ?>
	</div>
</div>
<?php get_footer(); ?>
