jQuery(document).ready(function($) {
    // HAMBURGER ICON
    // $('.hamburger').click(function(){
    //    $('.hamburger').toggleClass("is-active");
    //    $('.hamburger').toggleClass("is-not-active");
    	// $('.mobile-nav').toggleClass("show-menu");
    // });

    // SLICK CAROUSEL
    $('.home-slide').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 1500,
        fade: true,
        dots: false,
        arrows: false,
        cssEase: 'linear'
    });

    // MENU
    // $('.hamburger').click(function(){

    // 	var the_state_of_menu = $(this).attr('rel');

    // 	if(the_state_of_menu=='closed'){
    // 		$('.mobile-nav').fadeIn(300);
    // 		$(this).attr('rel','open');
    // 	}

    // 	if(the_state_of_menu=='open'){
    // 		$('.mobile-nav').fadeOut();
    // 		$(this).attr('rel','closed');
    // 	}


    // });

});