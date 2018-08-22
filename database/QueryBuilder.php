<?php

class QueryBuilder

{

	protected $pdo;

	public function __construct($pdo)

	{

		$this->pdo = $pdo;

	}

	public function searchByHousehold($hh_number){

		$statement = $this->pdo->prepare("SELECT hh_number, psgc, birthday, rel_hh,
											AES_DECRYPT(first_name,'.listahanan2_UCT.') as 'first_name',
											AES_DECRYPT(mid_name,'.listahanan2_UCT.') as 'mid_name',
											AES_DECRYPT(last_name,'.listahanan2_UCT.') as 'last_name',
											AES_DECRYPT(ext_name,'.listahanan2_UCT.') as 'ext_name'
											FROM tbl_search
											WHERE hh_number = '{$hh_number}'");

		/*$statement = $this->pdo->prepare("SELECT *
											FROM tbl_search
											WHERE hh_id = '{$householdID}'");*/
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_ASSOC);
		//return $statement->errorInfo();

	}

	public function searchIfRegisteredBene($householdNumber){

		$statement = $this->pdo->prepare("SELECT 
											AES_DECRYPT(first_name,'.listahanan2_UCT.') as 'first_name',
											AES_DECRYPT(mid_name,'.listahanan2_UCT.') as 'mid_name',
											AES_DECRYPT(last_name,'.listahanan2_UCT.') as 'last_name',
											AES_DECRYPT(ext_name,'.listahanan2_UCT.') as 'ext_name'
											FROM tbl_uct_bene
											WHERE hh_number = '{$householdNumber}'");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_ASSOC);
		//return $statement->errorInfo();

	}

	public function tagDeniedHousehold($householdNumber){

		$statement = $this->pdo->prepare("UPDATE tbl_search
											SET with_denied = 1
											WHERE hh_number = '{$householdNumber}'");

		$statement->execute();

		return $statement->rowCount();

	}

	public function trackDeniedHousehold($householdNumber, $appuserID, $currentDate){

		$archive = 0;

		$statement = $this->pdo->prepare("INSERT tbl_denied (hh_number, user_id, datetime_denied, archive)
											VALUES (?,?,?,?)" );

		$statement->execute([$householdNumber, $appuserID, $currentDate, $archive]);

		return $statement->rowCount();

	}

	public function saveUctBene($householdNumber, $firstName, $middleName, $lastName, $extName, $appuserID, $currentDate){

		$archive = 0;

		$statement = $this->pdo->prepare("INSERT tbl_uct_bene (hh_number, first_name, mid_name, last_name, ext_name, user_id, datetime_added, archive)
											VALUES ('{$householdNumber}',AES_ENCRYPT('{$firstName}', '.listahanan2_UCT.'),AES_ENCRYPT('{$middleName}', '.listahanan2_UCT.'),AES_ENCRYPT('{$lastName}', '.listahanan2_UCT.'),AES_ENCRYPT('{$extName}', '.listahanan2_UCT.'),'{$appuserID}','{$currentDate}',{$archive})" );

		$statement->execute();
		//$statement->execute([$householdID, $firstName, $middleName, $lastName, $extName, $appuserID, $currentDate, $archive]);

		return $statement->rowCount();

	}

	public function saveUctBeneLogs($householdNumber){

		$archive = 0;

		$statement = $this->pdo->prepare("INSERT INTO tbl_uct_bene_logs (SELECT * from tbl_uct_bene where hh_number = '{$householdNumber}')" );

		$statement->execute();
		//$statement->execute([$householdID, $firstName, $middleName, $lastName, $extName, $appuserID, $currentDate, $archive]);

		return $statement->rowCount();

	}

	public function updateUctBene($householdNumber, $firstName, $middleName, $lastName, $extName, $appuserID, $currentDate){

		$archive = 0;

		$statement = $this->pdo->prepare("UPDATE tbl_uct_bene SET 
												last_modified = '{$currentDate}',
												modified_by = '{$appuserID}',
												first_name = AES_ENCRYPT('{$firstName}', '.listahanan2_UCT.'),
												mid_name = AES_ENCRYPT('{$middleName}', '.listahanan2_UCT.'),
												last_name = AES_ENCRYPT('{$lastName}', '.listahanan2_UCT.'),
												ext_name = AES_ENCRYPT('{$extName}', '.listahanan2_UCT.')
												WHERE hh_number = '{$householdNumber}'" );

		$statement->execute();
		//$statement->execute([$householdID, $firstName, $middleName, $lastName, $extName, $appuserID, $currentDate, $archive]);

		return $statement->rowCount();

	}


}