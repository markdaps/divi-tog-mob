<?php
/*
Plugin Name: Daps Divi Toggle State
Plugin URI:
Description: Changes the open toggle state to closed for mobile devices detected using wp_is_mobile on initial page load.
Version: 1.0
Author: MarkDaps
Author URI:
*/

if ( ! defined( 'WPINC' ) ) {
	 die;
}


// loads the js file if conditions met
function daps_add_scripts() {
	
	
	if ( wp_is_mobile() ) { # https://codex.wordpress.org/Function_Reference/wp_is_mobile
		
		
		$daps_any = false; // if TRUE, runs everywhere
		$daps_singular = true; # https://developer.wordpress.org/reference/functions/is_singular/
		$daps_single = false; # https://developer.wordpress.org/reference/functions/is_single/
		$daps_page = false; # https://developer.wordpress.org/reference/functions/is_page/
		
	
		if ( ($daps_any) || ($daps_singular && is_singular()) || ($daps_single && is_single('')) || ($daps_page && is_page('')) ) {
		
			wp_register_script('daps_divi_toggle_script', plugins_url('daps-toggle.js', __FILE__), array('jquery'),'', true); 
			wp_enqueue_script('daps_divi_toggle_script');
		
		} else {
			
			// nothing to do here
			
		}
	}
}

add_action( 'wp_enqueue_scripts', 'daps_add_scripts' );
