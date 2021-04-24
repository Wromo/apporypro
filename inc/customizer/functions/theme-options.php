<?php
/**
 * Theme Customizer Functions
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */
$apporypro_settings = apporypro_get_theme_options();
/********************** APPORYPRO DEFAULT PANEL ***********************************/
$wp_customize->add_section('header_image', array(
'title' => __('Header Media', 'apporypro'),
'priority' => 20,
'panel' => 'apporypro_wordpress_default_panel'
));
$wp_customize->add_section('colors', array(
'title' => __('Colors', 'apporypro'),
'priority' => 30,
'panel' => 'apporypro_wordpress_default_panel'
));
$wp_customize->add_section('background_image', array(
'title' => __('Background Image', 'apporypro'),
'priority' => 40,
'panel' => 'apporypro_wordpress_default_panel'
));
$wp_customize->add_section('nav', array(
'title' => __('Navigation', 'apporypro'),
'priority' => 50,
'panel' => 'apporypro_wordpress_default_panel'
));
$wp_customize->add_section('static_front_page', array(
'title' => __('Static Front Page', 'apporypro'),
'priority' => 60,
'panel' => 'apporypro_wordpress_default_panel'
));
$wp_customize->add_section('title_tagline', array(
	'title' => __('Site Title & Logo Options', 'apporypro'),
	'priority' => 10,
	'panel' => 'apporypro_wordpress_default_panel'
));

$wp_customize->add_section('apporypro_custom_header', array(
	'title' => __('Options', 'apporypro'),
	'priority' => 503,
	'panel' => 'apporypro_options_panel'
));

/********************  APPORYPRO THEME OPTIONS *****************************************/

$wp_customize->add_setting('apporypro_theme_options[apporypro_header_display]', array(
	'capability' => 'edit_theme_options',
	'default' => $apporypro_settings['apporypro_header_display'],
	'sanitize_callback' => 'apporypro_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control('apporypro_theme_options[apporypro_header_display]', array(
	'label' => __('Site Logo/ Text Options', 'apporypro'),
	'priority' => 105,
	'section' => 'title_tagline',
	'type' => 'select',
		'choices' => array(
		'header_text' => __('Display Site Title Only','apporypro'),
		'header_logo' => __('Display Site Logo Only','apporypro'),
		'show_both' => __('Show Both','apporypro'),
		'disable_both' => __('Disable Both','apporypro'),
	),
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_logo_high_resolution]', array(
	'default' => $apporypro_settings['apporypro_logo_high_resolution'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_logo_high_resolution]', array(
	'priority'=>110,
	'label' => __('Logo for high resolution screen(Use 2X size image)', 'apporypro'),
	'section' => 'title_tagline',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_disable_top_bar]', array(
	'default' => $apporypro_settings['apporypro_disable_top_bar'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_disable_top_bar]', array(
	'priority'=>5,
	'label' => __('Disable Top Bar', 'apporypro'),
	'section' => 'apporypro_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_search_custom_header]', array(
	'default' => $apporypro_settings['apporypro_search_custom_header'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_search_custom_header]', array(
	'priority'=>20,
	'label' => __('Disable Search Form', 'apporypro'),
	'section' => 'apporypro_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_stick_menu]', array(
	'default' => $apporypro_settings['apporypro_stick_menu'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_stick_menu]', array(
	'priority'=>30,
	'label' => __('Disable Stick Menu', 'apporypro'),
	'section' => 'apporypro_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_scroll]', array(
	'default' => $apporypro_settings['apporypro_scroll'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_scroll]', array(
	'priority'=>40,
	'label' => __('Disable Goto Top', 'apporypro'),
	'section' => 'apporypro_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_top_social_icons]', array(
	'default' => $apporypro_settings['apporypro_top_social_icons'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_top_social_icons]', array(
	'priority'=>50,
	'label' => __('Disable Top Social Icons', 'apporypro'),
	'section' => 'apporypro_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_buttom_social_icons]', array(
	'default' => $apporypro_settings['apporypro_buttom_social_icons'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_buttom_social_icons]', array(
	'priority'=>70,
	'label' => __('Disable Bottom Social Icons', 'apporypro'),
	'section' => 'apporypro_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_display_page_single_featured_image]', array(
	'default' => $apporypro_settings['apporypro_display_page_single_featured_image'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_display_page_single_featured_image]', array(
	'priority'=>100,
	'label' => __('Disable Page/Single Featured Image', 'apporypro'),
	'section' => 'apporypro_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_disable_main_menu]', array(
	'default' => $apporypro_settings['apporypro_disable_main_menu'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_disable_main_menu]', array(
	'priority'=>120,
	'label' => __('Disable Main Menu', 'apporypro'),
	'section' => 'apporypro_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_enable_fixed_height]', array(
	'default' => $apporypro_settings['apporypro_enable_fixed_height'],
	'sanitize_callback' => 'apporypro_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_enable_fixed_height]', array(
	'priority'=>130,
	'label' => __('Enable Fixed height(Two line) product title', 'apporypro'),
	'section' => 'apporypro_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'apporypro_theme_options[apporypro_reset_all]', array(
	'default' => $apporypro_settings['apporypro_reset_all'],
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'apporypro_reset_alls',
	'transport' => 'postMessage',
));
$wp_customize->add_control( 'apporypro_theme_options[apporypro_reset_all]', array(
	'priority'=>140,
	'label' => __('Reset all default settings. (Refresh it to view the effect)', 'apporypro'),
	'section' => 'apporypro_custom_header',
	'type' => 'checkbox',
));