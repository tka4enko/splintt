<?php
/*
 * Template Name: Page Overzicht-e-learning
 */

get_header();

global $theme_opt;

$elearningargs = array(
    'post_type' => 'elearning',
    'posts_per_page' => '-1',
    'order' => 'ASC',
    'suppress_filters' => false,
);

$elearningposts = get_posts($elearningargs);

$box3title = get_post_meta($post->ID, "oyemetatpl_three_box_title", true);

?>
<div class="overzicht-e-learningCt" id="main">
	<div id="main-inner">
		<?php echo do_shortcode("[header_shortcode class='' page_id='$post->ID']"); ?>
		
		<div class="main-content mt100 xs-mt50">
			<div class="three-box-styling">
				<?php foreach ($elearningposts as $elearningpost) {
					$class = get_post_meta($elearningpost->ID, "oyemetatpl_box_class", true);

					$logo = get_post_meta($elearningpost->ID, "oyemetatpl_icon", true);
					$logo_url = wp_get_attachment_url($logo, 'full' ); ?>
					<div class="three-box-styling-inner">
						<div class="boxinfo font-calibri <?php echo $class; ?>">
							<div class="inner check-clippath text-center">
								<div class="img-wrapper">
									<img src="<?php echo $logo_url; ?>">
								</div>
								<h2 class="title-data"><?php echo $elearningpost->post_title; ?></h2>
								<div class="excerpt-data"><?php echo $elearningpost->post_excerpt; ?></div>
								<a data-hash="post<?php echo $elearningpost->ID; ?>" id="elearning_post_<?php echo $elearningpost->ID; ?>" data-pageid="<?php echo $elearningpost->ID; ?>" href="<?php echo get_permalink($elearningpost->ID); ?>" class="btn open_popup_single_elarning">
									<?php echo _e('Meer hierover lezen?','oyetheme'); ?> <i class="iconc-arrow-button"></i>
								</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>

		<?php echo do_shortcode("[footer_shortcode class='has-content' page_id='$post->ID']"); ?>
	</div>
</div>
<?php get_footer(); ?>
