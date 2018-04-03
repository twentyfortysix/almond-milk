<?php
// get the id of page laying next to the given one
// and only those that are chosen by meta value show_in_selected = 1
function prev_next_page($step){
	global $post;
	$actual_menu_order = $post->menu_order;
	$args = array(
		'post_type' => $post->post_type,
		'posts_per_page' => -1,
		'post_status' => 'publish',
		'order' => 'ASC',
		'orderby' => 'menu_order',
		// 'meta_key' => 'show_in_selected',
		// 'meta_value' => 1,
		// 'post_parent' => 0
		
	);
	$data = new stdClass();

	// The Query
	$the_query = new WP_Query( $args );

	$last_index = count($the_query->posts) - 1;
	foreach($the_query->posts as $key => $val){
		if($val->menu_order == $actual_menu_order){
			// going backwards
			if($step == 'previous'){
				if($key == 0){
					$data = ($the_query->posts[$last_index]);
				}else{
					$data = ($the_query->posts[$key - 1]);
				}
			}
			// going forwards
			else{
				// if the actual page is not last , use the next page
				if($key != $last_index){
					$data = ($the_query->posts[$key + 1]);
				}
				// else pick the first one, make it circular
				else{
					$data = ($the_query->posts[0]);
				}
			}
		}
	}
	// Restore original Query & Post Data
	wp_reset_postdata();
	return $data;
}