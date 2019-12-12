<?php

// google map api
function googleApi(){
    return '--key--';
}
function googleServerApi(){
    return '--key--';
}
// add google map API to ACF
function my_acf_init() {
    acf_update_setting('google_api_key', googleApi());
}

// GOOGLE recaptcha V3
function recaptchaSITE_KEY(){
    return '--key--';
}
function recaptchaSECRET_KEY(){
    return '--key--';
}
function verifyReCaptcha(){
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    if(isset($_POST['recaptcha'])){
        $data  = [
            'secret' => recaptchaSECRET_KEY(),
            'response' => $_POST['recaptcha'],
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
