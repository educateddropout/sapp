<?php
	

	$username =  $_POST['username'];
	$password =  $_POST['password'];

	$userList = ['admin', 'encoder1', 'encoder2', 'encoder3'];


	if(in_array($username, $userList) && $password == "nhtspr12345."){
		$url = "location:search.view.php";
		session_start();
		$_SESSION["svr_user_id"] = $username;
		$_SESSION["svr_user_type"] = 1;

		if($username == "admin"){
			$_SESSION["svr_user_type"] = 0;
			
		}

		header($url);
		exit();
	}
	else{
		$url = "location:login.php?error=2";
		header($url);
	}
	

?>