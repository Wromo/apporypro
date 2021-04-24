<?php
/**
 * Template Name: AppOryPro Template
 *
 * Displays the AppOryPro page template.
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */
$apporypro_settings = apporypro_get_theme_options();

get_header(); ?>

<div class="product-widget-box">
		<?php 
		if (is_active_sidebar('apporypro_template')):

			dynamic_sidebar('apporypro_template');

		endif;

		if ( have_posts() ) {
			the_post();

				the_content (); 
				
			}

		 ?>
</div> <!-- end .product-widget-box -->

<?php

if(class_exists('woocommerce')){

	do_action('apporypro_display_front_page_product_brand'); // Display just before footer column

}

if( is_active_sidebar( 'apporypro_template_footer_col_1' ) || is_active_sidebar( 'apporypro_template_footer_col_2' ) || is_active_sidebar( 'apporypro_template_footer_col_3' ) || is_active_sidebar( 'apporypro_template_footer_col_4' )) { ?>

	<div class="apporypro-template-footer-column">
		<div class="wrap">
			<div class="sc-template-footer-wrap">

				<?php
					for($i =1; $i<= 4; $i++){
						if ( is_active_sidebar( 'apporypro_template_footer_col_'.$i ) ) : ?>
							<div class="sc-footer-column">

								<?php dynamic_sidebar( 'apporypro_template_footer_col_'.$i ); ?>

							</div>

						<?php endif;
					}
				?>
			</div> <!-- end .sc-template-footer-wrap -->
		</div> <!-- end .wrap -->
	</div> <!-- end .apporypro-template-footer-column -->
<?php }
get_footer();