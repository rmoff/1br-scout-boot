<?php

add_action('page_attributes_misc_attributes', 'wpsb84532_page_attributes');

function wpsb84532_page_attributes($post)
{
?>
  <p class="post-attributes-label-wrapper wpsb84532-label-wrapper">
    <label class="wpsb84532-label" for="wpsb84532_sidebar_categories"><?php _e('Option Label', 'textdomain'); ?></label>
    <input id="wpsb84532_sidebar_categories" name="wpsb84532_sidebar_categories" type="text" value="<?php if (isset($post->wpsb84532_sidebar_categories)) {
                                                                                                      echo $post->wpsb84532_sidebar_categories;
                                                                                                    } ?>">
  </p>
<?php
}
