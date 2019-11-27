<?php

    require 'security_cookies.php';
    
    session_start();
    session_destroy();
    header("location:https://login.microsoftonline.com/common/oauth2/logout?post_logout_redirect_uri=https://www.nisgaa.bc.ca");

?>