<div id="mvp-side-wrap" class="left relative theiaStickySidebar">
	<?php if ( is_single() || is_page() ) { ?>
		<?php if ( is_active_sidebar( 'mvp-sidebar-widget-post' ) ) { ?>
			<?php dynamic_sidebar( 'mvp-sidebar-widget-post' ); ?>
			<?php
				$post_id = get_the_ID();
				$mostrarPublicidad = get_field('mostrar_publicidad', $post_id);
				if ($mostrarPublicidad === null) {
					$mostrarPublicidad = true;
				}
			
				echo '<script>';
				echo 'var widgetContainer = document.getElementById("mvp_ad_widget-9");';
				echo '</script>';
				
				if (!$mostrarPublicidad) {
					echo '<script>';
					echo 'if (widgetContainer) { widgetContainer.style.display = "none"; }';
					echo '</script>';
					//dynamic_sidebar( 'mvp_ad_widget-4' ); // Muestra el widget de publicidad

				}
			?>
		<?php } ?>
	<?php } else { ?>
		<?php if ( is_active_sidebar( 'mvp-sidebar-widget' ) ) { ?>
			<?php dynamic_sidebar( 'mvp-sidebar-widget' ); ?>
		<?php } ?>
	<?php } ?>
</div><!--mvp-side-wrap-->