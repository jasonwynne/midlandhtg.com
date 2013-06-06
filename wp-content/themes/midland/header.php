<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(''); ?></title>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php wp_head(); ?>

<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">  
<meta name="viewport" content="width=device-width, initial-scale=1.0, target-densitydpi=160">

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/global.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.timer.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ordering.js"></script>

<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie8.css" />
<![endif]-->

<!--[if lt IE 8]>
<script type="text/javascript">
$(document).ready(function() {
   alert('This site is optimized for IE8 and above. Some elements and features are not avalible in lower versions.');
});
</script>
<![endif]-->


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3023210-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</head>

<body <?php body_class(); ?>>

<div id="header" class="wrapper" name="top-of-page">
	<div class="center">
		<div class="logo"><a href="<?php echo home_url( '/' ); ?>">Midland Heating &amp; Air Conditioning Logo</a></div>
		<div class="top-menu">	
			<?php wp_nav_menu( array( 'menu' => 'menu-top' ) );?>
			<div class="head-tag">Your Neighborhood Heating and Cooling Company.</div>
			<div class="clear"></div>
		</div>	
		<div class="phone-holder">
			<a href="tel:6128693213">612-869-3213</br><span>Same Day Repair Service</span></a>
		</div>
		<div class="tagline">Warming Winter and Cooling Summer Since 1950</div>
		<div class="clear"></div>
		<div class="main-menu">
			<?php wp_nav_menu( array( 'menu' => 'main-menu' ) );?>
			<div class="clear"></div>
		</div>
		
	</div>
</div>
<div class="wrapper greyline"></div>