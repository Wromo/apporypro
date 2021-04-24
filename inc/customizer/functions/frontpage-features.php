<?php
/**
 * Theme Customizer Functions
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */

/******************** APPORYPRO FRONTPAGE  *********************************************/
/* Frontpage AppOryPro */
$apporypro_settings = apporypro_get_theme_options();
$apporypro_prod_categories_lists = apporypro_product_categories_lists();

$wp_customize->add_section( 'apporypro_product_category', array(
	'title' => __('Product Categories Icon Slide','apporypro'),
	'priority' => 10,
	'panel' =>'apporypro_frontpage_panel'
));

$wp_customize->add_section( 'apporypro_frontpage_features', array(
	'title' => __('Product Featured Brands','apporypro'),
	'priority' => 20,
	'panel' =>'apporypro_frontpage_panel'
));

/* Frontpage Product Featured Brands */
$wp_customize->add_setting( 'apporypro_theme_options[apporypro_disable_product_brand]', array(
	'default' => $apporypro_settings['apporypro_disable_product_brand'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_disable_product_brand]', array(
	'priority' => 5,
	'label' => __('Disable Product Brand Section', 'apporypro'),
	'section' => 'apporypro_frontpage_features',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_features_title]', array(
	'default' => $apporypro_settings['apporypro_features_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'apporypro_theme_options[apporypro_features_title]', array(
	'priority' => 20,
	'label' => __( 'Title', 'apporypro' ),
	'section' => 'apporypro_frontpage_features',
	'type' => 'text',
	)
);

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_features_description]', array(
	'default' => $apporypro_settings['apporypro_features_description'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'apporypro_theme_options[apporypro_features_description]', array(
	'priority' => 25,
	'label' => __( 'Description', 'apporypro' ),
	'section' => 'apporypro_frontpage_features',
	'type' => 'text',
	)
);

for ( $i=1; $i <= $apporypro_settings['apporypro_total_brand_features'] ; $i++ ) {
	$wp_customize->add_setting(
		'apporypro_theme_options[apporypro_featured_product_brand_'. $i .']', array(
			'default'				=>'',
			'capability'			=> 'manage_options',
			'sanitize_callback'	=> 'apporypro_sanitize_category_select',
			'type'				=> 'option'
		)
	);
	$wp_customize->add_control(
		'apporypro_theme_options[apporypro_featured_product_brand_'. $i .']',
		array(
			'priority' => 20 . absint($i),
			'label'       => __( 'Featured Products Brand #', 'apporypro' ) . $i,
			'section'     => 'apporypro_frontpage_features',
			'choices'     => $apporypro_prod_categories_lists,
			'type'        => 'select',
		)
	);
}

/* Product Categories Slide Icon */
$wp_customize->add_setting( 'apporypro_theme_options[apporypro_disable_product_categories]', array(
	'default' => $apporypro_settings['apporypro_disable_product_categories'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_disable_product_categories]', array(
	'priority' => 10,
	'label' => __('Disable Product Category Section', 'apporypro'),
	'section' => 'apporypro_product_category',
	'type' => 'checkbox',
));

$wp_customize->add_setting('apporypro_theme_options[apporypro_total_features]', array(
	'default' => $apporypro_settings['apporypro_total_features'],
	'sanitize_callback' => 'apporypro_numeric_value',
	'type' => 'option',
	'capability' => 'manage_options'
	));
$wp_customize->add_control('apporypro_theme_options[apporypro_total_features]', array(
	'priority' => 10,
	'label' => __('No of Categroy Features', 'apporypro'),
	'section' => 'apporypro_product_category',
	'type' => 'text',
	) );

$wp_customize->add_setting('apporypro_theme_options[apporypro_cat_slide]', array(
		'default'        => $apporypro_settings['apporypro_cat_slide'],
		'sanitize_callback' => 'apporypro_sanitize_select',
		'type'                  => 'option',
		'capability'            => 'manage_options'
	));
$wp_customize->add_control('apporypro_theme_options[apporypro_cat_slide]', array(
	'priority'  =>15,
	'label'      => __('Display Category Icon Slide', 'apporypro'),
	'section'    => 'apporypro_product_category',
	'type'       => 'select',
	'choices'    => array(
	'above-slider' => __('Above Slider','apporypro'),
	'below-slider' => __('Below Slider','apporypro'),
	),
));

for ( $i=1; $i <= $apporypro_settings['apporypro_total_features'] ; $i++ ) {
	$wp_customize->add_setting(
		'apporypro_theme_options[apporypro_featured_category_'. $i .']', array(
			'default'				=>'',
			'capability'			=> 'manage_options',
			'sanitize_callback'	=> 'apporypro_sanitize_category_select',
			'type'				=> 'option'
		)
	);
	$wp_customize->add_control(
		'apporypro_theme_options[apporypro_featured_category_'. $i .']',
		array(
			'priority' => 50 . absint($i),
			'label'       => __( 'Featured Products category #', 'apporypro' ) . $i ,
			'section'     => 'apporypro_product_category',
			'choices'     => $apporypro_prod_categories_lists,
			'type'        => 'select',
		)
	);
}