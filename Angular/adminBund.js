(function(){
     var app = angular.module('adminBund', []);

     app.controller('userInfoCtrl', function ($scope, $http) {
     var userInfo = this;

		$http({
				method: "GET",
				url: "scripts/all/userInfo.php"
		}).then(function mySuccess(response) {
		 	//console.log(response.data);
			if(response.data.errorCtr == 0){
				userInfo.name =  response.data.name;
				userInfo.id =  response.data.id;
				userInfo.username =  response.data.username;
				userInfo.userType =  response.data.userType;
				
			}
			else{
				alert("You are not allowed to access this system.");
				window.location = "login.php";
			}
		}, function myError(response) {
			console.log(response.status);
		});
    });

    // reuse code from getting distributor info
    /*app.controller('distributorInfoCtrl', function ($scope, $http) {

		this.distributorInfo = [];
		di = this;

		$http({
				method: "GET",
				url: "scripts/adminDistributor/getDistributorInfo.php"
		}).then(function mySuccess(response) {
		 	//console.log(response.data);
			if(response.data.queryError == 0){
				di.distributorInfo =  response.data.distributorsInfo;
				//console.log(distributorInfo);
			}
		}, function myError(response) {
			console.log(response);
		});

    });*/


    /*app.controller('productCtrl', function ($scope, $http) {
          
			var pd = this;

			this.name = "";
			this.selectedDistributor = "";

			this.submitProduct = function(){

				this.responseMessage = $http({
					method: "POST",
					url: "scripts/adminProduct/insertProduct.php",
					data: {
					   "name" : pd.name,
					   "distributorId" : pd.selectedDistributor

				},
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

				}).then(function mySuccess(response) {
					//console.log(response.data);
					if(response.data.queryError == 0){
						alert("Successfully Saved");
						//pd.insertIndicator = "Successfully Saved.";
						window.location = "adminProducts.php";
					}
					
				}, function myError(response) {
					console.log(response.status);
				});

          };
     });*/

     app.controller('bundleCtrl', function ($scope, $http) {
          
			var pd = this;

			this.name = "";
			this.selectedDistributor = "";

			this.submitProduct = function(){

				this.responseMessage = $http({
					method: "POST",
					url: "scripts/adminProduct/insertProduct.php",
					data: {
					   "name" : pd.name,
					   "distributorId" : pd.selectedDistributor

				},
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

				}).then(function mySuccess(response) {
					//console.log(response.data);
					if(response.data.queryError == 0){
						alert("Successfully Saved");
						//pd.insertIndicator = "Successfully Saved.";
						window.location = "adminProducts.php";
					}
					
				}, function myError(response) {
					console.log(response.status);
				});

          };
     });

    app.controller('productInfoCtrl', function ($scope, $http) {

		this.distributorInfo = [];
		pi = this;

		$http({
				method: "GET",
				url: "scripts/adminProduct/getProductInfo.php"
		}).then(function mySuccess(response) {
		 	console.log(response.data);
			if(response.data.queryError == 0){
				pi.productInfo =  response.data.productInfo;
				//console.log(distributorInfo);
			}
		}, function myError(response) {
			console.log(response);
		});
    });


})();