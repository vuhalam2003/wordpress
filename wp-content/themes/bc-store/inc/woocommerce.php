<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package emart
 */
/**
 *  Hook remove from WooCommerce archive
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb',20 );
add_filter( 'woocommerce_show_page_title', '__return_false' );

remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar',10 );

remove_action( 'woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10 );
remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5 );


remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function bc_store_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 300,
			'single_image_width'    => 600,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'bc_store_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */

function bc_store_woocommerce_scripts() {
		wp_enqueue_style( 'bc-store-woocommerce-core', get_stylesheet_directory_uri() . '/assets/css/woocommerce-core.css', array(), wp_get_theme()->get('Version') );
        wp_enqueue_style( 'bc-store-woocommerce-style', get_stylesheet_directory_uri() . '/woocommerce.css', array(), wp_get_theme()->get('Version') );

        $font_path   = WC()->plugin_url() . '/assets/fonts/';
        $inline_font = '@font-face {
                font-family: "star";
                src: url("' . $font_path . 'star.eot");
                src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
                    url("' . $font_path . 'star.woff") format("woff"),
                    url("' . $font_path . 'star.ttf") format("truetype"),
                    url("' . $font_path . 'star.svg#star") format("svg");
                font-weight: normal;
                font-style: normal;
            }';

        wp_add_inline_style( 'bc-store-woocommerce-style', $inline_font );
        
        wp_enqueue_script( 'bc-store-customselect', get_theme_file_uri( '/assets/js/customselect.js'), array(),  wp_get_theme()->get('Version'), true);

        wp_enqueue_script( 'bc-store-woocommerce', get_theme_file_uri( '/assets/js/bc-store-woocommerce.js' ) , 0, '1.1', true );
}
add_action( 'wp_enqueue_scripts', 'bc_store_woocommerce_scripts' );


/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function bc_consulting_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'bc_consulting_woocommerce_active_body_class' );


/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'bc_consulting_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function bc_consulting_woocommerce_wrapper_before() {
		if( is_shop() || is_product_category() || is_product_tag() ){
			$layout = 'full-container';
			
		}else if( is_product() ){
			
			$layout ='full-container';
		}else{
			$layout ='full-container';
		}
		/**
		* Hook - bc_consulting_container_wrap_start 	
		*
		* @hooked bc_consulting_container_wrap_start	- 5
		*/
		do_action( 'bc_consulting_container_wrap_start', esc_attr( $layout ));
	}
}
add_action( 'woocommerce_before_main_content', 'bc_consulting_woocommerce_wrapper_before' );

if ( ! function_exists( 'bc_consulting_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function bc_consulting_woocommerce_wrapper_after() {
		if( is_shop() || is_product_category() || is_product_tag() ){
			$layout = 'full-container';
			
		}else if( is_product() ){
			
			$layout ='no-sidebar';
		}else{
			$layout ='no-sidebar';
		}
		/**
		* Hook - bc_consulting_container_wrap_end	
		*
		* @hooked container_wrap_end - 999
		*/
		do_action( 'bc_consulting_container_wrap_end', esc_attr( $layout ) );
	}
}
add_action( 'woocommerce_after_main_content', 'bc_consulting_woocommerce_wrapper_after' );



if ( ! function_exists( 'bc_consulting_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function bc_consulting_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		bc_consulting_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'bc_consulting_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'bc_consulting_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function bc_consulting_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'bc-store' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: %d: number of items in the mini cart. */
				'%d',
				WC()->cart->get_cart_contents_count()
			);
			?>
			<i class="fa-solid fa-cart-shopping"></i>
			<span class="quantity"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}

}

/*------------------------------------*/
	//TOOL BAR
/*------------------------------------*/
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);

