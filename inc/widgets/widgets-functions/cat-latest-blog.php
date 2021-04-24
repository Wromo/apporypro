<?php

/**
 * Display Category box widget with layout 1, layout 2 and layout 3
 *
 * @package Wromo Marketplace
 * @subpackage Magbook
 * @since Magbook 1.0
 */

class AppOryPro_category_latest_blog_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */

	function __construct() {
		$widget_ops = array( 'classname' => 'apporypro-latest-blog-widget', 'description' => __( 'Displays Category Latest Blog', 'apporypro') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name=__('TF: Category Latest Blog Widget','apporypro'), $widget_ops, $control_ops );
	}


	function form($instance) {
		$instance = wp_parse_args(( array ) $instance, array('title' => '','number' => '3','category' => '', 'post_type'=>'latest', 'title_style' =>'on', 'entry_format_meta_blog' => 'on'));
		$title    = esc_attr($instance['title']);
		$number = absint( $instance[ 'number' ] );
		$title_style = $instance[ 'title_style' ];
		$category = absint($instance[ 'category' ]);
		$post_type = esc_attr($instance[ 'post_type' ]);
		$entry_format_meta_blog = esc_attr($instance[ 'entry_format_meta_blog' ]);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title');?>">
				<?php _e('Title:', 'apporypro');?>
			</label>
			<input id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_html($title);?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
			<?php _e( 'Number of Post:', 'apporypro' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo absint($number); ?>" size="3" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'entry_format_meta_blog' ); ?>"><?php _e( 'Entry Meta Display:', 'apporypro' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'entry_format_meta_blog' ); ?>" name="<?php echo $this->get_field_name( 'entry_format_meta_blog' ); ?>">
				<option value="on" <?php selected( $instance['entry_format_meta_blog'], 'on'); ?>><?php _e( 'On', 'apporypro' ); ?></option>
				<option value="off" <?php selected( $instance['entry_format_meta_blog'], 'off'); ?>><?php _e( 'Off', 'apporypro' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_style' ); ?>"><?php _e( 'Widget Title Design:', 'apporypro' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'title_style' ); ?>" name="<?php echo $this->get_field_name( 'title_style' ); ?>">
				<option value="on" <?php selected( $instance['title_style'], 'on'); ?>><?php _e( 'On', 'apporypro' ); ?></option>
				<option value="off" <?php selected( $instance['title_style'], 'off'); ?>><?php _e( 'Off', 'apporypro' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select Category', 'apporypro' ); ?>:</label>
			<?php  wp_dropdown_categories( array( 'show_option_none' => __( '-- Select Category --', 'apporypro' ),'name' => $this->get_field_name( 'category'), 'selected' => $category, 'hide_empty' => 0, 'hide_if_empty' => false, 'hierarchical'     => true, ) ); ?>
			<br>
			<span><?php _e('Category will display only  when Category is selected from Options dropdown. ','apporypro'); ?></span>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'post_type' ); ?>"><?php _e( 'Options:', 'apporypro' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>">
				<option value="latest" <?php selected( $instance['post_type'], 'latest'); ?>><?php _e( 'All Latest', 'apporypro' ); ?></option>
				<option value="category" <?php selected( $instance['post_type'], 'category'); ?>><?php _e( 'Category', 'apporypro' ); ?></option>
			</select>
		</p>
		<?php
	}
	function update($new_instance, $old_instance) {

		$instance  = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['number'] = absint($new_instance['number']);
		$instance[ 'title_style' ] = sanitize_key($new_instance[ 'title_style' ]);
		$instance[ 'category' ] = absint($new_instance[ 'category' ]);
		$instance[ 'post_type' ] = sanitize_key($new_instance[ 'post_type' ]);
		$instance[ 'entry_format_meta_blog' ] = sanitize_key($new_instance[ 'entry_format_meta_blog' ]);
		return $instance;
	}
	function widget($args, $instance) {
		$apporypro_settings = apporypro_get_theme_options();
		$apporypro_tag_text = $apporypro_settings['apporypro_tag_text'];
		$content_display = $apporypro_settings['apporypro_blog_content_layout'];

		extract($args);
		extract($instance);
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$number = empty( $instance[ 'number' ] ) ? 3 : $instance[ 'number' ];
		$title_style = isset($instance['title_style']) ? $instance['title_style']:'on';
		$category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$post_type = isset( $instance[ 'post_type' ] ) ? $instance[ 'post_type' ] : 'latest';
		$entry_format_meta_blog = isset( $instance[ 'entry_format_meta_blog' ] ) ? $instance[ 'entry_format_meta_blog' ] : 'on';

		if ( $post_type == 'category' ){
			$get_featured_posts = new WP_Query( array(
					'posts_per_page' 			=> absint($number),
					'cat'				=> esc_attr($category),
					'post_status'		=>	'publish',
					'ignore_sticky_posts'=>	'true'
			) );
		} else {
			$get_featured_posts = new WP_Query( array(
					'posts_per_page' 			=> absint($number),
					'post_status'		=>	'publish',
					'ignore_sticky_posts'=>	'true'
			) );
		}


		echo $before_widget;
		?>
		<div class="widget-inner-wrap <?php if ($title_style =='on'){ echo ' title-style'; } ?>">
			<?php
			if ( $title!=''){ ?>
				<h2 class="widget-title">
					<?php echo esc_html($title); ?>
				</h2><!-- end .widget-title -->
			<?php } ?>
			<div class="latest-blog-wrap">
				<div class="column">
					<?php
					while( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();  ?>
						<div class="three-column">
							<div class="latest-blog-inner">
								<?php if(has_post_thumbnail() ){ ?>
									<div class="latest-blog-image">
										<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('apporypro-widget-blog-featured-image'); ?></a>
									</div>
								<?php } ?>
								<header class="entry-header">
									<h2 class="entry-title">
										<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
									</h2>
									<!-- end.entry-title -->
									<?php if($entry_format_meta_blog == 'on' ){
										echo  '<div class="entry-meta">';
										echo '<span class="author vcard"><a href="'.esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )).'" title="'.the_title_attribute('echo=0').'">' .esc_attr(get_the_author()).'</a></span>';
										printf( '<span class="posted-on"><a href="%1$s" title="%2$s"> %3$s</a></span>',
															esc_url(get_the_permalink()),
															esc_attr( get_the_time(get_option( 'date_format' )) ),
															esc_html( get_the_time(get_option( 'date_format' )) )
														);
										if ( comments_open()) { ?>
												<span class="comments">
												<?php comments_popup_link( __( ' No Comments', 'apporypro' ), __( '<i class="fas fa-comment-o"></i> 1 Comment', 'apporypro' ), __( '<i class="fas fa-comment-o"></i> % Comments', 'apporypro' ), '', __( 'Comments Off', 'apporypro' ) ); ?> </span>
										<?php }
										echo  '</div> <!-- end .entry-meta -->';
									} ?>
								</header>
								<div class="entry-content">
									<?php
									if($content_display == 'excerptblog_display'):
										the_excerpt();
									else:
										the_content( esc_html($apporypro_tag_text));
									endif; ?>
								</div>
							</div> <!-- end .latest-blog-inner -->
						</div>
						<!-- end .three-column -->
					<?php endwhile;
					wp_reset_postdata();  ?>
				</div> <!-- end .column -->
			</div> <!-- end .latest-blog-wrap -->
		</div> <!-- end .widget-inner-wrap -->

	<?php echo $after_widget.'<!-- end .apporypro-latest-blog-widget -->';
	}
}