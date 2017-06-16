<?php
    get_template_part( 'head' );
    global $theme_opt;

    function wpml_custom_flags( ) {       
        $languages = icl_get_languages( 'skip_missing=0&orderby=code' );
        $curr_lang = array();

        if( !empty( $languages ) ){             
            foreach( $languages as $language ) {
                if( !empty( $language[ 'active' ] ) ) {
                    $curr_lang = $language; // This will contain current language info.
                    break;
                }
            }
        }
        return $curr_lang;
    }
    $curr_lang = wpml_custom_flags();

?><?php

	/** * determine the pages on which to hide the menu */
	$pageSlug = $post && is_object( $post ) && isset( $post->post_name ) ? $post->post_name : null;

	$hideMenuOn = array_filter( array_map( function( $item ){ 
		return trim( $item );
	}, explode( ',', $theme_opt[ 'hide_menu_on' ] )));

	$hideMenuLanguageOn = array_filter( array_map( function( $item ){ 
		return trim( $item );
	}, explode( ',', $theme_opt[ 'hide_menu_language_on' ] )));
?>

<body <?php body_class(); ?>>
	<?php echo $theme_opt['code_after_body_starttag']; ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K4W6LC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header>
		<div class="custom-container header-data">
				<a class="site-logo" id="site-logo" href="<?php echo home_url(); ?>">
					<div class="logoicon">
						<figure>
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/logo-splintt.svg">
						</figure>
					</div>
				</a>
				<nav class="nav-menu site-menu" id="fade-menu" style="font-family: 'SohoGothicStd-Medium'; display: none;">
				<?php
					wp_nav_menu(array(
						'theme_location' => 'primary',
						'container' => false,
						'menu_class' => 'header-menu visible-lg'
					));
				?>
				</nav>
				<a id="show" class="menu-strip visible-xs visible-sm visible-md" href="#">
					<span class="menu_title">
						<?php echo _e('Menu','oyetheme'); ?>
					</span>
					<i class="iconc-hamburger-menu"></i>
				</a>
				<div class="lang_switcher<?php echo !in_array( $pageSlug, $hideMenuOn ) ? ' hidden-xs hidden-sm hidden-md' : ''; ?>">
					<a class="language-select-a" id="language-select-a">
						<img src="<?php echo $curr_lang[ 'country_flag_url' ]; ?>" />
					</a>
					<div class="ul-wrapper">
						<ul>
							<?php languages_list(); ?>
						</ul>
					</div>
				</div>
		</div>
		<div class="submenu-overlay"></div>
	</header>
