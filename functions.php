<?php
/*
All the functions are in the PHP files in the `functions/` folder.
*/

if ( ! defined('ABSPATH') ) {
	exit;
}
require get_template_directory() . '/functions/cleanup.php';
require get_template_directory() . '/functions/theme-options.php';
require get_template_directory() . '/functions/setup.php';
require get_template_directory() . '/functions/enqueues.php';
require get_template_directory() . '/functions/hooks.php';
require get_template_directory() . '/functions/navbar.php';
require get_template_directory() . '/functions/dimox-breadcrumbs.php';
require get_template_directory() . '/functions/widgets.php';
require get_template_directory() . '/functions/search-widget.php';
require get_template_directory() . '/functions/index-pagination.php';
require get_template_directory() . '/functions/single-split-pagination.php';
require get_template_directory() . '/functions/sidebar-meta.php';
require get_template_directory() . '/custom-blocks/latest-posts/latest-posts.php';
