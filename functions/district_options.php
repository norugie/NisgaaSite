<?php

    if(isset($_GET['district'])){

        session_start();
        require 'connect.php';
        require 'log.php';
        $database = new Database();
        $district = new District();
        $log = new Log();

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
                
                $extensions = array("doc","docx","pdf");
                
                if(in_array($file_ext, $extensions) == false){
                    $errors = 1;
                }
                
                if($file_size > 20971520){ // Limit job file upload to 20MB
                    $errors = 2;
                }
                
                if($errors == 0){
                    move_uploaded_file($file_tmp, "../jobs/" . $file_name);
                    $file_name = mysqli_real_escape_string($database->con, $file_name);
                    $district->addJob($database, $id, $title, $jobdesc, $jobtype, $school, $jobopen, $jobclose, $file_name);
                } else {
                    if($error == 1){
                        $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .doc, .docx, .pdf.";
                    } else if($error == 2){
                        $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 20 MB.";
                    }
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
                
                $extensions = array("doc","docx","pdf");
                
                if(in_array($file_ext, $extensions) == false){
                    $errors = 1;
                }
                
                if($file_size > 20971520){ // Limit job file upload to 20 MB
                    $errors = 2;
                }
                
                if($errors == 0){
                    move_uploaded_file($file_tmp, "../jobs/" . $file_name);
                    $file_name = mysqli_real_escape_string($database->con, $file_name);
                    $district->editJobFile($database, $id, $title, $file_name);
                } else {
                    if($error == 1){
                        $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .doc, .docx, .pdf.";
                    } else if($error == 2){
                        $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 20 MB.";
                    }
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
            $sm_opt = mysqli_real_escape_string($database->con, $_POST['post_sm_autopost']);
            $post_thumbnail; 
            $post_id;

            if(!file_exists($_FILES['post_thumbnail']['tmp_name']) || !is_uploaded_file($_FILES['post_thumbnail']['tmp_name'])){

                $post_thumbnail = "post_thumbnail.jpg";
                
                $post_id = $district->addPostEvent($database, $post_title, $post_content, $event_desc, $post_thumbnail, $sm_opt);

            } else {

                if(isset($_FILES['post_thumbnail'])){
                    $errors = 0;
                    $new_file_name = "THMB".rand(111111111,999999999);
                    $file_name = $_FILES['post_thumbnail']['name'];
                    $file_size = $_FILES['post_thumbnail']['size'];
                    $file_tmp = $_FILES['post_thumbnail']['tmp_name'];
                    $file_type = $_FILES['post_thumbnail']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['post_thumbnail']['name'])));
                    
                    $extensions = array("jpeg","jpg","png","gif","svg","bmp");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit thumbnail upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../images/thumbnails/" . $new_file_name);
                        $post_thumbnail = mysqli_real_escape_string($database->con, $new_file_name);
                        $post_id = $district->addPostEvent($database, $post_title, $post_content, $event_desc, $post_thumbnail, $sm_opt);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png, .gif, .svg, .bmp.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
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

        if(isset($_GET['editForm'])){

            $id = mysqli_real_escape_string($database->con, $_POST['edit_link_id']);
            $link_id = mysqli_real_escape_string($database->con, $_POST['edit_link_id_name']);
            $link_type = mysqli_real_escape_string($database->con, $_POST['edit_link_id_type']);
            $link_name = mysqli_real_escape_string($database->con, $_POST['edit_link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['edit_link_desc']);
            $link_tag = "District Forms";
            $link_content;

            if(!file_exists($_FILES['edit_link_content']['tmp_name']) || !is_uploaded_file($_FILES['edit_link_content']['tmp_name'])){

                if($link_type == 'Link'){
                    $link_content = mysqli_real_escape_string($database->con, $_POST['edit_link_content']);
                } else {
                    $link_content = mysqli_real_escape_string($database->con, $_POST['edit_link_id_file']);
                }

            } else {

                if(isset($_FILES['edit_link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['edit_link_content']['name'];
                    $file_size = $_FILES['edit_link_content']['size'];
                    $file_tmp = $_FILES['edit_link_content']['tmp_name'];
                    $file_type = $_FILES['edit_link_content']['type'];
                    
                    if($file_size > 52428800){ // Limit file upload to 50 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/" . $file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                    } else {
                        if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 50 MB.";
                        }
                        header("location:../cms/post.php?tab=sd&page=files&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=sd&page=files&error=true");
                }   
                
            }

            $district->editForm($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag);

        }

        if(isset($_GET['addForm'])){

            $link_name = mysqli_real_escape_string($database->con, $_POST['link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['link_desc']);
            $link_type = mysqli_real_escape_string($database->con, $_POST['link_type']);
            $link_tag = "District Forms";
            $link_content;
            $link_thumbnail = "post_thumbnail.jpg";

            if(!file_exists($_FILES['link_content']['tmp_name']) || !is_uploaded_file($_FILES['link_content']['tmp_name'])){

                $link_content = mysqli_real_escape_string($database->con, $_POST['link_content']);
                $district->addForm($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail);

            } else {

                if(isset($_FILES['link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['link_content']['name'];
                    $file_size = $_FILES['link_content']['size'];
                    $file_tmp = $_FILES['link_content']['tmp_name'];
                    $file_type = $_FILES['link_content']['type'];
                    
                    if($file_size > 52428800){ // Limit file upload to 50 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                        $district->addForm($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail);
                    } else {
                        if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 50 MB.";
                        }
                        header("location:../cms/district.php?tab=sd&page=files&error=true");
                    }
                } else {
                    header("location:../cms/district.php?tab=sd&page=files&error=true");
                }   
                
            }

        }

        /*********************************************************************************************/
		/***************************  District Functionalities -- Packages  **************************/
        /*********************************************************************************************/
        
        if(isset($_GET['packageDisable'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['packageName']);

            $district->disablePackage($database, $id, $title);

        }

        if(isset($_GET['packageReactivate'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['packageName']);

            $district->reactivatePackage($database, $id, $title);

        }

        if(isset($_GET['editPackage'])){

            $id = mysqli_real_escape_string($database->con, $_POST['edit_link_id']);
            $link_id = mysqli_real_escape_string($database->con, $_POST['edit_link_id_name']);
            $link_type = mysqli_real_escape_string($database->con, $_POST['edit_link_id_type']);
            $link_name = mysqli_real_escape_string($database->con, $_POST['edit_link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['edit_link_desc']);
            $link_tag = "Board Meeting Packages";
            $link_content;

            if(!file_exists($_FILES['edit_link_content']['tmp_name']) || !is_uploaded_file($_FILES['edit_link_content']['tmp_name'])){
                if($link_type == 'Link'){
                    $link_content = mysqli_real_escape_string($database->con, $_POST['edit_link_content']);
                } else {
                    $link_content = mysqli_real_escape_string($database->con, $_POST['edit_link_id_file']);
                }

            } else {

                if(isset($_FILES['edit_link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['edit_link_content']['name'];
                    $file_size = $_FILES['edit_link_content']['size'];
                    $file_tmp = $_FILES['edit_link_content']['tmp_name'];
                    $file_type = $_FILES['edit_link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['edit_link_content']['name'])));
                
                    $extensions = array("doc","docx","pdf");
                    
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 20971520){ // Limit package file upload to 20MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .doc, .docx, .pdf.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 20 MB.";
                        }
                        header("location:../cms/post.php?tab=sd&page=packages&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=sd&page=packages&error=true");
                }   
                
            }

            $district->editPackage($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag);

        }

        if(isset($_GET['addPackage'])){

            $link_name = mysqli_real_escape_string($database->con, $_POST['link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['link_desc']);
            $link_type = mysqli_real_escape_string($database->con, $_POST['link_type']);
            $link_tag = "Board Meeting Packages";
            $link_content;
            $link_thumbnail = "post_thumbnail.jpg";

            if(!file_exists($_FILES['link_content']['tmp_name']) || !is_uploaded_file($_FILES['link_content']['tmp_name'])){

                $link_content = mysqli_real_escape_string($database->con, $_POST['link_content']);
                $district->addPackage($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail);

            } else {

                if(isset($_FILES['link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['link_content']['name'];
                    $file_size = $_FILES['link_content']['size'];
                    $file_tmp = $_FILES['link_content']['tmp_name'];
                    $file_type = $_FILES['link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['link_content']['name'])));
                
                    $extensions = array("doc","docx","pdf");
                    
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }
                    
                    if($file_size > 20971520){ // Limit package file upload to 20MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                        $district->addPackage($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .doc, .docx, .pdf.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 20 MB.";
                        }
                        header("location:../cms/district.php?tab=sd&page=packages&error=true");
                    }
                } else {
                    header("location:../cms/district.php?tab=sd&page=packages&error=true");
                }   
                
            }

        }

        /*********************************************************************************************/
		/***************************  District Functionalities -- Directives  ************************/
        /*********************************************************************************************/
        
        if(isset($_GET['directiveDisable'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['directiveName']);

            $district->disableDirective($database, $id, $title);

        }

        if(isset($_GET['directiveReactivate'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['directiveName']);

            $district->reactivateDirective($database, $id, $title);

        }

        if(isset($_GET['editDirective'])){

            $id = mysqli_real_escape_string($database->con, $_POST['edit_link_id']);
            $link_id = mysqli_real_escape_string($database->con, $_POST['edit_link_id_name']);
            $link_type = "File";
            $link_name = mysqli_real_escape_string($database->con, $_POST['edit_link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['edit_link_desc']);
            $link_tag = "BOE PAD";
            $link_content;

            if(!file_exists($_FILES['edit_link_content']['tmp_name']) || !is_uploaded_file($_FILES['edit_link_content']['tmp_name'])){

                $link_content = mysqli_real_escape_string($database->con, $_POST['edit_link_id_file']);

            } else {

                if(isset($_FILES['edit_link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['edit_link_content']['name'];
                    $file_size = $_FILES['edit_link_content']['size'];
                    $file_tmp = $_FILES['edit_link_content']['tmp_name'];
                    $file_type = $_FILES['edit_link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['edit_link_content']['name'])));
                
                    $extensions = array("doc","docx","pdf");
                    
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 20971520){ // Limit file upload to 20MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .doc, .docx, .pdf.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 20 MB.";
                        }
                        header("location:../cms/post.php?tab=sd&page=directives&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=sd&page=directives&error=true");
                }   
                
            }

            $district->editDirective($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag);

        }

        if(isset($_GET['addDirective'])){

            $link_name = mysqli_real_escape_string($database->con, $_POST['link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['link_desc']);
            $link_type = "File";
            $link_tag = "BOE PAD";
            $link_content;
            $link_thumbnail = "post_thumbnail.jpg";

            if(file_exists($_FILES['link_content']['tmp_name']) || is_uploaded_file($_FILES['link_content']['tmp_name'])){
                if(isset($_FILES['link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['link_content']['name'];
                    $file_size = $_FILES['link_content']['size'];
                    $file_tmp = $_FILES['link_content']['tmp_name'];
                    $file_type = $_FILES['link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['link_content']['name'])));
                
                    $extensions = array("doc","docx","pdf");
                    
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }
                    
                    if($file_size > 20971520){ // Limit directive file upload to 20MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                        $district->addDirective($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .doc, .docx, .pdf.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 20 MB.";
                        }
                        header("location:../cms/district.php?tab=sd&page=directives&error=true");
                    }
                } else {
                    header("location:../cms/district.php?tab=sd&page=directives&error=true");
                }   
                
            }

        }

        /*********************************************************************************************/
		/***************************  District Functionalities -- Policy  ****************************/
        /*********************************************************************************************/
        
        if(isset($_GET['policyDisable'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['policyName']);

            $district->disablePolicy($database, $id, $title);

        }

        if(isset($_GET['policyReactivate'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['policyName']);

            $district->reactivatePolicy($database, $id, $title);

        }

        if(isset($_GET['editPolicy'])){

            $id = mysqli_real_escape_string($database->con, $_POST['edit_link_id']);
            $link_id = mysqli_real_escape_string($database->con, $_POST['edit_link_id_name']);
            $link_type = "File";
            $link_name = mysqli_real_escape_string($database->con, $_POST['edit_link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['edit_link_desc']);
            $link_tag = mysqli_real_escape_string($database->con, $_POST['edit_link_tag']);;
            $link_content;

            if(!file_exists($_FILES['edit_link_content']['tmp_name']) || !is_uploaded_file($_FILES['edit_link_content']['tmp_name'])){

                $link_content = mysqli_real_escape_string($database->con, $_POST['edit_link_id_file']);

            } else {

                if(isset($_FILES['edit_link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['edit_link_content']['name'];
                    $file_size = $_FILES['edit_link_content']['size'];
                    $file_tmp = $_FILES['edit_link_content']['tmp_name'];
                    $file_type = $_FILES['edit_link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['edit_link_content']['name'])));
                
                    $extensions = array("doc","docx","pdf");
                    
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 20971520){ // Limit file upload to 20MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .doc, .docx, .pdf.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 20 MB.";
                        }
                        header("location:../cms/post.php?tab=sd&page=policy&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=sd&page=policy&error=true");
                }   
                
            }

            $district->editPolicy($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag);

        }

        if(isset($_GET['addPolicy'])){

            $link_name = mysqli_real_escape_string($database->con, $_POST['link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['link_desc']);
            $link_type = "File";
            $link_tag = mysqli_real_escape_string($database->con, $_POST['link_tag']);
            $link_content;
            $link_thumbnail = "post_thumbnail.jpg";

            if(file_exists($_FILES['link_content']['tmp_name']) || is_uploaded_file($_FILES['link_content']['tmp_name'])){
                if(isset($_FILES['link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['link_content']['name'];
                    $file_size = $_FILES['link_content']['size'];
                    $file_tmp = $_FILES['link_content']['tmp_name'];
                    $file_type = $_FILES['link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['link_content']['name'])));
                
                    $extensions = array("doc","docx","pdf");
                    
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }
                    
                    if($file_size > 20971520){ // Limit job file upload to 20MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                        $district->addPolicy($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .doc, .docx, .pdf.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 20 MB.";
                        }
                        header("location:../cms/district.php?tab=sd&page=policy&error=true");
                    }
                } else {
                    header("location:../cms/district.php?tab=sd&page=policy&error=true");
                }   
                
            }

        }

        /*********************************************************************************************/
		/***************************  District Functionalities -- Plan  ******************************/
        /*********************************************************************************************/
        
        if(isset($_GET['planDisable'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['planName']);

            $district->disablePlan($database, $id, $title);

        }

        if(isset($_GET['planReactivate'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['planName']);

            $district->reactivatePlan($database, $id, $title);

        }

        if(isset($_GET['editPlan'])){

            $id = mysqli_real_escape_string($database->con, $_POST['edit_link_id']);
            $link_id = mysqli_real_escape_string($database->con, $_POST['edit_link_id_name']);
            $link_type = "File";
            $link_name = mysqli_real_escape_string($database->con, $_POST['edit_link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['edit_link_desc']);
            $link_tag = "Plans";
            $link_content;

            if(!file_exists($_FILES['edit_link_content']['tmp_name']) || !is_uploaded_file($_FILES['edit_link_content']['tmp_name'])){

                $link_content = mysqli_real_escape_string($database->con, $_POST['edit_link_id_file']);

            } else {

                if(isset($_FILES['edit_link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['edit_link_content']['name'];
                    $file_size = $_FILES['edit_link_content']['size'];
                    $file_tmp = $_FILES['edit_link_content']['tmp_name'];
                    $file_type = $_FILES['edit_link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['edit_link_content']['name'])));
                
                    $extensions = array("doc","docx","pdf");
                    
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 20971520){ // Limit file upload to 20MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .doc, .docx, .pdf.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 20 MB.";
                        }
                        header("location:../cms/post.php?tab=sd&page=plans&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=sd&page=plans&error=true");
                }   
                
            }

            $district->editPlan($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag);

        }

        if(isset($_GET['addPlan'])){

            $link_name = mysqli_real_escape_string($database->con, $_POST['link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['link_desc']);
            $link_type = "File";
            $link_tag = "Plans";
            $link_content;
            $link_thumbnail = "post_thumbnail.jpg";

            if(file_exists($_FILES['link_content']['tmp_name']) || is_uploaded_file($_FILES['link_content']['tmp_name'])){
                if(isset($_FILES['link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['link_content']['name'];
                    $file_size = $_FILES['link_content']['size'];
                    $file_tmp = $_FILES['link_content']['tmp_name'];
                    $file_type = $_FILES['link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['link_content']['name'])));
                
                    $extensions = array("doc","docx","pdf");
                    
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }
                    
                    if($file_size > 20971520){ // Limit job file upload to 20MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                        $district->addPlan($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .doc, .docx, .pdf.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 20 MB.";
                        }
                        header("location:../cms/district.php?tab=sd&page=plans&error=true");
                    }
                } else {
                    header("location:../cms/district.php?tab=sd&page=plans&error=true");
                }   
                
            }

        }

    }

?>