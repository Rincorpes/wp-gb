<section id="gb-front-page-sidebar" class="col-md-4">
	<?php if ( ! dynamic_sidebar( 'front-page' ) ) : ?>

		<?php gb_get_ad('sidebar', 'square', 'chitika'); ?>

		<?php gb_get_widget('donate'); ?>

		<?php gb_get_widget('coindesk'); ?>
		
		<?php gb_get_ad('sidebar', 'vertical'); ?>

		<?php gb_get_widget('twitter-feed'); ?>

	<?php endif; ?>
</section>