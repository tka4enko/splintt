<?php
/*
 * Template Name: Page Werken-bij
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

$vacatureargs = array(
	'post_type'   => 'vacature',
	'posts_per_page'   => '2',
	'orderby'     => 'date',
	'order' => 'DESC',
	'post_status' => 'publish',
	'suppress_filters' => false,
);

$vacatureposts = get_posts($vacatureargs);

$collegaargs = array(
	'post_type'   => 'collega',
	'posts_per_page'   => '2',
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

// $collegaposts = get_posts($collegaargs);

$metadata = get_post_meta($post->ID);

?>

<div class="werken-bijCt" id="main">
	<div id="main-inner">
		<?php echo do_shortcode("[header_shortcode class='' page_id='$post->ID']"); ?>
		<div class="main-content">
			<div class="werkenbij-content vacature-common-blocks">
				<div class="werken-post">
					<ul class="werken-post-list has-alternate">
						<?php foreach ($vacatureposts as $vacaturepost) {
							$icon = get_post_meta($vacaturepost->ID, "oyemetatpl_vacature_avatar", true);
							$iconurl = wp_get_attachment_image_src($icon,'full')[0];
							$listsdata = get_post_meta($vacaturepost->ID, "vacature_list_group", true);
						?>
						<li class="werken-box">
							<div class="werken-post-inner check-clippath">
								<div class="werken-post-content">
									<div class="post-data">
										<h2><?php echo $vacaturepost->post_title; ?></h2>
										<ul>
											<?php
												foreach ($listsdata as $singlelist) {
													echo '<li> <i class="iconc-checkmark"></i>'.$singlelist["vacature_list_data"].'</li>';
												}
											?>
										</ul>
									</div>
									<div class="post-detail">
										<h3><?php echo _e('Heb jij interesse?','oyetheme'); ?></h3>
										<div class="post-icon">
											<img src="<?php echo $iconurl; ?>" />
										</div>
										<a class="btn" href="<?php echo get_permalink($vacaturepost->ID); ?>"><?php echo _e('Lees verder','oyetheme'); ?> <i class="iconc-arrow-button"></i></a>
									</div>
								</div>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
				<div class="werken-post">
					<div class="section-title text-center mb50 px10">
						<h2 class="color-pink m0"><?php echo $metadata['oyemetatpl_collega_title'][0]; ?></h2>
					</div>
					<ul class="werken-post-list collega-post">
						<?php echo getcollegaposts($collegaargs); ?>
					</ul>
					<div class="werken-collega-overview loadmore-collega-section my60 text-center">
						<a class="btn btn-pink btn-loadmorecollega" href="javascript:void(0);"><?php echo _e('Laad meer verhalen','oyetheme'); ?><i class="iconc-arrow-button"></i></a>
					</div>
				</div>
				<div class="blogpost-boxes">
					<div class="blog-posts">
						<div class="section-title text-center mb50 px10">
							<h2 class="color-pink m0"><?php echo $metadata['oyemetatpl_strategie_title'][0]; ?></h2>
						</div>
						<ul class="blog-posts-lists content-block">
							<?php echo getblogposts($blogargs,0); ?>
						</ul>
						<div class="werken-overview loadmore-section my75 text-center">
							<a class="btn btn-pink btn-loadmore" href="javascript:void(0);"><?php echo _e('Meer blogs lezen?','oyetheme'); ?> <i class="iconc-arrow-button"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php echo do_shortcode("[footer_shortcode class='' page_id='$post->ID']"); ?>
	</div>
</div>
<?php get_footer(); ?>
