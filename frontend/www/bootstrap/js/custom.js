$(document).ready(function() {
	activatePopups();
	stickyNavBar();
	menuMobile();
});

$(window).load(function(){
	sliderHeight();
});

$(window).resize(function(){
	sliderHeight();
	menuMobile();
});


//Popup triggers
function activatePopups()
{
	/* Popups triggers */
	$('#btn-login, #btn-login-mobile, #btn-join').magnificPopup({
		type:'inline',
	});
	
	/* Login popup actions */
	$("#btn-login, #btn-login-popup, #btn-login-mobile").click(function(){
		$("#login-form").removeClass("hide");
		$("#join-form").addClass("hide");
	});
	
	/* Join popup actions */
	$("#btn-join, #btn-join-popup").click(function(){
		$("#login-form").addClass("hide");
		$("#join-form").removeClass("hide");
	});
}

// Sticky nav bar
function stickyNavBar()
{
	// space until navbar grabs
	var distance = 0 //px
	
	// grab the initial top offset of the navigation 
   	var stickyNavTop = $('header').offset().top;
   	
   	// our function that decides weather the navigation bar should have "fixed" css position or not.
   	var stickyNav = function(){
	    var scrollTop = $(window).scrollTop(); // our current vertical position from the top
	         
	    // if we've scrolled more than the navigation, change its position to fixed to stick to top,
	    // otherwise change it back to relative
	    if (scrollTop > stickyNavTop + distance) { 
	        $('header').addClass('sticky');
	    } else {
	        $('header').removeClass('sticky'); 
	    }
	};

	stickyNav();
	// and run it again every time you scroll
	$(window).scroll(function() {
		stickyNav();
	});
}

// Slider 100% height
function sliderHeight()
{
	var height = $(window).height() - $("header").height();
	$("#slider").css("height", height);
}

// Menu mobile
function menuMobile()
{
	$("#btnMenuMobile").click(function(e){ //Button hamburguer action
		e.preventDefault();

		if($("#mobile-menu").hasClass("hide"))
		{
			$("#mobile-menu").removeClass("hide");
			var height = $(window).height() - $("header").height();
			$("#mobile-menu").css("height", height);
		}
		else
		{
			$("#mobile-menu").addClass("hide");
		}
	});
		
	if($(window).width() < 768)
	{
		//Activate menu mobile button
		$("#btnMenuMobile").removeClass("hide");
		
		$(".btn-header").each(function(){
			$(this).addClass("hide");
		});
	}
	else
	{
		$("#btnMenuMobile").addClass("hide");
		$("#mobile-menu").addClass("hide");
		$(".btn-header").each(function(){
			$(this).removeClass("hide");
		});
	}
}