$(document).ready(function(){

}); //end doc ready
	
$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};	
	
function orderPageActions(){
	
	var myProductType;
	
	$(".product-type input[name='product']").click(function() {
		$('#my-product').removeClass('hidden');
		$('#order-info-holder .product-type').html('');
		$('.product-brand-holder input').prop('checked', false);
		myProductType = new Array();
		$(".product-type input[name='product']").each(function(i) {
			if($(this).prop('checked')){
				var myProduct = $(this).val();
				myProductType.push(myProduct);
			}	
			
		});
			
		$('.product-brand-holder').addClass('hidden');
		var productNumber = 0;
		var addProductBrand = $('.product-brand-holder').html();
		
		$.each(myProductType, function(index, val) { 
				
    		$('#order-info-holder .product-type').append('<div class="product product-num-'+index+'" data-product-type="'+val+'">'+val+'</div>');
    		var myprod = val.toLowerCase();
    		$('.product-brand'+index+' .step-instructions span').html('for your '+myprod);
    		$('.product-brand'+index).removeClass('hidden');
    		
    		$('.product-brand'+index+' .checkbox-holder').each(function(){
    				$(this).removeClass('hidden');
    				var x=myprod.replace(" ","-");
    				if($(this).hasClass(x)!= true){
    					$(this).addClass('hidden');
    					$('.step1-finish').addClass('hidden');
    				}
    		});   		

    		productNumber ++;
		});
		
		

		$('#order-info-holder .product-type').attr('data-num-products', productNumber);
	
	});
	
	
	$(".product-brand-holder input").click(function() {
			var myProductNum = $(this).attr('name');
			var parsed = parseInt(myProductNum.substring(5));
			var myBrand = $(this).val();
			$('#order-info-holder .product-num-'+parsed).attr('data-brand', myBrand);
			$('#order-info-holder .product-num-'+parsed+' span').remove();
			$('#order-info-holder .product-num-'+parsed).append('<span class="brand-type"> - '+myBrand+'</span>');
    	$('.step1-finish').removeClass('hidden');
	});

	
	$('a.btn-finish').click(function(evt) {
		evt.preventDefault();
		var myStep = parseInt($(this).attr('data-step'));
	
		if(myStep===1){
			var numProducts = parseInt($('#order-info-holder .product-type').attr('data-num-products'));
			var hasBrand = new Array();
			$('#order-info-holder .product').each(function(){
				var myBrand = $(this).hasAttr('data-brand');
				hasBrand.push(myBrand);
			});
			
			if(numProducts>0 && $.inArray(false, hasBrand)== -1 ) {
				$('#my-home').removeClass('hidden');
				$('.order-steps-holder ul li').each(function(i) {
					$(this).removeClass('active next-step');
				});
				$('.order-steps-holder ul li.step2').addClass('active');
				$('.order-steps-holder ul li.step3').addClass('next-step');
				
				$('#order-info-holder .product').each(function(){
				
				var myProd = $(this).attr('data-product-type');
					myProd = myProd.toLowerCase();
					myprod = myProd.replace(' ','-');
				
					$('.step2-content .'+myprod).removeClass('hidden');
					if(myProd =='furnace' || myProd == 'boiler'){
						$('.step2-content .boiler-furnace').removeClass('hidden');
					}
					
				$('.step2-content').removeClass('hidden');
				$('.step1-content').addClass('hidden');
			});
				
			}else{
				var needsBrand = $.inArray(false, hasBrand);
				var brandMissingFor = $('#order-info-holder .product-num-'+needsBrand).attr('data-product-type')
				alert('Please Select a Brand for your '+brandMissingFor);
			}
		} //end step1
		
		if(myStep===2){
		
			// checking to see if they have answered all of the questions by comparing the amount of questions to the order sidebar
			var myCount = $('.existing-info-holder .existing').length;
			var countActive = 0;
			var countAnwsered = $('#order-info-holder .existing-info').children('div').length;
			$('.existing-info-holder .existing').each(function(){
				if($(this).hasClass('hidden')){
						countActive++;			
				}
			});
			
			if(myCount-countActive ==countAnwsered ){

				var productNum = $('#order-info-holder .product-type').attr('data-num-products');
				
				if(productNum==1){	
					var orderProduct = $('#order-info-holder .product-num-0').attr('data-product-type');
					orderProduct = orderProduct.toLowerCase();
					orderProduct = orderProduct.replace(' ','-');
					
					var orderBrand =  $('#order-info-holder .product-num-0').attr('data-brand');
						orderBrand = orderBrand.toLowerCase();
						orderBrand = orderBrand.replace(' ','-');
					var mySQft = $('#order-info-holder .house-info .sqft').attr('data-answer');
					var myGal = $('#order-info-holder .existing-info .wh-gallons').attr('data-answer');
					var mySQtype;
					switch (mySQft){
							case '0-900':
								mySQtype='sq1';
								break;
							case '901-1500':
								mySQtype='sq2';									
								break;
							case '1501-2000':
								mySQtype='sq3';
								break;
							case '2001-2300':
								mySQtype='sq4';
								break;
							case '2301-2600':
								mySQtype='sq5';
								break;
							case '2601-3200':
								mySQtype='sq5';
								break;
							}
							
					$('.order-steps-holder ul li').each(function(i) {
						$(this).removeClass('active next-step');
					});
					$('.order-steps-holder ul li.step3').addClass('active');
					$('.order-steps-holder ul li.step4').addClass('next-step');		
							
					$('.step2-content').addClass('hidden');
					$('.step3-content').removeClass('hidden');
					
					
					var orderTypes = '#'+orderProduct+'-recommendations';
					$(orderTypes).removeClass('hidden');
					if(orderProduct == 'water-heater'){
						$(orderTypes).attr('data-gal', 'gal'+myGal);	
					}else{
						$(orderTypes).attr('data-sqft', mySQtype);	
					}
					addTotalPrice();

					$(orderTypes+' .recommended-product').each(function(){
						var myBrand = $(this).attr('data-product-brand');	
						myBrand = myBrand.replace(' ','-');	
						if($(this).hasClass(mySQtype) && myBrand.toLowerCase() == orderBrand.toLowerCase() && orderProduct != 'water-heater' ) {
							$(this).removeClass('hidden');
							
						}
						if($(this).hasClass('gal'+myGal) && myBrand.toLowerCase() == orderBrand.toLowerCase() && orderProduct == 'water-heater' ) {
							$(this).removeClass('hidden');
							
						}
					});
					
				
					
					}
							
				
				
			}else{
				alert('Please Answer All of the Questions' );
			}	
		} //end step2
	});
	

// button clear all input radio buttons.
	
	$('a.btn-clear').click(function(){
		var myStep = $(this).attr('data-step');
		
		$('.'+myStep+' input').each(function(){
			$(this).prop('checked', false);
		});
		
		$('#order-info-holder .'+myStep).html('');
		
		if(myStep=='existing' || myStep == 'home-questions'){
			$('.step2-content').attr('data-step2-additional-cost', 0);	
		}
		
		if(myStep==3) {
			$('input#rp-selected').prop('checked', false);
			$('.recommended-product').removeClass('selected');
			
			if($('.more-options-btn').hasClass('selected')){
			
			}else{
				$('.more-options-btn').removeClass('hidden');
			}
			
			$(this).parent().addClass('hidden');
		}
	
	});
	
// button back events	
	
	$('a.btn-back').click(function(){
		var backFrom = $(this).attr('data-step');
		
		if(backFrom == 'home-questions'){
			$('.'+backFrom+' input').each(function(){
				$(this).prop('checked', false);
			});
			$('#order-info-holder .'+backFrom).html('');
			$('.step2-content, #my-home').addClass('hidden');
			$('.step1-content').removeClass('hidden');
		}
		
		if(backFrom == 'existing'){
			$('.step2-content').attr('data-step2-additional-cost', 0);	
			$('.'+backFrom+' input').each(function(){
				$(this).prop('checked', false);
			});
			$('#order-info-holder .'+backFrom).html('');
			$('.existing-info-holder, .furnace-gravity, #my-existing').addClass('hidden');
			$('.home-questions').removeClass('hidden');
			
		}
		
		if(backFrom == 3){
			$('input#rp-selected').prop('checked', false);
			$('.recommended-product').removeClass('selected');
			$('.more-options-btn').removeClass('hidden');
			$('.step3-content .btn-holders').addClass('hidden');
			$('.step3-content').addClass('hidden');
			$('.step3-content, .recommended-product').addClass('hidden');
			$('.step2-content, .step2-content .existing-info-holder').removeClass('hidden');
		}
	
	});
		
	
// button Next goto existing
	
		$('a.btn-continue').click(function(){
			var myCount = $('.question-holder').length;
			var myCountTotal = 0;
			$('.question-holder input:checked').each(function(){
				if( $(this).length>0){
					myCountTotal ++;
				}
			});
			
			if(myCount==myCountTotal){
				$('.step2-content .home-questions').addClass('hidden');
				$('.step2-content .existing-info-holder, #my-existing').removeClass('hidden');

			}else{
				alert('Please answer all of the questions');
			}

		});
	
	
	// step 2.1 questions 
	
	$('.question-holder input').click(function(){
			var myQuestion = $(this).attr('name');
			var myAnwser = $(this).attr('value');
			myQuestionShow = myQuestion.replace('-',' ');
			console.debug(myQuestionShow+' = '+myAnwser);
			console.debug($('.house-info .'+myQuestion).length);
			
			if($('#order-info-holder .house-info .'+myQuestion).length>0){
					$('#order-info-holder .house-info .'+myQuestion).remove();
					$('#order-info-holder .house-info').append('<div class="'+myQuestion+'" data-answer="'+myAnwser+'">'+myQuestionShow.toUpperCase()+': '+myAnwser+'</div>');
				}else{
					$('#order-info-holder .house-info').append('<div class="'+myQuestion+'" data-answer="'+myAnwser+'">'+myQuestionShow.toUpperCase()+': '+myAnwser+'</div>');
				}
		
			
						
	});
	
	// step 2.2 questions 
	
	$('.existing input').click(function(){
			var myQuestion = $(this).attr('name');
			var myAnwser = $(this).attr('value');
			myQuestionShow = myQuestion.replace('-',' ');
			console.debug(myQuestionShow+' = '+myAnwser);
			console.debug($('.existing-info .'+myQuestion).length);
			
			if(myQuestion == 'existing-furnace' && myAnwser=='Gravity'){
				$('.existing-info-holder .furnace-gravity').removeClass('hidden');
			}else if(myQuestion == 'existing-furnace' && myAnwser=='Tall Metal' || myAnwser=='Modern'){
				$('.existing-info-holder .furnace-gravity input').prop('checked', false);;
				$('.existing-info-holder .furnace-gravity').addClass('hidden');
				$('#order-info-holder .existing-info .pipes').remove();	
			}
			
			if($('#order-info-holder .existing-info .'+myQuestion).length>0){
					$('#order-info-holder .existing-info .'+myQuestion).remove();
					$('#order-info-holder .existing-info').append('<div class="'+myQuestion+'" data-answer="'+myAnwser+'">'+myQuestionShow.toUpperCase()+': '+myAnwser+'</div>');
				}else{
					$('#order-info-holder .existing-info').append('<div class="'+myQuestion+'" data-answer="'+myAnwser+'">'+myQuestionShow.toUpperCase()+': '+myAnwser+'</div>');
				}
			
			if($(this).hasAttr('data-additional-cost')){
				var addedCost = $(this).attr('data-additional-cost');
				var currAdd = $('.step2-content').attr('data-step2-additional-cost');		 
				var totalAdd =  parseInt(currAdd) + parseInt(addedCost);
					
				console.debug(addedCost+' + '+currAdd+' = '+totalAdd);	
				$('.step2-content').attr('data-step2-additional-cost', totalAdd);		 	
					
				
				
			}
						
	});
	
	
	// step 3 recommendations 
	
	$('.recommended-product').click(function(evt){
		evt.preventDefault();
		$('input#rp-selected').prop('checked', false);
		$('.recommended-product').removeClass('selected');
		$('.more-options-btn').addClass('hidden');
		$('.step3-content .btn-holders').removeClass('hidden');
		$(this).children('input#rp-selected').prop('checked', true);
		$(this).addClass('selected');
	});
	
	$('a.btn-brochure, a.rp-learn-more-btn').click(function(evt){
		evt.stopPropagation();
	});
	
	// step 3 more options 
	$('.btn-more-options').click(function(evt){
		evt.preventDefault();
		
	
	});

	// more options button actions
	
	$('a.btn-more-options').click(function(evt){
		evt.preventDefault();
		$(this).parent().addClass('selected');
		var myProductType = $(this).attr('data-product-type');
		if(myProductType == 'furnace' || myProductType == 'air-conditioner'){
			var mySQft = $(this).parent().parent().attr('data-sqft');
			$(this).parent().parent().children('.recommended-product').each(function(){
				if($(this).hasClass(mySQft)){
					$(this).removeClass('hidden');
				}
			
			});
			$(this).parent().addClass('hidden');
		}else{
			//do water-heater here
			var myGals = $(this).parent().parent().attr('data-gal');
			$(this).parent().parent().children('.recommended-product').each(function(){
				if($(this).hasClass(myGals)){
					$(this).removeClass('hidden');
				}
			
			});
			$(this).parent().addClass('hidden');
		}
	
	});
	
	
	//price added to products function 
	
	function addTotalPrice(){
		var addOnCosts = $('.step2-content').attr('data-step2-additional-cost');
		
		$('.recommended-product').each(function(){
			var myPrice = $(this).attr('data-product-cost');
			var totalPrice = parseInt(myPrice)+parseInt(addOnCosts);
			$(this).children('.total-cost').html('$'+totalPrice+'.00');
		});
	
	
	}
	
	
	
} //end orderPageActions