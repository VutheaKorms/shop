

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
                            //title: 'The Email Address has already',
                            //text: response.data
                        });
                        return false;
                    }
                    if(response.data.jsMessage){
                        $.gritter.add({
                            //title: response.data.jsTitle,
                            //text: response.data.jsMessage
                        });
                    }
                    return response.data;
                },function(){
                    $.gritter.add({
                        // title: 'Application',
                        // text: 'An error occured while processing your request.'
                    });
                });
                return promise;
            }
        };
        return myService;
    })
    .controller('UserCtrl', function(dataFactory,$scope, $state, $stateParams, Notification) {
        $scope.id = $stateParams.id;

        $scope.data = [];
        $scope.libraryTemp = {};
        $scope.totalItemsTemp = {};
        $scope.totalItems = 0;

        $scope.inputType = 'password';

        // Hide & show password function
        $scope.hideShowPassword = function(){
            if ($scope.inputType == 'password')
                $scope.inputType = 'text';
            else
                $scope.inputType = 'password';
        };

        $scope.pageChanged = function(newPage) {
            getResultsPage(newPage);
        };
        getResultsPage(1);

        function getResultsPage(pageNumber) {
            if(! $.isEmptyObject($scope.libraryTemp)){
                    dataFactory.httpRequest('api/users?search='+$scope.searchText +'&page='+pageNumber).then(function(data) {
                        $scope.data = data.data;
                        $scope.totalItems = data.total;
                    });
            }else{
                    dataFactory.httpRequest('api/users' + '?page=' +pageNumber).then(function(data) {
                        $scope.data = data.data;
                        console.log($scope.data);
                        $scope.totalItems = data.total;
                    });

            }
        }

        $scope.searchDB = function(){
            if($scope.searchText.length >= 1){
                if($.isEmptyObject($scope.libraryTemp)){
                    $scope.libraryTemp = $scope.data;
                    $scope.totalItemsTemp = $scope.totalItems;
                    $scope.data = {};
                }
                getResultsPage(1);
            }else{
                if(! $.isEmptyObject($scope.libraryTemp)){
                    $scope.data = $scope.libraryTemp ;
                    $scope.totalItems = $scope.totalItemsTemp;
                    $scope.libraryTemp = {};
                }
                getResultsPage(1);
            }
        }

        $scope.form = {
            name: $scope.name,
            email_address: $scope.email_address,
            password : $scope.password,
            avatar : $scope.avatar,
            size : $scope.size,
            type : $scope.type,
        }

        $scope.saveAdd = function(){
            $scope.loading = true;
            dataFactory.httpRequest('api/users','POST',{},$scope.form).then(function(data) {
                $scope.data.push(data);
                $(".modal").modal("hide");
                Notification.success('Successfully saved');
                $scope.loading = false;
                clear();
                getResultsPage(1);
            });
        }


        $scope.saveEdit = function(){
            $scope.loading = true;
            dataFactory.httpRequest('api/user/pic/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
                $(".modal").modal("hide");
                $scope.data = apiModifyTable($scope.data,data.id,data);
                Notification.success('Successfully saved');
                $scope.loading = false;
                getResultsPage();
            });
        }


        //function goToUpload() {
        //    $state.go('dashboard.picture-upload');
        //}

        //$scope.saveEdit = function(){
        //    $scope.loading = true;
        //    dataFactory.httpRequest('api/users/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
        //        $(".modal").modal("hide");
        //        $scope.data = apiModifyTable($scope.data,data.id,data);
        //        Notification.success('Successfully saved');
        //        $scope.loading = false;
        //        getResultsPage();
        //    });
        //}

        $scope.edit = function(id){
            dataFactory.httpRequest('api/users/'+id+'/edit').then(function(data) {
                $scope.form = data;
                console.log($scope.form);
            });
        }

        $scope.saveDelete = function(){
            $scope.loading = true;
            dataFactory.httpRequest('api/users/'+ $scope.form.id ,'DELETE').then(function(data) {
                $(".modal").modal("hide");
                Notification.success('Successfully deleted');
                getResultsPage(1);
            });
        }


        $scope.saveDisable = function(){
                $scope.loading = true;
                dataFactory.httpRequest('api/user/disable/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
                    $(".modal").modal("hide");
                    $scope.data = apiModifyTable($scope.data,data.id,data);
                    Notification.success('Successfully saved');
                    $scope.loading = false;
                    getResultsPage();
                });
        }

        $scope.saveEnable = function(){
            $scope.loading = true;
            dataFactory.httpRequest('api/user/enable/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
                $(".modal").modal("hide");
                $scope.data = apiModifyTable($scope.data,data.id,data);
                Notification.success('Successfully saved');
                $scope.loading = false;
                getResultsPage();
            });
        }

        $scope.goBack = function() {
            window.history.back();
        };

        function clear() {
            $scope.form.name = "";
            $scope.form.email = "";
            $scope.form.password = "";
        }

    });

