<?php
/*
All the functions are in the PHP files in the `functions/` folder.
*/

if ( ! defined('ABSPATH') ) {
  exit;
}
require get_template_directory() . '/functions/cleanup.php';
require get_template_directory() . '/functions/setup.php';
require get_template_directory() . '/functions/enqueues.php';
require get_template_directory() . '/functions/develop.php';
require get_template_directory() . '/functions/cpt.php';
require get_template_directory() . '/functions/hooks.php';
require get_template_directory() . '/functions/navbar.php';
require get_template_directory() . '/functions/widgets.php';
//require get_template_directory() . '/functions/search-widget.php';
//require get_template_directory() . '/functions/index-pagination.php';
//require get_template_directory() . '/functions/single-split-pagination.php';

function mg_add_async_defer_attributes( $tag, $handle ) {
	// Busco el valor "async"
	if( strpos( $handle, "async" ) ):
		$tag = str_replace(' src', ' async="async" src', $tag);
	endif;
	// Busco el valor "defer"
	if( strpos( $handle, "defer" ) ):
		$tag = str_replace(' src', ' defer="defer" src', $tag);
	endif;
	return $tag;
}
add_filter('script_loader_tag', 'mg_add_async_defer_attributes', 10, 2);