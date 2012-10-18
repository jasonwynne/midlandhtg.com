<!-- this is the sidebar for every interior page -->
<div class="sidebar-left">
		<?php global $post; if ( is_page( 'services' ) || '19' == $post->post_parent ) { ?>
			<div class="menu-head">Services</div>
			<div class="sidebar-menu"><?php wp_nav_menu( array( 'menu' => 'menu-services' ) );?></div>
		<?php } elseif ( is_page( 'products' ) || '21' == $post->post_parent || is_page(317) || is_page(320)) { ?>
			<div class="menu-head">Products</div>
			<div class="sidebar-menu"><?php wp_nav_menu( array( 'menu' => 'menu-products' ) );?></div>
		<?php } elseif ( is_page( 'special-offers' ) || '25' == $post->post_parent ) {  ?>
			<div class="menu-head">Special Offers</div>
			<div class="sidebar-menu"><?php wp_nav_menu( array( 'menu' => 'menu-specials' ) );?></div>
		<?php } elseif ( is_page( 'about-midland' ) || '27' == $post->post_parent ) {  ?>
			<div class="menu-head">About Midland</div>
			<div class="sidebar-menu"><?php wp_nav_menu( array( 'menu' => 'menu-midland' ) );?></div>
		<?php } elseif ( is_page( 'financing' ) || '29' == $post->post_parent ) {  ?>
			<div class="menu-head">Financing</div>
		<?php } else { ?>
		
		<?php } ?>
</div>