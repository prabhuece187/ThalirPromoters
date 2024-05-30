app.constant('MASTER')
app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('type', {
            url: '/type',
            templateUrl: 'views/admin.master.type',
            controller: 'TypeController',
            title :'type'
        });
})

.controller('TypeController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    $scope.states = STATES;
    $scope.type_form = {};

    $scope.getTable = function(page)
    {
        $http({ url: 'type', method: 'GET'}).success(function (result) {
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


app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('need', {
            url: '/need',
            templateUrl: 'views/admin.master.need',
            controller: 'NeedController',
            title :'need'
        });
})

.controller('NeedController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    $scope.states = STATES;
    $scope.form = {};

    $scope.getTable = function(page)
    {
        $http({ url: 'need', method: 'GET'}).success(function (result) {
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
        $scope.need_form = {};
        $('#need_form').modal();
    }

    $scope.edit = function(ind,need)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.need_form = angular.copy(need);
        $('#need_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.need_form.NeedId)? update() : add();
    }

    function add()
    {
        if($scope.need_form.NeedName == null)
        {
           $scope.formError.NeedName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'need', method: 'POST',data:$scope.need_form}).success(function(data){
            $('#need_form').modal('hide');
            al('Need Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Need Not Created");
        });
    }

    function update()
    {
        if($scope.need_form.NeedName == null)
        {
           $scope.formError.NeedName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'need/'+$scope.need_form.NeedId, method: 'PUT',data:$scope.need_form}).success(function(data){
            $('#need_form').modal('hide');
            al('Need Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Need Not Updated");
        });
    }

    $scope.delete = function(ind,need,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Need?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'need/'+need.NeedId, method: 'DELETE'}).success(function(data){
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


app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('purpose', {
            url: '/purpose',
            templateUrl: 'views/admin.master.purpose',
            controller: 'PurposeController',
            title :'purpose'
        });
})

.controller('PurposeController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    $scope.states = STATES;
    $scope.form = {};

    $scope.getTable = function(page)
    {
        $http({ url: 'purpose', method: 'GET'}).success(function (result) {
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
        $scope.purpose_form = {};
        $('#purpose_form').modal();
    }

    $scope.edit = function(ind,purpose)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.purpose_form = angular.copy(purpose);
        $('#purpose_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.purpose_form.PurposeId)? update() : add();
    }

    function add()
    {
        if($scope.purpose_form.PurposeName == null)
        {
           $scope.formError.PurposeName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'purpose', method: 'POST',data:$scope.purpose_form}).success(function(data){
            $('#purpose_form').modal('hide');
            al('Purpose Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Purpose Not Created");
        });
    }

    function update()
    {
        if($scope.purpose_form.PurposeName == null)
        {
           $scope.formError.PurposeName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'purpose/'+$scope.purpose_form.PurposeId, method: 'PUT',data:$scope.purpose_form}).success(function(data){
            $('#purpose_form').modal('hide');
            al('Purpose Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Purpose Not Updated");
        });
    }

    $scope.delete = function(ind,purpose,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Purpose Type?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'purpose/'+purpose.PurposeId, method: 'DELETE'}).success(function(data){
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


app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('floor', {
            url: '/floor',
            templateUrl: 'views/admin.master.floor',
            controller: 'FloorController',
            title :'floor'
        });
})

.controller('FloorController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    $scope.states = STATES;
    $scope.form = {};

    $scope.getTable = function(page)
    {
        $http({ url: 'floor', method: 'GET'}).success(function (result) {
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
        $scope.floor_form = {};
        $('#floor_form').modal();
    }

    $scope.edit = function(ind,floor)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.floor_form = angular.copy(floor);
        $('#floor_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.floor_form.FloorId)? update() : add();
    }

    function add()
    {
        if($scope.floor_form.FloorName == null)
        {
           $scope.formError.FloorName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'floor', method: 'POST',data:$scope.floor_form}).success(function(data){
            $('#floor_form').modal('hide');
            al('Floor Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Floor Not Created");
        });
    }

    function update()
    {
        if($scope.floor_form.FloorName == null)
        {
           $scope.formError.FloorName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'floor/'+$scope.floor_form.FloorId, method: 'PUT',data:$scope.floor_form}).success(function(data){
            $('#floor_form').modal('hide');
            al('Floor Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Floor Not Updated");
        });
    }

    $scope.delete = function(ind,floor,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Floor?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'floor/'+floor.FloorId, method: 'DELETE'}).success(function(data){
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


app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('roof', {
            url: '/roof',
            templateUrl: 'views/admin.master.roof',
            controller: 'RoofController',
            title :'roof'
        });
})

.controller('RoofController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    $scope.states = STATES;
    $scope.form = {};

    $scope.getTable = function(page)
    {
        $http({ url: 'roof', method: 'GET'}).success(function (result) {
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
        $scope.roof_form = {};
        $('#roof_form').modal();
    }

    $scope.edit = function(ind,roof)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.roof_form = angular.copy(roof);
        $('#roof_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.roof_form.RoofId)? update() : add();
    }

    function add()
    {
        if($scope.roof_form.RoofName == null)
        {
           $scope.formError.RoofName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'roof', method: 'POST',data:$scope.roof_form}).success(function(data){
            $('#roof_form').modal('hide');
            al('Roof Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Roof Not Created");
        });
    }

    function update()
    {
        if($scope.roof_form.RoofName == null)
        {
           $scope.formError.RoofName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'roof/'+$scope.roof_form.RoofId, method: 'PUT',data:$scope.roof_form}).success(function(data){
            $('#roof_form').modal('hide');
            al('Roof Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Roof Not Updated");
        });
    }

    $scope.delete = function(ind,roof,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Roof?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'roof/'+roof.RoofId, method: 'DELETE'}).success(function(data){
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


app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('area', {
            url: '/area',
            templateUrl: 'views/admin.master.area',
            controller: 'AreaController',
            title :'area'
        });
})

.controller('AreaController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    $scope.states = STATES;
    $scope.form = {};

    $scope.getTable = function(page)
    {
        $http({ url: 'area', method: 'GET'}).success(function (result) {
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
        $scope.area_form = {};
        $('#area_form').modal();
    }

    $scope.edit = function(ind,area)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.area_form = angular.copy(area);
        $('#area_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.area_form.AreaId)? update() : add();
    }

    function add()
    {
        if($scope.area_form.AreaName == null)
        {
           $scope.formError.AreaName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'area', method: 'POST',data:$scope.area_form}).success(function(data){
            $('#area_form').modal('hide');
            al('Area Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Area Not Created");
        });
    }

    function update()
    {
        if($scope.area_form.AreaName == null)
        {
           $scope.formError.AreaName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'area/'+$scope.area_form.AreaId, method: 'PUT',data:$scope.area_form}).success(function(data){
            $('#area_form').modal('hide');
            al('Area Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Area Not Updated");
        });
    }

    $scope.delete = function(ind,area,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Area?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'area/'+area.AreaId, method: 'DELETE'}).success(function(data){
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


app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('knowus', {
            url: '/knowus',
            templateUrl: 'views/admin.master.knowus',
            controller: 'KnowusController',
            title :'knowus'
        });
})

.controller('KnowusController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    $scope.states = STATES;
    $scope.form = {};

    $scope.getTable = function(page)
    {
        $http({ url: 'knowus', method: 'GET'}).success(function (result) {
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
        $scope.knowus_form = {};
        $('#knowus_form').modal();
    }

    $scope.edit = function(ind,knowus)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.knowus_form = angular.copy(knowus);
        $('#knowus_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.knowus_form.KnowusId)? update() : add();
    }

    function add()
    {
        if($scope.knowus_form.KnowusName == null)
        {
           $scope.formError.KnowusName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'knowus', method: 'POST',data:$scope.knowus_form}).success(function(data){
            $('#knowus_form').modal('hide');
            al('Knowus Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Knowus Not Created");
        });
    }

    function update()
    {
        if($scope.knowus_form.KnowusName == null)
        {
           $scope.formError.KnowusName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'knowus/'+$scope.knowus_form.KnowusId, method: 'PUT',data:$scope.knowus_form}).success(function(data){
            $('#knowus_form').modal('hide');
            al('Knowus Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Knowus Not Updated");
        });
    }

    $scope.delete = function(ind,knowus,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Knowus?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'knowus/'+knowus.KnowusId, method: 'DELETE'}).success(function(data){
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

app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('road', {
            url: '/road',
            templateUrl: 'views/admin.master.road',
            controller: 'RoadController',
            title :'road'
        });
})

.controller('RoadController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    $scope.states = STATES;
    $scope.form = {};

    $scope.getTable = function(page)
    {
        $http({ url: 'road', method: 'GET'}).success(function (result) {
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
        $scope.road_form = {};
        $('#road_form').modal();
    }

    $scope.edit = function(ind,road)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.road_form = angular.copy(road);
        $('#road_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.road_form.RoadId)? update() : add();
    }

    function add()
    {
        if($scope.road_form.RoadName == null)
        {
           $scope.formError.RoadName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'road', method: 'POST',data:$scope.road_form}).success(function(data){
            $('#road_form').modal('hide');
            al('Road Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Road Not Created");
        });
    }

    function update()
    {
        if($scope.road_form.RoadName == null)
        {
           $scope.formError.RoadName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'road/'+$scope.road_form.RoadId, method: 'PUT',data:$scope.road_form}).success(function(data){
            $('#road_form').modal('hide');
            al('Road Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Road Not Updated");
        });
    }

    $scope.delete = function(ind,road,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Road?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'road/'+road.RoadId, method: 'DELETE'}).success(function(data){
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

app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('oldbuyer', {
            url: '/oldbuyer',
            templateUrl: 'views/admin.master.oldbuyer',
            controller: 'OldBuyerController',
            title :'oldbuyer'
        });
})

.controller('OldBuyerController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES ,Storage){

    $scope.states = STATES;
    $scope.oldbuyer_form = {};
    $scope.status = Storage.data.status;

    $scope.getTable = function(page)
    {
        $http({ url: 'oldbuyer', method: 'GET'}).success(function (result) {
            $scope.oldbuyer = result;

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
        $scope.oldbuyer_form = {};
        $('#oldbuyer_form').modal();
    }

    $scope.edit = function(ind,spec)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.oldbuyer_form = angular.copy(spec);
        $('#oldbuyer_form').modal();
    }

    $scope.detail = function(ind,spec)
    {
        index = ind;
        $scope.formType = 'SHOW';
        $scope.oldbuyerdetail_form = angular.copy(spec);
        $('#oldbuyerdetail_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.oldbuyer_form.OldBuyerId)? update() : add();
    }

    function add()
    {
        $http({ url: 'oldbuyer', method: 'POST',data:$scope.oldbuyer_form}).success(function(data){
            $('#oldbuyer_form').modal('hide');
            al('Buyer Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Buyer Not Created");
        });
    }

    function update()
    {

        $http({ url: 'oldbuyer/'+$scope.oldbuyer_form.OldBuyerId, method: 'PUT',data:$scope.oldbuyer_form}).success(function(data){
            $('#oldbuyer_form').modal('hide');
            al('Property Updated Successfully');
             $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Property Not Updated");
        });
    }

    $scope.delete = function(ind,old,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Property Type?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'oldbuyer/'+old.OldBuyerId, method: 'DELETE'}).success(function(data){
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

app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('role', {
            url: '/role',
            templateUrl: 'views/admin.master.role',
            controller: 'RoleController',
            title :'role'
        });
})

.controller('RoleController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    $scope.states = STATES;
    $scope.form = {};

    $scope.getTable = function(page)
    {
        $http({ url: 'role', method: 'GET'}).success(function (result) {
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
        $scope.role_form = {};
        $('#role_form').modal();
    }

    $scope.edit = function(ind,role)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.role_form = angular.copy(role);
        $('#role_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.role_form.RoleId)? update() : add();
    }

    function add()
    {
        if($scope.role_form.RoleName == null)
        {
           $scope.formError.RoleName = "THIS FEILD IS REQUIRED";
           return;
        }

        $scope.isDisabled = true;


        $http({ url: 'role', method: 'POST',data:$scope.role_form}).success(function(data){
            $('#role_form').modal('hide');
            al('Role Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Role Not Created");
        });
    }

    function update()
    {
        if($scope.role_form.RoledName == null)
        {
           $scope.formError.RoledName = "THIS FEILD IS REQUIRED";
           return;
        }

        $http({ url: 'role/'+$scope.role_form.RoleId, method: 'PUT',data:$scope.role_form}).success(function(data){
            $('#role_form').modal('hide');
            al('Role Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Role Not Updated");
        });
    }

    $scope.delete = function(ind,role,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Role?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'role/'+role.RoleId, method: 'DELETE'}).success(function(data){
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


app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('mediator', {
            url: '/mediator',
            templateUrl: 'views/admin.master.mediator',
            controller: 'MediatorController',
            title :'mediator'
        })
        .state('mediator_per_follow_details', {
            url: '/mediator_per_follow_details/:id',
            templateUrl: 'views/admin.mediator.mediatorassignperson',
            controller: 'MediatorPerFollowAssignController',
            title :'mediator_assign'
        })
})

.controller('MediatorController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    // $scope.states = STATES;
    $scope.form = {};

    $http({ url: 'area', method: 'GET'}).success(function (result) {
        $scope.area = result;
    });

    $http({ url: 'abo', method: 'GET'}).success(function (result) {
        $scope.abo = result.data;
    });


    $scope.getTable = function(page)
    {
        $http({ url: 'mediator', method: 'GET'}).success(function (result) {
            $scope.data = result.data;
            $scope.id = result.id;
            $scope.role = result.role;

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
        $scope.mediator_form = {};
        $('#mediator_form').modal();
    }

    $scope.edit = function(ind,mediator)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.mediator_form = angular.copy(mediator);
        $scope.mediator_form.Area = {AreaId:$scope.mediator_form.AreaId,AreaName:$scope.mediator_form.AreaName};

        $('#mediator_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.mediator_form.MediatorId)? update() : add();
    }

    function add()
    {
        if($scope.mediator_form.MediatorName == null)
        {
           $scope.formError.MediatorName = "THIS FEILD IS REQUIRED";
           return;
        }

        $scope.mediator_form.AreaId = $scope.mediator_form.Area.AreaId;
        $scope.mediator_form.AreaName = $scope.mediator_form.Area.AreaName;
        $scope.mediator_form.AboId = $scope.mediator_form.Abo.AboId;
        $scope.mediator_form.AboName = $scope.mediator_form.Abo.AboName;

        $http({ url: 'mediator', method: 'POST',data:$scope.mediator_form}).success(function(data){
            $('#mediator_form').modal('hide');
            al('Mediator Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Mediator Not Created");
        });
    }

    function update()
    {
        if($scope.mediator_form.MediatorName == null)
        {
           $scope.formError.MediatorName = "THIS FEILD IS REQUIRED";
           return;
        }

        $scope.mediator_form.AreaId = $scope.mediator_form.Area.AreaId;
        $scope.mediator_form.AreaName = $scope.mediator_form.Area.AreaName;
        $scope.mediator_form.AboId = $scope.mediator_form.Abo.AboId;
        $scope.mediator_form.AboName = $scope.mediator_form.Abo.AboName;

        $http({ url: 'mediator/'+$scope.mediator_form.MediatorId, method: 'PUT',data:$scope.mediator_form}).success(function(data){
            $('#mediator_form').modal('hide');
            al('Mediator Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Mediator Not Updated");
        });
    }

    $scope.delete = function(ind,mediator,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Mediator?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'mediator/'+road.MediatorId, method: 'DELETE'}).success(function(data){
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

.controller('MediatorPerFollowAssignController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $stateParams, $httpParamSerializer, $state, $timeout, $location, STATES , Pagination){
    // $scope.paginations =  {data:[],pagination:{page: 1, count: 50, sorting: {MediatorAssignId: 'desc'}} };
    // $scope.pagination = $scope.paginations.pagination;
    var page = $scope.paginations.pagination.page;
    $scope.mediator_assign_form = {};

    var id = $stateParams.id;

    $scope.isDisabledMediStatus = true;
    $scope.isDisabledMediAccess = true;


    $http({ url: 'mediator', method: 'GET'}).success(function (result) {
         $scope.mediator = result;
    });

    $http({ url: 'propertygetdatas', method: 'GET'}).success(function (result) {
         $scope.property = result;
    });

    $scope.form = {propertyid:'',propertyname:'',mediatorid:'',mediatorname:'',status:'',access:'',description:''};


    $scope.getTable = function(page,form)
    {

        if((form.propertyid == "" || form.propertyid == undefined) && (form.propertyname == undefined || form.propertyname == "")
           && (form.mediatorid == undefined || form.mediatorid == "") && (form.mediatorname == undefined || form.mediatorname == "")
           && (form.status == undefined || form.status == "") && (form.access == undefined || form.access == "") && (form.description == undefined || form.description == ""))
        {
                $scope.paginat  = page;
                $scope.pagination.searchdata = "nosearch";

                if($scope.paginat  != 0 || $scope.paginat  == "undefined")
                {
                  $scope.pagination.page = page;
                }

                $http({ url: 'mediator_assign_per/'+id, method: 'GET',params:$scope.pagination}).success(function (result) {
                    $scope.data = result.data;
                    $scope.id = result.id;
                    $scope.role = result.role;
                    $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
                    $scope.pages = $scope.pagevalue.pages;
                    $scope.page2 = form;

                    if($scope.role === 1){
                       $scope.isDisabledMediStatus = false;
                    }

                });
        }
        else
        {
                $scope.paginat  = page;
                $scope.pagination.searchdata = "nosearch";

                $scope.pagination.page = page;
                $scope.pagination.searchdata = "search";
                $scope.pagination.propertyid = form.propertyid;
                $scope.pagination.propertyname = form.propertyname;
                $scope.pagination.mediatorid = form.mediatorid;
                $scope.pagination.mediatorname = form.mediatorname;
                $scope.pagination.description = form.description;
                $scope.pagination.status = form.status;
                $scope.pagination.access = form.access;

                $http({ url: 'mediator_assign_per/'+id, method: 'GET',params:$scope.pagination}).success(function (result) {
                    $scope.data = result.data;
                    $scope.id = result.id;
                    $scope.role = result.role;
                    $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
                    $scope.pages = $scope.pagevalue.pages;
                    $scope.page2 = form;
                    if($scope.role === 1){
                       $scope.isDisabledMediStatus = false;
                    }
                });

        }


    }

    $scope.new = function()
    {
        $scope.formType = 'NEW';
        $scope.mediator_assign_form.MediatorAssignDate = moment(new Date()).format('YYYY-MM-DD 00:00:00');
        $('#mediator_assign_form').modal();
    }

    $scope.edit = function(ind,assign)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.mediator_assign_form = angular.copy(assign);
        $scope.mediator_assign_form.Mediator = {MediatorId:$scope.mediator_assign_form.MediatorId,MediatorName:$scope.mediator_assign_form.MediatorName};
        $scope.mediator_assign_form.Property = {PropertyId:$scope.mediator_assign_form.PropertyId,PropertyName:$scope.mediator_assign_form.PropertyName};
        $('#mediator_assign_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.mediator_assign_form.MediatorAssignId)? updateassign() : addassign();
    }

    function addassign()
    {
        $scope.mediator_assign_form.MediatorId = $scope.mediator_assign_form.Mediator.MediatorId;
        $scope.mediator_assign_form.MediatorName = $scope.mediator_assign_form.Mediator.MediatorName;
        $scope.mediator_assign_form.PropertyId = $scope.mediator_assign_form.Property.PropertyId;
        $scope.mediator_assign_form.PropertyName = $scope.mediator_assign_form.Property.PropertyName;

        $http({ url: 'mediator_assign', method: 'POST',data:$scope.mediator_assign_form}).success(function(data){
            $('#mediator_assign_form').modal('hide');
            al('Property Assigned Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Property Not Created");
        });
    }

    function updateassign()
    {
        $scope.mediator_assign_form.MediatorId = $scope.mediator_assign_form.Mediator.MediatorId;
        $scope.mediator_assign_form.MediatorName = $scope.mediator_assign_form.Mediator.MediatorName;
        $scope.mediator_assign_form.PropertyId = $scope.mediator_assign_form.Property.PropertyId;
        $scope.mediator_assign_form.PropertyName = $scope.mediator_assign_form.Property.PropertyName;

        $http({ url: 'mediator_assignupdate/'+$scope.mediator_assign_form.MediatorAssignId, method: 'PUT',data:$scope.mediator_assign_form}).success(function(data){
            $('#mediator_assign_form').modal('hide');
            al('Property Assigned Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
          al("Follow Not Updated");
        });
    }


    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }

    $scope.getTable(page,$scope.form);
})


app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('usersdata', {
            url: '/users_data',
            templateUrl: 'views/admin.master.usersdata',
            controller: 'UsersDataController',
            title :'usersdata'
        })
})

.controller('UsersDataController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    // $scope.states = STATES;
    $scope.form = {};
    $scope.user_data_form = {};


    $scope.getTable = function(page)
    {
        $http({ url: 'users_data', method: 'GET'}).success(function (result) {
            $scope.data = result.data;
            $scope.id = result.id;
            $scope.role = result.role;

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


    $scope.edit = function(ind,user)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.user_data_form = angular.copy(user);

        $('#user_data_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        update();
    }


    function update()
    {

        $http({ url: 'users_data/'+$scope.user_data_form.id, method: 'PUT',data:$scope.user_data_form}).success(function(data){
            $('#user_data_form').modal('hide');
            al('User Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("User Not Updated");
        });
    }

    $scope.delete = function(ind,mediator,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Mediator?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'mediator/'+road.MediatorId, method: 'DELETE'}).success(function(data){
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



app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('abo', {
            url: '/abo',
            templateUrl: 'views/admin.master.abo',
            controller: 'AboController',
            title :'abo'
        })
        // .state('mediator_per_follow_details', {
        //     url: '/mediator_per_follow_details/:id',
        //     templateUrl: 'views/admin.mediator.mediatorassignperson',
        //     controller: 'MediatorPerFollowAssignController',
        //     title :'mediator_assign'
        // })
})

.controller('AboController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    // $scope.states = STATES;
    $scope.form = {};

    $http({ url: 'area', method: 'GET'}).success(function (result) {
        $scope.area = result;
    });

    $scope.getTable = function(page)
    {
        $http({ url: 'abo', method: 'GET'}).success(function (result) {
            $scope.data = result.data;
            $scope.id = result.id;
            $scope.role = result.role;

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
        $scope.abo_form = {};
        $('#abo_form').modal();
    }

    $scope.edit = function(ind,abo)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.abo_form = angular.copy(abo);
        $scope.abo_form.Area = {AreaId:$scope.abo_form.AreaId,AreaName:$scope.abo_form.AreaName};

        $('#abo_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.abo_form.AboId)? update() : add();
    }

    function add()
    {
        if($scope.abo_form.AboName == null)
        {
           $scope.formError.AboName = "THIS FEILD IS REQUIRED";
           return;
        }

        $scope.abo_form.AreaId = $scope.abo_form.Area.AreaId;
        $scope.abo_form.AreaName = $scope.abo_form.Area.AreaName;

        $http({ url: 'abo', method: 'POST',data:$scope.abo_form}).success(function(data){
            $('#abo_form').modal('hide');
            al('Abo Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Abo Not Created");
        });
    }

    function update()
    {
        if($scope.abo_form.AboName == null)
        {
           $scope.formError.AboName = "THIS FEILD IS REQUIRED";
           return;
        }

        $scope.abo_form.AreaId = $scope.abo_form.Area.AreaId;
        $scope.abo_form.AreaName = $scope.abo_form.Area.AreaName;
        console.log("its ok ");

        $http({ url: 'abo/'+$scope.abo_form.AboId, method: 'PUT',data:$scope.abo_form}).success(function(data){
            $('#abo_form').modal('hide');
            al('Abo Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Abo Not Updated");
        });
    }

    $scope.delete = function(ind,abo,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Abo?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'abo/'+abo.AboId, method: 'DELETE'}).success(function(data){
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


app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('asp', {
            url: '/asp',
            templateUrl: 'views/admin.master.asp',
            controller: 'AspController',
            title :'asp'
        })
})

.controller('AspController', function($filter, $rootScope,$scope, MASTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES){

    // $scope.states = STATES;
    $scope.form = {};

    $http({ url: 'area', method: 'GET'}).success(function (result) {
        $scope.area = result;
    });

    $scope.getTable = function(page)
    {
        $http({ url: 'asp', method: 'GET'}).success(function (result) {
            $scope.data = result.data;
            $scope.id = result.id;
            $scope.role = result.role;

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
        $scope.asp_form = {};
        $('#asp_form').modal();
    }

    $scope.edit = function(ind,asp)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.asp_form = angular.copy(asp);
        $scope.asp_form.Area = {AreaId:$scope.asp_form.AreaId,AreaName:$scope.asp_form.AreaName};

        $('#asp_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.asp_form.AspId)? update() : add();
    }

    function add()
    {
        if($scope.asp_form.AspName == null)
        {
           $scope.formError.AspName = "THIS FEILD IS REQUIRED";
           return;
        }

        $scope.asp_form.AreaId = $scope.asp_form.Area.AreaId;
        $scope.asp_form.AreaName = $scope.asp_form.Area.AreaName;

        $http({ url: 'asp', method: 'POST',data:$scope.asp_form}).success(function(data){
            $('#asp_form').modal('hide');
            al('Asp Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Asp Not Created");
        });
    }

    function update()
    {
        if($scope.asp_form.AspName == null)
        {
           $scope.formError.AspName = "THIS FEILD IS REQUIRED";
           return;
        }

        $scope.asp_form.AreaId = $scope.asp_form.Area.AreaId;
        $scope.asp_form.AreaName = $scope.asp_form.Area.AreaName;
        console.log("its ok ");

        $http({ url: 'asp/'+$scope.asp_form.AspId, method: 'PUT',data:$scope.asp_form}).success(function(data){
            $('#asp_form').modal('hide');
            al('Asp Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Asp Not Updated");
        });
    }

    $scope.delete = function(ind,asp,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Asp?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'asp/'+asp.AspId, method: 'DELETE'}).success(function(data){
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
