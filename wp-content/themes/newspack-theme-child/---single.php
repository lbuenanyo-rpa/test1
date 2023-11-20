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
						//dynamic_sidebar( 'article-1' );
					}

					// Place smaller featured images inside of 'content' area.
					if ( 'small' === newspack_featured_image_position() ) :
						newspack_post_thumbnail();
					endif;

					get_template_part( 'template-parts/content/content', 'single' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
					//	newspack_comments_template();
					}
					
					

					?>
					
				</div><!-- .main-content -->


			
			<?php
				$categories = get_the_category();
				$currentPostId = get_the_ID();
				endwhile;?>
				<div id="SidHere"></div>				
				<?php get_sidebar();
			?>
			
			
			
			
			<?php	
			$slug = esc_html( $categories[0]->slug);
			
			$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'post__not_in' => array( $currentPostId, ),
			'category_name' => $slug ,
			'posts_per_page' => 10,
			'offset' => 1
);
$arr_posts = new WP_Query( $args ); 
$the_count = $arr_posts->found_posts;	

if( $the_count > 1 ){
?>
			
			
					
			
	<div class="relared_post_area">		
			<?php if ( ! empty( $categories ) ) {  ?>
					
					<h3 class="catagory-title" id="readMostpost"><?php //echo esc_html( $categories[0]->name );?>  SIGUE LEYENDO</h3>   
				<?php } ?>
	<ul class="post-lists" id="relatePostCount">		
			


 <?php
if ( $arr_posts->have_posts() ) :
 
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>
		
		
		<li class="hasThumb_11 post status-publish inViewPort" style="display:none;" data-url="<?php the_permalink(); ?>">
		<!--div class="thumb_img"><?php /*
            if ( has_post_thumbnail() ) :
                the_post_thumbnail('newspack-mostimportent-image');
            endif;
            */?></div -->
		<div class="content">
		<!--span class="mobile-date-hide"><?php //echo get_the_date()  ?></span-->
		<h2 class="entry-title"><?php the_title(); ?></h2>
		<p><?php echo get_the_date()  ?></p>		
		<?php the_content(); ?>
		
		</div></li>
		
				
        <?php
    endwhile;
endif;
   ?>
	</ul>

</div>
<div id="relared_post_area"></div>

<?php }  ?>


<!--script src="<?php //echo get_theme_file_uri() ?>/js/isInViewport.js"></script-->

<script>

(function( $ ) {
  $(function() {
		var outputMax = ($('#relatePostCount > li').length)-1;
		var	outputCount = 0;
		var mVersion;
		var crntUrl = window.location.href;
		var SHeight = $(document).height() - $(window).height();
      

        $( window ).scroll(function() {
			
		   if($(window).width()< 760){
				mVersion = $('#relared_post_area').height();
		   }else{
				mVersion = 0;
		   }
          //$output.html( scrolling );
		  console.log('Serolling')
		  console.log(jQuery(window).scrollTop() + " => " + (jQuery(document).height() - (jQuery(window).height()*2) - mVersion ) );
          clearTimeout( $.data( this, "scrollCheck" ) );
          $.data( this, "scrollCheck", setTimeout(function() {
            //$output.html( stopped );
			console.log('stop')
			
			
			if(jQuery(window).scrollTop() >  (jQuery(document).height() - (jQuery(window).height()*2) - mVersion ))
				{
					
					/*if( outputCount >= outputMax ){
						$('#nomoreleft').show();						
					}*/
					
					$('#readMostpost').hide();
					$('#relatePostCount > li').eq(outputCount).show(300, function(){
						/*let newUrl = $(this).attr('data-url');
						setTimeout(function(){ 
							window.history.replaceState("object or string", "Title", newUrl);
						}, 500);*/
						
						
						
					});
					outputCount ++;
				}
				
				if(jQuery(window).scrollTop() > SHeight){	
					$('#relatePostCount .inViewPort').each(function() {					  
						if ($(this).isInViewport()) {
						  let newUrl = $(this).attr('data-url');	
						  window.history.pushState("object or string", "Title", newUrl);
						  
						}else{
							//window.history.replaceState("object or string", "Title", 'hello-world');						
						} 
					});
				}else{
					 window.history.pushState("object or string", "Title", crntUrl);
					 
				}
			
          }, 250) );
		  
		

        });

  });
  
  
  
  $.fn.isInViewport = function() {
	  var elementTop = $(this).offset().top;
	  var elementBottom = elementTop + $(this).outerHeight();

	  var viewportTop = $(window).scrollTop();
	  var viewportBottom = viewportTop + $(window).height();

	  return elementBottom > viewportTop && elementTop < viewportBottom;
	};

	$(window).on('resize scroll', function() {
	  
	});
  
  
  
  
  
  

})( jQuery );


	 function load() {
		 if (window.innerWidth < 960 ){
			 document.getElementById('relared_post_area').append(
				document.getElementById('secondary')
			  );
		 }/*else{
			document.getElementById('SidHere').appendAfter(
				document.getElementById('secondary')
			  );
		 }*/
       
      }
      window.onload = load;
	  window.onresize = load;
	  
	  
</script>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();