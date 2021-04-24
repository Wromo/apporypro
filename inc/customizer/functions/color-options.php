<?php
/**
 * Theme Customizer Functions
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */
/********************* Color Option **********************************************/
	$wp_customize->add_section( 'color_styles', array(
		'title' 						=> __('Color Options','apporypro'),
		'priority'					=> 10,
		'panel'					=>'colors'
	));

	$wp_customize->add_section( 'colors', array(
		'title' 						=> __('Background Color Options','apporypro'),
		'priority'					=> 100,
		'panel'					=>'colors'
	));

	$wp_customize->add_setting( 'theme_color_styles', array(
		'default'				=> '#2e7fff',
		'sanitize_callback'	=> 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color_styles', array(
		'description'       => __( 'Theme Color Styles', 'apporypro' ),
		'section'     => 'color_styles',
		'priority'					=> 10,
	) ) );