<?php
  
require_once('category_walker.php');

add_action('add_meta_boxes', 'wpsb84532_add_metabox');

function wpsb84532_add_metabox($post)
{
  add_meta_box(
    'wpsb84532_create_metabox',
    __( 'Sidebar Settings' ),
    'wpsb84532_create_metabox',
    'page',
    'side',
    'core'
  );
}
function wpsb84532_create_metabox()
{
  global $post;

  // Nonce field to validate form request came from current site
  wp_nonce_field(basename(__FILE__), 'sidebar_settings');

  // Get the location data if it's already been entered
  $sidebar_active = get_post_meta($post->ID, 'sidebar_active', true);
  $categories = get_post_meta($post->ID, 'sidebar_categories', true);

  $myWalker = new wpsb84532_category_walker();
  // Output the field
  echo '
    <input type="checkbox" name="recent_posts_visible" id="recent_posts_visible" '.($sidebar_active?"checked":"").' />
    <label for="recent_posts_visible">Recent posts visible in sidebar </label>
    <label for="recent_posts_categories">Categories to display in recent posts:</label>
    <div class="ml-1">'.wp_terms_checklist(0, array("walker"=>$myWalker, "echo"=>0)).'</div>';
}

function wpsb84532_save_meta($post_id){
  print_r($_POST);
  if($_POST['formfield']){
    update_post_meta($post_id,'metakey',$_POST['formfield']);
  }
}
add_action('save_post', 'wpsb84532_save_meta');
