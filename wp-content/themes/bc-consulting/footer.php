<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bc-consulting
 */
/**
* Hook - bc_consulting_site_footer
*
* @hooked bc_consulting_container_wrap_start
*/
do_action( 'bc_consulting_site_footer');
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
