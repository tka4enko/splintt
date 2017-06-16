<?php

/*
	Template Name: Page Blog
*/

get_header();

global $post;

$blogargs = array(
	'post_type'   => 'post',
	'posts_per_page'   => '8',
	'orderby'     => 'date',
	'order' => 'DESC',
	'post_status' => 'publish',
	'suppress_filters' => false,
	'ignore_custom_sort' => true,
);

?>

<div class="BlogCt" id="main">
	<div id="main-inner" class="blogpost-boxes blogct-inner">
		<?php echo do_shortcode("[header_shortcode class='' page_id='$post->ID']"); ?>
		
		<div class="main-content">
			<div class="blog-posts">
				<ul class="blog-posts-lists content-block">
					<?php echo getblogposts($blogargs,0); ?>
				</ul>
				<div class="blog-overview loadmore-section text-center">
					<a class="btn btn-pink btn-loadmore" id="blog-btn-loadmore" href="javascript:void(0);"><?php echo _e('Laad meer blogs','oyetheme'); ?> <i class="iconc-arrow-button"></i></a>
				</div>
			</div>
		</div>

		<?php echo do_shortcode("[footer_shortcode class='' page_id='$post->ID']"); ?>
	</div>
</div>

<?php get_footer(); ?>