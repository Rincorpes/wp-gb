	<?php get_header(); ?>

	<div id="gb-main-content">
		<div class="container">
			<div class="row">
				<div id="gb-page-content" class="page col-md-8">

					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header>
								<h1><?php the_title(); ?></h1>
								<span class="glyphicon glyphicon-time"></span> <?php echo get_the_date(); ?>
							</header>
							<div class="the-content">
								<?php the_content(); ?>
							</div>
							<footer>			
								<?php edit_post_link( __( 'Editar', 'gb' ), '<p class="edit">', '</p>' ); ?>
							</footer>
						</article>
						
					<?php endwhile; ?>

					<?php gb_get_ad('main', 'horizontal'); ?>
				</div>

				<?php get_sidebar('pages'); ?>
			</div>
		</div>
	</div>
	
	<?php get_footer(); ?>