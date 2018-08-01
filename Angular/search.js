(function(){
     var app = angular.module('search', []);

     app.controller('searchCtrl', function ($scope, $http) {
          
			var sc = this;
			this.household_number = "";
			this.first_name = "";
			this.last_name = "";
			this.household_number_error_message = "";
			this.all_error_message = "";
			this.withError = false;
			this.resultMessage = "";
			this.wrongAnswer = 0;
			this.correctAnswer = 0;
			
			this.submitSearch = function(){
				
				if(sc.household_id.length == 20){

					sc.household_number_error_message = "";
				}
				else{
					
					sc.withError = true;
					sc.household_number_error_message = "Invalid household number. Please Check!";
				}

				if(sc.withError == false ){

					this.responseMessage = $http({
						method: "POST",
						url: "search.php",
						data: {
						   "household_id" : sc.household_id,
					},
					headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

					}).then(function mySuccess(response) {

						//console.log(response.data);
						//console.log(response.data[0].first_name);
						console.log(response.data);
						sc.results = response.data;

					}, function myError(response) {

						console.log("response");

					});
				}
        	};

        	this.submitAns = function(userAnswer, dbAnswer, ansctr){

        		alert(userAnswer + "test" + dbAnswer);
        		if(userAnswer == dbAnswer){
        			return 1;

        		}
        		else{
        			return 0;
        		}
        	}

        	

     });



})();