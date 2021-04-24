<?php
/**
 * Template for displaying search forms
 * 
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'apporypro' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr__( 'Search &hellip;', 'apporypro' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
</form>