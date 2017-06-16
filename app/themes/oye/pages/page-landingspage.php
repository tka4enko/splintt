<?php

	/*
	 * Template Name: Page Landingspage
	 */

	get_header();

	$post_meta = get_post_meta($post->ID);

	$featuredBoxes = isset( $post_meta[ 'oyemetatpl_featured_block' ][ 0 ] ) && $post_meta[ 'oyemetatpl_featured_block' ][ 0 ] ? unserialize( $post_meta['oyemetatpl_featured_block'][0] ) : array();
	$introSection = isset( $post_meta[ 'oyemetatpl_intro_block' ][ 0 ] ) && $post_meta[ 'oyemetatpl_intro_block' ][ 0 ] ? unserialize( $post_meta['oyemetatpl_intro_block'][0] ) : array();
	$contentBoxes = isset( $post_meta[ 'oyemetatpl_content_block' ][ 0 ] ) && $post_meta[ 'oyemetatpl_content_block' ][ 0 ] ? unserialize( $post_meta['oyemetatpl_content_block'][0] ) : array();
	$faqBox = isset( $post_meta[ 'oyemetatpl_faq_block' ][ 0 ] ) && $post_meta[ 'oyemetatpl_faq_block' ][ 0 ] ? unserialize( $post_meta['oyemetatpl_faq_block'][0] ) : array();

?>

<div class="landingspageCt" id="main">
	<div id="main-inner">
		<?php echo do_shortcode("[header_shortcode class='' page_id='$post->ID']"); ?>

		<div class="top-section">
<?php
			if( !empty( $featuredBoxes ) ){
?>
				<ul class="landing-data-list">
<?php
					foreach( $featuredBoxes as $item ){
						$image_url = isset( $item[ 'oyemetatpl_featured_block_achtergrondafbeelding' ][ 0 ] ) ? wp_get_attachment_url( $item[ 'oyemetatpl_featured_block_achtergrondafbeelding' ][ 0 ] ) : null;
						$content = isset( $item[ 'oyemetatpl_featured_block_beschrijving' ] ) && $item[ 'oyemetatpl_featured_block_beschrijving' ] ? $item[ 'oyemetatpl_featured_block_beschrijving' ] : null;
						$linkOption = isset($item[ 'oyemetatpl_featured_block_url_checkbox' ]) ? isset($item[ 'oyemetatpl_featured_block_url_checkbox' ]):null;
						$hiddenBlock = isset($item[ 'oyemetatpl_featured_block_hidden' ]) ? isset($item[ 'oyemetatpl_featured_block_hidden' ]):null;
						?>
						<li <?php if($hiddenBlock){ echo 'class="hidden"'; }?>>
							<div class="full-size">
								<div class="splintt-cut <?php echo $item[ 'oyemetatpl_featured_block_corner_class' ]; ?>">
									<div class="splintt-cut-section-top">
										<div class="splintt-cut-mask">
											<div class="splintt-cut-background" style="background-image: url(<?php echo $image_url; ?>)">
												<div class="splintt-cut-overlay"></div>
											</div>
										</div>
									</div>

									<div class="splintt-cut-content" style="background-image: url(<?php echo $image_url; ?>)">
										<div class="splintt-cut-overlay display-table">
											<div class="landing-box-content display-table-cell">
												<h3><?php echo $item[ 'oyemetatpl_featured_block_title' ]; ?></h3>

												<p><?php echo $content ? $content : null; ?></p>
<?php
											if( $item[ 'oyemetatpl_featured_block_url' ] && $item[ 'oyemetatpl_featured_block_url_text' ] ){
?>
												<a class="btn btn-nobg font-soho-medium" <?php if(!empty($linkOption)) echo 'target="_blank"';?> id="landingpage_naar_de_website" href="<?php echo $item[ 'oyemetatpl_featured_block_url' ]; ?>">
													<?php echo $item[ 'oyemetatpl_featured_block_url_text' ]; ?> 
													<i class="iconc-arrow-button"></i>
												</a>
												<?php
											}
											?>
											</div>
										</div>
									</div>

									<div class="splintt-cut-section-bottom">
										<div class="splintt-cut-mask">
											<div class="splintt-cut-background" style="background-image: url(<?php echo $image_url; ?>)">
												<div class="splintt-cut-overlay"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
<?php
					}
?>
				</ul>
<?php
			}

?>
		</div>

		<div class="intro-section">
			<?php
			$introImageUrl = isset( $introSection[ 'oyemetatpl_intro_block_icoon' ] ) && !empty( $introSection[ 'oyemetatpl_intro_block_icoon' ] ) && isset( $introSection[ 'oyemetatpl_intro_block_icoon' ][ 0 ] ) ? wp_get_attachment_url( $introSection[ 'oyemetatpl_intro_block_icoon' ][ 0 ] ) : null;
			$introTitle = isset( $introSection[ 'oyemetatpl_intro_block_title' ] ) && $introSection[ 'oyemetatpl_intro_block_title' ] ? $introSection[ 'oyemetatpl_intro_block_title' ] : null;
			$introContent = isset( $introSection[ 'oyemetatpl_intro_block_beschrijving' ] ) && $introSection[ 'oyemetatpl_intro_block_beschrijving' ] ? $introSection[ 'oyemetatpl_intro_block_beschrijving' ] : null;
			$introBulletsTitle = isset( $introSection[ 'oyemetatpl_intro_block_title_bullets' ] ) && $introSection[ 'oyemetatpl_intro_block_title_bullets' ] ? $introSection[ 'oyemetatpl_intro_block_title_bullets' ] : null;
			$introBulletsStyle = isset( $introSection[ 'oyemetatpl_intro_block_type_bullets' ] ) && $introSection[ 'oyemetatpl_intro_block_type_bullets' ] ? $introSection[ 'oyemetatpl_intro_block_type_bullets' ] : 'ul';
			$introBulletsItems = isset( $introSection[ 'oyemetatpl_intro_block_bullets' ] ) && $introSection[ 'oyemetatpl_intro_block_bullets' ] ? $introSection[ 'oyemetatpl_intro_block_bullets' ] : array();

			if( $introImageUrl ){?>
				<img src="<?php echo $introImageUrl; ?>" alt="intro block image" class="intro-image" />
			<?php
			}

			if( $introTitle ){
				?>
				<h2 class="color-pink"><?php echo $introTitle; ?></h2>
				<?php
			}

			if( $introContent ){
			?>
				<?php echo apply_filters( 'the_content', $introContent ); ?></h3>
			<?php
			}

			?>
			<div class="horizontal-separator"></div>

			<?php
			if( $introBulletsTitle ){
			?>
				<h2 class="color-pink"><?php echo $introBulletsTitle; ?></h2>
			<?php
			}

			if( !empty( $introBulletsItems ) ){
			?>
				<<?php echo $introBulletsStyle; ?> class="intro-bullets">
				<?php
					foreach( $introBulletsItems as $bullet ){
				?>
						<li>
							<?php echo $bullet; ?>
						</li>
				<?php
					}
				?>
				</<?php echo $introBulletsStyle; ?>>
				<?php
			}
				?>
		</div>

		<?php echo do_shortcode("[footer_shortcode class='has-content' page_id='$post->ID']"); ?>
	</div>
</div>

<?php get_footer(); ?>
