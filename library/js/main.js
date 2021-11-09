jQuery(function($){
	$(window).on("load resize scroll", function() {
		// animations
		$.fn.isInViewport = function() {
		var elementTop = $(this).offset().top;
		var elementBottom = elementTop + $(this).outerHeight();
		var viewportTop = $(window).scrollTop();
		var viewportBottom = viewportTop + $(window).height();
		return elementBottom > viewportTop && elementTop < viewportBottom;
		};
		
		$('section').each(function() {
			if ($(this).isInViewport()) {
				$(this).addClass('active');
				$(this).children().find('.animate').addClass('fadeInUp');
			} else {
				$(this).removeClass('active');
			}
			}, 2000);
	
	});

	$(document).ready(function(){
		
		// carousel multi-slide
		

		// set slideshow height to be consistent based on tallest slide
		var slideHeight = 0;
		$('.hero .carousel-item').each(function(){
			if($(this).height() > slideHeight){
				slideHeight = $(this).height();
			}
		});
		$('.hero .carousel-item').height(slideHeight);
		
		//set card heights
		var cardHeight = 0;
		$('.card-row .card').each(function(){
			if($(this).height() > cardHeight){
				cardHeight = $(this).height();
			}
		});
		$('.card-row .card').height(cardHeight);
		
		var postCardHeight = 0;
		$('.post-card-row .card').each(function(){
			if($(this).height() > postCardHeight){
				postCardHeight = $(this).height()+30;
			}
		});
		$('.post-card-row .card').height(postCardHeight);
		
	});
	
});
