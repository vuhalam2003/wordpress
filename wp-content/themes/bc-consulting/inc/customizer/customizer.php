<?php 

/**
 * bc-consulting Theme Customizer.
 *
 * @package bc-consulting
 */

//customizer core option

load_template( get_template_directory() . '/inc/customizer/core/customizer-core.php', true ) ;

//customizer 

load_template( get_template_directory() . '/inc/customizer/core/default.php', true ) ;
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bc_consulting_customize_register( $wp_customize ) {

	// Load custom controls.

	load_template( get_template_directory() . '/inc/customizer/core/control.php', true ) ;
	// Load customize sanitize.
	load_template( get_template_directory() . '/inc/customizer/core/sanitize.php', true ) ;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	
	/*theme option panel details*/
	load_template( get_template_directory() . '/inc/customizer/theme-option.php', false ) ;
	
	// Register custom section types.
	$wp_customize->register_section_type( 'bc_consulting_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new bc_consulting_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'BC Pro Version!', 'bc-consulting' ),
				'pro_text' => esc_html__( 'Get PRO !', 'bc-consulting' ),
				'pro_url'  => 'https://athemeart.com/downloads/bc-consulting/',
				'priority'  => 1,
			)
		)
	);
	
	
}
add_action( 'customize_register', 'bc_consulting_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */

function bc_consulting_customizer_css() {
	
	wp_enqueue_script( 'bc_consulting_customize_controls', get_template_directory_uri() . '/inc/customizer/assets/js/customizer-admin.js', array( 'customize-controls' ) );
	wp_enqueue_style( 'bc_consulting_customize_controls', get_template_directory_uri() . '/inc/customizer/assets/css/customizer-controll.css' );
	
}
add_action( 'customize_controls_enqueue_scripts', 'bc_consulting_customizer_css',0 );


