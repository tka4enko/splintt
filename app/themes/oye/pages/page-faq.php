<?php
/*
 * Template Name: Page FAQ
 */

get_header();

$page_id = $post->ID;


//$counter = 1;

$cat_args_questions = array(
    'orderby' => 'term_id',
    'order' => 'ASC',
    'hide_empty' => true,
);

$terms_questions = get_terms('veelgestelde_vragen_category', $cat_args_questions);

$questions = array();


foreach ($terms_questions as $key => $value) {
    $questions_args = array(
        'post_type' => 'veelgestelde_vragen',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
//        'suppress_filters' => false,
        'status' => 'published',
        'tax_query' => array(
            array(
                'taxonomy' => 'veelgestelde_vragen_category',
                'field' => 'slug',
                'terms' => array($value->slug)
            ),
        ),
    );
    $questions[$value->slug] = get_posts($questions_args);
}
?>
<div class="faqCt" id="main">

    <!-- Used on contact, Wij-zijn-de-splinters, Werken-bij Overview, Portfolio Overview, FAQ Overview -->
    <div id="main-inner">

        <?php echo do_shortcode("[header_shortcode class='' page_id='$post->ID']"); ?>

        <div class="main-content">
            <div class="faq-posts">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center faq-filter">
                            <ul class="list font-soho-medium  hidden-xs hidden-sm">
                                <li class="active"><span class="bound" id="all"><?php echo _e('Alles', 'oyetheme'); ?></span></li>
                                <?php foreach ($terms_questions as $key => $value) {
                                    ?>
                                    <li><span class="bound" id="category-<?php echo $value->slug; ?>"><?php echo $value->name; ?></span></li>
                                    <?php
                                }
                                ?>
                            </ul>

                            <select class="font-soho-medium category-selector" data-toggle="jquery-nice-select">
                                <option class="bound" value="all"><?php echo _e('Alles', 'oyetheme'); ?></option>
                                <?php foreach ($terms_questions as $key => $value) {
                                    ?>
                                    <option class="bound" value="category-<?php echo $value->slug; ?>"><?php echo $value->name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php
                    // echo getportfolios(0);
                    $upper_counter = 1;
                    foreach ($questions as $key => $value) {
                        $taxonomy_object = get_term_by('slug', $key, 'veelgestelde_vragen_category');
                        $category_color = get_term_meta($taxonomy_object->term_id, 'oyemetatpl_veelgestelde_vragen_color');
                        $category_color = $category_color[0];
                        $category_class .= ' category-' . $key;
                        ?>
                    
                    
                        <div class="splintt-cut top-left bottom-right wrapper-box all<?php echo $category_class;?> faq-box">
							<div class="splintt-cut-section-top">
								<div class="splintt-cut-mask">
									<div class="splintt-cut-background" style="background-color:<?php echo $category_color;?>"></div>
								</div>
							</div>

							<div class="splintt-cut-content" style="background-color:<?php echo $category_color;?>">
								<h2 class="category-title">
                                    <?php echo $taxonomy_object->name; ?>
                                </h2>

                                <div class="check-clippath cut-left-top">
                                    <div id="accordion-<?php echo $key; ?>" role="tablist" aria-multiselectable="true">
                                        <?php
                                        $lower_counter = 1;
                                        foreach ($value as $k => $v) {
                                            $active = '';
                                            $active_parent = '';
                                            $lower_active = false;
                                            if ($upper_counter == 1 && $lower_counter == 1) {
                                                $active = ' in';
                                                $active_parent = ' white';
                                            }
                                            ?>
                                            <div class="card<?php echo $active_parent; ?>" id="<?php echo $v->post_name; ?>">
                                                <div class="card-header" role="tab" id="heading-<?php echo $key; ?>-<?php echo $k; ?>">
                                                    <h3 class="mb-0 font-calibri">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $key; ?>-<?php echo $k; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $key; ?>-<?php echo $k; ?>">
                                                            <?php echo $v->post_title; ?>
                                                            <i class="iconc-arrow"></i>
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div id="collapse-<?php echo $key; ?>-<?php echo $k; ?>" class="collapse<?php echo $active; ?>" role="tabpanel" aria-labelledby="heading-<?php echo $key; ?>-<?php echo $k; ?>">
                                                    <div class="card-block font-calibri">
                                                        <?php echo apply_filters('the_content', $v->post_content); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $lower_counter ++;
                                        }
                                        $category_class = '';
                                        ?>
                                    </div>
                                </div>
							</div>

							<div class="splintt-cut-section-bottom">
								<div class="splintt-cut-mask">
									<div class="splintt-cut-background" style="background-color:<?php echo $category_color;?>"></div>
								</div>
							</div>
						</div>
                    <?php
                        $upper_counter ++;
                    }
                    ?>         
                </div>
            </div>
        </div>        
        <?php echo do_shortcode("[footer_shortcode bgimage='' class='' page_id='$page_id']"); ?>
    </div>
</div>

<?php get_footer(); ?>
