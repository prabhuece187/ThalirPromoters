app.constant('ASPDATA',{data:[],pagination:{page: 1, count: 50, sorting: {AspDataId: 'desc'}} })
app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('aspdata', {
            url: '/aspdata',
            templateUrl: 'views/admin.aspdata.index',
            controller: 'AspDataController',
            title :'aspdata'
        });
})

.controller('AspDataController', function($filter, $rootScope,$scope,Pagination, ASPDATA, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES ,Storage){
    $scope.promotertype = Storage.data.promotertype;
    $scope.pagination = ASPDATA.pagination;
    var page = ASPDATA.pagination.page;

    $scope.states = STATES;
    $scope.asp_data_form = {};

    // $http({ url: 'comtype', method: 'GET'}).success(function (result) {
    //     $scope.comtype = result;
    // });

    $http({ url: 'area', method: 'GET'}).success(function(data){
        $scope.area = data;
    });

    $scope.getTable = function(page,page2)
    {
        var page2 = page2||null;

        if(page2 === null)
        {
            $scope.paginat  = page;
            $scope.pagination.searchdata = page2;

            if($scope.paginat  != 0 || $scope.paginat  == "undefined"){
              $scope.pagination.page = page;
            }

            $http({ url: 'aspdata', method: 'GET',params:$scope.pagination}) .success(function (result) {
                $scope.data = result.data;
                $scope.role = result.role;
                $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
                $scope.pages = $scope.pagevalue.pages;
                $scope.page2 = page2;
            });
        }
        else
        {
             $scope.pagination.page = page;
             $scope.pagination.searchdata = page2;

             $http({ url: 'aspdata', method: 'GET',params:$scope.pagination}) .success(function (result) {
                $scope.data = result.data;
                $scope.role = result.role;
                $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
                $scope.pages = $scope.pagevalue.pages;
                $scope.page2 = page2;
            });

        }
    }

    $scope.new = function()
    {
        $scope.formType = 'NEW';
        $scope.asp_data_form = {};
        $scope.asp_data_form.AspDataDate = moment(new Date()).format('YYYY-MM-DD');
        $scope.asp_data_form.AspDataStatus = "Pending";
        $('#asp_data_form').modal();
    }


    $scope.edit = function(ind,asp)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.asp_data_form = angular.copy(asp);
        $scope.asp_data_form.Area = {AreaId:$scope.asp_data_form.AreaId,AreaName:$scope.asp_data_form.AreaName};

        $('#asp_data_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.asp_data_form.AspDataId)? update() : add();
    }

    function add()
    {
        $scope.asp_data_form.AreaId = $scope.asp_data_form.Area.AreaId;
        $scope.asp_data_form.AreaName = $scope.asp_data_form.Area.AreaName;
        $http({ url: 'aspdata', method: 'POST',data:$scope.asp_data_form}).success(function(data){
            $('#asp_data_form').modal('hide');
            al('Asp Data Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Asp Data Not Created");
        });
    }

    function update()
    {
        $scope.asp_data_form.AreaId = $scope.asp_data_form.Area.AreaId;
        $scope.asp_data_form.AreaName = $scope.asp_data_form.Area.AreaName;
        $http({ url: 'aspdataupdate/'+$scope.asp_data_form.AspDataId, method: 'POST',data:$scope.asp_data_form}).success(function(data){
            $('#asp_data_form').modal('hide');
            al('Asp Data Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Asp Data Not Updated");
        });
    }

    $scope.delete = function(ind,ref,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Asp Data?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'aspdatadelete/'+ref.AspDataId, method: 'DELETE'}).success(function(data){
                al('Deleted Successfully');
                $state.go($state.current, {}, {reload: true});
            }).error(function(data){
              al("Not Deleted");
            });
        });
    }

     $scope.newstatus = function(val)
    {
        $scope.formType = 'NEW';
        $scope.status_form= {};
        $scope.status_form.id = val;
        $('#status_form').modal();
    }

    $scope.postStatus = function()
    {
        $('#status_form').modal('hide');

        $http({ url: 'AspDatastatusupdate/'+$scope.status_form.id, method: 'PUT',data:$scope.status_form}).success(function(data){
           al('Status Updated Successfully');
           $state.go($state.current, {}, {reload: true});
        }).error(function(data){
           al(" Not Updated");
        });
    }

      function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }

    $scope.getTable(page);
})
