<?php
	
	require 'connect.php';
    session_start();
    
	Class Login Extends Database {

		public function routerUser($info){
            
            $_SESSION['id'] = $info['id'];
            $_SESSION['type'] = $info['user_type'];
            
			if($info['status'] == 'Active'){
                header("location: ../cms/");
			} else if($info['status'] == 'Inactive') {
				header("location: ../new_user.php?logging=true");
			} else {
                header("location: ../login.php?restricted=true");
            }
            
        }
        
		public function adminLogin($info) {

			$_SESSION['folder'] = 'admin';
            
			$this->routerUser($info);
        }
    }
    
	require 'login_options.php';
?>