<?php
/**
 * All POST Related Function 
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bc_consulting
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class bc_consulting_post_related {
	/**
	 * Function that is run after instantiation.
	 *
	 * @return void
	 */
	public function __construct() {
		
		if( !is_admin()  )
		{
			add_action( 'bc_consulting_site_content_type', array( $this,'site_loop_heading' ), 10 ); 
			add_action( 'bc_consulting_site_content_type', array( $this,'site_content_type' ), 30 ); 
		}
		
		add_action( 'bc_consulting_posts_blog_media', array( $this, 'render_thumbnail' ) ); 
		
		
		add_action( 'bc_consulting_loop_navigation', array( $this,'site_loop_navigation' ) );
		
		
		add_filter( 'the_content_more_link', array( $this,'content_read_more_link' ));
		add_filter( 'excerpt_more', array( $this,'excerpt_read_more_link' ) );

		add_action( 'bc_consulting_single_post_navigation', array( $this,'single_post_navigation' ),10 );
		add_action( 'bc_consulting_single_post_navigation', array( $this,'author_bio' ),20 );
	}
	
	/**
	 * Web Site heading
	 *
	 * @since 1.0.0
	 */
	public function site_loop_heading() {
		if( is_page() ) return;
		if ( is_singular() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" >', '</a></h3>' );
		endif;
	}
    /**
     * @since  Blog Expert 1.0.0
     *
     * @param null
     */
    function site_content_type(){
		$type = apply_filters( 'bc_consulting_content_type_filter', bc_consulting_get_option( 'blog_loop_content_type' ) );
		
		echo '<div class="content-wrap">';
			if( ! is_single() && !is_page()):
				if ( $type == 'content' ) {
					the_content();
				}else{
					echo wp_kses_post( get_the_excerpt() );
				}
			else:
				the_content();
			endif;
		echo '</div>';

    }
	/**
	* Adds custom Read More link the_content().
	* add_filter( 'the_content_more_link', array( $this,'content_read_more_link' ));
	* @param string $more "Read more" excerpt string.
	* @return string (Maybe) modified "read more" excerpt string.
	*/
	public function content_read_more_link( $more  ) {
		if ( is_admin() ) return $more;
		return sprintf( '<div class="more-link">
             <a href="%1$s" class="theme-btn"><span>%2$s</span></a>
        </div>',
            esc_url( get_permalink( get_the_ID() ) ),
		    esc_html( bc_consulting_get_option( 'read_more_text' ) )
        );
		
	}
	
	/**
	* Filter the "read more" excerpt string link to the post.
	* //add_filter( 'excerpt_more', array( $this,'excerpt_read_more_link' ) );
	* @param string $more "Read more" excerpt string.
	* @return string (Maybe) modified "read more" excerpt string.
	*/
	public function excerpt_read_more_link( $more ) {
		if ( is_admin() ) return $more;
		if ( ! is_single() ) {
			$more = sprintf( '<div class="more-link">
				 <a href="%1$s" class="theme-btn"><span>%2$s</span></a>
			</div>',
				esc_url( get_permalink( get_the_ID() ) ),
				esc_html( bc_consulting_get_option( 'read_more_text' ) )
			);
			
		}
		return $more;
	}

	/**
	 * Post Posts Loop Navigation
	 * add_action( 'bc_consulting_loop_navigation', $array( $this,'site_loop_navigation' ) ); 
	 * @since 1.0.0
	 */
	function site_loop_navigation( $type = '' ) {
		
		echo '<div class="pagination-custom aos-animate" data-aos="fade-up">';
		the_posts_pagination( array(
		'type' => 'list',
		'mid_size' => 2,
		'prev_text' => esc_html__( 'Previous', 'bc-consulting' ),
		'next_text' => esc_html__( 'Next', 'bc-consulting' ),
		'screen_reader_text' => esc_html__( '&nbsp;', 'bc-consulting' ),
		) );
		echo '</div>';
		
		
	}
	
	
	/**
	 * Render post type thumbnail.
	 *
	 * @param $formats = string.
	 */
	public function render_thumbnail( $formats = '') {
		
		if( empty( $formats ) || is_array($formats) ) { $formats = get_post_format( get_the_ID() ); }
		
		
		switch ( $formats ) {
			default:
				$this->get_image_thumbnail();
			break;
			case 'gallery':
				$this->get_gallery_thumbnail();
			break;
			case 'audio':
				$this->get_audio_thumbnail();
			break;
			case 'video':
				$this->get_video_thumbnail();
			break;
		} 
	
	}
	
	
	/**
	 * Post formats audio.
	 *
	 * @since 1.0.0
	 */
	public function get_gallery_thumbnail(){
		
		global $post;
		$html = '';
		if( has_block('gallery', $post->post_content) ): 
			$html = '<div class="entry-cover">';
			$post_blocks = parse_blocks( $post->post_content );
			
			if( !empty( $post_blocks ) ):

				$html .= '<figure class="gallery-media fs-product-slider" data-slider_nav="yes">';
				foreach ( $post_blocks as $row  ):

					if( $row['blockName']=='core/gallery' ){
						
						foreach ( $row['innerBlocks'] as $item  ):
							if( !empty($item["attrs"]["id"]) ):

							   $link   = wp_get_attachment_url( $item["attrs"]["id"] );
							   $html  .= '<div class="item"><img src="' . esc_url( $link ) . '"  class="img-responsive" alt="' .esc_attr( get_the_title() ). '" title="' .esc_attr( get_the_title() ). '"  /></div>';
							endif;

						endforeach;
					}
					//
				endforeach;
				$html .= '</figure>';
				
			endif;
			$html .= '</div>';

		elseif ( get_post_gallery() ) :
			$html = '<div class="entry-cover gallery">';
			$html .= get_avatar( get_the_author_meta('user_email'), $size = '60');
			$html .= '<figure class="gallery-media fs-product-slider" data-slider_nav="yes">';
			
				$gallery = get_post_gallery( $post, false );
				if( !empty($ids) ):
					$ids     = explode( ",", $gallery['ids'] );
					foreach( $ids as $id ) {
					
					   $link   = wp_get_attachment_url( $id );
					
					   $html  .= '<div class="item gallery-image"><img src="' . esc_url( $link ) . '"  class="img-responsive" alt="' .esc_attr( get_the_title() ). '" title="' .esc_attr( get_the_title() ). '"  /></div>';
					
					}
				endif;
				
			$html .= '</figure>';
			$html .= '</div>';
		else: 
			
			$html .= $this->get_image_thumbnail();
			
		endif;	
		
		
		
		$html =  apply_filters( 'bc_consulting_gallery_thumbnail', $html );
		
		echo wp_kses( $html, $this->alowed_tags() );
	}
	/**
	 * Post formats audio.
	 *
	 * @since 1.0.0
	 */
	public function get_audio_thumbnail(){
		
		$content 		= apply_filters( 'the_content', get_the_content() );
		$audio			= false;
		
		$post_thumbnail_url 	= '';
		$html 			= '';
	
		// Only get audio from the content if a playlist isn't present.
		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$audio 		= get_media_embedded_in_content( $content, array( 'audio' ) );
		}
		
		if ( has_post_thumbnail() ) :
		
			$post_thumbnail_id 		= get_post_thumbnail_id( get_the_ID() );
			$post_thumbnail_url 	= wp_get_attachment_url( $post_thumbnail_id );
		
		endif;
			
			
		// If not a single post, highlight the audio file.
		if ( ! empty( $audio ) )
		{	 $i = 0;
			
			$html  = '<div class="entry-cover ">';
			foreach ( $audio as $audio_html ) : $i++;
			
				if( $post_thumbnail_url != "" )
				{
					
					$html .= '<div class="gallery-image audio"><img src="'.esc_url( $post_thumbnail_url ).'"/></div>


					<div class="audio-center">';
					
					$html .= wp_kses( $audio_html, $this->alowed_tags() );
					
					$html .= '</div>';
					
				}else{
					
					$html .= wp_kses( $audio_html, $this->alowed_tags() );
					
				}
			
				if( $i == 1 ){ break; }
					
			endforeach;
			$html .= '</div>';
		}else {
			$html .= $this->get_image_thumbnail();
		}
		
		
		$html =  apply_filters( 'bc_consulting_audio_thumbnail', $html );
		
		echo wp_kses( $html, $this->alowed_tags() );
	}
	
	
	/**
	 * Post formats video.
	 *
	 * @since 1.0.0
	 */
	public function get_video_thumbnail(){
		
		$content	 = apply_filters( 'the_content', get_the_content(get_the_ID()) );
		$video 	  	 = false;
		$html 		 = '';
		
		// Only get video from the content if a playlist isn't present.
		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
		}
        
		if ( ! empty( $video ) ) 
		{	
			$html = '<div class="entry-cover">';
			$i = 0;
			foreach ( $video as $video_html ) {  $i++;
			
				$html  .=  '<div class="entry-video embed-responsive embed-responsive-16by9">';
				$html .= wp_kses( $video_html, $this->alowed_tags() );
				$html  .=  '</div>';
				
				if( $i == 1 ){ break; }
			}
			$html .= '</div>';
		}else
		{ 
			$html .= $this->get_image_thumbnail();
		}
		
		
		
		$html =  apply_filters( 'bc_consulting_video_thumbnail', $html );
		
		echo wp_kses( $html, $this->alowed_tags() );
	}
	
	
	/**
	 * Post formats thumbnail.
	 *
	 * @since 1.0.0
	 */
	public function get_image_thumbnail(){
		$html = '';
		
		if ( has_post_thumbnail() ) :

			$html = '<div class="entry-cover thumbnail">';
			$post_thumbnail_id  = get_post_thumbnail_id( get_the_ID() );
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			
			
			if ( is_singular() )
			{
				$html  .=  '<a href="'.esc_url( $post_thumbnail_url ).'" class="thickbox">';
			} else
			{
				$html  .= '<a href="'.esc_url( get_permalink(get_the_ID()) ).'" class="bookmark" rel="bookmark">';
			}
			$html .='<i class="fa fa-plus"></i></a>';
        	$html .= get_the_post_thumbnail( get_the_ID(), 'full' );
			
			$html .= '</div>';
        endif;
		

		
		
	
		$html =  apply_filters( 'bc_consulting_image_thumbnail', $html );
		
		echo wp_kses( $html, $this->alowed_tags() );
	}
	
	
	private function post_get_avatar( ) {
			
		$html = '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" class="avatar_round d-flex avatar" > '.get_avatar( get_the_author_meta('user_email'), $size = '60').'</a>';
	   
		
		return wp_kses( $html, $this->alowed_tags() );
	}
	/**
	 * Post Single Posts Navigation 
	 *
	 * @since 1.0.0
	 */
	function single_post_navigation( ) {
		
		$html ='<div class="single-prev-next container"><div class="row">';
		$prevPost = get_previous_post();
		if( $prevPost ) :
			$html .= '<div class="col-md-6 col-sm-6"><div class="d-flex">';
			
				$prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(60,60) );
				
				if( $prevthumbnail ){
					$html .= '<div class="align-self-center">'. get_previous_post_link('%link',$prevthumbnail). '</div>'; 
				}
				
				$html .='<div class="flex-fill ms-auto text-end"><h5><i class="fa fa-long-arrow-left"></i>'.esc_html__('Previous Article','bc-consulting').'</h5>';
					$html .=get_previous_post_link('%link',"<span>%title</span>"); 
				$html .='</div>';
				
			$html .= '</div></div>';
			
		endif;
		$nextPost = get_next_post();
		if( $nextPost ) : 
			$html .= '<div class="col-md-6 col-sm-6 ms-auto"><div class="d-flex">';
				$html .='<div class="flex-fill"><h5>'.esc_html__('Next Article','bc-consulting').'<i class="fa fa-long-arrow-right"></i></h5>';
					$html .=get_next_post_link('%link',"<span>%title</span>");
				$html .='</div>';
				
				$nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(60,60) );
			
				if( !empty( $nextthumbnail ) ){
					$html .= '<div class="align-self-center">'. get_previous_post_link('%link',$nextthumbnail). '</div>'; 
				}
				
			$html .= '</div></div>';
			
		endif;
		$html .='</div></div>';
		
		$html  	 = apply_filters( 'bc_consulting_single_post_navigation_filter', $html );
			
		echo wp_kses( $html, $this->alowed_tags() );
		
	} 

	function author_bio(){
	?>

		<div id="author-info">
			<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta('user_email'), '80', '' ); ?>
			</div>
			<div>
				<h4><?php the_author_link(); ?></h4>
				<div class="author-description">
				<?php the_author_meta('description'); ?>
				</div>
			</div>
		</div>

	<?php
	}
	private function alowed_tags(){
		
		if( function_exists('bc_consulting_alowed_tags') ){ 
			return bc_consulting_alowed_tags(); 
		}else{
			return array();	
		}
		
	}
	
}

$bc_consulting_post_related = new bc_consulting_post_related();