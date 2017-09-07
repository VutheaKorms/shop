
'use strict';

angular.module('app')
    .factory('dataFactory', function ($http) {
        var myService = {
            httpRequest: function(url,method,params,dataPost,upload) {
                var passParameters = {};
                passParameters.url = url;
                if (typeof method == 'undefined'){
                    passParameters.method = 'GET';
                }else{
                    passParameters.method = method;
                }
                if (typeof params != 'undefined'){
                    passParameters.params = params;
                }
                if (typeof dataPost != 'undefined'){
                    passParameters.data = dataPost;
                }
                if (typeof upload != 'undefined'){
                    passParameters.upload = upload;
                }
                var promise = $http(passParameters).then(function (response) {
                    if(typeof response.data == 'string' && response.data != 1){
                        if(response.data.substr('loginMark')){
                            location.reload();
                            return;
                        }
                        $.gritter.add({
                            title: 'Application',
                            text: response.data
                        });
                        return false;
                    }
                    if(response.data.jsMessage){
                        $.gritter.add({
                            title: response.data.jsTitle,
                            text: response.data.jsMessage
                        });
                    }
                    return response.data;
                },function(){
                    $.gritter.add({
                        //title: 'Application',
                        //text: 'An error occured while processing your request.'
                    });
                });
                return promise;
            }
        };
        return myService;
    })
    .controller('ProfileEditCtrl', function(dataFactory,$scope, $state, $stateParams, Notification) {

        $scope.id = $stateParams.id;

        $scope.inputType = 'password';

        // Hide & show password function
        $scope.hideShowPassword = function(){
            if ($scope.inputType == 'password')
                $scope.inputType = 'text';
            else
                $scope.inputType = 'password';
        };

        function goToUpload() {
            $state.go('dashboard.picture-upload', {"id" : $scope.id});
        }

        function loadUserById() {
            dataFactory.httpRequest('api/user/' + $scope.id + '/edit').then(function(data) {
                $scope.form = data;
            });
        }

        loadUserById();

        //
        //$scope.savePost = function(){
        //    $scope.loading = true;
        //    dataFactory.httpRequest('api/user/credentials','POST',{},$scope.form).then(function(data) {
        //        $scope.data = apiModifyTable($scope.data,data.id,data);
        //        Notification.success('Successfully saved');
        //        $scope.loading = false;
        //        goToUpload();
        //    });
        //}

        $scope.saveEdit = function(){
            $scope.loading = true;
            dataFactory.httpRequest('api/user/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
                $scope.data = apiModifyTable($scope.data,data.id,data);
                Notification.success('Successfully saved');
                $scope.loading = false;
                goToUpload();
            });
        }

        $scope.goBack = function() {
            $state.go('dashboard.user');
        }

    });
