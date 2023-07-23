<?php
add_action( 'rest_api_init', function () {
    // album path
    register_rest_route( '2046/v1', '/addon/(?P<id>\d+)', 
    [
    'methods' => 'GET',
    'callback' => 'get_addon_json',
        'args' => [
          'id' => [
            'sanitize_callback' => 'absint',
          ],
        ],
    ]
    );
    register_rest_route(
        '2046/v1',
        '/addons',
        [
            'methods' => 'GET',
            'callback' => 'get_addons_json',
            'args' => [
                'order' => [
                    'sanitize_callback' => 'sanitize_title',
                    // 'validate_callback' => truthy function_that_validates() 
                ],
                'orderby' => [
                    'sanitize_callback' => 'sanitize_title',
                ],
                'pricing' => [
                    'sanitize_callback' => 'sanitize_title',
                ],
                'type' => [
                    'sanitize_callback' => 'absint',
                ],
                'author' => [
                    'sanitize_callback' => 'absint',
                ],
                'offset' => [
                    'sanitize_callback' => 'absint',
                ],
                's' => [
                    'sanitize_callback' => 'wp_kses_post',
                ]
            ]
        ]
    );
});



function get_addons_json($request){
    $data = [];
    // $args = [
    //     'post_type' => 'post',
    //     'post_status' => 'publish',
    //     'posts_per_page' => '10',
    //     'paged' => isset($request['offset']) ? $request['offset'] : 1,
    //     'orderby' => 'date',
    //     'order' => 'DESC',
    // ];
    // // search query
    // if(isset($request['s'])){
    //     $data['s'] = $request['s'];
    // }
    // // page
    // if(isset($request['offset'])){
    //     $data['paged'] = $request[''];
    // }
    // $data['items'] = Timber::get_posts($args);
    $data[] = $request->get_param('offset');
    $data[] = $request->get_param('s');
    $resp = new WP_REST_Response($data);
    return $resp;
    wp_die();
}

function get_addon_json($request ){
    $data = [];
    $context = Timber::context();
    $data['item'] = Timber::get_post(intval($request['id']));
    $resp = new WP_REST_Response($data);
    return $resp;
    wp_die();
}
