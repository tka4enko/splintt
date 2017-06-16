<?php $categories = get_terms('cookie_manager_cat', array('orderby'=>'slug','order'=>'DESC')); $catcount = 1; ?>
<div id="cookie-popup">
    <a href="javascript:void(0);" class="cookie-popup_close popup-close-btn"></a>
	<h3 class="cookie-heading"><?php echo _e('onze cookies.','oyetheme'); ?></h3>
    <div class="cookie-top">
<?php echo _e('Onze website maakt gebruik van cookies. We doen dit om de prestaties van onze website te optimaliseren en in staat zijn om onze diensten en marketing aan te passen aan onze bezoekers. Accepteert u dat wij plaatsen deze cookies? Bekijk ons ​​<a href="'.site_url("privacy-statement").'">privacybeleid</a> voor meer informatie over de specifieke cookies plaatsen we.','oyetheme'); ?>
</div>

    <div id="cookie-accordian">
		<ul class="cookie-accordian-inner">
			<?php foreach ($categories as $category) {
				$activeclass = $catcount == 1 ? 'active' : '';
				echo '<li class='.$activeclass.'>
					<label><input type="radio" name="slide-cookie" value="'.$category->term_id.'"><span>'.$category->name.'</span></label>
					<ul class="slide">
						<li>'.$category->description.'</li>
					</ul>
				</li>';
				
				$catcount++;
			} ?>
		</ul>
	</div>

	<div class="cookie-bottom">
		<span class="cookies-btn"><a class="btn btn-white cookies-btn-link" href="javascript:void(0);" target="_self" hreflang="en"><?php echo _e('NIET MEER TONEN','oyetheme'); ?></a></span>
	</div>
</div>

<div id="cookie-strip" style="display: none;">
	<div class="cookie-strip-inner">
	<?php echo _e('We use','oyetheme'); ?> <a class="show-cookie-popup" href="javascript:void(0);"><?php echo _e('cookies.','oyetheme'); ?></a> <a class="cookie-accept-btn" href="javascript:void(0);"><?php echo _e('I agree','oyetheme'); ?></a>
	</div>
	<a href="javascript:void(0);" class="popup-strip-btn popup-close-btn"></a>
</div>