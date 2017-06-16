<?php

		global $theme_opt;

		wp_footer();
		echo $GLOBALS['theme_opt']['code_before_body_closingtag'];

		/** * determine the pages on which to hide the menu */
		$pageSlug = $post && is_object( $post ) && isset( $post->post_name ) ? $post->post_name : null;

		$hideMenuOn = array_filter( array_map( function( $item ){ 
			return trim( $item );
		}, explode( ',', $theme_opt[ 'hide_menu_on' ] )));

		$hideMenuLanguageOn = array_filter( array_map( function( $item ){ 
			return trim( $item );
		}, explode( ',', $theme_opt[ 'hide_menu_language_on' ] )));


		/** * language */
		$languagesddl = icl_get_languages('skip_missing=0&orderby=code');
?>

		<?php include( locate_template( 'pages/tpl-cookies.php' ) ); ?>

		<div class="overlay-menu">
			<a href="#" class="overlay-close">
				<span class="iconc-close-icon"></span>
			</a>

<?php
			if( !in_array( $pageSlug, $hideMenuOn ) ){
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'container' => false,
					'menu_class' => 'overlay-menulist'
				));
			}

			if( !in_array( $pageSlug, $hideMenuLanguageOn ) ){
?>
				<ul class="language-switchermenu">
					<?php foreach ($languagesddl as $singlelist) {
						$activeclass = $singlelist['active'] ? "active" : "";
						echo '<li><a class="'.$activeclass.'" href="'.$singlelist['url'].'">'.$singlelist['native_name'].'</a></li>';
					} ?>
				</ul>
<?php
			}
?>
		</div>

		<div class="sticky_footer">
			<div class="sticky_footer_inner"> 
				<ul>
					<li>
						<div class="footer-animation">
							<div id="Stage" class="EDGE-342676945">
							</div>
						</div>
						<?php echo _e('<span class="ml20 hidden-xs">Neem contact op met ons</span><span class="stickydata ml30 xs-ml10 xs-fs14"><a id="mobile_footer_telephone_link" href="tel:0854010620">Bel (085) 401 06 20</a> of <a id="mobile_footer_email_link" href="mailto:info@splintt.nl"> mail info@splintt.nl</a></span>','oyetheme'); ?>
					</li>
				</ul>
			</div>
		</div>

		<div class="scroll_back_btns">
			<a href="#" class="back-to-top trans-in"><i class="iconc-arrow-up"></i></a>
		</div>

		<div id="page-popup-wrapper" class="popupoverlay-style" style="display: none;">
			<div id="page-popup"></div>
		</div>

		<script type="text/javascript">
			jQuery(function () {
				console.log('loading');
				jQuery('.site-menu').hide().fadeIn(100);
			});
		</script>
	</body>
</html>