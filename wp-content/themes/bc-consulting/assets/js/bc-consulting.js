;(function($) {
'use strict'
// Dom Ready

	var back_to_top_scroll = function() {
			
			$('#backToTop').on('click', function() {
				$("html, body").animate({ scrollTop: 0 }, 500);
				return false;
			});
			
			$(window).scroll(function() {
				if ( $(this).scrollTop() > 500 ) {
					
					$('#backToTop').addClass('active');
				} else {
				  
					$('#backToTop').removeClass('active');
				}
				
			});
			
		}; // back_to_top_scroll   
	
	
		//Trap focus inside mobile menu modal
		//Based on https://codepen.io/eskjondal/pen/zKZyyg	
		var trapFocusInsiders = function(elem) {
			
				
			var tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
			
			

			var firstTabbable = tabbable.first();
			var lastTabbable = tabbable.last();
			/*set focus on first input*/
			firstTabbable.focus();
			
			/*redirect last tab to first input*/
			lastTabbable.on('keydown', function (e) {
			   if ((e.which === 9 && !e.shiftKey)) {
				   e.preventDefault();
				   
				   firstTabbable.focus();
				  
			   }
			});
			
			/*redirect first shift+tab to last input*/
			firstTabbable.on('keydown', function (e) {
				if ((e.which === 9 && e.shiftKey)) {
					e.preventDefault();
					lastTabbable.focus();
				}
			});
			
			/* allow escape key to close insiders div */
			elem.on('keyup', function(e){
			  if (e.keyCode === 27 ) {
				elem.hide();
			  };
			});
			
		};

		var focus_to = function(action,element) {

			$(action).keyup(function (e) {
			    e.preventDefault();
				var code = e.keyCode || e.which;
				if(code == 13) { 
					$(element).focus();
				}
			});		
			
		}

	$(function() {
		back_to_top_scroll();

		/* ---------- Reponsive Drop down----------------*/


			var responsive_drop_down =  function(element) {
				var li = $(element).parent();
				if ( li.hasClass("ddl-active") || li.find(".ddl-active").length !== 0 || li.find(".dropdown-menu").is(":visible") ) {
					li.removeClass("ddl-active");
					li.children().find(".ddl-active").removeClass("ddl-active");
					li.children(".dropdown-menu").slideUp();
				}else {
					li.addClass("ddl-active");
					li.children(".dropdown-menu").slideDown();
				}
				$(element).find('i').toggleClass('fa-angle-up');
			}
			$(".ddl-switch").on("click", function(e, enterKeyPressed) {
				responsive_drop_down(this);
				
			});
			$("#navbar .navbar-toggler").on("click", function(e, enterKeyPressed) {
				e.preventDefault();
				trapFocusInsiders( $('#navbar .navbar') );
				$(this).find('i').toggleClass('fa-xmark');
			});
		
		/* ---------- Focus Event for Main Menu----------------*/
		if ( matchMedia( 'only screen and (min-width: 992px)' ).matches ) {
			$("#navbar a" ).on( "focus", function(e) {	
				$("ul.navbar-nav li.dropdown").addClass('focus');
				$("ul.navbar-nav li.dropdown").removeClass('current-focus');
				$(this).parents('li.menu-item-has-children').addClass('focus').addClass('current-focus');
			});
			$(window).hover(function () {
				if($("ul.navbar-nav li.dropdown.focus").length){
					$("ul.navbar-nav li.dropdown").addClass('focus').removeClass('current-focus');
				}
			});
		}
		$(".search-modal-btn").on("click", function(e) {
			$('.search-bar-modal').addClass('active').find('input').focus();
			trapFocusInsiders( $(".search-bar-modal") );
		});

		$(".appw-modal-close-button").on("click", function(e) {
			$('.search-bar-modal').removeClass('active');
		});
		/*==========================================================
		********************** scroll ********************
		===========================================================*/
			var lastScrollTop = 0, delta = 5;
			var position = $("#navbar").length? $("#navbar").first().position().top : 0;
			var scrollFrom = parseInt(position) + 200;
			$(window).scroll(function() {
				var nowScrollTop = $(this).scrollTop();
				if ( nowScrollTop > scrollFrom ) {
					$('#backToTop').addClass('active');
					$( "#navbar" ).addClass('sticky-header');
				} else {
					$('#backToTop').removeClass('active');
					$( "#navbar" ).removeClass('sticky-header');
				}

				if(Math.abs(lastScrollTop - nowScrollTop) >= delta){
					if (nowScrollTop > lastScrollTop){
						$( "#navbar.sticky-header" ).removeClass('active');
					} else {
						$( "#navbar.sticky-header" ).addClass('active');
					}
				}
				lastScrollTop = nowScrollTop;

				
			});

		AOS.init();
	});
})(jQuery);