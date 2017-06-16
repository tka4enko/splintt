<?php

get_header();

$postid = $post->ID;
$metadata = get_post_meta($post->ID);
$fieldleestijd = $metadata['oyemetatpl_blog_leestijd'][0];
$fieldauthor = $metadata['oyemetatpl_blog_author_name'][0];
$imageauthor = $metadata['oyemetatpl_blog_author_image'][0];
$avatarurl = wp_get_attachment_image_src($imageauthor,'full')[0];

$featureimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

$blogargs = array(
	'post_type'   => 'post',
	'posts_per_page'   => '4',
	'orderby'     => 'date',
	'order' => 'DESC',
	'post_status' => 'publish',
	'suppress_filters' => false,
	'post__not_in' => array($post->ID),
);

$current_page_url = 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

?>

<div class="singleblogCt" id="main">
	<div class="inner blogpost-boxes" id="main-inner">
		<?php echo Timber::compile('twig/block-header-banner2.twig', [
				'title' => $post->post_title,
				'author_title' => $fieldauthor,
				'author_url' => $avatarurl,
				'class' => 'layout-blog',
				'background' => $featureimage[0],
			]);
		?>
		<div class="main-content">
			<div class="content font-calibri">
				<div class="info-wrapper">
					<span class="date pull-left"><?php echo get_the_date('d M Y', $post->ID); ?></span>
					<span class="time pull-right"><i class="iconc-clock"></i><?php echo _e('Leestijd','oyetheme'); ?>  <?php echo $fieldleestijd; ?></span>
				</div>
				<div class="text-wrapper">
					<?php echo wpautop($post->post_content); ?>
				</div>
			</div>

			<div class="social-icons text-center mt40 mb60 xs-mt20 xs-mb30">
	            <ul class="social-icons-ul social-style1">
	                <span class="volg-text"><?php echo __('Deel deze pagina','oyetheme'); ?></span>
	                <li><a id="twitter_link" href="https://twitter.com/intent/tweet?url=<?php echo $current_page_url; ?>" target="_blank" class="trans"><span class="iconc-twitter"></span></a></li>
	                <li><a id="linkedin_link" href="https://www.linkedin.com/cws/share?url=<?php echo $current_page_url; ?>" target="_blank" class="trans"><span class="iconc-linkedin"></span></a></li>
	                <li><a id="facebool_link" href="https://www.facebook.com/sharer.php?u=<?php echo $current_page_url; ?>" target="_blank" class="trans"><span class="iconc-facebook"></span></a></li>
	            </ul>
	        </div>

			<div class="blog-posts">
				<div class="my65 text-center">
					<h3 class="color-pink m0"><?php echo _e('Nog een blog lezen?','oyetheme'); ?></h3>
				</div>
				<ul class="blog-posts-lists content-block">
					<?php echo getblogposts($blogargs,0); ?>
				</ul>
				<div class="blog-single loadmore-section text-center">
					<a data-post="<?php echo $post->ID; ?>" id="<?php echo $post->ID; ?>" class="btn btn-pink btn-loadmore" href="javascript:void(0);"><?php echo _e('Laad meer blogs','oyetheme'); ?> <i class="iconc-arrow-button"></i></a>
				</div>
			</div>
		</div>

		<?php echo do_shortcode("[footer_overview_to_single_shortcode class='style1' page_id='151']"); ?>
	</div>
</div>

<?php get_footer(); ?>