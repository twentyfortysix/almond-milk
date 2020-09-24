<?php
add_action( 'rest_api_init', function () {
    // album path
  register_rest_route( '2046/v1', '/album/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'get_album_json',
    'args' => array(
      'id' => array(
        'validate_callback' => function($param, $request, $key) {
          return is_numeric( $param );
        }
      ),
    ),
  ) );
    register_rest_route( '2046/v1', '/concert/lang=(?P<lang>[a-zA-Z]+)&id=(?P<id>\d+)',
        array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => 'getConcert',
            'args' => array(
                'lang' => array(
                    'validate_callback' => function($param, $request, $key) {
                        return sanitize_text_field( $param );
                    }
                ),
                'id' => array(
                    'validate_callback' => function($param, $request, $key) {
                        return is_numeric( $param );
                    }
                ),
            )
        )
    );
});
