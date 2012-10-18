<?php
 /* Template Name:Lennox Products*/
?>

<?php get_header(); ?>


<div id="page" class="wrapper">
	<div class="center">
		<div class="content-right">
			<div class="main-content">
				<?php the_field('top_page_copy'); ?>	
				<?php include(TEMPLATEPATH."/includes/lennox-product.php");	?>
				<?php the_field('bottom_page_copy'); ?>
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