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

		public function postList($database){
			$array = array();
			$sql = "SELECT posts.*,
						   users.firstname,
						   users.lastname,
						   schools.school_abbv
					FROM posts
					LEFT JOIN users
					ON (users.id = posts.post_author)
					LEFT JOIN schools
					ON (schools.id = posts.post_school)
					WHERE posts.post_type = 'Post' 
					AND posts.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location:../cms/post.php?tab=post&page=blog&error=true");
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
						   users.lastname,
						   schools.school_abbv
					FROM post_categories 
					LEFT JOIN posts
					ON (posts.id = post_categories.post_id)
					LEFT JOIN categories
					ON (categories.id = post_categories.cat_id)
					LEFT JOIN users
					ON (users.id = posts.post_author)
					LEFT JOIN schools
					ON (schools.id = posts.post_school)
					WHERE post_categories.cat_id = '$category'
					AND posts.post_type = 'Post'
					AND posts.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location:../cms/post.php?tab=post&page=blog&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
		}

		public function disablePostEvent($database, $id, $title){

			$sql = "UPDATE posts SET 
						   status = 'Archived'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=post&page=blog&error=true");
			} else {
				global $log;
				$info = "Archived event post ID: " . $title;
				$log->logInput($database, $info);

				$sql = "UPDATE events SET 
							   status = 'Cancelled'
						WHERE post = '$id'";
				$query = mysqli_query($database->con, $sql);
				if(!$query){
					header("location:../cms/post.php?tab=post&page=blog&error=true");
				} else {
					header("location:../cms/post.php?tab=post&page=blog&postDisabled=true");
				}	
			}	
	
		}

		public function disablePost($database, $id, $title){

			$sql = "UPDATE posts SET 
						   status = 'Archived'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=post&page=blog&error=true");
			} else {
				global $log;
				$info = "Archived post ID: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=blog&postDisabled=true");
			}	
	
		}

		public function editPost($database, $id, $post_id, $post_title, $post_content){

			$sql = "UPDATE posts SET 
						   post_title = '$post_title',
						   post_text = '$post_content'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=post&page=blog&error=true");
			} else {
				global $log;
				$info = "Edited post ID: " . $post_title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=blog&editPost=true");

			}			
		}

		public function addPost($database, $post_title, $post_content, $post_thumbnail){
			$id;
			$post_id = 'PST' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$school;

			if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
			} else {
				$school = 2;
			}

			$date = date('Y-m-d');

			$sql = "INSERT INTO posts
					VALUES (null, '$post_id', '$post_title', '$date', 'Post', '$user', '$school', '$post_content', '$post_thumbnail', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				header("location:../cms/post.php?tab=post&page=blog&error=true");
				// echo("Error description: " . mysqli_error($database->con));
			} else {
				$sql = "SELECT id FROM posts ORDER BY id DESC LIMIT 1";
				$query = mysqli_query($database->con, $sql);
				if (!$query) {
					header("location:../cms/post.php?tab=post&page=blog&error=true");
					// echo("Error description: " . mysqli_error($database->con));
				} else {
					global $log;
					$info = "Created a new post: " . $post_id;
					$log->logInput($database, $info);

					$row = mysqli_fetch_assoc($query);
					$id = $row['id'];
				}
			}

			return $id;	
		}

		public function addPostCategories($database, $post_id, $cat_id){
			$sql = "INSERT INTO post_categories
			VALUES (null, '$post_id','$cat_id')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				header("location:../cms/post.php?tab=post&page=blog&error=true");
				// echo("Error description: " . mysqli_error($database->con));
			}
		}

        /*********************************************************************************************/
		/***********************  Posts Functionalities -- Announcements Posts ***********************/
        /*********************************************************************************************/

		public function announcementList($database){
			$array = array();
			$sql = "SELECT announcements.*,
						   users.firstname,
						   users.lastname,
						   schools.school_abbv
					FROM announcements
					LEFT JOIN users
					ON (users.id = announcements.a_author)
					LEFT JOIN schools
					ON (schools.id = announcements.a_school)
					WHERE announcements.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				header("location:../cms/post.php?tab=post&page=announcements&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;			
		}

		public function disableAnnouncement($database, $id, $title){
			$sql = "UPDATE announcements SET 
						   status = 'Archived'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				header("location:../cms/post.php?tab=post&page=announcements&error=true");
				//echo("Error description: " . mysqli_error($database->con));
			} else {
				global $log;
				$info = "Disabled announcement ID: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=announcements&announcementDisabled=true");
			}
		}

		public function addAnnouncement(){

		}

		public function editAnnouncement($database, $id, $title, $a_title, $a_date, $a_desc){
			$sql = "UPDATE announcements SET 
						   a_title = '$a_title',
						   a_date_long = '$a_date',
						   a_text = '$a_desc'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				header("location:../cms/post.php?tab=post&page=announcements&error=true");
				//echo("Error description: " . mysqli_error($database->con));
			} else {
				global $log;
				$info = "Modified announcement ID: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=announcements&editAnnouncement=true");
			}
		}

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Links  ********************************/
        /*********************************************************************************************/
		
		public function linkList($database){
			
			$school;

			if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
			} else {
				$school = 2;
			}

			$array = array();
			$sql = "SELECT links.*,
						   schools.school_abbv 
					FROM links
					LEFT JOIN schools
					ON (schools.id = links.school)
					WHERE links.school = '$school'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../cms/post.php?tab=post&page=links&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
			
		}

		public function disableLink($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=post&page=links&error=true");
			} else {
				global $log;
				$info = "Disabled link ID: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=links&linkDisabled=true");
			}
		}

		public function reactivateLink($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=post&page=links&error=true");
			} else {
				global $log;
				$info = "Reactivated link ID: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=links&linkReactivated=true");
			}
		}

		public function editLink($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag){
			$sql = "UPDATE links SET 
						   link_name = '$link_name',
						   link_desc = '$link_desc',
						   link_tag  = '$link_tag',
						   link_content = '$link_content'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=post&page=links&error=true");
			} else {
				global $log;
				$info = "Modified link ID: " . $link_id;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=links&editLink=true");
			}
		}

		public function addLink($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail){
			$link_id = 'LNK' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$school;

			if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
			} else {
				$school = 2;
			}

			$sql = "INSERT INTO links
					VALUES (null, '$link_id', '$link_name', '$link_type', '$link_tag', '$link_desc', '$link_content', '$link_thumbnail', '$user', '$school', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=post&page=links&error=true");
			} else {
				global $log;
				$info = "Created a new link: " . $link_id;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=links&addLink=true");
			}			
		}

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Categories  ***************************/
        /*********************************************************************************************/

		public function categoryList($database){
			
			$array = array();
			$sql = "SELECT * FROM categories
					WHERE status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../cms/post.php?tab=post&page=categories&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
			
		}

		public function categoryListNoEventNoAnnouncement($database){
			
			$array = array();
			$sql = "SELECT * FROM categories
					WHERE status = 'Active'
					AND id != '1'
					AND id != '2'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../cms/post.php?tab=post&page=categories&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
			
		}

		public function postsAndMediaPerCategoryCount($database, $category){
			$array = array();
			$sql = "SELECT posts.*,
						   categories.cat_desc
					FROM post_categories 
					LEFT JOIN posts
					ON (posts.id = post_categories.post_id)
					LEFT JOIN categories
					ON (categories.id = post_categories.cat_id)
					WHERE post_categories.cat_id = '$category'
					AND posts.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location:../cms/post.php?tab=post&page=blog&error=true");
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
				header("location:../cms/post.php?tab=post&page=categories&error=true");
				//echo("Error description: " . mysqli_error($database->con));
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
				header("location:../cms/post.php?tab=post&page=categories&error=true");
				//echo("Error description: " . mysqli_error($database->con));
			} else {
				global $log;
				$info = "Created a new category: " . $cat_name;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=categories&newCategory=true");
			}

		}

		public function disableCategory($database, $id, $title){

			$sql = "UPDATE categories SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=post&page=categories&error=true");
			} else {
				global $log;
				$info = "Disabled the category " . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=categories&categoryDisabled=true");
			}	
	
		}

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Media Posts ***************************/
		/*********************************************************************************************/

		public function mediaPerCategoryList($database, $category){
			$array = array();
			$sql = "SELECT posts.*,
						   categories.cat_desc,
						   users.firstname,
						   users.lastname,
						   schools.school_abbv
					FROM post_categories 
					LEFT JOIN posts
					ON (posts.id = post_categories.post_id)
					LEFT JOIN categories
					ON (categories.id = post_categories.cat_id)
					LEFT JOIN users
					ON (users.id = posts.post_author)
					LEFT JOIN schools
					ON (schools.id = posts.post_school)
					WHERE post_categories.cat_id = '$category'
					AND posts.post_type = 'Media'
					AND posts.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location:../cms/post.php?tab=post&page=media&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
		}

		public function mediaList($database){
			$array = array();
			$sql = "SELECT posts.*,
						   users.firstname,
						   users.lastname,
						   schools.school_abbv
					FROM posts
					LEFT JOIN users
					ON (users.id = posts.post_author)
					LEFT JOIN schools
					ON (schools.id = posts.post_school)
					WHERE posts.post_type = 'Media' 
					AND posts.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location:../cms/post.php?tab=post&page=media&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;			
		}

		public function editMedia($database, $id, $media_id, $media_title, $media_content){

			$sql = "UPDATE posts SET 
						   post_title = '$media_title',
						   post_text = '$media_content'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=post&page=media&error=true");
			} else {
				global $log;
				$info = "Edited media post ID: " . $post_title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=media&editMedia=true");

			}			
		}

		public function disableMedia($database, $id, $title){

			$sql = "UPDATE posts SET 
						   status = 'Archived'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=post&page=media&error=true");
			} else {
				global $log;
				$info = "Archived media post ID: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=media&mediaDisabled=true");
			}	
	
		}

    }

    require 'post_options.php';

?>