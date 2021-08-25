<?php 
$data = Timber::get_context();

$data['top_menu'] = new TimberMenu('top_menu_'.ICL_LANGUAGE_CODE);
$data['languages'] = apply_filters( 'wpml_active_languages', NULL, 'orderby=code&order=asc&skip_missing=0' );
$data['current_language'] = ICL_LANGUAGE_CODE;
$data['base'] = new TimberPost(get_option('page_on_front'));

if(is_front_page()){
	$data['post'] = $data['base']
	Timber::render('frontpage.twig', $data);
}elseif(is_archive()){
	$data['posts'] = Timber::get_posts();
	Timber::render('archive.twig', $data);		
}else{
	$data['post'] = new TimberPost();
	Timber::render('page.twig', $data);		
}
