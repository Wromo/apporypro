<?php
/**
 * The template for displaying all single posts.
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */
get_header();
$apporypro_settings = apporypro_get_theme_options();
$apporypro_display_page_single_featured_image = $apporypro_settings['apporypro_display_page_single_featured_image']; ?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php global $apporypro_settings;
			while( have_posts() ) {
				the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
					<?php if(has_post_thumbnail() && $apporypro_display_page_single_featured_image == 0 ){ ?>
						<div class="post-image-content">
							<figure class="post-featured-image">
								<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail(); ?>
								</a>
							</figure><!-- end.post-featured-image  -->
						</div><!-- end.post-image-content -->
					<?php } ?>
					<div class="post-all-content">
						<?php $apporypro_entry_meta_single = $apporypro_settings['apporypro_entry_meta_single']; ?>
						<header class="entry-header">
							<h1 class="entry-title"><?php the_title();?></h1> <!-- end.entry-title -->
								<?php apporypro_breadcrumb();
							
							if($apporypro_entry_meta_single=='show'){
								if ( $apporypro_settings['apporypro_post_date'] != 1 || $apporypro_settings['apporypro_post_author'] != 1 || $apporypro_settings['apporypro_post_comments'] != 1){ ?>
									<div class="entry-meta">
										<?php 
											
											if ( $apporypro_settings['apporypro_post_author'] != 1){ ?>
											<span class="author vcard"><?php esc_html_e('By','apporypro');?><a href="<?php echo esc_url (get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>" title="<?php the_author(); ?>">
											<?php the_author(); ?> </a></span>
											<?php }

											if ( $apporypro_settings['apporypro_post_date'] != 1) {
												printf( '<span class="posted-on"><a href="%1$s" title="%2$s">%3$s</a></span>',
												esc_url(get_the_permalink()),
												esc_attr( get_the_time() ),
												esc_html(get_the_time( get_option( 'date_format' ) ))
												);
											}

											if ( comments_open() ) { 
												if ( $apporypro_settings['apporypro_post_comments'] != 1){ ?>
													<span class="comments">
													<?php comments_popup_link( __( 'No Comments', 'apporypro' ), __( '1 Comment', 'apporypro' ), __( '% Comments', 'apporypro' ), '', __( 'Comments Off', 'apporypro' ) ); ?> </span>
												<?php }
											} ?>
									</div>
								<?php }
								} ?>
							</header>
							<div class="entry-content">
								<?php the_content(); ?>			
							</div><!-- end .entry-content -->
								
							<?php if($apporypro_entry_meta_single=='show'){
								$format = get_post_format();
				 				$tag_list = get_the_tag_list( '', __( ', ', 'apporypro' ) );
								if ( $apporypro_settings['apporypro_post_category'] != 1 || !empty($format) || !empty($tags_list)){ ?>
									<div class="entry-footer">
										<div class="entry-meta">

											<?php
											if ( current_theme_supports( 'post-formats', $format ) ) {
												printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
													sprintf( ''),
													esc_url( get_post_format_link( $format ) ),
													esc_html(get_post_format_string( $format ))
												);
											}

											if ( $apporypro_settings['apporypro_post_category'] != 1){  ?>
											<span class="cat-links">
												<?php the_category(', '); ?>
											</span> <!-- end .cat-links -->
											<?php }

											if(!empty($tag_list)){ ?>
												<span class="tag-links">
													<?php   echo get_the_tag_list( '', __( ', ', 'apporypro' ) ); ?>
												</span> <!-- end .tag-links -->
											<?php }  ?>
										</div> <!-- end .entry-meta -->
									</div>
								<?php }	
							} ?>
						
					</div> <!-- end .post-all-content -->
				</article><!-- end .post -->
				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'apporypro' ),
							) );
				} elseif ( is_singular( 'post' ) ) {
				the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'apporypro' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'apporypro' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'apporypro' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'apporypro' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					) );
				}
			} ?>
		</main><!-- end #main -->
	</div> <!-- #primary -->
<?php
get_sidebar();
?>
</div><!-- end .wrap -->
<?php
get_footer();