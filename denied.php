<?php

$database = require 'bootstrap.php';

// setting return value
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//header('Content-Type: application/download; charset=utf-8');

// decoding of post data //
$postdata = file_get_contents("php://input");
$request = (array)json_decode($postdata);

date_default_timezone_set('Asia/Manila');
$householdID = $request['household_id'];
//$householdID = '012801001-2-01665418';
$appUser = "mambo_no_5";
$currentDate = date("Y-m-d H:i:s");

$arrayKey = ["updateErrCtr","insertErrCtr"];

$updateErrCtr = $database->tagDeniedHousehold($householdID);
$insertErrCtr = $database->trackDeniedHousehold($householdID,$appUser,$currentDate);

$dummyArray = [$updateErrCtr, $insertErrCtr ];




//$householdDetail = new HouseholdDetail($results);
//print_r($householdDetail);

//$householdQuestions = new FormulateHouseholdQuestions(new HouseholdDetail($results));

// /print_r($householdQuestions->randomQandA());

//$randomQandA = json_encode($householdQuestions->randomQandA());

print_r(json_encode(array_combine($arrayKey, $dummyArray)));


?>