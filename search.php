<?php

$database = require 'bootstrap.php';
require 'HouseholdDetail.php';
require 'FormulateHouseholdQuestions.php';

/*header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//header('Content-Type: application/download; charset=utf-8');


// decoding of post data //
$postdata = file_get_contents("php://input");
$request = (array)json_decode($postdata);*/

function analyzeHousehold($householdInformation){

	$hhRosterCount = count($householdInformation);

	$questionLists = ["Provide 1 full name of a household member except household head name.",
	"How many members do you have in your household? (Including other relative, domestic helper, non-relative and boarder).",
	"What is the household head birthdate?",
	"Are there any sibling of a household head living in your household?",
	"Are the household head's mother/father still living in the household?",
	"What is the birthday of the oldest member of the household? (During the assessment)",
	"What is the birthday of the youngest member of the household? (During the assessment)",
	"What is the birthday of the household head spouse? ",
	"Is the household head, the oldest member of the houseold?",
	"How many children of the household head living in the household?",
	"How many grandchildren of the household head living in the household?"];

	$householdQuestion = "[";

	if($hhRosterCount	!=  1){
			$householdQuestion .= "{\"question\" : \"{$questionLists[1]}\"";
	}
	print_r(	$householdQuestion);

}

//$householdNumber = $request['household_number'];
$householdID = '012801001-2-01665419';

$results  = $database->searchByHousehold($householdID);

//$householdDetail = new HouseholdDetail($results);

$householdQuestions = new FormulateHouseholdQuestions(new HouseholdDetail($results));




//$result = json_encode($result);

//print_r($result);


?>