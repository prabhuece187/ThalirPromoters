app.constant('MEDIATOR',{data:[],pagination:{page: 1, count: 50, sorting: {MediatorAssignId: 'desc'}} })
app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('mediator_assign', {
            url: '/mediator_assign',
            templateUrl: 'views/admin.mediator.mediatorassign',
            controller: 'MediatorAssignController',
            title :'mediator_assign'
        })
        .state('mediator_follow', {
            url: '/mediator_follow/:mid/:pid',
            templateUrl: 'views/admin.mediator.mediatorfollow',
            controller: 'MediatorFollowController',
            title :'mediator_follow'
        })
        .state('mediator_follow_details', {
            url: '/mediator_follow_details/:mid/:pid',
            templateUrl: 'views/admin.mediator.mediatorfollow',
            controller: 'MediatorFollowDetailsController',
            title :'mediator_follow_details'
        })
})

.controller('MediatorAssignController', function($filter, $rootScope,$scope, MEDIATOR, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES , Pagination){
    $scope.pagination = MEDIATOR.pagination;
    var page = MEDIATOR.pagination.page;
    $scope.mediator_assign_form = {};

    $scope.isDisabledMediStatus = true;
    $scope.isDisabledMediAccess = true;


    // $http({ url: 'mediator', method: 'GET'}).success(function (result) {               
    //      $scope.mediator = result.data;
    // });

    $http({ url: 'abo', method: 'GET'}).success(function (result) {               
         $scope.abo = result.data;
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

                $http({ url: 'mediator_assign', method: 'GET',params:$scope.pagination}).success(function (result) {               
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

                $http({ url: 'mediator_assign', method: 'GET',params:$scope.pagination}).success(function (result) {               
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
        $scope.mediator_assign_form.Abo = {AboId:$scope.mediator_assign_form.AboId,AboName:$scope.mediator_assign_form.AboName};
        $scope.mediator_assign_form.assign = {PropertyId:$scope.mediator_assign_form.PropertyId};
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
        $scope.mediator_assign_form.PropertyId = $scope.mediator_assign_form.assign.PropertyId; 
        $scope.mediator_assign_form.PropertyName = $scope.mediator_assign_form.assign.PropertyName;  
        $scope.mediator_assign_form.AboAssignedId = $scope.mediator_assign_form.assign.AboAssignedId;  

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

    $scope.aboDataChange = function(data)
    {  
        $http({ url: 'abo_assigned_values/'+data, method: 'GET'}).success(function (result) {               
           $scope.aboassign = result.abo;
           $scope.mediator = result.mediator;
           // console.log($scope.data);
        });
    }

 
    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }

    $scope.getTable(page,$scope.form);
})

.controller('MediatorFollowController', function($window, $location, $filter, Pagination, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, $stateParams , Storage){
    var pid = $stateParams.pid;
    var mid = $stateParams.mid;
    $scope.status = Storage.data.status;

    $scope.mediator_follow_form = {};
    $scope.mediator_buyer_form = {};
    $scope.property_form = {};
    $scope.status_form = {};
    $scope.isDisabledStatus = false;
    $scope.isDisabledMediStatus = false;
    $scope.isDisabledMediAccess = false;


    $http({ url: 'mediator_follow/'+mid+'/'+pid, method: 'GET'}).success(function(data)
    { 
         $scope.mediator_follow_form = data.mediator;
         $scope.mediator_buyer_form = data.mediator;
         $scope.status_form = data.mediator;
         $scope.role = data.role;
         $scope.days = data.days;
         // console.log($scope.role);
         if($scope.role === 4 && $scope.status_form.MediatorAssignAccess === 'no'){
            $scope.isDisabledStatus = true;
         }
        
         $scope.property_form = data.property;
    });

    $http({ url: 'mediator_follow_get/'+mid+'/'+pid, method: 'GET'}).success(function (result) {               
         $scope.mediator_follow = result;
    });

    $http({ url: 'mediator_buyer_get/'+mid+'/'+pid, method: 'GET'}).success(function (result) {               
         $scope.mediator_buyer = result.person;
    });
    
    $scope.new = function()
    {
        $scope.formType = 'NEW';
        $scope.mediator_follow_form.MediatorFollowDate = moment(new Date()).format('YYYY-MM-DD 00:00:00');
        $('#mediator_follow_form').modal();
    }

    $scope.edit = function(ind,follow)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.mediator_follow_form = angular.copy(follow);
        $('#mediator_follow_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.mediator_follow_form.MediatorFollowId)? updatefollow() : addfollow();
    }

    function addfollow()
    {        
        // console.log($scope.mediator_follow_form);
        $http({ url: 'mediator_follow', method: 'POST',data:$scope.mediator_follow_form}).success(function(data){
            $('#mediator_follow_form').modal('hide');
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
        $http({ url: 'mediator_follow_update/'+$scope.mediator_follow_form.MediatorFollowId, method: 'PUT',data:$scope.mediator_follow_form}).success(function(data){
            $('#mediator_follow_form').modal('hide');
            al('Property Follow Added Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
          al("Follow Not Updated");
        });
    }


    $scope.newperson = function()
    {
        $scope.formType = 'NEW';
        $scope.mediator_buyer_form.MediatorBuyerDate = moment(new Date()).format('YYYY-MM-DD 00:00:00');
        $('#mediator_buyer_form').modal();
    }

    $scope.editperson = function(ind,person)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.mediator_buyer_form = angular.copy(person);
        $('#mediator_buyer_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postPerson = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.mediator_buyer_form.MediatorBuyerId)? updateprson() : addperson();
    }

    function addperson()
    {      
        $http({ url: 'mediator_buyer', method: 'POST',data:$scope.mediator_buyer_form}).success(function(data){
            $('#mediator_buyer_form').modal('hide');
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
        $http({ url: 'mediator_buyer_update/'+$scope.mediator_buyer_form.MediatorBuyerId, method: 'PUT',data:$scope.mediator_buyer_form}).success(function(data){
            $('#mediator_buyer_form').modal('hide');
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

        $http({ url: 'assign_status_update/'+$scope.status_form.MediatorAssignId, method: 'PUT',data:$scope.status_form}).success(function(data){
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


.controller('MediatorFollowDetailsController', function($window, $location, $filter, Pagination, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, $stateParams , Storage){
    var pid = $stateParams.pid;
    var mid = $stateParams.mid;
    $scope.status = Storage.data.status;

    $scope.mediator_follow_form = {};
    $scope.mediator_buyer_form = {};
    $scope.property_form = {};
    $scope.status_form = {};
    $scope.isDisabledStatus = false;

    $http({ url: 'mediator_follow/'+mid+'/'+pid, method: 'GET'}).success(function(data)
    { 
         $scope.mediator_follow_form = data.mediator;
         $scope.mediator_buyer_form = data.mediator;
         $scope.status_form = data.mediator;
         $scope.role = data.role;
         $scope.days = data.days;
         // console.log($scope.role);
         if($scope.role === 4){
            $scope.isDisabledStatus = true;
         }
        
         $scope.property_form = data.property;
    });

    $http({ url: 'mediator_follow_get/'+mid+'/'+pid, method: 'GET'}).success(function (result) {               
         $scope.mediator_follow = result;
    });

    $http({ url: 'mediator_buyer_get/'+mid+'/'+pid, method: 'GET'}).success(function (result) {               
         $scope.mediator_buyer = result.person;
    });
    

    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }
})
