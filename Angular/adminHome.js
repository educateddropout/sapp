(function(){
     var app = angular.module('adminHome', []);

    app.controller('userInfoCtrl', function ($scope, $http) {
     var userInfo = this;

          $http({
                    method: "GET",
                    url: "userInfo.php"
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
                    alert("You are not allowed to access this system.");
                    window.location = "login.php";
               }
          }, function myError(response) {
               console.log(response.status);
          });
    });

})();