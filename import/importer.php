<?php
if ( ! defined( 'ABSPATH' ) ) exit;

require_once TEMPLATEPATH . '/import/schema.php';

use JsonMachine\JsonDecoder\ExtJsonDecoder;
use JsonMachine\JsonDecoder\PassThruDecoder;
use \JsonMachine\Items;


class Importer {
    private $schema;
    private $json_data;

    public function __construct() {
        if (!class_exists('\JsonMachine\Items')) {
            die('JsonMachine is not available');
        }
        $this->schema = get_schema(); 
        $this->pointer_base = "/T3RecordDocument/records/tablerow";
    }
    
    private function check_if_exists($type, $id) {
        $args = array(
            'post_type' => $type,
            'posts_per_page' => 1,
            'fields' => 'ids',
            'meta_query' => [
                [
                    'key' => 'uid',
                    'value' => $id,
                ]
            ]
        );

        $posts = get_posts($args);

        if (!empty($posts)) {
            return $posts[0];
        }

        return false;
    }

    function picker($item, $wpfield, $needle){
        $result = [];
        $pointer = '/'.key($needle);
        $_needle = reset($needle);
        $find = $_needle[0];
        $match = $_needle[1];
        $pick = $_needle[2];
            $cherry = [];
            foreach (Items::fromString($item, ['pointer' => $pointer]) as $record){
                $found = $this->cherry_picker($record, $find, $match, $pick);
                if(!empty($found)){
                    $cherry[] = $found;
                }
            }
            if(!empty($cherry)){
                if(count($cherry) == 1 && key($cherry) == 0){
                    $result[$wpfield] = $cherry[0];
                }else{
                    $result[$wpfield] = $cherry;
                }
            }
        return $result;
    }   

    function cherry_picker($garbage, $find, $match, $pick){
        if (
            isset($garbage->{$find})
            && $garbage->{$find} == $match
            && isset($garbage->{$pick})
            && !empty($garbage->{$pick})
        ){
            return $garbage->{$pick};
        }else{
            return null;
        }
    }

    public function import($type) {
        $result = [];
        $items = Items::fromFile(TEMPLATEPATH . '/import/' . $type . '.json', ['pointer' => $this->pointer_base, 'decoder' => new PassThruDecoder]);
        $i = 0;
        foreach($items as $record){
            $record_result = [];
            foreach($this->schema[$type] as $wpfield => $needle){
                if($wpfield == 'meta_input'){
                    $storage = [];
                    foreach($this->schema[$type]['meta_input'] as $meta => $meta_needle){
                        $found = $this->picker($record, $meta, $meta_needle);   
                        if(!empty($found)){
                            $k = key($found);
                            $storage[$k] = $found[$k];
                        }    
                    }
                    $record_result['meta_input'] = $storage;
                }
                // else if(if($wpfield == 'tax_inlut'){){ <-- here would come the taxonomy process
                // }
                else {
                    $found = $this->picker($record, $wpfield, $needle);   
                    if(!empty($found)){
                        $k = key($found);
                        $record_result[$k] = $found[$k];
                    }
                }
            }
            if(!empty($record_result)){
                $result[] = $record_result;
            }
        }
        // return $result;
        $saved_data = $this->save_data($result, $type); 
        return $saved_data;
    }

    private function save_data($data, $type) {
        $ids = [];
        foreach($data as $args){
            $new_record = $this->save_post($args, $type);
            if(!is_wp_error( $new_record )){
                $ids[] = $new_record;
            }
        }
        if(is_wp_error( $new_record )){
            return $new_record;
            exit;
        }
        return $ids;
    }
    
    private function save_post($args, $type) {
        if(isset($args['meta_input']['uid'])){
            $possible_record = $this->check_if_exists($type, $args['meta_input']['uid']);
            if(!empty($possible_record)){
                $args['ID'] = $possible_record;
            }
        }
        $args['post_status'] = isset($args['post_status']) ? $args['post_status'] : 'publish';
        $args['post_author'] = isset($args['post_author']) ? $args['post_author'] : 1;
        $args['post_type'] = $type;
        
        $new_record = wp_insert_post( $args, true, false );

        // in case postprocess taxonomies
        if(!is_wp_error( $new_record )){
            $this->postprocessing($new_record, $args);
        }
        // var_dump($new_record);
        return $new_record;
        
    }

    private function postprocessing($id, $args) {
        if(isset($args['tax_input']) && is_array($args['tax_input'])){
            // save taxonomies
        }
    }

    function purge(){
        $zombies = [];
        foreach($this->schema as $type => $data){
            $args = array(
                'post_type'   => $type,
                'post_status' => 'any',
                'numberposts' => -1,
                'fields' => 'ids'
            );

            $posts = get_posts($args);

            foreach ($posts as $id) {
                $dead = wp_delete_post($id, true);
                $zombies[] = $dead->ID;
            }
        }
        return $zombies;
    }
}

