<?php 

$my_pdf = $_GET["pdf"];

header('Content-disposition: attachment; filename='.$my_pdf.'.pdf');
header('Content-type: application/pdf');
readfile('pdf/'.$my_pdf.'.pdf');

	
	
?>