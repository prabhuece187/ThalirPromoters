app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
       .state('dashboard', {
            url: '/dashboard',
            templateUrl: 'views/admin.dashboard.dashboard',
            controller: 'dashboardCtrl',
            menuactive:'dashboard',
            title :'Dashboard'
        })
       .state('newcomeproperty', {
            url: '/newcomeproperty',
            templateUrl: 'views/admin.reports.newcome',
            controller: 'NewComeCtrl',
            menuactive:'newcomeproperty',
            title :'newcomeproperty'
        })
        .state('newuserstatus', {
            url: '/newuserstatus',
            templateUrl: 'views/admin.reports.newuserstatus',
            controller: 'NewUserStatusCtrl',
            menuactive:'newuserstatus',
            title :'newuserstatus'
        })
        .state('newcommentsprop', {
            url: '/newcommentsprop',
            templateUrl: 'views/admin.reports.newcommentsprop',
            controller: 'NewCommentsPropCtrl',
            menuactive:'newcommentsprop',
            title :'newcommentsprop'
        })
        .state('newcommentsprom', {
            url: '/newcommentsprom',
            templateUrl: 'views/admin.reports.newcommentsprom',
            controller: 'NewCommentsPromCtrl',
            menuactive:'newcommentsprom',
            title :'newcommentsprom'
        })
        .state('mediator_report', {
            url: '/mediator_report/{data}',
            templateUrl: 'views/admin.mediator.mediatorassign',
            controller: 'MediatorReportCtrl',
            menuactive:'mediator_report',
            title :'mediator_report'
        })
        .state('mediator_follow_status', {
            url: '/mediator_follow_status',
            templateUrl: 'views/admin.mediator.mediatorfollowstatus',
            controller: 'MediatorFollowStatusCtrl',
            menuactive:'mediator_follow_status',
            title :'mediator_follow_status'
        })
        .state('property_follow_status', {
            url: '/property_follow_status',
            templateUrl: 'views/admin.seller.propertyfollowstatus',
            controller: 'PropertyFollowStatusCtrl',
            menuactive:'property_follow_status',
            title :'property_follow_status'
        });
        $urlRouterProvider.otherwise('/dashboard');
})


.controller('dashboardCtrl', function($window, $location, $filter, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES){

$scope.dashboard =function(){

	 $http({ url: 'Dashboard', method: 'GET'}).success(function (result) {
            $scope.role = result.role;
            $scope.new = result.data;
            $scope.stat = result.status;
            $scope.commentprop = result.commentprop;
            $scope.commentprom = result.commentprom;
            $scope.client = result.client;
            $scope.medfollow = result.mediatorfollowstatus;
            $scope.profollow = result.propertyfollowstatus;
            $scope.aspdata = result.aspdata;
            console.log($scope.aspdata );
            if($scope.role === 1 || $scope.role === 4 || $scope.role === 5){
                $scope.totalassign = result.totalassign;
                $scope.totalassignyes = result.totalassignyes;
                $scope.totalassignno = result.totalassignno;
                $scope.totalassignprocess = result.totalassignprocess;
                $scope.totalassigncomplete = result.totalassigncomplete;
                $scope.totalassignend = result.totalassignend;
                $scope.totalassignstart = result.totalassignstart;
            }
        });
    }

    $scope.dashboard();

})

