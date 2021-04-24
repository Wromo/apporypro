<?php
/**
 * The sidebar containing the main Sidebar area.
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */
	$apporypro_settings = apporypro_get_theme_options();
	global $apporypro_content_layout;
	if( $post ) {
		$layout = get_post_meta( get_queried_object_id(), 'apporypro_sidebarlayout', true );
	}
	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
		$layout = 'default';
	}

if( 'default' == $layout ) { //Settings from customizer
	if(($apporypro_settings['apporypro_sidebar_layout_options'] != 'nosidebar') && ($apporypro_settings['apporypro_sidebar_layout_options'] != 'fullwidth')){ ?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Secondary', 'apporypro' ); ?>">
<?php }
}else{ // for page/ post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>
<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Secondary', 'apporypro' ); ?>">
  <?php }
	}?>
  <?php 
	if( 'default' == $layout ) { //Settings from customizer
		if(($apporypro_settings['apporypro_sidebar_layout_options'] != 'nosidebar') && ($apporypro_settings['apporypro_sidebar_layout_options'] != 'fullwidth')): ?>
  <?php dynamic_sidebar( 'apporypro_main_sidebar' ); ?>
</aside><!-- end #secondary -->
<?php endif;
	}else{ // for page/post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){
			dynamic_sidebar( 'apporypro_main_sidebar' );
			echo '</aside><!-- end #secondary -->';
		}
	}