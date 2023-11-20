<?php
/**
 * Plugin Name: MVP Themes Social Buttons
 * Plugin URI: http://themeforest.net/user/mvpthemes
 * Description: Creates social sharing buttons for use with Zox News Theme
 * Version: 1.2
 * Author: MVP Themes
 * Author URI: http://premium.wpmudev.org
 * License: GNU General Public License v3 or later
 */

if ( !function_exists( 'mvp_SocialSharing' ) ) {
function mvp_SocialSharing() {
 { ?>
	<div class="mvp-post-soc-wrap left relative">
		<ul class="mvp-post-soc-list left relative">
			<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title_attribute(); ?>', 'facebookShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Share on Facebook', 'zox-news' ); ?>">
			<li class="mvp-post-soc-fb">
				<i class="fab fa-facebook-f" aria-hidden="true"></i>
			</li>
			</a>
			<a href="#" onclick="window.open('http://twitter.com/intent/tweet?text=<?php the_title_attribute(); ?> -&amp;url=<?php the_permalink(); ?>', 'twitterShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Tweet This Post', 'zox-news' ); ?>">
			<li class="mvp-post-soc-twit">
				<i class="fab fa-twitter" aria-hidden="true"></i>
			</li>
			</a>
			<a href="#" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mvp-post-thumb' ); echo esc_url($thumb['0']); ?>&amp;description=<?php the_title_attribute(); ?>', 'pinterestShare', 'width=750,height=350'); return false;" title="<?php esc_html_e( 'Pin This Post', 'zox-news' ); ?>">
			<li class="mvp-post-soc-pin">
				<i class="fab fa-pinterest-p" aria-hidden="true"></i>
			</li>
			</a>
		</ul>
	</div><!--mvp-post-soc-wrap-->
	<div id="mvp-soc-mob-wrap">
		<div class="mvp-soc-mob-out left relative">
			<div class="mvp-soc-mob-in">
				<div class="mvp-soc-mob-left left relative">
					<ul class="mvp-soc-mob-list left relative">
						<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title_attribute(); ?>', 'facebookShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Share on Facebook', 'zox-news' ); ?>">
						<li class="mvp-soc-mob-fb">
							<i class="fab fa-facebook-f" aria-hidden="true"></i><span class="mvp-soc-mob-fb"><?php esc_html_e( "Share", 'zox-news' ); ?></span>
						</li>
						</a>
						<a href="#" onclick="window.open('http://twitter.com/share?text=<?php the_title_attribute(); ?> -&amp;url=<?php the_permalink() ?>', 'twitterShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Tweet This Post', 'zox-news' ); ?>">
						<li class="mvp-soc-mob-twit">
							<i class="fab fa-twitter" aria-hidden="true"></i><span class="mvp-soc-mob-fb"><?php esc_html_e( "Tweet", 'zox-news' ); ?></span>
						</li>
						</a>
						<a href="#" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mvp-post-thumb' ); echo esc_url($thumb['0']); ?>&amp;description=<?php the_title_attribute(); ?>', 'pinterestShare', 'width=750,height=350'); return false;" title="<?php esc_html_e( 'Pin This Post', 'zox-news' ); ?>">
						<li class="mvp-soc-mob-pin">
							<i class="fab fa-pinterest-p" aria-hidden="true"></i>
						</li>
						</a>
						<a href="whatsapp://send?text=<?php the_title(); ?> <?php the_permalink() ?>"><div class="whatsapp-share"><span class="whatsapp-but1">
						<li class="mvp-soc-mob-what">
							<i class="fab fa-whatsapp" aria-hidden="true"></i>
						</li>
						</a>

					</ul>
				</div><!--mvp-soc-mob-left-->
			</div><!--mvp-soc-mob-in-->
			<div class="mvp-soc-mob-right left relative">
				<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
			</div><!--mvp-soc-mob-right-->
		</div><!--mvp-soc-mob-out-->
	</div><!--mvp-soc-mob-wrap-->
<?php }
}
}

if ( !function_exists( 'mvp_SocialALP' ) ) {
function mvp_SocialALP() {
{ ?>
<div class="mvp-alp-soc-reg left relative">
							<div class="mvp-alp-soc-wrap">
					<ul class="mvp-alp-soc-list">
						<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink($post->ID);?>&amp;t=<?php the_title_attribute(array('post'=>$post->ID)); ?>', 'facebookShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Share on Facebook', 'jawn' ); ?>">
							<li class="mvp-alp-soc-fb"><span class="fab fa-facebook-f"></span></li>
						</a>
						<a href="#" onclick="window.open('http://twitter.com/share?text=<?php the_title_attribute(array('post'=>$post->ID)); ?> &amp;url=<?php the_permalink($post->ID) ?>', 'twitterShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Tweet This Post', 'jawn' ); ?>">
							<li class="mvp-alp-soc-twit"><span class="fab fa-twitter"></span></li>
						</a>
						<a href="#" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink($post->ID);?>&amp;media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mvp-large-thumb' ); echo esc_url($thumb['0']); ?>&amp;description=<?php the_title_attribute(array('post'=>$post->ID)); ?>', 'pinterestShare', 'width=750,height=350'); return false;" title="<?php esc_html_e( 'Pin This Post', 'jawn' ); ?>">
							<li class="mvp-alp-soc-pin"><span class="fab fa-pinterest-p"></span></li>
						</a>
					</ul>
				</div>
</div>
<?php }
}
}

if ( !function_exists( 'mvp_SocialSharingVid' ) ) {
function mvp_SocialSharingVid() {
{ ?>
	<div class="mvp-vid-wide-soc left relative">
		<ul class="mvp-vid-wide-soc-list left relative">
			<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title_attribute(); ?>', 'facebookShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Share on Facebook', 'zox-news' ); ?>">
			<li class="mvp-post-soc-fb">
				<i class="fab fa-facebook-f" aria-hidden="true"></i>
			</li>
			</a>
			<a href="#" onclick="window.open('http://twitter.com/share?text=<?php the_title_attribute(); ?> -&amp;url=<?php the_permalink() ?>', 'twitterShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Tweet This Post', 'zox-news' ); ?>">
			<li class="mvp-post-soc-twit">
				<i class="fab fa-twitter" aria-hidden="true"></i>
			</li>
			</a>
			<a href="#" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mvp-post-thumb' ); echo esc_url($thumb['0']); ?>&amp;description=<?php the_title_attribute(); ?>', 'pinterestShare', 'width=750,height=350'); return false;" title="<?php esc_html_e( 'Pin This Post', 'zox-news' ); ?>">
			<li class="mvp-post-soc-pin">
				<i class="fab fa-pinterest-p" aria-hidden="true"></i>
			</li>
			</a>
		</ul>
	</div><!--mvp-vid-wide-soc-->
<?php }
}
}

if ( !function_exists( 'mvp_new_contactmethods' ) ) {
function mvp_new_contactmethods( $contactmethods ) {
    $contactmethods['facebook'] = 'Facebook'; // Add Facebook
    $contactmethods['twitter'] = 'Twitter'; // Add Twitter
    $contactmethods['pinterest'] = 'Pinterest'; // Add Pinterest
    $contactmethods['instagram'] = 'Instagram'; // Add Instagram
    $contactmethods['linkedin'] = 'LinkedIn'; // Add LinkedIn

    return $contactmethods;
}
}
add_filter('user_contactmethods','mvp_new_contactmethods',10,1);

?>