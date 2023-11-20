<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" id="viewport"
		content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<?php if (!function_exists('has_site_icon') || !has_site_icon()) {
		if (get_option('mvp_favicon')) { ?>
			<link rel="shortcut icon" href="<?php echo esc_url(get_option('mvp_favicon')); ?>" />
		<?php }
	} ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!--link rel="fontawsome" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" /-->
	<link rel="fontawsome" href="<?php echo get_stylesheet_directory_uri(); ?>/font-awesome/css/font-awesome.css" />
	<?php if (is_single()) { ?>
		<meta property="og:type" content="article" />
		<?php if (have_posts()):
			while (have_posts()):
				the_post(); ?>
				<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
					<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'mvp-post-thumb'); ?>
					<meta property="og:image" content="<?php echo esc_url($thumb['0']); ?>" />
					<meta name="twitter:image" content="<?php echo esc_url($thumb['0']); ?>" />
				<?php } ?>
				<meta property="og:url" content="<?php the_permalink() ?>" />
				<meta property="og:title" content="<?php the_title_attribute(); ?>" />
				<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
				<meta name="twitter:card" content="summary_large_image">
				<meta name="twitter:url" content="<?php the_permalink() ?>">
				<meta name="twitter:title" content="<?php the_title_attribute(); ?>">
				<meta name="twitter:description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
			<?php endwhile; endif; ?>
	<?php } else { ?>
		<meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<?php } ?>

	<!-- REEMPLAZO DE TRACKING CODE MANAGER -->
	<script>
		window.mobileCheck = function () {
			let check = false;
			(function (a) { if (/(android\|bb\d+\|meego).+mobile\|avantgo\|bada\/\|blackberry\|blazer\|compal\|elaine\|fennec\|hiptop\|iemobile\|ip(hone\|od)\|iris\|kindle\|lge \|maemo\|midp\|mmp\|mobile.+firefox\|netfront\|opera m(ob\|in)i\|palm( os)?\|phone\|p(ixi\|re)\/\|plucker\|pocket\|psp\|series(4\|6)0\|symbian\|treo\|up\.(browser\|link)\|vodafone\|wap\|windows ce\|xda\|xiino/i.test(a) \| /1207\|6310\|6590\|3gso\|4thp\|50[1-6]i\|770s\|802s\|a wa\|abac\|ac(er\|oo\|s\-)\|ai(ko\|rn)\|al(av\|ca\|co)\|amoi\|an(ex\|ny\|yw)\|aptu\|ar(ch\|go)\|as(te\|us)\|attw\|au(di\|\-m\|r \|s )\|avan\|be(ck\|ll\|nq)\|bi(lb\|rd)\|bl(ac\|az)\|br(e\|v)w\|bumb\|bw\-(n\|u)\|c55\/\|capi\|ccwa\|cdm\-\|cell\|chtm\|cldc\|cmd\-\|co(mp\|nd)\|craw\|da(it\|ll\|ng)\|dbte\|dc\-s\|devi\|dica\|dmob\|do(c\|p)o\|ds(12\|\-d)\|el(49\|ai)\|em(l2\|ul)\|er(ic\|k0)\|esl8\|ez([4-7]0\|os\|wa\|ze)\|fetc\|fly(\-\|_)\|g1 u\|g560\|gene\|gf\-5\|g\-mo\|go(\.w\|od)\|gr(ad\|un)\|haie\|hcit\|hd\-(m\|p\|t)\|hei\-\|hi(pt\|ta)\|hp( i\|ip)\|hs\-c\|ht(c(\-\| \|_\|a\|g\|p\|s\|t)\|tp)\|hu(aw\|tc)\|i\-(20\|go\|ma)\|i230\|iac( \|\-\|\/)\|ibro\|idea\|ig01\|ikom\|im1k\|inno\|ipaq\|iris\|ja(t\|v)a\|jbro\|jemu\|jigs\|kddi\|keji\|kgt( \|\/)\|klon\|kpt \|kwc\-\|kyo(c\|k)\|le(no\|xi)\|lg( g\|\/(k\|l\|u)\|50\|54\|\-[a-w])\|libw\|lynx\|m1\-w\|m3ga\|m50\/\|ma(te\|ui\|xo)\|mc(01\|21\|ca)\|m\-cr\|me(rc\|ri)\|mi(o8\|oa\|ts)\|mmef\|mo(01\|02\|bi\|de\|do\|t(\-\| \|o\|v)\|zz)\|mt(50\|p1\|v )\|mwbp\|mywa\|n10[0-2]\|n20[2-3]\|n30(0\|2)\|n50(0\|2\|5)\|n7(0(0\|1)\|10)\|ne((c\|m)\-\|on\|tf\|wf\|wg\|wt)\|nok(6\|i)\|nzph\|o2im\|op(ti\|wv)\|oran\|owg1\|p800\|pan(a\|d\|t)\|pdxg\|pg(13\|\-([1-8]\|c))\|phil\|pire\|pl(ay\|uc)\|pn\-2\|po(ck\|rt\|se)\|prox\|psio\|pt\-g\|qa\-a\|qc(07\|12\|21\|32\|60\|\-[2-7]\|i\-)\|qtek\|r380\|r600\|raks\|rim9\|ro(ve\|zo)\|s55\/\|sa(ge\|ma\|mm\|ms\|ny\|va)\|sc(01\|h\-\|oo\|p\-)\|sdk\/\|se(c(\-\|0\|1)\|47\|mc\|nd\|ri)\|sgh\-\|shar\|sie(\-\|m)\|sk\-0\|sl(45\|id)\|sm(al\|ar\|b3\|it\|t5)\|so(ft\|ny)\|sp(01\|h\-\|v\-\|v )\|sy(01\|mb)\|t2(18\|50)\|t6(00\|10\|18)\|ta(gt\|lk)\|tcl\-\|tdg\-\|tel(i\|m)\|tim\-\|t\-mo\|to(pl\|sh)\|ts(70\|m\-\|m3\|m5)\|tx\-9\|up(\.b\|g1\|si)\|utst\|v400\|v750\|veri\|vi(rg\|te)\|vk(40\|5[0-3]\|\-v)\|vm40\|voda\|vulc\|vx(52\|53\|60\|61\|70\|80\|81\|83\|85\|98)\|w3c(\-\| )\|webc\|whit\|wi(g \|nc\|nw)\|wmlb\|wonu\|x700\|yas\-\|your\|zeto\|zte\-/i.test(a.substr(0, 4))) check = true; })(navigator.userAgent\| navigator.vendor\| window.opera);
			return check;
		};
	</script>
	<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
	<script>
		var googletag = googletag || {};
		googletag.cmd = googletag.cmd || [];

		var getQueryString = function (field, url) {
			var href = url ? url : window.location.href;
			var reg = new RegExp('[?&]' + field + '=([^&#]*)', 'i');
			var string = reg.exec(href);
			return string ? string[1] : null;
		};
		var dfp_demo = getQueryString("demo");
	</script>
	<script>
		googletag.cmd.push(function () {
			//Header
			var mapping1 = googletag.sizeMapping().addSize([0, 0], [[300, 100], [300, 250], [320, 50], [320, 100]]).addSize([750, 700], [[728, 90]]).addSize([1024, 200], [[728, 90], [970, 90], [970, 250]]).build();
			window.slot1 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Header', [728, 90], 'DiarioQue_Header').defineSizeMapping(mapping1).addService(googletag.pubads());
			//middle1
			var mapping2 = googletag.sizeMapping().addSize([0, 0], [[300, 100], [300, 250], [320, 50]]).addSize([750, 700], [[300, 250], [300, 600]]).addSize([1024, 200], [[300, 250], [300, 600]]).build();
			window.slot2 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Middle', [300, 250], 'DiarioQue_Middle').defineSizeMapping(mapping2).addService(googletag.pubads());
			//middle2-300x250
			var mapping3 = googletag.sizeMapping().addSize([0, 0], [[300, 100], [300, 250], [320, 50], [320, 100]]).addSize([750, 700], [300, 250]).addSize([1024, 200], [300, 250]).build();
			window.slot3 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Middle2', [300, 250], 'DiarioQue_Middle2').defineSizeMapping(mapping3).addService(googletag.pubads());
			window.slot4 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Middle3', [300, 250], 'DiarioQue_Middle3').defineSizeMapping(mapping3).addService(googletag.pubads());
			window.slot5 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Middle4', [300, 250], 'DiarioQue_Middle4').defineSizeMapping(mapping3).addService(googletag.pubads());
			window.slot6 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Content', [300, 250], 'DiarioQue_Content').defineSizeMapping(mapping3).addService(googletag.pubads());
			//Billboard
			var mapping4 = googletag.sizeMapping().addSize([0, 0], [[300, 250], [320, 100], [320, 50]]).addSize([750, 700], [[300, 250], [728, 90], [728, 180], [728, 250]]).addSize([1024, 200], [[728, 90], [728, 180], [728, 250]]).build();
			window.slot7 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Billboard', [728, 90], 'DiarioQue_Billboard').defineSizeMapping(mapping4).addService(googletag.pubads());
			window.slot8 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Top2', [728, 90], 'DiarioQue_Top2').defineSizeMapping(mapping4).addService(googletag.pubads())
			//Top
			var mapping3 = googletag.sizeMapping().addSize([0, 0], [[300, 100], [300, 50], [320, 50], [320, 100]]).addSize([750, 700], [728, 90]).addSize([1024, 200], [[728, 90]]).build();
			window.slot9 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Top', [320, 100], 'DiarioQue_Top').defineSizeMapping(mapping3).addService(googletag.pubads());
			window.slot10 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Down', [728, 90], 'DiarioQue_Down').defineSizeMapping(mapping3).addService(googletag.pubads());
			window.slot11 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Leader', [728, 90], 'DiarioQue_Leader').defineSizeMapping(mapping3).addService(googletag.pubads());
			//Flotantes
			window.slot12 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Floating', [1, 1], 'Floating').addService(googletag.pubads());
			window.slot13 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Layer', [1, 1], 'DiarioQue_Layer').addService(googletag.pubads());
			window.slot14 = googletag.defineSlot('/78858240/Diarioque.ec/DiarioQue_Inread', [1, 2], 'DiarioQue_Inread').addService(googletag.pubads());
			//OOP
			window.slot15 = googletag.defineOutOfPageSlot('/21759101383,78858240/Que_Web-ITT', googletag.enums.OutOfPageFormat.INTERSTITIAL).addService(googletag.pubads());
			window.slot16 = googletag.defineOutOfPageSlot('/21759101383,78858240/Que_Bottom_Anchor', googletag.enums.OutOfPageFormat.BOTTOM_ANCHOR).addService(googletag.pubads());

			googletag.pubads().setTargeting('Que_Seccion', '');
			googletag.pubads().setTargeting('Que_Subseccion', '');
			googletag.pubads().setTargeting('Que_Tipo', '');
			googletag.pubads().setTargeting('Que_ID', '');
			googletag.pubads().setTargeting('Demo', '');
			googletag.pubads().collapseEmptyDivs();
			googletag.pubads().enableSingleRequest();
			googletag.pubads().setCentering(true);
			googletag.enableServices();
		});
	</script>
	<script type='text/javascript'>
		(function () {
			/** CONFIGURATION START **/
			var _sf_async_config = window._sf_async_config = (window._sf_async_config \| {});
			_sf_async_config.uid = 51078;
			_sf_async_config.domain = 'eluniverso.com';
			_sf_async_config.useCanonical = true;
			_sf_async_config.useCanonicalDomain = true;
			_sf_async_config.sections = 'quenoticias';
			_sf_async_config.authors = 'quenoticias-redaccion';
			/** CONFIGURATION END **/
			function loadChartbeat() {
				var e = document.createElement('script');
				var n = document.getElementsByTagName('script')[0];
				e.type = 'text/javascript';
				e.async = true;
				e.src = '//static.chartbeat.com/js/chartbeat.js';
				n.parentNode.insertBefore(e, n);
			}
			loadChartbeat();
		})();
	</script>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MSNL68J" height="0"
			width="0"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<!-- Google Tag Manager -->
	<script>(function (w, d, s, l, i) {
			w[l] = w[l]\| []; w[l].push({
				'gtm.start':
					new Date().getTime(), event: 'gtm.js'
			}); var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
					'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-MSNL68J');</script>
	<!-- End Google Tag Manager -->
	<script type="text/javascript">
		window._taboola = window._taboola \| [];
		_taboola.push({ article: 'auto' });
		!function (e, f, u, i) {
			if (!document.getElementById(i)) {
				e.async = 1;
				e.src = u;
				e.id = i;
				f.parentNode.insertBefore(e, f);
			}
		}(document.createElement('script'),
			document.getElementsByTagName('script')[0],
			'//cdn.taboola.com/libtrc/eluniverso-quenoticias/loader.js',
			'tb_loader_script');
		if (window.performance && typeof window.performance.mark == 'function') { window.performance.mark('tbl_ic'); }
	</script>

	<!-- REEMPLAZO DE TRACKING CODE MANAGER -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(''); ?>>
	<?php get_template_part('fly-menu'); ?>
	<div id="mvp-site" class="left relative">
		<div id="ad-container">
			<span class="mvp-ad-label">Publicidad</span>
			<div id="DiarioQue_Header">
				<script>
					googletag.cmd.push(function () { googletag.display('DiarioQue_Header'); });
				</script>
			</div>
		</div>
		<div id="mvp-search-wrap">
			<div id="mvp-search-box">
				<?php get_search_form(); ?>
			</div><!--mvp-search-box-->
			<div class="mvp-search-but-wrap mvp-search-click">
				<span></span>
				<span></span>
			</div><!--mvp-search-but-wrap-->
		</div><!--mvp-search-wrap-->
		<?php if (get_option('mvp_wall_ad')) { ?>
			<div id="mvp-wallpaper">
				<?php if (get_option('mvp_wall_url')) { ?>
					<a href="<?php echo esc_url(get_option('mvp_wall_url')); ?>" class="mvp-wall-link" target="_blank"></a>
				<?php } ?>
			</div><!--mvp-wallpaper-->
		<?php } ?>
		<div id="mvp-site-wall" class="left relative">
			<?php if (get_option('mvp_header_leader')) { ?>
				<?php global $post;
				$mvp_post_layout = get_option('mvp_post_layout');
				$mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true);
				if ((!$mvp_post_temp && $mvp_post_layout == 'Template 5' && is_single()) || (!$mvp_post_temp && $mvp_post_layout == 'Template 6' && is_single()) || ($mvp_post_temp == "global" && $mvp_post_layout == 'Template 5' && is_single()) || ($mvp_post_temp == "global" && $mvp_post_layout == 'Template 6' && is_single()) || ($mvp_post_temp == "temp5" && is_single()) || ($mvp_post_temp == "temp6" && is_single())) {
				} else { ?>
					<div id="mvp-leader-wrap">
						<?php $leader_ad = get_option('mvp_header_leader');
						if ($leader_ad && !is_404()) {
							echo do_shortcode(html_entity_decode($leader_ad));
						} ?>
					</div><!--mvp-leader-wrap-->
				<?php } ?>
			<?php } ?>
			<div id="mvp-site-main" class="left relative">
				<header id="mvp-main-head-wrap" class="left relative">
					<?php $mvp_nav_layout = get_option('mvp_nav_layout');
					if ($mvp_nav_layout == "1") { ?>
						<nav id="mvp-main-nav-wrap" class="left relative">
							<div id="mvp-main-nav-small" class="left relative">
								<div id="mvp-main-nav-small-cont" class="left">
									<div class="mvp-main-box">
										<div id="mvp-nav-small-wrap">
											<div class="mvp-nav-small-right-out left">
												<div class="mvp-nav-small-right-in">
													<div class="mvp-nav-small-cont left">
														<div class="mvp-nav-small-left-out right">
															<div id="mvp-nav-small-left" class="left relative">
																<div
																	class="mvp-fly-but-wrap mvp-fly-but-click left relative">
																	<span></span>
																	<span></span>
																	<span></span>
																	<span></span>
																</div><!--mvp-fly-but-wrap-->
															</div><!--mvp-nav-small-left-->
															<div class="mvp-nav-small-left-in">
																<div class="mvp-nav-small-mid left">
																	<div class="mvp-nav-small-logo left relative">
																		<?php if (get_option('mvp_logo_nav')) { ?>
																			<a href="<?php echo esc_url(home_url('/')); ?>"><img
																					src="<?php echo esc_url(get_option('mvp_logo_nav')); ?>"
																					alt="<?php bloginfo('name'); ?>"
																					data-rjs="2" /></a>
																		<?php } else { ?>
																			<a href="<?php echo esc_url(home_url('/')); ?>"><img
																					src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav.png"
																					alt="<?php bloginfo('name'); ?>"
																					data-rjs="2" /></a>
																		<?php } ?>
																		<?php if (is_home() || is_front_page()) { ?>
																			<h1 class="mvp-logo-title">
																				<?php bloginfo('name'); ?>
																			</h1>
																		<?php } else { ?>
																			<h2 class="mvp-logo-title">
																				<?php bloginfo('name'); ?>
																			</h2>
																		<?php } ?>
																	</div><!--mvp-nav-small-logo-->
																	<div class="mvp-nav-small-mid-right left">
																		<?php if (is_single()) { ?>
																			<div class="mvp-drop-nav-title left">
																				<h4>
																					<?php the_title(); ?>
																				</h4>
																			</div><!--mvp-drop-nav-title-->
																		<?php } ?>
																		<div class="mvp-nav-menu left">
																			<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
																		</div><!--mvp-nav-menu-->
																	</div><!--mvp-nav-small-mid-right-->
																</div><!--mvp-nav-small-mid-->
															</div><!--mvp-nav-small-left-in-->
														</div><!--mvp-nav-small-left-out-->
													</div><!--mvp-nav-small-cont-->
												</div><!--mvp-nav-small-right-in-->
												<div id="mvp-nav-small-right" class="right relative">
													<span class="mvp-nav-search-but mvp-search-click"><i
															class="fas fa-search"></i></span>
												</div><!--mvp-nav-small-right-->
											</div><!--mvp-nav-small-right-out-->
										</div><!--mvp-nav-small-wrap-->
									</div><!--mvp-main-box-->
								</div><!--mvp-main-nav-small-cont-->
							</div><!--mvp-main-nav-small-->
						</nav><!--mvp-main-nav-wrap-->
					<?php } else { ?>
						<nav id="mvp-main-nav-wrap" class="left relative">
							<div id="mvp-main-nav-top" class="left relative">
								<div class="mvp-main-box">
									<div id="mvp-nav-top-wrap" class="left relative">
										<div class="mvp-nav-top-right-out left relative">
											<div class="mvp-nav-top-right-in">
												<div class="mvp-nav-top-cont left relative">
													<div class="mvp-nav-top-left-out relative">
														<div class="mvp-nav-top-left">
															<div class="mvp-nav-soc-wrap">
																<?php if (get_option('mvp_facebook')) { ?>
																	<a href="<?php echo esc_html(get_option('mvp_facebook')); ?>"
																		target="_blank"><span
																			class="mvp-nav-soc-but fab fa-facebook-f"></span></a>
																<?php } ?>
																<?php if (get_option('mvp_twitter')) { ?>
																	<a href="<?php echo esc_html(get_option('mvp_twitter')); ?>"
																		target="_blank"><span
																			class="mvp-nav-soc-but fab fa-twitter"></span></a>
																<?php } ?>
																<?php if (get_option('mvp_instagram')) { ?>
																	<a href="<?php echo esc_html(get_option('mvp_instagram')); ?>"
																		target="_blank"><span
																			class="mvp-nav-soc-but fab fa-instagram"></span></a>
																<?php } ?>
																<?php if (get_option('mvp_youtube')) { ?>
																	<a href="<?php echo esc_html(get_option('mvp_youtube')); ?>"
																		target="_blank"><span
																			class="mvp-nav-soc-but fab fa-youtube"></span></a>
																<?php } ?>
															</div><!--mvp-nav-soc-wrap-->
															<div class="mvp-fly-but-wrap mvp-fly-but-click left relative">
																<span></span>
																<span></span>
																<span></span>
																<span></span>
															</div><!--mvp-fly-but-wrap-->
														</div><!--mvp-nav-top-left-->
														<div class="mvp-nav-top-left-in">
															<div class="mvp-nav-top-mid left relative" itemscope
																itemtype="http://schema.org/Organization">
																<?php if (get_option('mvp_logo')) { ?>
																	<a class="mvp-nav-logo-reg" itemprop="url"
																		href="<?php echo esc_url(home_url('/usa')); ?>"><img
																			itemprop="logo"
																			src="<?php echo esc_url(get_option('mvp_logo')); ?>"
																			alt="<?php bloginfo('name'); ?>"
																			data-rjs="2" /></a>
																<?php } else {

																	$ip = geoip_detect2_get_client_ip();
																	$userInfo = geoip_detect2_get_info_from_current_ip($ip);
																	$isoCode = $userInfo->country->isoCode;
																	if ($isoCode == 'US') { ?>
																		<a class="mvp-nav-logo-reg" itemprop="url"
																			href="<?php echo esc_url(home_url('/categoria/estados-unidos')); ?>"><img
																				itemprop="logo"
																				src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-Que.png"
																				alt="<?php bloginfo('name'); ?>"
																				data-rjs="2" /></a>
																	<?php } else { ?>
																		<a class="mvp-nav-logo-reg" itemprop="url"
																			href="<?php echo esc_url(home_url('/')); ?>"><img
																				itemprop="logo"
																				src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-Que.png"
																				alt="<?php bloginfo('name'); ?>"
																				data-rjs="2" /></a>
																	<?php } ?>
																<?php } ?>
																<?php if (get_option('mvp_logo_nav')) { ?>
																	<a class="mvp-nav-logo-small"
																		href="<?php echo esc_url(home_url('/')); ?>"><img
																			src="<?php echo esc_url(get_option('mvp_logo_nav')); ?>"
																			alt="<?php bloginfo('name'); ?>"
																			data-rjs="2" /></a>
																<?php } else { ?>
																	<a class="mvp-nav-logo-small"
																		href="<?php echo esc_url(home_url('/')); ?>"><img
																			src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-Que.png"
																			alt="<?php bloginfo('name'); ?>"
																			data-rjs="2" /></a>
																<?php } ?>
																<?php if (is_home() || is_front_page()) { ?>
																	<h1 class="mvp-logo-title">
																		<?php bloginfo('name'); ?>
																	</h1>
																<?php } else { ?>
																	<h2 class="mvp-logo-title">
																		<?php bloginfo('name'); ?>
																	</h2>
																<?php } ?>
																<?php if (is_single()) { ?>
																	<div class="mvp-drop-nav-title left">
																		<h4>
																			<?php the_title(); ?>
																		</h4>
																	</div><!--mvp-drop-nav-title-->
																<?php } ?>
															</div><!--mvp-nav-top-mid-->
														</div><!--mvp-nav-top-left-in-->
													</div><!--mvp-nav-top-left-out-->
												</div><!--mvp-nav-top-cont-->
											</div><!--mvp-nav-top-right-in-->
											<div class="mvp-nav-top-right">
												<?php if (class_exists('WooCommerce')) { ?>
													<div class="mvp-woo-cart-wrap">
														<a class="mvp-woo-cart" href="<?php echo wc_get_cart_url(); ?>"
															title="<?php esc_html_e('View your shopping cart', 'zox-news'); ?>"><span
																class="mvp-woo-cart-num">
																<?php echo WC()->cart->get_cart_contents_count(); ?>
															</span></a><span class="mvp-woo-cart-icon fa fa-shopping-cart"
															aria-hidden="true"></span>
													</div><!--mvp-woo-cart-wrap-->
												<?php } ?>
												<span class="mvp-nav-search-but mvp-search-click"><i
														class="fas fa-search"></i></span>
											</div><!--mvp-nav-top-right-->
										</div><!--mvp-nav-top-right-out-->
									</div><!--mvp-nav-top-wrap-->
								</div><!--mvp-main-box-->
							</div><!--mvp-main-nav-top-->
							<div id="mvp-main-nav-bot" class="left relative">
								<div id="mvp-main-nav-bot-cont" class="left">
									<div class="mvp-main-box">
										<div id="mvp-nav-bot-wrap" class="left">
											<div class="mvp-nav-bot-right-out left">
												<div class="mvp-nav-bot-right-in">
													<div class="mvp-nav-bot-cont left">
														<div class="mvp-nav-bot-left-out">
															<div class="mvp-nav-bot-left left relative">
																<div
																	class="mvp-fly-but-wrap mvp-fly-but-click left relative">
																	<span></span>
																	<span></span>
																	<span></span>
																	<span></span>
																</div><!--mvp-fly-but-wrap-->
															</div><!--mvp-nav-bot-left-->
															<div class="mvp-nav-bot-left-in">
																<div class="mvp-nav-menu left">
																	<?php
																	$ip = geoip_detect2_get_client_ip();
																	//echo($ip);
																	$userInfo = geoip_detect2_get_info_from_current_ip($ip);
																	// $data = unserialize(
																	// 			file_get_contents(
																	// 				'http://ip-api.com/php/'.$ip
																	// 			)
																	// 			, ['allowed_classes' => false]
																	// 	);
																	//$isoCode = $data['countryCode'];
																	//echo($isoCode);
																	$isoCode = $userInfo->country->isoCode;
																	//echo($isoCode);
																	if ($isoCode == 'US') {
																		wp_nav_menu(array('theme_location' => 'main2-menu'));
																	} else {
																		wp_nav_menu(array('theme_location' => 'main-menu'));
																	}
																	?>
																</div><!--mvp-nav-menu-->
															</div><!--mvp-nav-bot-left-in-->
														</div><!--mvp-nav-bot-left-out-->
													</div><!--mvp-nav-bot-cont-->
												</div><!--mvp-nav-bot-right-in-->
												<div class="mvp-nav-bot-right left relative">
													<span class="mvp-nav-search-but mvp-search-click"><i
															class="fas fa-search"></i></span>
												</div><!--mvp-nav-bot-right-->
											</div><!--mvp-nav-bot-right-out-->
										</div><!--mvp-nav-bot-wrap-->
									</div><!--mvp-main-nav-bot-cont-->
								</div><!--mvp-main-box-->
							</div><!--mvp-main-nav-bot-->
						</nav><!--mvp-main-nav-wrap-->
					<?php } ?>
				</header><!--mvp-main-head-wrap-->
				<div id="mvp-main-body-wrap" class="left relative">