.controller('NewComeCtrl', function($window, $location, $filter, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES ,Storage){
     $scope.status = Storage.data.status;
     $scope.status_form = {};
     $http({ url: 'new-come-property', method: 'GET'}).success(function (result) {
        $scope.role = result.role;
        $scope.data = result.data;

        angular.element(document).ready( function () {
           $('#table_id').DataTable({
               dom: 'lBfrtip',
               "order": [[0,"desc" ]],
               buttons: [ 'excel' ],
               responsive: true,
               columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ]
           });
        });
     });

    $scope.newstatus = function(site)
    {

        $scope.formType = 'NEW';
        $scope.status_form.id = site.PropertyId;
        $scope.status_form.PropertyUserStatus = "add";
        $('#status_form').modal();

    }

    $scope.postStatus = function()
    {
        $('#status_form').modal('hide');
        $http({ url: 'propertystatusupdate/'+$scope.status_form.id, method: 'PUT',data:$scope.status_form}).success(function(data){
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


.controller('NewUserStatusCtrl', function($window, $location, $filter, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES ,Storage){
     $scope.status = Storage.data.status;
     $scope.userstatus_form = {};

     $http({ url: 'new-come-userstatus', method: 'GET'}).success(function (result) {
        $scope.role = result.role;
        $scope.status = result.status;
        console.log($scope.status);

        angular.element(document).ready( function () {
           $('#table_id').DataTable({
               dom: 'lBfrtip',
               "order": [[0,"desc" ]],
               buttons: [ 'excel' ],
               responsive: true,
               columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ]
           });
        });
     });

    $scope.newuserstatus = function(site)
    {
       console.log(site);
        $scope.formType = 'NEW';
        $scope.userstatus_form = site;
        $scope.userstatus_form.id = site.PropertyId;
        $scope.userstatus_form.PropertyUserStatus = "update";
        $('#userstatus_form').modal();

    }

    $scope.postStatus = function()
    {
        $('#status_form').modal('hide');
        $http({ url: 'propertyuserstatusupdate/'+$scope.userstatus_form.id, method: 'PUT',data:$scope.userstatus_form}).success(function(data){
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


.controller('NewCommentsPropCtrl', function($window, $location, $filter, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES ,Storage){
     $scope.status = Storage.data.followstatus;
     $scope.comment_form = {};

     $http({ url: 'new-prop-comments', method: 'GET'}).success(function (result) {
        $scope.role = result.role;
        $scope.prop = result.prop;

        angular.element(document).ready( function () {
           $('#table_id').DataTable({
               dom: 'lBfrtip',
               "order": [[0,"desc" ]],
               buttons: [ 'excel' ],
               responsive: true,
               columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ]
           });
        });
     });

    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }

})


.controller('NewCommentsPromCtrl', function($window, $location, $filter, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES ,Storage){
     $scope.status = Storage.data.followstatus;
     $scope.comment_form = {};

     $http({ url: 'new-prom-comments', method: 'GET'}).success(function (result) {
        $scope.role = result.role;
        $scope.prom = result.prom;

        angular.element(document).ready( function () {
           $('#table_id').DataTable({
               dom: 'lBfrtip',
               "order": [[0,"desc" ]],
               buttons: [ 'excel' ],
               responsive: true,
               columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ]
           });
        });
     });

    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }

})

.controller('MediatorReportCtrl', function($filter, $rootScope,$scope, MEDIATOR, $http, $mdDialog, $mdToast, $httpParamSerializer, $state,$stateParams, $timeout, $location, STATES , Pagination){
    $scope.pagination = MEDIATOR.pagination;
    var page = MEDIATOR.pagination.page;
    $scope.mediator_assign_form = {};
    var data = $stateParams.data;
    $scope.isDisabledMediAccess = false;
    $scope.isDisabledMediStatus = false;

    if (data === 'yes' || data === 'no'){
      $scope.isDisabledMediAccess = true;
    }
    else
    {
      $scope.isDisabledMediStatus = true;
    }

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

                $http({ url: 'mediator_assign_report/'+data, method: 'GET',params:$scope.pagination}).success(function (result) {
                    $scope.data = result.data;
                    $scope.id = result.id;
                    $scope.role = result.role;
                    $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
                    $scope.pages = $scope.pagevalue.pages;
                    $scope.page2 = form;
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

                $http({ url: 'mediator_assign_report/'+data, method: 'GET',params:$scope.pagination}).success(function (result) {
                    $scope.data = result.data;
                    $scope.id = result.id;
                    $scope.role = result.role;
                    $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
                    $scope.pages = $scope.pagevalue.pages;
                    $scope.page2 = form;
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


.controller('MediatorFollowStatusCtrl', function($window, $location, $filter, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES ,Storage){

    $http({ url: 'mediator_follow_status', method: 'GET'}).success(function (result) {
       $scope.mediator = result;

       angular.element(document).ready( function () {
          $('#table_id').DataTable({
              dom: 'lBfrtip',
              "order": [[0,"desc" ]],
              buttons: [ 'excel' ],
              responsive: true,
              columnDefs: [
                   { responsivePriority: 1, targets: 0 },
                   { responsivePriority: 2, targets: -1 }
               ]
          });
       });
    });

    $scope.edit = function(ind,follow)
    {
        $http({ url: 'med_fol_sta_update/'+follow.MediatorFollowId, method: 'PUT'}).success(function (result) {
            al('Status Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        });
    }

   function al(text)
   {
       $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
   }

})


.controller('PropertyFollowStatusCtrl', function($window, $location, $filter, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES ,Storage){

    $http({ url: 'property_follow_status', method: 'GET'}).success(function (result) {
        $scope.property = result;

        angular.element(document).ready( function () {
           $('#table_id').DataTable({
               dom: 'lBfrtip',
               "order": [[0,"desc" ]],
               buttons: [ 'excel' ],
               responsive: true,
               columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ]
           });
        });
     });

     $scope.edit = function(ind,follow)
     {
         $http({ url: 'pro_fol_sta_update/'+follow.FollowId, method: 'PUT'}).success(function (result) {
             al('Status Updated Successfully');
             $state.go($state.current, {}, {reload: true});
         });
     }


   function al(text)
   {
       $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
   }

})
