<?php

    Class District {

		public function roleList($database){
			
			$array = array();
			$sql = "SELECT * FROM roles";
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
		/***************************  District Functionalities -- Users  *****************************/
		/*********************************************************************************************/

        public function userList($database){
            
			$array = array();
			$gid = $_SESSION['id'];

			$sql = "SELECT users.firstname,
						   users.lastname,
						   users.username,
						   users.email,
						   users.user_type,
						   users.school,
						   users.display_picture,
						   users.status,
						   users.id, 
						   roles.role_abbv, 
						   roles.role_desc, 
						   schools.school_abbv, 
						   schools.school_name, 
						   schools.school_addr 
					FROM users
					LEFT JOIN roles
					ON (users.user_type = roles.id)
					LEFT JOIN schools
					ON (users.school = schools.id)
					WHERE users.id != '$gid'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../cms/district.php?tab=sd&page=users&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;

		}

		public function usernameList($database){
			$array = array();
			$sql = "SELECT username FROM users";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../cms/?error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row['username'];
				}
            }
            
			return $array;			
		}

		public function disableUser($database, $id, $username){

			$sql = "UPDATE users SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
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
			    header("location:../cms/district.php?tab=sd&page=users&error=true");
			} else {
				global $log;
				$info = "Added a new user account for " . $username;
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
			    header("location:../cms/district.php?tab=sd&page=users&error=true");
			} else {
				global $log;
				$info = "Modified the user account information for " . $username;
				$log->logInput($database, $info);
				header("location:../cms/district.php?tab=sd&page=users&editUser=true");
			}	

		}

		/*********************************************************************************************/
		/*************************  District Functionalities -- Employment  **************************/
		/*********************************************************************************************/

        public function jobList($database){
            
			$array = array();

			$sql = "SELECT jobs.*, 
						   users.firstname, 
						   users.lastname, 
						   schools.school_abbv, 
						   schools.school_name 
					FROM jobs
					LEFT JOIN users
					ON (users.id = jobs.user)
					LEFT JOIN schools
					ON (schools.id = jobs.school)";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				header("location: ../cms/district.php?tab=sd&page=employment&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;

		}

		public function disableJob($database, $id, $title){

			$sql = "UPDATE jobs SET 
						   status = 'Closed'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
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

        public function eventList($database){
            
			$array = array();

			$sql = "SELECT events.*, 
						   users.firstname, 
						   users.lastname, 
						   schools.school_abbv, 
						   schools.school_name,
						   GROUP_CONCAT(event_days.event_date_day_start),
						   GROUP_CONCAT(event_days.event_date_day_end),
						   GROUP_CONCAT(event_days.event_date_time)
					FROM events
					LEFT JOIN users
					ON (users.id = events.user)
					LEFT JOIN schools
					ON (schools.id = events.school)
					LEFT JOIN event_days
					ON (event_days.event = events.id)
					WHERE events.status != 'Done'
					GROUP BY event_days.event";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				header("location: ../cms/district.php?tab=sd&page=events&error=true");
				// echo("Error description: " . mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }

			return $array;

		}

		public function disableEvent($database, $id, $title, $post_id){

			$sql = "UPDATE events SET 
						   status = 'Cancelled'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
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
					header("location:../cms/district.php?tab=sd&page=events&error=true");
				} else {
					header("location:../cms/district.php?tab=sd&page=events&eventDisabled=true");
				}	

			}	
	
		}

		public function addPostEvent($database, $post_title, $post_content, $post_thumbnail){
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
					VALUES (null, '$post_id', '$post_title', '$date', 'Post', '$user', '$school', '$post_content', '$post_thumbnail', 'Event Post', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				header("location:../cms/district.php?tab=sd&page=events&error=true");
				 //echo("Error description: " . mysqli_error($database->con));
			} else {
				$sql = "SELECT id FROM posts ORDER BY id DESC LIMIT 1";
				$query = mysqli_query($database->con, $sql);
				if (!$query) {
					header("location:../cms/district.php?tab=sd&page=events&error=true");
					//echo("Error description: " . mysqli_error($database->con));
				} else {
					$row = mysqli_fetch_assoc($query);
					$id = $row['id'];

					$sql = "INSERT INTO post_categories
					VALUES (null, '$id','1')";
					$query = mysqli_query($database->con, $sql);
					if(!$query){
						header("location:../cms/district.php?tab=sd&page=events&error=true");
						//echo("Error description: " . mysqli_error($database->con));
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
				//header("location:../cms/district.php?tab=sd&page=events&error=true");
				echo("Error description: " . mysqli_error($database->con));
			} else {
				$sql = "SELECT id, event_shortname FROM events ORDER BY id DESC LIMIT 1";
				$query = mysqli_query($database->con, $sql);
				if (!$query) {
					header("location:../cms/district.php?tab=sd&page=events&error=true");
					//echo("Error description: " . mysqli_error($database->con));
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

		public function addEventDays($database, $event_start, $event_end, $event_time, $event_id){

			$sql = "INSERT INTO event_days
					VALUES (null, '$event_start', '$event_end', '$event_time', '$event_id')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				header("location:../cms/district.php?tab=sd&page=events&error=true");
				//echo("Error description: " . mysqli_error($database->con));
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
			    header("location:../cms/district.php?tab=sd&page=events&error=true");
			} else {
				global $log;
				$info = "Modified the event information for: " . $event_shortname;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=events&editEvent=true");

			}	
		}

    }

    require 'district_options.php';

?>