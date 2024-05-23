app.constant('CLIENT')
app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('clientdata', {
            url: '/clientdata',
            templateUrl: 'views/admin.client.index',
            controller: 'ClientDataController',
            title :'clientdata'
        });
})

.controller('ClientDataController', function($filter, $rootScope,$scope, CLIENT, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    $scope.states = STATES;
    $scope.client_form = {};

    $scope.getTable = function(page)
    {
        $http({ url: 'clientdata', method: 'GET'}).success(function (result) {               
             $scope.role = result.role;
            $scope.data = result.client;

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
        $scope.client_form = {};
        $('#client_form').modal();
    }

    $scope.edit = function(ind,client)
    {
        $http({ url: 'clientstatusupdate/'+client.ClientDataId, method: 'PUT',data:$scope.client_form}).success(function(data){
            al('Client Data Verified Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
          al("Property Not Updated");
        });
        
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.client_form.TypeId)? update() : add();
    }

    function add()
    { 
        if($scope.client_form.TypeName == null)
        {
           $scope.formError.TypeName = "THIS FEILD IS REQUIRED";
           return;
        }
       
        
        $http({ url: 'type', method: 'POST',data:$scope.client_form}).success(function(data){
            $('#client_form').modal('hide');
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
        if($scope.client_form.TypeName == null)
        {
           $scope.formError.TypeName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'type/'+$scope.client_form.TypeId, method: 'PUT',data:$scope.client_form}).success(function(data){
            $('#client_form').modal('hide');
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
