<?php
/*
Plugin Name: internals-tags
Description:  Tags use internals.
Version:      0.0.1
Author:       El Universo
*/

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}


function internal_tags_menu() {
	add_options_page( 'Options Terminos Internos', 'Options Terminos Internos', 'manage_options', 'internal-tags', 'internal_tags_includer_opciones' );
}
add_action( 'admin_menu', 'internal_tags_menu' );
 

function internal_tags_includer_opciones() {
  include("admin/config.php");
}