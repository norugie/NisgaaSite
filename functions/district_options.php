<?php

    if(isset($_GET['district'])){

        session_start();
        require 'connect.php';
        require 'log.php';
        $database = new Database();
        $district = new District();
        $log = new Log();

		/*********************************************************************************************/
		/***************************  District Functionalities -- Users  *****************************/
		/*********************************************************************************************/

        if(isset($_GET['userDisable'])){
            
            $id = $_GET['id'];
            $username = $_GET['username'];

            $district->disableUser($database, $id, $username);

        }

        if(isset($_GET['userReactivate'])){

            $id = $_GET['id'];
            $username = $_GET['username'];

            $district->reactivateUser($database, $id, $username);
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

        if(isset($_GET['editUser'])){

            $id = mysqli_real_escape_string($database->con, $_POST['id']);
            $firstname = mysqli_real_escape_string($database->con, $_POST['firstname']);
            $lastname = mysqli_real_escape_string($database->con, $_POST['lastname']);
            $role = mysqli_real_escape_string($database->con, $_POST['role']);
            $school = mysqli_real_escape_string($database->con, $_POST['school']);
            $username = mysqli_real_escape_string($database->con, $_POST['username-hidden']);

            $district->editUser($database, $firstname, $lastname, $role, $school, $id, $username);           

        }

		/*********************************************************************************************/
		/*************************  District Functionalities -- Employment  **************************/
		/*********************************************************************************************/

        if(isset($_GET['jobDisable'])){
            
            $id = $_GET['id'];
            $title = $_GET['job'];

            $district->disableJob($database, $id, $title);

        }

        if(isset($_GET['jobReopen'])){

            $id = $_GET['id'];
            $title = $_GET['job'];

            $district->reopenJob($database, $id, $title);
        }

		/*********************************************************************************************/
		/***************************  District Functionalities -- Events  ****************************/
		/*********************************************************************************************/
    }

?>