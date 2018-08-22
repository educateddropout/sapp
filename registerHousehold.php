<?php

$database = require 'bootstrap.php';
session_start();

$householdNumber = $_POST['household_number'];
$firstName =  $_POST['first_name'];
$middleName = $_POST['middle_name'];
$lastName = $_POST['last_name'];
$extName = $_POST['ext_name'];

date_default_timezone_set('Asia/Manila');
$appUser = $_SESSION["svr_user_id"];
$userType = $_SESSION["svr_user_type"];
$currentDate = date("Y-m-d H:i:s");

if($userType == 1){
	$rowCount = $database->saveUctBene($householdNumber, $firstName, $middleName, $lastName, $extName ,$appUser,$currentDate);
	header( "location: search.view.php?success={$rowCount}");
}
else{

	$rowCount = $database->saveUctBeneLogs($householdNumber);
	$rowCount = $database->updateUctBene($householdNumber, $firstName, $middleName, $lastName, $extName ,$appUser,$currentDate);

	header( "location: search.view.php?success={$rowCount}");
}


?>