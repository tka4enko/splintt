<?php

/*
	Template Name: Page demo
*/

get_header();

?>

<div id="main">
	<div id="main-inner">
		<div class="home-header header-style1">
			<div class="header-inner" style="background-image: url('<?php echo get_template_directory_uri() ?>/images/demo/header-home.jpg');"></div>
			<div class="overlay-design" style="background-image: url('<?php echo get_template_directory_uri() ?>/images/demo/home-pattern.png');"></div>
			<div class="overlay-shadow visible-xs"></div>
		</div>

		<div class="portfolio-header header-style2">
			<div class="header-inner" style="background-image: url('<?php echo get_template_directory_uri() ?>/images/demo/header-portfolio.jpg');"></div>
			<div class="overlay-design"></div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
<?php get_footer(); ?>