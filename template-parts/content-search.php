<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1.0
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
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
					apporypro_posted_on();
					apporypro_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php apporypro_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->