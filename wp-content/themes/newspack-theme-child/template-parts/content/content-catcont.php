<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newspack
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	

	<div class="entry-container">
		<?php
		if ( 'page' !== get_post_type() ) :
			if ( function_exists( 'newspack_get_all_sponsors' ) && newspack_get_all_sponsors( get_the_id(), 'native', 'post' ) ) :
				newspack_sponsor_label( get_the_id() );
			elseif ( ! is_archive() ) :
				newspack_categories();
			endif;
		endif;
		?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		


		<?php if ( 'page' !== get_post_type() ) : ?>
			<?php if ( function_exists( 'newspack_get_all_sponsors' ) && newspack_get_all_sponsors( get_the_id(), 'native', 'post' ) ) : ?>
				<div class="entry-meta entry-sponsor">
					<?php newspack_sponsor_logo_list( get_the_id() ); ?>
					<span>
						<?php
							newspack_sponsor_byline( get_the_id() );
							newspack_posted_on();
							do_action( 'newspack_theme_entry_meta' );
						?>
					</span>
				</div>
			<?php else : ?>
				<div class="entry-meta">
					<?php
						newspack_posted_by();
						newspack_posted_on();
						do_action( 'newspack_theme_entry_meta' );
					?>
				</div><!-- .meta-info -->
			<?php endif; ?>
		<?php endif; ?>
		<div class="postImage"><?php the_post_thumbnail(); ?></div>
		
		<?php //newspack_post_thumbnail(); ?>

		<div class="entry-content">
			<div class="cont-area" style="width:70%; float:left;"><?php the_content(); ?>
			
			<?php
				$posttags = get_the_tags();
				if ($posttags) {
				  foreach($posttags as $tag) {
					echo $tag->name . ' '; 
				  }
				}
				?>
			</div>
			<div class="sidebarArea"  style="width:30%; float:left; padding-left:20px; box-sizing: border-box;">
			
			
			<h2>Recent Posts</h2>
				<ul>
				<?php
					$args = array( 'numberposts' => '5' );
					$recent_posts = wp_get_recent_posts( $args );

					foreach( $recent_posts as $recent ){
						echo '<li> <a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .    $recent["post_title"].'</a> </li> ';
					}
				?>
				</ul>

			
			<?php get_sidebar(); ?>
			
			</div>
		</div><!-- .entry-content -->
	</div><!-- .entry-container -->
</article><!-- #post-${ID} -->

