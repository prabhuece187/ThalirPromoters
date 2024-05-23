app.constant('BUYER')
app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('buyercomment', {
            url: '/buyercomment',
            templateUrl: 'views/admin.buyer.comment',
            controller: 'BuyerCommentController',
            title :'buyercomment'
        })
        .state('buyerseller', {
            url: '/buyerseller',
            templateUrl: 'views/admin.buyer.sellerrequest',
            controller: 'BuyerSellerController',
            title :'buyerseller'
        })
        .state('buyerrent', {
            url: '/buyerrent',
            templateUrl: 'views/admin.buyer.rentrequest',
            controller: 'BuyerRentController',
            title :'buyerrent'
        });
})

.controller('BuyerCommentController', function($filter, $rootScope,$scope, BUYER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    $scope.buyercomment_form = {};

    $scope.getTable = function(page)
    {
        $http({ url: 'buyercommentget', method: 'GET'}).success(function (result) {               
            $scope.data = result;
            console.log($scope.data);

            angular.element(document).ready( function () {
               $('#table_id').DataTable({
               dom: 'lBfrtip',
               buttons: [ 'excel' ],
               responsive: true,
               columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ]
               });
            });
        });       
    }
    $scope.new = function()
    {
        $scope.formType = 'NEW';
        $scope.type_form = {};
        $('#type_form').modal();
    }

    $scope.edit = function(ind,type)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.type_form = angular.copy(type);
        $('#type_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.type_form.TypeId)? update() : add();
    }

    function add()
    { 
        if($scope.type_form.TypeName == null)
        {
           $scope.formError.TypeName = "THIS FEILD IS REQUIRED";
           return;
        }
       
        $http({ url: 'type', method: 'POST',data:$scope.type_form}).success(function(data){
            $('#type_form').modal('hide');
            al('Property Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Property Not Created");
        });
    }

    function update()
    {
        if($scope.type_form.TypeName == null)
        {
           $scope.formError.TypeName = "THIS FEILD IS REQUIRED";
           return;
        }
     
        $http({ url: 'type/'+$scope.type_form.TypeId, method: 'PUT',data:$scope.type_form}).success(function(data){
            $('#type_form').modal('hide');
            al('Property Updated Successfully');
             $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
          al("Property Not Updated");
        });
    }

    $scope.delete = function(ind,type,ev)
    {    
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Property Type?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {     
            $http({ url: 'type/'+type.TypeId, method: 'DELETE'}).success(function(data){
                 al('Deleted Successfully');
                $state.go($state.current, {}, {reload: true});
            }).error(function(data){
              al("Not Deleted");
            });
        });
    }

    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }

    $scope.getTable();
})

.controller('BuyerSellerController', function($filter, $rootScope,$scope, BUYER, $http, Storage,$mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){
 
    $scope.sellerrequest_form = {};
     $scope.status = Storage.data.status;
     $scope.request = Storage.data.request;

    $scope.getTable = function(page)
    {
        $http({ url: 'sellerrequest', method: 'GET'}).success(function (result) {               
            $scope.data = result;

            angular.element(document).ready( function () {
               $('#table_id').DataTable({
               dom: 'lBfrtip',
               buttons: [ 'excel' ],
               responsive: true,
               columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ]
               });
            });
        });       
    }
    $scope.new = function()
    {
        $scope.formType = 'NEW';
        $scope.sellerrequest_form = {};
        $scope.sellerrequest_form.ForWhere = "Admin";
        $('#sellerrequest_form').modal();
    }

    $scope.edit = function(ind,type)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.sellerrequest_form = angular.copy(type);
        $('#sellerrequest_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.sellerrequest_form.BuyerSellId)? update() : add();
    }

    function add()
    {        
        $http({ url: 'sellerrequest', method: 'POST',data:$scope.sellerrequest_form}).success(function(data){
            $('#sellerrequest_form').modal('hide');
            al('Buyer Request Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Buyer Request Not Created");
        });
    }

    function update()
    {
     
        $http({ url: 'sellerrequest/'+$scope.sellerrequest_form.BuyerSellId, method: 'PUT',data:$scope.sellerrequest_form}).success(function(data){
            $('#sellerrequest_form').modal('hide');
            al('Request Updated Successfully');
             $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
          al("Request Not Updated");
        });
    }

    $scope.delete = function(ind,type,ev)
    {    
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Property Type?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {     
            $http({ url: 'type/'+type.TypeId, method: 'DELETE'}).success(function(data){
                 al('Deleted Successfully');
                $state.go($state.current, {}, {reload: true});
            }).error(function(data){
              al("Not Deleted");
            });
        });
    }

    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }

    $scope.getTable();
})

.controller('BuyerRentController', function($filter, $rootScope,$scope, BUYER, $http, $mdDialog, $mdToast, Storage,$httpParamSerializer, $state, $timeout, $location, STATES){

   $scope.rentrequest_form = {};
     $scope.status = Storage.data.status;
     $scope.request = Storage.data.request;


    $scope.getTable = function(page)
    {
        $http({ url: 'rentrequest', method: 'GET'}).success(function (result) {               
            $scope.data = result;

            angular.element(document).ready( function () {
               $('#table_id').DataTable({
               dom: 'lBfrtip',
               buttons: [ 'excel' ],
               responsive: true,
               columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ]
               });
            });
        });       
    }
    $scope.new = function()
    {
        $scope.formType = 'NEW';
        $scope.rentrequest_form = {};
        $scope.rentrequest_form.ForWhere = "Admin";
        $('#rentrequest_form').modal();
    }

    $scope.edit = function(ind,type)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.rentrequest_form = angular.copy(type);
        $('#rentrequest_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.rentrequest_form.BuyerRentId)? update() : add();
    }

    function add()
    {        
         $http({ url: 'rentrequest', method: 'POST',data:$scope.rentrequest_form}).success(function(data){
            $('#rentrequest_form').modal('hide');
            al('Buyer Request Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Buyer Request Not Created");
        });
    }

    function update()
    {
     
        $http({ url: 'rentrequest/'+$scope.rentrequest_form.BuyerRentId, method: 'PUT',data:$scope.rentrequest_form}).success(function(data){
            $('#rentrequest_form').modal('hide');
            al('Request Updated Successfully');
             $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
          al("Request Not Updated");
        });
    }

    $scope.delete = function(ind,type,ev)
    {    
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Property Type?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {     
            $http({ url: 'type/'+type.TypeId, method: 'DELETE'}).success(function(data){
                 al('Deleted Successfully');
                $state.go($state.current, {}, {reload: true});
            }).error(function(data){
              al("Not Deleted");
            });
        });
    }

    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }

    $scope.getTable();
})