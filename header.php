<?php
/**
 * Displays the header content
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
$apporypro_settings = apporypro_get_theme_options(); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif;
wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php 
	if ( function_exists( 'wp_body_open' ) ) {

		wp_body_open();

	} else {

		do_action( 'wp_body_open' );

	} ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#site-content-contain"><?php esc_html_e('Skip to content','apporypro'); ?></a>
<!-- Masthead ============================================= -->
<header id="masthead" class="site-header" role="banner">
	<div class="header-wrap">
		<?php the_custom_header_markup(); ?>
		<!-- Top Header============================================= -->
		<div class="top-header">
			<?php 
			if ($apporypro_settings['apporypro_disable_top_bar'] ==0 ){

				if(is_active_sidebar( 'apporypro_header_info' ) || has_nav_menu( 'top-menu' ) || (has_nav_menu( 'social-link' ) )): ?>
					<div class="top-bar">
						<div class="wrap">
							<?php
							if( is_active_sidebar( 'apporypro_header_info' )) {

								dynamic_sidebar( 'apporypro_header_info' );

							} ?>
							<div class="right-top-bar">

								<?php
								if($apporypro_settings['apporypro_top_social_icons'] == 0):

										do_action('apporypro_social_links');

								endif;


								if(has_nav_menu ('top-menu')){ ?>

									<nav class="top-bar-menu" role="navigation" aria-label="<?php esc_attr_e('Top Bar Menu','apporypro');?>">
										<button class="top-menu-toggle" type="button">
											<span class="screen-reader-text"><?php esc_html_e('Topbar Menu','apporypro');?></span>
											<i class="fas fa-bars"></i>
									  	</button>
										<?php
											wp_nav_menu( array(
												'container' 	=> '',
												'theme_location' => 'top-menu',
												'depth'          => 1,
												'items_wrap'      => '<ul class="top-menu">%3$s</ul>',
											) );
										?>
									</nav> <!-- end .top-bar-menu -->
								<?php } ?>

							</div> <!-- end .right-top-bar -->
						</div> <!-- end .wrap -->
					</div> <!-- end .top-bar -->
				<?php endif;
			} ?>

			<div id="site-branding">
				<div class="wrap">

					<?php do_action('apporypro_site_branding');

					$search_form = $apporypro_settings['apporypro_search_custom_header'];
					if (1 != $search_form) { ?>

						<div id="search-box" class="clearfix">
						<div class="search-box-inner">
								<?php 
									if (! class_exists('woocommerce')) {

										get_search_form();

									} else {

										get_template_part( 'product','searchform');

									}
								?>
						</div>
							</div>  <!-- end #search-box -->
						
					<?php } ?>
					<div class="header-right">
						<?php if( is_active_sidebar( 'apporypro_header_tel_info' )) {

								dynamic_sidebar( 'apporypro_header_tel_info' );

							}

							do_action ('apporypro_cart_wishlist_icon_display'); ?>
					</div><!-- end .header-right -->

					
				</div><!-- end .wrap -->	
			</div><!-- end #site-branding -->
					

			<!-- Main Header============================================= -->
			<div id="sticky-header" class="clearfix">
				<div class="wrap">
					<div class="main-header clearfix">

						<!-- Main Nav ============================================= -->
						<?php $header_display = $apporypro_settings['apporypro_header_display'];
							$apporypro_display_catlog_menu = $apporypro_settings['apporypro_display_catlog_menu']; ?>
							<div id="site-branding">

								<?php
								if ($header_display == 'header_logo' || $header_display == 'show_both') {

									apporypro_the_custom_logo();

								}
								if ($header_display == 'header_text' || $header_display == 'show_both') { ?>
								<div id="site-detail">
									<div id="site-title">
										<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" rel="home"> <?php bloginfo('name');?> </a>
									</div><!-- end .site-title --> 
									<?php
									$site_description = get_bloginfo( 'description', 'display' );
									if ($site_description){ ?>
										<div id="site-description"> <?php bloginfo('description');?> </div> <!-- end #site-description -->
									<?php } ?>
								</div>
							<?php } ?>
							</div><!-- end #site-branding -->
							<?php

								do_action ('apporypro_side_nav_menu');


						if($apporypro_settings['apporypro_disable_main_menu']==0){ ?>

							<nav id="site-navigation" class="main-navigation clearfix" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'apporypro' ); ?>">
							<?php if (has_nav_menu('primary')) {
								$args = array(
								'theme_location' => 'primary',
								'container'      => '',
								'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
								); ?>
							
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<span class="line-bar"></span>
								</button><!-- end .menu-toggle -->
								<?php wp_nav_menu($args);//extract the content from apperance-> nav menu
								} else {// extract the content from page menu only ?>
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<span class="line-bar"></span>
								</button><!-- end .menu-toggle -->
								<?php	wp_page_menu(array('menu_class' => 'menu', 'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>'));
								} ?>
							</nav> <!-- end #site-navigation -->

						<?php } ?>
							<div class="header-right">
								<?php do_action ('apporypro_cart_wishlist_icon_display'); ?>
							</div> <!-- end .header-right -->

					</div> <!-- end .main-header -->
				</div> <!-- end .wrap -->
			</div> <!-- end #sticky-header -->
		</div> <!-- end .top-header -->

	</div> <!-- end .header-wrap -->

	<?php
		if ( is_front_page()){
			if ($apporypro_settings['apporypro_adv_ban_position'] =='above-slider' && class_exists('woocommerce') ){
				do_action ('apporypro_adv_banner_top');
			}

			if ($apporypro_settings['apporypro_cat_slide'] =='above-slider' && class_exists('woocommerce') ){

				do_action ('apporypro_display_front_page_product_categories');
			} 
		} ?>


	<!-- Main Slider ============================================= -->
	<?php
		$apporypro_enable_slider = $apporypro_settings['apporypro_enable_slider'];
		$apporypro_hide_slider_text = $apporypro_settings['apporypro_hide_slider_text']; 
		if ($apporypro_enable_slider=='frontpage'|| $apporypro_enable_slider=='enitresite'){
			 if(is_front_page() && ($apporypro_enable_slider=='frontpage') ) { ?>
			 	<div class="slider-banner-box clearfix <?php if ($apporypro_hide_slider_text =='on'){ echo 'hide-text-content'; } ?> ">
					<div class="slider-banner-wrap">
						<?php if ($apporypro_display_catlog_menu == 'full-display') {

								do_action ('apporypro_side_nav_menu');

							} ?>
						<div class="slider-banner-inner">
								<?php

						 		if($apporypro_settings['apporypro_slider_type'] == 'default_slider') {
									apporypro_category_sliders();

								} else {

									if(class_exists('AppOryPro_Plus_Features')):
										do_action('apporypro_image_sliders');
									endif;
								}
						 	do_action ('apporypro_product_promotions');
						 	?>
			 			</div> <!-- end .slider-banner-inner -->
					</div> <!-- end .slider-banner-wrap -->
				</div> <!-- end .slider-banner-box -->
				
			<?php }
			if($apporypro_enable_slider=='enitresite'){ ?>
				<div class="slider-banner-box clearfix">
					<div class="slider-banner-wrap">
						<?php if ($apporypro_display_catlog_menu == 'full-display') {

								do_action ('apporypro_side_nav_menu');

							} ?>
						<div class="slider-banner-inner">
							<?php

						 		if($apporypro_settings['apporypro_slider_type'] == 'default_slider') {

										apporypro_category_sliders();

								} else {

									if(class_exists('AppOryPro_Plus_Features')):

										do_action('apporypro_image_sliders');

									endif;
								}
						 	do_action ('apporypro_product_promotions');
						 	?>
			 			</div> <!-- end .slider-banner-inner -->
					</div> <!-- end .slider-banner-wrap -->
				</div> <!-- end .slider-banner-box -->
				
			<?php }
		}
		if ( is_front_page()){

			if ($apporypro_settings['apporypro_adv_ban_position'] =='below-slider' && class_exists('woocommerce') ){
				do_action ('apporypro_adv_banner_top');
			}

			if ($apporypro_settings['apporypro_cat_slide'] =='below-slider' && class_exists('woocommerce') ){
				
				do_action ('apporypro_display_front_page_product_categories');
			}
		} ?>
</header> <!-- end #masthead -->

<!-- Main Page Start ============================================= -->
<div id="site-content-contain" class="site-content-contain">
	<div id="content" class="site-content">