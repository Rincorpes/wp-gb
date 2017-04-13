<div id="gb-comments">
	

	<?php /* Important, do not delete */ ?>
	<?php if ( post_password_required() ) : ?>
		<p>
			<?php _e( 'Esta publicación está protegida con contraseña. Introduce la contraseña para ver los comentarios.', 'gb' ); ?>
		</p>
	<?php return; endif; ?>
	<?php /* You can edit after this comment */ ?>
	
	<?php if ( have_comments() ) : ?>

		<h3 id="comments-title">
			<?php printf( _n( 'Un comentario en: %2$s', '%1$s comments to %2$s', get_comments_number(), 'gb' ), number_format_i18n( get_comments_number() ), '' . get_the_title() . '' ); ?>
		</h3>

		<hr />
	
		<ul id="comment-list">
			<?php wp_list_comments( array( 'callback' => 'gb_comments', 'avatar_size' => 45) ); ?>
		</ul>
	
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav class="pagination">
			<?php paginate_comments_links( ) ?>
		</nav>
		<?php endif; // check for comment navigation ?>
	
	<?php else : // or, if we don't have comments: ?>
	
		<?php	if ( ! comments_open() ) : ?>
			<p><?php _e( 'Los comentarios enstan cerrados.', 'gb' ); ?></p>
		<?php endif; // end ! comments_open() ?>
	
	<?php endif; // end have_comments() ?>
	
	
	<?php
		
	$fields =  array(
		'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . __( 'Name' ) . '" '. ( $req ? 'required' : '' ) . ' /></p>',
		'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . __( 'Email' ) . '" '. ( $req ? 'required' : '' ) . ' /></p>',
		'url'    => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . __( 'Website' ) . '" /></p>',
	); 
	$comment_field = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'. _x( 'Comment', 'noun' ) . '" required></textarea></p>';
	?>
	
	<?php //comment_form(array('fields' => $fields , 'comment_field' => $comment_field)); ?>
	<?php comment_form(); ?>
</div>