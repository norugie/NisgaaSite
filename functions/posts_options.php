<?php

    if(isset($_GET['post'])){

        session_start();
        require 'connect.php';
        $database = new Database();
        $post = new Post();
    }

?>