<?php
/**
 * Theme Customizer Functions
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */
/********************* APPORYPRO CUSTOMIZER SANITIZE FUNCTIONS *******************************/
function apporypro_checkbox_integer( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function apporypro_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

function apporypro_sanitize_category_select($input) {
	
	$input = sanitize_key( $input );
	return ( ( isset( $input ) && true == $input ) ? $input : '' );

}

function apporypro_numeric_value( $input ) {
	if(is_numeric($input)){
	return $input;
	}
}

function apporypro_reset_alls( $input ) {
	if ( $input == 1 ) {
		delete_option( 'apporypro_theme_options');
		$input=0;
		return absint($input);
	} 
	else {
		return '';
	}
}

/************** Active Callback *************************************/
function apporypro_post_category_callback( $control ) {
   if ( $control->manager->get_setting('apporypro_theme_options[apporypro_default_category]')->value() == 'post_category' ) {
      return true;
   } else {
      return false;
   }
}


function apporypro_product_category_callback( $control ) {
    if ( $control->manager->get_setting('apporypro_theme_options[apporypro_default_category]')->value() == 'product_category' ) {
      return true;
   } else {
      return false;
   }
}