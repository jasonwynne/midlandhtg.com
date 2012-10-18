<!-- form section of footer -->
<div id="footer" class="wrapper top">
	<div class="center">
		<div class="form-holder">
			<?php the_field('form_head', 'options'); ?>
			<?php echo do_shortcode( '[contact-form-7 id="4" title="Footer Contact Form"]' ); ?>
			<div class="clear"></div>
			<div class="footer-thanks"><p>Thank You for the request, we will get back to you shortly.</p></div>
		</div> 
		<div class="clear"></div>
	</div>
</div>

<!-- middle section of footer -->
<div id="footer" class="wrapper middle">
	<div class="center">
		<div class="product-holder">
			<ul>
				<li><a class="logo-lennox" href="http://www.lennox.com/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/footer/logo-lennox.gif" alt="Check out our Lennox Selection" /></a></li>
				<li><a class="logo-honeywell" href="http://yourhome.honeywell.com/home/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/footer/logo-honeywell.gif" alt="Check out our Honeywell Selection" /></a></li>
				<li><a class="logo-aprilaire" href="http://www.aprilaire.com/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/footer/logo-aprilaire.gif" alt="Check out our Aprilaire Selection" /></a></li>
				<li><a class="logo-slantfin" href="http://www.slantfin.com/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/footer/logo-slant.gif" alt="Check out our SlantFin Selection" /></a></li>
				<li><a class="logo-unico" href="http://www.unicosystem.com/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/footer/logo-unico.gif" alt="Check out our Unico Selection" /></a></li>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="holder-middle-content">
			<div class="holder-neighborhoods">
				<h5>Servicing your neighborhood</h5>
				<div class="hood-list list-num-1"><?php the_field('neighborhood_list_01', 'options'); ?></div>
				<div class="hood-list list-num-2"><?php the_field('neighborhood_list_02', 'options'); ?></div>
				<div class="hood-list list-num-3"><?php the_field('neighborhood_list_03', 'options'); ?></div>
				<div class="clear"></div>
			</div>
			<div class="holder-resources">
				<h5>Resources:</h5>
				<?php wp_nav_menu( array( 'menu' => 'resources-menu' ) );?>
			</div>
			<div class="holder-contactinfo">
				<h5>Contact Us</h5>
				<?php the_field('contact_info', 'options'); ?>
				<div class="holder-cc">
					<img src="<?php bloginfo('template_directory'); ?>/images/footer/icon-visa.jpg" alt="We Accept Visa" />
					<img src="<?php bloginfo('template_directory'); ?>/images/footer/icon-mastercard.jpg" alt="We Accept Mastercard" />
					<img src="<?php bloginfo('template_directory'); ?>/images/footer/icon-discover.jpg" alt="We Accept Discover" />
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<!-- Bottom section of footer -->
<div id="footer" class="wrapper bottom">
	<div class="center">
		<div class="copyright">&copy; <?php echo date("Y"); ?> Midland Heating &amp; Air Conditioning, Inc. All Rights Reserved. </div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>