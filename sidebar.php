<section id="gb-main-sidebar" class="col-md-4">
	<?php if ( ! dynamic_sidebar( 'main-sidebar' ) ) : ?>

		<?php gb_get_widget('subscribe', 'sidebar'); ?>

		<?php gb_get_widget('social-buttons'); ?>

		<?php gb_get_widget('categories'); ?>

		<?php
		if (is_home())
			gb_get_ad('sidebar', 'square', 'chitika');
		else
			gb_get_ad('sidebar', 'square');
		?>

		<?php gb_get_widget('donate'); ?>

		<?php gb_get_widget('coindesk'); ?>

		<?php gb_get_ad('sidebar', 'vertical'); ?>

	<?php endif; // end sidebar widget area ?>
</section>