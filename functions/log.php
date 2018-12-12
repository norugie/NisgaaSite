<?php

    Class Log {

        public function logInput($database, $log){
            $logId = "LOG" . rand(1000000,9999999);
            $userId = $_SESSION['id'];
			$sql = "INSERT INTO logs
					VALUES(null, '$logId', '$log', '$userId', null)";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
                header("location:../cms/?error=true");
			} else {
                $_SESSION['alert'] = 'alerted';
            }

        }

    }

?>