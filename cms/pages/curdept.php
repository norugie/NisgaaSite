<?php
    if(!isset($_GET['option']) || empty($_GET['option'])){
        require 'curdept/curdept_view.php';
    } else {
        require 'curdept/curdept_modify.php';
    }
?>
