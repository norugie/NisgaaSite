<?php

    Class Log {

        public function logInput($database, $log){
            $logId = "LOG" . rand(1000000,9999999);
            $userId = $_SESSION['id'];
            $school;

            if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
			} else {
				$school = 2;
            }
            
			$sql = "INSERT INTO logs
					VALUES(null, '$logId', '$log', '$userId', '$school', NOW())";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
                //header("location:../cms/?error=true");
                echo("Error description: " . mysqli_error($database->con));
			} else {
                $_SESSION['alert'] = 'alerted';
            }

        }

    }

?>