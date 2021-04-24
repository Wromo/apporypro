<?php
/**
 * The template for displaying 404 pages
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */
get_header(); ?>
<div class="wrap">
	<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
			<?php if ( is_active_sidebar( 'apporypro_404_page' ) ) :
				dynamic_sidebar( 'apporypro_404_page' );
			else:?>
			<section class="error-404 not-found">
				<header class="page-header">
					<h2 class="page-title"> <?php esc_html_e( 'Hello! That page can&rsquo;t be found.', 'apporypro' ); ?> </h2>
				</header> <!-- .page-header -->
				<div class="page-content">
					<p> <?php esc_html_e( 'Nothing was found at this location. Maybe try a search?', 'apporypro' ); ?> </p>
						<?php get_search_form(); ?>
				</div> <!-- .page-content -->
			</section> <!-- .error-404 -->
		<?php endif; ?>
	</main><!-- end #main -->
	</div> <!-- #primary -->
<?php
get_sidebar();
?>
</div><!-- end .wrap -->
<?php
get_footer();