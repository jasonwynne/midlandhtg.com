<?php
 /* Template Name: Interior North*/

 get_header(); 

?>


<div id="interior-page" class="wrapper default-interior">
	<div class="center">
		<div class="holder-left">
			<div class="main-content">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				  <?php the_content(); ?>
				<?php endwhile; wp_reset_query(); ?>	
				<div class="back-top"><a id="takeBack">back to top</a></div>
			</div>
		</div>
		<div class="holder-right">
			<?php include(TEMPLATEPATH."/includes/sidebar-interior.php");	?>
		</div>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div>
</div>		
		
		
<?php get_footer(); ?>