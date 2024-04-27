<?php 
$importer = new Importer();
// var_dump($importer->purge());
$data = $importer->import('contributor');
echo '<pre>';
var_dump($data);
echo '</pre>';
// $data = Timber::context();

// // $data['top_menu'] = new TimberMenu('top_menu_'.ICL_LANGUAGE_CODE);
// $data['top_menu'] = Timber::get_menu('top_menu');
// // $data['languages'] = apply_filters( 'wpml_active_languages', NULL, 'orderby=code&order=asc&skip_missing=0' );
// // $data['current_language'] = ICL_LANGUAGE_CODE;

// $data['post'] =  Timber::get_post();
// Timber::render('page.twig', $data);		
