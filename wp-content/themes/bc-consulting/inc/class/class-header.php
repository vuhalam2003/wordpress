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
class bc_consulting_Header_Layout{
	/**
	 * Function that is run after instantiation.
	 *
	 * @return void
	 */
	public function __construct() {

		add_action('bc_consulting_header_layout_1_branding', array( $this, 'get_site_branding' ), 10 );

		add_action('bc_consulting_header_layout_1_navigation', array( $this, 'get_site_navigation' ), 10 );

		add_action('bc_consulting_site_header', array( $this, 'site_skip_to_content' ), 5 );
		
		add_action('bc_consulting_site_header', array( $this, 'site_header_wrap_before' ), 10 );

		add_action('bc_consulting_site_header', array( $this, 'site_top_bar' ),20 );
		
		add_action('bc_consulting_site_header', array( $this, 'site_header_layout' ), 30 );
		add_action('bc_consulting_site_header', array( $this, 'site_header_wrap_after' ), 99 );
		add_action('bc_consulting_site_header', array( $this, 'site_hero_sections' ), 999 );

		//add_action('bc_consulting_site_header', array( $this, 'get_site_breadcrumb' ), 9999 );
		
	}
	
	/**
	* Container before
	*
	* @return $html
	*/
	function site_skip_to_content(){
		
		echo '<a class="skip-link screen-reader-text" href="#primary">'. esc_html__( 'Skip to content', 'bc-consulting' ) .'</a>';
	}

	/**
	* @return $html
	*/
	function site_top_bar(){
		   echo '<div id="top-bar-wrap"><div class="container"><div class="d-flex align-items-center row">';
		   echo '<ul class="info d-flex col-md-6"><li class="flex-fill">'.esc_html( bc_consulting_get_option('dialogue_text')  ).'</li></ul>';
		   echo '<div class="justify-content-end ms-auto d-flex col-md-6">';
				wp_nav_menu( array(
					'theme_location'    => 'top-bar',
					'depth'             => 1,
					'menu_class'  		=> 'link-bar d-flex',
					'container'			=> 'ul',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				) );

				echo '<ul class="social d-flex">';	
					if( bc_consulting_get_option('__fb_pro_link') != "" ): 
						echo '<li class="social-item-facebook"><a href="'.esc_url( bc_consulting_get_option('__fb_pro_link') ).'" target="_blank" rel="nofollow"><i class="fa-brands fa-facebook-f"></i></a></li>';		
					endif;
					if( bc_consulting_get_option('__tw_pro_link') != "" ): 
						echo '<li class="social-item-twitter"><a href="'.esc_url( bc_consulting_get_option('__tw_pro_link') ).'" target="_blank" rel="nofollow"><i class="fa-brands fa-x-twitter"></i></a></li>';
					endif;
					if( bc_consulting_get_option('__you_pro_link') != "" ): 
						echo '<li class="social-item-youtube"><a href="'.esc_url( bc_consulting_get_option('__you_pro_link') ).'" target="_blank" rel="nofollow"><i class="fa-brands fa-youtube"></i></a></li>';
					 endif;
				echo '</ul>';
			    echo '</div>';
		   echo '</div></div></div>';

	}

	/**
	* @return $html
	*/
	function site_header_wrap_before(){
		
		$html = '<header id="masthead" class="site-header style_1">';	
		
		echo wp_kses( $html , $this->alowed_tags() );
		
	}
	/**
	* @return $html
	*/
	function site_header_wrap_after(){
		
		$html = '</header>';	
		
		echo wp_kses( $html , $this->alowed_tags() );
		
	}
	
	/**
	* Container before
	*
	* @return $html
	*/
	function site_header_layout(){
		?>
		<div class="container" id="brand-wrap">
			<div class="row align-items-center">
				<div class="col-lg-3 col-md-3 col-12 logo-wrap">
					<?php do_action('bc_consulting_header_layout_1_branding');?>
				</div>
				<?php if( is_active_sidebar( 'logo-side' ) ) : ?>
				<div class="col-lg-9 col-md-9 col-12 d-flex justify-content-end">
					<?php dynamic_sidebar( 'logo-side' ); ?>
				</div>
				<?php endif;?>
			</div>
		</div>

		 <nav id="navbar" class="ow-navigation underline ">
		 	<div class="container d-flex align-items-center">
				<div class="navbar navbar-expand-lg">
					<?php do_action('bc_consulting_header_layout_1_navigation');?>
				</div>
					<?php if( !empty($this->get_site_navbar_icon()) ){
				echo wp_kses( $this->get_site_navbar_icon(), $this->alowed_tags());
				} ?>
			 </div>
		 </nav>
		<?php		
	}

