<?php
function zox_news_child_enqueue_styles()
{
    $parent_style = 'mvp-custom-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('fontawesome-child', get_stylesheet_directory_uri() . '/font-awesome/css/font-awesome.css');
    wp_enqueue_style(
        'mvp-custom-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'zox_news_child_enqueue_styles');
include(get_stylesheet_directory() . '/widgets/widget-home-feat3.php');

add_filter('human_time_diff', 'human_time_diff_custom', 10, 2);

/**
 * FMO: Filtro para personalizar la respuesta de la funcion human_time_diff
 * Recibe $from y $to (rangos de fecha)
 */
function human_time_diff_custom($from, $to)
{

    remove_filter('human_time_diff', 'human_time_diff_custom');
    $timediff = (human_time_diff($from, $to));

    if (strpos($timediff, 'min') !== false) {
        if (preg_match("/\min\b/", $timediff) === 1) {
            $timediff = str_replace('min', 'minuto', $timediff);
        } else {
            $timediff = str_replace('mins', 'minutos', $timediff);
        }
    }

    add_filter('human_time_diff', 'human_time_diff_custom', 10, 2);
    return $timediff;
}

/**
 * FMO: Content para notas AMP
 */

function check_if_zox_amp()
{
    $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $end = explode('/', $url);
    $lastParameter = array_filter($end, 'strlen');
    $ampParameter = array_slice($lastParameter, -1)[0];
    if (is_amp_endpoint() || ($ampParameter == "amp")) {
        return true;
    } else {
        return false;
    }
}

if (check_if_zox_amp() == true) {
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $post_id = url_to_postid($url);
    global $post;
    $mvp_post_temp = get_post_meta($post_id, "mvp_post_template", true);
    if ($mvp_post_temp !== 'temp6') {

        function mvp_post_ad_insert_amp_request_taboola($text)
        {
            $css = "";
            $ads_text = "<amp-embed width='100' height='100'
       type='taboola'
       layout='responsive'
       data-publisher='eluniverso-quenoticias'
       data-mode='thumbs-ma-01'
       data-placement='Mid Article Thumbnails AMP'
       data-target_type='mix'
       data-article='auto'
       data-url=''
       </amp-embed>";
            $split_by = "</p>";
            $ads_amp = array(
                '<div class="mvp-widget-feat2-side-ad relative">
                <style>.publicidad-span{float: left;margin-top: 4px;position: relative;top: -4px;text-align: center;width: 100%;padding-top: 1rem;padding-bottom: 1rem;}</style>
                <span class="mvp-ad-label">Publicidad</span>
                <div class="table m-auto px-2 pb-2 bg-white text-center border border-grey-100 text-xs publicidad-span" style="">
                <amp-ad width=300 height=250 type="doubleclick" data-slot="/78858240/DiarioQue_amp/middle" data-multi-size="300x250">
                </amp-ad>
                </div>
                </div>',
                '<div class="mvp-widget-feat2-side-ad relative">
                <style>.publicidad-span{float: left;margin-top: 4px;position: relative;top: -4px;text-align: center;width: 100%;padding-top: 1rem;padding-bottom: 1rem;}</style>
                <span class="mvp-ad-label">Publicidad</span>
                <div class="table m-auto px-2 pb-2 bg-white text-center border border-grey-100 text-xs publicidad-span" style="">
                <amp-ad width=300 height=250 type="doubleclick" data-slot="/78858240/DiarioQue_amp/middle2" data-multi-size="300x250">
                </amp-ad>
                </div>
                </div>',
                '<div class="mvp-widget-feat2-side-ad relative">
                <style>.publicidad-span{float: left;margin-top: 4px;position: relative;top: -4px;text-align: center;width: 100%;padding-top: 1rem;padding-bottom: 1rem;}</style>
                <span class="mvp-ad-label">Publicidad</span>
                <div class="table m-auto px-2 pb-2 bg-white text-center border border-grey-100 text-xs publicidad-span" style="">
                <amp-ad width=300 height=250 type="doubleclick" data-slot="/78858240/DiarioQue_amp/middle3" data-multi-size="300x250">
                </amp-ad>
                </div>
                </div>'
            );


            $mvp_post_freq = 3;
            $insert_after = $mvp_post_freq;

            $paragraphs = explode($split_by, wptexturize($text));
            if (count($paragraphs) > $insert_after) {
                $new_text = '';
                $i = 1;
                foreach ($paragraphs as $paragraph) {
                    if (preg_match('~<(?:img|blockquote|ul|li)[ >]~', $paragraph)) {
                        $new_text .= $paragraph;
                    } else {
                        $new_text .= $paragraph . ($i % $insert_after == 0 ? $ads_text : '');
                        if ($i === 2 || $i === 4 || $i === 6) {
                            $new_text .= $ads_amp[($i / 2) - 1];
                        }
                        $i++;
                    }

                    if (count($paragraphs) >= 7 && $i >= 7) {
                        $ads_text = "";
                        $ads_amp = "";
                        $i++;
                    }
                }
                return $new_text;
            }
            return $text;
        }
        add_filter('the_content', 'mvp_post_ad_insert_amp_request_taboola');
    }
}

// function filtra post del ultimo año - ACF
add_filter('acf/fields/relationship/query', 'my_acf_fields_relationship_query', 10, 2);
function my_acf_fields_relationship_query( $args, $field ) {
    $args['date_query'] = [
        'after' => date('Y-m-d H:i:s', strtotime('-1 year')),
    ];
    $args['posts_per_page'] = 9; // Limitar a 10 resultados por ejemplo.
    $args['post_status'] = 'publish'; // Solo publicaciones publicadas.
    $args['orderby'] = 'date'; // Ordenar por fecha.
    $args['order'] = 'DESC'; // En orden descendente (las más recientes primero).
    
    return $args;
}

?>