

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
                       // title: 'Application',
                       // text: 'An error occured while processing your request.'
                    });
                });
                return promise;
            }
        };
        return myService;
    })
    .controller('SettingCtrl', function(dataFactory,$scope, $state, $stateParams, Notification) {
        $scope.id = $stateParams.id;

        $scope.data = [];
        $scope.libraryTemp = {};
        $scope.totalItemsTemp = {};
        $scope.totalItems = 0;
        $scope.selectedLocation = null;
        $scope.selectedState = null;
        $scope.selectedCountry = null;

        $scope.pageChanged = function(newPage) {
            getResultsPage(newPage);
        };
        getResultsPage(1);

        function getResultsPage(pageNumber) {
            if(! $.isEmptyObject($scope.libraryTemp)){
                dataFactory.httpRequest('api/test').then(function(data) {
                    $scope.users = data;
                    dataFactory.httpRequest('api/contacts/account/' + $scope.users.id + '?search='+$scope.searchText +'&page='+pageNumber).then(function(data) {
                        $scope.data = data.data;
                        $scope.totalItems = data.total;
                    });
                });
            }else{
                dataFactory.httpRequest('api/test').then(function(data) {
                    $scope.users = data;
                    dataFactory.httpRequest('api/contacts/account/' + $scope.users.id  +'?page=' +pageNumber).then(function(data) {
                        $scope.data = data.data;
                        $scope.totalItems = data.total;
                    });
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
            number1: $scope.number1,
            address1: $scope.address1,
            address2: $scope.address2,
            country_id: $scope.selectedCountry,
            state_id: $scope.selectedState,
            location_id: $scope.selectedLocation,
        }

        $scope.saveAdd = function(){
            $scope.loading = true;
            $scope.form.country_id = $scope.selectedCountry.id;
            $scope.form.state_id = $scope.selectedState.id;
            $scope.form.location_id = $scope.selectedLocation.id;
            dataFactory.httpRequest('api/contacts','POST',{},$scope.form).then(function(data) {
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
            $scope.form.country_id = $scope.selectedCountry.id;
            $scope.form.state_id = $scope.selectedState.id;
            $scope.form.location_id = $scope.selectedLocation.id;
            dataFactory.httpRequest('api/contacts/update/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
                $(".modal").modal("hide");
                $scope.data = apiModifyTable($scope.data,data.id,data);
                Notification.success('Successfully saved');
                $scope.loading = false;
                getResultsPage(1);
            });
        }

        $scope.show = function(id){
            dataFactory.httpRequest('api/test').then(function(data) {
                $scope.users = data;
                dataFactory.httpRequest('api/contacts/id/' + id + '/account/' + $scope.users.id ).then(function(data) {
                    $scope.form = data[0];
                });
            });
        }

        $scope.edit = function(id){
            dataFactory.httpRequest('api/test').then(function(data) {
                $scope.users = data;
                dataFactory.httpRequest('api/contacts/id/' + id + '/account/' + $scope.users.id + '/edit').then(function(data) {
                    $scope.form = data[0];
                    //$scope.selectedCountry.id = data[0].country_id;
                    //console.log($scope.form);
                    //$scope.Obj = {
                    //    "id": data[0].id,
                    //    "name": data[0].name,
                    //};
                    //
                    //
                    //
                    //console.log($scope.Obj);


                });
            });
        }

        $scope.saveDelete = function(){
            $scope.loading = true;
            dataFactory.httpRequest('api/contacts/'+ $scope.form.id ,'DELETE').then(function(data) {
                $(".modal").modal("hide");
                Notification.success('Successfully deleted');
                getResultsPage(1);
            });
        }


        $scope.goBack = function() {
            window.history.back();
        };

        function clear() {
            $scope.form.name = "";
            $scope.form.email_address = "";
            $scope.form.number1 ="";
            $scope.form.address1 ="";
            $scope.form.address2 ="";
            $scope.selectedCountry = null;
            $scope.selectedState = null;
            $scope.selectedLocation = null;
        }

        function loadCountry(status) {
            dataFactory.httpRequest('api/countries/status/' + status).then(function(data) {
                $scope.countries = data;
            });
        }

        loadCountry(1);

        function loadState(status) {
            dataFactory.httpRequest('api/states/status/' + status).then(function(data) {
                $scope.states = data;
            });
        }

        loadState(1);

        function loadLocation(status) {
            dataFactory.httpRequest('api/locations/status/' + status).then(function(data) {
                $scope.locations = data;
            });
        }

        loadLocation(1);

    });

