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
			
			this.submitSearch = function(){
				
				if((sc.household_number.length == 8 && !isNaN(sc.household_number)) || sc.household_number == ""){

					sc.household_number_error_message = "";
				}
				else{

					sc.withError = true;
					sc.household_number_error_message = "Invalid household number. Please Check!";
				}

				if(sc.household_number == "" && sc.first_name == "" && sc.last_name == "" ){

					sc.withError = true;
					sc.all_error_message = "Please provide details on atleast one input box!";

				}
				else{
					sc.all_error_message = "";
				}

				if(sc.withError == false ){

					this.responseMessage = $http({
						method: "POST",
						url: "search.php",
						data: {
						   "household_number" : sc.household_number,
						   "first_name" : sc.first_name,
						   "last_name" : sc.last_name,
					},
					headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

					}).then(function mySuccess(response) {

						//console.log(response.data);
						//console.log(response.data[0].first_name);
						console.log(response.data);
						sc.results = response.data;
						if(response.data.length > 1){
							sc.resultMessage = "Found " + response.data.length + " results ...";
						}
						else if(response.data.length == 1){
							sc.resultMessage = "Found " + response.data.length + " result ...";
						}
						else{
							sc.resultMessage = "No result found...";
						}

					}, function myError(response) {

						console.log(response);

					});
				}
        	};

     });

})();