<?php
/**
 * Template Name: Gallery Template
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */

get_header();
	$apporypro_settings = apporypro_get_theme_options();
	?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<header class="page-header">
			<h1 class="page-title"><?php the_title();?></h1>
			<!-- .page-title -->
			<?php apporypro_breadcrumb(); ?><!-- .breadcrumb -->
		</header><!-- .page-header -->
		<?php
		if( have_posts() ) {
			while( have_posts() ) {
				the_post(); ?>
		<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content clearfix">
				<?php the_content();
					wp_link_pages( array( 
					'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.esc_html__( 'Pages:', 'apporypro' ),
					'after'             => '</div>',
					'link_before'       => '<span>',
					'link_after'        => '</span>',
					'pagelink'          => '%',
					'echo'              => 1
					) ); ?>
			</div> <!-- entry-content clearfix-->
			<?php  comments_template(); ?>
			</article>
		</section>
		<?php }
		} else { ?>
		<h1 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'apporypro' ); ?> </h1>
		<?php
		} ?>
		</main><!-- end #main -->
	</div> <!-- #primary -->
	<?php
	get_sidebar();
	?>
</div><!-- end .wrap -->
<?php
get_footer();