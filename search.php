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
//$householdID = '012801001-2-01665418';

$results  = $database->searchByHousehold($householdID);

//$householdDetail = new HouseholdDetail($results);
//print_r($householdDetail);

$householdQuestions = new FormulateHouseholdQuestions(new HouseholdDetail($results));

// /print_r($householdQuestions->randomQandA());

$randomQandA = json_encode($householdQuestions->randomQandA());

print_r($randomQandA);


?>