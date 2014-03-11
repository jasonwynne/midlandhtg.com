<?php
 /* Template Name:Lennox Promo*/



$APIKEY = 'JaYJDhy';
	  
//Lennox.com Product API URL for Product Categories
//LIVE PROMO API URL - will return promo ONLY IF one is currently active
$api_url = "http://lennox.com/api/v1/" . $APIKEY . "/promotions/";	

//use the handy SimpleXML file loader
$xml = simplexml_load_file($api_url);
//SimpleXML will either return FALSE is unsuccessful
//or an XML object if successful.
$isLennoxPromo = $xml->Cached;
				
get_header();			
	  
?>

<div id="page" class="wrapper">
	<div class="center">
		<div class="holder-left">
			<div class="main-content">

			<?php 
			 if ($xml) {

					if ($xml->Promotion) {
						$promo = $xml->Promotion; ?>

            <div id="Promo">
			      <? if ($promo->Page->Headline): ?>					
										<h1><?=$promo->Page->Headline?></h1>
			<?			endif; ?>
			<?			if ($promo->Page->Image): ?>
							<br /><img src="<?=$promo->Page->Image?>" alt="" width="100%"><br />
			<?			endif; ?>
			
			<?			if ($promo->Page->Body): ?>
											<?=$promo->Page->Body?>
			<?			endif; ?>								
			<?			if ($promo->Page->Details): ?>
											<?=$promo->Page->Details?>
			<?			endif; ?>                            
			<?			if ($promo->Page->Disclaimer): ?>
											<?=$promo->Page->Disclaimer?>
			<?			endif; ?>                            
									</div>
									
			<?php }else{ ?>
			
			
			  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				  <?php the_content(); ?>
				<?php endwhile; wp_reset_query(); ?>	
				<?php if(get_field('int_sidebar', 'options')): ?>
    <div class="side-image-links">
  
    <?php while(has_sub_field('int_sidebar', 'options')): 
      $siImage = get_sub_field('si_image', 'options'); 
    
      $pageLink = get_sub_field('page_link', 'options'); 
      $offLink = get_sub_field('offsite_link', 'options');  
    
      if($pageLink !=""){
        $hasLink = $pageLink;
        $linkType = "page";
      }elseif($offLink !=""){
        $hasLink = $offLink;
        $linkType = "offsite";
      }else{
         $hasLink = "";
      }
    
   
    
      if($hasLink != ""){
      ?>
      <div class="li-single sin-linked promo-page-single" data-link="<?php echo $hasLink ?>" data-type="<?php echo $linkType ?>">
        <img alt="<?php echo $siImage['alt']; ?>" title="<?php echo $siImage['title']; ?>" src="<?php echo $siImage['url']; ?>" />
      </div>
      <?php }else{ ?>
      <div class="li-single promo-page-single">
        <img alt="<?php echo $siImage['alt']; ?>" title="<?php echo $siImage['title']; ?>" src="<?php echo $siImage['url']; ?>" />
      </div>
      <?php } ?>
    <?php endwhile; ?>
    <div class="clear"></div>
    </div>
    <?php endif; ?>	  
					  
					  
		  <?php } //if Promo
			
				} else {
					echo "There has been an error retrieving the XML.";
					exit();
				}
			
			?>
				
			<div></div>	
			<div class="back-top"><a id="takeBack">back to top</a></div>		
			</div>
		</div>
		<div class="holder-right">
			<?php include(TEMPLATEPATH."/includes/sidebar-interior.php");	?>
		</div>
		<div class="clear"></div>
	</div>
</div>		
		
		
<?php get_footer(); ?>