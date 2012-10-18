<?php
 /* Template Name:Testamonials*/
?>

<?php get_header(); ?>

<div id="page" class="wrapper default-template">
	<div class="center">
		<div class="content-right">
			<div class="main-content">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				  <?php the_content(); ?>
				<?php endwhile; wp_reset_query(); ?>
				
				<?php while(the_repeater_field('testimonials')): ?>
				<div class="testimonial-holder">
					<img class="quotes" src="<?php bloginfo('template_directory'); ?>/images/testimonials/quotes-smaller.png" alt="quotes"/>
					<div class="testimonial-copy"><?php the_sub_field('testimonial_copy'); ?></div>
					<div class="testimonial-author"><?php the_sub_field('testimonial_author'); ?></div>
				</div>	
				<?php endwhile; ?>	
				
				<?php the_field('testimonal_bottom_content'); ?>
				<div class="back-top"><a id="takeBack">back to top</a></div>
			</div>
		</div>
		<div class="content-left">
			<?php include(TEMPLATEPATH."/includes/sidebar-all.php");	?>
		</div>
		<div class="clear"></div>
	</div>
</div>		
		
		
<?php get_footer(); ?>