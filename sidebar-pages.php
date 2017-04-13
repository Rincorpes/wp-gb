<section id="gb-main-sidebar" class="col-md-4">
	<?php if ( ! dynamic_sidebar( 'pages' ) ) : ?>

		<?php gb_get_widget('subscribe', 'sidebar'); ?>

		<?php gb_get_widget('social-buttons'); ?>

		<?php gb_get_ad('sidebar', 'square'); ?>

		<?php gb_get_widget('donate'); ?>

	<?php endif; // end sidebar widget area ?>
</section>