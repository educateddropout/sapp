<?php
	
	session_start();
	unset($_SESSION["svr_user_id"]);

	header( "location: login.php?");
?>