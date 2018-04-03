<?php
// Remove tags support from posts
function myprefix_unregister_categories() {
    unregister_taxonomy_for_object_type('category', 'post');
}
add_action('init', 'myprefix_unregister_categories');

// Remove tags support from posts
function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');