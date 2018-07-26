(function(){
     var app = angular.module('adminDistributors', []);

     app.controller('userInfoCtrl', function ($scope, $http) {
     var userInfo = this;

		$http({
				method: "GET",
				url: "scripts/all/userInfo.php"
		}).then(function mySuccess(response) {
		 console.log(response.data);
			if(response.data.errorCtr == 0){
				userInfo.name =  response.data.name;
				userInfo.id =  response.data.id;
				userInfo.username =  response.data.username;
				userInfo.userType =  response.data.userType;
				//console.log(userInfo.username);
			}
			else{
				alert("You are not allowed to access this system12321321.");
				window.location = "login.php";
			}
		}, function myError(response) {
			console.log(response.status);
		});
    });


    app.controller('distributorCtrl', function ($scope, $http) {
          
			var db = this;
			this.eContactNumber = ""; // invalid contact number
			this.test = "";
			this.eDistributorName = "";


			this.contactNum = "";
			this.name = "";
			this.email = "";
			this.address = "";
			this.insertIndicator ="";

			this.submitDistributor = function(){

				if(db.contactNumber != "") db.eContactNumber = validateContactNumber(db.contactNum); 

				if(db.eContactNumber == "" ){

					this.responseMessage = $http({
						method: "POST",
						url: "insertDistributor.php",
						data: {
						   "name" : db.name,
						   "email" : db.email,
						   "address" : db.address,
						   "contactNum" : db.contactNum,
					},
					headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

					}).then(function mySuccess(response) {
						console.log(response.data);
						if(response.data.queryError == 0){
							window.location = "adminDistributors.php?val=0"; // 0 means successfully saved
						}
						else{
							//console.log("shooter");
							if(response.data.validateDistributor == 1){
								db.eDistributorName = "Distributor name already exist!";
							}
						}

					}, function myError(response) {
						console.log(response.status);
					});
				}
        	};

        this.editDistributor = function(){
			alert("test");
			console.log("napindot");
		};


     });
 
    function validateContactNumber(num){

		if(!isNaN(num)){
		    if(num.length == 7 || num.length == 11){
		        return ""; // valid contact number
		        
		    }
		    else{
		        return "Please provide 7 or 11 digits contact number."; // invalid contact number 
		    }

		}
		else{
		    return "Please provide a valid 7 or 11 digits contact number."; // invalid contact number
		}
	}


	app.controller('distributorInfoCtrl', function ($scope, $http) {

		di = this;
		this.eDistributorName = "";

		$http({
				method: "GET",
				url: "scripts/adminDistributor/getDistributorInfo.php"
		}).then(function mySuccess(response) {
		 	console.log(response.data);
			if(response.data.queryError == 0){
				di.distributorInfo =  response.data.distributorsInfo;
				//console.log(distributorInfo);
			}
		}, function myError(response) {
			console.log(response);
		});

		this.editDistributor = function(index){

			di.eDistributorName = "";
			di.name = di.distributorInfo[index].name;
			di.address = di.distributorInfo[index].address;
			di.email = di.distributorInfo[index].email;
			di.contactNumber = di.distributorInfo[index].contactNum;

			console.log(di.name);

			document.getElementById('modal').style.display='block';



		};

		this.submitDistributor = function(){

			console.log("napindot");
			if(di.contactNumber != "") di.eContactNumber = validateContactNumber(di.contactNumber); 

			if(di.eContactNumber == "" ){

				this.responseMessage = $http({
					method: "POST",
					url: "insertDistributor.php",
					data: {
					   "name" : di.name,
					   "email" : di.email,
					   "address" : di.address,
					   "contactNum" : di.contactNumber,
				},
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

				}).then(function mySuccess(response) {
					console.log(response.data);
					if(response.data.queryError == 0){
						window.location = "adminDistributors.php?val=0"; // 0 means successfully saved
					}
					else{
						//console.log("shooter");
						if(response.data.validateDistributor == 1){
							di.eDistributorName = "Distributor name already exist!";
						}
					}

				}, function myError(response) {
					console.log(response.status);
				});
			}
    	};

     });





})();