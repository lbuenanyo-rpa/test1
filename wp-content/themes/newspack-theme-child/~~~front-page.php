<?php
/**
 * The template for displaying the static front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Newspack
 */

get_header();
?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

<div class="home-top-containt">
			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>

				<header class="entry-header">
					<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
				</header>
				<?php $catTop = get_field('top_category');
					 
					 $mostImportant = (get_field('most_important_title')) ? get_field('most_important_title') : 'LO MÁS IMPORTANTE';
					 $mostLatest = (get_field('most_latest_title')) ? get_field('most_latest_title') : 'LO ÚLTIMO';
					 $mostView = (get_field('most_view_title')) ? get_field('most_view_title') : 'LO MÁS LEÍDO';
					 $mostlatestLink = get_field('most_latest_link');
					 
					 
				?>

				
				<?php
				//get_template_part( 'template-parts/content/content', 'page' );

				 //the_title() ;				

			endwhile; // End of the loop.
			?>
		<?php
					
			$args = array(
				//'cat' => $catTop,
				'post_type' => 'post',
				'post_status' => 'publish',						
				'posts_per_page' => 1,
				'tax_query' => array(
					array(
						'taxonomy' => 'category', //double check your taxonomy name in you dd 
						'field'    => 'id',
						'terms'    => $catTop,
					),
				   ),
			);
$arr_posts = new WP_Query( $args );
 
if ( $arr_posts->have_posts() ) :
 
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>
        
		<div class="homeColHalf float-right homeImageArea">		
            <?php
            if ( has_post_thumbnail() ) :
                the_post_thumbnail('newspack-home-image');
            endif;
            ?>
			
			
		</div>	
		<div class="homeColHalf">
			<div class="insideContent">
			<?php $categories = get_the_category_by_ID($catTop);
				if ( ! empty( $categories ) ) {  ?>
					<h3 class="catagory-title"><?php echo esc_html( $categories );?></h3>   
				<?php } ?>
				
				
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p>por <strong><?php echo get_the_author(); ?></strong></p>
            <div class="entry-content">				

                <p><a href="<?php the_permalink(); ?>" class="button"><?php echo esc_html__( 'Leer más', 'newspack' ); ?></a></p>
				
             </div>   
            </div>
        </div>
        <?php
    endwhile;
endif;
wp_reset_postdata();
   ?>
 </div>  
		<div class="homeInsideContainer">
			<div class="mostimportant ctn-area">
				<h2 class="h1 text-center home-title"><?php echo $mostImportant ?></h2>
				<div class="mvContnet" id="mvContnet-1">
					<div class="homeColHalf homeImageSide float-right">

						<?php 
						 $argm = array(
							'post_type' => 'post',
							'posts_per_page' => 1,							
							//'meta_key' => '_most_important', 
							'meta_query' => array(
								array(
								'key' => 'most_important',
								'value' => 1,
								'compare' => '=',
								),
							) 
						 );
						 $the_most_important = new WP_Query( $argm );
						 while($the_most_important -> have_posts()):$the_most_important -> the_post(); ?>
							<?php
							if ( has_post_thumbnail() ){ ?>
								<div class="post-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('newspack-mostimportent-larg-image');?></a></div>
							<?php }
							?>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 
							
					<?php endwhile;
						wp_reset_postdata(); ?>					
					 </div>
					
					<div class="homeColHalf homeListSide">
						<ul class="post-lists">
						
							<?php 
								 $argm_1 = array(
									'post_type' => 'post',
									'posts_per_page' => 4,
									'offset' => 1,
									'meta_query' => array(
										array(
										'key' => 'most_important',
										'value' => 1,
										'compare' => '=',
										),
									) 
								 );
								 $the_most_important_1 = new WP_Query( $argm_1 );
								 while($the_most_important_1 -> have_posts()):$the_most_important_1 -> the_post(); ?>
									<li class="hasThumb"><?php
									if ( has_post_thumbnail() ){ ?>
										<div class="thumb_img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('newspack-mostimportent-image');?></a></div>
									<?php }
									?>
									<div class="content"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
									
									</li>
									
							<?php endwhile;
								wp_reset_postdata(); ?>	
						
						</ul>
					</div>
					
				</div>	
			</div>
			
			<div class="mostletest ctn-area">
				<h2 class="h1 text-center home-title"><?php echo $mostLatest ?></h2>
				<div class="mvContnet" id="mvContnet">
						
						
	
				
				
					<div class="homeColHalf homeImageSide"> 
						<?php $the_query = new WP_Query('posts_per_page=1');
						 while($the_query -> have_posts()):$the_query -> the_post(); ?>
					
					
					<h5><?php the_date(); ?></h5>
					<?php
						if ( has_post_thumbnail() ) :
							the_post_thumbnail('newspack-mostimportent-larg-image');
						endif;
						?>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 
					
					<?php endwhile;
						wp_reset_postdata(); ?>
					</div>

					<div class="homeColHalf homeListSide">
						<ul class="post-lists">
							<?php $the_query_1 = new WP_Query(array(
								'post_type' => 'post',
								'post_status' => 'publish',
								'posts_per_page' => 4,
								'offset' => 1
					));
								while($the_query_1 -> have_posts()):$the_query_1 -> the_post(); ?>
									
							<li><div class="content">
								<h5><?php the_date(); ?></h5>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</li>
						
								<?php endwhile;
								wp_reset_postdata(); ?>
						
						</ul>	
						
						
						
					</div>


				</div>	
				
				<p class="text-center viewMoreBtn"><a href="<?php echo $mostlatestLink ?>" class="button"><?php echo esc_html__( 'Ver más', 'newspack' ); ?></a></p>
				
			</div>
			
		</div>
		</main><!-- #main -->
	</section><!-- #primary -->
	

		

	
	
		
	
	
	
	
	
	
	<section class="mostView-area">
		<div class="mostView-content">
			<h2 class="h1 text-center home-title"><?php echo $mostView ?></h2>
			<div class="mvContnet" id="mvContnet-2">
				<div class="halfCol">
				
				<ul>
					<?php 
						global $post;
						$args = array(
							'posts_per_page' => 3,
							'meta_key' => 'post_views_count',
							'orderby' => 'meta_value_num',
							'order' => 'DESC'
						);
						$most_viewed = get_posts( $args );
						$p_count = 1;
						foreach( $most_viewed as $post ){ setup_postdata($post);		
					?>
					
					<li><div class="number"><?php echo $p_count ;?></div><div class="text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></li>
					
					
					<?php
					$p_count ++;
					}
					wp_reset_postdata();
					 ?>
				</ul>
		
		</div>
		
		<div class="halfCol">				
				<ul>
					<?php 
						//global $post;
						$args = array(
							'posts_per_page' => 3,
							'meta_key' => 'post_views_count',
							'orderby' => 'meta_value_num',
							'order' => 'DESC',
							'offset' => 3
						);
						$most_viewed = get_posts( $args );
						$p_count = 4;
						foreach( $most_viewed as $post ){ setup_postdata($post);		
					?>
					
					<li><div class="number"><?php echo $p_count ;?></div><div class="text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></li>
					
					
					<?php
					$p_count ++;
					}
					wp_reset_postdata();
					 ?>
				</ul>		
		</div>

		
				
			</div>	
		</div>
	</section>

<?php
get_footer();
