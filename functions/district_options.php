<?php

    if(isset($_GET['district'])){

        session_start();
        require 'connect.php';
        $database = new Database();
        $district = new District();


        if(isset($_GET['userDisable'])){
            
            $id = $_GET['id'];

            $district->disableUser($database, $id);

        }

        if(isset($_GET['userReactivate'])){

            $id = $_GET['id'];

            $district->reactivateUser($database, $id);
        }

        if(isset($_GET['addUser'])){

            $firstname = mysqli_real_escape_string($database->con, $_POST['firstname']);
            $lastname = mysqli_real_escape_string($database->con, $_POST['lastname']);
            $role = mysqli_real_escape_string($database->con, $_POST['role']);
            $school = mysqli_real_escape_string($database->con, $_POST['school']);
            $username = mysqli_real_escape_string($database->con, $_POST['username']);
            $password = mysqli_real_escape_string($database->con, $_POST['password']);
            $email = mysqli_real_escape_string($database->con, $_POST['email']);
            
            $district->addUser($database, $firstname, $lastname, $role, $school, $username, $password, $email);

        }
    }

?>