if ( ! function_exists( 'multipurpose_shop_header_toolbar_start' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function multipurpose_shop_header_toolbar_start() {
		echo '<div class="bc-consulting-toolbar clearfix d-flex">';
	}
	
	add_action('woocommerce_before_shop_loop','multipurpose_shop_header_toolbar_start',20);
}

if ( ! function_exists( 'multipurpose_shop_grid_list_buttons' ) ) :
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
function multipurpose_shop_grid_list_buttons() {
	
	// Titles
	$grid_view = esc_html__( 'Grid view', 'bc-store' );
	$list_view = esc_html__( 'List view', 'bc-store' );

	$grid = 'active ';
	$list = '';
	// Active class
	if( bc_consulting_get_option('__woo_shop_view') == 'do-to-list' ){
		$grid = '';
		$list = 'active ';
	}
	$output = sprintf( '<div class="bc-grid-list"><a href="#" id="bc-product-grid" title="%1$s" class="%2$sgrid-btn"><i class="fa fa-th-large" aria-hidden="true"></i></a><a href="#" id="bc-product-list" title="%3$s" class="%4$slist-btn"><i class="fa fa-list" aria-hidden="true"></i></a></div>', esc_html( $grid_view ), esc_attr( $grid ), esc_html( $list_view ), esc_attr( $list ) );

	echo wp_kses_post( apply_filters( 'multipurpose_shop_grid_list_buttons_output', $output ) );
}
add_action('woocommerce_before_shop_loop','multipurpose_shop_grid_list_buttons',25);
endif;


function multipurpose_shop_result_count() {
	get_template_part( 'woocommerce/result-count' );
}
add_action('woocommerce_before_shop_loop','multipurpose_shop_result_count',30);


if ( ! function_exists( 'multipurpose_shop_header_toolbar_end' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function multipurpose_shop_header_toolbar_end() {
		
		echo '<div class="clearfix"></div></div>';
	}
	
	add_action('woocommerce_before_shop_loop','multipurpose_shop_header_toolbar_end',30);
}




if ( ! function_exists( 'bc_consulting_loop_product_thumbnail' ) ) {
	

	/**
	 * Get the product thumbnail for the loop.
	 */
	function bc_consulting_loop_product_thumbnail() {
		global $product;
		$attachment_ids   = $product->get_gallery_image_ids();

		global $product;
		$attachment_ids   = $product->get_gallery_image_ids();
		
		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
		echo '<div class="product-image">';
		
			if( isset( $attachment_ids[0] ) && $attachment_ids[0] != "" ) {
			
				$img_tag = array(
					'class'         => 'woo-entry-image-secondary',
					'alt'           => get_the_title(),
				);
				
				echo '<figure class="hover-action">'. wp_kses_post(woocommerce_get_product_thumbnail()) . wp_get_attachment_image( intval($attachment_ids[0]), 'shop_catalog', false, $img_tag ) .'</figure>';
			}else{
				echo '<figure>'.wp_kses_post(woocommerce_get_product_thumbnail()).'</figure>';	
			}
		
		
			echo '<div class="product-caption"> <ul class="caption-list-product">';
			echo '<li>';
				do_action( 'bcshop_loop_add_to_cart' );
			echo '</li>';
			
			echo '<li><a href="' . esc_url( $link ) . '" data-toggle="tooltip" title="'.esc_html__( 'Read more', 'bc-store' ).'"><i class="fa fa-eye" aria-hidden="true"></i></a></li>';

			echo '</ul></div>';
			
			
		echo '</div>';
	}
	remove_action( 'woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10 );
	
	add_action( 'woocommerce_before_shop_loop_item_title','bc_consulting_loop_product_thumbnail',10 );
	

	
}

if ( ! function_exists( 'bcshop_loop_add_to_cart' ) ) {
	add_action( 'bcshop_loop_add_to_cart', 'bcshop_loop_add_to_cart', 10 );
	/**
	 * Get the add to cart template for the loop.
	 *
	 * @param array $args Arguments.
	 */
	function bcshop_loop_add_to_cart( $args = array() ) {
		global $product;

		if ( $product ) {
			$defaults = array(
				'quantity'              => 1,
				'class'                 => implode(
					' ',
					array_filter(
						array(
							'button',
							wc_wp_theme_get_element_class_name( 'button' ), // escaped in the template.
							'product_type_' . $product->get_type(),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
						)
					)
				),
				'aria-describedby_text' => $product->add_to_cart_aria_describedby(),
				'attributes'            => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

			if ( ! empty( $args['attributes']['aria-describedby'] ) ) {
				$args['attributes']['aria-describedby'] = wp_strip_all_tags( $args['attributes']['aria-describedby'] );
			}

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
			}

			wc_get_template( 'loop/add-to-cart.php', $args );
		}
		
		
	}
}
/*-----------------------------------*/
if ( ! function_exists( 'bc_consulting_before_quantity_input_field' ) ) {
	/**
	 * before quantity.
	 *
	 *
	 * @return $html
	 */
	function bc_consulting_before_quantity_input_field() {
		echo '<button type="button" class="plus"><i class="fa-solid fa-plus"></i></button>';
	}
	add_action( 'woocommerce_before_quantity_input_field','bc_consulting_before_quantity_input_field',10);
	
}

if ( ! function_exists( 'bc_consulting_after_quantity_input_field' ) ) {
	/**
	 * after quantity.
	 *
	 *
	 * @return $html
	 */
	function bc_consulting_after_quantity_input_field() {
		echo '<button type="button" class="minus"><i class="fa-solid fa-minus"></i></button>';
	}
	add_action( 'woocommerce_after_quantity_input_field','bc_consulting_after_quantity_input_field',10);
}


if ( ! function_exists( 'bc_shop_loop_item_title' ) ) {
	/**
	 * after quantity.
	 * @return $html
	 */
	function bc_shop_loop_item_title() {

		$show = !empty(bc_consulting_get_option('__woo_loop_sort_desc')) ? 'show': '';

		$show = !empty(get_query_var('ele_show_desc') && get_query_var('ele_show_desc') == 'yes' ) ? 'show': $show;

		echo '<div class="bc-shop-excerpt '.esc_attr( $show ).'">'.wp_kses_post( get_the_excerpt() ).'</div>';
	}
	add_action( 'woocommerce_after_shop_loop_item_title','bc_shop_loop_item_title',30);
}

if ( ! function_exists( 'bc_shop_page_categories' ) ) {
	/**
	 * Product Loop categorie.
	 *
	 * @return  void
	 */
	function bc_shop_page_categories() {
		global $product;
		echo '<div class="cat-name">';
			echo wp_kses_post(
			    wc_get_product_category_list(
			        $product->get_id(),
			        ', ',
			        '<span class="posted_in">',
			        '</span>'
			    )
			);
        echo '</div>';
	}
}
add_action( 'woocommerce_shop_loop_item_title', 'bc_shop_page_categories', 5 );



if ( ! function_exists( 'bc_store_loop_item_title' ) ) {
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	/**
	 * Show the product title in the product loop. By default this is an h4.
	 */
	function bc_store_loop_item_title() {
	global $product;

	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

	echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';	
	echo '<h3 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h3>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo '</a>';	

	}

	add_action( 'woocommerce_shop_loop_item_title', 'bc_store_loop_item_title', 10 );
}