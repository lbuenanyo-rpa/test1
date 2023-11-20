<?php 

/*
Plugin Name: Custom Countdown branded
Description:  Custom Countdown branded.
Version:      0.0.1
Author:       El Universo
*/

include('admin/config.php');


add_action( 'admin_menu', 'branded_eucountdown_add_admin_menu' );
add_action( 'admin_init', 'branded_eucountdown_settings_init' );


function branded_eucountdown_add_admin_menu(  ) { 

	add_menu_page( 'Branded Countdown', 'Branded Countdown', 'manage_options', 'branded_eucountdown', 'branded_eucountdown_options_page' );

}


add_action( 'wp_enqueue_scripts', 'customCountdown' );
function customCountdown() {
    wp_enqueue_script( 'custom-countdown', plugins_url( '/js/simplyCountdown.min.js?=199109' , __FILE__ ), array( 'jquery' ), '1.0', true );
    wp_register_style( 'custom-countdown', plugins_url('/css/style.css', __FILE__) );
    wp_enqueue_style( 'custom-countdown' );
}

// function add_async_attribute($tag, $handle) {	
// 	$scripts_to_async = array('custom-countdown');
// 	if (in_array($handle, $scripts_to_async)){
// 		return str_replace(' src', ' async="async" src', $tag);
// 	}else{
// 		return $tag;
// 	}
// }

// add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
