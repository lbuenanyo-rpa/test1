<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Newspack
 */

get_header();
?>

	<?php get_sidebar('top'); ?>

	<section id="primary" class="content-area <?php echo esc_attr( newspack_get_category_tag_classes( get_the_ID() ) ); ?>">
		<main id="main" class="site-main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				setPostViews(get_the_ID());
				// Template part for large featured images.
				
				if ( in_array( newspack_featured_image_position(), array( 'large', 'behind', 'beside' ) ) ) :
					get_template_part( 'template-parts/post/large-featured-image' );
				else :
				?>
				
					<header class="entry-header">
						<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
					</header>

				<?php endif; ?>

				<div class="main-content">

					<?php
					if ( is_active_sidebar( 'article-1' ) ) {
						dynamic_sidebar( 'article-1' );
					}

					// Place smaller featured images inside of 'content' area.
					if ( 'small' === newspack_featured_image_position() ) :
						newspack_post_thumbnail();
					endif;

					get_template_part( 'template-parts/content/content', 'single' );

					related( array('number' =>6,'columns'=>3,'columns_medium'=>3,'columns_small'=>1,'size'=>'noticia-small') );

					newspack_previous_next();

					get_sidebar('down');

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
					//	newspack_comments_template();
					}
					
					

					?>
					
				</div><!-- .main-content -->


			
			<?php
				
				endwhile;?>
				<div id="SidHere"></div>				
				<?php get_sidebar();
			?>			

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();