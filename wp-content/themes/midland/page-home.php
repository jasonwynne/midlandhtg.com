<?php
 /* Template Name:Home Page*/
?>
<?php get_header(); ?>

<div id="home-slideshow" class="wrapper">
	<div class="center">
		<div class="slideshow-counter">
			<ul>
				
			</ul>
		</div>
		<div class="holder-slideshow">
			<?php while(the_repeater_field('home_slideshow')): ?>
			<div class="slide <?php the_sub_field('slide_position'); ?>">
				<div class="slide-copy">
					<?php the_sub_field('slide_copy'); ?>
					<div class="btn-slide"><a href="<?php the_sub_field('slide_link'); ?>"><?php the_sub_field('button_text'); ?></a></div>
				</div>
				<div class="slide-image"><img src="<?php the_sub_field('slide_image'); ?>" alt="<?php the_sub_field('slide_title'); ?>" /></div>
			</div>
			<?php endwhile; ?>	
			<div class="clear"></div>
		</div>
		<div class="slideshow-replace">
			<a href="<?php the_field('home_mobile_link'); ?>">
			<div class="home-mobile-image"><img src="<?php the_field('home_mobile_image'); ?>" alt="<?php the_field('home_mobile_title'); ?>" /></div>
			<div class="home-mobile-copy"><?php the_field('home_mobile_copy'); ?></div>
			</a>
		</div>
	</div>
</div>		
<div id="page" class="wrapper">
	<div class="center">
		<div class="arrow-left"></div>
		<div class="arrow-right"></div>
		<div class="holder-widgets-cover">
			<div class="holder-widgets">
				<?php while(the_repeater_field('home_widgets')): ?>
					<div class="single-widget">
					<img src="<?php the_sub_field('widget_image'); ?>" alt="<?php the_sub_field('widget_image_title'); ?>"/>
					<div class="widget-copy">
						<h2><?php the_sub_field('widget_copy'); ?></h2>
						<a href="<?php the_sub_field('widget_link'); ?>"><?php the_sub_field('widget_link_copy'); ?></a>
					</div>
				</div>
				<?php endwhile; ?>	
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	widgetSlider();
</script>
		
<?php get_footer(); ?>