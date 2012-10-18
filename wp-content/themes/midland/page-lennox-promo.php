<?php
 /* Template Name:Lennox Promo*/
?>

<?php get_header(); 
	  $APIKEY = 'JaYJDhy';
?>

<div id="page" class="wrapper">
	<div class="center">
		<div class="content-right">
			<div class="main-content">

			<?php
				//Lennox.com Product API URL for Product Categories
				//LIVE PROMO API URL - will return promo ONLY IF one is currently active
				$api_url = "http://lennox.com/api/v1/" . $APIKEY . "/promotions/";	

				//use the handy SimpleXML file loader
				$xml = simplexml_load_file($api_url);
				//SimpleXML will either return FALSE is unsuccessful
				//or an XML object if successful.
				if ($xml) {
			
					if ($xml->Promotion) {
						$promo = $xml->Promotion;
						
			?>

            <div id="Promo">
			<?			if ($promo->Page->Headline): ?>					
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
			<?php
					} //if Promo
			
				} else {
					echo "There has been an error retrieving the XML.";
					exit();
				}
			
			?>
				
				
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