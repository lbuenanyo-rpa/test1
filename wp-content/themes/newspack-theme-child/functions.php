<?php
/**
 * Newspack child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


@ini_set( 'upload_max_size' , '256M' );
@ini_set( 'post_max_size', '256M');
@ini_set( 'max_execution_time', '600' );

add_image_size( 'newspack-home-image', 800, 840, true );
add_image_size( 'newspack-mostimportent-larg-image', 600, 350, true );
add_image_size( 'newspack-mostimportent-image', 600, 600, true );


/*
 * Set post views count using post meta
 */
function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

/**
* Sidebar Top para ampliadas y categorías
*/

register_sidebar( array(
        'name' => __( 'Top Sidebar', 'idbase' ),
        'id' => 'sidebar-top',
        'description' => __( 'Widgets que van en el top de las páginas ampliadas y categorías', 'qn' ),
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );

register_sidebar( array(
        'name' => __( 'Down Sidebar', 'idbase' ),
        'id' => 'sidebar-down',
        'description' => __( 'Widgets que van en al final de las páginas ampliada', 'qn' ),
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );


/**
* Función para obtener notas relacionadass
*/

function related($params = array())
{
    extract($params);
    $post_type = get_post_type();
    global $post;

    $tags = wp_get_post_tags($post->ID);

    if ($tags){

        $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

        $args = array();
        $args['post_type'] = get_post_type();
        $args['tag__in'] = $tag_ids;
        $args['post__not_in'] = array($post->ID);
        $args['orderby'] = ($orderby) ? $orderby : 'date';
        $args['order'] = ($order) ? $order : 'DESC';
        $args['posts_per_page'] = $number;
        $args['caller_get_posts'] = 1;


    }else{

        $args = array();
        $args['post_type'] = get_post_type();
        $args['post__not_in'] = array($post->ID);
        $args['orderby'] = ($orderby) ? $orderby : 'date';
        $args['order'] = ($order) ? $order : 'DESC';
        $args['posts_per_page'] = $number;

        if( isset($taxonomy))
        {
            if( is_array($taxonomy))
            {
                foreach ($taxonomy as $tax) 
                {
                    $terms = wp_get_post_terms($post->ID, $tax, array("fields" => "ids"));
                    if( !is_wp_error($terms) && count($terms) > 0){
                        $args[$tax] = $terms;
                    }
                }
            }
            else
            {
                $terms = wp_get_post_terms($post->ID, $taxonomy, array("fields" => "ids"));
                if( !is_wp_error($terms) && count($terms) > 0){
                    $args[$taxonomy] = $terms;
                }
            }
        }

    }

    $items = new WP_Query($args);
    $template = locate_template('related-' . $post_type . '.php');

    if(!file_exists($template)){
        $template = locate_template('related.php');
    }

    include($template);
    wp_reset_postdata();
}


/**
 * Custom template tags for the theme.
 */
function stop_modified_date_update( $new, $old ) {
    $new['post_modified'] = $old['post_modified'];
    $new['post_modified_gmt'] = $old['post_modified_gmt'];
    return $new;
}

add_filter( 'wp_insert_post_data', 'stop_modified_date_update', 10, 2 );

// do stuff that updates post(s) here

remove_filter( 'wp_insert_post_data', 'stop_modified_date_update', 10, 2 );

function load_script_to_remove_arrow(){
?>
    <script>
    jQuery(document).ready(function($) {
    	$('.single .nav-links .nav-previous span.meta-nav').text('Anterior');
        $('.single .nav-links .nav-next span.meta-nav').text('Siguiente');
        $('.page-id-2974 .entry-content .has-more-button button').text('Ver más');
        $('.page-id-2974 .entry-content .has-more-button p.loading').text('Cargando...');
    });
    </script>
<?php
}
add_action( 'wp_footer', 'load_script_to_remove_arrow' );