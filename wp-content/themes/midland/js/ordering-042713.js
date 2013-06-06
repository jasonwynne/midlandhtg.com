$(document).ready(function(){

}); //end doc ready

// this is a function that returns true or false for has attribute	
$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};	
	

function orderPageActions(){

	var myProduct;
	var myBrand;
	var mySqFt;
	var mySqFtNum;
	var myGal;
	var myHE;
	var existingAddPrice = 0;
	var addCost = 0;
	var prodPrice = 0;	
	var aoPrice = 0;	
	
		

	//step 1 - product selection 
	$(".product-type input[name='product']").click(function() {	
		myProduct = $(this).val().toLowerCase();
		$('#my-product, .step-product-holder').removeClass('hidden');
		$('#order-info-holder .product-type').html('');
		$('.product-brand input').prop('checked', false);
		if (myProduct == 'combo'){
			$('.product-brand .step-instructions span').html('for your furnace & air conditioner');	
		}else{
			$('.product-brand .step-instructions span').html('for your '+myProduct);	
		}	
		myProduct = myProduct.replace(' ','-');
		$('.product-brand p.checkbox-holder').each(function(){
			if($(this).hasClass(myProduct) ){
				$(this).removeClass('hidden');
			}else{
				$(this).addClass('hidden');
			}	
		});

	});
	
	//step 1 - brand selection 
	$(".product-brand input[name='brand']").click(function() {	
		myBrand= $(this).val().toLowerCase();
		myBrand = myBrand.replace(' ','-');
		$('.step1-finish').removeClass('hidden');	
	});
	
	//step 1 - finish button
	$('.step1-finish a').click(function(evt) {
		evt.preventDefault();
		
		if(myProduct == 'combo'){
			$('#order-info-holder .product-type').append('<div data-product-type="'+myProduct+'">Furnace & Air Conditioner - '+myBrand.replace('-',' ')+'</div>');
		}else{
			$('#order-info-holder .product-type').append('<div data-product-type="'+myProduct+'">'+myProduct.replace('-',' ')+' - '+myBrand.replace('-',' ')+'</div>');
		}
		
		$('#my-home').removeClass('hidden');
		$('.step1-content').addClass('hidden');
		
		changeStep(2);

	});		


	//step 2.1 - house Information				
	$('.question-holder input').click(function(){
			var myQuestion = $(this).attr('name');
			var myAnwser = $(this).attr('value');
			myQuestionShow = myQuestion.replace('-',' ');
			
			if(myQuestion=='sqft'){
				mySqFt = myAnwser;
				switch (mySqFt){
					case '0-900':
						mySqFtNum='sq1';
						break;
					case '901-1500':
						mySqFtNum='sq2';									
						break;
					case '1501-2000':
						mySqFtNum='sq3';
						break;
					case '2001-2300':
						mySqFtNum='sq4';
						break;
					case '2301-2600':
						mySqFtNum='sq5';
						break;
					case '2601-3200':
						mySqFtNum='sq6';
						break;
					}
			}
			
			if(myQuestion == 'high-efficiency' && myAnwser == 'Yes'){
				myHE = '1';	
			}else if(myQuestion == 'high-efficiency' && myAnwser == 'No'){
				myHE = '0';
			}else{
				myHE = 'both';
			}
			
					
			if($('#order-info-holder .house-info .'+myQuestion).length>0){
					$('#order-info-holder .house-info .'+myQuestion).remove();
					$('#order-info-holder .house-info').append('<div class="'+myQuestion+'" data-answer="'+myAnwser+'">'+myQuestionShow.toUpperCase()+': '+myAnwser+'</div>');
				}else{
					$('#order-info-holder .house-info').append('<div class="'+myQuestion+'" data-answer="'+myAnwser+'">'+myQuestionShow.toUpperCase()+': '+myAnwser+'</div>');
				}		
		
	});
	
//step 2.2 - Existing Information
	
	$('.existing input').click(function(){
			var myQuestion = $(this).attr('name');
			var myAnwser = $(this).attr('value');
			myQuestionShow = myQuestion.replace('-',' ');
			var xtraCost = $(this).attr('data-additional-cost');
			
			if(myQuestion == 'furnace' && myAnwser=='Gravity'){
				$('.existing-info-holder .furnace-gravity').removeClass('hidden');
			}else if(myQuestion == 'furnace' &&  myAnwser=='Tall Metal' || myAnwser=='Modern'){
				$('.existing-info-holder .furnace-gravity input').prop('checked', false);;
				$('.existing-info-holder .furnace-gravity').addClass('hidden');
				$('#order-info-holder .existing-info .pipes').remove();	
			}
			
			if($('#order-info-holder .existing-info .'+myQuestion).length>0){		
					$('#order-info-holder .existing-info .'+myQuestion).remove();
					
					if(myQuestion == 'pipes'){
						$('#order-info-holder .existing-info').append('<div class="'+myQuestion+'" data-answer="'+myAnwser+'">ADDITIONAL DUCT WORK:</div>');
					}else if(myQuestion == 'air-conditioner' && myAnwser == 'No'){
						$('#order-info-holder .existing-info').append('<div class="'+myQuestion+'" data-answer="'+myAnwser+'">ELECTRICAL/SET LINE:</div>');
					}else{
						$('#order-info-holder .existing-info').append('<div class="'+myQuestion+'" data-answer="'+myAnwser+'">'+myQuestionShow.toUpperCase()+': '+myAnwser+'</div>');
					}
				}else{
					if(myQuestion == 'pipes'){
						$('#order-info-holder .existing-info').append('<div class="'+myQuestion+'" data-answer="'+myAnwser+'">ADDITIONAL DUCT WORK:</div>');
					}else if(myQuestion == 'air-conditioner' && myAnwser == 'No'){
						$('#order-info-holder .existing-info').append('<div class="'+myQuestion+'" data-answer="'+myAnwser+'">ELECTRICAL/SET LINE:</div>');
					}else{
						$('#order-info-holder .existing-info').append('<div class="'+myQuestion+'" data-answer="'+myAnwser+'">'+myQuestionShow.toUpperCase()+': '+myAnwser+'</div>');
					}
				}
			

			
			if($(this).hasAttr('data-additional-cost')){
				$('#order-info-holder .'+myQuestion).append(' + $'+xtraCost+'.00');
				$('#order-info-holder .'+myQuestion).attr('data-additional-cost', xtraCost);
				$('#order-info-holder .'+myQuestion).addClass('addCost');
				}
				
			if($(this).attr('name')=='gallons'){
				myGal = $(this).val();
			}
						
	});

// end of step 2

$('a.btn-finish-step2').click(function(evt) {
		evt.preventDefault();
		var myStep = parseInt($(this).attr('data-step'));
				
		// checking to see if they have answered all of the questions by comparing the amount of questions to the order sidebar
			var myCount = $('.existing-info-holder .existing').length;
			var countActive = 0;
			var countAnwsered = $('#order-info-holder .existing-info').children('div').length;
			$('.existing-info-holder .existing').each(function(){
				if($(this).hasClass('hidden')){
						countActive++;			 
				}
			});
			
			if(myCount-countActive==countAnwsered && myProduct != 'combo'){
				
					changeStep(3);										
				
					var orderTypes = '#'+myProduct+'-recommendations';	
					$(orderTypes).removeClass('hidden');
					
					if(myProduct == 'water-heater'){
						$(orderTypes).attr('data-gal', 'gal'+myGal);	
					}else{
						$(orderTypes).attr('data-sqft', mySqFtNum);	
					}
					
					
					$(orderTypes+' .recommended-product').each(function(){
					
						var isHE = $(this).attr('data-he');
						var brandName = $(this).attr('data-product-brand');
						brandName = brandName.replace(' ','-');
						brandName = brandName.toLowerCase();
						
						if(myHE != 'both'){
							if($(this).hasClass(mySqFtNum) && myBrand == brandName && myProduct != 'water-heater' &&  isHE == myHE) {
								$(this).removeClass('hidden');				
							}
							if($(this).hasClass('gal'+myGal) && myBrand == brandName && myProduct == 'water-heater' &&  isHE == myHE) {
								$(this).removeClass('hidden');	
							}
						}else{
							if($(this).hasClass(mySqFtNum) && myBrand == brandName && myProduct != 'water-heater' ) {
								$(this).removeClass('hidden');				
							}
							if($(this).hasClass('gal'+myGal) && myBrand == brandName && myProduct == 'water-heater' ) {
								$(this).removeClass('hidden');	
							}
						}
						
					});
					

					
					
					$('#my-existing .existing-info div').each(function(){

						if($(this).hasAttr('data-additional-cost')){					
							var hasAdditional = $(this).attr('data-additional-cost');
							hasAdditional = parseInt(hasAdditional);
							addCost = addCost+hasAdditional;
						}
							
					});
					
					$('#order-info-holder .total').attr('additional-cost', addCost );
					
					
					
			}else if(myCount-countActive==countAnwsered && myProduct == 'combo'){
			
				changeStep(3);
				$('#furnace-recommendations, #air-conditioner-recommendations').removeClass('hidden');
				$('#furnace-recommendations .recommended-product, #air-conditioner-recommendations .recommended-product').each(function(){
					var brandName = $(this).attr('data-product-brand');
					if($(this).hasClass(mySqFtNum) && myBrand == brandName.toLowerCase()) {
							$(this).removeClass('hidden');				
						}
					
				});
				
				
				$('#my-existing .existing-info div').each(function(){

						if($(this).hasAttr('data-additional-cost')){
						
							var hasAdditional = $(this).attr('data-additional-cost');
							hasAdditional = parseInt(hasAdditional);
							addCost = addCost+hasAdditional;

						}
							
					});
					
					$('#order-info-holder .total').attr('additional-cost', addCost );
			
			}else{
				alert('Please Answer All of the Questions' );
			}	


	});
	
	// step 3 recommendations
	

	$('.recommended-product').click(function(evt){
		//evt.preventDefault();	
		if(myProduct != 'combo'){
				$('input#rp-selected').prop('checked', false);
				$('.recommended-product').removeClass('selected');
				$('.more-options-btn').addClass('hidden');
				$('.step3-content .btn-holders').removeClass('hidden');
				$(this).children('input#rp-selected').prop('checked', true);
				$(this).addClass('selected');
			}else{
				var myParent = $(this).parent().attr('id');	
				$('#'+myParent+' input#rp-selected').prop('checked', false);
				$('#'+myParent+' .recommended-product').removeClass('selected');
				$('#'+myParent+' .more-options-btn').addClass('hidden');
				$('.step3-content .btn-holders').removeClass('hidden');
				$(this).children('input#rp-selected').prop('checked', true);
				$(this).addClass('selected');
				
			}
	});
	
	$('.recommended-product input').click(function(){
		$('.recommended-product').trigger('click');
	});
	
	
	// end step 3
		$('a.btn-finish-step3').click(function(){

			$('#my-selection').removeClass('hidden');
					
			$('.recommended-product.selected').each(function(){
				var selectedID = $(this).attr('data-product-id');
				var selectedProdBrand = $(this).attr('data-product-brand');
				var selectedCost = $(this).attr('data-product-cost');	
				selectedCost = parseInt(selectedCost);
				prodPrice = prodPrice+selectedCost;
				$('#my-selection .selection-info').append('<div class="prod-selected" data-prod-id="'+selectedID+'" data-prod-cost="'+selectedCost+'" >'+selectedProdBrand+' '+selectedID+'</div>');
				
			});
			
			
			$('#order-info-holder .total').attr('product-cost', prodPrice );
			
			addTotalPrice();
			changeStep(4);
	
			
		});
		

// step 4 selections

	$('.ao-checkbox-holder').click(function(){		
		var aoShow = $(this).children('input[name="ao-product"]').val();
		$('#my-add-ons').removeClass('hidden');
		if(aoShow != 'none'){	
			$('input#none-check').prop('checked', false);
			if($(this).hasClass('selected')){
				$(this).children('input[name="ao-product"]').prop('checked', false);
				$(this).removeClass('selected');
				$('#'+aoShow+'-holder').addClass('hidden');
				$('.step4-content .btn-holders').addClass('hidden');
				$('#'+aoShow+'-holder .add-on-product').removeClass('selected');
				$('#'+aoShow+'-holder input[name="'+aoShow+'"]').prop('checked', false);
				$('#my-add-ons .ao-item').each(function(){
					var myType = $(this).attr('data-ao-type');
					if(myType==aoShow){
						$(this).remove();
					}
				});
			}else{
				$(this).addClass('selected');
				$(this).children('input[name="ao-product"]').prop('checked', true);		
				$('#'+aoShow+'-holder').removeClass('hidden');
				$('.step4-content .btn-holders').removeClass('hidden');
			}	
		}else{
			$('.step4-content input').prop('checked', false);		
			$('.step4-content div').removeClass('selected');
			$('.ao-product-holder').addClass('hidden');
			$(this).children('input[name="ao-product"]').prop('checked', true);		
			$(this).addClass('selected');
			$('#my-add-ons .ao-info').html('');
			$('.step4-content .btn-holders').removeClass('hidden');
		}
		
	});
	
	

	$('.add-on-product').click(function(evt){
				//evt.preventDefault();
				var aoType = $(this).parent().attr('id');
				if($(this).hasClass('selected')){
					$('#'+aoType+' input.ao-selected').prop('checked', false);
					$('#'+aoType+' .add-on-product').removeClass('selected');
				}else{
					$('#'+aoType+' input.ao-selected').prop('checked', false);
					$('#'+aoType+' .add-on-product').removeClass('selected');
					$(this).children('input.ao-selected').prop('checked', true);
					$(this).addClass('selected');
				}
	});
	
	$('.add-on-product input').click(function(){
		$('.add-on-product').trigger('click');
	});
	
	
// step 4 finish 

	$('a.btn-finish-step4').click(function(evt){
		evt.preventDefault();
		var currTotal = $('#order-info-holder .total span').html();
		currTotal = currTotal.replace('$','');
		currTotal = parseInt(currTotal);
		$('#my-add-ons .ao-item').remove();
	
		if($('input#none-check').prop('checked')==true){
			$('#my-add-ons .ao-info').append('<div>No Additional Items</div>');
		}else{
			$('.ao-product-holder .add-on-product').each(function(x){
				if($(this).hasClass('selected')){				
					var aoProductType = $(this).parent().attr('data-product-type');
					var aoProductBrand = $(this).attr('data-product-brand');  	
					var aoProductID = $(this).attr('data-product-id');
					var aoProductCost = $(this).attr('data-product-cost');
					aoPrice = aoPrice+parseInt(aoProductCost);
					$('#my-add-ons .ao-info').append('<div class="ao-item" data-ao-cost="'+aoProductCost+'" data-ao-type="'+aoProductType+'">'+aoProductBrand+' '+aoProductID+' '+aoProductType+'</div>');
				}	
			});
		
		}
		
			
		$('#order-info-holder .total').attr('ao-cost', aoPrice );
		addTotalPrice();	
		changeStep(5);
		
		
		
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
		
		if(myStep==4){
			$('.ao-checkbox-holder input[name="ao-product"]').prop('checked', false);
			$('.ao-product-holder').addClass('hidden');
			$('.ao-checkbox-holder, .add-on-product').removeClass('selected');
			$('#my-add-ons .ao-info').html('');
			$('input.ao-selected').prop('checked', false);
			$(this).parent().addClass('hidden');
		}
		
		takeHome();
	
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
			changeStep(1);
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
			$('#order-info-holder .total').attr('additional-cost', 0);
			changeStep(2);
		}
		
		if(backFrom == 4){
			$('.ao-checkbox-holder input').prop('checked', false);
			$('.step4-content, .step4-content .btn-holders').addClass('hidden');
			$('.step3-content').removeClass('hidden');
			$('#my-selection .order-info').html('');
			changeStep(3);
		}
		
		if(backFrom == 5){
			$('.step5-content').addClass('hidden');
			$('.step4-content').removeClass('hidden');
			$('.step4-content div').removeClass('selected');
			$('.ao-product-holder input[type=checkbox]').prop('checked', false);
			$('#my-add-ons .order-info').html('');
			changeStep(4);
			
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
				
				$('.existing-info-holder .existing').each(function(){
					if($(this).hasClass(myProduct)){
						$(this).removeClass('hidden');
					}
					
					if($(this).hasClass('boiler-furnace') && (myProduct=='furnace' || myProduct=='boiler' || myProduct=='combo')){
						$(this).removeClass('hidden');
					}
					
					if( myProduct=='combo' && ($(this).hasClass('furnace') || $(this).hasClass('air-conditioner')) ){
						$(this).removeClass('hidden');	
					}
				
				});
				

			}else{
				alert('Please answer all of the questions');
			}

		});

