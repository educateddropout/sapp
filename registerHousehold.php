<?php

$database = require 'bootstrap.php';
session_start();

$householdID = $_POST['household_id'];
$firstName =  $_POST['first_name'];
$middleName = $_POST['middle_name'];
$lastName = $_POST['last_name'];
$extName = $_POST['ext_name'];

date_default_timezone_set('Asia/Manila');
$appUser = $_SESSION["svr_user_id"];
$currentDate = date("Y-m-d H:i:s");

$rowCount = $database->saveUctBene($householdID, $firstName, $middleName, $lastName, $extName ,$appUser,$currentDate);

header( "location: search.view.php?success={$rowCount}");
?>