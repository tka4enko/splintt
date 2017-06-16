<?php
	global $theme_opt;
	$debug = $theme_opt["is_debug"];
	$is_pageloader =  $theme_opt["is_pageloader"];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K4W6LC');</script>
<!-- End Google Tag Manager -->
<title>
	<?php
		echo wp_title('', true, 'right');
	?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" /> 
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">



<script type="text/javascript">
	var admin_ajax_url = <?php echo json_encode(admin_url('admin-ajax.php')); ?>;
	var base_url = "<?php echo site_url(); ?>";
	var theme_url = "<?php echo get_template_directory_uri() ?>";
	var edge_url = "<?php echo get_template_directory_uri() ?>/edge/";
	var edge_images_url = "<?php echo get_template_directory_uri() ?>/edge/images/";
</script>

<?php wp_head(); ?>


<?php get_template_part('favicons'); ?>

<?php echo $theme_opt['code_before_head_closingtag']; ?>

</head>