(function($) {
    "use strict";

//*----------------TEAMAJAX-CLOSE-BUTTON-------------------*//
   var closeLink = $('.page-close-link');
   var teamAjaxContent = $('.teamajax');
   closeLink.on('click', function() {
	   teamAjaxContent.slideUp("slow");
        return false;
      });
	
	  
//*----------------EASING-TEAM--SCROLLING-------------------*//
	var closeLink = $('.page-close-link');
	closeLink.on('click', function(event) {
	  
	  var $anchor = $('#teamlist');
	  
       $('html,body').stop().animate({
		  
		  scrollTop: $($anchor).offset().top - 80
		   
	   },1000,'linear');
	   
	   event.preventDefault();

      });
	 



//*----------------TEAM-TAB------------------*//
	var teamTabLink = $('#team-tab a');
	teamTabLink.on('click', function(event) {
		 event.preventDefault();
		 $(this).tab('show')
	});


	  	  

}(jQuery));