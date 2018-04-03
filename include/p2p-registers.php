<?php
if(function_exists('p2p_register_connection_type')){
	function my_connection_types() {
		 p2p_register_connection_type(
		 	array(
		        'name' => 'work2page',
		        'from' => 'page',
		        'to' => 'post',
		        'sortable' => 'to',
				'admin_box' => array(
				    'show' => 'from',
				    'context' => 'advanced'
				),
		        'title' => array(
				    'from' => __( 'Připojit "Partials"', 'twentyfortysix' ),
				    'to' => __( 'Připojeno', 'twentyfortysix' )
				),
		    ) 
	    );
	}
	add_action( 'p2p_init', 'my_connection_types' );
}