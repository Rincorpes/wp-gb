	<!--?php /* Template Name: contact */ ?-->

	<?php get_header(); ?>

	<div id="gb-main-content">
		<div class="container">
			<div id="gb-contact-content">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header>
							<h1><?php the_title(); ?></h1>
						</header>
						<div class="the-content">
							<?php the_content(); ?>
						</div>
						<footer>			
							<?php edit_post_link( __( 'Editar', 'gb' ), '<p class="edit">', '</p>' ); ?>
						</footer>
					</article>
							
				<?php endwhile; ?>
			</div>
		</div>
	</div>

	<?php get_footer(); ?>