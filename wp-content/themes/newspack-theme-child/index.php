<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newspack
 */

get_header();
?>

  <section id="primary" class="content-area gg">
    <main id="main" class="site-main">
              <?php   global $post;
             $page_id = get_queried_object_id();
if (  $page_id == 509 ) {  ?>          
            <header class="entry-header">                 
              
      <h1 class="entry-title "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
   <?php echo get_the_title( $page_id ); ?>  </font></font></h1>
  

            </header> 
                        <?php } ?>
        
    <?php
    if ( have_posts() ) {

      // Load posts loop.
      while ( have_posts() ) {
        the_post();
        get_template_part( 'template-parts/content/content', 'excerpt' );
      }

      // Previous/next page navigation.
      newspack_the_posts_navigation();

    } else {

      // If no content, include the "No posts found" template.
      get_template_part( 'template-parts/content/content', 'none' );

    }
    ?>

    </main><!-- .site-main -->
    <?php get_sidebar(); ?>
  </section><!-- .content-area -->

<?php
get_footer();