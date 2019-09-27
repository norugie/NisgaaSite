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
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location: ../cms/?error=true");
			} else {
				$userInfo = mysqli_fetch_assoc($query);
				return $userInfo;
            }
            
		}
        
    }
    
?>