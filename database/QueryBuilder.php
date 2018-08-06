<?php

class QueryBuilder

{

	protected $pdo;

	public function __construct($pdo)

	{

		$this->pdo = $pdo;

	}

	public function searchByHousehold($householdID){

		$statement = $this->pdo->prepare("SELECT * from tbl_search
											WHERE hh_id = '{$householdID}'");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_ASSOC);
		//return $statement->errorInfo();

	}

	public function searchIfRegisteredBene($householdID){

		$statement = $this->pdo->prepare("SELECT * from tbl_uct_bene
											WHERE hh_id = '{$householdID}'");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_ASSOC);
		//return $statement->errorInfo();

	}

	public function tagDeniedHousehold($householdID){

		$statement = $this->pdo->prepare("UPDATE tbl_search
											SET with_denied = 1
											WHERE hh_id = '{$householdID}'");

		$statement->execute();

		return $statement->rowCount();

	}

	public function trackDeniedHousehold($householdID, $appuserID, $currentDate){

		$archive = 0;

		$statement = $this->pdo->prepare("INSERT tbl_denied (hh_id, user_id, datetime_denied, archive)
											VALUES (?,?,?,?)" );

		$statement->execute([$householdID, $appuserID, $currentDate, $archive]);

		return $statement->rowCount();

	}

	public function saveUctBene($householdID, $firstName, $middleName, $lastName, $extName, $appuserID, $currentDate){

		$archive = 0;

		$statement = $this->pdo->prepare("INSERT tbl_uct_bene (hh_id, first_name, mid_name, last_name, ext_name, user_id, datetime_added, archive)
											VALUES (?,?,?,?,?,?,?,?)" );

		$statement->execute([$householdID, $firstName, $middleName, $lastName, $extName, $appuserID, $currentDate, $archive]);

		return $statement->rowCount();

	}


}