<?php
/**!
 * The Sidebar
 * Note: The main column has simply Bootstrap flexbox "col-sm" so it will expand
 * to occupy the whole row (if no sidebar) or to occupy whatever part of the row
 * is available (if there is a sidebar, or more than one sidebar, etc.).
 *
 * (So, you don't need to set the main column to col-sm-8 or whatever.)
 */
function limit_posts_in_sidebar_to_chosen_categories($query)
{
	print_r($query);
	$post=get_post();
	$allowed_categories=get_post_meta($post->ID, 'sidebar_categories', true);
	print_r($allowed_categories);
	$query->query_vars['category__in']=$allowed_categories;
	return $query;
}
?>

<?php if( is_active_sidebar('sidebar-widget-area') ): ?>
<div id="sidebar" class="sidebar col-lg-4 d-none d-lg-block" role="navigation">
	<?php
		add_action('pre_get_posts', 'limit_posts_in_sidebar_to_chosen_categories');
		print_r($GLOBALS['wp_filter']);
		b4st_sidebar_before();
		dynamic_sidebar('sidebar-widget-area');
		b4st_sidebar_after();
		remove_action('pre_get_posts', 'limit_posts_in_sidebar_to_chosen_categories');
	?>
</div>
<?php endif; ?>
