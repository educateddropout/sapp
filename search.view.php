<?php

	//$savingHHCtr = $_GET["success"]; // 1 success, 0 error
	require 'sessionCheck.php';
	
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Search App Home Page</title>
	<link rel="icon" type="image/png" href="images/sapp.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="lib/css/v4/w3.css">
	<link rel="stylesheet" href="lib/css/v4/w3-theme-blue-grey.css">
	<script type="text/javascript"  src="lib/js/jquery-3.3.1.slim.min.js" ></script>
	<link rel="stylesheet" href="lib/css/font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="lib/js/angular.min.js"></script>
	<script type="text/javascript" src="Angular/search.js"></script>

</head>

<body ng-app="search">

	<!-- Navbar (sit on top) -->
	<div class="w3-top w3-theme" >
		<div class="w3-row w3-padding">
			<div class="w3-col l6 w3-wide w3-padding"><strong>UCT SVR</strong></div>
			<div class="w3-col l6 ">
				
				<div class="w3-row-padding w3-right">
					<div class="w3-third">
						<a href="logout.php" class="w3-btn"><strong><u>Logout</u></strong></a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<br>
	<br>
	<br>
	<main role="main" class="w3-container" ng-controller="searchCtrl as sc">
		<div class="w3-row">
			<div class="w3-col l1">&nbsp</div>
			<div class="w3-col l10 ">
				<div class="w3-row">
					<div class="w3-half">
						<label><strong>Household Number:</strong></label>
						<input class="w3-input w3-border" type="text" ng-model="sc.household_number" maxlength="20">
						<span class="w3-text-red">{{sc.household_number_error_message}}</span>

						
					</div>
					<div class="w3-half">
						<div class="w3-third w3-container">
							<label>&nbsp<br></label>
							<button class="w3-button w3-theme-action w3-ripple" ng-click="sc.submitSearch()" ng-disabled="sc.lockSearchButton == 1"><i class="fa fa-search" aria-hidden="true"></i><strong>&nbspSearch</strong></button>
						</div>
						<div class="w3-third w3-container w3-right">
							<label>&nbsp<br></label>
							<button class="w3-button w3-theme-action w3-ripple w3-right" ng-click="sc.submitSkip()" ng-disabled="sc.ctr > 0" ng-show="sc.skip != 0"><strong>Skip verification</strong></button>
						</div>
					</div>
					
				</div>
				<br>
				<div class="w3-row w3-topbar">
					&nbsp
				</div>

				<div class="w3-row w3-right">
					<div class="w3-col">
						<div class="w3-row-padding">
							<div class="w3-col s4 "><div class=""><img ng-src="{{sc.image[0]}}" height="42" width="42"></div></div>
							<div class="w3-col s4 "><div class=""><img ng-src="{{sc.image[1]}}" height="42" width="42"></div></div>
							<div class="w3-col s4 "><div class=""><img ng-src="{{sc.image[2]}}" height="42" width="42"></div></div>
						</div>
					</div>
				</div>


				<div class="w3-row w3-container">
					<br>
					<div ng-repeat="rs in sc.results" ng-init="ansctr = 2">
						<div ng-show="sc.ctr == $index">
							<div class="w3-panel w3-leftbar w3-border-theme w3-theme-l4 " ng-class="sc.panelColor">
								<h2><p class=""><strong>{{rs.question}}</strong>
								</p></h2>

							</div>
							<div class="w3-row w3-container" >
								<div class="w3-half ">
									&nbsp
								</div>
								<div class="w3-half">
									<div class="w3-row">
										<div class='w3-col s8 w3-container'>
											<label>&nbsp{{rs.remarks}}</label>
											<input ng-model="rs.userAnswer" class="w3-input w3-border" type="text" style="text-transform:uppercase">
										</div>
										<div class='w3-col s4 w3-container w3-right'>
											<br>
											<button class="w3-btn w3-border w3-theme-action" ng-click="ansctr = sc.submitAns(rs.userAnswer, rs.answer, rs.qnum)">Submit</button>
										</div>
									</div>
									<div class="w3-row">
										<div class='w3-col s8 w3-container'>
												<span class="w3-right w3-text-red">{{sc.userAnswerErrorMessage}}</span>
										</div>
										<div class='w3-col s4 w3-container'>
											&nbsp
										</div>
									</div>
									
								</div>
							</div>
							{{rs.answer}}
						</div>

					</div>
				</div>
				<div class="w3-row w3-border" ng-show="sc.readyForRegistration == 1">
					<br>
					<div class="w3-container w3-border-bottom">
						<div class="w3-row"><strong>Please check Household Head Name:</strong></div>

					</div>
					<div class="w3-container ">
						<br>
						<form action="registerHousehold.php" method="post" onsubmit="return confirm('Are all the details correct?');">
							<div class="w3-twothird w3-rightbar w3-border-theme" >
								<input class="w3-input w3-border" type="text" ng-model="sc.household_number" name="household_number" maxlength="20" ng-hide="sc.hideForever == 0">

								<div class="w3-row-padding">
									
									<div class="w3-quarter ">
										<label>First Name:</label>
										<input class="w3-input w3-border" type="text" ng-model="sc.first_name" name="first_name" maxlength="40">
									</div>
									<div class="w3-quarter ">
										<label>Middle Name:</label>
										<input class="w3-input w3-border" type="text" ng-model="sc.middle_name" name="middle_name" maxlength="40">
									</div>
									<div class="w3-quarter ">
										<label>Last Name:</label>
										<input class="w3-input w3-border" type="text" ng-model="sc.last_name" name="last_name" maxlength="40">
									</div>
									<div class="w3-quarter ">
										<label>Ext Name:</label>
										<input class="w3-input w3-border" type="text" ng-model="sc.ext_name" name="ext_name" maxlength="10">
									</div>

								</div>
							</div>
							<div class="w3-third">
								<br>
								<button class="w3-btn w3-border w3-theme-action w3-right" type="submit"><strong>Proceed Registration</strong></button>
							</div>
						</form>
					</div>
					<br>
				</div>
				
			</div>
			<div class="w3-col l1">&nbsp</div>
		</div>

		

	</main>
</body>
</html>