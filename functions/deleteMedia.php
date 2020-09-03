<?php
    session_start();

    // Images upload path
    $imageFolder;

    if($_SESSION['school'] == '3') {$imageFolder = "../../ness/images/posts/media/";}
    else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/images/posts/media/";}
    else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/images/posts/media/";}
    else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/images/posts/media/";}
    else {$imageFolder = "../images/posts/media/";}

    $path = $imageFolder . $_POST['filename'];
    unlink($path);
?>