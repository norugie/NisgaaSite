<?php

    if(isset($_GET['interaction'])){

        session_start();
        require 'connect.php';
        $database = new Database();
        $interaction = new Interaction();

    }

?>