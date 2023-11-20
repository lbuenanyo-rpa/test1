<section id="block-3" class="above-content widget widget_block ">
    <h2 class="">TE RECOMENDAMOS</h2>

    		<div data-posts="">
				
					<?php while($items->have_posts()) : $items->the_post(); ?>

						<?php $url = get_the_permalink(get_the_ID()); ?>

						<article class="post type-post status-publish format-standard has-post-thumbnail hentry category-noticias" style="    margin-bottom: 1rem;">

							<div class="wp-block-columns homeInsideContainer">

								<div class="wp-block-column listArea" style="flex-basis:25%">
						
							<figure class="post-thumbnail" style="">
								<a class="post-thumbnail-inner" href="<?php echo $url."?modulo=foto-ampliada-te-recomendamos"; ?>">
								<?php the_post_thumbnail('newspack-mostimportent-larg-image'); ?>
								</a>
							</figure>

						</div>
						<div class="wp-block-column imageArea" style="flex-basis:75%">
							
							<div class="entry-container">
								
							<h2 style="    font-size: 1.0em;font-weight: bold;">
								<a href="<?php echo $url."?modulo=titulo-ampliada-te-recomendamos"; ?>">
								<?php the_title(); ?>
								</a>
							</h2>

						</div>
							</div>
						</div>
						
						</article>
					<?php endwhile; ?>
				
			</div>

</section>