<?php

	Class User {

		public function userInfo($database){
            
			$u_id = $_SESSION['id'];
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
					WHERE users.id = '$u_id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				header("location: ../cms/index.php?error=true");
			} else {
				$userInfo = mysqli_fetch_assoc($query);
				return $userInfo;
            }
            
		}
		
		public function userEditProfile($database, $firstname, $lastname){
			$id = $_SESSION['id'];
			$username = $_SESSION['username'];
			$sql = "UPDATE users SET
						   firstname = '$firstname',
						   lastname = '$lastname'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				header("location:../cms/index.php?error=true");
			} else {
				global $log;
				$info = "Modified the user account for " . $username;
				$log->logInput($database, $info);
				header("location:../cms/index.php?editProfile=true");
			}	
		}

		public function userEditPassword($database, $new_password, $id){
			$username = $_SESSION['username'];
			$sql = "UPDATE users SET 
					password = md5('$new_password')
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				header("location:../cms/index.php?error=true");
			} else {
				global $log;
				$info = "Modified the user account for " . $username;
				$log->logInput($database, $info);
				header("location:../cms/index.php?editProfile=true");
			}
		}
        
    }
    
	require 'user_options.php'
?>