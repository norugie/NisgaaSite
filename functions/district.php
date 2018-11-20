<?php

    Class District {

		public function roleList($database){
			
			$array = array();
			$sql = "SELECT * FROM roles";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../cms/index.php?error=true");
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
			    header("location: ../cms/index.php?error=true");
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

			$sql = "SELECT users.*, 
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
			    header("location: ../cms/district.php?page=users&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
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
			    header("location:../cms/district.php?page=users&error=true");
			} else {
				global $log;
				$info = "Disabled the user account for " . $username;
				$log->logInput($database, $info);

				header("location:../cms/district.php?page=users&userDisabled=true");
			}	
	
		}

		public function reactivateUser($database, $id, $username){	

			$sql = "UPDATE users SET 
					status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/district.php?page=users&error=true");
			} else {
				global $log;
				$info = "Reactivated the user account for " . $username;
				$log->logInput($database, $info);

				header("location:../cms/district.php?page=users&userReactivated=true");
			}	
	
		}

		public function addUser($database, $firstname, $lastname, $role, $school, $username, $password, $email){

			$sql = "INSERT INTO users
					VALUES(null, '$username', '$firstname', '$lastname', '$email', md5('$password'), '$role', '$school',  'user.png', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/district.php?page=users&error=true");
			} else {
				global $log;
				$info = "Added a new user account for " . $username;
				$log->logInput($database, $info);

				header("location:../cms/district.php?page=users&newUser=true");
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
			    header("location:../cms/district.php?page=users&error=true");
			} else {
				global $log;
				$info = "Modified the user account information for " . $username;
				$log->logInput($database, $info);
				header("location:../cms/district.php?page=users&editUser=true");
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
				header("location: ../cms/district.php?page=employment&error=true");
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
			    header("location:../cms/district.php?page=employment&error=true");
			} else {
				global $log;
				$info = "Closed the job posting for job ID:  " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?page=employment&jobDisable=true");
			}	
	
		}

		public function reopenJob($database, $id, $title){	

			$sql = "UPDATE jobs SET 
					status = 'Open'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/district.php?page=employment&error=true");
			} else {
				global $log;
				$info = "Reopened the job posting for job ID: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?page=employment&jobReopen=true");
			}	
	
		}

		/*********************************************************************************************/
		/***************************  District Functionalities -- Events  ****************************/
		/*********************************************************************************************/
    }

    require 'district_options.php';

?>