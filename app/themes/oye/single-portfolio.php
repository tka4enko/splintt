<?php

get_header();

$overviewid = 493;
if(defined('ICL_LANGUAGE_CODE' ) && function_exists('icl_object_id')) {
    $overviewid = icl_object_id($overviewid, 'page', false, ICL_LANGUAGE_CODE);
}

$overviewid = $_GET['cpage'] ? $_GET['cpage'] : $overviewid;

echo do_shortcode("[portfoliodata currentpost='$post->ID' overviewpage='$overviewid']");

get_footer();

?>