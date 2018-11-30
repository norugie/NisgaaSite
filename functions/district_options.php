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

            $identifier = mysqli_real_escape_string($database->con, $_POST['identifier']);

            $id = mysqli_real_escape_string($database->con, $_POST['jobid']);
            $title = mysqli_real_escape_string($database->con, $_POST['jobid-name']);
            
            $open = mysqli_real_escape_string($database->con, $_POST['edit-job-open']);
            $close = mysqli_real_escape_string($database->con, $_POST['edit-job-close']);

            $jobopen = date('Y-m-d', strtotime($open));
            $jobclose = date('Y-m-d', strtotime($close));

            $district->reopenJob($database, $id, $title, $jobopen, $jobclose, $identifier);
        }

        if(isset($_GET['addJob'])){

            $id = 'JOB' . mysqli_real_escape_string($database->con, $_POST['jobid']);
            $title = mysqli_real_escape_string($database->con, $_POST['title']);
            $jobdesc = mysqli_real_escape_string($database->con, $_POST['jobdesc']);
            $jobtype = mysqli_real_escape_string($database->con, $_POST['jobtype']);
            $school = mysqli_real_escape_string($database->con, $_POST['school']);
            
            $open = mysqli_real_escape_string($database->con, $_POST['job-open']);
            $close = mysqli_real_escape_string($database->con, $_POST['job-close']);

            $jobopen = date('Y-m-d', strtotime($open));
            $jobclose = date('Y-m-d', strtotime($close));

            if(isset($_FILES['jobfile'])){
                $errors = 0;
                $file_name = $_FILES['jobfile']['name'];
                $file_size = $_FILES['jobfile']['size'];
                $file_tmp = $_FILES['jobfile']['tmp_name'];
                $file_type = $_FILES['jobfile']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['jobfile']['name'])));
                
                $expensions = array("doc","docx","pdf");
                
                if(in_array($file_ext, $expensions) == false){
                    $errors = 1;
                }
                
                if($file_size > 2097152){
                    $errors = 1;
                }
                
                if($errors == 0){
                    move_uploaded_file($file_tmp, "../jobs/".$file_name);
                    $district->addJob($database, $id, $title, $jobdesc, $jobtype, $school, $jobopen, $jobclose, $file_name);
                } else {
                    header("location:../cms/district.php?page=employment&error=true");
                }
            } else {
                header("location:../cms/district.php?page=employment&error=true");
            }

        }

        if(isset($_GET['editJobFile'])){

            $id = mysqli_real_escape_string($database->con, $_POST['jobid']);
            $title = mysqli_real_escape_string($database->con, $_POST['jobid-name']);
            
            if(isset($_FILES['edit-jobfile'])){
                $errors = 0;
                $file_name = $_FILES['edit-jobfile']['name'];
                $file_size = $_FILES['edit-jobfile']['size'];
                $file_tmp = $_FILES['edit-jobfile']['tmp_name'];
                $file_type = $_FILES['edit-jobfile']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['edit-jobfile']['name'])));
                
                $expensions = array("doc","docx","pdf");
                
                if(in_array($file_ext, $expensions) == false){
                    $errors = 1;
                }
                
                if($file_size > 2097152){
                    $errors = 1;
                }
                
                if($errors == 0){
                    move_uploaded_file($file_tmp, "../jobs/".$file_name);
                    $district->editJobFile($database, $id, $title, $file_name);
                } else {
                    header("location:../cms/district.php?page=employment&error=true");
                }
            } else {
                header("location:../cms/district.php?page=employment&error=true");
            }         
        }

        if(isset($_GET['editJobDetails'])){

            $id = mysqli_real_escape_string($database->con, $_POST['job-id']);
            $title = mysqli_real_escape_string($database->con, $_POST['jobid-name']);

            $jobtitle = mysqli_real_escape_string($database->con, $_POST['title']);
            $jobdesc = mysqli_real_escape_string($database->con, $_POST['jobdesc']);
            $jobtype = mysqli_real_escape_string($database->con, $_POST['jobtype']);
            $school = mysqli_real_escape_string($database->con, $_POST['school']);

            $district->editJob($database, $id, $title, $jobtitle, $jobdesc, $jobtype, $school);
        }

		/*********************************************************************************************/
		/***************************  District Functionalities -- Events  ****************************/
		/*********************************************************************************************/
    }

?>