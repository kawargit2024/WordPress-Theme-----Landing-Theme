(function($) {
    "use strict";
    /*-----------------SITE-PRELOADER-----------------*/
	
	var windows = $(window);	
	windows.on('load', function() {
        $("#status").fadeOut("slow");
        $("#preloader").delay(100).fadeOut("slow").remove();

    }); 
	
		
	/*-------------------HOME-SLIDER----------------------*/
	
	// var homeSlider = $('.home-sliders');
	// homeSlider.owlCarousel({
    //     items: 1,
    //     loop: true,
    //     smartSpeed: 1000,
    //     autoplay: true,
	// 	animateIn: 'fadeIn',
	// 	animateOut: 'fadeOut',
	// 	mouseDrag:false,
    //     dots: false,
    //     nav: true,
	// 	navText: ["<i class='zmdi zmdi-chevron-left'></i>",
    //         "<i class='zmdi zmdi-chevron-right'></i>"
    //     ]
    // });	
	

    /*-------------------CLIENTS-SLIDER----------------------*/
	
	// var clientsSlider = $('.clients-carousel');		
	// clientsSlider.owlCarousel({
    //     items: 1,			
	// 	loop: true,
	// 	animateOut:'fadeOut',
    //     animateIn:'fadeIn',
	// 	margin: 30,
	// 	smartSpeed:1000,
	// 	autoplay:true,
	// 	dots: true,
	// 	mouseDrag:false,
	// 	nav: false,

	//   });

	

    /*------------------SECTION-SCROLL-------------------------*/
	
	  var sectionScroll = $('a.section-scroll');	  
	  sectionScroll.on('click', function(event) {				
			var $anchor = $(this);				
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
					
			}, 1500, 'easeInOutExpo');				
			event.preventDefault();
		});
		


    /*----------------------------- BRAND-SLIDER / PATNERS-SLIDER ----------------------------*/
	
	// var brandSlider = $('.brand-carousel');		
	// brandSlider.owlCarousel({
    //     items: 6,
    //     loop: true,
    //     margin:30,
    //     smartSpeed: 800,
    //     autoplay: true,
    //     animation: true,
	// 	responsiveClass: true,
    //     dots: false,
    //     nav: false,
    //     responsive: {
    //         0: {
    //             items: 1,
    //             nav: false
    //         },
    //         480: {
    //             items: 2,
    //             nav: false
    //         },
    //         750: {
    //             items:4,
    //             nav: false
    //         },
    //         970: {
    //             items:5,
    //             nav: false
    //         },
	// 		1170: {
    //             items:6,
    //             nav: false
    //         }
			
    //     }

    // });

 

     /*---------------------------- ISOTOPE SETTING ---------------------------------*/

		// var container = $('.project-items');		
		// 	container.imagesLoaded(function(){
		// 	container.isotope();

		// });
 

	

    /*---------------------------- WORK-FILTER -----------------------------------*/

	//  var workFilterMenuAnchor = $('.work-menu li a'); 	 
	//  var workGridItem = '.element-item'; 	 
	//  workFilterMenuAnchor.on('click', function() {		 
    //  workFilterMenuAnchor.removeClass('selected');        
	//  $(this).addClass('selected');
	 
	//  var selector = $(this).attr('data-filter');	
	//  container.isotope({
	// 	 itemSelector: workGridItem,
	// 	 filter: selector,
	// 	 animationOptions: {
	// 		 duration: 5000,
	// 		 easing: 'easeInOutExpo',
	// 		 queue: false
    //         }
    //     });
    //     return false;
		
    // });


   // /*----------------------------- WORK-AJAX-SETTING ------------------------------------*/

// 	   var singleWorkItem = $('.single-work-item-wrapper,.work-link'); 
// 	   var workAjaxContent = $('.worksajax'); 	   
// 	   singleWorkItem.on('click', function() {
// 		   var toLoad = $(this).attr('data-link') + ' .worksajax > *';
// 		   workAjaxContent.slideUp('slow',loadContent);
// 		   function loadContent(){
// 			   workAjaxContent.load(toLoad, '', showNewContent)
			 
