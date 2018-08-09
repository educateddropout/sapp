<?php
	session_start();
	
	if(empty($_SESSION['svr_user_id'])){
		
		alert("You are not allowed to use this system!!");
		//header( "location: login.php");
	}

	function alert($msg) {
	    echo "<script type='text/javascript'>alert('$msg');
	    window.location = 'login.php';
	    </script>";
	}

?>

?>