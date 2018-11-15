<?php

    if(isset($_GET['district'])){

        session_start();
        require 'connect.php';
        $database = new Database();
        $district = new District();


        if(isset($_GET['userDisable'])){
            
            $id = $_GET['id'];

            $district->disableUser($database, $id);

        }

        if(isset($_GET['userReactivate'])){

            $id = $_GET['id'];

            $district->reactivateUser($database, $id);
        }
    }

?>