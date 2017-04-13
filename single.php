	<?php get_header(); ?>

	<div id="gb-main-content">
		<div class="container">
			<div class="row">
				<section id="gb-single-content" class="col-md-8">

					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header>
								<h1><?php the_title(); ?></h1>
								<div class="post-info">
									<ul class="list-unstyled">
										<li>
											<span class="glyphicon glyphicon-time"></span> <?php echo get_the_date(); ?>
										</li>
										<li>
											<span class="glyphicon glyphicon-user"></span>
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
												<i><?php echo get_the_author(); ?></i>
											</a>
										</li>
										<li>
											<span class="glyphicon glyphicon-folder-open"></span>
											<b><?php echo __( 'Publicado en' , 'gb' ) . ': ';?></b>
											<?php the_category(', '); ?>
										</li>
										<li>
											<span class="glyphicon glyphicon-comment"></span>
											<?php comments_popup_link( '0', '1', '%' ); ?>
										</li>
									</ul>
								</div>
							</header>
							<div class="the-content">
								<?php the_content(); ?>
							</div>
							<footer>
								<?php $tags_list = get_the_tag_list( '', ' ' ); ?>
							
								<?php if ( $tags_list ): ?>

									<div class="post-tags">
										<span class="glyphicon glyphicon-tags"></span>
										<?php echo $tags_list ; ?>
									</div>

								<?php endif; ?>

								<?php edit_post_link( __( 'Editar', 'gb' ), '<p class="edit">', '</p>' ); ?>
							</footer>
						</article>

						<?php gb_get_ad('main', 'horizontal'); ?>

						<?php comments_template( '', true ); ?>

					<?php endwhile; ?>
				</section>

				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

	<?php get_footer(); ?>