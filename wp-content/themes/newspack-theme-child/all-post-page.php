<?php
/**
 * Template Name: All Post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Newspack
 */

get_header();
?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main allPost">

				<div class="mvContnet buttom-gap-40">
					<?php

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						?>
						
						<header class="entry-header">
							<h4 class="colorGray">Categoría:</h4>
							
							<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
						</header>
					
					
					<?php
					endwhile; // End of the loop.
					
					?>
					
				</div>
				




				<ul class="post-lists" id="recentPostCount">
					
					<?php
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					
					//echo $paged;
					
					$the_query = new WP_Query(array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'paged' => $paged						
					));
						while($the_query -> have_posts()):$the_query -> the_post(); ?>
							
									
					<li id="post-<?php the_ID(); ?>" class="hasThumb status-publish" style="display:none"><div class="thumb_img"><?php
				if ( has_post_thumbnail() ){ ?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('newspack-mostimportent-image');?></a>
				<?php }else{?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/noimage.png">
					
				<?php } ?>
				</div>
				<div class="content"><h5><?php the_date(); ?></h5><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
				
				</li>		 
   

				
						<?php endwhile;	?>
					
						
				
				</ul>
				<!--nav class="navigation pagination" role="navigation" aria-label="Posts">
				<div class="nav-links">
				
				
				
			<?php /*

						$big = 999999999;
						echo paginate_links( array(
						  'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
						  'format' => '?paged=%#%',
						  'current' => max( 1, get_query_var('paged') ),
						  'total' => $the_query->max_num_pages,
						  'prev_text' => '&laquo;',
						  'next_text' => '&raquo;'
						) );	
							
					
						
			*/		
			?>
			</div>
			</nav-->
			<?php wp_reset_postdata(); ?>
				<p class="text-center viewMoreBtn" style="display:none;"><a href="#" class="button"><?php echo esc_html__( 'Ver más', 'newspack' ); ?></a></p>
		</main><!-- #main -->
	</section><!-- #primary -->


<script>




(function( $ ) {
  $(function() {
		$( document ).ready(function(){
			for(var j= 0; j<= 5; j++ ){
				$('#recentPostCount > li').eq(j).removeAttr("style");
			}			
		});
	  
		//var outputMax = ($('#recentPostCount > li').length)-1;
		var	outputCount = 5;
		var mVersion;
      

        $( window ).scroll(function() {			
		   
          //$output.html( scrolling );
		  console.log('Serolling')
		  console.log(jQuery(window).scrollTop() + " => " + (jQuery(document).height() - (jQuery(window).height()*2)) );
          clearTimeout( $.data( this, "scrollCheck" ) );
          $.data( this, "scrollCheck", setTimeout(function() {
            //$output.html( stopped );
			console.log('stop')
			
			
			if(jQuery(window).scrollTop() >  (jQuery(document).height() - (jQuery(window).height()*2) ))
				{
					
					for (var i= outputCount; i<= (outputCount + 5); i++  ){
						$('#recentPostCount > li').eq(i).removeAttr("style");
					}			
					
					outputCount = outputCount + 5 ;
				}
			
          }, 250) );

        });

  });

})( jQuery );

</script>


	

<?php
get_footer();