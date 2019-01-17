<?php

    Class Dashboard {

        public function logList($database){
			$array = array();
			$gid = $_SESSION['id'];

			$sql = "SELECT logs.*,
                           users.firstname,
						   users.lastname
					FROM logs
					LEFT JOIN users
                    ON (users.id = logs.user)
                    ORDER BY logs.id DESC";
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

        public function deleteLogs($database){
            $sql = "DELETE FROM logs";
            $query = mysqli_query($database->con, $sql);
            if(!$query){
                header("location:../cms/index.php?error=true");
            } else {
                global $log;
                $info = "Cleared all logs";
                $log->logInput($database, $info);

                header("location:../cms/index.php?logDeleted=true");
            }	
        }

    }

    require 'dashboard_options.php';
?>