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
	$allowed_categories= implode(",",get_post_meta($post->ID, 'sidebar_categories', true));
	$query->cat=$allowed_categories;
	return $query;
}
?>

<?php if( is_active_sidebar('sidebar-widget-area') ): ?>
<div id="sidebar" class="sidebar col-lg-4 d-none d-lg-block" role="navigation">
	<?php
		b4st_sidebar_before();
		add_action('pre_get_posts', 'limit_posts_in_sidebar_to_chosen_categories');
		dynamic_sidebar('sidebar-widget-area');
		remove_action('pre_get_posts', 'limit_posts_in_sidebar_to_chosen_categories');
		b4st_sidebar_after();
	?>
</div>
<?php endif; ?>
