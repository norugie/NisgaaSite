<?php

    $loginProcess = new Login();
    
	if(isset($_GET['login'])){

		$user = mysqli_real_escape_string($loginProcess->con, $_POST['username']);
        $pass = mysqli_real_escape_string($loginProcess->con, $_POST['password']);
        
		$sql = "SELECT * FROM users WHERE username = '$user' AND password = md5('$pass')";
		$query = mysqli_query($loginProcess->con, $sql);
		if (!$query) {
		    header("location: ../login.php?invalid=true");
		} else {
			$loginInfo = mysqli_fetch_assoc($query);
			if($loginInfo['status'] !== 'Archived'){
				if($loginInfo['user_type'] == 1){
					$loginProcess->adminLogin($loginInfo);
				} else {
					header("location:../login.php?error=true");
				}
			} else {
				header("location: ../login.php?invalid=true");
            }
            
		}
	}
    
?>