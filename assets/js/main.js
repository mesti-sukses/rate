(function($){

	"use strict";

	var soul = {

      	// Bootstrap Carousels

      	carousel: function() {

      		$('.carousel.slide').carousel({
      			cycle: true
      		}); 
      	}, 

      	// Elements Equal Heights

      	matchHeight: function() {
      		$('.posts .col-xs-6').matchHeight({ 
      			property: 'min-height' 
      		});
      	},

      	// Fancybox For Popup Image

      	fancybox: function() {
      		$(".fancybox").fancybox();
      	},

		// Unisearch For Top Search 

		uisearch: function() {
			try { 
				(function($) {
					new UISearch( document.getElementById( 'sb-search' ) );
				})(jQuery);
			} catch(e) { 

			}
		},

		// Owl Carousel Sliders
		owlcarousel: function() {
			$("#featured-slider").owlCarousel({
				items:3,
				loop:true,
				margin:10,
				autoplay: true,
				responsive:{
					320:{
						items:1,
						margin: 0
					},
					480:{
						items:2,
						margin: 10
					},
					640:{
						items:3,
						margin: 10
					}
				}
			});
		},


	};

	$(document).ready(function() {
		"use strict";

		// Background Img

		$(".background-bg").css('background-image', function () {
			var bg = ('url(' + $(this).data("image-src") + ')');
			return bg;
		});


		soul.carousel();
		soul.matchHeight();
		soul.uisearch();
		soul.owlcarousel();
		soul.fancybox();
	});

	// Shortening Texts

	if ($(window).width() < 992) {
		"use strict";

		var minimized_elements = $('.posts.style-02 article p, .posts.style-03 article p');

		minimized_elements.each(function(){    
			var t = $(this).text();        
			if(t.length < 130) return;

			$(this).html(
				t.slice(0,130)+'<span>... </span><a href="#" style="display:none;" class="more">More</a>'+'<span style="display:none;">'+ t.slice(130,t.length)+' <a href="#" style="display:none;" class="less">Less</a></span>');
		}); 
	};

	// Responsive Menu Open and Close in Mobile

	if ($(window).width() < 767) {
		"use strict";
		$('.menu-item-has-children>a').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});

	};

})(jQuery);



/* Working Contact Form Js
-------------------------------------------------------------------*/
// Email from Validation
jQuery('#submit').on("click", function(e){ 

	//Stop form submission & check the validation
	e.preventDefault();

	// Variable declaration
	var error = false;
	var k_name = jQuery('#name').val();
	var k_email = jQuery('#email').val(); 
	var k_email = jQuery('#url').val(); 
	var k_message = jQuery('#message').val();

	/* Post Ajax function of jQuery to get all the data from the submission of the form as soon as the form sends the values to email.php*/
	jQuery.post("email.php", jQuery(".wpcf7-form").serialize(),function(result){
	    //Check the result set from email.php file.
	    if(result == 'sent'){
	    	$('.contact-message').html('<i class="fa fa-check contact-success"></i><div>Your message has been sent.</div>').fadeIn();
	    } else {
	    	// $('.error-message').html('<i class="fa fa-thumbs-down contact-error"></i><div>Your message has not been sent</div>').fadeIn();
	    }
	});

}); 
