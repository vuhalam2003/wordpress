<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
function bc_store_theme_setup(){
    // Make theme available for translation.
    load_theme_textdomain( 'bc-store', get_stylesheet_directory_uri() . '/languages' );

     // Remove custom header support.
    remove_theme_support( 'custom-header' );

    // Unregister the default headers.
    unregister_default_headers( array(
        'default-image',
    ) );
}
add_action( 'after_setup_theme', 'bc_store_theme_setup' );

if ( ! function_exists( 'bc_store_script' ) ) :
    function bc_store_script() {

        wp_enqueue_style( 'bc-store-google-fonts', '//fonts.googleapis.com/css?family=Josefin+Sans:ital,wght@0,100..700;1,100..700|Raleway:ital,wght@0,100..900;1,100..900&display=swap' );

        // Enqueue the child theme's stylesheet
        wp_enqueue_style( 
            'bc-consulting-style', 
            trailingslashit( get_template_directory_uri() ) . 'style.css', 
            array( 
                'bootstrap-5', 
                'fontawesome-6', 
                'scrollbar', 
                'owl-carousel', 
                'aos-next', 
                'bc-consulting-common', 
                'bc-consulting-navigation',
                
            ), 
            wp_get_theme()->get('Version') // Optional versioning for cache busting
        );
        // loading child style
        wp_register_style(
          'bc-store-style',
          get_stylesheet_directory_uri() . '/style.css'
        );
        wp_enqueue_style( 'bc-store-style');

         $custom_css = ':root {--primary-color:'.esc_attr( get_theme_mod('__primary_color','#555') ).'!important; --secondary-color: '.esc_attr( get_theme_mod('__secondary_color','#1e73be') ).'!important; --nav-h-color:'.esc_attr( get_theme_mod('__secondary_color','#1e73be') ).'!important;--nav-h-bg:'.esc_attr( get_theme_mod('__secondary_color','#1e73be') ).'!important;}';
        
        wp_add_inline_style( 'bc-store-style', $custom_css );
   
     	
    }
endif;

add_action( 'wp_enqueue_scripts', 'bc_store_script' );


/**
* WooCommerce
*/
if ( class_exists( 'woocommerce' ) ) {
    require get_stylesheet_directory() . '/inc/woocommerce.php';
}

function bc_store_reorder_comment_fields($fields) {
    // Rearrange the fields by defining the order explicitly
    $new_order = array();
    
    // Place 'author' field first
    $new_order['author'] = $fields['author'];
    
    // Place 'email' field second
    $new_order['email'] = $fields['email'];
    
    // Place 'url' field third (optional if you want to include it)
    if (isset($fields['url'])) {
        $new_order['url'] = $fields['url'];
    }
    
    // Place 'comment' field last
    $new_order['comment'] = $fields['comment'];
    
    return $new_order;
}
add_filter('comment_form_fields', 'bc_store_reorder_comment_fields');



if( !function_exists('bc_store_disable_from_parent') ):

    add_action('init','bc_store_disable_from_parent',10);
    function bc_store_disable_from_parent(){
        
      global $bc_consulting_Header_Layout;
      remove_action('bc_consulting_site_header', array( $bc_consulting_Header_Layout, 'site_header_layout' ), 30 );

      global $bc_consulting_post_related;
      remove_action('bc_consulting_site_content_type', array( $bc_consulting_post_related, 'site_loop_heading' ), 10 );

      global $bc_consulting_footer_layout;
        remove_action('bc_consulting_site_footer', array( $bc_consulting_footer_layout, 'site_footer_info' ), 80 );  

      remove_action( 'after_setup_theme', 'bc_consulting_custom_header_setup' );
    }
    
endif;

if( !function_exists('bc_store_site_header_layout') ):

    add_action('bc_consulting_site_header', 'bc_store_site_header_layout', 30 );
    function bc_store_site_header_layout(){
    ?>
      <div class="container header-layout-1" id="brand-wrap">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-12 logo-wrap">
                    <?php do_action('bc_consulting_header_layout_1_branding');?>
                </div>
                
                <div class="col-lg-9 col-md-9 col-12 d-flex justify-content-end">
                    <nav id="navbar" class="ow-navigation bc-store">
                        <div class="container d-flex justify-content-end">
                            <div class="navbar navbar-expand-lg justify-content-end">
                                <?php do_action('bc_consulting_header_layout_1_navigation');?>
                            </div>
                            <ul class="header-icon d-flex align-items-center justify-content-end ms-auto">
                                <li class="search"><a href="javascript:void(0)" class="search-modal-btn gs-tooltip-act" title="Search"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                
            </div>
        </div>  
    <?php       
    }

endif;    

if( !function_exists('bc_store_loop_heading') ):
    function bc_store_loop_heading() {
        if( is_page() ) return;
        if ( !is_singular() ) :
         the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" >', '</a></h3>' );
        endif;
    }
    add_action('bc_consulting_site_content_type', 'bc_store_loop_heading', 10 );
endif;



function bc_store_footer_info(){
    $text ='';
        $html = '<div class="end-of-theme"><div class="container"><div class="row">';
            $html .= '<div class="col-md-6">';
            
            if( get_theme_mod('copyright_text') != '' ) 
            {
                $text .= esc_html(  get_theme_mod('copyright_text') );
            }else
            {
                /* translators: 1: Current Year, 2: Blog Name  */
                $text .= sprintf( esc_html__( 'Copyright &copy; %1$s %2$s. All Right Reserved.', 'bc-store' ), date_i18n( _x( 'Y', 'copyright date format', 'bc-store' ) ), esc_html( get_bloginfo( 'name' ) ) );
                
            }

            $html  .= apply_filters( 'bc_footer_copywrite_filter', $text );
                
        
            /* translators: 1: developer website, 2: WordPress url  */
            $html  .= '<span class="dev_info">'.sprintf( esc_html__( 'Theme : %1$s By aThemeArt', 'bc-store' ), '<a href="'. esc_url( 'https://athemeart.com' ) .'" target="_blank" rel="nofollow">'.esc_html_x( 'BC Store', 'credit - theme', 'bc-store' ).'</a>').'</span>';
            
            $html .= '</div>';

            $html .= '<div class="col-md-6 align-self-center">';
            $html .= wp_nav_menu( array(
                    'theme_location'    => 'footer',
                    'depth'             => 1,
                    'echo'              => false,
                    'menu_class'        => 'd-flex justify-content-end footer-nav',
                    'container'         => 'ul',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                ) );
            $html .= '</div>';
        $html .= '</div></div></div>';
        
        echo wp_kses( $html,bc_consulting_alowed_tags() );
    
}
add_action('bc_consulting_site_footer', 'bc_store_footer_info', 30 );