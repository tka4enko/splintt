<?php
/*
 Template Name: Page Legal
 */
include(locate_template('head.php'));

$pdf_link = wp_get_attachment_url(get_post_meta($post->ID, 'oyemetatpl_pdf', true));
$featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

?>
<body <?php body_class(); ?>>

<div id="main">
	<div class="main" id="main-inner">
		<div class="privacyPolicyCt-header">
			<div class="privacyPolicyCt-header-inner trans">
				<div class="privacyPolicyCt-header-overlay" style="background-image: url('<?php echo $featured_image; ?>')">
					<div class="privacyPolicyCt-header-content container">
						<h1><?php echo get_post_meta($post->ID, 'privacy_header_title', true); ?></h1>
						<div class="privacy_pdf">
							<a id="$post->ID-download-privacy-pdfBtn" title="<?php echo get_post_meta($post->ID, 'oyemetatpl_pdf_link_title', true); ?>" class="download-privacy-pdfBtn" href="<?php echo $pdf_link; ?>" target="_blank"><?php _e(get_post_meta($post->ID, 'oyemetatpl_pdf_title', true),'theme-text-domain'); ?></a>
							<a id="$post->ID-policy-backBtn" href="<?php echo site_url(); ?>" class="policy-backBtn trans"><?php echo _e('GA TERUG','oyetheme'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="klantenservice-pop-up">
			<div class="container privacyPolicyCt">
				<div class="row margin0">
					<div class="col-md-12">
						<div class="privacyPolicyCt-inner">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
