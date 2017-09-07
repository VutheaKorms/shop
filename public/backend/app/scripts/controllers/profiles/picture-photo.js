

'use strict';

angular.module('app')

    .controller('PictureUploadCtrl', ['$scope', 'FileUploader','$state','Notification','$stateParams','$http' ,function($scope, FileUploader, $state, Notification, $stateParams, $http) {
        var uploader = $scope.uploader = new FileUploader({
            url: 'api/users/testUpload'
        });

        //var API_URL = "api/picture/";
        var API_URL = "api/test";
        var DELETE_URL = "api/picture/delete/";

        uploader.filters.push({
            name: 'imageFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
                var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
                return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
            }
        });

        $scope.deletePic = function() {
            $http({
                method: 'DELETE',
                url: DELETE_URL + $stateParams.id,
            }).then(function (success){
                loadData();
            },function (error){
                console.log(error, " can't delete data.");
            });
        }

        function loadData() {
            $http({
                method: 'GET',
                url: API_URL,
            }).then(function (success){
                $scope.picture = success.data;
                console.log($scope.picture);
            },function (error){
                console.log(error, " can't get data.");
            });
        }

        loadData();

        function clear() {
            angular.element("input[type='file']").val(null);
        };

        $scope.next = function() {
            $state.go('dashboard.profile');
        }


        $scope.goBack = function() {
            window.history.back();
        };

        $scope.goBack = function() {
            window.history.back();
        };

        uploader.onCompleteItem = function(fileItem, response, status, headers) {
            //console.info('onCompleteItem', fileItem, response, status, headers);
        };
        uploader.onCompleteAll = function() {
            //console.info('onCompleteAll');
            Notification.success('Successfully saved');
            loadData();
            clear();
        };


    }]);





