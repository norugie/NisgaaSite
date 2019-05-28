<?php

    Class Dashboard {

        public function logList($database){
			$array = array();
            $sql;
			$sqlquery = "SELECT logs.*,
                           users.firstname,
						   users.lastname,
                           schools.school_abbv
					FROM logs
					LEFT JOIN users
                    ON (users.id = logs.user)
                    LEFT JOIN schools
					ON (schools.id = logs.school)";

            /*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " WHERE logs.school = '$school' AND logs.date BETWEEN NOW() - INTERVAL 30 DAY AND NOW() ORDER BY logs.id DESC";
			} else {
				$sql = $sqlquery . " WHERE logs.date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()ORDER BY logs.id DESC";
			}
            /*  END Content Filter  */
            
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

        public function userCount($database){
			$array = array();
			$sql = "SELECT id FROM users WHERE status = 'Active'";
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

        public function jobCount($database){
			$array = array();
			$sql = "SELECT id FROM jobs WHERE status = 'Open'";
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

        public function eventCount($database){
            $array = array();
            $sql;
            $sqlquery = "SELECT id FROM events WHERE status != 'Done'";
            
            /*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " AND school = '$school'";
			} else {
				$sql = $sqlquery;
			}
            /*  END Content Filter  */
            
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

        public function announcementCount($database){
            $array = array();
            $sql;
            $sqlquery = "SELECT id FROM announcements WHERE status = 'Active'";
            
            /*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " AND a_school = '$school'";
			} else {
				$sql = $sqlquery;
			}
            /*  END Content Filter  */
            
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

        public function blogCount($database){
            $array = array();
            $sql;
            $sqlquery = "SELECT id FROM posts WHERE post_type = 'Post' AND status = 'Active'";
            
            /*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " AND post_school = '$school'";
			} else {
				$sql = $sqlquery;
			}
            /*  END Content Filter  */
            
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

        public function mediaCount($database){
            $array = array();
            $sql;
            $sqlquery = "SELECT id FROM posts WHERE post_type = 'Media' AND status = 'Active'";
            
            /*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " AND post_school = '$school'";
			} else {
				$sql = $sqlquery;
			}
            /*  END Content Filter  */
            
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

    }

?>