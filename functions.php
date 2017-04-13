<?php

/** 
 * Tells WordPress to run gb_setup() when the 'after_setup_theme' hook is run.
 */
if ( ! function_exists( 'gb_setup' ) ):
	function gb_setup()
	{	
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-logo', array(
	        'height' => 100,
	        'width' => 400,
	        'flex-height' => true,
	        'flex-width' => true,
	        'header-text' => array( 'site-title', 'site-description' ),
        ) );
	
		// Makes theme available for translation
		// Translations can be filed in the /languages/ directory
		load_theme_textdomain( 'gb', TEMPLATEPATH . '/languages' );
	
		register_nav_menus( array(
			'primary' => 'Header navigation',
			'secundary' => 'Top Header navigation',
			'social-nav' => 'Social nav',
			'footer-nav' => 'Footer nav',
			'edu-nav' => 'Edu nav'
		) );
		
		register_sidebar( array(
			'name' => __( 'Main Sidebar', 'gb' ),
			'id' => 'main-sidebar',
			'description' => __( 'The sidebar', 'gb' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' => __( 'Front Page Sidebar', 'gb' ),
			'id' => 'front-page',
			'description' => __( 'The Front Page sidebar', 'gb' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
	}
endif;
add_action( 'after_setup_theme', 'gb_setup' );

/**
 * Removes some links from the header 
 */
if (!function_exists('gb_remove_headlinks')):
	function gb_remove_headlinks() {
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action( 'wp_head', 'index_rel_link' );
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	}
endif;
add_action('init', 'gb_remove_headlinks');

/**
 * Removing the WP version
 */
if (!function_exists('gb_remove_version')) :
	function gb_remove_version() 
	{
		return '';
	}
endif;
add_filter('the_generator', 'gb_remove_version');

/**
 * Get some loop information
 */
if (!function_exists('gb_get_loop_title')) :
	function gb_get_loop_title()
	{
		$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
	
		if (is_category()) : $title = __( 'Categoria' , 'gb' ) . ' : ' . single_cat_title( '', false );
		elseif (is_tag()) : $title = __( 'Etiqueta' , 'gb' ) . ' : ' . single_tag_title( '', false);
		elseif (is_month()) : $title = __( 'Archivos Mensuales' , 'gb' ) . ' : ' . get_the_date('F Y');
		elseif (is_year()) : $title = __( 'Archivos Anuales' , 'gb' ). ' : ' . get_the_date('Y');
		elseif (is_search()) : $title = __( 'Buscar resultados de' , 'gb' ) . ' : ' . get_search_query();
		elseif (is_author()) : $title = __( 'Autor de Archivos', 'gb' ) . ' : ' . $curauth->display_name;
		elseif (is_archive()) : $title = __( 'Archivo' , 'gb' );
		endif;
		
		return $title;
	}
endif;

/**
  * Replaces the excerpt "Read More" text by a link
  */
if (!function_exists('gb_excerpt_more')) {
	function gb_excerpt_more($more) {
		global $post;
		return '<a class="more" href="'. get_permalink($post->ID) . '"> Saber más</a>';
	}
}
add_filter('excerpt_more', 'gb_excerpt_more');

/**
 * Cambia clase de menus para compatibilidad con bootstrap
 */
if (!function_exists('gb_change_menu_class')):
	function gb_change_menu_class($menu)
	{  
		$menu = preg_replace('/class="menu"/','class="menu nav navbar-nav"',$menu);
		$menu = preg_replace('/<a (.*)>facebook<\/a>/','<a $1"><span class="visible-xs pull-left" style="margin-right:10px;">Facebook</span> <i class="fa fa-facebook"></i></a>',$menu);
		$menu = preg_replace('/<a (.*)>twitter<\/a>/','<a $1><span class="visible-xs pull-left" style="margin-right:10px;">Twitter</span> <i class="fa fa-twitter"></i></a>',$menu);
		$menu = preg_replace('/<a (.*)>rss<\/a>/','<a $1><span class="visible-xs pull-left" style="margin-right:10px;">RSS</span> <i class="fa fa-rss"></i></a>',$menu);
		$menu = preg_replace('/class="sub-menu"/','class="sub-menu dropdown-menu"',$menu);
		$menu = preg_replace('/(menu-item-has-children)/','$1 dropdown',$menu);
		$menu = preg_replace('/<a title="(.*)" href="#">(.*)<\/a>/','<a title="$1" href="#" class="dropdown-toggle" data-toggle="dropdown">$2 <b class="caret"></b></a>',$menu);

	    return $menu;  
	}
endif;
add_filter('wp_nav_menu','gb_change_menu_class');

require_once('includes/pagination.php');
require_once('includes/comments.php');
require_once('includes/scripts.php');
require_once('includes/searchform.php');
require_once('includes/ads.php');
require_once('includes/widgets.php');
require_once('includes/analytics.php');
require_once('includes/facebook.php');

/**
 * Agrega Metadatos
 */
if (! function_exists('gb_open_graph')):
	function gb_open_graph()
	{
		global $page, $paged; 

		$title = wp_title( '|', false, 'right' ); 
 		$title .= get_bloginfo( 'name' );
 		if (is_home() || is_front_page())
 			$title .= " | Bitcoin para todos"; 
 		if ( $paged >= 2 || $page >= 2 )
 			$title .= ' | ' . sprintf( __( 'Página %s', 'gb' ), max( $paged, $page ) );

 		$type = 'website';
 		if (is_single()) $type = 'article';

 		$image = '';
 		if (is_single()) {
 			global $post;
			$thumbID = get_post_thumbnail_id( $post->ID );
			$image = wp_get_attachment_url( $thumbID );
 		} else {
 			$custom_logo_id = get_theme_mod( 'custom_logo' );
 			$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
 			$image = $image[0];
 		}

 		$description = '';
		$site_description = get_bloginfo( 'description', 'display' );

		if (is_home() || is_front_page() || is_page()) {
			$description = $site_description;
		}

		if (is_single()) {
			$page_id = get_queried_object_id();
			$excerpt = wp_trim_words( get_the_excerpt( $page_id ) );

			if( $excerpt != '' )
				$description = esc_attr( $excerpt );
		}

		if( is_category() ) {

			$cat_id = get_queried_object_id();
			$description = wp_trim_words( wp_strip_all_tags( strip_shortcodes( category_description( $cat_id ) ) ) );

			if( $description != '' )
				$description = esc_attr( $description );
		}

		echo '<meta name="description" content="' . $description . '" />';
 		echo '<meta property="og:title" content="' . $title . '"/>';
 		echo '<meta property="og:type" content="' . $type . '"/>';
 		echo '<meta property="og:url" content="' . get_site_url() . '"/>';
 		echo '<meta property="og:image" content = "' . $image . '"/>';
 		echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';
 		echo '<meta property="og:description" content="' . $description . '"/>';
 		echo '<meta property="og:locale" content="es_LA"/>';
 		//echo '<meta property="fb:admins" content="ID de facebook admin"/>';
 		//echo '<meta property="fb:app_id" content="ID de la aplicacion en facebook"/>';
 		echo '<meta name="twitter:card" content="summary">';
 		echo '<meta name="twitter:site" content="@ganemosbits">';
 		echo '<meta name="twitter:creator" content="@rincorpes">';
		echo '<meta name="twitter:image" content="' . $image . '">';
		echo '<meta name="twitter:title" content="' . $title . '">';
		echo '<meta name="twitter:description" content="' . $description . '">';
	}
endif;
add_action('wp_head', 'gb_open_graph');
?>