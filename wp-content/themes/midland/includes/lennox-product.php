<!-- this is the insert for products -->

<?php global $post; 
	if ( is_page( 'Furnaces' ) ) { 
		$productID = 2;
	} elseif ( is_page( 'Air Conditioner' )) {
		$productID = 1;	
	} else { 
	
	} 
?>

<?php 	$APIKEY = 'JaYJDhy';

		//Lennox.com Product API URL for Product Categories
		$api_url = "http://www.lennox.com/api/v1/".$APIKEY."/categories/";
		
		//use the handy SimpleXML file loader
		$xml = simplexml_load_file($api_url);
?>

	
<div class="lennox-product-holder">

			<?php

				//SimpleXML will either return FALSE is unsuccessful
				//or an XML object if successful.
				if ($xml) {
				
					if ($xml->Error) {
						echo "ERROR: ".$xml->Error;
						exit();
					}
				
					foreach($xml->Category as $category) {
						if($category->attributes()->ID == $productID){
				?>
				
				<div class="Category">
					<div class="holder-left">
						<?php if ($category->HighlightImage) { ?>
							<img class="high-image" src="<?php echo($category->HighlightImage) ?>" alt="<?php echo($category->CategoryName) ?>">
						<?php } //if HighlightImage ?>
					</div>
					<div class="holder-right">
						<h2><a href="<?php echo home_url( '/' ); ?>lennox-product-list?cat=<?php echo($category->attributes()->ID) ?>">See our complete list of Lennox <?php echo($category->CategoryName) ?></a></h2>
						<?php if ($category->Products) { ?>
							<div class="ProductCount">Contains <?php echo($category->Products) ?> Products &nbsp;<a href="<?php echo home_url( '/' ); ?>lennox-product-list?cat=<?php echo($category->attributes()->ID) ?>">view list</a></div>
						<?php } //if we have a Product Count ?>
						<div class="Description"><p><?php echo($category->ShortDescription) ?></p></div>
					</div>

	
				</div><!--//end Category-->
				<?php 	}//end catID if
					} //foreach Category
				
					} else {
						echo "There has been an error retrieving the XML.";
						exit();
					}
				?>
			
			
	<div class="clear"></div> 
</div>