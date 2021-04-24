<?php
/**
 * Display all apporypro functions and definitions
 *
 * @package Wromo Marketplace
 * @subpackage AppOryPro
 * @since AppOryPro 1.1
 */

 /************************************************************************************************/
if ( ! function_exists( 'apporypro_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function apporypro_setup() {
        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) ) {
                $content_width=1170;
        }
    
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        add_theme_support('post-thumbnails');
        add_image_size( 'apporypro-category-image', 380, 220, true );
        add_image_size( 'apporypro-grid-product-image', 400, 480, true );
        add_image_size( 'apporypro-popular-post', 75, 75, true );
        add_image_size( 'apporypro-widget-blog-featured-image', 760, 480, true );
        add_image_size( 'apporypro-slider', 1040, 585, true );
    
        /*
         * Let WordPress manage the document title.
         */
        add_theme_support( 'title-tag' );
    
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
    
        register_nav_menus( array(
            'top-menu' => __( 'Top Menu', 'apporypro' ),
            'primary' => __( 'Main Menu', 'apporypro' ),
            'catalog-menu' => __( 'Catalog Menu', 'apporypro' ),
            'social-link'  => __( 'Add Social Icons Only', 'apporypro' ),
        ) );
    
        /* 
        * Enable support for custom logo. 
        *
        */ 
        add_theme_support( 'custom-logo', array(
            'flex-width' => true, 
            'flex-height' => true,
        ) );
    
        add_theme_support( 'gutenberg', array(
                'colors' => array(
                    '#307FFD',
                ),
            ) );
        add_theme_support( 'align-wide' );
    
        // Add support for responsive embeds.
        add_theme_support( 'responsive-embeds' );
    
        //Indicate widget sidebars can use selective refresh in the Customizer. 
        add_theme_support( 'customize-selective-refresh-widgets' );
    
        /*
         * Switch default core markup for comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'comment-form', 'comment-list', 'gallery', 'caption',
        ) );
    
    
    
        /**
         * Add support for the Aside Post Formats
         */
        add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat' ) );
    
        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'apporypro_custom_background_args', array(
            'default-color' => '#ffffff',
            'default-image' => '',
        ) ) );
    
        add_editor_style( array( 'css/editor-style.css') );
    
        if ( class_exists( 'WooCommerce' ) ) {
    
            /**
             * Load WooCommerce compatibility files.
             */
                
            require get_template_directory() . '/woocommerce/functions.php';
    
        }
    
    
    }
    endif; // apporypro_setup
    add_action( 'after_setup_theme', 'apporypro_setup' );
    
    /***************************************************************************************/
    function apporypro_content_width() {
        if ( is_page_template( 'page-templates/gallery-template.php' ) || is_attachment() ) {
            global $content_width;
            $content_width = 1920;
        }
    }
    add_action( 'template_redirect', 'apporypro_content_width' );
    
    /***************************************************************************************/
    if(!function_exists('apporypro_get_theme_options')):
        function apporypro_get_theme_options() {
            return wp_parse_args(  get_option( 'apporypro_theme_options', array() ), apporypro_get_option_defaults_values() );
        }
    endif;
    
    /***************************************************************************************/
    require get_template_directory() . '/inc/customizer/apporypro-default-values.php';
    require get_template_directory() . '/inc/settings/apporypro-slider-functions.php';
    require get_template_directory() . '/inc/settings/apporypro-functions.php';
    require get_template_directory() . '/inc/settings/apporypro-common-functions.php';
    require get_template_directory() . '/inc/settings/icon-functions.php';
    
    /************************ AppOryPro Sidebar  *****************************/
    require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';
    require get_template_directory() . '/inc/widgets/widgets-functions/popular-posts.php';
    
    if ( class_exists('woocommerce')) {
        require get_template_directory() . '/inc/widgets/widgets-functions/banner-with-text.php';
        require get_template_directory() . '/inc/widgets/widgets-functions/image-category.php';
        require get_template_directory() . '/inc/widgets/widgets-functions/category-tab-box.php';
        require get_template_directory() . '/inc/widgets/widgets-functions/index-info.php';
        require get_template_directory() . '/inc/widgets/widgets-functions/grid-column-widget.php';
    }
    require get_template_directory() . '/inc/widgets/widgets-functions/cat-latest-blog.php';
    
    /************************ AppOryPro Customizer  *****************************/
    require get_template_directory() . '/inc/customizer/functions/sanitize-functions.php';
    require get_template_directory() . '/inc/customizer/functions/register-panel.php';
    
    function apporypro_customize_register( $wp_customize ) {
    if(!class_exists('AppOryPro_Plus_Features')){
        class AppOryPro_Customize_upgrade extends WP_Customize_Control {
            public function render_content() { ?>
                <a title="<?php esc_attr_e( 'Review Us', 'apporypro' ); ?>" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/apporypro/' ); ?>" target="_blank" id="about_apporypro">
                <?php esc_html_e( 'Review Us', 'apporypro' ); ?>
                </a><br/>
                <a href="<?php echo esc_url( 'https://wromo.app/theme-instruction/apporypro/' ); ?>" title="<?php esc_attr_e( 'Theme Instructions', 'apporypro' ); ?>" target="_blank" id="about_apporypro">
                <?php esc_html_e( 'Theme Instructions', 'apporypro' ); ?>
                </a><br/>
                <a href="<?php echo esc_url( 'https://tickets.wromo.app/' ); ?>" title="<?php esc_attr_e( 'Support Tickets', 'apporypro' ); ?>" target="_blank" id="about_apporypro">
                <?php esc_html_e( 'Support Tickets', 'apporypro' ); ?>
                </a><br/>
            <?php
            }
        }
        $wp_customize->add_section('apporypro_upgrade_links', array(
            'title'					=> __('Important Links', 'apporypro'),
            'priority'				=> 1000,
        ));
        $wp_customize->add_setting( 'apporypro_upgrade_links', array(
            'default'				=> false,
            'capability'			=> 'edit_theme_options',
            'sanitize_callback'	=> 'wp_filter_nohtml_kses',
        ));
        $wp_customize->add_control(
            new AppOryPro_Customize_upgrade(
            $wp_customize,
            'apporypro_upgrade_links',
                array(
                    'section'				=> 'apporypro_upgrade_links',
                    'settings'				=> 'apporypro_upgrade_links',
                )
            )
        );
    }	
        $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
            
        if ( isset( $wp_customize->selective_refresh ) ) {
            $wp_customize->selective_refresh->add_partial( 'blogname', array(
                'selector' => '.site-title a',
                'container_inclusive' => false,
                'render_callback' => 'apporypro_customize_partial_blogname',
            ) );
            $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
                'selector' => '.site-description',
                'container_inclusive' => false,
                'render_callback' => 'apporypro_customize_partial_blogdescription',
            ) );
        }
        
        require get_template_directory() . '/inc/customizer/functions/design-options.php';
        require get_template_directory() . '/inc/customizer/functions/theme-options.php';
        require get_template_directory() . '/inc/customizer/functions/color-options.php' ;
        require get_template_directory() . '/inc/customizer/functions/featured-content-customizer.php' ;
        if ( class_exists( 'WooCommerce' ) ) {
    
            require get_template_directory() . '/inc/customizer/functions/frontpage-features.php' ;
    
        }
    }
    if(!class_exists('AppOryPro_Plus_Features')){
        // Add Upgrade to Plus Button.
        require_once( trailingslashit( get_template_directory() ) . 'inc/upgrade-plus/class-customize.php' );
    
        /************************ TGM Plugin Activatyion  *****************************/
        require get_template_directory() . '/inc/tgm/tgm.php';
    }
    
    /** 
    * Render the site title for the selective refresh partial. 
    * @see apporypro_customize_register() 
    * @return void 
    */ 
    function apporypro_customize_partial_blogname() { 
    bloginfo( 'name' ); 
    } 
    
    /** 
    * Render the site tagline for the selective refresh partial. 
    * @see apporypro_customize_register() 
    * @return void 
    */ 
    function apporypro_customize_partial_blogdescription() { 
    bloginfo( 'description' ); 
    }
    add_action( 'customize_register', 'apporypro_customize_register' );
    /******************* AppOryPro Header Display *************************/
    function apporypro_header_display(){
        $apporypro_settings = apporypro_get_theme_options();
    
    $header_display = $apporypro_settings['apporypro_header_display'];
        if ($header_display != 'disable_both'){
            echo '<div class="site-name">';
    
            if ($header_display == 'header_logo' || $header_display == 'show_both') {
                apporypro_the_custom_logo();
            }
            if ($header_display == 'header_text' || $header_display == 'show_both') {
                echo '<div id="site-detail">';
                    if (is_home() || is_front_page()){ ?>
                        <h1 id="site-title"> <?php }else{?> <h2 id="site-title"> <?php } ?>
                        <a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" rel="home"> <?php bloginfo('name');?> </a>
                        <?php if(is_home() || is_front_page()){ ?>
                        </h1>  <!-- end .site-title -->
                        <?php } else { ?> </h2> <!-- end .site-title --> <?php }
    
                        $site_description = get_bloginfo( 'description', 'display' );
                        if ($site_description){?>
                            <div id="site-description"> <?php bloginfo('description');?> </div> <!-- end #site-description -->
                    <?php }
                echo '</div>'; // end #site-detail
            }
            echo '</div>';
        }
    }
    add_action('apporypro_site_branding','apporypro_header_display');
    
    if ( ! function_exists( 'apporypro_the_custom_logo' ) ) : 
         /** 
          * Displays the optional custom logo. 
          * Does nothing if the custom logo is not available. 
          */ 
         function apporypro_the_custom_logo() { 
            if ( function_exists( 'the_custom_logo' ) ) { 
                the_custom_logo(); 
            }
         } 
    endif;
    
    require get_template_directory() . '/inc/front-page/front-page-features.php';
    
    /************** YITH_WCWL *************************************/
    if ( function_exists( 'YITH_WCWL' ) ) {
        function apporypro_update_wishlist_count(){
            wp_send_json( YITH_WCWL()->count_products() );
        }
        add_action( 'wp_ajax_update_wishlist_count', 'apporypro_update_wishlist_count' );
        add_action( 'wp_ajax_nopriv_update_wishlist_count', 'apporypro_update_wishlist_count' );
    }
    
    
    /************** Add to cart ajax autoload *************************************/
    add_filter( 'woocommerce_add_to_cart_fragments', 'apporypro_woocommerce_add_to_cart_fragment' );
    
    function apporypro_woocommerce_add_to_cart_fragment( $fragments ) {
        ob_start();
        ?>
                <div class="sx-cart-views">
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="wcmenucart-contents">
                        <span class="cart-value"><?php echo wp_kses_data ( WC()->cart->get_cart_contents_count() ); ?></span>
                    </a>
                    <div class="my-cart-wrap">
                        <div class="my-cart"><?php esc_html_e('Total', 'apporypro'); ?></div>
                        <div class="cart-total"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></div>
                    </div>
                </div>
        <?php
    
        $fragments['div.sx-cart-views'] = ob_get_clean();
    
        return $fragments;
    }