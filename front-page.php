	<?php get_header(); ?>

	<div id="gb-main-content">
		<div class="container">
			<div class="row">
				<section id="gb-front-page-content" class="col-md-8">
					
					<?php get_template_part('gb-slider') ?>

					<?php gb_get_ad('main', 'horizontal'); ?>

					<?php get_template_part('older-posts') ?>

					<?php gb_get_ad('main', 'horizontal'); ?>

					<div id="gb-edu" class="row">
						<div class="gb-edu-video col-md-6">
							<h3>¿Qué es Bitcoin?</h3>
							<p>Aprende todo lo que implica la red Bitcoin en un video</p>
							<figure>
								<iframe width="560" height="315" src="https://www.youtube.com/embed/Gc2en3nHxA4" frameborder="0" allowfullscreen></iframe>
								<figcaption>
									Video Subtitulado de <a href="http://weusecoins.com" title="weusecoins.com">weusecoins.com</a>
								</figcaption>
							</figure>
						</div>
						<div class="gb-edu-navbar col-md-6">
							<h3>Educate</h3>
							<?php wp_nav_menu( array('theme_location' => 'edu-nav')); ?>
						</div>
					</div>

					<?php  ?>
					<div id="gb-comunity" class="row">

						<?php gb_get_widget('subscribe'); ?>

						<div class="gb-comunity-fb-plugin col-md-6">
							<?php gb_get_widget('fb-bio'); ?>
						</div>
					</div>
				</section>

				<?php get_sidebar('front-page'); ?>
			</div>
		</div>
	</div>
	<!-- gb-main-content -->

	<?php get_footer(); ?>