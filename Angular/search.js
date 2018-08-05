(function(){
     var app = angular.module('search', []);

     app.controller('searchCtrl', function ($scope, $http) {
          
			var sc = this;
			this.household_number = "";
			this.first_name = "";
			this.middle_name = "";
			this.last_name = "";
			this.ext_name = "";
			this.household_number_error_message = "";
			this.all_error_message = "";
			this.hideForever = 0;
			this.resultMessage = "";
			this.wrongAnswer = 0;
			this.correctAnswer = 0;
			this.ctr = 0;
			this.panelColor = "w3-light-grey";
			this.image = ['images/question-mark.png','images/question-mark.png','images/question-mark.png'];
			this.lockSearchButton = 0; // means not disable
			this.readyForRegistration = 0; //hide household head detail
			this.skip = 0;
			this.userAnswerErrorMessage = "";

			this.submitSearch = function(){
				withError = false;
				sc.household_number_error_message = "";

				if(sc.household_id.length == 20){
					psgcCode = sc.household_id.substr(0,9);
					hhNumber = sc.household_id.substr(12,8);
					urbRur = sc.household_id.substr(10,1);

					if(isNaN(psgcCode) || isNaN(hhNumber) || isNaN(urbRur)){
						withError = true;
					}

				}
				else{
					
					withError = true;
				}

				if(withError == false ){

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
						//console.log(response.data.resultCnt);
						//console.log(response);
						if(response.data.resultCnt == 0){
							sc.household_number_error_message = "No result found!!!";
						}
						else{
							sc.results = response.data.randomQuestions;
							sc.householdHeadDetails = response.data.householdHeadDetails
							sc.first_name = sc.householdHeadDetails.firstName;
	        				sc.middle_name = sc.householdHeadDetails.middleName;
	        				sc.last_name = sc.householdHeadDetails.lastName;
	        				sc.ext_name = sc.householdHeadDetails.extName;
							sc.lockSearchButton = 1; //disabled
							sc.skip = 1;
						}

					}, function myError(response) {

						console.log("response");

					});
				}
				else{
					sc.household_number_error_message = "Invalid household number format. Please Check!!";
				}

        	};

        	this.submitSkip = function(){
        		sc.readyForRegistration	= 1;
        		sc.image[0] = "images/ff.png";
        		sc.image[1] = "images/ff.png";
        		sc.image[2] = "images/ff.png";
        		sc.ctr = 3;
        	}

        	this.submitAns = function(userAnswer, dbAnswer, questionNumber){

        		
        		
        		
        		

        		if(typeof userAnswer === "undefined"){
        			alert("wakabgsagos");
        			sc.userAnswerErrorMessage = "Please fill up the input box!!";
        		}
        		else{

        			if(questionNumber == 1 || questionNumber == 2){
        				if(userAnswer != "YES" && userAnswer != "NO"){
        					sc.userAnswerErrorMessage = "Answer must be YES or NO only!!";
        				}

        			}
        			else if(questionNumber	== 9 || questionNumber	== 5 || questionNumber	== 4 || questionNumber	== 0){
        				if(isNaN(userAnswer) || userAnswer.length != 4){
        					sc.userAnswerErrorMessage = "Invalid YEAR format!!";
        				}
        			}
        			else{
	        			sc.ctr++;
		        		if(questionNumber == 10){

		        			if(nameChecker(dbAnswer,userAnswer) != -1){
		        				sc.image[sc.ctr-1] = "images/tamato.png";
			        			sc.correctAnswer++;
		        			}
		        			else{
		        				sc.image[sc.ctr-1] = "images/malito.png";
			        			sc.wrongAnswer++;
		        			}

		        		}
		        		else{


			        		if(userAnswer.toUpperCase() == dbAnswer){
			        			sc.image[sc.ctr-1] = "images/tamato.png";
			        			sc.correctAnswer++;

			        		}
			        		else{
			        			sc.image[sc.ctr-1] = "images/malito.png";
			        			sc.wrongAnswer++;

			        		}
			        	}



		        		if(sc.wrongAnswer>=2){
		        			alert("YOUR OUT. FUCKING LIAARRRRRR!!!!!!");
		        			sc.ctr++;

		        			this.responseMessage = $http({
								method: "POST",
								url: "denied.php",
								data: {
								   "household_id" : sc.household_id,
							},
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

							}).then(function mySuccess(response) {

								
								//console.log(response.data);
								if(response.data.insertErrCtr == 1){
									location.reload();
								}
								else{
									console.log("Found error inserting data");
								}
								

							}, function myError(response) {

								console.log("response");

							});


		        		}
		        		else if(sc.correctAnswer >= 2){

		        			alert("Verified!!");
		        			sc.ctr++;


		        			fullName = sc.first_name + " " + sc.middle_name + " " + sc.last_name + " " + sc.ext_name;
		        			sc.readyForRegistration	= 1;
		        		}
		        	}
	        	}


        	}

        	

     });


     function nameChecker(namesArr, name){

			for (let i = 0; i < namesArr.length; i++) {
				if (namesArr[i].trim() == name.toUpperCase()) {
					return 1;
					break;
				}
			}

			return -1;
     }



})();