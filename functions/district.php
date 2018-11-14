<?php

    Class District {

        public function userList($database){
            
			$array = array();
			$sql = "SELECT * FROM users 
            LEFT JOIN roles
            ON (users.user_type = roles.id)";
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
    }

    require 'district_options.php';

?>