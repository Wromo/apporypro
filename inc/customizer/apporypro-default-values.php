<?php
if(!function_exists('apporypro_get_option_defaults_values')):
	/******************** APPORYPRO DEFAULT OPTION VALUES ******************************************/
	function apporypro_get_option_defaults_values() {
		global $apporypro_default_values;
		$apporypro_default_values = array(
			'apporypro_design_layout' => 'full-width-layout',
			'apporypro_post_category' => 0,
			'apporypro_display_catlog_menu' => 'on-click',
			'apporypro_post_author' => 0,
			'apporypro_post_date' => 0,
			'apporypro_post_comments' => 0,
			'apporypro_sidebar_layout_options' => 'right',
			'apporypro_search_custom_header' => 0,
			'apporypro_header_display'=> 'header_text',
			'apporypro_scroll'	=> 0,
			'apporypro_tag_text' => esc_html__('Continue Reading','apporypro'),
			'apporypro_excerpt_length'	=> '50',
			'apporypro_enable_fixed_height' => 0,
			'apporypro_reset_all' => 0,
			'apporypro_stick_menu'	=>0,
			'apporypro_blog_post_image' => 'on',
			'apporypro_search_text' => esc_html__('Search &hellip;','apporypro'),
			'apporypro_search_product_text' => esc_html__('Search Products &hellip;','apporypro'),
			'apporypro_blog_content_layout'	=> 'fullcontent_display',
			'apporypro_entry_meta_single' => 'show',
			'apporypro_entry_meta_blog' => 'show-meta',
			'apporypro_footer_column_section'	=>'4',
			'apporypro_disable_main_menu' => 0,
			'apporypro_disable_top_bar' => 0,
			'apporypro_img-product-promotion-image-1' => '',
			'apporypro_img-product-promotion-image-2' => '',
			'apporypro_product_promotion_url_1' => '',
			'apporypro_product_promotion_url_2' => '',
			'apporypro_product_promotion_name_1' => '',
			'apporypro_product_promotion_name_2' => '',
			'apporypro_product_promotion_desc_1' => '',
			'apporypro_product_promotion_desc_2' => '',
			'apporypro_cat_slide' => 'above-slider',
			'apporypro_logo_high_resolution' => 0,

			/* Slider Settings */
			'apporypro_default_category'	=> 'post_category',
			'apporypro_slider_type'	=> 'default_slider',
			'apporypro_enable_slider' => 'disable',
			'apporypro_category_slider' =>array(),
			'apporypro_default_category_slider' => '',
			'apporypro_slider_number'	=> '3',
			'apporypro_disable_slide_animation' =>'on',
			'apporypro_shopnow_text' => esc_html__('Shop','apporypro'),
			'apporypro_hide_slider_text' => 'off',
			'apporypro_slider_text_bg_col'=> 'off',

			/* Layer Slider */
			'apporypro_animation_effect' => 'fade',
			'apporypro_slideshowSpeed' => '5',
			'apporypro_animationSpeed' => '7',
			'apporypro_display_page_single_featured_image'=>0,

			/* Front page feature */
			/* Frontpage Product Featured Brands */
			'apporypro_disable_product_brand'	=> 1,
			'apporypro_total_brand_features'	=> '8',
			'apporypro_features_title'	=> '',
			'apporypro_features_description'	=> '',

			/* Frontpage Product Categories */
			'apporypro_disable_product_categories'	=> 1,
			'apporypro_total_features'	=> '13',
			/*Social Icons */
			'apporypro_top_social_icons' =>0,
			'apporypro_buttom_social_icons'	=>0,
			'apporypro_slider_sliderfullwidth'	=> 0,
			'apporypro_adv_ban_position' => 'above-slider',
			);
		return apply_filters( 'apporypro_get_option_defaults_values', $apporypro_default_values );
	}
endif;