<?php
/**
 * Theme Customizer Functions
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */
/******************** APPORYPRO CUSTOMIZE REGISTER *********************************************/
add_action( 'customize_register', 'apporypro_customize_register_wordpress_default' );
function apporypro_customize_register_wordpress_default( $wp_customize ) {
	$wp_customize->add_panel( 'apporypro_wordpress_default_panel', array(
		'priority' => 5,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'WordPress Settings', 'apporypro' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'apporypro_customize_register_options');
function apporypro_customize_register_options( $wp_customize ) {
	$wp_customize->add_panel( 'apporypro_options_panel', array(
		'priority' => 6,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options', 'apporypro' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'apporypro_customize_register_featuredcontent' );
function apporypro_customize_register_featuredcontent( $wp_customize ) {
	$wp_customize->add_panel( 'apporypro_featuredcontent_panel', array(
		'priority' => 8,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Slider Options', 'apporypro' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'apporypro_customize_register_frontpage_options');
function apporypro_customize_register_frontpage_options( $wp_customize ) {
	$wp_customize->add_panel( 'apporypro_frontpage_panel', array(
		'priority' => 7,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Frontpage Template', 'apporypro' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'apporypro_customize_register_colors' );
function apporypro_customize_register_colors( $wp_customize ) {
	$wp_customize->add_panel( 'colors', array(
		'priority' => 9,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Colors Section', 'apporypro' ),
		'description' => '',
	) );
}