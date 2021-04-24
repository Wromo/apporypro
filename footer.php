<?php
/**
 * The main template file.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */


$apporypro_settings = apporypro_get_theme_options(); ?>
</div><!-- end #content -->
<!-- Footer Start ============================================= -->
<footer id="colophon" class="site-footer" role="contentinfo">
<?php

$footer_column = $apporypro_settings['apporypro_footer_column_section'];
	if( is_active_sidebar( 'apporypro_footer_1' ) || is_active_sidebar( 'apporypro_footer_2' ) || is_active_sidebar( 'apporypro_footer_3' ) || is_active_sidebar( 'apporypro_footer_4' )) { ?>
	<div class="widget-wrap">
		<div class="wrap">
			<div class="widget-area">
			<?php
				if($footer_column == '1' || $footer_column == '2' ||  $footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'apporypro_footer_1' ) ) :
						dynamic_sidebar( 'apporypro_footer_1' );
					endif;
				echo '</div><!-- end .column'.absint($footer_column). '  -->';
				}
				if($footer_column == '2' ||  $footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'apporypro_footer_2' ) ) :
						dynamic_sidebar( 'apporypro_footer_2' );
					endif;
				echo '</div><!--end .column'.absint($footer_column).'  -->';
				}
				if($footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'apporypro_footer_3' ) ) :
						dynamic_sidebar( 'apporypro_footer_3' );
					endif;
				echo '</div><!--end .column'.absint($footer_column).'  -->';
				}
				if($footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'apporypro_footer_4' ) ) :
						dynamic_sidebar( 'apporypro_footer_4' );
					endif;
				echo '</div><!--end .column'.absint($footer_column).  '-->';
				}
				?>
			</div> <!-- end .widget-area -->
		</div><!-- end .wrap -->
	</div> <!-- end .widget-wrap -->
	<?php } ?>
	<div class="site-info">
	<div class="wrap">
	<?php do_action('apporypro_footer_menu');
	if($apporypro_settings['apporypro_buttom_social_icons'] == 0):
		do_action('apporypro_social_links');
	endif;

	if ( is_active_sidebar( 'apporypro_footer_options' ) ) :
		dynamic_sidebar( 'apporypro_footer_options' );
	else:
		echo '<div class="copyright">'; ?>
		<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" target="_blank" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html (get_bloginfo( 'name', 'display' )); ?></a> | 
						<?php esc_html_e('Designed by:','apporypro'); ?> <a title="<?php echo esc_attr__( 'Wromo Marketplace', 'apporypro' ); ?>" target="_blank" href="<?php echo esc_url( 'https://wromo.app' ); ?>"><?php esc_html_e('Wromo Marketplace','apporypro');?></a> |
						<?php  echo '&copy; ' . date_i18n(__('Y','apporypro')) ; ?> <a title="<?php echo esc_attr__( 'WordPress', 'apporypro' );?>" target="_blank" href="<?php echo esc_url( __('https://wordpress.org','apporypro')  );?>"><?php esc_html_e('WordPress','apporypro'); ?></a>
					</div>
	<?php endif; ?>
			<div style="clear:both;"></div>
		</div> <!-- end .wrap -->
	</div> <!-- end .site-info -->
	<?php
		$disable_scroll = $apporypro_settings['apporypro_scroll'];
		if($disable_scroll == 0):?>
			<button type="button" class="go-to-top" type="button">
				<span class="screen-reader-text"><?php esc_html_e('Go to top','apporypro'); ?></span>
				<span class="icon-bg"></span>
				<span class="back-to-top-text"><i class="fas fa-angle-up"></i></span>
				<i class="fas fa-angle-double-up back-to-top-icon"></i>
			</button>
	<?php endif; ?>
	<div class="page-overlay"></div>
</footer> <!-- end #colophon -->
</div><!-- end .site-content-contain -->
</div><!-- end #page -->
<?php wp_footer(); ?>
</body>
</html>