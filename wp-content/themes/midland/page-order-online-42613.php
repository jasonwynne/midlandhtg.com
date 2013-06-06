<?php
 /* Template Name: Online Ordering */
?>

<?php get_header(); ?>

<div id="page" class="wrapper default-template ordering-template">
	<div class="center">
		<div class="content-holder-all">
			<div class="main-content order-header">
				<h1><?php the_title(); ?></h1>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				  <?php the_content(); ?>
				<?php endwhile; wp_reset_query(); ?>
			</div>
			<div class="order-steps-holder">
				<ul class="clear-fix" >
					<li class="active step1">Step 1: Get Started</li>
					<li class="next-step step2">Step 2: Your Home</li>
					<li class="step3">Step 3: Recommendations</li>
					<li class="step4">Step 4: Additional Items</li>
					<li class="step5">Step 5: Place Order</li>
				</ul>
				<div class="clear"></div>
			</div>
			<div id="order-info-holder">
				<div class="total">Order Total: <span></span></div>
				<div id="my-product" class="product-info-holder hidden">
					<h4>Product:</h4>
					<div class="product-type order-info"></div>	
				</div>
				<div id="my-home" class="product-info-holder hidden">
					<h4>My Home:</h4>
					<div class="house-info home-questions order-info"></div>	
				</div>
				<div id="my-existing" class="product-info-holder hidden">
					<h4>My Existing: <span></span></h4>
					<div class="existing-info existing order-info"></div>	
				</div>
				<div id="my-selection" class="product-info-holder hidden">
					<h4>My Selection: <span></span></h4>	
					<div class="selection-info selection order-info"></div>	
				</div>
				<div id="my-add-ons" class="product-info-holder hidden">
					<h4>Additional Items:</h4>	
					<div class="ao-info selection order-info"></div>	
				</div>

			</div>
			<div class="order-holder">
				<div class="step1-content">
					<div class="step-product-holder product-type">	
						<p class="step-instructions">Select what product you would like to purchase:</p>
						<p class="checkbox-holder"><input id="furnace" type="radio" name="product" value="Furnace"><label for="furnace">Furnace</label></p>
						<p class="checkbox-holder"><input id="ac" type="radio" name="product" value="Air Conditioner"><label for="ac">Air Conditioner</label></p>
						<p class="checkbox-holder"><input id="boiler" type="radio" name="product" value="Boiler"><label for="boiler">Boiler</label></p>	
						<p class="checkbox-holder"><input id="water-heater" type="radio" name="product" value="Water Heater"><label for="water-heater">Water Heater</label></p>
						<p class="checkbox-holder"><input id="furnace-ac" type="radio" name="product" value="combo"><label for="furnace-ac">Furnace & Air Conditioner</label></p>
						<div class="clear"></div>
					</div>
					<div class="step-product-holder product-brand hidden">	
							<p class="step-instructions">Select what brand you would like to purchase <span></span>:</p>
							<p class="checkbox-holder furnace air-conditioner combo"><input id="aire-flo-b0" type="radio" name="brand" value="AIRE-FLO"><label for="aire-flo-b0">AIRE-FLO</label></p>
							<p class="checkbox-holder furnace air-conditioner combo"><input id="lennox-b0" type="radio" name="brand" value="LENNOX"><label for="lennox-b0">LENNOX</label></p>
							<p class="checkbox-holder boiler"><input id="slant-fin-b0" type="radio" name="brand" value="Slant-Fin"><label for="slant-fin-b0">Slant-Fin</label></p>
							<p class="checkbox-holder water-heater"><input id="state-b0" type="radio" name="brand" value="State"><label for="state-b0">State</label></p>
							<div class="clear"></div>
					</div>
					<div class="step1-finish hidden" >
						<a class="btn-finish" href="#">Next Step</a>
					</div>
					<div class="clear"></div>
				</div><!--  End of Step 1  -->
				<div class="step2-content hidden" data-step2-additional-cost="0">
					<div class="home-questions">	
						<h3>Sizing the equipment right for your house</h3>
						<div class="question-holder house-sqft">			
							<p class="step-instructions">What is the square footage of your house?</p>
							<?php the_field('square_footage_copy'); ?>
							<p class="checkbox-holder"><input id="sqft1" type="radio" name="sqft" value="0-900"><label for="sqft1">0-900</label></p>
							<p class="checkbox-holder"><input id="sqft2" type="radio" name="sqft" value="901-1500"><label for="sqft2">901-1500</label></p>
							<p class="checkbox-holder"><input id="sqft3" type="radio" name="sqft" value="1501-2000"><label for="sqft3">1501-2000</label></p>
							<p class="checkbox-holder"><input id="sqft4" type="radio" name="sqft" value="2001-2300"><label for="sqft4">2001-2300</label></p>
							<p class="checkbox-holder"><input id="sqft5" type="radio" name="sqft" value="2301-2600"><label for="sqft5">2301-2600</label></p>				
							<p class="checkbox-holder"><input id="sqft6" type="radio" name="sqft" value="2601-3200"><label for="sqft6">2601-3200</label></p>				
							<div class="clear"></div>
						</div>	
						<div class="question-holder house-type">			
							<p class="step-instructions">What Style House do you have?</p>
							<p class="checkbox-holder"><input id="house-type1" type="radio" name="house-type" value="Rambler"><label for="house-type1">Rambler</label></p>
							<p class="checkbox-holder"><input id="house-type2" type="radio" name="house-type" value="Two Story"><label for="house-type2">Two Story</label></p>
							<p class="checkbox-holder"><input id="house-type3" type="radio" name="house-type" value="Split Entry"><label for="house-type3">Split Entry</label></p>
							<p class="checkbox-holder"><input id="house-type4" type="radio" name="house-type" value="Story and One Half"><label for="house-type4">Story and One Half</label></p>
							<div class="clear"></div>
						</div>
						<div class="question-holder window-type">			
							<p class="step-instructions">What Type of Windows do you have?</p>
							<p class="checkbox-holder"><input id="window-type1" type="radio" name="window-type" value="Single Pane"><label for="window-type1">Single Pane</label></p>
							<p class="checkbox-holder"><input id="window-type2" type="radio" name="window-type" value="Double Pane"><label for="window-type2">Double Pane</label></p>
							<p class="checkbox-holder"><input id="window-type3" type="radio" name="window-type" value="Triple Pane"><label for="window-type3">Triple Pane</label></p>
							<p class="checkbox-holder"><input id="window-type4" type="radio" name="window-type" value="Single Pane with Storm"><label for="window-type4">Single Pane with Storm</label></p>
							<p class="checkbox-holder"><input id="window-type5" type="radio" name="window-type" value="Don’t know"><label for="window-type5">Don’t know</label></p>
							<div class="clear"></div>
						</div>
						<div class="question-holder wall-insulation">			
							<p class="step-instructions">How Much Wall Insulation?</p>
							<p class="checkbox-holder"><input id="wall-insulation1" type="radio" name="wall-insulation" value="Very Little"><label for="wall-insulation1">Very Little</label></p>
							<p class="checkbox-holder"><input id="wall-insulation2" type="radio" name="wall-insulation" value="Normal"><label for="wall-insulation2">Normal</label></p>
							<p class="checkbox-holder"><input id="wall-insulation3" type="radio" name="wall-insulation" value="We have Added"><label for="wall-insulation3">We have Added</label></p>
							<p class="checkbox-holder"><input id="wall-insulation4" type="radio" name="wall-insulation" value="Don’t know"><label for="wall-insulation5">Don’t know</label></p>
							<div class="clear"></div>
						</div>
						<div class="question-holder attic-insulation">			
							<p class="step-instructions">How Much Ceiling/Attic Insulation?</p>
							<p class="checkbox-holder"><input id="attic-insulation1" type="radio" name="attic-insulation" value="Very Little"><label for="attic-insulation1">Very Little</label></p>
							<p class="checkbox-holder"><input id="attic-insulation2" type="radio" name="attic-insulation" value="Normal"><label for="attic-insulation2">Normal</label></p>
							<p class="checkbox-holder"><input id="attic-insulation3" type="radio" name="attic-insulation" value="We have Added"><label for="attic-insulation3">We have Added</label></p>
							<p class="checkbox-holder"><input id="attic-insulation4" type="radio" name="attic-insulation" value="Don’t know"><label for="attic-insulation5">Don’t know</label></p>
							<div class="clear"></div>
						</div>
						<div class="question-holder high-efficiency" >
							<p class="step-instructions">Do you want to purchase High Efficiency Equipment?</p>
							<p class="checkbox-holder"><input id="he-yes" type="radio" name="high-efficiency" value="Yes"><label for="he-yes">Yes</label></p>
							<p class="checkbox-holder"><input id="he-no" type="radio" name="high-efficiency" value="No"><label for="he-no">No</label></p>
							<p class="checkbox-holder"><input id="he-both" type="radio" name="high-efficiency" value="Both"><label for="he-both">Show Both</label></p>
							<div class="clear"></div>
						</div>
						<div class="btn-holders">
							<a class="btn-back" data-step="home-questions">Back</a>
							<a class="btn-clear" data-step="home-questions">Clear</a>
							<a class="btn-continue" data-step="home-questions">Continue</a>
						</div>	
						<div class="clear"></div>
					</div>
					<div class="existing-info-holder hidden">		
						<div class="existing-cost-explain"><?php the_field('added_cost_explanation'); ?></div>
						<div class="existing furnace hidden">
							<h3>Tell Us About your Existing Furnace</h3>
							<p class="step-instructions">Does your current furnace look like one of these:</p>
							<p class="checkbox-holder"><input id="existing-furnace1" type="radio" name="furnace" value="Gravity"><label for="existing-furnace1">Gravity Furnace<br /><img src="<?php bloginfo('template_directory'); ?>/images/ordering/furnace-gravity.jpg" /></label></p>
							<p class="checkbox-holder"><input id="existing-furnace2" type="radio" name="furnace" value="Tall Metal" data-additional-cost="200"><label for="existing-furnace2">Tall Metal Furnace<br /><img src="<?php bloginfo('template_directory'); ?>/images/ordering/furnace-tallmetal.jpg" /></label></p>
							<p class="checkbox-holder"><input id="existing-furnace3" type="radio" name="furnace" value="Modern"><label for="existing-furnace3">Modern Furnace<br /><img src="<?php bloginfo('template_directory'); ?>/images/ordering/furnace-modern.jpg" /></label></p>
							<div class="clear"></div>
						</div>
						<div class="existing furnace-gravity hidden">
							<p class="step-instructions">How many pipes come off the main body of your gravity furnace?</p>
							<p class="checkbox-holder"><input id="pipes1" type="radio" name="pipes" value="3-5" data-additional-cost="1462"><label for="pipes1">3-5</label></p>
							<p class="checkbox-holder"><input id="pipes2" type="radio" name="pipes" value="6-8" data-additional-cost="2640"><label for="pipes2">6-8</label></p>
							<p class="checkbox-holder"><input id="pipes3" type="radio" name="pipes" value="9-11" data-additional-cost="3620"><label for="pipes3">9-11</label></p>
							<div class="clear"></div>
						</div>
						<div class="existing boiler hidden">
							<h3>Tell Us About your Existing Boiler</h3>
							<p class="step-instructions">Select the picture that most looks like your current boiler:</p>
							<p class="checkbox-holder"><input id="existing-boiler1" type="radio" name="boiler" value="Gravity"><label for="existing-boiler1">Gravity Boiler<br /><img src="<?php bloginfo('template_directory'); ?>/images/ordering/fpo-image.jpg" /></label></p>
							<p class="checkbox-holder"><input id="existing-boiler2" type="radio" name="boiler" value="Tall Metal" data-additional-cost="300"><label for="existing-boiler2">Tall Metal Boiler<br /><img src="<?php bloginfo('template_directory'); ?>/images/ordering/fpo-image.jpg" /></label></p>
							<p class="checkbox-holder"><input id="existing-boiler3" type="radio" name="boiler" value="Modern"><label for="existing-boiler3">Modern Boiler<br /><img src="<?php bloginfo('template_directory'); ?>/images/ordering/boiler-modern.jpg" /></label></p>
							<div class="clear"></div>
						</div>
						<div class="existing air-conditioner hidden">
							<h3>Tell Us About your Existing Air Conditioner</h3>
							<p class="step-instructions">Do you have an existing air conditioner?</p>
							<p class="checkbox-holder"><input id="existing-ac-yes" type="radio" name="air-conditioner" value="Yes"><label for="existing-ac-yes">Yes</label></p>
							<p class="checkbox-holder"><input id="existing-ac-no" type="radio" name="air-conditioner" value="No" data-additional-cost="395"><label for="existing-ac-no">No</label></p>
							<div class="clear"></div>
						</div>	
						<div class="existing water-heater hidden">
							<h3>Tell Us About your Existing Water Heater</h3>
							<p class="step-instructions">What gallon capacity are you looking for?</p>
							<p class="checkbox-holder"><input id="gallons30" type="radio" name="gallons" value="30"><label for="gallons30">30</label></p>
							<p class="checkbox-holder"><input id="gallons40" type="radio" name="gallons" value="40"><label for="gallons40">40</label></p>
							<p class="checkbox-holder"><input id="gallons50" type="radio" name="gallons" value="50"><label for="gallons50">50</label></p>
							<p class="checkbox-holder"><input id="gallons75" type="radio" name="gallons" value="75"><label for="gallons75">75</label></p>
							<div class="clear"></div>
						</div>
						<div class="existing install-time" >
							<p class="step-instructions">Select Install lead time:</p>
							<p class="checkbox-holder"><input id="install-normal" type="radio" name="install-time" value="Normal"><label for="install-normal">Normal</label></p>
							<p class="checkbox-holder"><input id="install-emergency" type="radio" name="install-time" value="Emergency" data-additional-cost="280"><label for="install-emergency">Emergency – Install within 24 hrs of order</label></p>
							<div class="clear"></div>
						</div>
						<div class="btn-holders  ">
							<a class="btn-back" data-step="existing">Back</a>
							<a class="btn-clear" data-step="existing">Clear</a>
							<a class="btn-finish-step2" data-step="2">Next Step</a>
						</div>
					</div>
				</div><!--  End of Step 2	 -->
				<div class="step3-content hidden">
					<div id="furnace-recommendations" class="hidden" data-product-type="furnace">
						<h3>Our Furnace Recommendations</h3>
						<?php $custom_query = new WP_Query( array('post_type' => 'products', 'category_name' => 'furnace', 'showposts' => -1 ) );
									while($custom_query->have_posts()) : $custom_query->the_post(); ?>
							<div class="recommended-product <?php the_field('square_footage'); ?> hidden" data-product-cost="<?php the_field('product_price'); ?>" data-product-id="<?php the_title(); ?>" data-product-brand="<?php the_field('brand');?>" data-he="<?php the_field('high_efficiency');?>">	
									<input id="rp-selected" type="checkbox" name="rp-furnace" value="<?php the_title(); ?>">
									<h3 class="rp-title"><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Furnace</h3>
									<h3 class="total-cost">$<?php the_field('product_price'); ?></h3>
									<div class="clear"></div>
									<div class="rp-info-holders">
										<img src="<?php the_field('product_image');?>" alt="<?php the_field('brand');?> furnace <?php the_field('product_ID');?>" />							
										<p class="rp-snipit">
											<?php 
												the_field('product_snippit');
												if( get_field('product_link')){ ?>
													<a class="rp-learn-more-btn" href="<?php the_field('product_link');?>" target="_blank">...Learn More</a>
												<?php } ?>
										</p>	
										<div class="clear"></div>
									</div>	
									<div class="btn-product first">Features
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Features</h3>
											<?php the_field('product_information');?>
										</div>
									</div>
									<div class="btn-product">Warranty Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Warranty</h3>
											<?php the_field('product_warranty');?>
										</div>
									</div>
									<div class="btn-product">Rebate Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Rebate</h3>
											<?php the_field('product_rebate');?>
										</div>
									</div>
									<?php if( get_field('product_brochure')){ ?>
										<a class="btn-brochure" href="<?php the_field('product_brochure');?>" target="_blank" >Brochure</a>
									<?php } ?>
									<div class="clear"></div>
							</div>
						<?php endwhile; wp_reset_query(); ?>
						<div class="more-options-btn">
							<a class="btn-more-options" data-product-type="furnace">More Furnace Options</a>
						</div>
						<div class="clear"></div>
					</div>
					<div id="air-conditioner-recommendations" class="hidden" data-product-type="air-conditioner">
						<h3>Our Air Conditioner Recommendations</h3>
						<?php $custom_query = new WP_Query( array('post_type' => 'products', 'category_name' => 'air-conditioner', 'showposts' => -1 ) );
									while($custom_query->have_posts()) : $custom_query->the_post(); ?>
							<div class="hidden recommended-product <?php the_field('square_footage'); ?>" data-product-cost="<?php the_field('product_price'); ?>" data-product-id="<?php the_title(); ?>" data-product-brand="<?php the_field('brand');?>"  data-he="<?php the_field('high_efficiency');?>" >	
									<input id="rp-selected" type="checkbox" name="rp-air-conditioner" value="<?php the_title(); ?>">
									<h3 class="rp-title"><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Air Conditioner</h3>
									<h3 class="total-cost">$<?php the_field('product_price'); ?></h3>
									<div class="clear"></div>
									<div class="rp-info-holders">
										<img src="<?php the_field('product_image');?>" alt="<?php the_field('brand');?> furnace <?php the_field('product_ID');?>" />							
										<p class="rp-snipit">
											<?php 
												the_field('product_snippit');
												if( get_field('product_link')){ ?>
													<a class="rp-learn-more-btn" href="<?php the_field('product_link');?>" target="_blank">...Learn More</a>
												<?php } ?>
										</p>	
										<div class="clear"></div>
									</div>	
									<div class="btn-product first">Features
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Features</h3>
											<?php the_field('product_information');?>
										</div>
									</div>
									<div class="btn-product">Warranty Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Warranty</h3>
											<?php the_field('product_warranty');?>
										</div>
									</div>
									<div class="btn-product">Rebate Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Rebate</h3>
											<?php the_field('product_rebate');?>
										</div>
									</div>
									<?php if( get_field('product_brochure')){ ?>
										<a class="btn-brochure" href="<?php the_field('product_brochure');?>" target="_blank" >Brochure</a>
									<?php } ?>
									<div class="clear"></div>
							</div>
						<?php endwhile; wp_reset_query(); ?>
						<div class="more-options-btn">
							<a class="btn-more-options" data-product-type="air-conditioner">More Air Conditioner Options</a>
						</div>				
						<div class="clear"></div>
					</div>
					<div id="boiler-recommendations" class="hidden" data-product-type="boiler">
						<h3>Our Boiler Recommendations</h3>
						<?php $custom_query = new WP_Query( array('post_type' => 'products', 'category_name' => 'boiler', 'showposts' => -1 ) );
									while($custom_query->have_posts()) : $custom_query->the_post(); ?>
							<div class="hidden recommended-product <?php the_field('square_footage'); ?>" data-product-cost="<?php the_field('product_price'); ?>" data-product-id="<?php the_title(); ?>" data-product-brand="<?php the_field('brand');?>" data-he="<?php the_field('high_efficiency');?>" >	
									<input id="rp-selected" type="checkbox" name="rp-boiler" value="<?php the_title(); ?>">
									<h3 class="rp-title"><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Boiler</h3>
									<h3 class="total-cost">$<?php the_field('product_price'); ?></h3>
									<div class="clear"></div>
									<div class="rp-info-holders">
										<img src="<?php the_field('product_image');?>" alt="<?php the_field('brand');?> furnace <?php the_field('product_ID');?>" />							
										<p class="rp-snipit">
											<?php 
												the_field('product_snippit');
												if( get_field('product_link')){ ?>
													<a class="rp-learn-more-btn" href="<?php the_field('product_link');?>" target="_blank">...Learn More</a>
												<?php } ?>
										</p>	
										<div class="clear"></div>
									</div>	
									<div class="btn-product first">Features
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Features</h3>
											<?php the_field('product_information');?>
										</div>
									</div>
									<div class="btn-product">Warranty Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Warranty</h3>
											<?php the_field('product_warranty');?>
										</div>
									</div>
									<div class="btn-product">Rebate Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Rebate</h3>
											<?php the_field('product_rebate');?>
										</div>
									</div>
									<?php if( get_field('product_brochure')){ ?>
										<a class="btn-brochure" href="<?php the_field('product_brochure');?>" target="_blank" >Brochure</a>
									<?php } ?>
									<div class="clear"></div>
							</div>
						<?php endwhile; wp_reset_query(); ?>
						<div class="clear"></div>
					</div>
					<div id="water-heater-recommendations" class="hidden" data-product-type="water-heater">
						<h3>Our Water Heater Recommendations</h3>
						<?php $custom_query = new WP_Query( array('post_type' => 'products', 'category_name' => 'water-heater', 'showposts' => -1 ) );
									while($custom_query->have_posts()) : $custom_query->the_post(); 
							$myGals = 'gal'. get_field('product_gallons');		
						?>
							<div class="hidden recommended-product <?php echo $myGals ?>" data-product-cost="<?php the_field('product_price'); ?>" data-product-id="<?php the_title(); ?>" data-product-brand="<?php the_field('brand');?>" data-he="<?php the_field('high_efficiency');?>">	
									<input id="rp-selected" type="checkbox" name="rp-water-heater" value="<?php the_title(); ?>">
									<h3 class="rp-title"><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Water Heater</h3>
									<h3 class="total-cost">$<?php the_field('product_price'); ?></h3>
									<div class="clear"></div>
									<div class="rp-info-holders">
										<img src="<?php the_field('product_image');?>" alt="<?php the_field('brand');?> furnace <?php the_field('product_ID');?>" />							
										<p class="rp-snipit">
											<?php 
												the_field('product_snippit');
												if( get_field('product_link')){ ?>
													<a class="rp-learn-more-btn" href="<?php the_field('product_link');?>" target="_blank">...Learn More</a>
												<?php } ?>
										</p>	
										<div class="clear"></div>
									</div>	
									<div class="btn-product first">Features
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Features</h3>
											<?php the_field('product_information');?>
										</div>
									</div>
									<div class="btn-product">Warranty Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Warranty</h3>
											<?php the_field('product_warranty');?>
										</div>
									</div>
									<div class="btn-product">Rebate Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Rebate</h3>
											<?php the_field('product_rebate');?>
										</div>
									</div>
									<?php if( get_field('product_brochure')){ ?>
										<a class="btn-brochure" href="<?php the_field('product_brochure');?>" target="_blank" >Brochure</a>
									<?php } ?>
									<div class="clear"></div>
							</div>
						<?php endwhile; wp_reset_query(); ?>
						<div class="more-options-btn">
							<a class="btn-more-options" data-product-type="water-heater">More Water Heater Options</a>
						</div>
						
						<div class="clear"></div>
					</div>
					<div class="btn-holders hidden">
						<a class="btn-back" data-step="3">Back</a>
						<a class="btn-clear" data-step="3">Clear</a>
						<a class="btn-finish-step3" data-step="3">Next Step</a>
					</div>
				</div><!--  End of Step 3	 -->	
				<div class="step4-content hidden">
					<div class="ao-holder">
						<h3>Additional Items</h3>
						<p>Please select which additional items you would like to learn more about:</p>
						<div class="ao-checkbox-holder clearfix">
							<input id="thermostat-check" type="checkbox" name="ao-product" value="thermostat">
							<p><b>Thermostats:</b> <?php the_field('thermostat_description'); ?></p>
						</div>
						<div class="ao-checkbox-holder clearfix">
							<input id="filter-check" type="checkbox" name="ao-product" value="filter">
							<p><b>Whole House Filters:</b> <?php the_field('filter_description'); ?></p>
						</div>
						<div class="ao-checkbox-holder clearfix">
							<input id="air-exchanger-check" type="checkbox" name="ao-product" value="air-exchanger">
							<p><b>Air to Air Exchangers:</b> <?php the_field('air_exchanger_description'); ?></p>
						</div>
						<div class="ao-checkbox-holder clearfix">
							<input id="misc-check" type="checkbox" name="ao-product" value="miscellaneous">
							<p><b>Miscellaneous Items:</b> <?php the_field('miscellaneous_description'); ?></p>
						</div>
						<div class="ao-checkbox-holder clearfix">
							<input id="none-check" type="checkbox" name="ao-product" value="none">
							<p><b>None Thanks</b></p>
						</div>
						<div class="clear"></div>
					</div>
					<div id="thermostat-holder" class="ao-product-holder hidden" data-product-type="thermostat">
						<h3>Thermostats</h3>
						<?php $custom_query = new WP_Query( array('post_type' => 'products', 'category_name' => 'thermostat', 'showposts' => -1 ) );
									while($custom_query->have_posts()) : $custom_query->the_post(); ?>
								<div class="add-on-product <?php the_field('square_footage'); ?>" data-product-cost="<?php the_field('product_price'); ?>" data-product-id="<?php the_title(); ?>" data-product-brand="<?php the_field('brand');?>" >	
									<input class="ao-selected" type="checkbox" name="thermostat" value="<?php the_title(); ?>">
									<h3 class="rp-title"><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Thrmostat</h3>
									<h3 class="total-cost">$<?php the_field('product_price'); ?></h3>
									<div class="clear"></div>
									<div class="rp-info-holders">
										<img src="<?php the_field('product_image');?>" alt="<?php the_field('brand');?> furnace <?php the_field('product_ID');?>" />							
										<p class="rp-snipit">
											<?php 
												the_field('product_snippit');
												if( get_field('product_link')){ ?>
													<a class="rp-learn-more-btn" href="<?php the_field('product_link');?>" target="_blank">...Learn More</a>
												<?php } ?>
										</p>	
										<div class="clear"></div>
									</div>	
									<div class="btn-product first">Features
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Features</h3>
											<?php the_field('product_information');?>
										</div>
									</div>
									<div class="btn-product">Warranty Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Warranty</h3>
											<?php the_field('product_warranty');?>
										</div>
									</div>
									<div class="btn-product">Rebate Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Rebate</h3>
											<?php the_field('product_rebate');?>
										</div>
									</div>
									<?php if( get_field('product_brochure')){ ?>
										<a class="btn-brochure" href="<?php the_field('product_brochure');?>" target="_blank" >Brochure</a>
									<?php } ?>
									<div class="clear"></div>
							</div>
						<?php endwhile; wp_reset_query(); ?>
						<div class="clear"></div>
					</div>
					<div id="filter-holder" class="ao-product-holder hidden" data-product-type="filter">
						<h3>Filters</h3>
						<?php $custom_query = new WP_Query( array('post_type' => 'products', 'category_name' => 'filters', 'showposts' => -1 ) );
									while($custom_query->have_posts()) : $custom_query->the_post(); ?>
								<div class="add-on-product" data-product-cost="<?php the_field('product_price'); ?>" data-product-id="<?php the_title(); ?>" data-product-brand="<?php the_field('brand');?>" >	
									<input class="ao-selected" type="checkbox" name="filter" value="<?php the_title(); ?>">
									<h3 class="rp-title"><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Filter</h3>
									<h3 class="total-cost">$<?php the_field('product_price'); ?></h3>
									<div class="clear"></div>
									<div class="rp-info-holders">
										<img src="<?php the_field('product_image');?>" alt="<?php the_field('brand');?> Filter <?php the_field('product_ID');?>" />							
										<p class="rp-snipit">
											<?php 
												the_field('product_snippit');
												if( get_field('product_link')){ ?>
													<a class="rp-learn-more-btn" href="<?php the_field('product_link');?>" target="_blank">...Learn More</a>
												<?php } ?>
										</p>	
										<div class="clear"></div>
									</div>	
									<div class="btn-product first">Features
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Features</h3>
											<?php the_field('product_information');?>
										</div>
									</div>
									<div class="btn-product">Warranty Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Warranty</h3>
											<?php the_field('product_warranty');?>
										</div>
									</div>
									<div class="btn-product">Rebate Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Rebate</h3>
											<?php the_field('product_rebate');?>
										</div>
									</div>
									<?php if( get_field('product_brochure')){ ?>
										<a class="btn-brochure" href="<?php the_field('product_brochure');?>" target="_blank" >Brochure</a>
									<?php } ?>
									<div class="clear"></div>
							</div>
						<?php endwhile; wp_reset_query(); ?>
						<div class="clear"></div>
					</div>
					<div id="indoor-air-quality-holder" class="ao-product-holder hidden" data-product-type="indoor-air-quality">
						<h3>Indoor Air Quality</h3>
						<?php $custom_query = new WP_Query( array('post_type' => 'products', 'category_name' => 'indoor-air-quality', 'showposts' => -1 ) );
								while($custom_query->have_posts()) : $custom_query->the_post(); ?>
								<div class="add-on-product" data-product-cost="<?php the_field('product_price'); ?>" data-product-id="<?php the_title(); ?>" data-product-brand="<?php the_field('brand');?>" >	
									<input class="ao-selected" type="checkbox" name="air-exchanger" value="<?php the_title(); ?>">
									<h3 class="rp-title"><?php the_field('brand'); ?> <?php the_field('product_id'); ?></h3>
									<h3 class="total-cost">$<?php the_field('product_price'); ?></h3>
									<div class="clear"></div>
									<div class="rp-info-holders">
										<img src="<?php the_field('product_image');?>" alt="<?php the_field('brand');?> Filter <?php the_field('product_ID');?>" />							
										<p class="rp-snipit">
											<?php 
												the_field('product_snippit');
												if( get_field('product_link')){ ?>
													<a class="rp-learn-more-btn" href="<?php the_field('product_link');?>" target="_blank">...Learn More</a>
												<?php } ?>
										</p>	
										<div class="clear"></div>
									</div>	
									<div class="btn-product first">Features
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Features</h3>
											<?php the_field('product_information');?>
										</div>
									</div>
									<div class="btn-product">Warranty Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Warranty</h3>
											<?php the_field('product_warranty');?>
										</div>
									</div>
									<div class="btn-product">Rebate Information
										<div class="prod-info hidden">
											<h3><?php the_field('brand'); ?> <?php the_field('product_id'); ?> Rebate</h3>
											<?php the_field('product_rebate');?>
										</div>
									</div>
									<?php if( get_field('product_brochure')){ ?>
										<a class="btn-brochure" href="<?php the_field('product_brochure');?>" target="_blank" >Brochure</a>
									<?php } ?>
									<div class="clear"></div>
							</div>
						<?php endwhile; wp_reset_query(); ?>
						<div class="clear"></div>
					</div>
					<div class="btn-holders hidden">
						<a class="btn-back" data-step="4">Back</a>
						<a class="btn-clear" data-step="4">Clear</a>
						<a class="btn-finish-step4" data-step="4">Next Step</a>
					</div>
				</div><!--  End of Step 4 -->	
				<div class="step5-content hidden">
					<h3>Place Order</h3>
					<div id="personal-info-holder">
						<div class="personal-info clearfix">
							<label for="name">Name</label>
							<input class="no-empty" id="name" type="text" name="name" />
							<p class="error-msg">Enter your full name</p>
						</div>
						<div class="personal-info clearfix">
							<label for="address">Address</label>
							<input class="no-empty" id="address" type="text" name="address" />
							<p class="error-msg">Enter a valid address</p>
						</div>
						<div class="personal-info clearfix">
							<label for="city">City</label>
							<input class="no-empty" id="city" type="text" name="city" />
							<p class="error-msg">Enter your city</p>
						</div>
						<div class="personal-info clearfix">
							<label for="state">State</label>
							<input id="state" type="text" name="state" value="MN" readonly="readonly"/>
						</div>
						<div class="personal-info clearfix">
							<label for="zip">Zip</label>
							<input id="zip" type="text" name="zip" maxlength="5" />
							<p class="error-msg">Enter a valid zip</p>
						</div>
						<div class="personal-info clearfix">
							<label for="email">Email</label>
							<input id="email" type="text" name="email" />
							<p class="error-msg">Enter a valid email</p>
						</div>
						<div class="personal-info clearfix">
							<label for="phone">Phone</label>
							<input id="phone" type="text" name="phone" maxlength="12" placeholder="XXX-XXX-XXXX"/>
							<p class="error-msg">Enter a valid phone number</p>
						</div>
					</div>
					<div class="order-disclaimer"><?php the_field('order_disclaimer'); ?></div>
					<div id="place-order">
						<a class="btn-back" data-step="5">Back</a>
						<a class="order-button">Place Order</a>
						<a class="order-placed hidden">Placing Order</a>	
					</div>
					
				</div><!--  End of Step 5 -->	
				<div class="clear"></div>
				<div id="prodPop" class="hidden"></div>		
			</div><!--  End order-holder -->
			<div class="clear"></div>
			<div class="order-thanks main-content order-header"><?php the_field('order_thanks'); ?></div>
		</div>
	</div>
