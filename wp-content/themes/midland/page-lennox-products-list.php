<?php
 /* Template Name:Lennox Products List*/
?>

<?php get_header(); ?>

<?php $APIKEY = 'JaYJDhy';

//fetch CATEGORY NUMBER from querystring													'
if (!empty($_GET['cat'])) { $category_id = $_GET["cat"]; }
else { echo "This script requires a valid category ID."; exit(); }

?>



<div id="page" class="wrapper">
	<div class="center">
		<div class="content-right">
			<div class="main-content">
<?php

	//Lennox.com Product API URL for Product Categories
	$api_url = "http://www.lennox.com/api/v1/".$APIKEY."/category/".$category_id;

	//use the handy SimpleXML file loader
	$xml = simplexml_load_file($api_url);

	//SimpleXML will either return FALSE is unsuccessful
	//or an XML object if successful.
	if ($xml) {

		if ($xml->Category) {
?>
			<!-- <h2><?php echo $xml->Category ?></h2> -->

<?php
			foreach ($xml->SubCategory as $subcat) {
?>
				<h3><?php echo $subcat->SubCategoryName ?></h3>

				<!--START Product Table-->
				<table class="Products" cellpadding="0" cellspacing="0">
					<thead>
						<tr valign="bottom">
							<th width="50%">

<?php
				if ($subcat->ContainsEnergyStar == "Yes") {
?>
								<img src="http://lennox.com/res/skins/2007/images/icon_estar.gif" alt="ESTAR ICON" height="12" width="12"> ENERGY STAR<sup>&reg;</sup> Product

<?php
				} else {
?>
								Products
<?php
				}
?>
							</th>
							<th width="10%">&nbsp;</th>

<?
				$columns = 3;

				if (count($subcat->CategoryRatings->CategoryRating)) {
					foreach ($subcat->CategoryRatings->CategoryRating as $rating) {
						$columns++;
?>
							<th width="25%"><?php echo $rating->Name ?></th>
<?php
					} //foreach Rating
				} // if Ratings
?>


							<th width="15%">Price Guide</th>
						</tr>
					</thead>
					<tbody>
<?php
				$j = 0;

				//now, list each PRODUCT in our XML feed
				foreach ($subcat->Product as $product) {

?>
						<tr class="<?php echo ($j%2) ? ' Odd':' Even'?>" valign="bottom">
							<td class="<?php echo ($product->attributes()->EnergyStar=="Y") ? 'energyStar':'' ?>">
<?php
					if ($product->attributes()->EnergyStar == "Y") {
?>
								<img src="http://lennox.com/res/skins/2007/images/icon_estar.gif" alt="ESTAR ICON" height="12" width="12">
<?php
					}
?>

								<a href="<?php echo home_url( '/' ); ?>lennox-product-detail?product=<?php echo $product->ModelNumber ?>" class="NoUnderline">
								<?php echo $product->ModelName ?>
								</a>
							</td>
							<td><?php echo ($product->attributes()->New == "Y") ? 'NEW':'&nbsp;' ?></td>
<?php						if (count($subcat->CategoryRatings->CategoryRating)) {
								foreach ($subcat->CategoryRatings->CategoryRating as $CategoryRating) {
									$foundRating = false;
									$crType = strtoupper(trim($CategoryRating->attributes()->Type));
									//if we have ratings to display
									if (count($product->Ratings->Rating)) {
										foreach ($product->Ratings->Rating as $rating) {
											$rType = strtoupper(trim($rating->attributes()->Type));
											if ($rType == $crType) { ?>
												<td><?php echo $rating ?>&nbsp;
<?php												if (strtoupper(trim($rating->attributes()->Type)) == "SOUND") { ?>
														dB
<?php												} ?>
												</td>
<?php											$foundRating = true;
											}
										}
										if ($foundRating == false) { ?>
											<td>&nbsp;</td>
<?php									}
										$foundRating = false;
									//if this product does not have the ratings that are specified
									//by the Category, then show a blank table cell
									} else { ?>
										<td colspan="<?php echo count($subcat->CategoryRatings->CategoryRating) ?>">&nbsp;</td>
<?php								}//if Product Ratings

								} // foreach CategoryRating
							} // if CategoryRating ?>
							<td><?php echo ($product->PriceGuide) ? $product->PriceGuide : '&nbsp;' ?></td>
						</tr>
						<tr class="PadBot<?php echo ($j%2) ? ' Odd':' Even' ?>" valign="top">
							<td colspan="<?php echo $columns ?>" class="OneLiner"><?php echo $product->OneLiner ?>&nbsp;</td>
						</tr>
<?php
					$j++;
				} //foreach product
?>
						</tbody>
					</table>
<?php
			} //foreach SubCat


		} //if Category

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