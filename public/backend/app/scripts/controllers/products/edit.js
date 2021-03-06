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
    .controller('ProductEditCtrl', function(dataFactory,$scope, $state, Notification, $stateParams) {

        $scope.id = $stateParams.id;
        $scope.productCategory = [];

        $scope.selectedColor = "Black";
        $scope.colors = [];
        $scope.selectedType = "New";
        $scope.types = [];
        $scope.editor = '';
        $scope.brands = [];
        $scope.selectedBrand = {};
        $scope.selectedCategory = {};
        $scope.selectedContact = null;

        function goToUpload() {
            $state.go('dashboard.product-edit-upload', {"id" : $scope.id});
        }

        function loadProductById() {
            dataFactory.httpRequest('api/products/' + $scope.id + '/edit').then(function(data) {
                $scope.form = data;
                $scope.selectedBrand.selected = {
                    id: data.brand_id,
                    name: data.brands.name,
                }
                $scope.selectedCategory.selected = {
                    id: data.category_id,
                    name: data.categories.name,
                }

            });
        }

        loadProductById();

        $scope.saveEdit = function(){
            $scope.form.brand_id = $scope.selectedBrand.selected.id;
            $scope.form.category_id= $scope.selectedCategory.selected.id;
            $scope.form.type= $scope.selectedType;
            $scope.form.product_color = $scope.selectedColor;
            $scope.form.contact_id = $scope.selectedContact.id;
            dataFactory.httpRequest('api/products/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
                $scope.data = apiModifyTable($scope.data,data.id,data);
                Notification.success('Successfully saved');
                goToUpload();

            });
        }

        function loadCategory(status) {
            dataFactory.httpRequest('api/categories/status/' + status).then(function(data) {
                $scope.productCategory = data;
            });
        }

        loadCategory(1);

        function loadBrand(status) {
            dataFactory.httpRequest('api/brands/status/' + status).then(function(data) {
                $scope.brands = data;
            });
        }

        loadBrand(1);

        function loadContacts(status) {
            dataFactory.httpRequest('api/test').then(function(data) {
                $scope.users = data;
                dataFactory.httpRequest('api/contacts/status/' + status + '/acc/' + $scope.users.id).then(function (data) {
                    $scope.contacts = data;
                });
            });
        }

        loadContacts(1);

        $scope.skip = function() {
            $state.go('dashboard.product-product');
        };

        $scope.goBack = function() {
            window.history.back();
        };

        $scope.types = [
            { "id" : "New","name" : "New"},
            { "id" : "Used","name" : "Used"},
        ];

        $scope.colors = [
            { "id" : "Black","name" : "Black"},
            { "id" : "Blue","name" : "Blue"},
            { "id" : "Orange","name" : "Orange"},
            { "id" : "Red","name" : "Red"},
            { "id" : "White","name" : "White"},
            { "id" : "Silver","name" : "Silver"},
            { "id" : "Brown","name" : "Brown"},
            { "id" : "Green","name" : "Green"},
            { "id" : "Yellow","name" : "Yellow"},
            { "id" : "Lime","name" : "Lime"},
            { "id" : "Purple","name" : "Purple"},
            { "id" : "Olive","name" : "Olive"},
            { "id" : "Cyan","name" : "Cyan"},
            { "id" : "Maroon","name" : "Maroon"},
            { "id" : "DarkBlue","name" : "DarkBlue"},
        ];

    });
