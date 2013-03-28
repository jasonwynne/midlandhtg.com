//global vars

	var myWidth = 0;
	var myHeight = 0;
	var slideHeight;

$(document).ready(function(){

	setFooterHolderHeights();	
	var addEvent = function(elem, type, eventHandle) {
		if (elem == null || elem == undefined) return;
		if ( elem.addEventListener ) {
			elem.addEventListener( type, eventHandle, false );
		} else if ( elem.attachEvent ) {
			elem.attachEvent( "on" + type, eventHandle );
		}
	};
	
	
	addEvent(window, "resize", function() { onResize(); } );
 
 	function onResize(){
 		setWidthHeight();
		resizeEvents();	
		slideTimer.stop();
	}
	


/// home slideshow solving scope problems	
	
	
	var count = $(".slide").length;
	var totalCount = count-1;
	var currSlide = 0;
	var nextSlide ;
	var slideintervalTime = 6000;
	var slideSpeed = 800;
	var isAnimating = 0;
	var topZ = 500;
	var middleZ = 250;
	var bottomZ = 0;
	
	$(".slide").each(function(i) {
		$(this).addClass('slide'+i);
		$(this).hide();
		var numMe = i+1;
		$(".slideshow-counter ul").append('<li class="dot-num-'+i+'">'+numMe+'</li>');
	});
	
	$(".slide"+currSlide).css({'display':'block', 'z-index': topZ});
	$(".dot-num-"+currSlide).addClass('active');
	
	
	var slideTimer = $.timer(function() {
		fadeMeAll();
	});

    slideTimer.set({ time : slideintervalTime, autostart : true });
	
	
	
	$(".slideshow-counter ul li").click(function() {
		var dotNum = $(this).attr('class');
		var parsed = parseInt(dotNum.substring(8));
		if(currSlide!=parsed && isAnimating===0){
			slideTimer.stop();
			fadeMeClick(parsed);
		}
	});
	
	
	function fadeMeAll(){
    	isAnimating=1;
		if(currSlide<totalCount){
			nextSlide = currSlide+1;
		}else{
			nextSlide = 0;
		}
			
		$('.slide'+nextSlide).css({'display': 'block', 'z-index': middleZ});
		$('.slide'+currSlide).fadeOut(slideSpeed, function() {
					slideComplete();
			});	
	}// END fadeMeAll
	
	function fadeMeClick(x){
	    isAnimating=1;
		nextSlide = x;
			
		$('.slide'+nextSlide).css({'display': 'block', 'z-index': middleZ});
		$('.slide'+currSlide).fadeOut(slideSpeed, function() {
					slideComplete();
			});	
	}// END fadeMeAll
	
	function slideComplete() {
		$('.slide'+nextSlide).css({ 'z-index': topZ});
		currSlide = nextSlide;
		isAnimating = 0;
		dotClear();
	}
	
	$(window).focus(function() {		
		slideTimer.play();
	});

	$(window).blur(function() {		
		slideTimer.stop();
	});  
	
	
	function resizeEvents(){

		if(myWidth>640){
			var slideHeight = $('.slide'+currSlide+' .slide-image img').height();
			$('.holder-slideshow').css('height', slideHeight+'px');

		}
		if(myWidth<639){
			$('.holder-slideshow').removeAttr("style");
		}
		
	}// END resizeEvents		

	function dotClear() {
		$(".slideshow-counter ul li").each(function() {
			$(this).removeClass('active');
		});
	
		$(".dot-num-"+currSlide).addClass('active');
			
	}
	
	$('table.Products th a').removeAttr('href');

	$("#takeBack").click(function() {		
		$("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0}, 1200, 'easeInOutCubic' );
	});		


	$('li:first-child').addClass('first-item');
	$('li:last-child').addClass('last-item');	

});// END doc ready


function callMe(data){
	if (data.mailSent === true) {
		$('.wpcf7-form').hide();  
		$('.footer-thanks').show();  
	}
}// END callMe 


function setFooterHolderHeights(){

	var contLeft = $('.holder-neighborhoods').height();
	$('.holder-resources, .holder-contactinfo').css('height',contLeft+'px');

}// END setFooterHolderHeights




function setWidthHeight(){
	
		if (document.body && document.body.offsetWidth) {
				myWidth = $(window).width();
			 	myHeight = $(window).height();
		}
		if (document.compatMode=='CSS1Compat' && document.documentElement && document.documentElement.offsetWidth) {
				myWidth = $(window).width();
			 	myHeight = $(window).height();
		}
		if (window.innerWidth && window.innerHeight) {
			 myWidth = window.innerWidth;
			 myHeight = window.innerHeight;
		}

}// END setWidthHeight



function widgetSlider(){

	var wcount = $(".single-widget").length;
	var slideLength = 283;
	var slideHolderLength = 283*wcount;
	var isWAnimating = 0;
	
	$(".single-widget").each(function(i) {
		$(this).addClass('widget-num'+i);
	});
	

	$('.holder-widgets').css({'width': slideHolderLength+'px', 'left': '-283px'} );
	
	
	$(".arrow-left").click(function() {
		if(isWAnimating == 0){
			isWAnimating = 1;
			var getOne = $('.holder-widgets').children(":first");	
			$('.holder-widgets').animate({'left': '-=283px'}, 500, 'easeOutCubic', function() {
						$('.holder-widgets').css({'left': '-283px'})	;
						$('.holder-widgets').append(getOne)	;
						wslideComplete();
					});	
		}
			
		
	});
	
	$(".arrow-right").click(function() {
		if(isWAnimating == 0){
			isWAnimating = 1;
			var getOne = $('.holder-widgets').children(":last");	
			$('.holder-widgets').animate({'left': '+=283px'}, 500, 'easeOutCubic', function() {
						$('.holder-widgets').css({'left': '-283px'});
						$('.holder-widgets').prepend(getOne)	;
						wslideComplete();
					});	
		}
	});
	
	function wslideComplete(){
		isWAnimating = 0	
	}

}// END widgetSlider



function galleryPageActions(){

	var count = $(".gallery-image-single").length;
	var totalCount = count-1;
	var currImage = 0;
	
	
	$(".gallery-image-single").each(function(i) {
		$(this).addClass('image'+i);
		$(this).hide();
		var createThumb = $(this).children('img').attr('src');
		$(".gallery-thumb-holder ul").append('<li class="thumb'+i+'"><img width="78px" height="58px" src="'+createThumb+'" alt="thumbnail number'+i+'" /></li>');
	});
	
	
	$('.image0').show();
	$('.thumb0').addClass('active');



	// caption arrow clicker
	$('.caption-arrow').click(function() {
		var parentMe = $(this).parent().parent().attr('class');
		var dir = parentMe.substring(21);
		var captionHeight = $(this).parent().height();
		var slideAmount = captionHeight-20;	
		var position = $(this).parent().position();
		
		
		if (position.top<430){
			$(this).parent().animate({bottom: '-'+slideAmount+'px'},300, function() {
					$(this).children('.caption-arrow').css('background-position', '0 -22px');
				  });
		}
		
		if (position.top>430){
				$(this).parent().animate({bottom:0}, 300, function() {
					$(this).children('.caption-arrow').css('background-position', '0 0');
				  });	
		}
		
		
	});
	
	$('.gallery-thumb-holder ul li').click(function() {
		$('.gallery-thumb-holder ul li').removeClass('active');
		$(this).addClass('active');
		$(".gallery-image-single").hide();
		var myNum = $(this).attr('class');
		var parsed = parseInt(myNum.substring(5));
		$(".image"+parsed).show();
	});


}// END galleryPageActions

function filterPageActions(){

	$(".step3, .filters, .water-panels").hide();
	$("#part-type").change(function () {
 	
		var sortby = $(this).val();
	
		if (sortby=='Filters & Filter Parts'){
			$(".filters").show();
			$(".water-panels").hide();
		} else if (sortby=='Water Panels & Humidifier Parts'){
			$(".water-panels").show();
			$(".filters").hide();
		} else if(sortby=='Please Select a Part Catagory'){
			$(".filters, .water-panels").hide();
		}
	});
	
	$('.submit-filter').click(function() {
		$(".item-single-filter").each(function() {
			var partOrdered = $(this).children('.item-qty').children('input').val();
			if(partOrdered>0){
				var partNum = $(this).children('.item-img').children('img').attr('alt');
				var partName = $(this).children('.item-desc').children('span').html();
				var myOrder = 'I would like to order '+partOrdered+' of '+partNum+' ' +partName+'';
				$(".step3").show();			
				$('.hide-message textarea').append(myOrder);
			}
		});
		
	
	});
	
	$('.submit-water').click(function() {
		$(".item-single-water").each(function() {
			var partOrdered = $(this).children('.item-qty').children('input').val();
			if(partOrdered>0){
				var partNum = $(this).children('.item-img').children('img').attr('alt');
				var partName = $(this).children('.item-desc').children('span').html();
				var myOrder = 'I would like to order '+partOrdered+' of '+partNum+' ' +partName;
				$(".step3").show();			
				$('.hide-message textarea').append(myOrder);
			}
		});
		
	
	});
	
}// END filterPageActions


function sentMe(){
	$('.your-info, .step3 .header').hide();
	$('.form-thanks').show();
}



		
