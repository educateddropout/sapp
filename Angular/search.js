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
			this.ctr = 0;
			this.panelColor = "w3-light-grey";
			this.image = ['images/img_avatar4.png','images/img_avatar4.png','images/img_avatar4.png'];

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

        	this.submitAns = function(userAnswer, dbAnswer){

        		
        		
        		sc.panelColor = "w3-green";
        		alert(userAnswer + "test" + dbAnswer);
        		sc.panelColor = "w3-light-grey";
        		sc.ctr++;

        		if(userAnswer == dbAnswer){
        			sc.image[sc.ctr-1] = "images/tamato.png";
        			sc.correctAnswer++;

        		}
        		else{
        			sc.image[sc.ctr-1] = "images/malito.png";
        			sc.wrongAnswer++;

        		}

        		if(sc.wrongAnswer>=2){
        			alert("your out");
        		}
        		else if(sc.correctAnswer >= 2){
        			alert("your in");
        		}


        	}

        	

     });



})();