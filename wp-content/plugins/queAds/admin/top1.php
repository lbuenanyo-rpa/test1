<?php


if($_POST['eu_hidden'] == 'Y') {

    $publicidad_top_1= trim($_POST['publicidad_top_1']);
    $publicidad_top_2 = trim($_POST['publicidad_top_2']);
    $habilitar_publicidad_top = trim($_POST['habilitar_publicidad_top']);
   

    update_option('publicidad_top_1', $publicidad_top_1);
    update_option('publicidad_top_2', $publicidad_top_2);
    update_option('habilitar_publicidad_top',$habilitar_publicidad_top);
?>
    <div class="updated">
      <p>
        <strong><?php _e('Configuración de guardada 🤖' ); ?></strong>
      </p>
    </div>
    <?php
} 
  $publicidad_top_1 = get_option('publicidad_top_1');
  $publicidad_top_2 = get_option('publicidad_top_2');
  $habilitar_publicidad_top=get_option('habilitar_publicidad_top');



?>


<div class="wrap">
    <?php    echo "<h2>" . __( 'Configuración Top 1', 'eu_trdom_1' ) . "</h2>"; ?>
     
    <form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="eu_hidden" value="Y">
        <hr />

        <!-- Formulario URL -->
        <?php    echo "<h4>" . __( '<h1>Bloque Top 1</h1>', 'eu_trdom_1' ) . "</h4>"; ?>
        <p><?php _e("Inserte su script/html aqui" ); ?></p>
        <textarea name="publicidad_top_1" cols="50" rows="20">
          <?php 
          echo trim(str_replace('\\','',$publicidad_top_1));
          ?>

        </textarea><p></p>
        <!-- Formulario Top 1 -->
        
        <?php    
        echo "<h4>" . __( '<h1>Bloque Top 2</h1>', 'eu_trdom_1' ) . "</h4>"; ?>
          <p><?php _e("Inserte su script/html aqui" ); ?></p>
          <textarea type="text" name="publicidad_top_2" cols="50" rows="20">
          <?php 
          echo trim(str_replace('\\','',$publicidad_top_2));
          ?>

          </textarea>
        <!-- Formulario   Top 2 -->

        <?php
          $options = get_option('habilitar_publicidad_top');
          $checked = ($options == 'true' ? ' checked="checked"' : '');
          echo "<h4>" . __( 'Activar Bloques publicitarios', 'eu_trdom_1' ) . "</h4>";
          echo "<input id='plugin_checkbox' name='habilitar_publicidad_top' type='checkbox' value='true' {$checked} />";
        ?>
       
        <!-- Botón Enviar -->
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Guardar', 'eu_trdom_1' ) ?>" />
        </p>


    </form>
    
</div>


