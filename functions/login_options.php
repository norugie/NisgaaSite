<?php

    $loginProcess = new Login();
    
	if(isset($_GET['login'])){

		$user = mysqli_real_escape_string($loginProcess->con, $_POST['username']);
        $pass = mysqli_real_escape_string($loginProcess->con, $_POST['password']);
        
		$sql = "SELECT * FROM users WHERE username = '$user' AND password = md5('$pass')";
		$query = mysqli_query($loginProcess->con, $sql);
		if(!$query){
			header("location: ../login.php?error=true");
		} else {
			$loginInfo = mysqli_fetch_assoc($query);
			if(count($loginInfo) === 0){
				header("location:../login.php?invalid=true");
			} else {
				if($loginInfo['status'] !== 'Inactive'){
					$uid = $loginInfo['id'];
					$sql = "SELECT * FROM sys_groups_assignment WHERE users_id = '$uid' AND groups_id = '1'";
					$query = mysqli_query($loginProcess->con, $sql);
					if(!$query){
						header("location: ../login.php?restricted=true");
					} else {
						$counter = mysqli_fetch_assoc($query);
						if(count($counter) === 0){
							header("location:../login.php?restricted=true");
						} else {
							$loginProcess->routerUser($loginInfo);	
						}
					}
				} else {
					header("location: ../login.php?inactive=true");
				}
			}
            
		}
	}
    
?>