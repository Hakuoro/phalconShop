(function($) {
	'use strict';
	new WOW().init();
	
	/*
	Smooth scroll
	=========================== */
	$('ul.navbar-nav li a, .btn-scroll').smoothScroll();
	
	$('.navbar-toggle').click(function(){
		$(".collapse").slideToggle();
		return false; 
	});
		
	$('.navbar-nav li a').click(function(){
		$(".collapse").slideToggle("normal");
	});
		
	/*
	Hover image
	=========================== */		
	$(".image-caption").css({'opacity':'0','filter':'alpha(opacity=0)'});
	$('.image-wrapper').hover(
		function() {
			$(this).find('.image-caption').stop().fadeTo(800, 1);
			$(".zoom", this).stop().animate({top:'38%'},{queue:false,duration:300});
			$(".image-title", this).stop().animate({bottom:'40%'},{queue:false,duration:500});
		},
		function() {
			$(this).find('.image-caption').stop().fadeTo(800, 0);
			$(".zoom", this).stop().animate({top:'-38%'},{queue:false,duration:300});
			$(".image-title", this).stop().animate({bottom:'-40%'},{queue:false,duration:500});
		}
	)
	
	/*
	Team
	=========================== */	
	$(".team-profile").css({'opacity':'0','filter':'alpha(opacity=0)'});
	$('.team-box').hover(function(){
		$(this).find('.team-profile').stop().fadeTo(900, 1);
		$(".team",this).stop().css({'z-index':'20'});
	}, function() {
		$(this).find('.team-profile').stop().fadeTo(900, 0);
		$(".team",this).stop().css({'z-index':'20'});
	});		

		/*
	Tooltips
	=========================== */
	$('.tooltips').tooltip({
		 selector: "a[data-tooltips='tooltip']"
	})
	
})(jQuery);