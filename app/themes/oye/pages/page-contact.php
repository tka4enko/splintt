<?php
/*
 * Template Name: Page Contact
 */

get_header();


if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
    wpcf7_enqueue_scripts();
}

if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
    wpcf7_enqueue_styles();
}

global $post;

global $theme_opt;

$meta_data = get_post_meta( $post->ID);
$onzetitle = $meta_data['oyemetatpl_onzetitle'][0];
$onzedata = $meta_data['oyemetatpl_onzedata'][0];

$servicetitle = $meta_data['oyemetatpl_servicetitle'][0];
$servicedata = $meta_data['oyemetatpl_servicedata'][0];

$wat_kunnentitle = $meta_data['oyemetatpl_wat_kunnentitle'][0];
$wat_kunnendata = $meta_data['oyemetatpl_wat_kunnendata'][0];

$routeplannertitle = $meta_data['oyemetatpl_routeplannertitle'][0];
$routeplannerimageid = get_post_meta( $post->ID, 'oyemetatpl_routeplannerimage',true);
$routeplannerimage= wp_get_attachment_image_src( $routeplannerimageid, 'full' );


?>

<div class="contactCt" id="main">
	<div id="main-inner">
			<?php echo do_shortcode("[header_shortcode class='' page_id='$post->ID']"); ?>
		<div class="main-content">

			<div class="container contact-top-wrapper">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="boxinfo cut-left-top-sky-blue no-cut-sky-blue font-calibri">
							<div class="inner check-clippath">
								<h2 class="my25"><?php echo $onzetitle; ?></h2>
								<?php echo wpautop($onzedata); ?>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="boxinfo cut-right-bottom xs-cut-left-bottom font-calibri btn-blue-hover">
							<div class="inner check-clippath">
								<h2><?php echo $servicetitle; ?></h2>
								<?php echo wpautop($servicedata); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container form-map-wrapper">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="color-pink"><?php echo $wat_kunnentitle; ?></h2>
						<?php echo do_shortcode($wat_kunnendata); ?>
					</div>

					<div class="col-md-6 col-sm-6 xs-mt50">
						<h2 class="color-pink"><?php echo $routeplannertitle; ?></h2>

						<a id="contact_page_route_link" href="https://www.google.nl/maps/dir//Papendorpseweg+77,+3528+Utrecht/@52.0634365,5.0815552,17z/data=!4m16!1m7!3m6!1s0x47c6659ed90b9449:0xb41235f6c07890d9!2sPapendorpseweg+77,+3528+Utrecht!3b1!8m2!3d52.0634365!4d5.0837439!4m7!1m0!1m5!1m1!1s0x47c6659ed90b9449:0xb41235f6c07890d9!2m2!1d5.0837439!2d52.0634365" target="_blank">							
							<div class="map-img" style="background: url(<?php echo $routeplannerimage[0]; ?>) no-repeat center;"></div>
						</a>
					</div>
				</div>
			</div>
		</div>

    	<?php echo do_shortcode("[footer_shortcode class='has-content' page_id='$post->ID']"); ?>
	</div>
</div>
<?php get_footer(); ?>
