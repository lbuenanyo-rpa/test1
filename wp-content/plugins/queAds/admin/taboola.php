<?php


if($_POST['eu_hidden'] == 'Y') {

    $text_taboola_before= trim($_POST['text_taboola_before']);
    $text_taboola_after = trim($_POST['text_taboola_after']);
    $enable_taboola_featured = trim($_POST['enable_taboola_featured']);
   

    update_option('text_taboola_before', $text_taboola_before);
    update_option('text_taboola_after', $text_taboola_after);
    update_option('enable_taboola_featured',$enable_taboola_featured);
?>
    <div class="updated">
      <p>
        <strong><?php _e('Configuración de Scripts guardada 🤖' ); ?></strong>
      </p>
    </div>
    <?php
} 
  $text_taboola_before = get_option('text_taboola_before');
  $text_taboola_after = get_option('text_taboola_after');
  $enable_taboola_featured=get_option('enable_taboola_featured');



?>


<div class="wrap">
    <?php    echo "<h2>" . __( 'Configuración Taboola', 'eu_trdom_1' ) . "</h2>"; ?>
     
    <form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="eu_hidden" value="Y">
        <hr />

        <!-- Formulario URL -->
        <?php    echo "<h4>" . __( 'Script Antes ⬆️ de las 6 notas relacionadas', 'eu_trdom_1' ) . "</h4>"; ?>
        <p><?php _e("Inserte su script/html aqui" ); ?></p>
        <textarea name="text_taboola_before" cols="50" rows="20">
          <?php 
          echo trim(str_replace('\\','',$text_taboola_before));
          ?>

        </textarea><p></p>
        <!-- Formulario Imagen Mobile -->
        
        <?php    
        echo "<h4>" . __( 'Script Después  ⬇️ de las 6 notas relacionadas', 'eu_trdom_1' ) . "</h4>"; ?>
          <p><?php _e("Inserte su script/html aqui" ); ?></p>
          <textarea type="text" name="text_taboola_after" cols="50" rows="20">
          <?php 
          echo trim(str_replace('\\','',$text_taboola_after));
          ?>

          </textarea>
        <!-- Formulario Activar Banner -->

        <?php
          $options = get_option('enable_taboola_featured');
          $checked = ($options == 'true' ? ' checked="checked"' : '');
          echo "<h4>" . __( 'Activar Bloques publicitarios', 'eu_trdom_1' ) . "</h4>";
          echo "<input id='plugin_checkbox' name='enable_taboola_featured' type='checkbox' value='true' {$checked} />";
        ?>
       
        <!-- Botón Enviar -->
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Guardar', 'eu_trdom_1' ) ?>" />
        </p>


    </form>
    
</div>


