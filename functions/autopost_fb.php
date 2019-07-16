<?php
    
    $pageAccessToken = "EAAKGGWIraNYBAMD3xwrZBKMte0R4adCZAUAINJ3p2Ctat8vdCW89rdxCxCj4RAc0UIwlXDv8lQiO9Akv94c4le78RUJWtFjpZAjZCa2ZBXO5xH7EkClZBSkKdaIdnTzwqv69K7meGvXb7v2v98ZA0O0wR0g5nZCRZCj4AwX7CgNEqZCQZDZD";
    
    require_once('../../php-graph-sdk/src/Facebook/autoload.php');
    
    $fb = new Facebook\Facebook([
        'app_id' => '710393532737750',
        'app_secret' => '4cc1d32930c07eabb26e0e01857a20c8',
        'default_graph_version' => 'v2.2',
    ]);

?>