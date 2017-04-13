	<footer id="gb-footer">
		<div class="container">
			<div class="footer-content row">
				<div class="footer-advertise col-md-4">
					<h3><?php echo __('Publicidad', 'gb'); ?></h3>
					<?php gb_get_ad('footer', 'square', 'chitika'); ?>
				</div>

				<?php gb_get_widget('tags'); ?>

				<div class="footer-navbar col-md-4">
					<h3><?php echo __('Enlaces de Interés', 'gb'); ?></h3>
					<?php wp_nav_menu( array('theme_location' => 'footer-nav')); ?>
				</div>
			</div>
			<div class="footer-info">
				<p>
					Sitio desarrollado por <a href="https://twitter.com/rincorpes">Rincorpes</a> con tecnología <a href="http://wordpress.org">Wordpress.org</a><br />
					© <a href="http://www.ganemosbits.trade">Ganemosbits</a> 2016 - <?php echo date('Y'); ?>
				</p>
			</div>
		</div>
	</footer>
	<!-- gb-footer -->

	<!--[if lt IE 7 ]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/libs/dd_belatedpng.js"></script>
		<script> DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->

	<?php wp_footer(); ?>
</body>

</html>