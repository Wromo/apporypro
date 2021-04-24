<?php
/**
 * Theme Customizer Functions
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */
$apporypro_categories_lists = apporypro_categories_lists();

/******************** APPORYPRO SLIDER SETTINGS ******************************************/
$apporypro_settings = apporypro_get_theme_options();
$wp_customize->add_section( 'featured_content', array(
	'title' => __( 'Slider Settings', 'apporypro' ),
	'priority' => 140,
	'panel' => 'apporypro_featuredcontent_panel'
));

$wp_customize->add_section( 'product_promotion', array(
	'title' => __( 'Product Promotion', 'apporypro' ),
	'priority' => 150,
	'panel' => 'apporypro_featuredcontent_panel'
));


/* WooCommerce Slider Category Section */

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_enable_slider]', array(
	'default' => $apporypro_settings['apporypro_enable_slider'],
	'sanitize_callback' => 'apporypro_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_enable_slider]', array(
	'priority'=>5,
	'label' => __('Enable Slider/ Promotions', 'apporypro'),
	'description' => __('This section includes Catalog Menu, Slider and Product Promotion', 'apporypro'),
	'section' => 'featured_content',
	'type' => 'select',
	'choices' => array(
		'frontpage' => __('Front Page','apporypro'),
		'enitresite' => __('Entire Site','apporypro'),
		'disable' => __('Disable Slider Promotions','apporypro'),
	),
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_disable_slide_animation]', array(
	'default' => $apporypro_settings['apporypro_disable_slide_animation'],
	'sanitize_callback' => 'apporypro_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_disable_slide_animation]', array(
	'priority'=>10,
	'label' => __('Disable Slide animation', 'apporypro'),
	'section' => 'featured_content',
	'type' => 'select',
	'choices' => array(
		'on' => __('Show','apporypro'),
		'off' => __('Disable','apporypro'),
	),
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_hide_slider_text]', array(
	'default' => $apporypro_settings['apporypro_hide_slider_text'],
	'sanitize_callback' => 'apporypro_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_hide_slider_text]', array(
	'priority'=>12,
	'label' => __('Disable Slider Text', 'apporypro'),
	'section' => 'featured_content',
	'type' => 'select',
	'choices' => array(
		'on' => __('Disable','apporypro'),
		'off' => __('Show','apporypro'),
	),
));


$wp_customize->add_setting( 'apporypro_theme_options[apporypro_default_category]', array(
	'default' => $apporypro_settings['apporypro_default_category'],
	'sanitize_callback' => 'apporypro_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_default_category]', array(
	'priority'=>15,
	'label' => __('Category/ Product Category Slider', 'apporypro'),
	'description' => __('You need to enable WooCommerce Plugins to display Products on Slider','apporypro'),
	'section' => 'featured_content',
	'type' => 'select',
	'choices' => array(
		'post_category' => __('Default Category','apporypro'),
		'product_category' => __('Product Category','apporypro'),
	),
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_shopnow_text]', array(
	'default' => $apporypro_settings['apporypro_shopnow_text'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_shopnow_text]', array(
	'priority'=>20,
	'label' => __('Change Slider Text', 'apporypro'),
	'section' => 'featured_content',
	'type' => 'text',
));



