<?php

    // Allowed origins to upload images. Add necessary origins ones site is in production
    $urlbase = "https://webdev.nisgaa.bc.ca";
    $accepted_origins = array($urlbase); // Change origin URL once site is online

    // Images upload path
    $imageFolder = "../images/posts/";

    reset($_FILES);
    $temp = current($_FILES);
    if(is_uploaded_file($temp['tmp_name'])){
        if(isset($_SERVER['HTTP_ORIGIN'])){

            if(in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)){
                header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            }else{
                header("HTTP/1.1 403 Origin Denied");
                return;
            }
        }
    
        // Sanitize input
        if(preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])){
            header("HTTP/1.1 400 Invalid file name.");
            return;
        }
    
        // Verify extension
        if(!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png", "jpeg"))){
            header("HTTP/1.1 400 Invalid extension.");
            return;
        }
    
        // Accept upload if there was no origin, or if it is an accepted origin
        $filetowrite = $imageFolder . $temp['name'];
        $imageURL = $urlbase . "/images/posts/" . $temp['name'];
        move_uploaded_file($temp['tmp_name'], $filetowrite);
    
        // Respond to the successful upload with JSON.
        echo json_encode(array('location' => $imageURL));
    } else {
        // Notify editor that the upload failed
        header("HTTP/1.1 500 Server Error");
    }
    
?>