<aside class="sidebar-categories">
	<h3><?php echo __( 'Categorias' , 'gb'); ?></h3>
	<ul class="list-unstyled">
		<?php $categories = get_categories( ); foreach ($categories as $cat): ?>
			<li>
				<a href="<?php echo get_category_link( $cat->term_id ) ?>" class="<?php echo $cat->slug; ?>" rel="nofollow"><?php echo $cat->name; ?></a>
			</li>		
		<?php endforeach; ?>
	</ul>
</aside>