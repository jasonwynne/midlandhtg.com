<?php 

require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
include_once('phpToPDF.php');
		
$html = '<!DOCTYPE html>
					<html lang="en">
					<head>
						<meta charset="utf-8">
						<title>Midland Heating & Air Conditioning Invoice</title>
						<style type="text/css">
							<!--
								body {width: 650px;font-family: arial, san-serif;font-size: 12px;color: #666666;}	
								div {position: relative;}		
								.clear {clear: both;display: block;height: 0;overflow: hidden;visibility: hidden;width: 0;}	
								p{margin:0;padding:0;}
								#header img{float:left;}
								.right-holder {float: right;}
								.date{font-size:15px;text-align:right; }	
								.address{font-size:13px;line-height: 17px; padding: 0;text-align:right; }
								.tagline{color: #FF0012;font-size: 15px;padding:0 0 20px 40px; font-weight: bold; }
								.order-head{background: #e1e1e1;border:1px solid #666;color:#000;}
								.order-head p{margin: 3px 0;}
								.order-head-right{float: left; width:55%; padding:2%; }
								.order-head-left {float: left; width:37%; padding:2%; }
								.order-head-right p {float: left;}
								.addy-holder {padding: 0 5px;}
								.order-main {margin: 10px;}
								table {border:1px solid #666; margin: 15px 0px; padding:0;}
								th { padding: 1% 2%; border-bottom: 1px solid #666; margin:0;}
								td {padding: 1% 2%; }
								tfoot td{font-weight: bold; border-top: 1px solid #666;}
								.order-terms {margin: 20px 0;}
								.order-terms h3 {padding: 0 0 10px 0; border-bottom: 1px solid #666;}
								ol {padding: 5px 15px 5px 30px; margin:0;}
								ol li {padding: 3px 0;font-size:11px;}
							-->
						</style>
					</head>
					<body>
						<div id="header">
							<img src="images/print/header-logo.jpg"/>
							<div class="right-holder">
								<div class="address">the date goes here<br/>413 W 60th Street<br/>Minneapolis, MN 55419<br/>612-869-3213</div>
							</div>
							<div class="clear"></div>
							<div class="tagline">Warming Winter & Cooling Summer Since 1950</div>
						</div>  
						<div class="order-holder">
							<div class="order-head">
								<div class="order-head-left">
									<p><b>Name:</b> Jason Wynne</p>
									<p><b>Phone:</b> 651-491-5774</p>
								</div>
								<div class="order-head-right">
									<p><b>Address:</b></p>
									<p class="addy-holder">4601 Wentworth Ave<br/>Minneapolis, MN 55419</p>
								</div>
								<div class="clear"></div>
							</div>
							<div class="order-main">
								<p>WE WILL FURNISH AND INSTALL - IN ACCORDANCE WITH MANUFACTURERS SPECIFICATIONS INCLUDING ALL SHEET- METAL REVISIONS/ELECTRICAL/GASLINE UPGRADES/PERMIT/REMOVE OLD EQUIPMENT</p>
								<table width="100%" >
									<thead>
										<tr>
											<th width="20%" style="text-align: left;">Product Type</th>
											<th width="50%" style="text-align: left;">Product Name</th>
											<th style="text-align: left;">Cost</th>
										<tr>
									</thead>
									<tfoot>
										<tr>
											<td colspan=2 style="text-align: right;">Total:</td>
											<td>$5354.00</td>
										</tr>
									
									</tfoot>
									<tbody>
											<tr>
												<td>Furnace</td>
												<td>Lennox SLP98UH070XV36B</td>
												<td>$3970.00</td>
											</tr>
											<tr>
												<td>Furnace</td>
												<td>Lennox SLP98UH070XV36B</td>
												<td>$3970.00</td>
											</tr>		
									</tbody>
					
								</table>
							</div>
							<div class="order-terms">
								<h3>TERMS & CONDITIONS FOR Midland Heating & A/C Contracts</h3>
								<ol>
									<li>Acceptance of this Proposal by Buyer shall be acceptance of all terms and conditions recited herein or incorporated by reference. Allowing the Seller to commence work or preparation for work will constitute acceptance by Buyer of this Proposal and all its terms and conditions. Quotations herein, unless otherwise stated, are for immediate acceptance and subject to change.</li>
									<li>No back charges or claim of the Buyer for services shall be valid except by the agreement in writing by the Seller before work is executed.</li>
									<li>A FINANCE CHARGE of 2% per month which is an ANNUAL PERCENTAGE RATE OF 24% will be charged on all past due balances. All costs of collection, including reasonable attorney’s fees, shall be paid by the Buyer.</li>
									<li>If the Buyer fails to make payment to the Seller as herein provided, then the Seller may stop work without prejudice to any other remedy he may have.</li>
									<li>The Buyer is to prepare all work areas so as to be acceptable for the Seller’s work under contract. Seller will not be called upon to start work until sufficient areas are ready to insure continued work until job completion.</li>
									<li>After acceptance of this Proposal as provided. Seller shall be giving a reasonable time in which to make delivery of materials and/or labor to commence and complete the performance of the contract. Seller shall not be responsible for delays or defaults where occasioned by any causes of any kind and extent beyond its control, including by not limited to: delays caused by the owner, general contractor, architect and/or engineers; armed conflict or economic dislocation resulting there from; embargo, shortages of labor, raw materials production facilities or transportation: labor difficulties, civil disorders of any kind; action of civil or military authorities: vendor priorities and allocations, fires, floods, accidents and acts of god.</li>
									<li>All workmanship is guaranteed against defects in workmanship for a period of 1 year from the date of installation. THIS WARRANTY IS IN LIEU OF ALL OTHER WARRANTIES EXPRESSED OR IMPLIED INCLUDING ANY WARRANTIES OF MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE. Seller will not be responsible for special, incidental, or consequential damages. Seller shall not be responsible for damages to its work by other parties. Any repair work necessitated by caused damage will be considered as an order for extra work. Our responsibility for damage or loss on transit ceases upon delivery in good condition to a public carrier.</li>
									<li>Work called for herein is to be preformed during Seller’s regular working hours. Overtime rates will be charged for all work performed outside such hours at extra costs.</li>
									<li>Not withstanding any provision contained in this Proposal or the contract documents between Owner and Contractor. Seller may file a lien or claim on its behalf in the event that any payment to Seller is not made as when provided for by the agreement. </li>
									<li>It is understood and agreed that title to all equipment and materials shall remain with the Seller, until the amount due per contract is paid in full by Buyer. If Buyer fails to make payments as required, the Seller may remove any or all equipment and materials from the Buyer’s premises and retain any payments made. The Buyer shall also be liable for any additional damages suffered by Seller for the removal of equipment and materials. The property covered shall remain personal property whether placed on a permanent foundation or affixed or attached to building or structure. Buyer hereby gives full consent to the Seller to have free access into and out of the premise for the purpose of removal of equipment and materials hereunder.</li>
									<li>The Buyer shall make no demand for liquidated damages for delays or actual damages for delays in any sum in excess of such amount as may be specified named in the Proposal and no liquidated damages may be assessed against the Seller for delays or causes attributed to other contractors or arising outside the scope of this Proposal. </li>
									<li>Buyer shall purchase and maintain property insurance upon the full value of the entire work/ and/or materials to be supplied which shall include the interest of the Seller. </li>
									<li><b>You have directly contracted with Midland Heating and Air Conditioning to do HVAC work at your home. Please be advised that any person or company supplying labor or materials for an improvement to your property may file a lien against your property if that person or company is not paid for their contributions. As sole supplier of labor and materials on this project and because we have contracted directly with you for the improvement to your property, we are not required to provide pre-lien notice under Minnesota Law. Please be advised that if we are not paid for our services, we will file a lien against your property for the price of our services.</b></li>
									<li>In addition to warranty stated in item 7, we offer a 5 or 10 year parts and labor warranty on new equipment we install. The customer pays a small annual fee for us to tune-up and inspect the equipment.</li>
								</ol>
							
							
							</div>
						</div>
					
						
					</body>
					</html>'	


		//$fileTitle = strtolower($title);
		//$filePDFName = str_replace(' ', '-',$fileTitle );
		
		
		$filePDFName = 'wynne-order';
			
		unlink("pdf/" .$filePDFName.'.pdf');
			
		phptopdf_html($html, 'pdf/',  $filePDFName.'.pdf');
		$isThere = file_exists('pdf/' .$filePDFName.'.pdf');					


?>