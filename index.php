<?php 
$data = Timber::get_context();
$data['top_menu'] = new TimberMenu('top_menu');

if(is_front_page()){
	$data['post'] = new TimberPost();
	Timber::render('frontpage.twig', $data);
}elseif(is_archive()){
	$data['posts'] = Timber::get_posts();
	Timber::render('archive.twig', $data);		
}else{
	$data['post'] = new TimberPost();
	Timber::render('page.twig', $data);		
}
