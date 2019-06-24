<?php

    Class District {

		/*********************************************************************************************/
		/***************************  District Functionalities -- Users  *****************************/
		/*********************************************************************************************/

		public function disableUser($database, $id, $username){

			$sql = "UPDATE users SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=users&error=true");
			} else {
				global $log;
				$info = "Disabled the user account for " . $username;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=users&userDisabled=true");
			}	
	
		}

		public function reactivateUser($database, $id, $username){	

			$sql = "UPDATE users SET 
						   status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=users&error=true");
			} else {
				global $log;
				$info = "Reactivated the user account for " . $username;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=users&userReactivated=true");
			}	
	
		}

		public function addUser($database, $firstname, $lastname, $role, $school, $username, $password, $email){

			$sql = "INSERT INTO users
					VALUES(null, '$username', '$firstname', '$lastname', '$email', md5('$password'), '$role', '$school',  'user.png', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=users&error=true");
			} else {
				global $log;
				$info = "Added a new user account for " . $firstname . " " . $lastname;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=users&newUser=true");
			}
		}

		public function editUser($database, $firstname, $lastname, $role, $school, $id, $username){
			
			$sql = "UPDATE users SET
						   firstname = '$firstname',
						   lastname = '$lastname',
						   user_type = '$role',
						   school = '$school'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=users&error=true");
			} else {
				global $log;
				$info = "Modified the user account information for " . $firstname . " " . $lastname;
				$log->logInput($database, $info);
				header("location:../cms/district.php?tab=sd&page=users&editUser=true");
			}	

		}

		/*********************************************************************************************/
		/*************************  District Functionalities -- Employment  **************************/
		/*********************************************************************************************/

		public function disableJob($database, $id, $title){

			$sql = "UPDATE jobs SET 
						   status = 'Closed',
						   close_date = CURRENT_DATE()
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=employment&error=true");
			} else {
				global $log;
				$info = "Closed the job posting for job ID:  " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=employment&jobDisable=true");
			}	
	
		}

		public function reopenJob($database, $id, $title, $jobopen, $jobclose, $identifier){	

			$sql = "UPDATE jobs SET
						   open_date = '$jobopen',
						   close_date = '$jobclose', 
					status = 'Open'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=employment&error=true");
			} else {
				global $log;
				$info;
				if($identifier == 0){
					$info = "Reopened the job posting for job ID: " . $title;
					$log->logInput($database, $info);
	
					header("location:../cms/district.php?tab=sd&page=employment&jobReopen=true");
				} else {
					$info = "Modified the job posting for job ID: " . $title;
					$log->logInput($database, $info);

					header("location:../cms/district.php?tab=sd&page=employment&editJob=true");
				}
				
			}	
	
		}

		public function editJobFile($database, $id, $title, $file_name){	

			$sql = "UPDATE jobs SET
						   file = '$file_name'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=employment&error=true");
			} else {
				global $log;
				$info = "Modified the job posting for job ID: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=employment&editJob=true");
				
			}	
	
		}

		public function addJob($database, $id, $title, $jobdesc, $jobtype, $school, $jobopen, $jobclose, $file_name){
			
			$user = $_SESSION['id'];
			$sql = "INSERT INTO jobs
					VALUES (null, '$id', '$school', '$title', '$jobdesc', '$user', '$jobopen', '$jobclose', '$jobtype', '$file_name', 'Open')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=employment&error=true");
			} else {
				global $log;
				$info = "Opened a job posting for job ID: " . $id;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=employment&newJob=true");
			}

		}

		public function editJob($database, $id, $title, $jobtitle, $jobdesc, $jobtype, $school){

			$sql = "UPDATE jobs SET
						   title = '$jobtitle',
						   job_desc = '$jobdesc',
						   job_type = '$jobtype',
						   school = '$school'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=employment&error=true");
			} else {
				global $log;
				$info = "Modified the job posting for job ID: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=employment&editJob=true");
				
			}				
		}

		/*********************************************************************************************/
		/***************************  District Functionalities -- Events  ****************************/
		/*********************************************************************************************/

		public function disableEvent($database, $id, $title, $post_id){

			$sql = "UPDATE events SET 
						   status = 'Cancelled'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=events&error=true");
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
					header("location:../cms/district.php?tab=sd&page=events&error=true");
				} else {
					header("location:../cms/district.php?tab=sd&page=events&eventDisabled=true");
				}	

			}	
	
		}

		public function addPostEvent($database, $post_title, $post_content, $event_desc, $post_thumbnail){
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
					VALUES (null, '$post_id', '$post_title', '$date', 'Post', '$user', '$school', '$post_content', '$post_thumbnail', '$event_desc', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/district.php?tab=sd&page=events&error=true");
			} else {
				$sql = "SELECT id FROM posts ORDER BY id DESC LIMIT 1";
				$query = mysqli_query($database->con, $sql);
				if(!$query){
					$_SESSION['error_message'] = mysqli_error($database->con);
					header("location:../cms/district.php?tab=sd&page=events&error=true");
				} else {
					$row = mysqli_fetch_assoc($query);
					$id = $row['id'];

					$sql = "INSERT INTO post_categories
					VALUES (null, '$id','1')";
					$query = mysqli_query($database->con, $sql);
					if(!$query){
						$_SESSION['error_message'] = mysqli_error($database->con);
						header("location:../cms/district.php?tab=sd&page=events&error=true");
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
				header("location:../cms/district.php?tab=sd&page=events&error=true");
			} else {
				$sql = "SELECT id, event_shortname FROM events ORDER BY id DESC LIMIT 1";
				$query = mysqli_query($database->con, $sql);
				if(!$query){
					$_SESSION['error_message'] = mysqli_error($database->con);
					header("location:../cms/district.php?tab=sd&page=events&error=true");
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
				header("location:../cms/district.php?tab=sd&page=events&error=true");
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
			    header("location:../cms/district.php?tab=sd&page=events&error=true");
			} else {
				global $log;
				$info = "Modified the event information for: " . $event_shortname;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=events&editEvent=true");

			}	
		}

        /*********************************************************************************************/
		/***************************  District Functionalities -- Forms  *****************************/
        /*********************************************************************************************/

		public function disableForm($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=files&error=true");
			} else {
				global $log;
				$info = "Disabled file: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=files&formDisabled=true");
			}
		}

		public function reactivateForm($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=files&error=true");
			} else {
				global $log;
				$info = "Reactivated file: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=files&formReactivated=true");
			}
		}

		public function addForm($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail){
			$link_id = 'LNK' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$school = 2;

			$sql = "INSERT INTO links
					VALUES (null, '$link_id', '$link_name', '$link_type', '$link_tag', '$link_desc', '$link_content', '$link_thumbnail', '$user', '$school', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=files&error=true");
			} else {
				global $log;
				$info = "Created a new district file: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=files&addForm=true");
			}			
		}

		public function editForm($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag){
			$sql = "UPDATE links SET 
						   link_name = '$link_name',
						   link_desc = '$link_desc',
						   link_tag  = '$link_tag',
						   link_content = '$link_content'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=files&error=true");
			} else {
				global $log;
				$info = "Modified form: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=files&editForm=true");
			}
		}

        /*********************************************************************************************/
		/***************************  District Functionalities -- Packages  **************************/
        /*********************************************************************************************/

		public function disablePackage($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=packages&error=true");
			} else {
				global $log;
				$info = "Disabled board meeting package: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=packages&packageDisabled=true");
			}
		}

		public function reactivatePackage($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=packages&error=true");
			} else {
				global $log;
				$info = "Reactivated Board Meeting Package: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=packages&packageReactivated=true");
			}
		}

		public function addPackage($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail){
			$link_id = 'LNK' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$school = 2;

			$sql = "INSERT INTO links
					VALUES (null, '$link_id', '$link_name', '$link_type', '$link_tag', '$link_desc', '$link_content', '$link_thumbnail', '$user', '$school', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=packages&error=true");
			} else {
				global $log;
				$info = "Created a new Board Meeting Package: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=packages&addPackage=true");
			}			
		}

		public function editPackage($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag){
			$sql = "UPDATE links SET 
						   link_name = '$link_name',
						   link_desc = '$link_desc',
						   link_tag  = '$link_tag',
						   link_content = '$link_content'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=packages&error=true");
			} else {
				global $log;
				$info = "Modified form: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=packages&editPackage=true");
			}
		}


    }

    require 'district_options.php';

?>