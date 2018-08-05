<?php

$database = require 'bootstrap.php';
require 'HouseholdDetail.php';
require 'FormulateHouseholdQuestions.php';

// setting return value
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//header('Content-Type: application/download; charset=utf-8');

// decoding of post data //
$postdata = file_get_contents("php://input");
$request = (array)json_decode($postdata);

$householdID = $request['household_id'];
//$householdID = '012801001-2-81665418';

$results  = $database->searchByHousehold($householdID);

if(count($results) == 0){
	$dummyArray["resultCnt"] = 0;
	print_r(json_encode($dummyArray));
}
else{

	$householdDetails = new HouseholdDetail($results);

	$householdQuestions = new FormulateHouseholdQuestions($householdDetails);

	$householdHeadDetails = $householdDetails->getHouseholdHeadDetails();


	//$arrayKey = ["randomQuestions"];
	$dummyArray["randomQuestions"] = $householdQuestions->randomQandA();

	$dummyVar = substr(json_encode($householdHeadDetails),0,-1).",".substr(json_encode($dummyArray),1);
	print_r($dummyVar);

}


?>