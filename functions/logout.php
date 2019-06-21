<?php

    require 'security_cookies.php';
    
    session_start();
    session_destroy();
    header("location:../login");

?>