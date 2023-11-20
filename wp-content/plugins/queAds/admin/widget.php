<?php

$link_acortada = get_option('acortada_url');
$link_imagen = get_option('imagen_url');
$image_url_mobile = get_option('image_url_mobile');


/**
 * Registro Widget en dasboard
 */
function queNoticias_register_widget() {
  register_widget( 'queAds_widget' );
}

if (strlen($link_imagen) !=0 && strlen($image_url_mobile)!=0){
  add_action( 'widgets_init', 'queNoticias_register_widget' );
}


/**
 * Clase para crear Widget
 */
class queAds_widget extends WP_Widget {

function __construct() {
  parent::__construct(
  'queAds_widget',
  __('Que Noticias Ads Widget', ' queAds_widget_domain'),
  array( 'description' => __( 'Bloque Dinámico de Publicidad en Que Noticias', 'queAds_widget_domain' ), )
  );
}

public function widget( $args, $instance ) {
  $title = apply_filters( 'widget_title', $instance['title'] );
  echo $args['before_widget'];
  if ( ! empty( $title ) )
  echo $args['before_title'] . $title . $args['after_title'];
  if (!wp_is_mobile()){
    echo __( '<span class="mvp-ad-label">Publicidad</span>
              <div class="mvp-widget-ad left relative">
                <a href="'.get_option('acortada_url').'" target="_blank">
                  <img src="'. get_option('imagen_url') .'"/>
                </a>
              </div>'
              , 'queAds_widget_domain' );
  }else{
    echo __( '<span class="mvp-ad-label">Publicidad</span>
              <div class="mvp-widget-ad left relative">
                <a href="'.get_option('acortada_url').'" target="_blank">
                  <img src="'. get_option('image_url_mobile') .'"/>
                </a>
              </div>', 'queAds_widget_domain' );
  }
  echo $args['after_widget'];
}

public function form( $instance ) {
  if ( isset( $instance[ 'title' ] ) )
    $title = $instance[ 'title' ];
  else
  $title = __( 'Default Title', 'queAds_widget_domain' );
  }
} 
?>
