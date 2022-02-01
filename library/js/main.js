jQuery(function($){

	$(document).ready(function(){

		// image size for heroes
		var bgW = $('.hero img').width();
		var heroW = $('.hero').width();
		var overW = heroW - bgW + 200;
		$('.hero .overlay').css('width', overW );

		// set slideshow height to be consistent based on tallest slide
		var slideHeight = 0;
		$('.hero .carousel-item').each(function(){
			if($(this).height() > slideHeight){
				slideHeight = $(this).height();
			}
		});
		$('.hero .carousel-item').height(slideHeight);

		// Progressive Disclosure
		$('.expand-header').on('click', function(){
			$(this).parent().children('.expand-content').slideToggle();
			$(this).parent().children('.indicator').toggleClass('open');
			$(this).toggleClass('open')
		});
		
	});
	
});

