<?php
## Replaces the rendering of the latest_posts block https://github.com/WordPress/WordPress/blob/ad48a153873cdef28ab03c54a034de807e729052/wp-includes/blocks/latest-posts.php#L36

function render_block_core_latest_posts_wpse353682($attributes)
{
    global $post, $block_core_latest_posts_excerpt_length;

    $args = array(
        'posts_per_page'   => $attributes['postsToShow'],
        'post_status'      => 'publish',
        'order'            => $attributes['order'],
        'orderby'          => $attributes['orderBy'],
        'suppress_filters' => false,
    );

    $block_core_latest_posts_excerpt_length = $attributes['excerptLength'];
    add_filter('excerpt_length', 'block_core_latest_posts_get_excerpt_length', 20);

    if (isset($attributes['categories'])) {
        $args['category__in'] = array_column($attributes['categories'], 'id');
    }
    if (isset($attributes['selectedAuthor'])) {
        $args['author'] = $attributes['selectedAuthor'];
    }

    $recent_posts = get_posts($args);

    $list_items_markup = '<h1> working!!! </h1>';

    ## COMPILE LIST HERE

    remove_filter('excerpt_length', 'block_core_latest_posts_get_excerpt_length', 20);

    $class = 'wp-block-latest-posts__list';

    if (isset($attributes['postLayout']) && 'grid' === $attributes['postLayout']) {
        $class .= ' is-grid';
    }

    if (isset($attributes['columns']) && 'grid' === $attributes['postLayout']) {
        $class .= ' columns-' . $attributes['columns'];
    }

    if (isset($attributes['displayPostDate']) && $attributes['displayPostDate']) {
        $class .= ' has-dates';
    }

    if (isset($attributes['displayAuthor']) && $attributes['displayAuthor']) {
        $class .= ' has-author';
    }

    $wrapper_attributes = get_block_wrapper_attributes(array('class' => $class));

    print_r("RETURNING");

    return sprintf(
        '%1$s',
        $list_items_markup
    );
}

function register_block_core_latest_posts_wpse353682()
{
    // unregister_block_type("core/latest-posts");
    register_block_type( __DIR__ );
    // register_block_type(
    //     'core/latest-posts',
    //     'attributes' = [...], // copy attributes from the original function...
    //     'render_callback' => 'your_render_callback',
    // );
}
// Re-attach the block
add_action('init', 'register_block_core_latest_posts_wpse353682');
