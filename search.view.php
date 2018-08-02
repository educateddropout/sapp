<?php



?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Search App Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="lib/css/v4/w3.css">
	<script type="text/javascript"  src="lib/js/jquery-3.3.1.slim.min.js" ></script>
	<link rel="stylesheet" href="lib/css/font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="lib/js/angular.min.js"></script>
	<script type="text/javascript" src="Angular/search.js"></script>
</head>
<body ng-app="search">
	<header class="w3-teal">
		
		<a class="" href=#><strong>UCT Search App</strong></a>
	</header>
	<br>
	<main role="main" class="w3-container" ng-controller="searchCtrl as sc">
		<div class="w3-row">
			<div class="w3-col l1">&nbsp</div>
			<div class="w3-col l10 ">test
				<div class="w3-row w3-container w3-border">
					<div class="w3-half w3-container">
						<label><strong>Household ID:</strong></label>
						<input class="w3-input w3-border" type="text" ng-model="sc.household_id" maxlength="20">
						{{sc.ctr}}
					</div>
					<div class="w3-third w3-container">
						<label>&nbsp<br></label>
						<button class="w3-button w3-grey w3-ripple" ng-click="sc.submitSearch()"><i class="fa fa-search" aria-hidden="true"></i><strong>&nbspSearch</strong></button>
					</div>
				</div>
				<br>

				<div class="w3-row w3-right">
					<div class="w3-col w3-border">
						<div class="w3-row-padding">
							<div class="w3-col s4 "><div class="w3-border"><img ng-src="{{sc.image[0]}}" height="42" width="42"></div></div>
							<div class="w3-col s4 "><div class="w3-border"><img ng-src="{{sc.image[1]}}" height="42" width="42"></div></div>
							<div class="w3-col s4 "><div class="w3-border"><img ng-src="{{sc.image[2]}}" height="42" width="42"></div></div>



						</div>
					</div>
				</div>
				<div class="w3-row w3-border w3-container">
					<div ng-repeat="rs in sc.results" ng-init="ansctr = 2">
						<div ng-show="sc.ctr == $index">{{$index}}
							<div class="w3-panel w3-leftbar " ng-class="sc.panelColor">
								<h2><p class=""><strong>{{rs.question}}</strong>
								</p></h2>

							</div>
							<div class="w3-row w3-border w3-container" >
								<div class="w3-half">&nbsp</div>
								<div class="w3-half">
									<div class="w3-row">
										<div class='w3-col s8 w3-container'><input ng-model="rs.userAnswer" class="w3-input w3-border" type="text"></div>
										<div class='w3-col s4 w3-container'>
											<button class="w3-btn w3-border" ng-click="ansctr = sc.submitAns(rs.userAnswer, rs.answer)">Submit</button>{{ansctr}}
										</div>
										
										
									</div>
									
								</div>
							</div>
							
							{{rs.answer}}
						</div>

					</div>
				</div>

			</div>
			<div class="w3-col l1">&nbsp</div>
		</div>

		

	</main>
</body>
</html>