<?php 

/**
 * Theme Options Panel.
 *
 * @package bc-consulting
 */

$default = bc_consulting_get_default_theme_options();
global $wp_customize;



// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'bc-consulting' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	)
);


// Footer Section.
$wp_customize->add_section( 'dialogue_section',
	array(
	'title'      => esc_html__( 'Dialogue Text', 'bc-consulting' ),
	'priority'   => 90,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'dialogue_text',
	array(
	'default'           => $default['dialogue_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'dialogue_text',
	array(
	'label'    => esc_html__( 'Dialogue Text', 'bc-consulting' ),
	'section'  => 'dialogue_section',
	'type'     => 'textarea',
	'priority' => 120,
	)
);

// Styling Options.*/

$wp_customize->add_section( 'styling_section_settings',
	array(
		'title'      => esc_html__( 'Styling Options', 'bc-consulting' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);


// Primary Color.
$wp_customize->add_setting( '__primary_color',
	array(
	'default'           => $default['__primary_color'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control( '__primary_color',
	array(
	'label'    	   => esc_html__( 'Primary Color Scheme:', 'bc-consulting' ),
	'section'  	   => 'styling_section_settings',
	'description'  => esc_html__( 'The theme comes with unlimited color schemes for your theme\'s styling. upgrade pro for color options & features', 'bc-consulting' ),
	'type'     => 'color',
	'priority' => 120,
	)
);

$wp_customize->add_setting( '__secondary_color',
	array(
	'default'           => $default['__secondary_color'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control( '__secondary_color',
	array(
	'label'    	   => esc_html__( 'Secondary Color Scheme:', 'bc-consulting' ),
	'section'  	   => 'styling_section_settings',
	'description'  => esc_html__( 'The theme comes with unlimited color schemes for your theme\'s styling. upgrade pro for color options & features', 'bc-consulting' ),
	'type'     => 'color',
	'priority' => 120,
	)
);
	
/*Posts management section start */
$wp_customize->add_section( 'theme_option_section_settings',
	array(
		'title'      => esc_html__( 'Blog Management', 'bc-consulting' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

		/*Blog Loop Content*/
		$wp_customize->add_setting( 'blog_loop_content_type',
			array(
				'default'           => $default['blog_loop_content_type'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'bc_consulting_sanitize_select',
			)
		);
		$wp_customize->add_control( 'blog_loop_content_type',
			array(
				'label'    => esc_html__( 'Archive Content Type', 'bc-consulting' ),
				'description' => esc_html__( 'Choose Archive, Blog Page Content type as default', 'bc-consulting' ),
				'section'  => 'theme_option_section_settings',
				'choices'               => array(
					'excerpt' => __( 'Excerpt', 'bc-consulting' ),
					'content' => __( 'Content', 'bc-consulting' ),
					),
				'type'     => 'select',
				
			)
		);
		
		/*Social Profile*/
		$wp_customize->add_setting( 'read_more_text',
			array(
				'default'           => $default['read_more_text'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control( 'read_more_text',
			array(
				'label'    => esc_html__( 'Read more text', 'bc-consulting' ),
				'description' => esc_html__( 'Leave empty to hide', 'bc-consulting' ),
				'section'  => 'theme_option_section_settings',
				'type'     => 'text',
				
			)
		);
		
		$wp_customize->add_setting( 'blog_layout',
			array(
				'default'           => $default['blog_layout'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'bc_consulting_sanitize_select',
			)
		);
		$wp_customize->add_control( 'blog_layout',
			array(
				'label'    => esc_html__( 'Blog Layout Options', 'bc-consulting' ),
				'section'  => 'theme_option_section_settings',
				'description' => esc_html__( 'Choose between different layout options to be used as default', 'bc-consulting' ),
				'choices'   => array(
					'sidebar-content'  => esc_html__( 'Primary Sidebar - Content', 'bc-consulting' ),
					'content-sidebar' => esc_html__( 'Content - Primary Sidebar', 'bc-consulting' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'bc-consulting' ),
					'full-container'   => esc_html__( 'Full Container', 'bc-consulting' ),
					),
				'type'     => 'select',
				'priority' => 170,
			)
		);
		
		$wp_customize->add_setting( 'blog_meta_hide',
			array(
				'default'           => $default['blog_meta_hide'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'bc_consulting_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'blog_meta_hide',
			array(
				'label'    => esc_html__( 'Hide Blog Archive Meta Info ?', 'bc-consulting' ),
				'section'  => 'theme_option_section_settings',
				'type'     => 'checkbox',
				
			)
		);
		
		$wp_customize->add_setting( 'signle_meta_hide',
			array(
				'default'           => $default['signle_meta_hide'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'bc_consulting_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'signle_meta_hide',
			array(
				'label'    => esc_html__( 'Hide Single post Meta Info ?', 'bc-consulting' ),
				'section'  => 'theme_option_section_settings',
				'type'     => 'checkbox',
				
			)
		);
		
/*Posts management section start */
$wp_customize->add_section( 'page_option_section_settings',
	array(
		'title'      => esc_html__( 'Page Management', 'bc-consulting' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

	
		/*Home Page Layout*/
		$wp_customize->add_setting( 'page_layout',
			array(
				'default'           => $default['page_layout'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'bc_consulting_sanitize_select',
			)
		);
		$wp_customize->add_control( 'page_layout',
			array(
				'label'    => esc_html__( 'Page Layout Options', 'bc-consulting' ),
				'section'  => 'page_option_section_settings',
				'description' => esc_html__( 'Choose between different layout options to be used as default', 'bc-consulting' ),
				'choices'   => array(
					'sidebar-content'  => esc_html__( 'Primary Sidebar - Content', 'bc-consulting' ),
					'content-sidebar' => esc_html__( 'Content - Primary Sidebar', 'bc-consulting' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'bc-consulting' ),
					'full-container'   => esc_html__( 'Full Container', 'bc-consulting' ),
					),
				'type'     => 'select',
				'priority' => 170,
			)
		);


		// Footer Section.
		$wp_customize->add_section( 'footer_section',
			array(
			'title'      => esc_html__( 'Copyright & Dev. Credits', 'bc-consulting' ),
			'priority'   => 130,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
			)
		);
		
		// Setting copyright_text.
		$wp_customize->add_setting( 'copyright_text',
			array(
			'default'           => $default['copyright_text'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control( 'copyright_text',
			array(
			'label'    => esc_html__( 'Copyright Write Text', 'bc-consulting' ),
			'section'  => 'footer_section',
			'type'     => 'textarea',
			'priority' => 120,
			)
		);
		
		
		/*$wp_customize->add_setting( 'dev_credits',
			array(
				'default'           => $default['dev_credits'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'bc_consulting_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'dev_credits',
			array(
				'label'    => esc_html__( 'Hide Developer Credits ?', 'bc-consulting' ),
				'section'  => 'footer_section',
				'type'     => 'checkbox',
				'priority' => 120,
				
			)
		);
		*/


/*Social Profile */
$wp_customize->add_section( 'social_profile_sec',
	array(
		'title'      => esc_html__( 'Social Profile', 'bc-consulting' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

		/*Social Profile*/
		$wp_customize->add_setting( '__fb_pro_link',
			array(
				'default'           => $default['__fb_pro_link'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( '__fb_pro_link',
			array(
				'label'    => esc_html__( 'Facebook', 'bc-consulting' ),
				'description' => esc_html__( 'Leave empty to hide', 'bc-consulting' ),
				'section'  => 'social_profile_sec',
				'type'     => 'text',
				
			)
		);	
		
		
		
		$wp_customize->add_setting( '__tw_pro_link',
			array(
				'default'           => $default['__tw_pro_link'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( '__tw_pro_link',
			array(
				'label'    => esc_html__( 'Twitter', 'bc-consulting' ),
				'description' => esc_html__( 'Leave empty to hide', 'bc-consulting' ),
				'section'  => 'social_profile_sec',
				'type'     => 'text',
				
			)
		);
		
		
		$wp_customize->add_setting( '__you_pro_link',
			array(
				'default'           => $default['__you_pro_link'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( '__you_pro_link',
			array(
				'label'    => esc_html__( 'Youtube', 'bc-consulting' ),
				'description' => esc_html__( 'Leave empty to hide', 'bc-consulting' ),
				'section'  => 'social_profile_sec',
				'type'     => 'text',
				
			)
		);					
		
		
		
	


		