</div>



<script type="text/javascript">

	$(function () {
	
		// clear all data on page when loaded
		$('input[type=checkbox]').prop('checked', false);
		$('input[type=radio]').prop('checked', false);
		$('div, .recommended-product, .ao-checkbox-holder, .add-on-product').removeClass('selected');
		$('.order-info').html('');
		
		
		orderPageActions();
		
		
		$('.btn-product').click(function(e){
			e.preventDefault();
			e.stopPropagation();
			var boxlink = '#prodPop';
			var prodDetail = $(this).children('.prod-info').html();
			$(boxlink).html(prodDetail);
			
			$.fancybox.open({
				href : boxlink,
				openEffect  : 'none',
				closeEffect	: 'none',
				padding: 0
			});
		});
		
		$('.rp-info-holders img').click(function(e){
			e.preventDefault();
			e.stopPropagation();
			var boxlink = $(this).attr('src');
			
			$.fancybox.open({
				href : boxlink,
				openEffect  : 'none',
				closeEffect	: 'none',
				padding: 0
			});
		});
	
			$('#place-order a').click(function(){
				// first we validate the order form
				var allValid = 0;	
				$('.personal-info input.no-empty').each(function(){	
					if($(this).val()==""){	
						$(this).parent().children('.error-msg').show();
					}else{
						allValid++
						$(this).parent().children('.error-msg').hide();
					}	
				});
				
				$('.personal-info input[name="email"]').each(function(){	
						var re = /\S+@\S+\.\S+/;
						var myEmail = $(this).val();
						if( re.test(myEmail)==true){
							allValid++
							$(this).parent().children('.error-msg').hide();
						}else{
							$(this).parent().children('.error-msg').show();
						}
				});
				
				$('.personal-info input[name="zip"]').each(function(){	
						var myCount = $(this).val().length;
						if(myCount==5){
							allValid++
							$(this).parent().children('.error-msg').hide();
						}else{
							$(this).parent().children('.error-msg').show();
						}
				});
				
				$('.personal-info input[name="phone"]').each(function(){	
						var myCount = $(this).val().length;
						if(myCount==12){
							allValid++
							$(this).parent().children('.error-msg').hide();
						}else{
							$(this).parent().children('.error-msg').show();
						}
				});
			
					
					if(allValid == 6){
						placeOrder();
					}
				
			});	
			
			$('.personal-info input[name="zip"]').keyup(function () {     
				this.value = this.value.replace(/[^1-9\.]/g,'');
			});



		function placeOrder(){
				
				var AOs, addItems, myHome, myProducts, mySelections;
				
				$('a.order-button').addClass('hidden');
				$('a.order-placed').removeClass('hidden');
				
				
				if($('#my-product .product-type div').attr('data-product-type')=='combo'){
					myProducts = 'Furnace & Air Conditioner';
					$('#my-selection .prod-selected').each(function(x){
						var mySelect = $(this).html();
						if(x==0){
							mySelections = mySelect;
						}else{
							mySelections = mySelections+'<br/>'+mySelect;
						}
					});
					
				}else{
					mySelections =  $('#my-selection .prod-selected').html();
					myProducts = $('#my-product .product-type div').attr('data-product-type');
					myProducts = myProducts.replace('-',' ');
				}
				
				
				if($('.total').attr('ao-cost')!=0){
					$('#my-add-ons .ao-item').each(function(x){
						var myItem = $(this).html();
						if(x==0){
							AOs = myItem;
						}else{
							AOs = AOs+'<br/>'+myItem;
						}
					});
					
				}else{
					AOs = 'no additional items'
				}
				
				
				if($('.total').attr('additional-cost')!=0){
					$('#my-existing .addCost').each(function(x){
						var myAdds = $(this).html();
						if(x==0){
							addItems = myAdds;
						}else{
							addItems = addItems+'<br/>'+myAdds;
						}
					});
					
				}else{
					addItems = 'No Added Costs'
				}
				
				$('#my-home .house-info div').each(function(x){
						var myAdds = $(this).html();
						if(x==0){
							myHome = myAdds;
						}else{
							myHome = myHome+'\n'+myAdds;
						}
				});
				
				
					
				var postData = {
					'name': $('.personal-info input[name="name"]').val(),
					'phone': $('.personal-info input[name="phone"]').val(),
					'address': $('.personal-info input[name="address"]').val(),
					'city' : $('.personal-info input[name="city"]').val(),
					'zip' : $('.personal-info input[name="zip"]').val(),
					'mainProd' : myProducts,
					'mainProdID' : mySelections,
					'mainProdCost' : $('.total').attr('product-cost'),
					'prodAOCost' : $('.total').attr('ao-cost'),
					'prodAOs' : AOs,
					'addCost' : $('.total').attr('additional-cost'),
					'addItems': addItems,
					'totalCost' : $('.total span').html(),
					'email' : $('.personal-info input[name="email"]').val(),
					'myHome' : myHome
					
 				};
				
				$.ajax({
						url: '<?php echo get_bloginfo("template_directory"); ?>/create-pdf.php',
						data: postData,
						type: 'POST',
						success: function (resp) {					
							if (resp === '1') {
								//window.location.href = '<?php echo get_bloginfo("template_directory"); ?>/download-pdf.php?pdf=midland_order';
								window.open('<?php echo get_bloginfo("template_directory"); ?>/pdf/midland_order.pdf', '_blank');
								$('.order-thanks').show();
								$('.order-steps-holder, #order-info-holder, .order-holder ').hide();
							}else{
								alert('Order failed, please call 612-869-3213');
							}
							
							
							
						}
					});
					
					
		} // end place order		
		
		
	});
	
</script>		
		
<?php get_footer(); ?>