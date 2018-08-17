<?php

$database = require 'bootstrap.php';
session_start();

// setting return value
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//header('Content-Type: application/download; charset=utf-8');

// decoding of post data //
$postdata = file_get_contents("php://input");
$request = (array)json_decode($postdata);

date_default_timezone_set('Asia/Manila');
$householdNumber = $request['household_number'];
//$householdID = '012801001-2-01665418';
$appUser = $_SESSION["svr_user_id"];
$currentDate = date("Y-m-d H:i:s");

$arrayKey = ["updateErrCtr","insertErrCtr"];

$updateErrCtr = $database->tagDeniedHousehold($householdNumber);
$insertErrCtr = $database->trackDeniedHousehold($householdNumber,$appUser,$currentDate);

$dummyArray = [$updateErrCtr, $insertErrCtr ];




//$householdDetail = new HouseholdDetail($results);
//print_r($householdDetail);

//$householdQuestions = new FormulateHouseholdQuestions(new HouseholdDetail($results));

// /print_r($householdQuestions->randomQandA());

//$randomQandA = json_encode($householdQuestions->randomQandA());

print_r(json_encode(array_combine($arrayKey, $dummyArray)));


?>