(function(){
     var app = angular.module('shop-products', []);


     // reuse code from getting distributor info
    app.controller('productInfoCtrl', function ($scope, $http) {

          //this.distributorInfo = [];
          pi = this;
          this.quantity = 6;

          $http({
                    method: "GET",
                    url: "scripts/adminProduct/getProductInfo.php"
          }).then(function mySuccess(response) {
               //console.log(response.data);
               if(response.data.queryError == 0){
                    pi.productInfo =  response.data.productInfo;
                    pi.prodCnt = pi.productInfo.length;
               }
          }, function myError(response) {
               console.log(response);
          });


          this.submitBuy = function(prodData){
               window.location = "shop-prod-payout.php?prod="+ prodData;
          };

    });

     

})();