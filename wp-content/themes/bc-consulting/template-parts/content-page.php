<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bc-consulting
 */

?>
<article data-aos="fade-up" id="post-<?php the_ID(); ?>" <?php post_class( array('bc-consulting-blogwrap','aos-animate') ); ?>>

 	 <?php
    /**
    * Hook - bc_consulting_posts_blog_media.
    *
    * @hooked bc_consulting_posts_formats_thumbnail - 10
    */
    do_action( 'bc_consulting_posts_blog_media' );
    ?>
    <div class="post page-content">
               
		<?php
        /**
        * Hook - bc_consulting_site_content_type.
        *
		* @hooked site_loop_heading - 10
        * @hooked render_meta_list	- 20
		* @hooked site_content_type - 30
        */
        do_action( 'bc_consulting_site_content_type');
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bc-consulting' ),
			'after'  => '</div>',
		) );
        ?>
      
       
       <?php if ( get_edit_post_link() ) : ?>
		<div class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'bc-consulting' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</div ><!-- .entry-footer -->
	<?php endif; ?>
     <div class="clearfix"></div>
    </div>
   
</article><!-- #post-<?php the_ID(); ?> -->


