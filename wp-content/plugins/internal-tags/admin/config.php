<?php


if(isset($_POST['termino_excl']) && $_POST['termino_excl']){
$termino_excl = $_POST['termino_excl'];

    update_option('termino_excl', $termino_excl);
    ?>
    <div class="updated">
      <p>
        <strong><?php _e('Configuración guardada ' . stripslashes($termino_excl) ); ?></strong>
      </p>
    </div>
    <?php
}
    
 
// echo var_dump(get_term_by('slug', 'feed', 'post_tag'));

?>


<div class="wrap">
    <?php    echo "<h2>" . __( 'Configuración', 'eu_trdom' ) . "</h2>"; ?>
     
    <form name="term_excl_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
         <hr />
        <!-- Formulario Imagen Mobile -->
        <?php    echo "<h4>" . __( 'Terminos a excluir', 'eu_trdom' ) . "</h4>"; ?>
        <p><?php _e("Slug de terminos a excluir: " ); ?><textarea type="text" name="termino_excl" rows="4" cols="50"><?php  echo stripslashes(get_option('termino_excl'));   ?></textarea></p>

        <!-- Botón Enviar -->
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Guardar', 'eu_trdom' ) ?>" />
        </p>
    </form>
    

</div>

<hr>

<?php
if(isset($_POST['form-exclude-tags-value']) && $_POST['form-exclude-tags-value']){
  $formexcludetags = $_POST['form-exclude-tags-value'];

      update_option('form-exclude-tags', $formexcludetags);
      ?>
      <div class="updated">
        <p>
          <strong><?php _e('Configuración de Tags excluidos guardada '); ?></strong>
        </p>
      </div>
      <?php
  }
      
   
?>

<div class="wrap">
    <?php    echo "<h2>" . __( 'Configuración', 'eu_trdom_tag' ) . "</h2>"; ?>
     
    <form name="tags_exclude_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
         <hr />
        <?php    echo "<h4>" . __( 'Tags a excluir (IDs separados por comas)', 'eu_trdom_tag' ) . "</h4>"; ?>
        <p><textarea type="text" name="form-exclude-tags-value" rows="4" cols="50"><?php  echo get_option('form-exclude-tags');   ?></textarea></p>
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Guardar', 'eu_trdom' ) ?>" />
        </p>
    </form>
    

</div>