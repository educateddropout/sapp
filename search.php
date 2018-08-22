<?php

$database = require 'bootstrap.php';
require 'HouseholdDetail.php';
require 'FormulateHouseholdQuestions.php';
session_start();

// setting return value
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//header('Content-Type: application/download; charset=utf-8');

// decoding of post data //
$postdata = file_get_contents("php://input");
$request = (array)json_decode($postdata);

$householdNumber = $request['household_number'];
$userType = $_SESSION["svr_user_type"];
//$userType = 0;
//$householdNumber = '01665423';

$results  = $database->searchIfRegisteredBene($householdNumber);

if($userType == 1){
	if(count($results) != 0){
		$dummyArray["resultCnt"] = -1;
		print_r(json_encode($dummyArray));
	}
	else{

		$results  = $database->searchByHousehold($householdNumber);

		if(count($results) == 0){
			$dummyArray["resultCnt"] = 0;
			print_r(json_encode($dummyArray));
		}
		else{

			$householdDetails = new HouseholdDetail($results,$userType);

			$householdQuestions = new FormulateHouseholdQuestions($householdDetails);

			$householdHeadDetails = $householdDetails->getHouseholdHeadDetails();

			//print_r($results);
			//print_r(substr(json_encode($householdHeadDetails),0,-1));
			
			$dummyArray["randomQuestions"] = $householdQuestions->randomQandA();

			$dummyVar = substr(json_encode($householdHeadDetails),0,-1).",".substr(json_encode($dummyArray),1);
			print_r($dummyVar);

		}
	}
}
else{

	
	if(count($results) != 0){


		$householdDetails = new HouseholdDetail($results,$userType); //only get household head details for editing // admin user only
		$householdHeadDetails = $householdDetails->getHouseholdHeadDetails();

		$dummyArray["resultCnt"] = 2;
		$dummyVar = substr(json_encode($householdHeadDetails),0,-1).",".substr(json_encode($dummyArray),1);
		print_r($dummyVar);


	}
	else{

		$dummyArray["resultCnt"] = 1;
		print_r(json_encode($dummyArray));

	}
}

?>