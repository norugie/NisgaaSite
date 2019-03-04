<?php

    require 'connect.php';

    $database = new Database();
    $site = new Site();

    if(isset($_GET['search'])){
        $keyword = str_replace(' ', '%20', mysqli_real_escape_string($database->con, $_POST['search']));
        $school = $_GET['school'];
        header("location:../?page=search&keyword=" . $keyword);
    }
?>