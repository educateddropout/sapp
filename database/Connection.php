<?php

class Connection

{

	public static function make()

	{

		try{

			return new PDO('mysql:host=localhost;dbname=search_db','root','');

		} catch (PDOException $e) {

			die($e->getMessage());

		}
		
	}

}