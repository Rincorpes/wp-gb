<!doctype html>
<!--[if lt IE 7 ]> <html lang="es" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="es" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="es" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="es" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="es" class="no-js"> <!--<![endif]-->
<head>
	<!-- Codigo de Google Adsense -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<!-- Page tile -->
	<title>
		<?php
 			global $page, $paged; 
 			wp_title( '|', true, 'right' ); 
 			bloginfo( 'name' );
 				if (is_home() || is_front_page()) echo " | Bitcoin para todos"; 
 				if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Página %s', 'gb' ), max( $paged, $page ) ); 
 		?>
	</title>

	<!-- Loads IE 9 and lower scripts -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Loads Wordpress head with wp_head() -->
	<?php
	if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 

	wp_head(); 
	?>
</head>

<body <?php body_class(); ?>>

	<?php gb_facebook(); ?>
	
	<header id="gb-header">
		<div class="top-navbar container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only"><?php echo __('Desplegar navagación', 'gb'); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="site-logo pull-left visible-xs">
				    	<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			     			<img src="<?php bloginfo('template_url'); ?>/img/ganemos-bits-logo.png">
			     		</a>
					</div>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<div class="navbar-bottom-mobile navbar-left visible-xs">
						<?php wp_nav_menu( array('theme_location' => 'primary')); ?>
					</div>
					<?php wp_nav_menu( array('theme_location' => 'secundary')); ?>
					<?php wp_nav_menu( array('theme_location' => 'social-nav')); ?>
					<?php get_search_form(); ?>
				</div>
			</nav>
		</div>
		<div class="site-identity hidden-xs">
			<div class="container">
				<div class="title-wrapper pull-left">
					<h1 class="text-hide">
						<?php echo the_custom_logo(); ?>
						<?php bloginfo( 'name' ); ?>
					</h1>
				</div>
				<?php gb_get_ad('header', 'horizontal', 'chitika'); ?>
			</div>
		</div>
		<div class="main-navbar hidden-xs">
			<div class="container">
				<nav class="navbar navbar-default" role="navigation">
					<?php wp_nav_menu( array('theme_location' => 'primary')); ?>
				</nav>
			</div>
		</div>
	</header>
	<!-- gb-header -->