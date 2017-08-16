'use strict';

angular.module('app')
  .directive('sidebar',['$location',function() {
    return {
      templateUrl:'backend/app/scripts/directives/sidebar/sidebar.html',
      restrict: 'E',
      replace: true,
      scope: {
      },
      controller:function($scope, $http){
        $scope.selectedMenu = 'dashboard';
        $scope.collapseVar = 0;

        function loadAuth() {
            $http.get('api/test')
              .then(function(response) {
                $scope.userAuth = response.data;
            });
        }

        loadAuth();

        $scope.email = "admin@gmail.com";

        $scope.check = function(x){
          
          if(x==$scope.collapseVar)
            $scope.collapseVar = 0;

          else
            $scope.collapseVar = x;
            console.log("dddd" + $scope.collapseVar);
        };

      }
    }
  }]);
