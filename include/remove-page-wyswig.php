<?php

add_action('init', 'my_rem_editor_from_post_type');
function my_rem_editor_from_post_type() {
    remove_post_type_support( 'page', 'editor' );
}