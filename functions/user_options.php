<?php

    if(isset($_GET['userOpt'])){
        session_start();
        require 'connect.php';
        $database = new Database();
        $user = new User();
        
        if(isset($_GET['editProfile'])){

        }
        
        if(isset($_GET['editPicture'])){

        }
        
        if(isset($_GET['editPassword'])){
        
        }
    }
   
?>