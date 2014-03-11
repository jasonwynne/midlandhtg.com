<?php
 /* Template Name:Filters*/
?>

<?php get_header(); ?>

<div id="page" class="wrapper default-template">
	<div class="center">
		<div class="holder-left">
			<div class="main-content">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				  <?php the_content(); ?>
				<?php endwhile; wp_reset_query(); ?>
				
				<div id="order-holder">
					<div class="order-steps step1">
						<div class="header"><h4>What are you ordering?</h4></div>
						<div class="content">
							<select name="part-type" id="part-type">
								<option selected="selected">Please Select a Part Catagory</option>
								<option>Filters &amp; Filter Parts</option>
								<option>Water Panels &amp; Humidifier Parts</option>
							</select>
						</div>
					</div>
					<div class="order-steps step2">
						<div class="filters">
							<div class="header"><h4>Filters &amp; Filter Parts</h4></div>
							<div class="content clearfix">
								<table id="table-filter">
									<tr class="tb-head">
										<th width="12%">Item</th>
										<th width="60%">Decription</th>
										<th width="12%">Price</th>
										<th width="12%">Quantity</th>
									</tr>
									<?php while(the_repeater_field('filters')): ?>
										<tr class="item-single-filter">
											<td class="item-img"><img src="<?php the_sub_field('filter_image'); ?>" alt="<?php the_sub_field('filter_part_number'); ?>" /></td>
											<td class="item-desc"><span><?php the_sub_field('filter_title'); ?></span><br/><?php the_sub_field('filter_description'); ?></td>
											<td class="item-price"><?php the_sub_field('filter_cost'); ?></td>
											<td class="item-qty"><input type="text" name='item-qty' id='item-qty' /></td>
										</tr>
									<?php endwhile; ?>				
								</table>
								<div class="submit-filter"><input class="btn-submit-mid" type="submit" value="Add Filter"></div>
							</div>
						</div>
						<div class="water-panels">
							<div class="header"><h4>Water Panels &amp; Humidifier Parts</h4></div>
							<div class="content clearfix">
								<table id="table-water">
									<tr class="tb-head">
										<th width="12%">Item</th>
										<th width="60%">Decription</th>
										<th width="12%">Price</th>
										<th width="12%">Quantity</th>
									</tr>
									<?php while(the_repeater_field('water_panels')): ?>
										<tr class="item-single-water">
											<td class="item-img"><img src="<?php the_sub_field('water_image'); ?>" alt="<?php the_sub_field('water_part_number'); ?>" /></td>
											<td class="item-desc"><span><?php the_sub_field('water_title'); ?></span><br/><?php the_sub_field('water_description'); ?></td>
											<td class="item-price"><?php the_sub_field('water_cost'); ?></td>
											<td class="item-qty"><input type="text" name='item-qty' id='item-qty' /></td>
										</tr>
									<?php endwhile; ?>	
								</table>
								<div class="submit-water"><input class="btn-submit-mid" type="submit" value="Add Filter"></div>
							</div>
						</div>
					</div>
					<div class="order-steps step3">
						<div class="header"><h4>Contact Information</h4></div>
						<div class="your-info">
							<?php echo do_shortcode( '[contact-form-7 id="594" title="Filter Order"]' ); ?>				
						</div>
						<div class="form-thanks">
							<?php the_field('order_thanks'); ?>
						</div>
					</div>
				</div>
				<div class="back-top"><a id="takeBack">back to top</a></div>
			</div>
		</div>
		<div class="holder-right">
			<?php include(TEMPLATEPATH."/includes/sidebar-interior.php");	?>
		</div>
		<div class="clear"></div>
	</div>
</div>		


<script type="text/javascript">
	filterPageActions();
</script>		
		
<?php get_footer(); ?>