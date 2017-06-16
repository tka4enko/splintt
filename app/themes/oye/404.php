<?php

get_template_part('head');

global $theme_opt;

$error_style_pagebg =  $theme_opt["error-style-pagebg"];
$error_style_textcolor	=  $theme_opt["error-style-textcolor"];
$error_style_buttonbg =	 $theme_opt["error-style-buttonbg"];
$error_style_buttontextcolor =  $theme_opt["error-style-buttontextcolor"];
$error_style_buttonbghover	=  $theme_opt["error-style-buttonbghover"];
$error_style_buttontextcolorhover =	  $theme_opt["error-style-buttontextcolorhover"];
  
?>

<body <?php body_class(); ?>>

<?php echo $theme_opt['code_after_body_starttag']; ?>

<div class="page404">
	<div class="page404-inner">
			<?php if (!empty($error_image)): ?>
				<img src="<?php echo $error_image; ?>" />
			<?php endif; ?>
	  		<div class="oops" ><?php echo _e('Helaas.. de opgevraagde pagina bestaat niet.','oyetheme'); ?></div>
	  		<a href="<?php echo site_url(); ?>" class="btn"><?php echo _e('Naar homepage','oyetheme'); ?></a>
		</div>
	</div>
</div>

<style type="text/css">
	html, body {
		margin:0;
		opacity: 1 !important;
		height: 100%;
		width: 100%;
		overflow: hidden;
	}

	.page404 {
		display: table;
		width: 100%;
  		height: 100%;
		padding: 30px 10px;
		background-color: <?php echo $error_style_pagebg ?>;
	}
	.page404-inner {
	    display: table-cell;
    	width: 100%;
    	vertical-align: middle;
  		text-align: center;
		color: <?php echo $error_style_textcolor ?>;
		font-size: 50px;
		font-family: 'Open Sans', sans-serif;
	}
	
	.page404-inner a {
		margin-top: 50px;
	    padding: 8px 20px;
	    border: 1px solid #fff;
	    border-radius: 6px;
        font-size: 18px;
	    text-decoration: none;
	    background-color: <?php echo $error_style_buttonbg; ?>;
	    color : <?php echo $error_style_buttontextcolor; ?>;
		font-family: 'Open Sans', sans-serif;
		height: auto;
	}

	.page404-inner a:hover {
		color : <?php echo $error_style_buttontextcolorhover; ?>;
		background-color: <?php echo $error_style_buttonbghover; ?>;
	}
	
	@media screen and (max-width: 991px) {
		.page404-inner{
			font-size: 32px;
		}
	}

	@media screen and (max-width: 767px) {
		.page404-inner img {
			width: 60%;
		}
	}

</style>

</body>
</html>