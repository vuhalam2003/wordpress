<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bc-consulting
 */

get_header();

$layout = bc_consulting_get_option('blog_layout');

/**
* Hook - container_wrap_start 		- 5
*
* @hooked bc_consulting_container_wrap_start
*/
do_action( 'bc_consulting_container_wrap_start', esc_attr( $layout ));

	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		/**
		* Hook - bc_consulting_site_footer
		*
		* @hooked bc_consulting_container_wrap_start
		*/
		do_action( 'bc_consulting_single_post_navigation');

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
		
/**
* Hook - container_wrap_end 		- 999
*
* @hooked bc_consulting_container_wrap_end
*/
do_action( 'bc_consulting_container_wrap_end', esc_attr( $layout ));
get_footer();