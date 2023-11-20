			</div><!--mvp-main-body-wrap-->
			<footer id="mvp-foot-wrap" class="left relative">
				<div id="mvp-foot-top" class="left relative">
					<div class="mvp-main-box">
						<div id="mvp-foot-logo" class="left relative">
							<?php if(get_option('mvp_logo_foot')) { ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_option('mvp_logo_foot')); ?>" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
							<?php } else { ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-large.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
							<?php } ?>
						</div><!--mvp-foot-logo-->
						<div id="mvp-foot-soc" class="left relative">
							<ul class="mvp-foot-soc-list left relative">
								<?php if(get_option('mvp_facebook')) { ?>
									<li><a href="<?php echo esc_url(get_option('mvp_facebook')); ?>" target="_blank" class="fab fa-facebook-f"></a></li>
								<?php } ?>
								<?php if(get_option('mvp_twitter')) { ?>
									<li><a href="<?php echo esc_url(get_option('mvp_twitter')); ?>" target="_blank" class="fab fa-twitter"></a></li>
								<?php } ?>
								<?php if(get_option('mvp_pinterest')) { ?>
									<li><a href="<?php echo esc_url(get_option('mvp_pinterest')); ?>" target="_blank" class="fab fa-pinterest-p"></a></li>
								<?php } ?>
								<?php if(get_option('mvp_instagram')) { ?>
									<li><a href="<?php echo esc_url(get_option('mvp_instagram')); ?>" target="_blank" class="fab fa-instagram"></a></li>
								<?php } ?>
								<?php if(get_option('mvp_tiktok')) { ?>
									<li><a href="<?php echo esc_url(get_option('mvp_tiktok')); ?>" target="_blank" class="fab fa-tiktok"></a></li>
								<?php } ?>
								<?php if(get_option('mvp_youtube')) { ?>
									<li><a href="<?php echo esc_url(get_option('mvp_youtube')); ?>" target="_blank" class="fab fa-youtube"></a></li>
								<?php } ?>
								<?php if(get_option('mvp_linkedin')) { ?>
									<li><a href="<?php echo esc_url(get_option('mvp_linkedin')); ?>" target="_blank" class="fab fa-linkedin"></a></li>
								<?php } ?>
								<?php if(get_option('mvp_tumblr')) { ?>
									<li><a href="<?php echo esc_url(get_option('mvp_tumblr')); ?>" target="_blank" class="fab fa-tumblr"></a></li>
								<?php } ?>
							</ul>
						</div><!--mvp-foot-soc-->
						<div id="mvp-foot-menu-wrap" class="left relative">
							<div id="mvp-foot-menu" class="left relative">
								<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'fallback_cb' => 'false')); ?>
							</div><!--mvp-foot-menu-->
						</div><!--mvp-foot-menu-wrap-->
					</div><!--mvp-main-box-->
				</div><!--mvp-foot-top-->
				<div id="mvp-foot-bot" class="left relative">
					<div class="mvp-main-box">
						<div id="mvp-foot-copy" class="left relative">
							<p><?php echo wp_kses_post(get_option('mvp_copyright')); ?></p>
						</div><!--mvp-foot-copy-->
					</div><!--mvp-main-box-->
				</div><!--mvp-foot-bot-->
			</footer>
		</div><!--mvp-site-main-->
	</div><!--mvp-site-wall-->
</div><!--mvp-site-->
<div class="mvp-fly-top back-to-top">
	<i class="fa fa-angle-up fa-3"></i>
</div><!--mvp-fly-top-->
<div class="mvp-fly-fade mvp-fly-but-click">
</div><!--mvp-fly-fade-->
<?php wp_footer(); ?>
</body>
</html>