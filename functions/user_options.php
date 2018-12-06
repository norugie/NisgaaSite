<?php

    if(isset($_GET['userOpt'])){
        session_start();
        require 'connect.php';
        require 'log.php';
        $database = new Database();
        $user = new User();
        $log = new Log();
        
        if(isset($_GET['editProfile'])){

            $firstname = mysqli_real_escape_string($database->con, $_POST['firstname']);
            $lastname = mysqli_real_escape_string($database->con, $_POST['lastname']);

            $user->userEditProfile($database, $firstname, $lastname);
        }
    

        if(isset($_GET['editPicture'])){

            if(isset($_FILES['image'])){
                $errors = 0;
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
                
                $expensions = array("jpeg","jpg","png");
                
                if(in_array($file_ext, $expensions) == false){
                    $errors = 1;
                }
                
                if($file_size > 2097152){
                    $errors = 1;
                }
                
                if($errors == 0){
                    move_uploaded_file($file_tmp, "../images/profile/".$file_name);
                    $user->userEditPicture($database, $file_name);
                } else {
                    header("location:../cms/?error=true");
                }
            } else {
                header("location:../cms/?error=true");
            }

        }
        
        if(isset($_GET['editPassword'])){

            $id = $_SESSION['id'];
            $sql = "SELECT password FROM users WHERE id = '$id'";
            $query = mysqli_query($database->con, $sql);
            if (!$query) {
                header("location: ../cms/?error=true");
            } else {
                $passwordInfo = mysqli_fetch_assoc($query);
                $old_password = mysqli_real_escape_string($database->con, $_POST['old_password']);
                if(md5($old_password) == $passwordInfo['password']){
                     $new_password = mysqli_real_escape_string($database->con, $_POST['new_password']);
                     $r_password = mysqli_real_escape_string($database->con, $_POST['r_password']);
                     if($new_password == $r_password){
                         $user->userEditPassword($database, $new_password, $id);
                     } else {
                         header("location: ../cms/?incorrect=true");
                     }
                } else {
                    header("location: ../cms/?incorrect=true");
                }
            }

        }
    }
   
?>