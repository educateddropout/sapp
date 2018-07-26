<?php

$database = require 'bootstrap.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//header('Content-Type: application/download; charset=utf-8');


// decoding of post data //
$postdata = file_get_contents("php://input");
$request = (array)json_decode($postdata);


$householdNumber = $request['household_number'];
$firstName = $request['first_name'];
$lastName = $request['last_name'];

$searchbyCtr  = "";

if($householdNumber != ''){
	$result = $database->searchByHousehold($householdNumber);
	$searchbyCtr = "Household Number";

	if(empty($result) && ($firstName != "" || $lastName != "")){

		$result = $database->searchByName($firstName, $lastName);
		$searchbyCtr = "Name";
	}
}
else{

	$result = $database->searchByName($firstName, $lastName);
	$searchbyCtr = "Name";
}

$result = json_encode($result);

print_r($result);


?>