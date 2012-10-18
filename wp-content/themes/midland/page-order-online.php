<?php
 /* Template Name:Online Ordering*/
?>

<?php get_header(); ?>

<div id="page" class="wrapper default-template">
	<div class="center">
		<div class="content-holder-all">
			<div class="main-content order-content">
				<h1><?php the_title(); ?></h1>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				  <?php the_content(); ?>
				<?php endwhile; wp_reset_query(); ?>
		
		
			</div>
		</div>
	</div>
</div>		


<script type="text/javascript">
	orderPageActions();
</script>		
		
<?php get_footer(); ?>