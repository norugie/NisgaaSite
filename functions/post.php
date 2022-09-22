<?php

    Class Post {

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Posts Integrated  *********************/
        /*********************************************************************************************/
		public function disablePostEventIntegrated($database, $id, $title){

			$sql = "UPDATE posts SET 
						   status = 'Archived'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=posts&error=true");
			} else {
				global $log;
				$info = "Archived post: " . $title;
				$log->logInput($database, $info);

				$sql = "UPDATE events SET 
							   status = 'Cancelled'
						WHERE post = '$id'";
				$query = mysqli_query($database->con, $sql);
				if(!$query){
					$_SESSION['error_message'] = mysqli_error($database->con);
					header("location:../cms/post.php?tab=post&page=posts&error=true");
				} else {
					header("location:../cms/post.php?tab=post&page=posts&postDisabled=true");
				}	
			}	
	
		}

		public function disablePostIntegrated($database, $id, $title){

			$sql = "UPDATE posts SET 
						   status = 'Archived'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=posts&error=true");
			} else {
				global $log;
				$info = "Archived post: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=posts&postDisabled=true");
			}	
	
		}

		public function addPostIntegrated($database, $post_title, $post_content, $post_thumbnail, $post_desc, $post_type, $sm_opt, $ssd_opt, $ss_opt, $gcc_opt, $nlc_opt){
			$id;
			$post_id = 'PST' . rand(1111111111,9999999999);
			$user = $_SESSION['id'];
			$school;

			if($_SESSION['type'] == 4 || $_SESSION['type'] == 6){
				$school = $_SESSION['school'];
			} else {
				$school = 2;
			}

			$sql = "INSERT INTO posts
					VALUES (null, '$post_id', '$post_title', NOW(), NOW(), '$post_type', '$user', '$school', '$post_content', '$post_thumbnail', '$post_desc', '$sm_opt', '$ssd_opt', '$ss_opt', '$gcc_opt', '$nlc_opt', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=posts&error=true");
			} else {
				$sql = "SELECT id FROM posts ORDER BY id DESC LIMIT 1";
				$query = mysqli_query($database->con, $sql);
				if(!$query){
					$_SESSION['error_message'] = mysqli_error($database->con);
					header("location:../cms/post.php?tab=post&page=posts&error=true");
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

		public function editPostIntegrated($database, $id, $post_id, $post_title, $post_content, $post_desc, $post_thumbnail){

			$sql = "UPDATE posts SET 
						   post_title = '$post_title',
						   post_text = '$post_content',
						   post_desc = '$post_desc',
						   post_thumbnail = '$post_thumbnail'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=posts&error=true");
			} else {
				global $log;
				$info = "Modified a post: " . $post_title;
				$log->logInput($database, $info);
			}		
		}

		public function addPostCategoriesIntegrated($database, $post_id, $cat_id){
			$sql = "INSERT INTO post_categories
			VALUES (null, '$post_id','$cat_id')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=posts&error=true");
			}
		}

		public function deleteAllPostCategoriesIntegrated($database, $id){
			$sql = "DELETE FROM post_categories WHERE post_id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=posts&error=true");
			}
		}

		public function addPostImagesIntegrated($database, $id, $media_image){
			$sql = "INSERT INTO media
			VALUES (null, '$media_image','$id')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=posts&error=true");
			}
		}

		public function deleteAllPostMediaIntegrated($database, $id){
			$sql = "DELETE FROM media WHERE post_id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=posts&error=true");
			}
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

		/*********************************************************************************************/
		/***************************  Post Functionalities -- Events  ****************************/
		/*********************************************************************************************/

		public function disableEvent($database, $id, $title, $post_id){

			$sql = "UPDATE events SET 
						   status = 'Cancelled'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=events&error=true");
			} else {
				global $log;
				$info = "Cancelled the event:  " . $title;
				$log->logInput($database, $info);

				$sql = "UPDATE posts SET 
				status = 'Archived'
						WHERE id = '$post_id'";
				$query = mysqli_query($database->con, $sql);
				if(!$query){
					$_SESSION['error_message'] = mysqli_error($database->con);
					header("location:../cms/post.php?tab=post&page=events&error=true");
				} else {
					header("location:../cms/post.php?tab=post&page=events&eventDisabled=true");
				}	

			}	
	
		}

		public function addPostEvent($database, $post_title, $post_content, $event_desc, $post_thumbnail, $sm_opt){
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
					VALUES (null, '$post_id', '$post_title', '$date', NOW(), 'Post', '$user', '$school', '$post_content', '$post_thumbnail', '$event_desc', '$sm_opt', 'No', 'No', 'No', 'No', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=events&error=true");
			} else {
				$sql = "SELECT id FROM posts ORDER BY id DESC LIMIT 1";
				$query = mysqli_query($database->con, $sql);
				if(!$query){
					$_SESSION['error_message'] = mysqli_error($database->con);
					header("location:../cms/post.php?tab=post&page=events&error=true");
				} else {
					$row = mysqli_fetch_assoc($query);
					$id = $row['id'];

					$sql = "INSERT INTO post_categories
					VALUES (null, '$id','1')";
					$query = mysqli_query($database->con, $sql);
					if(!$query){
						$_SESSION['error_message'] = mysqli_error($database->con);
						header("location:../cms/post.php?tab=post&page=events&error=true");
					}
				}
			}

			return $id;				
		}

		public function addEvent($database, $event_name, $event_shortname, $event_desc, $event_type, $post, $school, $location){
			$id;
			$user = $_SESSION['id'];
			$event_color_code = substr(md5(rand()), 0, 6);
			$event_id_name = 'EVNT' . rand(1111111,9999999);

			$sql = "INSERT INTO events
					VALUES (null, '$event_id_name', '$event_name', '$event_shortname', '$event_desc', '$event_type', '$event_color_code', '$location', '$school', '$user', '$post', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=events&error=true");
			} else {
				$sql = "SELECT id, event_shortname FROM events ORDER BY id DESC LIMIT 1";
				$query = mysqli_query($database->con, $sql);
				if(!$query){
					$_SESSION['error_message'] = mysqli_error($database->con);
					header("location:../cms/post.php?tab=post&page=events&error=true");
				} else {
					$row = mysqli_fetch_assoc($query);
					$id = $row['id'];

					global $log;
					$info = "Created the event: " . $row['event_shortname'];
					$log->logInput($database, $info);
				}
			}

			return $id;	
		}

		public function addEventDays($database, $event_start, $event_end, $event_final, $event_time, $event_id){

			$sql = "INSERT INTO event_days
					VALUES (null, '$event_start', '$event_end', '$event_final', '$event_time', '$event_id')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=events&error=true");
			}
		
		}

		public function editEvent($database, $event_name, $event_shortname, $event_desc, $event_location, $event_id){
			$sql = "UPDATE events SET 
						   event_name = '$event_name',
						   event_shortname = '$event_shortname',
						   event_desc = '$event_desc',
						   event_location = '$event_location'
					WHERE id = '$event_id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=events&error=true");
			} else {
				global $log;
				$info = "Modified the event information for: " . $event_shortname;
				$log->logInput($database, $info);

				header("location:../cms/post.php?tab=post&page=events&editEvent=true");

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

    }

    require 'post_options.php';

?>