<?php

get_header();

$overviewid = 253;
if(defined('ICL_LANGUAGE_CODE' ) && function_exists('icl_object_id')) {
    $overviewid = icl_object_id($overviewid, 'page', false, ICL_LANGUAGE_CODE);
}

echo do_shortcode("[anderedata currentpost='$post->ID' overviewpage='$overviewid']");

get_footer();

?>