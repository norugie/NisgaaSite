<?php

    if(isset($_GET['district'])){

        session_start();
        require 'connect.php';
        require 'log.php';
        $database = new Database();
        $dashboard = new Dashboard();
        $log = new Log();

    }

?>
