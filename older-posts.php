<?php
$row1 = new WP_Query(
	array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'orderby' => 'ASC',
		'posts_per_page' => '2',
		'offset' => '4'
		)
	);

$row2 = new WP_Query(
	array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'orderby' => 'ASC',
		'posts_per_page' => '2',
		'offset' => '6'
		)
	); 

// Adds "col-md-6" class to the post article
if (!function_exists('gb_theme_slug_post_classes')) : 
	function gb_theme_slug_post_classes( $classes ) {
		$classes[] = 'col-md-6';
		return $classes;
	}
endif;
add_filter( 'post_class', 'gb_theme_slug_post_classes' );
?>

<div class="older-posts row">
	<?php while ( $row1->have_posts() ) : $row1->the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<div class="older-post-thumbnail">
					<?php if(has_post_thumbnail()): ?>
						<?php the_post_thumbnail('medium'); ?>
					<?php else:?>
						<span class="image-not-found">Imagen no encontrada</span>
					<?php endif; ?>
				</div>
				<h2>
					<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
			</header>
			<div class="older-post-content">
				<?php the_excerpt(); ?>
			</div>
			<footer class="pull-right">
				<p><span class="glyphicon glyphicon-time"></span> El <?php echo get_the_date(); ?></p>
			</footer>
		</article>

	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>
</div>

<div class="older-posts row">
	<?php while ( $row2->have_posts() ) : $row2->the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<div class="older-post-thumbnail">
					<?php if(has_post_thumbnail()): ?>
						<?php the_post_thumbnail('medium'); ?>
					<?php else:?>
						<span class="image-not-found">Imagen no encontrada</span>
					<?php endif; ?>
				</div>
				<h2>
					<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
			</header>
			<div class="older-post-content">
				<?php the_excerpt(); ?>
			</div>
			<footer class="pull-right">
				<p><span class="glyphicon glyphicon-time"></span> El <?php echo get_the_date(); ?></p>
			</footer>
		</article>

	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>
</div>