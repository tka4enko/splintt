<?php

	global $theme_opt;
	$oldbrowser_chrome_image	=  $theme_opt["oldbrowser-chrome-image"];
	$oldbrowser_chrome_downloadlink	=  $theme_opt["oldbrowser-chrome-downloadlink"];
	$oldbrowser_firefox_image =	 $theme_opt["oldbrowser-firefox-image"];
	$oldbrowser_firefox_downloadlink =  $theme_opt["oldbrowser-firefox-downloadlink"];
	$oldbrowser_ie_image	=  $theme_opt["oldbrowser-ie-image"];
	$oldbrowser_ie_downloadlink =	  $theme_opt["oldbrowser-ie-downloadlink"];
	$oldbrowser_style_pagebg =	  $theme_opt["oldbrowser-style-pagebg"];
	$oldbrowser_style_textcolor =	  $theme_opt["oldbrowser-style-textcolor"];

?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="robots" content="noindex,nofollow">

	<?php echo $theme_opt['code_before_head_closingtag']; ?>
</head>

<body>

	<?php echo $theme_opt['code_after_body_starttag']; ?>

	<div id="oldbrowser" class="container-fluid"> 
		<div id="oldbrowser-inner">
			<div class="oopstitle">
				<?php echo _e('Oeps.. je browser is écht aan vernieuwing toe.','oyetheme'); ?> 
			</div>
			
			<div class="download_hier">
				<?php echo _e('Download hier de meest recente versie:','oyetheme'); ?> 
			</div>

			<div class="row-fluid downloadrow">
				<div class="col-md-4">
					<a href="<?php echo $theme_opt["oldbrowser-chrome-downloadlink"]; ?>"> <img src="<?php global $theme_opt; echo '' . $theme_opt['oldbrowser-chrome-image']['url'];?>" /></a>
				</div>
				<div class="col-md-4">
					<a href="<?php echo $theme_opt["oldbrowser-firefox-downloadlink"]; ?>"> <img src="<?php global $theme_opt; echo '' . $theme_opt['oldbrowser-firefox-image']['url'];?>" /></a>
				</div>
				<div class="col-md-4">
					<a href="<?php echo $theme_opt["oldbrowser-ie-downloadlink"]; ?>"> <img src="<?php global $theme_opt; echo '' . $theme_opt['oldbrowser-ie-image']['url'];?>" /></a>
				</div>
			</div>
		</div>
	</div>

	<style type="text/css">
		html, body {
			margin:0;
			opacity: 1 !important;
			height: 100%;
			width: 100%;
		}

		.col-md-4 {
			float: left;
			width: 33%;
		}

		#oldbrowser {
			display: table;
			width: 100%;
			height: 100%;
			background-color: <?php echo $oldbrowser_style_pagebg ?>;
			font-family: Arial;
		}

		#oldbrowser-inner {
			display: table-cell;
			padding: 30px 10px;
			width: 100%;
			vertical-align: middle;
			text-align: center;
			color: <?php echo $oldbrowser_style_textcolor ?>;
		}

		#oldbrowser .oopstitle {
			padding: 0 20px;
			text-align: center;
			font-size: 50px;
			font-family: 'Open Sans', sans-serif;
		}


		#oldbrowser .download_hier {
			margin: 10% 0% 2% 0;
			text-align: center;
			font-size: 22px;
			font-family: 'Open Sans', sans-serif;
		}


		@media screen and (max-width: 991px) {
			.col-md-4 {
				float: none;
				width: 100%;
			}
			#oldbrowser .oopstitle {
				font-size: 32px;
			}
		}

		@media screen and (max-width: 767px) {
			.downloadrow img {
				width: 50%;
			}
		}


		@media screen and (max-width: 480px) {
			#oldbrowser .oopstitle {
				font-size: 24px;
			}

			#oldbrowser .download_hier {
				font-size: 20px;
			}
		}

	</style>

</body>
</html>