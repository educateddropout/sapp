<?php



?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Search App Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="lib/css/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="lib/bootstrap-v4.0.0/dist/css/bootstrap.min.css" >
	<script type="text/javascript"  src="lib/bootstrap-v4.0.0/dist/js/bootstrap.min.js" ></script>
	<script type="text/javascript"  src="lib/js/jquery-3.3.1.slim.min.js" ></script>
	<script type="text/javascript"  src="lib/js/popper.min.js" ></script>
	<link rel="stylesheet" href="lib/css/font-awesome-4.7.0/css/font-awesome.min.css">
	
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

							<span data-toggle="tooltip" data-placement="bottom" title="18 digit id provide in UCT ID in notification form"><i class="fa fa-question-circle-o" aria-hidden="true"></i></span>&nbsp
							<span class="input-group-text" id="inputGroup-sizing-default">Household ID &nbsp&nbsp </span>

						</div>

						<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" ng-model="sc.household_id" maxlength="20">
						
					</div>
					<small class="text-danger">&nbsp{{sc.household_number_error_message}}</small>
				
			</div>
			<div class="col">

				<div class="input-group mb-3">

					

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
			<div class=" row border">
				<h3><p class=""><strong>{{rs.question}}</strong>
				</p></h3>
			</div>
			{{rs.answer}}
			<div class="row" ng-init="ansctr = 2">
				<div class="container">
					<div class="row">
						<div class="col border">
							<span ng-show = "ansctr == 1" class="input-group-text p-3 mb-2 bg-success text-white rounded-circle"><i class="fa fa-check" aria-hidden="true"></i></span>
							<span ng-show = "ansctr == 0" class="input-group-text p-3 mb-2 bg-danger text-white rounded-circle"><i class="fa fa-times" aria-hidden="true"></i></span>
						</div>
						<div class="col-11 border">
							<div class="input-group mb-2">
								<input type="text" class="form-control" ng-model="rs.userAnswer">
								<div class="input-group-append">
									<button ng-click="ansctr = sc.submitAns(rs.userAnswer, rs.answer)">Submit</button>{{ansctr}}
								</div>

							</div>
						</div>
					</div>
				</div>


			</div>

		</div>

	</main>
</body>
</html>