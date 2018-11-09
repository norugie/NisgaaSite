<?php

    session_start();
    require 'connect.php';
    $database = new Database();
    require 'user.php';
    $userInfo = new User();
    $user = $userInfo->userInfo($database);

?>