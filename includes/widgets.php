<?php
/**
 * Loads Gb Widgets
 */
if (!function_exists('gb_get_widget')) :
	function gb_get_widget($name, $position = false)
	{
		$path = __DIR__ . '/widgets/' . $name . '.php';

		if (file_exists($path)) {
			include $path;
		} else {
			echo '<p class="alert alert-danger">Error al cargar el plugin "' . $name . '"</p>';
		}
	}
endif;
?>