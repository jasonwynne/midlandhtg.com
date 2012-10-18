<?php
  global $post; 
  if ( is_page('products') || is_page( 'special-offers' )) {
  	$pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order");
  	$firstchild = $pagekids[0];
    wp_redirect(get_permalink($firstchild->ID));
  }

 get_header(); 

?>


<div id="page" class="wrapper default-template">
	<div class="center">
		<div class="content-right">
			<div class="main-content">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				  <?php the_content(); ?>
				<?php endwhile; wp_reset_query(); ?>	
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