<?php
    session_start();

    // Images fetch path
    $imageFolder;

    if($_POST['school'] == '3') {$imageFolder = "../../ness/images/posts/media/";}
    else if($_POST['school'] == '4') {$imageFolder = "../../aames/images/posts/media/";}
    else if($_POST['school'] == '5') {$imageFolder = "../../ges/images/posts/media/";}
    else if($_POST['school'] == '6') {$imageFolder = "../../nbes/images/posts/media/";}
    else {$imageFolder = "../images/posts/media/";}

    // Delete image from server folder
    $path = $imageFolder . $_POST['filename'];
    unlink($path);

    // Delete image record from database: media table
    if($_POST['post_id'] != 0){
        require 'connect.php';
        $database = new Database();

        $post_id = $_POST['post_id'];
        $name = $_POST['filename'];
        echo $post_id . " " . $name;
        $sql = "DELETE FROM media WHERE media_name = '$name' AND post_id = '$post_id'";
        $query = mysqli_query($database->con, $sql);
        if(!$query){
            $_SESSION['error_message'] = mysqli_error($database->con);
			header("location:../cms/post.php?tab=post&page=posts&error=true");
        }
    }
?>