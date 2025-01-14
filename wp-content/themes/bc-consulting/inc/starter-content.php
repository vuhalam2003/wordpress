<?php
/**
 * bc-consulting Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 *
 * @package bc-consulting
 * @subpackage bc-consulting
 * @since bc-consulting 1.0.0
 */

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `emart_shop_get_starter_content` filter before returning.
 *
 * @since bc-consulting 1.0.0
 *
 * @return array A filtered array of args for the starter_content.
 */

function bc_consulting_get_starter_content() {

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Add the core-defined business info widget to the footer 1 area.
			'footer' => array(
				'text_business_info',
				'text_about',
				'recent-posts',
			),
			
			// Add the core-defined business info widget to the footer 1 area.
			'logo-side' => array(
				'my_text' => array(
					// Widget $id -> set when creating a Widget Class
			        	'custom_html' , 
			        	// Widget $instance -> settings 
					array(
					  'title' => '',
					  'content'  => '<div class="header-info"><ul><li><h5>Number #1 Provider</h5><span>of Industrial Solution</span></li>
<li><h5>Global Certificate</h5><span>ISO 9001:2015</span></li><li><h5>Award Winning</h5><span>Solution Of The Year</span></li></ul></div>'
					)

				),
				'filter' => true,
				'visual' => true,
			),
			
				
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			
            'about' => array(
            	'template' => 'templates/page.php',
                'post_type'    => 'page',
                'post_title'   => esc_html__( 'About Us', 'bc-consulting' ),
                'post_content' => '<!-- wp:group {"tagName":"section","metadata":{"categories":["bc-consulting"],"patternName":"athemeart/about-us","name":"About Us Section"},"className":"container-fluid about-us-section","style":{"color":{"background":"#fffbf6"},"spacing":{"padding":{"top":"50px","bottom":"50px"}}},"layout":{"type":"constrained","contentSize":""}} -->
<section class="wp-block-group container-fluid about-us-section has-background" style="background-color:#fffbf6;padding-top:50px;padding-bottom:50px"><!-- wp:columns {"className":"container"} -->
<div class="wp-block-columns container"><!-- wp:column {"verticalAlignment":"center","className":"container","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","right":"100px"}}}} -->
<div class="wp-block-column is-vertically-aligned-center container" style="padding-top:0px;padding-right:100px;padding-bottom:0px"><!-- wp:paragraph {"style":{"color":{"text":"#f99800"},"elements":{"link":{"color":{"text":"#f99800"}}},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-text-color has-link-color" style="color:#f99800;margin-bottom:10px">// About Our Company</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"spacing":{"padding":{"bottom":"10px"}},"typography":{"fontSize":"40px"}}} -->
<h2 class="wp-block-heading" style="padding-bottom:10px;font-size:40px">Foundations of Excellence: Delve into Our Story</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"padding":{"top":"20px"}}}} -->
<div class="wp-block-columns" style="padding-top:20px"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:read-more {"content":"Learn More Us","className":"theme-btn"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"color":{"text":"#f99800"},"elements":{"link":{"color":{"text":"#f99800"}}}}} -->
<p class="has-text-color has-link-color" style="color:#f99800"><strong>Call Us : <a href="tel:6031112298">+1 (012) 111-33333</a></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:image {"id":1895,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="'.esc_url( get_theme_file_uri( '/assets/images/about.webp' ) ).'" alt="" class="wp-image-1895"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group --><!-- wp:columns {"metadata":{"categories":["bc-consulting"],"patternName":"athemeart/team","name":"Team Sections"},"className":"mt-50"} -->
<div class="wp-block-columns mt-50"><!-- wp:column {"layout":{"type":"default"}} -->
<div class="wp-block-column"><!-- wp:group {"className":"team-box","style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"color":{"background":"#272727"},"border":{"radius":"10px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group team-box has-background" style="border-radius:10px;background-color:#272727;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:image {"id":2055,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url( get_theme_file_uri( '/assets/images/team.webp' ) ).'" alt="" class="wp-image-2055" style="border-radius:10px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<h5 class="wp-block-heading has-white-color has-text-color has-link-color">Jamel Grant</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Entrepreneur / Chairman</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"dribbble"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"team-box","style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"color":{"background":"#272727"},"border":{"radius":"10px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group team-box has-background" style="border-radius:10px;background-color:#272727;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:image {"id":2052,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url( get_theme_file_uri( '/assets/images/team-2.webp' ) ).'" alt="" class="wp-image-2052" style="border-radius:10px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<h5 class="wp-block-heading has-white-color has-text-color has-link-color">Malina Deon</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Executive Directors</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"dribbble"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"team-box","style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"color":{"background":"#272727"},"border":{"radius":"10px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group team-box has-background" style="border-radius:10px;background-color:#272727;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:image {"id":2050,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url( get_theme_file_uri( '/assets/images/team_2.webp' ) ).'" alt="" class="wp-image-2050" style="border-radius:10px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<h5 class="wp-block-heading has-white-color has-text-color has-link-color">Meriga Linga</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Marketing Executive</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"dribbble"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"team-box","style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"color":{"background":"#272727"},"border":{"radius":"10px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group team-box has-background" style="border-radius:10px;background-color:#272727;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:image {"id":2051,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url( get_theme_file_uri( '/assets/images/team-1.webp' ) ).'" alt="" class="wp-image-2051" style="border-radius:10px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<h5 class="wp-block-heading has-white-color has-text-color has-link-color">Alina Deo</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Project Manager</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"dribbble"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->'
            ),
           
            'contact' => array(
            	'template' => 'templates/page.php',
                'post_type'    => 'page',
                'post_title'   => esc_html__( 'Contact', 'bc-consulting' ),
                'post_content' => '<!-- wp:group {"metadata":{"categories":["bc-consulting"],"patternName":"athemeart/section-heading","name":"Section Heading"},"className":"bc-heading","layout":{"type":"constrained"}} -->
<div class="wp-block-group bc-heading"><!-- wp:columns {"className":"is-not-stacked-on-mobile"} -->
<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column {"className":"has-text-align-center","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"20%","right":"20%"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-column has-text-align-center" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:20%;padding-bottom:var(--wp--preset--spacing--x-small);padding-left:20%"><!-- wp:paragraph {"className":"sub-title","style":{"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="sub-title" style="margin-bottom:10px">Who We Are</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"15px"}}}} -->
<h2 class="wp-block-heading" style="margin-bottom:15px">Serving Varied Industries</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Creating a catchy and memorable tagline is crucial for marketing cleaner services. Here are some tagline ideas that emphasize cleanliness</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:columns {"metadata":{"categories":["bc-consulting"],"patternName":"athemeart/feature-box","name":"Feature Box Section"}} -->
<div class="wp-block-columns"><!-- wp:column {"className":"bc-feature-box"} -->
<div class="wp-block-column bc-feature-box"><!-- wp:column {"className":"mask-top"} -->
<div class="wp-block-column mask-top"><!-- wp:paragraph -->
<p><i class="fa fa-pen-nib"></i></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Unique design</h4>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"mask-bottom"} -->
<div class="wp-block-column mask-bottom"><!-- wp:paragraph -->
<p><i class="fa fa-pen-nib"></i></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Unique design</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, quam dolore nemo itaque.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"bc-feature-box"} -->
<div class="wp-block-column bc-feature-box"><!-- wp:column {"className":"mask-top"} -->
<div class="wp-block-column mask-top"><!-- wp:paragraph -->
<p><i class="fa fa-screwdriver-wrench"></i></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Awesome feature</h4>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"mask-bottom"} -->
<div class="wp-block-column mask-bottom"><!-- wp:paragraph -->
<p><i class="fa fa-screwdriver-wrench"></i></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Awesome feature</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, quam dolore nemo itaque.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"bc-feature-box"} -->
<div class="wp-block-column bc-feature-box"><!-- wp:column {"className":"mask-top"} -->
<div class="wp-block-column mask-top"><!-- wp:paragraph -->
<p><i class="fa fa-mobile-screen"></i></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Mobile First Approach</h4>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"mask-bottom"} -->
<div class="wp-block-column mask-bottom"><!-- wp:paragraph -->
<p><i class="fa fa-mobile-screen"></i></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Mobile First Approach</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Recusandae, quod perspiciatis, at dicta enim similique earum temporibus iusto accusamus dolore adipisci veritatis nulla distinctio quisquam, nesciunt reprehenderit itaque nihil culpa!</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->'
            ),
            
		 
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'theme_mods' => array(
			
			'dialogue_text'  => esc_html__('Your Trusted 24 Hours Service Provider!','bc-consulting'),
			'__fb_pro_link'  =>'https://www.facebook.com/',
			'__tw_pro_link'  =>'https://twitter.com/',
			'__you_pro_link' =>'https://www.youtube.com/',		
		),

		// Default to a static front page and assign the front and posts pages.
		
		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "primary" location.
			'menu-1' => array(
				'name'  => __( 'Main Menu', 'bc-consulting' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	);

	/**
	 * Filters bc-consulting array of starter content.
	 *
	 * @since bc-consulting 1.0.0
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'bc_consulting_get_starter_content', $starter_content );
}