// price added

	function addTotalPrice(){
		addCost = parseInt(addCost);
		prodPrice = parseInt(prodPrice);	
		aoPrice = parseInt(aoPrice);
		
		var myTotal = addCost+prodPrice+aoPrice;
		$('#order-info-holder .total span').html('$'+myTotal+'.00');
	}		
		
	// step 3 more options button actions
	
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
	
	
	
	// scroll to top of questions
	function takeHome(){
		var posY = ($('.order-steps-holder').offset().top)-30;
		$('html,body').delay(100).animate({scrollTop : posY});
	
	}	
	
	
	//  change top bar pass the step you are going to.	
	function changeStep(x){
		var prevStep = x-1;
		var currStep = x;
		var nextStep = x+1;
	
		$('.order-steps-holder ul li').each(function(i) {
				$(this).removeClass('active next-step');
			});
		$('.order-steps-holder ul li.step'+currStep).addClass('active');
		$('.order-steps-holder ul li.step'+nextStep).addClass('next-step');		
					
		$('.step'+prevStep+'-content').addClass('hidden');
		$('.step'+currStep+'-content').removeClass('hidden');

		takeHome();
		reportMe();	
	}
	
	
	// adjust the sidebar height
	
	function sameHeight(){
	
		var tallest = new Array();		
		var heightLeft = $('#order-info-holder').height();
		var heightRight = $('.order-holder').height();
		tallest.push(heightLeft);
		tallest.push(heightRight);
			
		var isTallest = Math.max.apply(null, tallest);
		if(isTallest>270){
			$('#order-info-holder, .order-holder').css('height', isTallest+'px');		
		}else{
			$('#order-info-holder, .order-holder').css('height', '270px');	
		}		
	
	}
	

function reportMe(){
		console.debug('myProduct = '+myProduct);
		console.debug('myBrand = '+myBrand);
		console.debug('mySqFt = '+mySqFt);
		console.debug('mySqFtNum = '+mySqFtNum);
		console.debug('myGal = '+myGal);
		console.debug('myHE = '+myHE);
		console.debug('existingAddPrice = '+existingAddPrice);
		console.debug('addCost = '+addCost);
		console.debug('prodPrice = '+prodPrice);
		console.debug('aoPrice = '+aoPrice);
}

	


} //end orderPageActions