	/**
	* Get the Site Main Menu / Navigation
	*
	* @return HTML
	*/
	public function get_site_navbar_icon(){ 

	 ?>
	<ul class="header-icon d-flex align-items-center justify-content-end ms-auto">
		<li class="search"><a href="javascript:void(0)" class="search-modal-btn gs-tooltip-act" title="Search"><i class="fa-solid fa-magnifying-glass"></i></a></li>
	</ul>

	 <?php
	}
	
	
	/**
	* Get the Site logo
	*
	* @return HTML
	*/
	public function get_site_branding (){
		
		$html = '<div class="logo-wrap">';
		
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$html .= get_custom_logo();
			
		}
		if ( display_header_text() == true ){
			
			$html .= '<h3><a href="'.esc_url( home_url( '/' ) ).'" rel="home" class="site-title">';
			$html .= get_bloginfo( 'name' );
			$html .= '</a></h3>';
			$description = get_bloginfo( 'description', 'display' );
		
			if ( $description ) :
			    $html .=  '<div class="site-description">'.esc_html($description).'</div>';
			endif;
		}
		
		
		$html .= '</div>';
		$html = apply_filters( 'get_site_branding_filter', $html );
		echo wp_kses( $html, $this->alowed_tags() );
		
	}
	
	/**
	* Get the Site Main Menu / Navigation
	*
	* @return HTML
	*/
	public function get_site_navigation (){
	?>

  	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  		<i class="fa fa-solid fa-bars"></i>
    </button>

  	<?php
		wp_nav_menu( array(
		    'theme_location'    => 'menu-1',
		    'depth'             => 3,
		    'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse ',
            'container_id'      => 'navbarSupportedContent',
		    'menu_class'        => 'nav navbar-nav',
		    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
		    'walker'            => new WP_Bootstrap_Navwalker())
		);
	
	}
	
	/**
	* Get the Site search bar
	*
	* @return HTML
	*/
	public function get_site_search_form (){
	?>
	<div class="fly-search-bar" id="fly-search-bar">
        <div class="container-wrap">
			<?php 
            $css =	'';
            if( class_exists('APSW_Product_Search_Finale_Class') && class_exists( 'WooCommerce' ) ){
           		 do_action('apsw_search_bar_preview');
           		 $css = 'active_product_search';
            }else{
            	get_search_form();
            }
            ?>
            <a href="javascript:void(0)" class="search-close-trigger <?php echo esc_attr( $css );?>"><i class="icofont-close"></i></a>
        </div>
	</div>		
	<?php
	}

	public function get_site_breadcrumb (){
	if ( is_404() || 'templates/without-hero.php' == get_page_template_slug() ) return;
		if( function_exists('bcn_display') && ( !is_home() || !is_front_page())  ):?>
        
           <div class="bc-consulting-breadcrumbs-wrap"><div class="container"><div class="row"><div class="col-md-12">
           <ul class="bc-consulting-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php bcn_display_list();?>
           </ul></div></div></div>
           </div>
            
        <?php
		endif; 
	}
	/**
	* Get the hero sections
	*
	* @return HTML
	*/
	public function site_hero_sections(){
		if ( is_404() || 'templates/without-hero.php' == get_page_template_slug() ) return;
		
		if ( is_front_page() && is_active_sidebar( 'slider' ) ) : 
		 dynamic_sidebar( 'slider' );
		else: 
			$header_image = !empty( get_header_image() ) ?  'background-image: url('.esc_url( get_header_image() ).'); background-position: center center; background-size: cover;' : 't';
		?>
        	
		<div id="static_header_banner" style="<?php echo esc_attr($header_image);?>" >

		    	<div class="content-text">
		            <div class="container">
		              <?php 
		              if( !empty($this->hero_block_heading()) ){
		              	echo wp_kses( $this->hero_block_heading(), $this->alowed_tags());
		              }
		              ?>
                        <div></div>
		            </div>
		        </div>
		    </div>
		<?php
		endif;
	}
	/**
	 * Add Banner Title.
	 *
	 * @since 1.0.0
	 */
	function hero_block_heading() {
		echo '<div class="site-header-text-wrap">';
		
			if ( is_home() ) {
					echo '<h1 class="page-title-text">';
					echo bloginfo( 'name' );
					echo '</h1>';
					echo '<p class="subtitle">';
					echo esc_html(get_bloginfo( 'description', 'display' ));
					echo '</p>';
			}else if ( function_exists('is_shop') && is_shop() ){
				if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
					echo '<h1 class="page-title-text">';
					echo esc_html( woocommerce_page_title() );
					echo '</h1>';
				}
			}else if( function_exists('is_product_category') && is_product_category() ){
				echo '<h1 class="page-title-text">';
				echo esc_html( woocommerce_page_title() );
				echo '</h1>';
				echo '<p class="subtitle">';
				do_action( 'emart_archive_description' );
				echo '</p>';
				
			}elseif ( is_singular() ) {
				echo '<h1 class="page-title-text">';
					echo single_post_title( '', false );
				echo '</h1>';
			} elseif ( is_archive() ) {
				
				the_archive_title( '<h1 class="page-title-text">', '</h1>' );
				the_archive_description( '<p class="archive-description subtitle">', '</p>' );
				
			} elseif ( is_search() ) {
				echo '<h1 class="title">';
					printf( /* translators:straing */ esc_html__( 'Search Results for: %s', 'bc-consulting' ),  get_search_query() );
				echo '</h1>';
			} elseif ( is_404() ) {
				echo '<h1 class="display-1">';
					esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bc-consulting' );
				echo '</h1>';
			}
		
		echo '</div>';
	}
	private function alowed_tags(){
		
		if( function_exists('bc_consulting_alowed_tags') ){ 
			return bc_consulting_alowed_tags(); 
		}else{
			return array();	
		}
		
	}
}

$bc_consulting_Header_Layout = new bc_consulting_Header_Layout();