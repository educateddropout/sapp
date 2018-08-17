<?php

class HouseholdDetail {

	protected $rosterCount = 0;
	protected $childrenNames = array();
	protected $withSibling = "NO";
	protected $withParent = "NO";
	protected $youngestMemberBirthYear = ''; protected $oldestMemberBirthYear = '';
	protected $spouseBirthYear = '';
	protected $numberOfChildren = 0;
	protected $numberOfGrandChildren = 0;
	//protected $isOldest = false;
	protected $birthYear	= '';
	protected $firstName = "";
	protected $middleName = "";
	protected $lastName = "";
	protected $extName = "";

	public function __construct($results){

		$this->rosterCount	= count($results);

		$ctr = 0; // always make $ctr variable reusable

		foreach ($results as $result) {

				$birthYear = substr($result['birthday'], 0, 4);

				//minimum and maximum birthYear
				if($ctr == 0){

					$this->oldestMemberBirthYear = $birthYear;
					$this->youngestMemberBirthYear = $birthYear;
				}
				else{

					//oldest
					if($this->oldestMemberBirthYear > $birthYear){
						$this->oldestMemberBirthYear = $birthYear;
					}

					//youngest
					if($this->youngestMemberBirthYear < $birthYear){
						$this->youngestMemberBirthYear = $birthYear;
					}
				}

				if($result['rel_hh'] == '1 - Household Head'){

					$this->birthYear = $birthYear;
					$this->firstName = $result['first_name'];
					$this->middleName = $result['mid_name'];
					$this->lastName = $result['last_name'];
					$this->extName = $result['ext_name'];

				}


				
				if($result['rel_hh'] == '2 - Wife / Spouse'){

					$this->spouseBirthYear = $birthYear;

				}
				
				if($result['rel_hh'] == '3 - Son / Daughter'){

					$this->numberOfChildren++;

					$fullName = "{$result['first_name']} {$result['mid_name']} {$result['last_name']} {$result['ext_name']}";

					trim($fullName," \t\n\r");
					array_push($this->childrenNames,$fullName);
				}

				if($result['rel_hh'] == '4 - Brother / Sister'){

					$this->withSibling	= "YES";

				}

			
				if($result['rel_hh'] == '6 - Grandson / Granddaugh'){

					$this->numberOfGrandChildren++;

				}

				if($result['rel_hh'] == '7 - Father / Mother'){

					$this->withParent	= "YES";

				}

			$ctr++;
		}

	}

	public function birthYear(){

		return $this->birthYear;

	}

	public function withParent(){

		return $this->withParent;
	}

	public function withSibling(){
		return $this->withSibling;
	}

	public function numberOfChildren(){
		return $this->numberOfChildren;
	}

	public function numberOfGrandChildren(){
		return $this->numberOfGrandChildren;
	}

	public function rosterCount(){
		return $this->rosterCount;
	}

	public function oldestMemberBirthYear(){
		return $this->oldestMemberBirthYear;
	}

	public function youngestMemberBirthYear(){
		return $this->youngestMemberBirthYear;
	}

	public function spouseBirthYear(){
		return $this->spouseBirthYear;
	}

	public function childrenNames(){
		return $this->childrenNames;
	}

	public function getHouseholdHeadDetails(){

		$arrayKey = ["firstName","middleName","lastName","extName"];

		$arrayValues = [$this->firstName,$this->middleName,$this->lastName,$this->extName];

		$dummyArray["householdHeadDetails"] = array_combine($arrayKey,$arrayValues);

		return $dummyArray;

	}



}


?>