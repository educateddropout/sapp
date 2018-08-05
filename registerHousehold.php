<?php

$database = require 'bootstrap.php';

$householdID = $_POST['household_id'];
$firstName =  $_POST['first_name'];
$middleName = $_POST['middle_name'];
$lastName = $_POST['last_name'];
$extName = $_POST['ext_name'];

date_default_timezone_set('Asia/Manila');
$appUser = "mambo_no_5";
$currentDate = date("Y-m-d H:i:s");

$insertErrCtr = $database->saveUctBene($householdID, $firstName, $middleName, $lastName, $extName ,$appUser,$currentDate);

print_r($insertErrCtr	);
?>