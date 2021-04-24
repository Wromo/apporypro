<?php
/**
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */
/**************** APPORYPRO REGISTER WIDGETS ***************************************/
add_action('widgets_init', 'apporypro_widgets_init');
function apporypro_widgets_init() {

	register_sidebar(array(
			'name' => __('Main Sidebar', 'apporypro'),
			'id' => 'apporypro_main_sidebar',
			'description' => __('Shows widgets at Main Sidebar.', 'apporypro'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('Top Header Info', 'apporypro'),
			'id' => 'apporypro_header_info',
			'description' => __('Shows widgets on all page.', 'apporypro'),
			'before_widget' => '<aside id="%1$s" class="widget widget_contact">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Header Tel. Info', 'apporypro'),
			'id' => 'apporypro_header_tel_info',
			'description' => __('Drag text widgets and add title as tel info and content as short description', 'apporypro'),
			'before_widget' => '<div class="header-tel-info">',
			'after_widget' => '</div>',
			'before_title' => '<p class="tel-info-title">',
			'after_title' => '</p>',
		));
	register_sidebar(array(
			'name' => __('AppOryPro Template', 'apporypro'),
			'id' => 'apporypro_template',
			'description' => __('Shows widgets on AppOryPro Template.', 'apporypro'),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-outer-wrap"> <div class="wrap">',
			'after_widget' => '</div><!-- end .wrap --> </div><!-- end .widget-outer-wrap --></section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('Contact Page Sidebar', 'apporypro'),
			'id' => 'apporypro_contact_page_sidebar',
			'description' => __('Shows widgets on Contact Page Template.', 'apporypro'),
			'before_widget' => '<aside id="%1$s" class="widget widget_contact">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Iframe Code For Google Maps', 'apporypro'),
			'id' => 'apporypro_form_for_contact_page',
			'description' => __('Add Iframe Code using text widgets', 'apporypro'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('WooCommerce Sidebar', 'apporypro'),
			'id' => 'apporypro_woocommerce_sidebar',
			'description' => __('Add WooCommerce Widgets Only', 'apporypro'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));

	for($i =1; $i<= 4; $i++){

		// Registering for AppOryPro Template Footer Column
		register_sidebar(array(
			'name'          => __(' AppOryPro Template Footer Column ', 'apporypro') . $i,
			'id'            => 'apporypro_template_footer_col_'.$i,
			'description'   => __(' Add WooCommerce widgets at AppOryPro Template Footer Column ', 'apporypro').$i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));

	}

	$apporypro_settings = apporypro_get_theme_options();
	for($i =1; $i<= $apporypro_settings['apporypro_footer_column_section']; $i++){
	register_sidebar(array(
			'name' => __('Footer Column ', 'apporypro') . $i,
			'id' => 'apporypro_footer_'.$i,
			'description' => __('Shows widgets at Footer Column ', 'apporypro').$i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	}

	register_widget( 'AppOryPro_popular_Widgets' );

	if ( class_exists('woocommerce')) {
		//Register Widget.
		register_widget( 'apporypro_banner_with_text_widget' );
		register_widget( 'apporypro_image_category_widget' );
		register_widget( 'apporypro_category_tab_box_widget' );
		register_widget( 'apporypro_index_text_widget' );
		register_widget( 'AppOryPro_product_grid_column_Widget' );
		register_widget( 'AppOryPro_category_latest_blog_Widget' );
		
	}
}