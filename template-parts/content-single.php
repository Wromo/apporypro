<?php
/**
 * Template part for displaying posts for single post.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AppOryPro
 */
if ( has_post_thumbnail() ) {
	$thumb_class = 'has-thumbnail';
} else {
	$thumb_class = 'no-thumbnail';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $thumb_class ); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
			<figure class="post-thumb apporypro-bg-image cover-image" style="background-image:url( <?php echo esc_url( get_the_post_thumbnail_url() ); ?> )">
			</figure>
	<?php } ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php
				apporypro_posted_on();
				apporypro_posted_by();
			?>
			<?php apporypro_entry_footer(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'apporypro' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'apporypro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->