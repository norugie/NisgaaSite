<?php

    session_start();

    $currentCookieParams = session_get_cookie_params();  
    $sidvalue = session_id();  
    setcookie(  
        'PHPSESSID',    //name  
        $sidvalue,  //value  
        0,  //expires at end of session  
        $currentCookieParams['path'],   //path  
        $currentCookieParams['domain'], //domain  
        true,   //secure
        true  
    );

    require 'connect.php';

    $database = new Database();
    $site = new Site();
    
?>