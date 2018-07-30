<?php

class HouseholdDetail {

	protected $rosterCount = 0;
	protected $rosterNames = array();
	protected $withSibling = false;
	protected $withParent = false;
	protected $youngestMemberBirthday = '';
	protected $oldestMemberBirthday = '';
	protected $spouseBirthday = '';
	protected $numberOfChildren = 0;
	protected $numberOfGrandChildren = 0;
	protected $oldestChildName = '';
	protected $youngestChildName = '';
	protected $isOldest = false;
	protected $birthday	= '';

	public function __construct($results){

		$this->rosterCount	= count($results);

		foreach ($resuls as $result) {
			foreach ($result as $key => $value) {
				
				if($key == '7 - Father / Mother'){
					$this->$withParent	= true;
				}

				if($key == '6 - Grandson / Granddaugh'){
					$this->$numberOfGrandChildren++;
				}

				if($key == '5 - Son-in-law / Daughter'){
					
				}

				if($key == '4 - Brother / Sister'){
					$this->$withSibling	= true;
				}

				if($key == '3 - Son / Daughter'){
					$this->$numberOfChildren++;
				}

				if($key == '2 - Wife / Spouse'){
					
				}

			}
		}

	}

	public function checkHouseholdHeadSiblings($results){

			
	}

}


?>