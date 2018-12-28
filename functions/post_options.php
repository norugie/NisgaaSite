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
            $title = $_GET['postName'];

            $post->disablePost($database, $id, $title);

        }

        if(isset($_GET['postDisableEvent'])){
            
            $id = $_GET['id'];
            $title = $_GET['postName'];

            $post->disablePostEvent($database, $id, $title);

        }

        if(isset($_GET['editPost'])){

            $id = mysqli_real_escape_string($database->con, $_POST['edit_post_id']);
            $post_id = mysqli_real_escape_string($database->con, $_POST['edit_post_id_name']);
            $post_title = mysqli_real_escape_string($database->con, $_POST['edit_post_title']);
            $post_content = mysqli_real_escape_string($database->con, $_POST['edit_post_content']);

            $post->editPost($database, $id, $post_id, $post_title, $post_content);

        }

        if(isset($_GET['addPost'])){

            $post_title = mysqli_real_escape_string($database->con, $_POST['post_title']);
            $post_content = mysqli_real_escape_string($database->con, $_POST['post_content']);
            $post_categories = mysqli_real_escape_string($database->con, $_POST['post_categories_id']);

            $post_id = $post->addPost($database, $post_title, $post_content);

            echo $post_id;

            $post_cats = explode(',', $post_categories);

            for($i = 0; $i <= count($post_cats); $i++){

                $post->addPostCategories($database, $post_id, $post_cats[$i]);

                if($i == count($post_cats)){
                    header("location:../cms/post.php?tab=post&page=blog&addPost=true");
                }

            }

        }

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Links  ********************************/
        /*********************************************************************************************/
        
        if(isset($_GET['linkDisable'])){
            
            $id = $_GET['id'];
            $title = $_GET['linkName'];

            $post->disableLink($database, $id, $title);

        }

        if(isset($_GET['linkReactivate'])){
            
            $id = $_GET['id'];
            $title = $_GET['linkName'];

            $post->reactivateLink($database, $id, $title);

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
            $title = $_GET['cat'];

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

            $post->editMedia($database, $id, $media_id, $media_title, $media_content);       

        }

        if(isset($_GET['mediaDisable'])){
            
            $id = $_GET['id'];
            $title = $_GET['mediaName'];

            $post->disableMedia($database, $id, $title);

        }

    }

?>