if(class_exists( 'woocommerce' )) {
	$apporypro_prod_categories_lists = apporypro_product_categories_lists();

		$wp_customize->add_setting(
			'apporypro_theme_options[apporypro_category_slider]', array(
				'default'				=>array(),
				'capability'			=> 'manage_options',
				'sanitize_callback'	=> 'apporypro_sanitize_category_select',
				'type'				=> 'option'
			)
		);
		$wp_customize->add_control(
			'apporypro_theme_options[apporypro_category_slider]',
			array(
				'priority'    => 20,
				'label'       => __( 'Select Products Category Slider', 'apporypro' ),
				'description' => __('Slider Recommended image size is ( 1500 X 850 )','apporypro'),
				'section'     => 'featured_content',
				'settings'				=> 'apporypro_theme_options[apporypro_category_slider]',
				'choices'     => $apporypro_prod_categories_lists,
				'type'        => 'select',
				'active_callback' => 'apporypro_product_category_callback',
			)
		);
}

		$wp_customize->add_setting( 'apporypro_theme_options[apporypro_default_category_slider]', array(
				'default'				=>$apporypro_settings['apporypro_default_category_slider'],
				'capability'			=> 'manage_options',
				'sanitize_callback'	=> 'apporypro_sanitize_category_select',
				'type'				=> 'option'
			));
		$wp_customize->add_control(
			
			'apporypro_theme_options[apporypro_default_category_slider]',
				array(
					'priority' 				=> 10,
					'label'					=> __('Select Post Category Slider','apporypro'),
					'description'					=> __('By default no slider is displayed. Slider Recommended image size is ( 1500 X 850 )','apporypro'),
					'section'				=> 'featured_content',
					'settings'				=> 'apporypro_theme_options[apporypro_default_category_slider]',
					'type'					=>'select',
					'active_callback' => 'apporypro_post_category_callback',
					'choices'	=>  $apporypro_categories_lists 
			)
		);

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_animation_effect]', array(
	'default' => $apporypro_settings['apporypro_animation_effect'],
	'sanitize_callback' => 'apporypro_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_animation_effect]', array(
	'priority'=>30,
	'label' => __('Animation Effect', 'apporypro'),
	'section' => 'featured_content',
	'type' => 'select',
	'choices' => array(
		'slide' => __('Slide','apporypro'),
		'fade' => __('Fade','apporypro'),
	),
));

/*************** Slider Text Background Color ************************/
    $wp_customize->add_setting('apporypro_theme_options[apporypro_slider_text_bg_col]', array(
        'default'        => $apporypro_settings['apporypro_slider_text_bg_col'],
        'sanitize_callback' => 'apporypro_sanitize_select',
        'type'                  => 'option',
        'capability'            => 'manage_options'
    ));
    $wp_customize->add_control('apporypro_theme_options[apporypro_slider_text_bg_col]', array(
        'priority'      => 30,
        'label'      => __('Slider and Promotion Text Background Color', 'apporypro'),
        'section'    => 'featured_content',
        'type'       => 'select',
        'checked'   => 'checked',
        'choices'    => array(
            'on' => __('On','apporypro'),
            'off' => __('Off','apporypro'),
        ),
    ));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_slideshowSpeed]', array(
	'default' => $apporypro_settings['apporypro_slideshowSpeed'],
	'sanitize_callback' => 'apporypro_numeric_value',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_slideshowSpeed]', array(
	'priority'=>40,
	'label' => __('Set the speed of the slideshow cycling', 'apporypro'),
	'section' => 'featured_content',
	'type' => 'text',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_animationSpeed]', array(
	'default' => $apporypro_settings['apporypro_animationSpeed'],
	'sanitize_callback' => 'apporypro_numeric_value',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_animationSpeed]', array(
	'priority'=>50,
	'label' => __(' Set the speed of animations', 'apporypro'),
	'description' => __('This feature will not work on Animation Effect set to fade','apporypro'),
	'section' => 'featured_content',
	'type' => 'text',
));

/********************** Product Promotion Image ***********************************/
for ( $i=1; $i <= 2; $i++ ) {
	$wp_customize->add_setting( 'apporypro_theme_options[apporypro_product_promotion_name_'.$i.']', array(
		'default' => $apporypro_settings['apporypro_product_promotion_name_'.$i],
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control( 'apporypro_theme_options[apporypro_product_promotion_name_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __(' Enter Text #', 'apporypro')  .$i,
		'section' => 'product_promotion',
		'type' => 'text',
	));
	$wp_customize->add_setting( 'apporypro_theme_options[apporypro_img-product-promotion-image-'.$i.']',array(
		'default'	=> $apporypro_settings['apporypro_img-product-promotion-image-'.$i],
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'apporypro_theme_options[apporypro_img-product-promotion-image-'.$i.']', array(
		'label' => __('Product Promotion #','apporypro') .$i,
		'priority'=>10 .$i,
		'description' => __('Recommended Image size ( 648 X 340 )','apporypro'),
		'section' => 'product_promotion',
		)
	));

	$wp_customize->add_setting( 'apporypro_theme_options[apporypro_product_promotion_url_'.$i.']', array(
		'default' => $apporypro_settings['apporypro_product_promotion_url_'.$i],
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( 'apporypro_theme_options[apporypro_product_promotion_url_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __(' Enter Product Url #', 'apporypro')  .$i,
		'section' => 'product_promotion',
		'type' => 'text',
	));
}


	