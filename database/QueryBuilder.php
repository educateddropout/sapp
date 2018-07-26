<?php

class QueryBuilder

{

	protected $pdo;

	public function __construct($pdo)

	{

		$this->pdo = $pdo;

	}

	public function searchByHousehold($householdNumber){

		$statement = $this->pdo->prepare("SELECT * from tbl_search
											WHERE hh_number = '{$householdNumber}'");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);

	}

	// arg name, column name
	public function searchByName($firstName, $lastName){

		if($lastName != "" && $firstName != ""){

			$statement = $this->pdo->prepare("SELECT * from tbl_search
											WHERE first_name like '{$firstName}%' and last_name like '{$lastName}%'");

		}
		else{
			if($lastName == ""){
				$statement = $this->pdo->prepare("SELECT * from tbl_search
											WHERE first_name like '{$firstName}%'");
			}
			else{
				$statement = $this->pdo->prepare("SELECT * from tbl_search
											WHERE last_name like '{$lastName}%'");
			}
		}

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

}