<?php
 /* Template Name:Lennox Calculator*/
?>

<?php  get_header(); ?>

<?php $APIKEY = 'JaYJDhy';

//fetch MODEL from querystring													'
if (!empty($_GET['product'])) { $product_id = $_GET["product"]; }
else { echo "This script requires a valid model ID."; exit(); }

?>


<div id="page" class="wrapper">
	<div class="center">
		<div class="content-right">
			<div class="main-content">
			<?php
			//Lennox.com Product API URL for Product Categories
			$api_url = "http://www.lennox.com/api/v1/".$APIKEY."/product/".$product_id;
		
			//use the handy SimpleXML file loader
			$xml = simplexml_load_file($api_url);
		
			//SimpleXML will either return FALSE is unsuccessful
			//or an XML object if successful.
			if ($xml) {
		
				if ($xml->Product) {
					$product = $xml->Product;
			?>
						<div id="ProductInfo">
								<h2>
		
		<?php
						//does the product have a series (e.g. Dave Lennox Signature Collection)
						if ($product->Series) {
							//should we display the Series Name?
							if ($product->Series->attributes()->Display == "Y") {
		?>
							<?php echo $product->Series ?>&nbsp;
		<?php
							} //if Series is to be displayed
						} // if Series
		?>
						<?php echo $product->ModelName ?>
						</h2>
		
						<p class="oneliner"><?php echo $product->OneLiner ?></p>
		
						
		<?php
						//check for product features
						if ($product->Features) {
		
							//show each feature
							foreach ($product->Features->Feature as $feature) {
		?>
						<h4><?php echo $feature->Title ?></h4>
						<ul>
							<?php echo $feature->Body ?>
						</ul>
		<?php
							} //foreach Feature
		
						} //if Features
		
						//check for product features
						if ($product->Publications) {
		?>
						
		
		<?php
		
							//show each feature
							foreach ($product->Publications->Publication as $pub) {
		
		?>
								<a class="publication-pdf" href="<?php echo $pub->URL ?>">Click here to download the <?php echo $pub->Name ?> informational pdf</a><br />
		<?php
		
							} //foreach
		
						} // if Publications
		
						//check for product disclaimers
						
		
						//check for product features
						if ($product->Certifications) {
		?>
							<div class="cert-holder">
		
		<?php
		
							//show each feature
							foreach ($product->Certifications->Certification as $cert) {
		
		?>
							<img class="CertLogo" src="http://www.lennox.com/res/images/logo_<?php echo strtolower($cert->attributes()->Code) ?>.jpg" alt="<? echo $cert ?>" />
		<?php
		
							} //foreach
		
						} // if Certifications
		?>
						<div class="clear"></div>
						</div>
		<?php
			if ($product->Disclaimer) {
		?>
							<p class="disclaimer-head">Disclaimer</p>
							<p class="disclaimer"><?php echo $product->Disclaimer ?></p>
		<?php
						} // if Disclaimer
		
		?>
		
						</div><!--/end PRODUCT INFO div-->
		
		<?php
				} //if Product

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
			<div id="ProductPhoto">
						<div class="content">
							<a href="<?php echo $product->Images->LargeImage ?>" onclick="return EnlargePhoto(this.href);">
								<img src="<?php echo $product->Images->MediumImage ?>" alt="<?php echo $product->ShortName ?>" />
							</a>
							<br />&nbsp;<br />
							<a href="<?php echo $product->Images->LargeImage ?>" onclick="return EnlargePhoto(this.href);">View Larger</a>
							<br />

<?php
				//if this PRODUCT has an ANIMATION attached to it, then
				//show the ANIMATION POPUP link ("look inside")
				if ($product->Animations) {
					foreach ($product->Animations->Animation as $anim) {
?>
							<a href="<?php bloginfo('template_directory'); ?>/animation-popup.php?filename=<?php echo $anim->Filename ?>&amp;width=<?php echo $anim->Width ?>&amp;height=<?php echo $anim->Height ?>&amp;bgcolor=<?php echo $anim->attributes()->BGColor ?>" onclick="return popupWindow(this.href,<?php echo $anim->Width ?>,<?php echo $anim->Height ?>);">
								<?php echo $anim->Label ?>
							</a>
<?php
					} //foreach Anim
				} //if Anims
?>
						</div>
					</div><!--/end PRODUCTPHOTO div-->
		</div>
		<div class="clear"></div>
	</div>
</div>		
		
<script type="text/javascript">
		function basePopup(uri,width,height,winName,winArgs) {
			
			
			/* close existing popUp window */
			if (typeof(popUp) == "object") { if (typeof(popUp.window) == "object") { popUp.close(); }}

		    popUp = window.open(uri, winName, 'width=' + width + ',height=' + height + winArgs);

			/* attempt to focus the new window */
			if (typeof(popUp) == "object") {
				try {
				    popUp.focus();
				} catch(err) {
					return false;
				}
			}
			return false;
		}

		// A general-purpose popup window function
		function popupWindow(uri, width, height) {
		    var windowName = 'popup';
		    if(arguments.length > 3) {
		        windowName = arguments[3];
		    }
		    return basePopup(uri,width,height,windowName,',scrollbars=no,resizable=yes,menubar=no,toolbar=no,location=false,directories=no,status=no,menubars=no');
		}

		// A general-purpose popup window function with full chrome
		function popupScrollOnly(uri,width,height,windowName) {
			var baseURL = "<?php bloginfo('template_directory'); ?>/"+uri;
		    return basePopup(baseURL,width,height,windowName,',scrollbars=yes,resizable=yes,menubar=no,toolbar=no,location=no');
		}

		function EnlargePhoto(filename) {
		    return popupScrollOnly('image-popup.php?filename=' + filename,610,570,'photo');
		}

	</script>		
<?php get_footer(); ?>