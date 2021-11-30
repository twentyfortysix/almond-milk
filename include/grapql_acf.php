<?php 
// problem with query on acf relationships 
// https://giters.com/wp-graphql/wp-graphql-acf/issues/85?amp=1
// should be gone in 0.6.0 version
add_filter( 'acf/load_value/type=relationship', function( $value, $post_id, $field ) {
    if( !$value ) return [];

    $posts = get_posts( ['post_type' => 'any', 'post__in' => $value ]);

    return array_map( function($post ) {
        return $post->ID;
    }, $posts );
}, 10, 3);

// adjust preview link
// requires WP_FRONTEND_URL defined in .env
add_filter( 'post_type_link', 'the_preview_fix' );
add_filter( 'preview_post_link', 'the_preview_fix' );
function the_preview_fix($link) {
    $components = parse_url( $link);
    $redirect_base = getenv('WP_FRONTEND_URL');
    if(isset($redirect_base) && isset($components['host'])){
        $l = str_replace($components['host'], $redirect_base, $link);
        return $l;
    }else{
        return $link;
    }
}
