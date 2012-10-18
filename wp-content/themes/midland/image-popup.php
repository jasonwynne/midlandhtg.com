<?php
	$filename = $_GET["filename"];
?>
    <head>
        <title>Photo Enlargement</title>
        <link rel="stylesheet" type="text/css" href="/res/includes/styles_global.css" />
		<script type="text/javascript">
			<!--//
				function onLoad() {
					ThePhoto = document.getElementById("Photo");
					TheHeight = ThePhoto.height;
					TheWidth = ThePhoto.width;
					TheHeight = (TheHeight > 570)?570:TheHeight+25;
					TheWidth = (TheWidth > 775)?775:TheWidth+25;
					window.resizeTo(TheWidth,TheHeight);
				}
				window.onload = onLoad;
			//-->			
		</script>
    </head>

    <body class="Popup">
        <div style="text-align: center;"><img id="Photo" src="<?php echo $filename ?>" alt="this image" border="0" /></div>
    </body>
</html>
