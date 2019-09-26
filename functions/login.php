<?php
	
	require 'connect.php';
    session_start();
    
	Class Login Extends Database {

		public function routerUser($info){
            
            $_SESSION['id'] = $info['id'];
			$_SESSION['type'] = $info['user_type'];
			$_SESSION['username'] = $info['username'];
			$_SESSION['firstname'] = $info['firstname'];
			$_SESSION['school'] = $info['school'];
			$_SESSION['alert'] = 'unalerted';
			$_SESSION['error_message'] = 'none';
			$_SESSION['event_view'] = 'LIST';
            
			if($info['status'] == 'Active'){
                header("location: ../cms/");
			} else {
                header("location: ../login.php?restricted=true");
            }
            
        }
    
    }
    
	require 'login_options.php';
?>