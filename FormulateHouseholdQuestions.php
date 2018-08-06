<?php

class FormulateHouseholdQuestions{

	
	protected $randomQandA = array();


	public function __construct(HouseholdDetail $householdDetail){

		$arrayKey  = array("qnum","question","answer","remarks");
		$arrayQandA  = array();

		//Q0
		$dummyArray = array(0,"What is the household head birthyear?",$householdDetail->birthYear(),"(Ex. 1991)");
		$arrayQ0 = array_combine($arrayKey, $dummyArray);

		//Q1
		$dummyArray = array(1,"Are there any brother/sister of a household head living in your household?",$householdDetail->withSibling(),"(Ans. Yes or No)");
		$arrayQ1 = array_combine($arrayKey, $dummyArray);

		//Q2
		$dummyArray = array(2,"Is household head father/mother living in your household?",$householdDetail->withSibling(),"(Ans. Yes or No)");
		$arrayQ2 = array_combine($arrayKey, $dummyArray);

		//Q3
		$dummyArray = array(3,"How many grandchildren of the household head living in the household?",$householdDetail->numberOfGrandChildren()," ");
		$arrayQ3 = array_combine($arrayKey, $dummyArray);

		array_push($arrayQandA, $arrayQ0, $arrayQ1, $arrayQ2, $arrayQ3);

		if($householdDetail->rosterCount() > 1){
			

			//Q4
			$dummyArray = array(4,"What is the birthyear of the youngest member of the household?",$householdDetail->youngestMemberBirthYear(),"(Ex. 1991)");
			$arrayQ4 = array_combine($arrayKey, $dummyArray);

			//Q5
			$dummyArray = array(5,"What is the birthyear of the oldest member of the household?",$householdDetail->oldestMemberBirthYear(),"(Ex. 1991)");
			$arrayQ5 = array_combine($arrayKey, $dummyArray);

			//Q6
			$dummyArray = array(6,"How many children of the household head living in the household?",$householdDetail->numberOfChildren()," ");
			$arrayQ6 = array_combine($arrayKey, $dummyArray);

			//Q7
			$dummyArray = array(7,"How many members do you have in your household? (Including other relative, domestic helper, non-relative and boarder).",$householdDetail->rosterCount()," ");
			$arrayQ7 = array_combine($arrayKey, $dummyArray);

			
			//Q8
			$dummyArray = array(8,"How many grandchildren of the household head living in the household?",$householdDetail->numberOfGrandChildren()," ");
			$arrayQ8 = array_combine($arrayKey, $dummyArray);

			array_push($arrayQandA, $arrayQ4, $arrayQ5, $arrayQ6, $arrayQ7, $arrayQ8);

			if($householdDetail->spouseBirthYear() != ""){

				//Q9
				$dummyArray = array(9,"What is the household head spouse birthyear?",$householdDetail->spouseBirthYear(),"(Ex. 1991)");
				$arrayQ9 = array_combine($arrayKey, $dummyArray);

				array_push($arrayQandA, $arrayQ9);

			}

			if($householdDetail->numberOfChildren() > 0 ){

				//Q10
				$dummyArray = array(10,"Provide 1 full name of the household head son/daughter.",$householdDetail->childrenNames(),"(Ex. Juan Dela Cruz)");
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