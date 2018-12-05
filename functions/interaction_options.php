<?php

    if(isset($_GET['interaction'])){

        session_start();
        require 'connect.php';
        require 'log.php';
        $database = new Database();
        $interaction = new Interaction();
        $log = new Log();
        
    }

?>