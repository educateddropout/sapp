<?php

class FormulateHouseholdQuestions{

	
	protected $randomQandA = array();


	public function __construct(HouseholdDetail $householdDetail){

		$arrayKey  = array("question","answer");
		$arrayQandA  = array();
		
		//Q0
		$dummyArray = array("How many members do you have in your household? (Including other relative, domestic helper, non-relative and boarder).",$householdDetail->rosterCount());
		$arrayQ0 = array_combine($arrayKey, $dummyArray);

		//Q1
		$dummyArray = array("What is the household head birthyear?",$householdDetail->birthYear());
		$arrayQ1 = array_combine($arrayKey, $dummyArray);

		array_push($arrayQandA, $arrayQ0, $arrayQ1);

		if($householdDetail->rosterCount() > 1){

			//Q2
			$dummyArray = array("Are there any sibling of a household head living in your household?",$householdDetail->withSibling());
			$arrayQ2 = array_combine($arrayKey, $dummyArray);

			//Q3
			$dummyArray = array("Is household head father/mother living in your household?",$householdDetail->withSibling());
			$arrayQ3 = array_combine($arrayKey, $dummyArray);

			//Q4
			$dummyArray = array("What is the birthyear of the youngest member of the household?",$householdDetail->youngestMemberBirthYear());
			$arrayQ4 = array_combine($arrayKey, $dummyArray);

			//Q5
			$dummyArray = array("What is the birthyear of the oldest member of the household?",$householdDetail->oldestMemberBirthYear());
			$arrayQ5 = array_combine($arrayKey, $dummyArray);

			//Q6
			$dummyArray = array("How many children of the household head living in the household?",$householdDetail->numberOfChildren());
			$arrayQ6 = array_combine($arrayKey, $dummyArray);

			//Q7
			$dummyArray = array("How many grandchildren of the household head living in the household?",$householdDetail->numberOfGrandChildren());
			$arrayQ7 = array_combine($arrayKey, $dummyArray);

			//Q8
			$dummyArray = array("How many grandchildren of the household head living in the household?",$householdDetail->numberOfGrandChildren());
			$arrayQ8 = array_combine($arrayKey, $dummyArray);

			array_push($arrayQandA, $arrayQ2, $arrayQ3, $arrayQ4, $arrayQ5, $arrayQ6, $arrayQ7, $arrayQ8);

			if($householdDetail->spouseBirthYear() != ""){

				//Q9
				$dummyArray = array("What is the household head spouse birthyear?",$householdDetail->spouseBirthYear());
				$arrayQ9 = array_combine($arrayKey, $dummyArray);

				array_push($arrayQandA, $arrayQ9);

			}

			if($householdDetail->numberOfChildren() > 0 ){

				//Q10
				$dummyArray = array("Provide 1 full name of the household head son/daughter.",$householdDetail->childrenNames());
				$arrayQ10 = array_combine($arrayKey, $dummyArray);

				array_push($arrayQandA, $arrayQ10);
			}
			/*$dummyArray = array("Provide 1 full name household head children.",$householdDetail->childrenNames());
			$arrayQ3 = array_combine($arrayKey, $dummyArray);*/
		}

		// only return 3 random questions
		
		$randomQandA = array();
		$dummyArray = array();

		$randomNumber = mt_rand(0,(count($arrayQandA)-1));
		array_push($dummyArray, $randomNumber);
		array_push($randomQandA, $arrayQandA[$randomNumber]);

		for ($i=1; $i < 3; $i++) { 

			$randomNumber = mt_rand(0,(count($arrayQandA)-1));
			
			if(in_array($randomNumber, $dummyArray)){
				//echo "match found";
				$i--;
			}
			else{

				array_push($dummyArray, $randomNumber);
				array_push($randomQandA, $arrayQandA[$randomNumber]);
			}
			
		}

		
		$this->randomQandA = $randomQandA;
		
	}

	public function randomQandA(){
		return $this->randomQandA;
	}

}

?>