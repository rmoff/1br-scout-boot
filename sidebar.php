<?php
/**!
 * The Sidebar
 * Note: The main column has simply Bootstrap flexbox "col-sm" so it will expand
 * to occupy the whole row (if no sidebar) or to occupy whatever part of the row
 * is available (if there is a sidebar, or more than one sidebar, etc.).
 *
 * (So, you don't need to set the main column to col-sm-8 or whatever.)
 */
?>

<?php if( is_active_sidebar('sidebar-widget-area') ): ?>
<div id="sidebar" class="sidebar col-lg-4" role="navigation">
	<?php
		b4st_sidebar_before();
		if (get_post_meta($post->ID, 'recent_posts_visible', false)){
			$posts=get_posts(array(  'numberposts' => 10,
							  'post_type'   => 'post',
							  'category'   => get_post_meta($post->ID, 'sidebar_categories', [])
							));
			foreach ($posts as $post){
				?>
				<h2><?php $post->title ?></h2>
				<?php
			}
		}
		dynamic_sidebar('sidebar-widget-area');
		b4st_sidebar_after();
	?>
</div>
<?php endif; ?>
