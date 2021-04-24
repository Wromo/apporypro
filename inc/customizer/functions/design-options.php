<?php
/**
 * Theme Customizer Functions
 * 
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */
$apporypro_settings = apporypro_get_theme_options();

$wp_customize->add_section('apporypro_layout_options', array(
	'title' => __('Layout Options', 'apporypro'),
	'priority' => 102,
	'panel' => 'apporypro_options_panel'
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_display_catlog_menu]', array(
	'default' => $apporypro_settings['apporypro_display_catlog_menu'],
	'sanitize_callback' => 'apporypro_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_display_catlog_menu]', array(
	'priority'=>20,
	'label' => __('Show Catalog Menu', 'apporypro'),
	'section' => 'apporypro_layout_options',
	'type' => 'select',
	'choices' => array(
		'full-display' => __('Display on Slider','apporypro'),
		'on-click' => __('Display on Main Menu','apporypro'),
	),
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_post_category]', array(
	'default' => $apporypro_settings['apporypro_post_category'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_post_category]', array(
	'priority'=>30,
	'label' => __('Disable Category', 'apporypro'),
	'section' => 'apporypro_layout_options',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_post_author]', array(
	'default' => $apporypro_settings['apporypro_post_author'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_post_author]', array(
	'priority'=>40,
	'label' => __('Disable Author', 'apporypro'),
	'section' => 'apporypro_layout_options',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_post_date]', array(
	'default' => $apporypro_settings['apporypro_post_date'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_post_date]', array(
	'priority'=>50,
	'label' => __('Disable Date', 'apporypro'),
	'section' => 'apporypro_layout_options',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_post_comments]', array(
	'default' => $apporypro_settings['apporypro_post_comments'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_post_comments]', array(
	'priority'=>60,
	'label' => __('Disable Comments', 'apporypro'),
	'section' => 'apporypro_layout_options',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_entry_meta_single]', array(
	'default' => $apporypro_settings['apporypro_entry_meta_single'],
	'sanitize_callback' => 'apporypro_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_entry_meta_single]', array(
	'priority'=>70,
	'label' => __('Disable Entry Meta from Single Page', 'apporypro'),
	'section' => 'apporypro_layout_options',
	'type' => 'select',
	'choices' => array(
		'show' => __('Display Entry Format','apporypro'),
		'hide' => __('Hide Entry Format','apporypro'),
	),
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_entry_meta_blog]', array(
	'default' => $apporypro_settings['apporypro_entry_meta_blog'],
	'sanitize_callback' => 'apporypro_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_entry_meta_blog]', array(
	'priority'=>80,
	'label' => __('Disable Entry Meta from Blog Page', 'apporypro'),
	'section' => 'apporypro_layout_options',
	'type'	=> 'select',
	'choices' => array(
		'show-meta' => __('Display Entry Meta','apporypro'),
		'hide-meta' => __('Hide Entry Meta','apporypro'),
	),
));

$wp_customize->add_setting('apporypro_theme_options[apporypro_blog_content_layout]', array(
   'default'        => $apporypro_settings['apporypro_blog_content_layout'],
   'sanitize_callback' => 'apporypro_sanitize_select',
   'type'                  => 'option',
   'capability'            => 'manage_options'
));
$wp_customize->add_control('apporypro_theme_options[apporypro_blog_content_layout]', array(
   'priority'  =>90,
   'label'      => __('Blog Content Display', 'apporypro'),
   'section'    => 'apporypro_layout_options',
   'type'       => 'select',
   'choices'    => array(
       'fullcontent_display' => __('Blog Full Content Display','apporypro'),
       'excerptblog_display' => __(' Excerpt  Display','apporypro'),
   ),
));

$wp_customize->add_setting('apporypro_theme_options[apporypro_design_layout]', array(
	'default'        => $apporypro_settings['apporypro_design_layout'],
	'sanitize_callback' => 'apporypro_sanitize_select',
	'type'                  => 'option',
));
$wp_customize->add_control('apporypro_theme_options[apporypro_design_layout]', array(
	'priority'  =>100,
	'label'      => __('Design Layout', 'apporypro'),
	'section'    => 'apporypro_layout_options',
	'type'       => 'select',
	'choices'    => array(
		'full-width-layout' => __('Full Width Layout','apporypro'),
		'boxed-layout' => __('Boxed Layout','apporypro'),
		'small-boxed-layout' => __('Small Boxed Layout','apporypro'),
	),
));