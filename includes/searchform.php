<?php
/**
 * Search Form
 */
if (!function_exists('gb_search_form')) : 
	function gb_search_form( $form ) {
	
	    $form = '
			    <form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
				    <div class="form-group">
				      <span class="glyphicon glyphicon-search"></span>
				      <input id="s" class="form-control input-sm" name="s" type="text" placeholder="Buscar" value="' . get_search_query() . '">
				    </div>
			    </form>
	    ';
	
	    return $form;
	}
endif;
add_filter( 'get_search_form', 'gb_search_form' );
?>