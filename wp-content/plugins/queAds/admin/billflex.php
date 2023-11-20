<?php


if($_POST['eu_hidden'] == 'Y') {

    $publicidad_billboard= trim($_POST['publicidad_billboard']);
    $publicidad_multiflex = trim($_POST['publicidad_multiflex']);
    $habilitar_publicidad_multiflex = trim($_POST['habilitar_publicidad_multiflex']);
   

    update_option('publicidad_billboard', $publicidad_billboard);
    update_option('publicidad_multiflex', $publicidad_multiflex);
    update_option('habilitar_publicidad_multiflex',$habilitar_publicidad_multiflex);
?>
    <div class="updated">
      <p>
        <strong><?php _e('Configuración de guardada 🤖' ); ?></strong>
      </p>
    </div>
    <?php
} 
  $publicidad_billboard = get_option('publicidad_billboard');
  $publicidad_multiflex = get_option('publicidad_multiflex');
  $habilitar_publicidad_multiflex=get_option('habilitar_publicidad_multiflex');



?>


<div class="wrap">
    <?php    echo "<h2>" . __( 'Configuración Billboard y Multiflex', 'eu_trdom_1' ) . "</h2>"; ?>
     
    <form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="eu_hidden" value="Y">
        <hr />

        <!-- Formulario URL -->
        <?php    echo "<h4>" . __( '<h1>Bloque Billboard</h1>', 'eu_trdom_1' ) . "</h4>"; ?>
        <p><?php _e("Inserte su script/html aqui" ); ?></p>
        <textarea name="publicidad_billboard" cols="50" rows="20">
          <?php 
          echo trim(str_replace('\\','',$publicidad_billboard));
          ?>

        </textarea><p></p>
        <!-- Formulario Top 1 -->
        
        <?php    
        echo "<h4>" . __( '<h1>Bloque Multiflex</h1>', 'eu_trdom_1' ) . "</h4>"; ?>
          <p><?php _e("Inserte su script/html aqui" ); ?></p>
          <textarea type="text" name="publicidad_multiflex" cols="50" rows="20">
          <?php 
          echo trim(str_replace('\\','',$publicidad_multiflex));
          ?>

          </textarea>
        <!-- Formulario   Top 2 -->

        <?php
          $options = get_option('habilitar_publicidad_multiflex');
          $checked = ($options == 'true' ? ' checked="checked"' : '');
          echo "<h4>" . __( 'Activar Bloques publicitarios', 'eu_trdom_1' ) . "</h4>";
          echo "<input id='plugin_checkbox' name='habilitar_publicidad_multiflex' type='checkbox' value='true' {$checked} />";
        ?>
       
        <!-- Botón Enviar -->
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Guardar', 'eu_trdom_1' ) ?>" />
        </p>


    </form>
    
</div>


