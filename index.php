<?php
$data = Timber::get_context();
$data['top_menu'] = new TimberMenu('top_menu');
$data['footer'] = new TimberPost(29);

if(is_front_page()){
	$data['post'] = new TimberPost();
	$data['global_aside'] = new TimberPost(28);
	Timber::render('frontpage.twig', $data);
}elseif(is_archive()){
	$data['posts'] = Timber::get_posts();
	Timber::render('archive.twig', $data);
}elseif(is_single()){
	$data['global_aside'] = new TimberPost(28);
	$data['post'] = new TimberPost();
	$related = array(
		'post_type' => 'post',
		'posts_per_page' => 3,
		'post__not_in' => array(get_queried_object_id())
	);
	$data['related'] = Timber::get_posts($related);
	Timber::render('post.twig', $data);
}else{
	$data['post'] = new TimberPost();
	Timber::render('page.twig', $data);
}
