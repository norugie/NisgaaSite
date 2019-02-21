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

		/*********************************************************************************************/
		/***************************  District Functionalities -- Events  ****************************/
		/*********************************************************************************************/

        public function eventList($database){
            
			$array = array();
			$sql;
			$sqlquery = "SELECT events.*, 
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
					WHERE events.status != 'Done'";
			
			/*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " AND events.school = '$school' GROUP BY event_days.event";
			} else {
				$sql = $sqlquery . " GROUP BY event_days.event";
			}
			/*  END Content Filter  */

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

    }

?>