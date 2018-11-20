<?php

    $loginProcess = new Login();
    
	if(isset($_GET['login'])){

		$user = mysqli_real_escape_string($loginProcess->con, $_POST['username']);
        $pass = mysqli_real_escape_string($loginProcess->con, $_POST['password']);
        
		$sql = "SELECT * FROM users WHERE username = '$user' AND password = md5('$pass')";
		$query = mysqli_query($loginProcess->con, $sql);
		if (!$query) {
			header("location: ../login.php?error=true");
		} else {
			$loginInfo = mysqli_fetch_assoc($query);
			if(count($loginInfo) === 0){
				header("location:../login.php?invalid=true");
			} else {
				if($loginInfo['status'] !== 'Inactive'){
					// // // Use code once ready to set folders
					//
					// if($loginInfo['user_type'] == 1){
					// 	$loginProcess->adminLogin($loginInfo);
					// } else if ($loginInfo['user_type'] == 2){
					// 	$loginProcess->editorLogin($loginInfo);
					// } else if ($loginInfo['user_type'] == 3){
					// 	$loginProcess->hrLogin($loginInfo);
					// } else {
					// 	header("location:../login.php?error=true");
					// }
					//
					// // // Use code once ready to set folders
					$loginProcess->routerUser($loginInfo);
				} else {
					header("location: ../login.php?inactive=true");
				}
			}
            
		}
	}
    
?>