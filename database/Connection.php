<?php

class Connection

{

	public static function make()

	{

		try{

			return new PDO('mysql:host=localhost;dbname=uct_search','root','');

		} catch (PDOException $e) {

			die($e->getMessage());

		}
		
	}

}