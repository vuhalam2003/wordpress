<?php
/**
 * Default theme options.
 *
 * @package bc-consulting
 */

if ( ! function_exists( 'bc_consulting_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function bc_consulting_get_default_theme_options() {

		$defaults = array();
		
		/*Posts Layout*/
		$defaults['blog_loop_content_type']     	= 'excerpt';
		
		$defaults['blog_meta_hide']     			= false;
		$defaults['signle_meta_hide']     			= false;
		
		/*Posts Layout*/
		$defaults['page_layout']     				= 'full-container';
		$defaults['blog_layout']     				= 'sidebar-content';
		/*layout*/
		$defaults['copyright_text']					= esc_html__( 'Copyright All right reserved', 'bc-consulting' );
		$defaults['read_more_text']					= esc_html__( 'Continue Reading', 'bc-consulting' );
		$defaults['index_hide_thumb']     			= false;
		$defaults['dev_credits']     				= false;
			
		
		/*Posts Layout*/
		$defaults['__fb_pro_link']     				= '';
		$defaults['__tw_pro_link']     				= '';
		$defaults['__you_pro_link']     		    = '';
		$defaults['__pr_pro_link']     				= '';
		
		$defaults['__primary_color']     			= '#6c757d';
		$defaults['__secondary_color']     			= '#ddab03';
		
		
		$defaults['dialogue_text']					= esc_html__( 'Your Trusted 24 Hours Service Provider!', 'bc-consulting' );
		
		

		// Pass through filter.
		$defaults = apply_filters( 'bc_consulting_filter_default_theme_options', $defaults );

		return $defaults;

	}

endif;
