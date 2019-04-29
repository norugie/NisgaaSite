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
            $username = str_replace('%20', ' ', $_GET['username']);

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
            $role; 
            if($_POST['school'] != 3 && $_POST['school'] != 4 && $_POST['school'] != 5 && $_POST['school'] != 6){
                $role = mysqli_real_escape_string($database->con, $_POST['role']);
            } else {
                $role = 4;
            }
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
            $role; 
            if($_POST['school'] != 3 && $_POST['school'] != 4 && $_POST['school'] != 5 && $_POST['school'] != 6){
                $role = mysqli_real_escape_string($database->con, $_POST['role']);
            } else {
                $role = 4;
            }
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
                    header("location:../cms/district.php?tab=sd&page=employment&error=true");
                }
            } else {
                header("location:../cms/district.php?tab=sd&page=employment&error=true");
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
                    header("location:../cms/district.php?tab=sd&page=employment&error=true");
                }
            } else {
                header("location:../cms/district.php?tab=sd&page=employment&error=true");
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

        if(isset($_GET['changeEventView'])){

            if($_SESSION['event_view'] == 'CALENDAR'){
                $_SESSION['event_view'] = 'LIST';
            } else {
                $_SESSION['event_view'] = 'CALENDAR';
            }

            header("location:../cms/district.php?tab=sd&page=events");

        }

        if(isset($_GET['eventDisable'])){
            
            $id = $_GET['id'];
            $title = $_GET['event'];
            $post_id = $_GET['post'];

            $district->disableEvent($database, $id, $title, $post_id);
        }

        if(isset($_GET['addEvent'])){

            // Counter
            $ctr_event = mysqli_real_escape_string($database->con, $_POST['ctr_value_event']);
            $i = 1;

            // Event Information
            $event_name = mysqli_real_escape_string($database->con, $_POST['event_name']);
            $event_shortname = mysqli_real_escape_string($database->con, $_POST['event_shortname']);
            $event_desc = mysqli_real_escape_string($database->con, $_POST['event_desc']);
            $event_type = mysqli_real_escape_string($database->con, $_POST['event_type']);
            $event_location = mysqli_real_escape_string($database->con, $_POST['event_location']);
            $event_school;

			if($_SESSION['type'] == 4){
				$event_school = $_SESSION['school'];
			} else {
				$event_school = 2;
			}

            //Event Post
            $post_title = mysqli_real_escape_string($database->con, $_POST['post_title']);
            $post_content = mysqli_real_escape_string($database->con, $_POST['post_content']);
            
            $post_thumbnail; 
            $post_id;

            if(!file_exists($_FILES['post_thumbnail']['tmp_name']) || !is_uploaded_file($_FILES['post_thumbnail']['tmp_name'])){

                $post_thumbnail = "post_thumbnail.jpg";
                
                $post_id = $district->addPostEvent($database, $post_title, $post_content, $event_desc, $post_thumbnail);

            } else {

                if(isset($_FILES['post_thumbnail'])){
                    $errors = 0;
                    $file_name = $_FILES['post_thumbnail']['name'];
                    $file_size = $_FILES['post_thumbnail']['size'];
                    $file_tmp = $_FILES['post_thumbnail']['tmp_name'];
                    $file_type = $_FILES['post_thumbnail']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['post_thumbnail']['name'])));
                    
                    if($file_size > 2097152){
                        $errors = 1;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../images/thumbnails/".$file_name);
                        $post_thumbnail = $file_name;
                        $post_id = $district->addPostEvent($database, $post_title, $post_content, $event_desc, $post_thumbnail);
                    } else {
                        header("location:../cms/district.php?tab=sd&page=events&error=true");
                    }
                } else {
                    header("location:../cms/district.php?tab=sd&page=events&error=true");
                }   
                
            }

            $event_id = $district->addEvent($database, $event_name, $event_shortname, $event_desc, $event_type, $post_id, $event_school, $event_location);

            $event_start;
            $event_end;

            //Event Setup
            if($event_type != 'Segmented'){
                if($event_type == 'Single'){
                    $event_start = mysqli_real_escape_string($database->con, $_POST['event_date_start_single_1']);
                    $event_end = mysqli_real_escape_string($database->con, $_POST['event_date_start_single_1']);
                    $event_final = mysqli_real_escape_string($database->con, $_POST['event_date_start_single_1']);
                    $event_time = mysqli_real_escape_string($database->con, $_POST['event_time_single_1']);

                    $district->addEventDays($database, $event_start, $event_end, $event_final, $event_time, $event_id);
                    if($i == $ctr_event){
                        header("location:../cms/district.php?tab=sd&page=events&newEvent=true");
                    }
                } else {
                    $event_start = mysqli_real_escape_string($database->con, $_POST['event_date_start_continuous_1']);
                    $event_end = mysqli_real_escape_string($database->con, $_POST['event_date_end_continuous_1']);
                    $event_final = mysqli_real_escape_string($database->con, $_POST['event_date_end_continuous_1']);
                    $event_time = mysqli_real_escape_string($database->con, $_POST['event_time_continuous_1']);

                    $district->addEventDays($database, $event_start, $event_end, $event_final, $event_time, $event_id);
                    if($i == $ctr_event){
                        header("location:../cms/district.php?tab=sd&page=events&newEvent=true");
                    }
                    echo $event_id . "<br>" . $event_start . "<br>" . $event_end . "<br>" . $event_time . "<br>" . $event_type . "<br>" . $event_school;
                }
            } else {
                for($i = 1; $i <= $ctr_event; $i++){
                    $event_start = mysqli_real_escape_string($database->con, $_POST['event_date_start_segmented_'.$i]);
                    $event_end = mysqli_real_escape_string($database->con, $_POST['event_date_start_segmented_'.$i]);
                    $event_final = mysqli_real_escape_string($database->con, $_POST['event_date_start_segmented_'.$ctr_event]);
                    $event_time = mysqli_real_escape_string($database->con, $_POST['event_time_segmented_'.$i]);

                    $district->addEventDays($database, $event_start, $event_end, $event_final, $event_time, $event_id);

                    if($i == $ctr_event){
                        header("location:../cms/district.php?tab=sd&page=events&newEvent=true");
                    }
                }
            }

        }

        if(isset($_GET['editEventDetails'])){

            $event_name = mysqli_real_escape_string($database->con, $_POST['edit_event_name']);
            $event_shortname = mysqli_real_escape_string($database->con, $_POST['edit_event_shortname']);
            $event_desc = mysqli_real_escape_string($database->con, $_POST['edit_event_desc']);
            $event_location = mysqli_real_escape_string($database->con, $_POST['edit_event_location']);
            $event_id = mysqli_real_escape_string($database->con, $_POST['edit_event_id']);

            $district->editEvent($database, $event_name, $event_shortname, $event_desc, $event_location, $event_id);
        }

        /*********************************************************************************************/
		/***************************  District Functionalities -- Forms  *****************************/
        /*********************************************************************************************/
        
        if(isset($_GET['formDisable'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['formName']);

            $district->disableForm($database, $id, $title);

        }

        if(isset($_GET['formReactivate'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['formName']);

            $district->reactivateForm($database, $id, $title);

        }

    }

?>