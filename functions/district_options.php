<?php

    if(isset($_GET['district'])){

        session_start();
        require 'connect.php';
        $database = new Database();
        $district = new District();

    }

?>