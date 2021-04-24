<?php
/**
 * This template to displays woocommerce page
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */

get_header();
	$apporypro_settings = apporypro_get_theme_options();
	global $apporypro_content_layout;
	if( $post ) {
		$layout = get_post_meta( get_queried_object_id(), 'apporypro_sidebarlayout', true );
	}
	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
		$layout = 'default';
	} ?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php apporypro_breadcrumb();
			woocommerce_content(); ?>
		</main><!-- end #main -->
	</div> <!-- #primary -->
<?php 
if( 'default' == $layout ) { //Settings from customizer
	if(($apporypro_settings['apporypro_sidebar_layout_options'] != 'nosidebar') && ($apporypro_settings['apporypro_sidebar_layout_options'] != 'fullwidth')){ ?>
<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Secondary', 'apporypro' ); ?>">
	<?php }
} 
	if( 'default' == $layout ) { //Settings from customizer
		if(($apporypro_settings['apporypro_sidebar_layout_options'] != 'nosidebar') && ($apporypro_settings['apporypro_sidebar_layout_options'] != 'fullwidth')): ?>
		<?php dynamic_sidebar( 'apporypro_woocommerce_sidebar' ); ?>
</aside><!-- end #secondary -->
<?php endif;
	}
?>
</div><!-- end .wrap -->
<?php
get_footer();