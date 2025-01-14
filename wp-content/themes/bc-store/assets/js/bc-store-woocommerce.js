/*
* woocommerce
**/

;(function($) {
	'use strict'
	// Dom Ready
	$(function() {

		if($('.ajax_add_to_cart ').length){

			$( 'body' ).on( 'click', '.ajax_add_to_cart', function(e) {
				 e.preventDefault();
				$(this).parents('ul.caption-list-product').find('li').eq(1).hide();
			
			});

		}
		if( $('.woocommerce-ordering .orderby').length ){
			$('.woocommerce-ordering .orderby').customSelect();
		}
	 	/* ============== Quantity buttons ============== */
	
		// Target quantity inputs on product pages
		$( 'input.qty:not(.product-quantity input.qty)' ).each( function() {
			var min = parseFloat( $( this ).attr( 'min' ) );
		
			if ( min && min > 0 && parseFloat( $( this ).val() ) < min ) {
				$( this ).val( min );
			}
		});
		
		$( document ).on( 'click', '.plus, .minus', function() {
		
			// Get values
			var $qty        = $( this ).closest( '.quantity' ).find( '.qty' ),
				currentVal  = parseFloat( $qty.val() ),
				max         = parseFloat( $qty.attr( 'max' ) ),
				min         = parseFloat( $qty.attr( 'min' ) ),
				step        = $qty.attr( 'step' );
		
			// Format values
			if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
			if ( max === '' || max === 'NaN' ) max = '';
			if ( min === '' || min === 'NaN' ) min = 0;
			if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;
		
			// Change the value
			if ( $( this ).is( '.plus' ) ) {
		
				if ( max && ( max == currentVal || currentVal > max ) ) {
					$qty.val( max );
				} else {
					$qty.val( currentVal + parseFloat( step ) );
				}
		
			} else {
		
				if ( min && ( min == currentVal || currentVal < min ) ) {
					$qty.val( min );
				} else if ( currentVal > 0 ) {
					$qty.val( currentVal - parseFloat( step ) );
				}
		
			}
		
			// Trigger change event
			$qty.trigger( 'change' );
		});
		

		if( $('#bc-product-grid').length ){
			
			$( 'body' ).on( 'click', '#bc-product-list', function(e) {
				 e.preventDefault();
				 $(this).addClass('active');
				 $('ul.products li').removeClass('grid');
				 $('#bc-product-grid').removeClass('active');
				 $('ul.products li').addClass('do-to-list');
				
			});
		}

		if( $('#bc-product-grid').length ){
			
			$( 'body' ).on( 'click', '#bc-product-grid', function(e) {
				 e.preventDefault();
				 $(this).addClass('active');
				 $('#bc-product-list').removeClass('active');
				$('ul.products li').removeClass('do-to-list');
				$('ul.products li').addClass('grid');
				
			});
		}
		

		/* ============== Product  Carousel============= */
		if( $(".bc-product-carousel").length){
		
			$(".bc-product-carousel").each(function(){
						var $this = $(this);
					
				$($this).owlCarousel({
					navText: [ '<i class="fa-solid fa-arrow-right-long"></i>', '<i class="fa-solid fa-arrow-left-long"></i>' ],
					responsiveClass:true,
					//center: true,
					stagePadding: 10,
					margin:15,
					loop: true,
					infinite:true,
					autoplay: ( $this.data('autoplay') == "yes" ) ? true : false,
					autoplayTimeout: ( $this.data('autoplay_speed') != "" ) ? $this.data('autoplay_speed') : 4000,
					
					nav: ( $this.data('slider_nav') == "yes" ) ? true : false,
					dots: ( $this.data('slider_dot') == "yes" ) ? true : false,
					smartSpeed: ( $this.data('smart_speed') != "" ) ? $this.data('smart_speed') : 2500,
					rtl: ( $("body.rtl").length ) ? true : false, 
					autoplayHoverPause: ( $this.data('pause_on_hover') == "yes" ) ? true : false,
					slideBy:( $this.data('md') != "" ) ? $this.data('md') : 4,
					responsive: {
						0: {
							items: ( $this.data('xs') != "" ) ? $this.data('xs') : 1,
						},
						600: {
							items: ( $this.data('sm') != "" ) ? $this.data('sm') : 2,
						},
						1000: {
							items: ( $this.data('md') != "" ) ? $this.data('md') : 4,
						}
					}
				});
			});	
		}
	 
	});
})(jQuery);