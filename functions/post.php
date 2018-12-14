<?php

    Class Post {

		public function schoolList($database){
			
			$array = array();
			$sql = "SELECT * FROM schools";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../cms/?error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
			
		}

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Blog Posts  ***************************/
        /*********************************************************************************************/

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Links  ********************************/
        /*********************************************************************************************/
        
        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Categories  ***************************/
        /*********************************************************************************************/

		public function categoryList($database){
			
			$array = array();
			$sql = "SELECT * FROM categories
					WHERE status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../cms/post.php?tab=posts&page=categories&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
			
		}

		public function categoriesPerPostList($database, $post){
			$array = array();
			$sql = "SELECT categories.cat_desc
					FROM categories 
					LEFT JOIN post_categories
					ON (categories.id = post_categories.cat_id)
					WHERE post_categories.post_id = '$post'
					AND categories.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				//header("location:../cms/post.php?tab=posts&page=categories&error=true");
				echo("Error description: " . mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
		}

		public function postsPerCategoryList($database, $category){
			$array = array();
			$sql = "SELECT posts.*,
						   categories.cat_desc,
						   users.firstname,
						   users.lastname
					FROM post_categories 
					LEFT JOIN posts
					ON (posts.id = post_categories.post_id)
					LEFT JOIN categories
					ON (categories.id = post_categories.cat_id)
					LEFT JOIN users
					ON (users.id = posts.post_author)
					WHERE post_categories.cat_id = '$category'
					AND posts.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location:../cms/post.php?tab=posts&page=categories&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
		}

		public function addCategory($database, $cat_name){
			
			$sql = "INSERT INTO categories
					VALUES (null, '$cat_name', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				//header("location:../cms/post.php?tab=posts&page=categories&error=true");
				echo("Error description: " . mysqli_error($database->con));
			} else {
				global $log;
				$info = "Created a new category: " . $cat_name;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=posts&page=categories&newCategory=true");
			}

		}

		public function disableCategory($database, $id, $title){

			$sql = "UPDATE categories SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=posts&page=categories&error=true");
			} else {
				global $log;
				$info = "Disabled the category " . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=posts&page=categories&categoryDisabled=true");
			}	
	
		}

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Media Posts ***************************/
		/*********************************************************************************************/

    }

    require 'post_options.php';

?>