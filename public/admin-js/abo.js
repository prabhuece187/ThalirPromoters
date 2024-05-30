app.constant('ABO',{data:[],pagination:{page: 1, count: 50, sorting: {AboAssignedId: 'desc'}} })
app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('abo_assign', {
            url: '/abo_assign',
            templateUrl: 'views/admin.abo.aboassign',
            controller: 'AboAssignController',
            title :'abo_assign'
        })
        .state('abo_follow', {
            url: '/abo_follow/:mid/:pid',
            templateUrl: 'views/admin.abo.mediatorfollow',
            controller: 'AboFollowController',
            title :'abo_follow'
        })
        .state('abo_follow_details', {
            url: '/abo_follow_details/:mid/:pid',
            templateUrl: 'views/admin.abo.mediatorfollow',
            controller: 'AboFollowDetailsController',
            title :'abo_follow_details'
        })
})

.controller('AboAssignController', function($filter, $rootScope,$scope, ABO, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES , Pagination){
    $scope.pagination = ABO.pagination;
    var page = ABO.pagination.page;
    $scope.abo_assign_form = {};

    $scope.isDisabledAboStatus = true;
    $scope.isDisabledAboAccess = true;


    $http({ url: 'abo', method: 'GET'}).success(function (result) {
         $scope.abo = result.data;
    });

    $http({ url: 'propertygetdatas', method: 'GET'}).success(function (result) {
         $scope.property = result;
    });

    $scope.form = {propertyid:'',propertyname:'',aboid:'',aboname:'',status:'',access:'',description:''};


    $scope.getTable = function(page,form)
    {

        if((form.propertyid == "" || form.propertyid == undefined) && (form.propertyname == undefined || form.propertyname == "")
           && (form.aboid == undefined || form.aboid == "") && (form.aboname == undefined || form.aboname == "")
           && (form.status == undefined || form.status == "") && (form.access == undefined || form.access == "") && (form.description == undefined || form.description == ""))
        {
                $scope.paginat  = page;
                $scope.pagination.searchdata = "nosearch";

                if($scope.paginat  != 0 || $scope.paginat  == "undefined")
                {
                  $scope.pagination.page = page;
                }

                $http({ url: 'abo_assign', method: 'GET',params:$scope.pagination}).success(function (result) {
                    $scope.data = result.data;
                    $scope.id = result.id;
                    $scope.role = result.role;
                    $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
                    $scope.pages = $scope.pagevalue.pages;
                    $scope.page2 = form;

                    if($scope.role === 1){
                       $scope.isDisabledAboStatus = false;
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
                $scope.pagination.aboid = form.aboid;
                $scope.pagination.aboname = form.aboname;
                $scope.pagination.description = form.description;
                $scope.pagination.status = form.status;
                $scope.pagination.access = form.access;

                $http({ url: 'abo_assign', method: 'GET',params:$scope.pagination}).success(function (result) {
                    $scope.data = result.data;
                    $scope.id = result.id;
                    $scope.role = result.role;
                    $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
                    $scope.pages = $scope.pagevalue.pages;
                    $scope.page2 = form;
                    if($scope.role === 1){
                       $scope.isDisabledAboStatus = false;
                    }
                });

        }
    }

    $scope.new = function()
    {
        $scope.formType = 'NEW';
        $scope.abo_assign_form.AboAssignDate = moment(new Date()).format('YYYY-MM-DD 00:00:00');
        $('#abo_assign_form').modal();
    }

    $scope.edit = function(ind,assign)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.abo_assign_form = angular.copy(assign);
        $scope.abo_assign_form.Abo = {AboId:$scope.abo_assign_form.AboId,AboName:$scope.abo_assign_form.AboName};
        $scope.abo_assign_form.Property = {PropertyId:$scope.abo_assign_form.PropertyId,PropertyName:$scope.abo_assign_form.PropertyName};
        $('#abo_assign_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.abo_assign_form.AboAssignedId)? updateassign() : addassign();
    }

    function addassign()
    {
        $scope.abo_assign_form.AboId = $scope.abo_assign_form.Abo.AboId;
        $scope.abo_assign_form.AboName = $scope.abo_assign_form.Abo.AboName;
        $scope.abo_assign_form.PropertyId = $scope.abo_assign_form.Property.PropertyId;
        $scope.abo_assign_form.PropertyName = $scope.abo_assign_form.Property.PropertyName;

        $http({ url: 'abo_assign', method: 'POST',data:$scope.abo_assign_form}).success(function(data){
            $('#abo_assign_form').modal('hide');
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
        $scope.abo_assign_form.AboId = $scope.abo_assign_form.Abo.AboId;
        $scope.abo_assign_form.AboName = $scope.abo_assign_form.Abo.AboName;
        $scope.abo_assign_form.PropertyId = $scope.abo_assign_form.Property.PropertyId;
        $scope.abo_assign_form.PropertyName = $scope.abo_assign_form.Property.PropertyName;

        $http({ url: 'abo_assignupdate/'+$scope.abo_assign_form.AboAssignedId, method: 'PUT',data:$scope.abo_assign_form}).success(function(data){
            $('#abo_assign_form').modal('hide');
            al('Property Assigned Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
          al("Follow Not Updated");
        });
    }

    $scope.delete = function(ind,assign,ev)
    {
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Assignment?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {
            $http({ url: 'abo_assign_delete/'+assign.AboAssignedId, method: 'DELETE'}).success(function(data){
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

    $scope.getTable(page,$scope.form);
})

.controller('AboFollowController', function($window, $location, $filter, Pagination, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, $stateParams , Storage){
    var pid = $stateParams.pid;
    var mid = $stateParams.mid;
    $scope.status = Storage.data.status;

    $scope.abo_follow_form = {};
    $scope.abo_buyer_form = {};
    $scope.property_form = {};
    $scope.status_form = {};
    $scope.isDisabledStatus = false;
    $scope.isDisabledAboStatus = false;
    $scope.isDisabledAboAccess = false;


    $http({ url: 'abo_follow/'+mid+'/'+pid, method: 'GET'}).success(function(data)
    {
         $scope.abo_follow_form = data.abo;
         $scope.abo_buyer_form = data.abo;
         $scope.status_form = data.abo;
         $scope.role = data.role;
         $scope.days = data.days;
         // console.log($scope.role);
         if($scope.role === 4 && $scope.status_form.AboAssignAccess === 'no'){
            $scope.isDisabledStatus = true;
         }

         $scope.property_form = data.property;
    });

    $http({ url: 'abo_follow_get/'+mid+'/'+pid, method: 'GET'}).success(function (result) {
         $scope.abo_follow = result;
    });

    $http({ url: 'abo_buyer_get/'+mid+'/'+pid, method: 'GET'}).success(function (result) {
         $scope.abo_buyer = result.person;
    });

    $scope.new = function()
    {
        $scope.formType = 'NEW';
        $scope.abo_follow_form.AboFollowDate = moment(new Date()).format('YYYY-MM-DD 00:00:00');
        $('#abo_follow_form').modal();
    }

    $scope.edit = function(ind,follow)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.abo_follow_form = angular.copy(follow);
        $('#abo_follow_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.abo_follow_form.AboFollowId)? updatefollow() : addfollow();
    }

    function addfollow()
    {
        // console.log($scope.abo_follow_form);
        $http({ url: 'abo_follow', method: 'POST',data:$scope.abo_follow_form}).success(function(data){
            $('#abo_follow_form').modal('hide');
            al('Property Follow Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Property Not Created");
        });
    }

    function updatefollow()
    {
        $http({ url: 'abo_follow_update/'+$scope.abo_follow_form.AboFollowId, method: 'PUT',data:$scope.abo_follow_form}).success(function(data){
            $('#abo_follow_form').modal('hide');
            al('Property Follow Added Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
          al("Follow Not Updated");
        });
    }


    $scope.newperson = function()
    {
        $scope.formType = 'NEW';
        $scope.abo_buyer_form.AboBuyerDate = moment(new Date()).format('YYYY-MM-DD 00:00:00');
        $('#abo_buyer_form').modal();
    }

    $scope.editperson = function(ind,person)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.abo_buyer_form = angular.copy(person);
        $('#abo_buyer_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postPerson = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.abo_buyer_form.AboBuyerId)? updateprson() : addperson();
    }

    function addperson()
    {
        $http({ url: 'abo_buyer', method: 'POST',data:$scope.abo_buyer_form}).success(function(data){
            $('#abo_buyer_form').modal('hide');
            al('Person Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Person Not Created");
        });
    }

    function updateprson()
    {
        $http({ url: 'abo_buyer_update/'+$scope.abo_buyer_form.AboBuyerId, method: 'PUT',data:$scope.abo_buyer_form}).success(function(data){
            $('#abo_buyer_form').modal('hide');
            al('Person Added  Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
          al("Person Not Updated");
        });
    }

    $scope.newstatus = function()
    {
        $scope.formType = 'NEW';
        $scope.status_form.PropertyUserStatus = "add";
        $('#status_form').modal();
    }

    $scope.postStatus = function()
    {
        $('#status_form').modal('hide');

        $http({ url: 'assign_status_update/'+$scope.status_form.AboAssignedId, method: 'PUT',data:$scope.status_form}).success(function(data){
           al('Person Status Updated Successfully');
           $state.go($state.current, {}, {reload: true});
        }).error(function(data){
           al("Person Not Updated");
        });
    }

    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }
})


.controller('AboFollowDetailsController', function($window, $location, $filter, Pagination, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, $stateParams , Storage){
    var pid = $stateParams.pid;
    var mid = $stateParams.mid;
    $scope.status = Storage.data.status;

    $scope.abo_follow_form = {};
    $scope.abo_buyer_form = {};
    $scope.property_form = {};
    $scope.status_form = {};
    $scope.isDisabledStatus = false;

    $http({ url: 'abo_follow/'+mid+'/'+pid, method: 'GET'}).success(function(data)
    {
         $scope.abo_follow_form = data.abo;
         $scope.abo_buyer_form = data.abo;
         $scope.status_form = data.abo;
         $scope.role = data.role;
         $scope.days = data.days;
         // console.log($scope.role);
         if($scope.role === 4){
            $scope.isDisabledStatus = true;
         }

         $scope.property_form = data.property;
    });

    $http({ url: 'abo_follow_get/'+mid+'/'+pid, method: 'GET'}).success(function (result) {
         $scope.abo_follow = result;
    });

    $http({ url: 'abo_buyer_get/'+mid+'/'+pid, method: 'GET'}).success(function (result) {
         $scope.abo_buyer = result.person;
    });


    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }
})
