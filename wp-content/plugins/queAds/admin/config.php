<?php


if($_POST['eu_hidden'] == 'Y') {

    $image_url = $_POST['imagen_url'];
    $link_url = $_POST['acortada_url'];
    $image_url_mobile = $_POST['imagen_url_mobile'];
    update_option('acortada_url', $link_url);
    update_option('imagen_url', $image_url);
    update_option('image_url_mobile', $image_url_mobile);
    ?>
    <div class="updated">
      <p>
        <strong><?php _e('Configuración guardada' ); ?></strong>
      </p>
    </div>
    <?php
} 
$link_acortada = get_option('acortada_url');
$link_imagen = get_option('imagen_url');
$image_url_mobile = get_option('image_url_mobile');


?>


<div class="wrap">
    <?php    echo "<h2>" . __( 'Configuración', 'eu_trdom' ) . "</h2>"; ?>
     
    <form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="eu_hidden" value="Y">
        <hr />

        <!-- Formulario URL -->
        <?php    echo "<h4>" . __( 'Url de Banner Publicitario', 'eu_trdom' ) . "</h4>"; ?>
        <p><?php _e("URL Acortada: " ); ?><input type="text" name="acortada_url" value="<?php echo $link_acortada; ?>" size="50"><?php _e(" ej: https://bit.ly/" ); ?></p>
        <!-- Formulario Imagen Desktop -->
        <?php    echo "<h4>" . __( 'Imagen para Desktop', 'eu_trdom' ) . "</h4>"; ?>
        <p><?php _e("Url de Imagen: " ); ?><input type="text" name="imagen_url" value="<?php echo $link_imagen; ?>" size="50"></p>

        <!-- Formulario Imagen Mobile -->
        <?php    echo "<h4>" . __( 'Imagen para Mobile', 'eu_trdom' ) . "</h4>"; ?>
        <p><?php _e("Url de Imagen: " ); ?><input type="text" name="imagen_url_mobile" value="<?php echo $image_url_mobile; ?>" size="50"></p>

        <!-- Botón Enviar -->
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Guardar', 'eu_trdom' ) ?>" />
        </p>

        <!-- Miniatura -->
        <a href="<?php echo $link_acortada ?>" >
        <img src="<?php echo $link_imagen ?>" />
        </a>

    </form>
    

</div>



