<?php
if ( ! function_exists( 'gutenify_restaurant_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gutenify_restaurant_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'gutenify-restaurant', get_stylesheet_directory(  ) . '/languages' );
		add_editor_style('../gutenify-starter/style.css');
    }
endif;
add_action( 'after_setup_theme', 'gutenify_restaurant_setup' );

function gutenify_restaurant_enqueue_frontend_scripts() {
	wp_enqueue_style( 'gutenify-restaurant-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'gutenify_restaurant_enqueue_frontend_scripts' );


/**
 * Registers block patterns and categories.
 *
 * @since Gutenify Restaurant 1.0
 *
 * @return void
 */
function gutenify_restaurant_register_block_patterns() {

	$patterns = array();

	$block_pattern_categories = array(
		'gutenify-restaurant' => array( 'label' => __( 'Gutenify Restaurant', 'gutenify-restaurant' ) )
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Gutenify Restaurant 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'gutenify_restaurant_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'gutenify_restaurant_register_block_patterns', 9 );
