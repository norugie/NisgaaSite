<?php

    Class Dashboard {

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