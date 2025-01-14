<?php
/**
 * The Site Theme Header Class 
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bc-consulting
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class bc_consulting_Footer_Layout{
	/**
	 * Function that is run after instantiation.
	 *
	 * @return void
	 */
	public function __construct() {
		
		add_action('bc_consulting_site_footer', array( $this, 'site_footer_container_before' ), 5);
		add_action('bc_consulting_site_footer', array( $this, 'site_footer_widgets' ), 10);
		add_action('bc_consulting_site_footer', array( $this, 'site_footer_info' ), 80);
		add_action('bc_consulting_site_footer', array( $this, 'site_footer_container_after' ), 99);
		add_action('bc_consulting_site_footer', array( $this, 'site_footer_back_top' ), 100);
		
		add_action('wp_footer', array($this,'bc_search_bar_load_footer'),9999 );
		//add_action('wp_footer', array($this,'bc_consulting_myaccount_popup'),9999 );
	}

	function bc_consulting_myaccount_popup(){
		if ( class_exists( 'WooCommerce' ) ) :
		echo '<div class="bc-myacount-bar-modal" id="bc-myaccount">
		<div class="bc-myacount-modal-inner"><button class="button appw-modal-close-button" type="button"><i class="bi bi-x"></i></button>';

		echo do_shortcode('[woocommerce_my_account]');

		echo '
		</div>
		</div>';
		endif;
	}
	function bc_search_bar_load_footer(){
		echo '<div class="search-bar-modal" id="search-bar">
		<button class="button appw-modal-close-button" type="button"><i class="fa-solid fa-xmark"></i></button>';
		
			if( class_exists('APSW_Product_Search_Finale_Class_Pro') && class_exists( 'WooCommerce' ) ){
				do_action('apsw_search_bar_preview');
				
			}else if( class_exists('APSW_Product_Search_Finale_Class') && class_exists( 'WooCommerce' ) ){
				do_action('apsw_search_bar_preview');
			}else{
				echo '<form role="search" method="get" id="searchform" class="search-form" action="' . home_url( '/' ) . '" >
				<input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_html__('Search …','bc-consulting').'" />
				<button type="submit" class="search-submit"><i class="fa-solid fa-magnifying-glass"></i></button>
				</form>';
			}

		echo'</div>';
	}
	
	/**
	* bc_consulting foter conteinr before
	*
	* @return $html
	*/
	public function site_footer_container_before (){
		
		$html = ' <footer id="colophon" class="site-footer">';
						
		$html = apply_filters( 'bc_consulting_footer_container_before_filter',$html);		
				
		echo wp_kses( $html, $this->alowed_tags() );
		
						
	}
	
	/**
	* Footer Container before
	*
	* @return $html
	*/
	function site_footer_widgets(){
	

        if ( is_active_sidebar( 'footer' ) ) { ?>
         <div class="container footer-widget">
            <div class="row">
                <?php dynamic_sidebar( 'footer' ); ?>
            </div>
         </div>  
        <?php }

	}
	
	
	/**
	* bc_consulting foter conteinr after
	*
	* @return $html
	*/
	public function site_footer_info (){
		$text ='';
		$html = '<div class="end-of-theme"><div class="container"><div class="row">';
			$html .= '<div class="col-md-6">';
			
			if( get_theme_mod('copyright_text') != '' ) 
			{
				$text .= esc_html(  get_theme_mod('copyright_text') );
			}else
			{
				/* translators: 1: Current Year, 2: Blog Name  */
				$text .= sprintf( esc_html__( 'Copyright &copy; %1$s %2$s. All Right Reserved.', 'bc-consulting' ), date_i18n( _x( 'Y', 'copyright date format', 'bc-consulting' ) ), esc_html( get_bloginfo( 'name' ) ) );
				
			}

			$html  .= apply_filters( 'bc_footer_copywrite_filter', $text );
				
		
			/* translators: 1: developer website, 2: WordPress url  */
			$html  .= '<span class="dev_info">'.sprintf( esc_html__( 'Theme : %1$s By aThemeArt', 'bc-consulting' ), '<a href="'. esc_url( 'https://athemeart.com/downloads/bc-consulting/' ) .'" target="_blank" rel="nofollow">'.esc_html_x( 'bc-consulting', 'credit - theme', 'bc-consulting' ).'</a>',  '<a href="'.esc_url( __( 'https://wordpress.org', 'bc-consulting' ) ).'" target="_blank" rel="nofollow">'.esc_html_x( 'WordPress', 'credit to cms', 'bc-consulting' ).'</a>' ).'</span>';
			
			$html .= '</div>';

			$html .= '<div class="col-md-6 align-self-center">';
			$html .= wp_nav_menu( array(
					'theme_location'    => 'footer',
					'depth'             => 1,
					'echo'              => false,
					'menu_class'  		=> 'd-flex justify-content-end footer-nav',
					'container'			=> 'ul',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				) );
			$html .= '</div>';
		$html .= '</div></div></div>';
		
		echo wp_kses( $html, $this->alowed_tags() );
	
	}
	
	public function site_footer_back_top (){
		
		echo '<a id="backToTop" class="ui-to-top"><i class="fa fa-arrow-up-short-wide"></i></a>';
	
	}
	/**
	* bc_consulting foter conteinr after
	*
	* @return $html
	*/
	public function site_footer_container_after (){
		
		$html = '</footer>';
						
		$html = apply_filters( 'bc_consulting_footer_container_after_filter',$html);		
				
		echo wp_kses( $html, $this->alowed_tags() );
	
	}
	
	
	private function alowed_tags(){
		
		if( function_exists('bc_consulting_alowed_tags') ){ 
			return bc_consulting_alowed_tags(); 
		}else{
			return array();	
		}
		
	}
}

$bc_consulting_footer_layout = new bc_consulting_Footer_Layout();