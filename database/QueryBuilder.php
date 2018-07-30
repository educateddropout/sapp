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

	}


}