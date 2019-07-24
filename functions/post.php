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
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=news&error=true");
			} else {
				global $log;
				$info = "Archived event post: " . $title;
				$log->logInput($database, $info);

				$sql = "UPDATE events SET 
							   status = 'Cancelled'
						WHERE post = '$id'";
				$query = mysqli_query($database->con, $sql);
				if(!$query){
					$_SESSION['error_message'] = mysqli_error($database->con);
					header("location:../cms/post.php?tab=post&page=news&error=true");
				} else {
					header("location:../cms/post.php?tab=post&page=news&postDisabled=true");
				}	
			}	
	
		}

		public function disablePost($database, $id, $title){

			$sql = "UPDATE posts SET 
						   status = 'Archived'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=news&error=true");
			} else {
				global $log;
				$info = "Archived news post: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=news&postDisabled=true");
			}	
	
		}

		public function editPost($database, $id, $post_id, $post_title, $post_content, $post_desc, $post_thumbnail){

			$sql = "UPDATE posts SET 
						   post_title = '$post_title',
						   post_text = '$post_content',
						   post_desc = '$post_desc',
						   post_thumbnail = '$post_thumbnail'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=news&error=true");
			} else {
				global $log;
				$info = "Modified news post: " . $post_title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=news&editPost=true");

			}			
		}

		public function addPost($database, $post_title, $post_content, $post_thumbnail, $post_desc, $sm_opt){
			$id;
			$post_id = 'PST' . rand(1111111111,9999999999);
			$user = $_SESSION['id'];
			$school;

			if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
			} else {
				$school = 2;
			}

			$sql = "INSERT INTO posts
					VALUES (null, '$post_id', '$post_title', NOW(), NOW(), 'Post', '$user', '$school', '$post_content', '$post_thumbnail', '$post_desc', '$sm_opt', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=news&error=true");
			} else {
				$sql = "SELECT id FROM posts ORDER BY id DESC LIMIT 1";
				$query = mysqli_query($database->con, $sql);
				if(!$query){
					$_SESSION['error_message'] = mysqli_error($database->con);
					header("location:../cms/post.php?tab=post&page=news&error=true");
				} else {
					global $log;
					$info = "Created a new news post: " . $post_title;
					$log->logInput($database, $info);

					$row = mysqli_fetch_assoc($query);
					$id = $row['id'];
				}
			}

			return $id;	
		}

		public function getPostIdLink($database, $post_id){
			$id;

			$sql = "SELECT post_id FROM posts WHERE id = '$post_id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=news&error=true");
			} else {
				$row = mysqli_fetch_assoc($query);
				$id = $row['post_id'];
			}

			return $id;

		}

		public function addPostCategories($database, $post_id, $cat_id){
			$sql = "INSERT INTO post_categories
			VALUES (null, '$post_id','$cat_id')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=news&error=true");
			}
		}

		public function deleteAllPostCategories($database, $id){
			$sql = "DELETE FROM post_categories WHERE post_id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=news&error=true");
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
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=links&error=true");
			} else {
				global $log;
				$info = "Disabled link: " . $title;
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
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=links&error=true");
			} else {
				global $log;
				$info = "Reactivated link: " . $title;
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
				$_SESSION['error_message'] = mysqli_error($database->con);
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
				$_SESSION['error_message'] = mysqli_error($database->con);
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
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=categories&error=true");
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
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=categories&error=true");
			} else {
				global $log;
				$info = "Disabled the category: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=categories&categoryDisabled=true");
			}	
	
		}

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Media Posts ***************************/
		/*********************************************************************************************/

		public function editMedia($database, $id, $media_id, $media_title, $media_content, $media_desc, $media_thumbnail){

			$sql = "UPDATE posts SET 
						   post_title = '$media_title',
						   post_text = '$media_content',
						   post_desc = '$media_desc',
						   post_thumbnail = '$media_thumbnail'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=media&error=true");
			} else {
				global $log;
				$info = "Modified media post: " . $media_title;
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
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=media&error=true");
			} else {
				global $log;
				$info = "Archived media post: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=media&mediaDisabled=true");
			}	
	
		}

		public function addMedia($database, $post_title, $post_content, $post_thumbnail, $post_desc, $sm_opt){
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
					VALUES (null, '$post_id', '$post_title', '$date', NOW(), 'Media', '$user', '$school', '$post_content', '$post_thumbnail', '$post_desc', '$sm_opt', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=media&error=true");
			} else {
				$sql = "SELECT id FROM posts ORDER BY id DESC LIMIT 1";
				$query = mysqli_query($database->con, $sql);
				if(!$query){
					$_SESSION['error_message'] = mysqli_error($database->con);
					header("location:../cms/post.php?tab=post&page=media&error=true");
				} else {
					global $log;
					$info = "Created a new media post: " . $post_title;
					$log->logInput($database, $info);

					$row = mysqli_fetch_assoc($query);
					$id = $row['id'];
				}
			}

			return $id;	
		}

		public function addMediaCategories($database, $post_id, $cat_id){
			$sql = "INSERT INTO post_categories
			VALUES (null, '$post_id','$cat_id')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=media&error=true");
			}
		}

		public function addMediaImages($database, $id, $media_image){
			$sql = "INSERT INTO media
			VALUES (null, '$media_image','$id')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=media&error=true");
			}
		}

		public function deleteAllMediaCategories($database, $id){
			$sql = "DELETE FROM post_categories WHERE post_id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=media&error=true");
			}
		}

    }

    require 'post_options.php';

?>