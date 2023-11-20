<?php
/*
Plugin Name: QueAds
Description:  Plugin Agregar bloque de publicidad Dinámico.
Version:      0.0.1
Author:       El Universo
*/

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

function quenoticias_menu() {
	add_menu_page("QueAds","QueAds","read","quenoticias-ads");
	add_submenu_page( 'quenoticias-ads', 'Settings',						'Settings', 						'manage_options', 'que-noticias',						'quenoticias_includer_opciones' );
	add_submenu_page( 'quenoticias-ads', 'Featured',						'Featured', 						'manage_options', 'que-noticias-featured',	'quenoticias_includer_featured' );
	add_submenu_page( 'quenoticias-ads', 'Taboola',							'Taboola', 							'manage_options', 'que-noticias-taboola',		'quenoticias_includer_taboola' );
	add_submenu_page( 'quenoticias-ads', 'Top',									'Top', 									'manage_options', 'que-noticias-top',				'quenoticias_includer_top_1_2' );
	add_submenu_page( 'quenoticias-ads', 'BillBoard/Multiflex',	'BillBoard/Multiflex',	'manage_options', 'que-noticias-billboard',	'quenoticias_includer_billflex' );
	remove_submenu_page("quenoticias-ads","quenoticias-ads");
}
add_action( 'admin_menu', 'quenoticias_menu' );

function quenoticias_settings_page($links){
  $url = admin_url( 'admin.php?page=que-noticias' );
  $label = esc_html('Settings', 'quenoticias-ads');
  $links[] = "<a href='{$url}'>{$label}</a>";
  
  return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'quenoticias_settings_page');
 

function quenoticias_includer_opciones() {
  include("admin/config.php");
}

function quenoticias_includer_featured() {
  include("admin/featured.php");
}

function quenoticias_includer_taboola() {
  include("admin/taboola.php");
}

function quenoticias_includer_top_1_2() {
  include("admin/top1.php");
}


function quenoticias_includer_billflex() {
  include("admin/billflex.php");
}



$link_acortada = get_option('acortada_url');
$link_imagen = get_option('imagen_url');
$image_url_mobile = get_option('image_url_mobile');
if ($link_acortada !="" && ($link_imagen || $image_url_mobile) !=""){

    include("admin/widget.php");

}