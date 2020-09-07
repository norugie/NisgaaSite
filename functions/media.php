<?php
    session_start();


    $request = 1;
    if(isset($_POST['request'])) $request = $_POST['request'];
    
    // Allowed origins to upload images. Add necessary origins ones site is in production
    $urlbase = "https://www.nisgaa.bc.ca";
    $accepted_origins = array($urlbase); // Change origin URL once site is online

    $imageFolder;

    if($request == 1){

        // Images upload path
        if($_SESSION['school'] == '3') {$imageFolder = "../../ness/images/posts/media/";}
        else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/images/posts/media/";}
        else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/images/posts/media/";}
        else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/images/posts/media/";}
        else {$imageFolder = "../images/posts/media/";}

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
            move_uploaded_file($temp['tmp_name'], $filetowrite);
        
        } else {
            // Notify editor that the upload failed
            header("HTTP/1.1 500 Server Error");
        }
    }
    
    if($request == 2){

        require 'connect.php';
        $database = new Database();

        // Images fetch path
        $imageUrl;
        if($_POST['school'] == '3') {$imageFolder = "../../ness/images/posts/media/"; $imageUrl = "https://ness.nisgaa.bc.ca/images/posts/media/";}
        else if($_POST['school'] == '4') {$imageFolder = "../../aames/images/posts/media/"; ; $imageUrl = "https://aames.nisgaa.bc.ca/images/posts/media/";}
        else if($_POST['school'] == '5') {$imageFolder = "../../ges/images/posts/media/"; ; $imageUrl = "https://ges.nisgaa.bc.ca/images/posts/media/";}
        else if($_POST['school'] == '6') {$imageFolder = "../../nbes/images/posts/media/"; ; $imageUrl = "https://nbes.nisgaa.bc.ca/images/posts/media/";}
        else {$imageFolder = "../images/posts/media/"; ; $imageUrl = $urlbase . "/images/posts/media/";}

        // Fetch existing images for modification
        $filelist = [];
        $id = $_POST['post_id'];
        $sql = "SELECT media_name FROM media WHERE post_id = '$id' ORDER BY id DESC";
        $query = mysqli_query($database->con, $sql);
        if(!$query){
            $_SESSION['error_message'] = mysqli_error($database->con);
			header("location:../cms/post.php?tab=post&page=posts&error=true");
        } else {
            while($row = mysqli_fetch_array($query)){
                $file = $row['media_name'];
                $filepath = $imageFolder . $file;
                $fileurl = $imageUrl . $file;
                $filesize = filesize($filepath);
                $filelist[] = ['name' => $file, 'size' => $filesize, 'url' => $fileurl, 'path' => $filepath];
            }
        }

        echo json_encode($filelist);
    }
?>