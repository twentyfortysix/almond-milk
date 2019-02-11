<?php 
$data = Timber::get_context();
if( ICL_LANGUAGE_CODE == 'en' ){
	$data['top_menu'] = new TimberMenu('top_menu_en');
}else{
	$data['top_menu'] = new TimberMenu('top_menu');
}
$data['languages'] = apply_filters( 'wpml_active_languages', NULL, 'orderby=code&order=asc&skip_missing=0' );
$data['current_language'] = ICL_LANGUAGE_NAME;

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
