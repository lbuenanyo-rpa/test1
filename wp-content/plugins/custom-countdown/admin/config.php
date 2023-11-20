<?php


function branded_eucountdown_settings_init(  ) { 

	register_setting( 'pluginPage', 'branded_eucountdown_settings' );

	add_settings_section(
		'branded_eucountdown_pluginPage_section', 
		__( 'Configuracion para Count Down Patrocinado', 'branded_eucountdown' ), 
		'branded_eucountdown_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'branded_eucountdown_text_field_0', 
		__( 'Imagen #1', 'branded_eucountdown' ), 
		'branded_eucountdown_text_field_0_render', 
		'pluginPage', 
		'branded_eucountdown_pluginPage_section' 
	);

	add_settings_field( 
		'branded_eucountdown_text_field_0_link', 
		__( 'Link	 #1', 'branded_eucountdown' ), 
		'branded_eucountdown_text_field_0_render_link', 
		'pluginPage', 
		'branded_eucountdown_pluginPage_section' 
	);


	add_settings_field( 
		'branded_eucountdown_text_field_1', 
		__( 'Imagen #2', 'branded_eucountdown' ), 
		'branded_eucountdown_text_field_1_render', 
		'pluginPage', 
		'branded_eucountdown_pluginPage_section' 
	);

	add_settings_field( 
		'branded_eucountdown_text_field_1_link', 
		__( 'Link	 #2', 'branded_eucountdown' ), 
		'branded_eucountdown_text_field_1_render_link', 
		'pluginPage', 
		'branded_eucountdown_pluginPage_section' 
	);

	add_settings_field( 
		'branded_eucountdown_textarea_field_2', 
		__( 'Fecha límite', 'branded_eucountdown' ), 
		'branded_eucountdown_textarea_field_2_render', 
		'pluginPage', 
		'branded_eucountdown_pluginPage_section' 
	);

	add_settings_field( 
		'branded_eucountdown_checkbox_field_0', 
		__( 'Activar Countdown', 'branded_eucountdown' ), 
		'branded_eucountdown_checkbox_field_0_render', 
		'pluginPage', 
		'branded_eucountdown_pluginPage_section' 
	);


}


function branded_eucountdown_checkbox_field_0_render(  ) { 

	$options = get_option( 'branded_eucountdown_settings' );
	?>
	<input type='checkbox' name='branded_eucountdown_settings[branded_eucountdown_checkbox_field_0]' <?php checked( $options['branded_eucountdown_checkbox_field_0'], 1 ); ?> value='1'>
	<?php

}

function branded_eucountdown_text_field_0_render(  ) { 

	$options = get_option( 'branded_eucountdown_settings' );
	?>
	<input type='text' name='branded_eucountdown_settings[branded_eucountdown_text_field_0]' value='<?php echo $options['branded_eucountdown_text_field_0']; ?>'>
	<?php

}


function branded_eucountdown_text_field_1_render(  ) { 

	$options = get_option( 'branded_eucountdown_settings' );
	?>
	<input type='text' name='branded_eucountdown_settings[branded_eucountdown_text_field_1]' value='<?php echo $options['branded_eucountdown_text_field_1']; ?>'>
	<?php

}

function branded_eucountdown_text_field_0_render_link(  ) { 

	$options = get_option( 'branded_eucountdown_settings' );
	?>
	<input type='text' name='branded_eucountdown_settings[branded_eucountdown_text_field_0_link]' value='<?php echo $options['branded_eucountdown_text_field_0_link']; ?>'>
	<?php

}

function branded_eucountdown_text_field_1_render_link(  ) { 

	$options = get_option( 'branded_eucountdown_settings' );
	?>
	<input type='text' name='branded_eucountdown_settings[branded_eucountdown_text_field_1_link]' value='<?php echo $options['branded_eucountdown_text_field_1_link']; ?>'>
	<?php

}



function branded_eucountdown_textarea_field_2_render(  ) { 
	$options = get_option( 'branded_eucountdown_settings' );
	?>
   

<input type="datetime-local" id="branded_eucountdown_settings[branded_eucountdown_textarea_field_2]"
       name="branded_eucountdown_settings[branded_eucountdown_textarea_field_2]" value="<?php echo $options['branded_eucountdown_textarea_field_2']; ?>"
       min="<?php $date = date('Y-m-d');  echo $date."T00:00";?>" max="<?php $date= date ('Y-m-d',strtotime ('+3 year' , strtotime(date('Y-m-d')))); echo $date."T00:00";?>">
	<?php

}


function branded_eucountdown_settings_section_callback(  ) { 

	echo __( 'Agrege URL de las imágenes del patrocinador', 'branded_eucountdown' );

}


function branded_eucountdown_options_page(  ) { 

		?>
		<form action='options.php' method='post'>

			<h2>Agregue los patrocinadores</h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}
