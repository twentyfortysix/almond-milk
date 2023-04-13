<?php

// google map api
function googleApi(){
    return isset(getenv('GOOGLE_API')) ? getenv('GOOGLE_API') : null;
}
function googleServerApi(){
    return '--key--';
}
// add google map API to ACF front end / Maps javascript
function my_acf_init() {
    acf_update_setting('google_api_key', googleApi());
}

// backend, Maps JavaScript API, Geocoding API and Places API
function my_acf_google_map_api( $api ){
    $api['key'] = googleApi();
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// GOOGLE recaptcha V3
function recaptchaSITE_KEY(){
    return '--key--';
}
function recaptchaSECRET_KEY(){
    return '--key--';
}
function verifyReCaptcha($id){
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    if(isset($_POST[$id.'_recaptcha'])){
        $data  = [
            'secret' => recaptchaSECRET_KEY(),
            'response' => $_POST[$id.'_recaptcha'],
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $response = json_decode(file_get_contents($url, false, $context), true);
        if($response['success'] == true){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
