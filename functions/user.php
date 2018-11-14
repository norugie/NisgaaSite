<?php

	Class User {

		public function userInfo($database){
            
			$u_id = $_SESSION['id'];
			$sql = "SELECT * FROM users
					LEFT JOIN roles
					ON (users.user_type = roles.id)
					WHERE users.id = '$u_id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				header("location: ../index.php?error=true");
			} else {
				$userInfo = mysqli_fetch_assoc($query);
				return $userInfo;
            }
            
        }
        
    }
    
	require 'user_options.php'
?>