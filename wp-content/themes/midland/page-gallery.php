<?php
 /* Template Name:Gallery*/
?>

<?php get_header(); ?>

<div id="page" class="wrapper default-template">
	<div class="center">
		<div class="content-holder-gallery">
			<div class="main-content">
				<h1><?php the_field('gallery_title'); ?></h1>
				<div class="gallery-image-holder">
					<?php while(the_repeater_field('gallery_images')): ?>
						<div class="gallery-image-single">
							<img src="<?php the_sub_field('gallery_image'); ?>" alt="<?php the_sub_field('gallery_image_title'); ?>"/>
							<div class="gallery-caption">
								<div class="caption-arrow">close caption</div>
								<?php the_sub_field('gallery_image_caption'); ?>
							</div>
						</div>
					<?php endwhile; ?>	
				</div>	 
				<div class="gallery-thumb-holder">
					<ul class="clearfix"></ul>
				</div>
				<?php the_field('gallery_bottom_content'); ?>
				<div class="back-top"><a id="takeBack">back to top</a></div>
			</div>
		</div>

		<div class="clear"></div>
	</div>
</div>		

<script type="text/javascript">
	galleryPageActions();
</script>


		
<?php get_footer(); ?>