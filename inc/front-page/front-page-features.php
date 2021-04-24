<?php
/**
 * Front Page Features
 *
 * Displays in Corporate template.
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */
/* Frontpage Product Featured Brands */
add_action('apporypro_display_front_page_product_brand','apporypro_frontpage_product_brand');
function apporypro_frontpage_product_brand(){
	$apporypro_settings = apporypro_get_theme_options();
	$apporypro_features_title = $apporypro_settings['apporypro_features_title'];
	$apporypro_features_description = $apporypro_settings['apporypro_features_description'];
	$apporypro_list_product_category	= array();
	for ( $i=1; $i <= $apporypro_settings['apporypro_total_brand_features'] ; $i++ ) {
		if( isset ( $apporypro_settings['apporypro_featured_product_brand_' . $i] ) && $apporypro_settings['apporypro_featured_product_brand_' . $i] !='-' ){

			$apporypro_list_product_category	=	array_merge( $apporypro_list_product_category, array( $apporypro_settings['apporypro_featured_product_brand_' . $i] ) );
		}
	}
	if ( (!empty( $apporypro_list_product_category ) || !empty($apporypro_settings['apporypro_features_title']) || !empty($apporypro_settings['apporypro_features_description'])) && ($apporypro_settings['apporypro_disable_product_brand'] == 0) ) { ?>
			<div class="brand-content-box">
				<div class="wrap">
					<div class="brand-wrap">
					<?php

					if($apporypro_features_title  != '' || $apporypro_features_description != ''){
						echo '<div class="box-header">';
						if($apporypro_features_title  != ''){ ?>
							<h2 class="box-title"><?php echo esc_html($apporypro_features_title );?> </h2>
						<?php }
						if($apporypro_features_description != ''){ ?>
							<p class="box-sub-title"><?php echo esc_html($apporypro_features_description); ?></p>
						<?php }
						echo '</div><!-- end .box-header -->';
					} ?>
					<div class="brand-slider">
						<ul class="slides">
							<?php
								$i = 1;

								foreach ($apporypro_list_product_category as $category) {
									$thumbnail_id = get_term_meta( $category, 'thumbnail_id', true );
									$category_link = get_category_link( $category );
									$category_name = get_term( $category );

									$image_attribute = wp_get_attachment_image_src( $thumbnail_id);
									if ( !empty( $image_attribute[0] )) { ?>
									<li>
										<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo esc_attr($category_name->name); ?>" target="_blank">
											<img src="<?php echo esc_url( $image_attribute[0] ); ?>" alt="<?php echo esc_attr($category_name->name); ?>" />
										</a>
									</li>
									<?php }
									$i++;
								}; ?>
						</ul>
					</div><!-- end .brand-slider -->
				</div><!-- end .brand-wrap -->
			</div><!-- end .wrap -->
		</div><!-- end .brand-content-box -->
	<?php }
wp_reset_postdata();
}

/* Frontpage Product Categories Icon Slide */
add_action('apporypro_display_front_page_product_categories','apporypro_frontpage_product_categories');
function apporypro_frontpage_product_categories(){
	$apporypro_settings = apporypro_get_theme_options();
	$apporypro_list_product_category	= array();
	for ( $i=1; $i <= $apporypro_settings['apporypro_total_features'] ; $i++ ) {
		if( isset ( $apporypro_settings['apporypro_featured_category_' . $i] ) && $apporypro_settings['apporypro_featured_category_' . $i] !='-' ){

			$apporypro_list_product_category	=	array_merge( $apporypro_list_product_category, array( $apporypro_settings['apporypro_featured_category_' . $i] ) );

		}
	}
	if ( (!empty( $apporypro_list_product_category ) || !empty($apporypro_settings['apporypro_apporypro_features_title']) || !empty($apporypro_settings['apporypro_apporypro_features_description'])) && ($apporypro_settings['apporypro_disable_product_categories'] == 0) ) { ?>
			<div class="category-menu-icon-box">
				<div class="wrap">
					<div class="category-icon-wrap">
						<div class="category-icon-slider">
							<ul class="slides">
								<?php
									$i = 1;
									foreach ($apporypro_list_product_category as $category) {
										$thumbnail_id = get_term_meta( $category, 'thumbnail_id', true );
										$category_link = get_category_link( $category );
										$category_name = get_term( $category );
										$promo_image_attribute = wp_get_attachment_image_src( $thumbnail_id, 'apporypro-product-cat-image' ); ?>

										<li class="item">
											<a href="<?php echo esc_url( $category_link ); ?>">
												<?php if ( $promo_image_attribute[0] ) { ?>
													<img src="<?php echo esc_url( $promo_image_attribute[0] ); ?>" alt="<?php echo esc_attr( $category_name->name ); ?>" />
												<?php }
												if (!empty($category_name->name)){ ?>
													<span><?php echo esc_html( $category_name->name ); ?></span>
												<?php } ?>
											</a>
										</li>
										<?php $i++;
									} ?>
							</ul>
						</div> <!-- end .brand-slider -->
					</div> <!-- end .brand-wrap -->
				</div> <!-- end .wrap -->
			</div> <!-- end .category-menu-icon-box -->
	<?php }
	wp_reset_postdata();
}