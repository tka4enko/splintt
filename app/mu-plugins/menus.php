<?php
/**
 * Plugin Name: Menus
 * Description: Registers all menus that are necessary for this website
 * Version: 1.0.0
 * Author: Webbio B.V.
 * Author URI: https://webbio.nl
 */
// Register menus
register_nav_menus(
	array(
	  'footer_menu' => __( 'Footer menu' ),
	  'legal_pages' => __( 'legal pages' )
	)
);

