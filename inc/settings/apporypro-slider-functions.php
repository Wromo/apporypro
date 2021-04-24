<?php
/**
 * Custom functions
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */


/*********************** apporypro Side Menus ***********************************/
function apporypro_side_menus() {

if (has_nav_menu('catalog-menu') ){
	$locations = get_nav_menu_locations();
	$menu_object = get_term( $locations['catalog-menu'], 'nav_menu' ); ?>
	<div class="header-catalog-menu-wrap">
		<button class="show-menu-toggle" type="button">	
		<h3 class="catalog-menu-title"><?php echo esc_html($menu_object->name);  ?></h3>
		</button>


		<?php	$args = array(
				'theme_location' => 'catalog-menu',
				'container'      => '',
				'items_wrap'     => '<ul class="cat-nav-menu">%3$s</ul>',
				);

			$locations = get_nav_menu_locations();
			$menu_object = get_term( $locations['catalog-menu'], 'nav_menu' );

			 ?>
		<div class="catalog-menu-box">
			<div class="catalog-menu-wrap">
				<nav class="catalog-menu" role="navigation" aria-label="<?php esc_attr_e('Catalog Menu','apporypro');?>">
					
					<?php wp_nav_menu($args); ?>

				</nav> <!-- end .catalog-menu -->
				<button class="hide-menu-toggle" type="button">
					<span class="screen-reader-text"><?php echo esc_html($menu_object->name);  ?></span>
					<span class="bars"></span>
				</button>
			</div> <!-- end .catalog-menu-wrap -->
		</div> <!-- end .catalog-menu-box -->
	</div> <!-- end .header-catalog-menu-wrap -->
<?php }
}

add_action ('apporypro_side_nav_menu','apporypro_side_menus');

/*********************** apporypro Category SLIDERS ***********************************/
function apporypro_category_sliders() {
	$apporypro_settings = apporypro_get_theme_options();
	$apporypro_slider_sliderfullwidth = $apporypro_settings['apporypro_slider_sliderfullwidth'];
	if($apporypro_settings['apporypro_default_category']=='post_category'){
		$category = $apporypro_settings['apporypro_default_category_slider'];
		$query = new WP_Query(array(
					'posts_per_page' =>  intval($apporypro_settings['apporypro_slider_number']),
					'post_type' => array(
						'post'
					) ,
					'category_name' => esc_attr($apporypro_settings['apporypro_default_category_slider']),
				));
	} else {
		$category = $apporypro_settings['apporypro_category_slider'];
		$query = new WP_Query( array(
			'post_type' => 'product',
			'orderby'   => 'date',
			'tax_query' => array(
				array(
					'taxonomy'  => 'product_cat',
					'field'     => 'id',
					'terms'     => intval($category),
				)
			),
			'posts_per_page' => intval($apporypro_settings['apporypro_slider_number']),
			) );
	}
	

	if($query->have_posts() && !empty($category)){ ?>
		<div class="main-slider <?php if ($apporypro_settings['apporypro_disable_slide_animation'] == 'on'){ echo 'animation-right'; } ?>">
			<div class="layer-slider">
				<ul class="slides">
					<?php while ($query->have_posts()):$query->the_post(); ?>
					<li>
						<div class="image-slider">
							<article class="slider-content">
								<div class="slider-image-content">
									<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
											<?php if ($apporypro_slider_sliderfullwidth==1){
												the_post_thumbnail();
											} else {
												the_post_thumbnail('apporypro-slider');

											} ?>
										</a>
									<?php } ?>
								</div>
								<!-- .slider-image-content -->
								<div class="slider-text-content">
									<div class="slider-text-wrap">
										<h2 class="slider-header"><?php the_title(); ?></h2>
										<div class="slider-text"><?php the_content(); ?></div>
									</div>
									<!-- end .slider-text-wrap -->
									<?php if ($apporypro_settings['apporypro_shopnow_text'] != ''){ ?>
										<div class="slider-link">
											<a class="btn-default" href="<?php echo esc_url(get_permalink());?>"><?php echo esc_html ($apporypro_settings['apporypro_shopnow_text']); ?></a>
										</div> <!-- end .slider-link -->
									<?php } ?>
								</div>
								<!-- end .slider-text-content -->
							</article>
							<!-- end .slider-content -->
						</div>
						<!-- end .image-slider -->
					</li>
					<?php endwhile;
					wp_reset_postdata();
					?>
				</ul>
				<!-- end .slides -->	
			</div>
			<!-- end .layer-slider -->
		</div>
		<!-- end .main-slider -->

<?php }
}

/*********************** apporypro Product Promotion ***********************************/
function apporypro_product_promotion() {
	$apporypro_settings = apporypro_get_theme_options();
	$apporypro_hide_slider_text = $apporypro_settings['apporypro_hide_slider_text'];
	?>

	<div class="product-promotion">
		<div class="product-promotion-wrap">
			<?php for ( $i=1; $i <= 2; $i++ ) {
				if( !empty( $apporypro_settings[ 'apporypro_img-product-promotion-image-'. $i ] ) ) { 
					$product_promotion = $apporypro_settings[ 'apporypro_img-product-promotion-image-'. $i ];
					$product_promotion_name = $apporypro_settings[ 'apporypro_product_promotion_name_'. $i ];
					$product_promotion_desc = $apporypro_settings[ 'apporypro_product_promotion_desc_'. $i ];
					if (!empty ($product_promotion)): ?>
					<div class="product-promotion-content">
						<div class="product-promotion-img">
							<a class="product-promotion-link" href="<?php echo esc_url ($apporypro_settings['apporypro_product_promotion_url_'.$i]); ?>"><img src="<?php echo esc_url ($product_promotion); ?>"></a>
						</div>
						<?php if ($apporypro_hide_slider_text =='off'){ ?>
						<div class="product-promotion-text-content">
							
							<?php if( !empty( $product_promotion_name ) ) { ?>
								<h4 class="product-promotion-header">
									<a class="product-promotion-link" href="<?php echo esc_url ($apporypro_settings['apporypro_product_promotion_url_'.$i]); ?>">
										<?php echo esc_html ($product_promotion_name); ?></a></h4>
							<?php } ?>
							<?php if( !empty( $product_promotion_desc ) ) { ?>
							<p class="product-promotion-text"><?php echo esc_html ($product_promotion_desc);?></p>
						<?php } ?>
						</div>
					<?php } ?>
					</div> <!-- end .product-promotion-content -->
					<?php endif;
				} 
			}?>
		</div>
		<!-- end .product-promotion-wrap -->
	</div>
	<!-- end .product-promotion -->
<?php
}

add_action ('apporypro_product_promotions','apporypro_product_promotion');