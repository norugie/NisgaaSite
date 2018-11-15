<?php

    Class District {

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
			    header("location: ../index.php?error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;

		}

		public function roleList($database){
			
			$array = array();
			$sql = "SELECT * FROM roles";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../index.php?error=true");
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
			    header("location: ../index.php?error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
			
		}

		
		public function disableUser($database, $id){			
			$sql = "UPDATE users SET 
					status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/district.php?page=users&error=true");
			} else {
				header("location:../cms/district.php?page=users&disabled=true");
			}	
	
		}

		public function reactivateUser($database, $id){			
			$sql = "UPDATE users SET 
					status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/district.php?page=users&error=true");
			} else {
				header("location:../cms/district.php?page=users&reactivated=true");
			}	
	
		}

		public function addUser($database, $firstname, $lastname, $role, $school, $username, $password, $email){
			$sql = "INSERT INTO users
					VALUES(null, '$username', '$firstname', '$lastname', '$email', md5('$password'), '$role', '$school',  'user.png', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location:../cms/district.php?page=users&error=true");
			} else {
				header("location:../cms/district.php?page=users&reactivated=true");
			}
		}

    }

    require 'district_options.php';

?>