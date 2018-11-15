<?php

    Class District {

        public function userList($database){
            
			$array = array();
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
					ON (users.school = schools.id)";
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

    }

    require 'district_options.php';

?>