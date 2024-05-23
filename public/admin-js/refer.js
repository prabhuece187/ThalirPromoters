app.constant('REFER',{data:[],pagination:{page: 1, count: 50, sorting: {ReferId: 'desc'}} })
app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('refer', {
            url: '/refer',
            templateUrl: 'views/admin.refer.index',
            controller: 'ReferController',
            title :'site'
        });
})

.controller('ReferController', function($filter, $rootScope,$scope,Pagination, REFER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES ,Storage){
    $scope.promotertype = Storage.data.promotertype; 
    $scope.pagination = REFER.pagination;
    var page = REFER.pagination.page;

    $scope.states = STATES;
    $scope.refer_form = {};

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

            $http({ url: 'refer', method: 'GET',params:$scope.pagination}) .success(function (result) {              
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

             $http({ url: 'refer', method: 'GET',params:$scope.pagination}) .success(function (result) {             
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
        $scope.refer_form = {};
        $scope.refer_form.ReferDate = moment(new Date()).format('YYYY-MM-DD');
        $scope.refer_form.ReferStatus = "Pending";
        $('#refer_form').modal();
    }

    var refer = new FormData();

    $scope.getTheFiles = function($files) {
        $scope.imagesrc = [];

        for(var i = 0; i < $files.length; i++) {
            var reader = new FileReader();
            reader.fileName = $files[i].name;

            reader.onload = function (event) {
                var image = {};
                image.Name = event.target.fileName;
                image.Size = (event.total / 1024).toFixed(2);
                image.Src = event.target.result;
                $scope.imagesrc.push(image);
                $scope.$apply();
            }

            reader.readAsDataURL($files[i]);
        }

        angular.forEach($files, function(file) {
            refer.append('file[]',file);
        })
    }


    $scope.edit = function(ind,ref)
    {
        $scope.imagesrc = [];
        var image = {};
        
        $http({ url: 'referimageget/'+ref.ReferId, method: 'GET'}) .success(function (result) {
            $scope.leng = result;
            angular.forEach($scope.leng, function(value) {
                value.Src = "/uploads/refer/gallery/"+value.ReferGalleryImage;
                $scope.imagesrc.push(value);
            })
        });

        index = ind;
        $scope.formType = 'EDIT';
        $scope.refer_form = angular.copy(ref);
        $scope.refer_form.Area = {AreaId:$scope.refer_form.AreaId,AreaName:$scope.refer_form.AreaName};
        $scope.refer_form.ReferVideo1 = ref.ReferVideo;

        $('#refer_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.refer_form.ReferId)? update() : add();
    }

    function add()
    { 
        refer.append("ReferDate",$scope.refer_form.ReferDate);
        refer.append("ReferLead",$scope.refer_form.ReferLead);
        refer.append("ReferStatus",$scope.refer_form.ReferStatus);
        refer.append("ReferFor",$scope.refer_form.ReferFor);
        refer.append("ReferType",$scope.refer_form.ReferType);
        refer.append("ReferSize",$scope.refer_form.ReferSize);
        refer.append("ReferFacing",$scope.refer_form.ReferFacing);
        refer.append("ReferVal",$scope.refer_form.ReferVal);
        refer.append("ReferFullDetails",$scope.refer_form.ReferFullDetails);
        refer.append("ReferName",$scope.refer_form.ReferName);
        refer.append("ReferVideo",$scope.refer_form.ReferVideo);
        refer.append("ReferNumber",$scope.refer_form.ReferNumber);
        refer.append("AreaName",$scope.refer_form.Area.AreaName);
        refer.append("AreaId",$scope.refer_form.Area.AreaId);

        $http({ url: 'refer', method: 'POST',data:refer,headers: { 'Content-Type' : undefined}}).success(function(data){
            $('#refer_form').modal('hide');
            al('Reference Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Reference Not Created");
        });
    }

    function update()
    {  
        refer.append("ReferDate",$scope.refer_form.ReferDate);
        refer.append("ReferLead",$scope.refer_form.ReferLead);
        refer.append("ReferStatus",$scope.refer_form.ReferStatus);
        refer.append("ReferFor",$scope.refer_form.ReferFor);
        refer.append("ReferType",$scope.refer_form.ReferType);
        refer.append("ReferSize",$scope.refer_form.ReferSize);
        refer.append("ReferFacing",$scope.refer_form.ReferFacing);
        refer.append("ReferVal",$scope.refer_form.ReferVal);
        refer.append("ReferFullDetails",$scope.refer_form.ReferFullDetails);
        refer.append("ReferName",$scope.refer_form.ReferName);
        refer.append("ReferVideo",$scope.refer_form.ReferVideo);
        refer.append("ReferNumber",$scope.refer_form.ReferNumber);
        refer.append("AreaName",$scope.refer_form.Area.AreaName);
        refer.append("AreaId",$scope.refer_form.Area.AreaId);
        
        $http({ url: 'referupdate/'+$scope.refer_form.ReferId, method: 'POST',data:refer,headers: { 'Content-Type' : undefined}}).success(function(data){
            $('#refer_form').modal('hide');
            al('Reference Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Reference Not Updated");
        });
    }

    $scope.delete = function(ind,ref,ev)
    {    
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Reference?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {     
            $http({ url: 'referdelete/'+ref.ReferId, method: 'DELETE'}).success(function(data){
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

        $http({ url: 'referstatusupdate/'+$scope.status_form.id, method: 'PUT',data:$scope.status_form}).success(function(data){
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