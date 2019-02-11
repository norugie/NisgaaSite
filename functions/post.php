<?php

    Class Post {

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Blog Posts  ***************************/
        /*********************************************************************************************/

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

		public function editPost($database, $id, $post_id, $post_title, $post_content, $post_desc){

			$sql = "UPDATE posts SET 
						   post_title = '$post_title',
						   post_text = '$post_content',
						   post_desc = '$post_desc'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=post&page=blog&error=true");
			} else {
				global $log;
				$info = "Modified post: " . $post_title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=blog&editPost=true");

			}			
		}

		public function addPost($database, $post_title, $post_content, $post_thumbnail, $post_desc){
			$id;
			$post_id = 'PST' . rand(1111111111,9999999999);
			$user = $_SESSION['id'];
			$school;

			if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
			} else {
				$school = 2;
			}

			$date = date('Y-m-d');

			$sql = "INSERT INTO posts
					VALUES (null, '$post_id', '$post_title', '$date', 'Post', '$user', '$school', '$post_content', '$post_thumbnail', '$post_desc', 'Active')";
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
					$info = "Created a new post: " . $post_title;
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

		public function addAnnouncement($database, $a_title, $a_date, $a_desc){
			$a_id = 'ANN' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$date = date('Y-m-d');
			$school;

			if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
			} else {
				$school = 2;
			}

			$sql = "INSERT INTO announcements
					VALUES (null, '$a_id', '$a_title', '$date', '$a_date', '$user', '$school', '$a_desc', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				header("location:../cms/post.php?tab=post&page=announcements&error=true");
				//echo("Error description: " . mysqli_error($database->con));
			} else {
				global $log;
				$info = "Created a new announcement post: " . $a_title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=announcements&addAnnouncement=true");
			}
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
				$info = "Modified announcement: " . $a_title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=announcements&editAnnouncement=true");
			}
		}

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Links  ********************************/
        /*********************************************************************************************/

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
				$info = "Modified link: " . $link_name;
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
				$info = "Created a new link: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=links&addLink=true");
			}			
		}

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Categories  ***************************/
        /*********************************************************************************************/

		public function addCategory($database, $cat_name){
			$cat_id = 'CAT' . rand(1111111,9999999);
			$sql = "INSERT INTO categories
					VALUES (null, '$cat_id','$cat_name', 'Active')";
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
				$info = "Disabled the category ID:" . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=categories&categoryDisabled=true");
			}	
	
		}

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Media Posts ***************************/
		/*********************************************************************************************/

		public function editMedia($database, $id, $media_id, $media_title, $media_content, $media_desc){

			$sql = "UPDATE posts SET 
						   post_title = '$media_title',
						   post_text = '$media_content',
						   post_desc = '$media_desc'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/post.php?tab=post&page=media&error=true");
			} else {
				global $log;
				$info = "Edited media post: " . $media_title;
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