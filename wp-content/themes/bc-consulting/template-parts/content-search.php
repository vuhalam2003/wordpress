<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bc-consulting
 */

?>

<article data-aos="fade-up" id="post-<?php the_ID(); ?>" <?php post_class( array('bc-blog-post col-md-12','aos-animate') ); ?>>
	<?php
    /**
    * Hook - bc_consulting_posts_blog_media.
    *
    * @hooked bc_consulting_posts_formats_thumbnail - 10
    */
    do_action( 'bc_consulting_posts_blog_media');
    ?>
    <div class="entry-post">
    	
		<?php
        /**
        * Hook - shoper_site_content_type.
        *
		* @hooked site_loop_heading - 10
        * @hooked render_meta_list	- 20
		* @hooked site_content_type - 30
        */
		 do_action( 'bc_consulting_site_content_type');
        ?>
      
       
    </div>
    
</article><!-- #post-<?php the_ID(); ?> -->
