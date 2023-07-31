<?php 
// https://github.com/sleiman/airtable-php
use \TANIOS\Airtable\Airtable;

function inventTransientName($endpoint, $params, $offset){
	return json_encode($endpoint . $offset . preg_replace("/[^a-zA-Z0-9]+/", "",$params['filterByFormula']));
}
function artaible_call_api($params, $endpoint, $offset_name = '', $cache = true){
	$use_cache = $cache; // true on life, false for testing purposes
	// $use_cache = false; // true on life, false for testing purposes
	$transientName = inventTransientName($endpoint, $params, $offset_name);
	$all_records = [];
	$id = get_field('airtable_id', 'option');
	$token = get_field('airtable_token', 'option');
	// $table_id = get_field('airtable_table_id', 'option');
	$airtable = new Airtable([
	    'api_key' => $token,
	    'base'    => $id
	]);
	$transient = get_transient( $transientName );
	if(!empty($transient) && $use_cache == true){
        $all_records = $transient;
    }else{
		$request = $airtable->getContent( $endpoint, $params);
		// $full_request = $request->getResponse();
		// var_dump($full_request['records']);
		// TODO: Iteration may timeout due to client inactivity or server restarts. In that case, the client will receive a 422 response with error message LIST_RECORDS_ITERATOR_NOT_AVAILABLE. It may then restart iteration from the beginning. 
		$full_request = $request->getResponse();
		// var_dump($full_request);
		$records = isset($full_request['records']) ? $full_request['records'] : [];
		$all_records = array_merge($all_records, $records);

		// no ofsset no other content, write down the transient
		if(empty($full_request['offset'])){
			set_transient( $transientName, $all_records, $expiration = 3600 );
		}
		// fetch another page if needed
		else{
			$params['offset'] = $full_request['offset'];
			$another_records = artaible_call_api($params, $endpoint, $full_request['offset'], $use_cache);
			$all_records = array_merge($all_records, $another_records);
		}
	}
	return $all_records;
}

/*
$view = view name
$filterByFormula = artiable filterByFormula
$fields = ["name",...]
*/
function airtable_list_records($view, $filterByFormula, $fields){
	$endpoint = $data['endpoint'];
	$params = [
	    "filterByFormula" => $filterByFormula,
	    "fields" => $fields,
	    "sort" => [['field' => 'name', 'direction' => "asc"]],
	    "maxRecords" => 200,
	    "pageSize" => 100,
	    "view" => $view
	];
	
	$call = artaible_call_api($params, $endpoint);
	return $call;
}
