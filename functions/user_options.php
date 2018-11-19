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

        }
        
        if(isset($_GET['editPassword'])){

            $id = $_SESSION['id'];
            $sql = "SELECT password FROM users WHERE id = '$id'";
            $query = mysqli_query($database->con, $sql);
            if (!$query) {
                header("location: ../cms/index.php?error=true");
            } else {
                $passwordInfo = mysqli_fetch_assoc($query);
                $old_password = mysqli_real_escape_string($database->con, $_POST['old_password']);
                if(md5($old_password) == $passwordInfo['password']){
                     $new_password = mysqli_real_escape_string($database->con, $_POST['new_password']);
                     $r_password = mysqli_real_escape_string($database->con, $_POST['r_password']);
                     if($new_password == $r_password){
                         $user->userEditPassword($database, $new_password, $id);
                     } else {
                         //header("location: ../cms/index.php?incorrect=true");
                         echo "wrong new password lol";
                     }
                } else {
                    //header("location: ../cms/index.php?incorrect=true");
                    echo "wrong old password lol";
                }
            }

        }
    }
   
?>