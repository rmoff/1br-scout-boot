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
		$post=get_post();
		echo "checking post attributes";
		echo print_r(get_post_meta($post->ID, 'sidebar_categories', true),true);
		if (get_post_meta($post->ID, 'recent_posts_visible', true)==1){
			$posts=get_posts(array(  'numberposts' => 10,
							  'post_type'   => 'post',
							  'category'   => implode(",",get_post_meta($post->ID, 'sidebar_categories', true))
							));
			foreach ($posts as $post){
				?>
				<a href=<?php echo '"'.get_permalink($post->post_url).'"'; ?>><p><?php echo $post->post_title;  ?></p></a>
				<p><?php echo get_the_excerpt($post); ?></p><a href=<?php echo '"'.get_permalink($post->post_url).'"'; ?>><p>Read more</p></a>
				</hr>
				<?php
			}
		}
		dynamic_sidebar('sidebar-widget-area');
		b4st_sidebar_after();
	?>
</div>
<?php endif; ?>
