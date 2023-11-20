<?php


if($_POST['eu_hidden'] == 'Y') {

    $link_url = $_POST['acortada_url_featured'];
    $image_url_mobile_featured = $_POST['imagen_url_mobile'];
    $enable_ads_featured = $_POST['enable_ads_featured'];
    update_option('acortada_url_featured', $link_url);
    update_option('image_url_mobile_featured', $image_url_mobile_featured);
    update_option('enable_ads_featured',$enable_ads_featured);

?>
    <div class="updated">
      <p>
        <strong><?php _e('Configuración guardada' ); ?></strong>
      </p>
    </div>
    <?php
} 
  $link_acortada_featured = get_option('acortada_url_featured');
  $image_url_mobile_featured = get_option('image_url_mobile_featured');
  $enable_ads_featured=get_option('enable_ads_featured');

?>


<div class="wrap">
    <?php    echo "<h2>" . __( 'Configuración Featured', 'eu_trdom_1' ) . "</h2>"; ?>
     
    <form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="eu_hidden" value="Y">
        <hr />

        <!-- Formulario URL -->
        <?php    echo "<h4>" . __( 'Url de Banner Publicitario', 'eu_trdom_1' ) . "</h4>"; ?>
        <p><?php _e("URL Acortada: " ); ?><input type="text" name="acortada_url_featured" value="<?php echo $link_acortada_featured; ?>" size="50"><?php _e(" ej: https://bit.ly/" ); ?></p>
        <!-- Formulario Imagen Mobile -->
        <?php    echo "<h4>" . __( 'Imagen 320x250', 'eu_trdom_1' ) . "</h4>"; ?>
        <p><?php _e("Url de Imagen: " ); ?><input type="text" name="imagen_url_mobile" value="<?php echo $image_url_mobile_featured; ?>" size="50"></p>

        <!-- Formulario Activar Banner -->

        <?php
          $options = get_option('enable_ads_featured');
          $checked = ($options == 'true' ? ' checked="checked"' : '');
          echo "<h4>" . __( 'Activar Banner Featured', 'eu_trdom_1' ) . "</h4>";
          echo "<input id='plugin_checkbox' name='enable_ads_featured' type='checkbox' value='true' {$checked} />";
        ?>
       
        <!-- Botón Enviar -->
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Guardar', 'eu_trdom_1' ) ?>" />
        </p>

        <!-- Miniatura -->
        <a href="<?php echo $link_acortada_featured ?>" >
        <img src="<?php echo $link_imagen_featured ?>" />
        </a>

    </form>
    
</div>


