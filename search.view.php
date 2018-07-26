<?php




?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Search App Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="lib/css/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="lib/css/font-awesome-4.7.0/css/font-awesome.min.css">
	
	<script type="text/javascript" src="lib/js/jquery-2.1.3.js"></script>
	<script src="lib/js/angular.min.js"></script>
	<script type="text/javascript" src="Angular/search.js"></script>
</head>
<body ng-app="search">
	<header>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<div class=" d-flex justify-content-between">
				<a class="navbar-brand d-flex align-items-center" href=#><strong>UCT Search App</strong></a>
			</div>
		</nav>
	</header>
	<br><br><br>
	<main role="main" class="container" ng-controller="searchCtrl as sc">
		<div class="row mb-2 border text-danger">&nbsp{{sc.all_error_message}}</div>

		<div class="row border-bottom">
			<div class="col border-right">

					<div class="input-group">

						<div class="input-group-prepend">

							<span class="input-group-text" id="inputGroup-sizing-default">Household Number</span>

						</div>

						<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" ng-model="sc.household_number" maxlength="8">
						
					</div>
					<small class="text-danger">&nbsp{{sc.household_number_error_message}}</small>
				
			</div>
			<div class="col">

				<div class="input-group mb-3">

					<div class="input-group-prepend">

						<span class="input-group-text" id="inputGroup-sizing-default">First Name</span>

					</div>

					<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" ng-model="sc.first_name">

				</div>
			</div>
			<div class="col">
				<div class="input-group mb-3">

					<div class="input-group-prepend">

						<span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>

					</div>

					<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" ng-model="sc.last_name">

				</div>
			</div>
			<div class="col-push">
				<button type="button" class="btn btn-dark "><i class="fa fa-search" aria-hidden="true" ng-click="sc.submitSearch()">&nbsp <strong>Search</strong></i></button>
			</div>

		</div>

		

		<div class="d-flex flex-row-reverse"> 
			<div class="p-2 text-dark">{{sc.resultMessage}}</div>
		</div>

		<div ng-repeat="rs in sc.results">
			
			<a  ng-href="hhdetail?hh={{rs.hh_id}}">"<strong>{{rs.hh_id}}</strong>","{{rs.last_name}}, {{rs.first_name}} {{rs.mid_name}} {{rs.ext_name}} ","{{rs.birthday}}","{{rs.rel_hh_name}}"</a>
		</div>

	</main>
</body>
</html>