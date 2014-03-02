<?php

$filename = $_GET['filename'];

if (!empty($_GET['height']) && is_numeric($_GET['height'])) {
	$height = $_GET['height'];
} else { $height = "100%"; }

if (!empty($_GET['width']) && is_numeric($_GET['width'])) {
	$width = $_GET['width'];
} else { $width = "100%"; }

if (!empty($_GET['bgcolor']) && is_numeric($_GET['bgcolor'])) {
	$bgcolor = $_GET['bgcolor'];
} else { $bgcolor = "FFFFFF"; }

?>
<html>
	<head>
		<title>A Look Inside</title>
		<link rel="stylesheet" type="text/css" href="/res/includes/styles_global.css" />
	</head>
	<body>
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="<%= iWidth %>" height="<%= iHeight %>">
		  <param name="movie" value="<?php echo $filename ?>" />
		  <param name="quality" value="high" />
		  <param name="menu" value="false" />
		  <param name="bgcolor" value="#<?php echo $bgColor ?>" />
		  <embed src="<?php echo $filename ?>" quality="high" bgcolor="#<?php echo $bgColor ?>" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="<?php echo $width ?>" height="<?php echo $height ?>"></embed>
		</object>
	</body>
</html>