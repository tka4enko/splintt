<?php
/*
 * Template Name: Page Overzicht-leerplatform
 */

get_header();

$box3title = get_post_meta($post->ID, "oyemetatpl_three_box_title", true);
$box2title = get_post_meta($post->ID, "oyemetatpl_two_box_title", true);

$leerpopup = 548;
if(defined('ICL_LANGUAGE_CODE' ) && function_exists('icl_object_id')) {
    $leerpopup = icl_object_id($leerpopup, 'page', false, ICL_LANGUAGE_CODE);
}

$leerplatformargs = array(
    'post_type' => 'leerplatform',
    'posts_per_page' => '-1',
    'order' => 'ASC',
	'ignore_custom_sort' => true,
	'suppress_filters' => false,
);

$leerplatformposts = get_posts($leerplatformargs);

$andereargs = array(
    'post_type' => 'andere_system',
    'posts_per_page' => '-1',
    'order' => 'ASC',
);
$andereposts = get_posts($andereargs);

?>

<div class="overzicht-leerplatformCt" id="main">
	<div class="inner" id="main-inner">
		<?php
			echo do_shortcode("[header_shortcode class='' page_id='$post->ID']");
		?>
		
		<div class="main-content">
			<div class="three-box-styling">
				<h2 class="color-pink text-center mb70 mt70 xs-mt0"><?php echo $box3title; ?></h2>
				<?php foreach ($leerplatformposts as $leerplatformpost) {
					$class = get_post_meta($leerplatformpost->ID, "oyemetatpl_box_class", true);

					$logo = get_post_meta($leerplatformpost->ID, "oyemetatpl_icon", true);
					$logo_url = wp_get_attachment_url($logo, 'full' ); ?>
					<div class="three-box-styling-inner">
						<div class="boxinfo font-calibri <?php echo $class; ?>">
							<div class="inner check-clippath text-center">
								<div class="img-wrapper">
									<img src="<?php echo $logo_url; ?>">
								</div>
								<h2 class="title-data"><?php echo $leerplatformpost->post_title; ?></h2>
								<div class="excerpt-data"><?php echo $leerplatformpost->post_excerpt; ?></div>
								<a data-hash="post<?php echo $leerplatformpost->ID; ?>" id="leerplatform_post_<?php echo $leerplatformpost->ID; ?>" data-pageid="<?php echo $leerplatformpost->ID; ?>" href="<?php echo get_permalink($leerplatformpost->ID); ?>" class="btn open_popup_single_leerplatform">
									<?php echo _e('Meer hierover lezen?','oyetheme'); ?><i class="iconc-arrow-button"></i>
								</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>


			<div class="two-box-styling">
				<h2 class="color-pink text-center mb70 mt100"><?php echo $box2title; ?></h2>
				<?php foreach ($andereposts as $anderepost) {
					$class = get_post_meta($anderepost->ID, "oyemetatpl_box_class", true);

					$logo = get_post_meta($anderepost->ID, "oyemetatpl_icon", true);
					$logo_url = wp_get_attachment_url($logo, 'full' ); ?>
					<div class="two-box-styling-inner">
						<div class="boxinfo font-calibri <?php echo $class; ?>">
							<div class="inner check-clippath text-center">
								<div class="img-wrapper">
									<img src="<?php echo $logo_url; ?>">
								</div>
								<h2><?php echo $anderepost->post_title; ?></h2>
								<p><?php echo $anderepost->post_excerpt; ?></p>
								<a data-hash="post<?php echo $anderepost->ID; ?>" id="andere_post_<?php echo $anderepost->ID; ?>" href="<?php echo get_permalink($anderepost->ID); ?>" data-pageid="<?php echo $leerplatformpost->ID; ?>" class="btn open_popup_single_andere"><?php _e('Meer hierover lezen?'); ?> <i class="iconc-arrow-button"></i></a>
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
