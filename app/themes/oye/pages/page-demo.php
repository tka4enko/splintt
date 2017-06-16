<?php

/*
  Template Name: Page demo
 */

get_header();

$demometa = get_post_meta($post->ID,'demo',true);
//var_dump($demometa);
$counter = 0;
$featureCounter = 0;
$class = '';
$color = '';
?>

<div class="demoCt" id="main">
	<div class="inner" id="main-inner">
		<?php
			echo do_shortcode("[header_shortcode class='' page_id='$post->ID' button='Contact']");
		?>
		
		<div class="main-content">
                    <div class="container">
                        <div class="row">
                            <?php 
								for ($i = 0; $i < count($demometa); $i++){
                                        $mainImg = wp_get_attachment_url(intval($demometa[$i]['afbeelding'][0]));

                                        switch($demometa[$i]['kleur_blok']){
                                            case '0': 
                                                $color = '#0063a5';
                                                break;
                                            case '1': 
                                                $color = '#009fe3';
                                                break;
                                            case '2': 
                                                $color = '#3d8a46';
                                                break;
                                            case '3': 
                                                $color = '#9ebf43';
                                                break;
                                        }

                                        $title = $demometa[$i]['titel'];

                                        $counter % 2 == 0 ? $class = 'left-box' : $class = 'right-box';
                                        $class == 'left-box' ? $degrees = '63deg' : $degrees = '118deg';

                                        $content = $demometa[$i]['beschrijving'];

                                        ?><div class="col-sm-6 col-xs-12 nopadding">
                                            <div class="<?php echo $class;?> check-clippath has-clippath matchHeight" style="background: linear-gradient(<?php echo $degrees; ?>, transparent 50px, <?php echo $color; ?> 0);background: -webkit-linear-gradient(<?php echo $degrees; ?>, transparent 50px, <?php echo $color; ?> 0);background: -o-linear-gradient(<?php echo $degrees; ?>, transparent 50px, <?php echo $color; ?> 0);background: -moz-linear-gradient(<?php echo $degrees; ?>, transparent 50px, <?php echo $color; ?> 0);background: -ms-linear-gradient(<?php echo $degrees; ?>, transparent 50px, <?php echo $color; ?> 0);">
                                                <img src="<?php echo $mainImg; ?>">
                                                <h2 class="title"><?php echo $title; ?></h2>
                                                <p class="content"><?php echo $content; ?></p>

                                                <div class="row">
                                             <?php for($j = 0; $j < count($demometa[$i]['feature']); $j++){
                                                if($j == 0){
                                                    echo '<div class="col-md-6 col-xs-12 left"> '
                                                            . '<div class="features">';
                                                }
                                                if($j == round(count($demometa[$i]['feature'])/2)){
                                                    echo '</div>'
                                                    . '</div>';
                                                    echo '<div class="col-md-6 col-xs-12 right"> '
                                                            . '<div class="features">';
                                                }

                                                $featureIcon = wp_get_attachment_url(intval($demometa[$i]['feature'][$j]['icoon'][0]));
                                                $featureTitle = $demometa[$i]['feature'][$j]['tekst'];

                                                ?><div class="feature-item">
                                                       <div class="feature-img">
                                                           <img src="<?php echo $featureIcon; ?>">
                                                       </div>
                                                       <p><?php echo $featureTitle; ?></p>
                                                  </div>

                                                <?php if($j == count($demometa[$i]['feature'])-1){
                                                    echo '</div>'
                                                    . '</div>';
                                                }
                                        }
                                            ?></div>

                                            <a href="<?php echo $demometa[$i]['url']; ?>" class="btn btn-nobg btn-box" target="_blank"><?php echo $demometa[$i]['url_text']; ?><i class="iconc-arrow-button"></i></a>
                                                
                                            </div>
                                        </div>

                                        <?php $counter++;
                                }?>
                        </div>
                    </div>
		</div>
		<?php echo do_shortcode("[footer_shortcode class='has-content' page_id='$post->ID']"); ?>

	</div>
</div>
<?php get_footer(); ?>
