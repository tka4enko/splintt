<?php

get_header();

$overviewid = 253;
if(defined('ICL_LANGUAGE_CODE' ) && function_exists('icl_object_id')) {
    $overviewid = icl_object_id($overviewid, 'page', false, ICL_LANGUAGE_CODE);
}

echo do_shortcode("[leerplatformdata currentpost='$post->ID' overviewpage='$overviewid' class='footerbanner']");

get_footer();

?>