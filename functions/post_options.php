<?php

    if(isset($_GET['post'])){

        session_start();
        require 'connect.php';
        require 'log.php';
        $database = new Database();
        $post = new Post();
        $log = new Log();

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Posts Integrated **********************/
        /*********************************************************************************************/

        if(isset($_GET['postDisableIntegrated'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['postName']);

            $post->disablePost($database, $id, $title);

        }

        if(isset($_GET['postDisableEventIntegrated'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['postName']);

            $post->disablePostEvent($database, $id, $title);

        }

        if(isset($_GET['addPostIntegrated'])){

            $post_title = mysqli_real_escape_string($database->con, $_POST['post_title']);
            $post_content = mysqli_real_escape_string($database->con, $_POST['post_content']);
            $post_categories = mysqli_real_escape_string($database->con, $_POST['post_categories_id']);
            $post_type = mysqli_real_escape_string($database->con, $_POST['post_opt_type']);
            $sm_opt = mysqli_real_escape_string($database->con, $_POST['post_sm_autopost']);
            $ssd_opt = mysqli_real_escape_string($database->con, $_POST['post_ssd_autopost']);
            $post_thumbnail;
            $post_desc;
            if(isset($_POST['post_desc']) && !empty($_POST['post_desc'])){
                $post_desc = mysqli_real_escape_string($database->con, $_POST['post_desc']);
            } else {
                $post_desc = "No description given.";
            }

            $post_id;

            if(!file_exists($_FILES['post_thumbnail']['tmp_name']) || !is_uploaded_file($_FILES['post_thumbnail']['tmp_name'])){

                $post_thumbnail = "post_thumbnail.jpg";
                $post_id = $post->addPostIntegrated($database, $post_title, $post_content, $post_thumbnail, $post_desc, $post_type, $sm_opt, $ssd_opt);

            } else {

                if(isset($_FILES['post_thumbnail'])){
                    $imageFolder;
                
                    if($_SESSION['school'] == '3') {$imageFolder = "../../ness/images/thumbnails/";}
                    else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/images/thumbnails/";}
                    else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/images/thumbnails/";}
                    else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/images/thumbnails/";}
                    else {$imageFolder = "../images/thumbnails/";}

                    $errors = 0;
                    $file_name = $_FILES['post_thumbnail']['name'];
                    $file_size = $_FILES['post_thumbnail']['size'];
                    $file_tmp = $_FILES['post_thumbnail']['tmp_name'];
                    $file_type = $_FILES['post_thumbnail']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['post_thumbnail']['name'])));
                    $new_file_name = "THMB-SD92_".substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10).".".$file_ext;
                    
                    $extensions = array("jpeg","jpg","png");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit thumbnail upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, $imageFolder . $new_file_name);
                        $post_thumbnail = mysqli_real_escape_string($database->con, $new_file_name);
                        $post_id = $post->addPostIntegrated($database, $post_title, $post_content, $post_thumbnail, $post_desc, $sm_opt, $ssd_opt);
                    } else {
                        if($errors == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png.";
                        } else if($errors == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location:../cms/post.php?tab=post&page=news&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=post&page=news&error=true");
                }   
                
            }

            $post_cats = explode(',', $post_categories);

            if(!empty($post_cats[0])){
                if($_SESSION['type'] == 5 && !in_array(6, $post_cats)) array_push($post_cats, 6);
                for($i = 0; $i <= count($post_cats); $i++){
                    $post->addPostCategoriesIntegrated($database, $post_id, $post_cats[$i]);
                }
            } else {
                if($_SESSION['type'] == 5 ? $post->addPostCategoriesIntegrated($database, $post_id, 6) : $post->addPostCategoriesIntegrated($database, $post_id, 2));
            }

            if($post_type == 'Media'){
                $images = mysqli_real_escape_string($database->con, $_POST['image_name']);
                $images = rtrim($images, ',');
                $media_images = explode(',', $images);
                
                for($i = 0; $i < count($media_images); $i++){
                    $post->addPostImagesIntegrated($database, $post_id, $media_images[$i]);
                }
            }

            header("location:../cms/post.php?tab=post&page=posts&addPost=true");

        }

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Blog Posts  ***************************/
        /*********************************************************************************************/
        
        if(isset($_GET['postDisable'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['postName']);

            $post->disablePost($database, $id, $title);

        }

        if(isset($_GET['postDisableEvent'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['postName']);

            $post->disablePostEvent($database, $id, $title);

        }

        if(isset($_GET['editPost'])){

            $id = mysqli_real_escape_string($database->con, $_POST['edit_post_id']);
            $post_id = mysqli_real_escape_string($database->con, $_POST['edit_post_id_name']);
            $post_title = mysqli_real_escape_string($database->con, $_POST['edit_post_title']);
            $post_content = mysqli_real_escape_string($database->con, $_POST['edit_post_content']);
            $post_desc;
            $post_thumbnail;

            if(isset($_POST['edit_post_desc']) || !empty($_POST['edit_post_desc'])){
                $post_desc = mysqli_real_escape_string($database->con, $_POST['edit_post_desc']);
            } else {
                $post_desc = "No description given.";
            }

            if(!file_exists($_FILES['post_thumbnail']['tmp_name']) || !is_uploaded_file($_FILES['post_thumbnail']['tmp_name'])){

                $post_thumbnail = mysqli_real_escape_string($database->con, $_POST['post_thumbnail_previous']);;

            } else {

                if(isset($_FILES['post_thumbnail'])){
                    $imageFolder;
                
                    if($_SESSION['school'] == '3') {$imageFolder = "../../ness/images/thumbnails/";}
                    else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/images/thumbnails/";}
                    else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/images/thumbnails/";}
                    else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/images/thumbnails/";}
                    else {$imageFolder = "../images/thumbnails/";}

                    $errors = 0;
                    $file_name = $_FILES['post_thumbnail']['name'];
                    $file_size = $_FILES['post_thumbnail']['size'];
                    $file_tmp = $_FILES['post_thumbnail']['tmp_name'];
                    $file_type = $_FILES['post_thumbnail']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['post_thumbnail']['name'])));
                    $new_file_name = "THMB-SD92_".substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10).".".$file_ext;

                    $extensions = array("jpeg","jpg","png");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit thumbnail upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, $imageFolder . $new_file_name);
                        $post_thumbnail = mysqli_real_escape_string($database->con, $new_file_name);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location:../cms/post.php?tab=post&page=news&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=post&page=news&error=true");
                }
            }
            
            $post->editPost($database, $id, $post_id, $post_title, $post_content, $post_desc, $post_thumbnail);

        }

        if(isset($_GET['addPost'])){

            $post_title = mysqli_real_escape_string($database->con, $_POST['post_title']);
            $post_content = mysqli_real_escape_string($database->con, $_POST['post_content']);
            $post_categories = mysqli_real_escape_string($database->con, $_POST['post_categories_id']);
            $sm_opt = mysqli_real_escape_string($database->con, $_POST['post_sm_autopost']);
            $ssd_opt = mysqli_real_escape_string($database->con, $_POST['post_ssd_autopost']);
            $post_thumbnail;
            $post_desc;
            if(isset($_POST['post_desc']) && !empty($_POST['post_desc'])){
                $post_desc = mysqli_real_escape_string($database->con, $_POST['post_desc']);
            } else {
                $post_desc = "No description given.";
            }

            $post_id;

            if(!file_exists($_FILES['post_thumbnail']['tmp_name']) || !is_uploaded_file($_FILES['post_thumbnail']['tmp_name'])){

                $post_thumbnail = "post_thumbnail.jpg";
                $post_id = $post->addPost($database, $post_title, $post_content, $post_thumbnail, $post_desc, $sm_opt, $ssd_opt);

            } else {

                if(isset($_FILES['post_thumbnail'])){
                    $imageFolder;
                
                    if($_SESSION['school'] == '3') {$imageFolder = "../../ness/images/thumbnails/";}
                    else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/images/thumbnails/";}
                    else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/images/thumbnails/";}
                    else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/images/thumbnails/";}
                    else {$imageFolder = "../images/thumbnails/";}

                    $errors = 0;
                    $file_name = $_FILES['post_thumbnail']['name'];
                    $file_size = $_FILES['post_thumbnail']['size'];
                    $file_tmp = $_FILES['post_thumbnail']['tmp_name'];
                    $file_type = $_FILES['post_thumbnail']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['post_thumbnail']['name'])));
                    $new_file_name = "THMB-SD92_".substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10).".".$file_ext;
                    
                    $extensions = array("jpeg","jpg","png");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit thumbnail upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, $imageFolder . $new_file_name);
                        $post_thumbnail = mysqli_real_escape_string($database->con, $new_file_name);
                        $post_id = $post->addPost($database, $post_title, $post_content, $post_thumbnail, $post_desc, $sm_opt, $ssd_opt);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location:../cms/post.php?tab=post&page=news&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=post&page=news&error=true");
                }   
                
            }

            $post_cats = explode(',', $post_categories);

            if(!empty($post_cats[0])){
                if($_SESSION['type'] == 5 && !in_array(6, $post_cats)) array_push($post_cats, 6);
                for($i = 0; $i <= count($post_cats); $i++){

                    $post->addPostCategories($database, $post_id, $post_cats[$i]);
    
                    if($i == count($post_cats)){
                        header("location:../cms/post.php?tab=post&page=news&addPost=true");
                    }
    
                }
            } else {
                if($_SESSION['type'] == 5 ? $post->addPostCategories($database, $post_id, 6) : $post->addPostCategories($database, $post_id, 2));
                header("location:../cms/post.php?tab=post&page=news&addPost=true");
            }
            

        }

        if(isset($_GET['editPostCategories'])){
            $id = mysqli_real_escape_string($database->con, $_POST['edit_post_cat_id']);
            $title = mysqli_real_escape_string($database->con, $_POST['edit_post_cat_id_name']);
            $categories = mysqli_real_escape_string($database->con, $_POST['edit_post_categories']);

            $post->deleteAllPostCategories($database, $id);

            $post_cats = explode(',', $categories);

            if(!empty($post_cats[0])){
                if($_SESSION['type'] == 5 && !in_array(6, $post_cats)) array_push($post_cats, 6);
                for($i = 0; $i <= count($post_cats); $i++){

                    $post->addPostCategories($database, $id, $post_cats[$i]);
    
                    if($i == count($post_cats)){
                        global $log;
                        $info = "Modified news post categories: " . $title;
                        $log->logInput($database, $info);
                        header("location:../cms/post.php?tab=post&page=news&editPostCategories=true");
                    }
    
                }
            } else {
                if($_SESSION['type'] == 5 ? $post->addPostCategories($database, $post_id, 6) : $post->addPostCategories($database, $post_id, 2));
                header("location:../cms/post.php?tab=post&page=news&addPost=true");
            }
        }

		/*********************************************************************************************/
		/***************************  Post Functionalities -- Events  ********************************/
        /*********************************************************************************************/

        if(isset($_GET['changeEventView'])){

            if($_SESSION['event_view'] == 'CALENDAR'){
                $_SESSION['event_view'] = 'LIST';
            } else {
                $_SESSION['event_view'] = 'CALENDAR';
            }

            header("location:../cms/post.php?tab=post&page=events");

        }

        if(isset($_GET['eventDisable'])){
            
            $id = $_GET['id'];
            $title = $_GET['event'];
            $post_id = $_GET['post'];

            $post->disableEvent($database, $id, $title, $post_id);
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
                
                $post_id = $post->addPostEvent($database, $post_title, $post_content, $event_desc, $post_thumbnail, $sm_opt);

            } else {

                if(isset($_FILES['post_thumbnail'])){
                    $errors = 0;
                    $file_name = $_FILES['post_thumbnail']['name'];
                    $file_size = $_FILES['post_thumbnail']['size'];
                    $file_tmp = $_FILES['post_thumbnail']['tmp_name'];
                    $file_type = $_FILES['post_thumbnail']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['post_thumbnail']['name'])));
                    $new_file_name = "THMB-SD92_".substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10).".".$file_ext;

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
                        $post_id = $post->addPostEvent($database, $post_title, $post_content, $event_desc, $post_thumbnail, $sm_opt);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png, .gif, .svg, .bmp.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location:../cms/post.php?tab=post&page=events&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=post&page=events&error=true");
                }   
                
            }

            $event_id = $post->addEvent($database, $event_name, $event_shortname, $event_desc, $event_type, $post_id, $event_school, $event_location);

            $event_start;
            $event_end;

            //Event Setup
            if($event_type != 'Segmented'){
                if($event_type == 'Single'){
                    $event_start = mysqli_real_escape_string($database->con, $_POST['event_date_start_single_1']);
                    $event_end = mysqli_real_escape_string($database->con, $_POST['event_date_start_single_1']);
                    $event_final = mysqli_real_escape_string($database->con, $_POST['event_date_start_single_1']);
                    $event_time = mysqli_real_escape_string($database->con, $_POST['event_time_single_1']);

                    $post->addEventDays($database, $event_start, $event_end, $event_final, $event_time, $event_id);
                    if($i == $ctr_event){
                        header("location:../cms/post.php?tab=post&page=events&newEvent=true");
                    }
                } else {
                    $event_start = mysqli_real_escape_string($database->con, $_POST['event_date_start_continuous_1']);
                    $event_end = mysqli_real_escape_string($database->con, $_POST['event_date_end_continuous_1']);
                    $event_final = mysqli_real_escape_string($database->con, $_POST['event_date_end_continuous_1']);
                    $event_time = mysqli_real_escape_string($database->con, $_POST['event_time_continuous_1']);

                    $post->addEventDays($database, $event_start, $event_end, $event_final, $event_time, $event_id);
                    if($i == $ctr_event){
                        header("location:../cms/post.php?tab=post&page=events&newEvent=true");
                    }
                    echo $event_id . "<br>" . $event_start . "<br>" . $event_end . "<br>" . $event_time . "<br>" . $event_type . "<br>" . $event_school;
                }
            } else {
                for($i = 1; $i <= $ctr_event; $i++){
                    $event_start = mysqli_real_escape_string($database->con, $_POST['event_date_start_segmented_'.$i]);
                    $event_end = mysqli_real_escape_string($database->con, $_POST['event_date_start_segmented_'.$i]);
                    $event_final = mysqli_real_escape_string($database->con, $_POST['event_date_start_segmented_'.$ctr_event]);
                    $event_time = mysqli_real_escape_string($database->con, $_POST['event_time_segmented_'.$i]);

                    $post->addEventDays($database, $event_start, $event_end, $event_final, $event_time, $event_id);

                    if($i == $ctr_event){
                        header("location:../cms/post.php?tab=post&page=events&newEvent=true");
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

            $post->editEvent($database, $event_name, $event_shortname, $event_desc, $event_location, $event_id);
        }

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Links  ********************************/
        /*********************************************************************************************/
        
        if(isset($_GET['linkDisable'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['linkName']);

            $post->disableLink($database, $id, $title);

        }

        if(isset($_GET['linkReactivate'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['linkName']);

            $post->reactivateLink($database, $id, $title);

        }

        if(isset($_GET['editLink'])){

            $id = mysqli_real_escape_string($database->con, $_POST['edit_link_id']);
            $link_id = mysqli_real_escape_string($database->con, $_POST['edit_link_id_name']);
            $link_type = mysqli_real_escape_string($database->con, $_POST['edit_link_id_type']);
            $link_name = mysqli_real_escape_string($database->con, $_POST['edit_link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['edit_link_desc']);
            $link_tag = mysqli_real_escape_string($database->con, $_POST['edit_link_tag']);
            $link_content;

            if(!file_exists($_FILES['edit_link_content']['tmp_name']) || !is_uploaded_file($_FILES['edit_link_content']['tmp_name'])){

                if($link_type == "Link"){
                    $link_content = mysqli_real_escape_string($database->con, $_POST['edit_link_content']);
                } else {
                    $link_content = mysqli_real_escape_string($database->con, $_POST['edit_link_id_file']);
                }
                
                $post->editLink($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag);

            } else {

                if(isset($_FILES['edit_link_content'])){
                    $imageFolder;
                
                    if($_SESSION['school'] == '3') {$imageFolder = "../../ness/links/";}
                    else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/links/";}
                    else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/links/";}
                    else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/links/";}
                    else {$imageFolder = "../links/";}

                    $errors = 0;
                    $file_name = $_FILES['edit_link_content']['name'];
                    $file_size = $_FILES['edit_link_content']['size'];
                    $file_tmp = $_FILES['edit_link_content']['tmp_name'];
                    $file_type = $_FILES['edit_link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['edit_link_content']['name'])));
                    $new_file_name = "LNK-SD92_".substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10).".".$file_ext;

                    if($file_size > 52428800){ // Limit file upload to 50 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, $imageFolder . $new_file_name);
                        $link_content = mysqli_real_escape_string($database->con, $new_file_name);
                        $post->editLink($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag);
                    } else {
                        if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 50 MB.";
                        }
                        header("location:../cms/post.php?tab=post&page=links&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=post&page=links&error=true");
                }   
                
            }

        }

        if(isset($_GET['addLink'])){

            $link_name = mysqli_real_escape_string($database->con, $_POST['link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['link_desc']);
            $link_type = mysqli_real_escape_string($database->con, $_POST['link_type']);
            $link_tag = mysqli_real_escape_string($database->con, $_POST['link_tag']);
            $link_content;
            $link_thumbnail;

            if(!file_exists($_FILES['link_content']['tmp_name']) || !is_uploaded_file($_FILES['link_content']['tmp_name'])){

                $link_content = mysqli_real_escape_string($database->con, $_POST['link_content']);

            } else {

                if(isset($_FILES['link_content'])){
                    $imageFolder;
                
                    if($_SESSION['school'] == '3') {$imageFolder = "../../ness/links/";}
                    else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/links/";}
                    else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/links/";}
                    else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/links/";}
                    else {$imageFolder = "../links/";}

                    $errors = 0;
                    $file_name = $_FILES['link_content']['name'];
                    $file_size = $_FILES['link_content']['size'];
                    $file_tmp = $_FILES['link_content']['tmp_name'];
                    $file_type = $_FILES['link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['link_content']['name'])));
                    $new_file_name = "LNK-SD92_".substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10).".".$file_ext;

                    if($file_size > 52428800){ // Limit file upload to 50 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, $imageFolder . $new_file_name);
                        $link_content = mysqli_real_escape_string($database->con, $new_file_name);
                    } else {
                        if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 50 MB.";
                        }
                        header("location:../cms/post.php?tab=post&page=links&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=post&page=links&error=true");
                }   
                
            }

            if(!file_exists($_FILES['link_thumbnail']['tmp_name']) || !is_uploaded_file($_FILES['link_thumbnail']['tmp_name'])){

                $link_thumbnail = "post_thumbnail.jpg";
                
                $post->addLink($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail);

            } else {

                if(isset($_FILES['link_thumbnail'])){
                    $imageFolder;
                
                    if($_SESSION['school'] == '3') {$imageFolder = "../../ness/images/thumbnails/";}
                    else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/images/thumbnails/";}
                    else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/images/thumbnails/";}
                    else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/images/thumbnails/";}
                    else {$imageFolder = "../images/thumbnails/";}

                    $errors = 0;
                    $file_name = $_FILES['link_thumbnail']['name'];
                    $file_size = $_FILES['link_thumbnail']['size'];
                    $file_tmp = $_FILES['link_thumbnail']['tmp_name'];
                    $file_type = $_FILES['link_thumbnail']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['link_thumbnail']['name'])));
                    $new_file_name = "THMB-SD92_".substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10).".".$file_ext;

                    $extensions = array("jpeg","jpg","png","gif","svg","bmp");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit thumbnail upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, $imageFolder . $new_file_name);
                        $link_thumbnail = mysqli_real_escape_string($database->con, $new_file_name);
                        $post->addLink($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png, .gif, .svg, .bmp.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location:../cms/post.php?tab=post&page=links&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=post&page=links&error=true");
                }   
                
            }

        }

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Categories  ***************************/
        /*********************************************************************************************/

        if(isset($_GET['newCategory'])){

            $cat_name = mysqli_real_escape_string($database->con, $_POST['cat_name']);

            $post->addCategory($database, $cat_name);

        }

        if(isset($_GET['catDisable'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['cat']);

            $post->disableCategory($database, $id, $title);

        }

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Media Posts ***************************/
		/*********************************************************************************************/

        if(isset($_GET['editMedia'])){

            $id = mysqli_real_escape_string($database->con, $_POST['edit_media_post_id']);
            $media_id = mysqli_real_escape_string($database->con, $_POST['edit_media_post_id_name']);
            $media_title = mysqli_real_escape_string($database->con, $_POST['edit_media_post_title']);
            $media_thumbnail;
            $media_content;
            $media_desc;

            if(isset($_POST['edit_media_post_content']) && !empty($_POST['edit_media_post_content'])){
                $media_content = mysqli_real_escape_string($database->con, $_POST['edit_media_post_content']);
                $media_desc = mysqli_real_escape_string($database->con, $_POST['edit_media_post_content']);
            } else {
                $media_desc = "No description given.";
                $media_content = "";
            }

            if(!file_exists($_FILES['post_thumbnail']['tmp_name']) || !is_uploaded_file($_FILES['post_thumbnail']['tmp_name'])){

                $media_thumbnail = mysqli_real_escape_string($database->con, $_POST['post_thumbnail_previous']);;

            } else {

                if(isset($_FILES['post_thumbnail'])){
                    $imageFolder;
                
                    if($_SESSION['school'] == '3') {$imageFolder = "../../ness/images/thumbnails/";}
                    else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/images/thumbnails/";}
                    else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/images/thumbnails/";}
                    else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/images/thumbnails/";}
                    else {$imageFolder = "../images/thumbnails/";}

                    $errors = 0;
                    $file_name = $_FILES['post_thumbnail']['name'];
                    $file_size = $_FILES['post_thumbnail']['size'];
                    $file_tmp = $_FILES['post_thumbnail']['tmp_name'];
                    $file_type = $_FILES['post_thumbnail']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['post_thumbnail']['name'])));
                    $new_file_name = "THMB-SD92_".substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10).".".$file_ext;

                    $extensions = array("jpeg","jpg","png");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit thumbnail upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, $imageFolder . $new_file_name);
                        $media_thumbnail = mysqli_real_escape_string($database->con, $new_file_name);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location:../cms/post.php?tab=post&page=news&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=post&page=news&error=true");
                }
            }

            $post->editMedia($database, $id, $media_id, $media_title, $media_content, $media_desc, $media_thumbnail);      

        }

        if(isset($_GET['editMediaCategories'])){
            $id = mysqli_real_escape_string($database->con, $_POST['edit_media_cat_id']);
            $title = mysqli_real_escape_string($database->con, $_POST['edit_media_cat_id_name']);
            $categories = mysqli_real_escape_string($database->con, $_POST['edit_media_categories']);

            $post->deleteAllMediaCategories($database, $id);

            $post_cats = explode(',', $categories);

            for($i = 0; $i <= count($post_cats); $i++){

                $post->addMediaCategories($database, $id, $post_cats[$i]);

                if($i == count($post_cats)){
                    global $log;
					$info = "Modified media post categories: " . $title;
					$log->logInput($database, $info);
                    header("location:../cms/post.php?tab=post&page=media&editMediaCategories=true");
                }

            }
        }

        if(isset($_GET['mediaDisable'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['mediaName']);

            $post->disableMedia($database, $id, $title);

        }

        if(isset($_GET['addMedia'])){

            $post_title = mysqli_real_escape_string($database->con, $_POST['media_title']);
            $post_categories = mysqli_real_escape_string($database->con, $_POST['media_categories_id']);
            $sm_opt = mysqli_real_escape_string($database->con, $_POST['media_sm_autopost']);
            $ssd_opt = mysqli_real_escape_string($database->con, $_POST['media_ssd_autopost']);
            $post_thumbnail;
            $post_id;
            $post_content;
            $post_desc;

            if(isset($_POST['media_content']) && !empty($_POST['media_content'])){
                $post_content = mysqli_real_escape_string($database->con, $_POST['media_content']);
                $post_desc = mysqli_real_escape_string($database->con, $_POST['media_content']);
            } else {
                $post_desc = "No description given.";
                $post_content = "";
            }

            if(!file_exists($_FILES['media_thumbnail']['tmp_name']) || !is_uploaded_file($_FILES['media_thumbnail']['tmp_name'])){

                $post_thumbnail = "post_thumbnail.jpg";
                
                $post_id = $post->addMedia($database, $post_title, $post_content, $post_thumbnail, $post_desc, $sm_opt, $ssd_opt);

            } else {

                if(isset($_FILES['media_thumbnail'])){
                    $imageFolder;
                
                    if($_SESSION['school'] == '3') {$imageFolder = "../../ness/images/thumbnails/";}
                    else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/images/thumbnails/";}
                    else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/images/thumbnails/";}
                    else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/images/thumbnails/";}
                    else {$imageFolder = "../images/thumbnails/";}

                    $errors = 0;
                    $file_name = $_FILES['media_thumbnail']['name'];
                    $file_size = $_FILES['media_thumbnail']['size'];
                    $file_tmp = $_FILES['media_thumbnail']['tmp_name'];
                    $file_type = $_FILES['media_thumbnail']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['media_thumbnail']['name'])));
                    $new_file_name = "THMB-SD92_".substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10).".".$file_ext;

                    $extensions = array("jpeg","jpg","png","gif","svg","bmp");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit thumbnail upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, $imageFolder . $new_file_name);
                        $post_thumbnail = mysqli_real_escape_string($database->con, $new_file_name);
                        $post_id = $post->addMedia($database, $post_title, $post_content, $post_thumbnail, $post_desc, $sm_opt, $ssd_opt);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png, .gif, .svg, .bmp.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location:../cms/post.php?tab=post&page=media&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=post&page=media&error=true");
                }    
                
            }

            $post_cats = explode(',', $post_categories);

            if(!empty($post_cats[0])){
                for($i = 0; $i <= count($post_cats); $i++){

                    $post->addMediaCategories($database, $post_id, $post_cats[$i]);
    
                    if($i == count($post_cats)){
                        header("location:../cms/post.php?tab=post&page=media&media_option=upload&media_id=" . $post_id);
                    }
    
                }
            } else {
                $post->addMediaCategories($database, $post_id, 2);
                header("location:../cms/post.php?tab=post&page=media&media_option=upload&media_id=" . $post_id);
            }

        }

        if(isset($_GET['addMediaImages'])){
            $id = mysqli_real_escape_string($database->con, $_POST['image_media_id']);
            $images = mysqli_real_escape_string($database->con, $_POST['image_media_name']);
            $images = rtrim($images, ',');
            $media_images = explode(',', $images);
            
            for($i = 0; $i < count($media_images); $i++){
                
                $post->addMediaImages($database, $id, $media_images[$i]);

                if($i == count($media_images)-1){
                    header("location:../cms/post.php?tab=post&page=media&addMedia=true");
                }
            }
        }

    }

?>