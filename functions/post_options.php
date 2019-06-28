<?php

    if(isset($_GET['post'])){

        session_start();
        require 'connect.php';
        require 'log.php';
        $database = new Database();
        $post = new Post();
        $log = new Log();

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
            if(isset($_POST['edit_post_desc']) || !empty($_POST['edit_post_desc'])){
                $post_desc = mysqli_real_escape_string($database->con, $_POST['edit_post_desc']);
            } else {
                $post_desc = "No description given.";
            }

            $post->editPost($database, $id, $post_id, $post_title, $post_content, $post_desc);

        }

        if(isset($_GET['addPost'])){

            $post_title = mysqli_real_escape_string($database->con, $_POST['post_title']);
            $post_content = mysqli_real_escape_string($database->con, $_POST['post_content']);
            $post_categories = mysqli_real_escape_string($database->con, $_POST['post_categories_id']);
            $post_thumbnail;
            $post_desc;
            if(isset($_POST['post_desc']) && !empty($_POST['post_desc'])){
                $post_desc = mysqli_real_escape_string($database->con, $_POST['post_desc']);
            } else {
                $post_desc = "No description given.";
            }

            $post_id;

            if(!file_exists($_FILES['post_thumbnail']['tmp_name']) || !is_uploaded_file($_FILES['post_thumbnail']['tmp_name'])){

                $post_thumbnail = mysqli_real_escape_string($database->con, $_POST['post_thumbnail_previous']);
                
                $post_id = $post->addPost($database, $post_title, $post_content, $post_thumbnail, $post_desc);

            } else {

                if(isset($_FILES['post_thumbnail'])){
                    $errors = 0;
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
                        move_uploaded_file($file_tmp, "../images/thumbnails/" . $file_name);
                        $post_thumbnail = $file_name;
                        $post_id = $post->addPost($database, $post_title, $post_content, $post_thumbnail, $post_desc);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png, .gif, .svg, .bmp.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location:../cms/district.php?tab=post&page=news&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=post&page=news&error=true");
                }   
                
            }

            $post_cats = explode(',', $post_categories);

            for($i = 0; $i <= count($post_cats); $i++){

                $post->addPostCategories($database, $post_id, $post_cats[$i]);

                if($i == count($post_cats)){
                    header("location:../cms/post.php?tab=post&page=news&addPost=true");
                }

            }

        }

        if(isset($_GET['editPostCategories'])){
            $id = mysqli_real_escape_string($database->con, $_POST['edit_post_cat_id']);
            $title = mysqli_real_escape_string($database->con, $_POST['edit_post_cat_id_name']);
            $categories = mysqli_real_escape_string($database->con, $_POST['edit_post_categories']);

            $post->deleteAllPostCategories($database, $id);

            $post_cats = explode(',', $categories);

            for($i = 0; $i <= count($post_cats); $i++){

                $post->addPostCategories($database, $id, $post_cats[$i]);

                if($i == count($post_cats)){
                    global $log;
					$info = "Modified news post categories: " . $title;
					$log->logInput($database, $info);
                    header("location:../cms/post.php?tab=post&page=news&editPostCategories=true");
                }

            }
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
                    $errors = 0;
                    $file_name = $_FILES['edit_link_content']['name'];
                    $file_size = $_FILES['edit_link_content']['size'];
                    $file_tmp = $_FILES['edit_link_content']['tmp_name'];
                    $file_type = $_FILES['edit_link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['edit_link_content']['name'])));
                    
                    if($file_size > 52428800){ // Limit file upload to 50 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = $file_name;
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
                    $errors = 0;
                    $file_name = $_FILES['link_content']['name'];
                    $file_size = $_FILES['link_content']['size'];
                    $file_tmp = $_FILES['link_content']['tmp_name'];
                    $file_type = $_FILES['link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['link_content']['name'])));
                    
                    if($file_size > 52428800){ // Limit file upload to 50 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = $file_name;
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
                    $errors = 0;
                    $file_name = $_FILES['link_thumbnail']['name'];
                    $file_size = $_FILES['link_thumbnail']['size'];
                    $file_tmp = $_FILES['link_thumbnail']['tmp_name'];
                    $file_type = $_FILES['link_thumbnail']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['link_thumbnail']['name'])));
                    
                    $extensions = array("jpeg","jpg","png","gif","svg","bmp");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit thumbnail upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../images/thumbnails/".$file_name);
                        $link_thumbnail = $file_name;
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
            $media_content = mysqli_real_escape_string($database->con, $_POST['edit_media_post_content']);
            $media_desc = mysqli_real_escape_string($database->con, $_POST['edit_media_post_content']);

            $post->editMedia($database, $id, $media_id, $media_title, $media_content, $media_desc);      

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
            $post_content = mysqli_real_escape_string($database->con, $_POST['media_content']);
            $post_desc = mysqli_real_escape_string($database->con, $_POST['media_content']);
            $post_categories = mysqli_real_escape_string($database->con, $_POST['media_categories_id']);
            $post_thumbnail;
            $post_id;

            if(!file_exists($_FILES['post_thumbnail']['tmp_name']) || !is_uploaded_file($_FILES['post_thumbnail']['tmp_name'])){

                $post_thumbnail = "post_thumbnail.jpg";
                
                $post_id = $post->addMedia($database, $post_title, $post_content, $post_thumbnail, $post_desc);

            } else {

                if(isset($_FILES['post_thumbnail'])){
                    $errors = 0;
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
                        move_uploaded_file($file_tmp, "../images/thumbnails/" . $file_name);
                        $post_thumbnail = $file_name;
                        $post_id = $post->addMedia($database, $post_title, $post_content, $post_thumbnail, $post_desc);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png, .gif, .svg, .bmp.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location:../cms/district.php?tab=post&page=media&error=true");
                    }
                } else {
                    header("location:../cms/post.php?tab=post&page=media&error=true");
                }    
                
            }

            $post_cats = explode(',', $post_categories);

            for($i = 0; $i <= count($post_cats); $i++){

                $post->addMediaCategories($database, $post_id, $post_cats[$i]);

                if($i == count($post_cats)){
                    header("location:../cms/post.php?tab=post&page=media&media_option=upload&media_id=" . $post_id);
                }

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