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
		dynamic_sidebar('sidebar-widget-area');
		if (get_post_meta($post->ID, 'recent_posts_visible', true)==1){
			$posts=get_posts(array(  'numberposts' => 10,
							  'post_type'   => 'post',
							  'category'   => implode(",",get_post_meta($post->ID, 'sidebar_categories', true))
							));
			?> 
			<div class="card p-2">
				<H1>Recent Posts</H1>
				<?php
				foreach ($posts as $post){
					?>
					<div class="card my-2 p-2">
					<p><a href=<?php echo '"'.get_permalink($post).'"'; ?>><?php echo $post->post_title;  ?></a></br>
					<?php echo get_the_excerpt($post); ?> <a href=<?php echo '"'.get_permalink($post).'"'; ?>>Read more</a></p>
					</div>
					<?php
				}
			?> </div> <?php
		}
		b4st_sidebar_after();
	?>
</div>
<?php endif; ?>