// 		 }
		 
// 		 function showNewContent(){
// 			 $.getScript('assets/js/work.js'); 
// 			 workAjaxContent.slideDown('slow'); 				  
// 		 }
		 
// 		 return false;

   //       });
   
	  
	  
// 	/*----------------------------- SINGLE-WORK-SCROLLING ------------------------------*/  
	
// 	var singleWorkItem = $('.single-work-item-wrapper,.work-link'); 	
// 	$(function(){
// 		singleWorkItem.on('click', function(event) {		        
// 		var $anchor = $('#workslist');
// 		$('html, body').stop().animate({
// 			scrollTop: $($anchor).offset().top - 80
// 			}, 1000, 'linear');
// 			event.preventDefault();		 
			
// 		 });
   //  });
	

	
	  
	  
	/*------------------------------- MENU-FIXED-TOP-ON-SCROLL ----------------------------*/
	
	var windows = $(window);
	var customMenubarOffsetTop = $("#menubar");
	var customMenubarFixedTop = $(".menubar-fixed-top");
	
		windows.on('scroll',function() {
		if (customMenubarOffsetTop.offset().top > 50) {
				customMenubarFixedTop.addClass("top-nav-collapse");
			} else {
				customMenubarFixedTop.removeClass("top-nav-collapse");
			}
		});
		
		
		
	/*------------------------------- MENU-COLLASP-ON-CLICK ----------------------------*/
	
	var mainMenuCollasp = $(".mymenu");		
	mainMenuCollasp.find("li").on('click', "a", function (event) {
		$('.navbar-collapse.in').collapse('hide');
	});
		
			  
	/*------------------------------- PRICING-TABLE-ACTIVE ----------------------------*/
	
	var pricingTableHover = $('.single-pricing-table-wrapper');	
	pricingTableHover.hover(function(){
		pricingTableHover.removeClass('active');
		$(this).addClass('active');

	});

	

   /*---------------------------- WOW-JS -------------------------------*/
	var wow = new WOW({
		mobile: false // trigger animations on mobile devices (default is true)
		});
		wow.init();
   
    
	/*-------------------------------- FANCYBOX ----------------------------*/
		
		jQuery(window).on('load', function(){
		var fancyboxImage = $('.fancybox').attr('rel', 'gallery');
	    var fancyboxVideo = $('.fancybox-media video');
	
			fancyboxImage.fancybox({
		        'speedIn': 600,
		        'speedOut': 200,
		        'transitionIn': 'elastic',
		        'transitionOut': 'elastic',

			});

			fancyboxVideo.fancybox({
		        'speedIn': 600,
		        'speedOut': 200,
		        'transitionIn': 'elastic',
		        'transitionOut': 'elastic',
		        'autoScale': true,
		        'titleShow': true,
		        'type': 'iframe'
			});

		});





    /*-------------------------------------SCROLL-TOP-------------------------------------*/

    jQuery.scrolltop({
        template: '<i class="fas fa-chevron-up"></i>',
        class: 'scrolltop'
    });

	 
	 
	 /*------------------------------------------COUNTER------------------------------*/
	 
	var countOne = $('#count-test1');
	var countTwo = $('#count-test2');
	var countThree = $('#count-test3');
	 
	countOne.jQuerySimpleCounter({
		start:  100,
		end:    400,
		easing: 'swing',
		duration: 20000
	 });
		
	countTwo.jQuerySimpleCounter({
		start:  200,
		end:    600,
		easing: 'swing',
		duration: 20000
	 });
		
	countThree.jQuerySimpleCounter({
		start:  300,
		end:    800,
		easing: 'swing',
		duration: 20000
	 });


	
	/*-------------------------------  VIDEO RESPONSIVE ---------------------------*/
       var body = $('body');
		body.fitVids();
	  
	 /*------------------------------- BLOG-CAROUSEL ---------------------------*/
	 
	 
	
}(jQuery));