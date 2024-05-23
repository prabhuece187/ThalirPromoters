app.constant('PROMOTER')
app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('image', {
            url: '/promoterimage',
            templateUrl: 'views/admin.promoters.pro_image',
            controller: 'PromoterImageController',
            title :'image'
        });
})

.controller('PromoterImageController', function($filter, $rootScope,$scope, PROMOTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES , Storage){

    $scope.proimg_form = {}; 
    $scope.isDisabled = false;

    $http({ url: 'promoterget', method: 'GET'}).success(function (result) {               
         $scope.promoter = result;
    });

    $http({ url: 'promoterimage', method: 'GET'}) .success(function (result) {
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


    $scope.new = function()
    {
        $scope.formType = 'NEW';
        $scope.proimg_form = {};
        $('#proimg_form').modal();
    }

    $scope.edit = function(ind,image)
    {
        index = ind;
        $scope.formType = 'EDIT';     
        $scope.proimg_form = angular.copy(image);
        $scope.proimg_form.Promoter = {ProSiteId:image.ProSiteId,PromoterName:image.PromoterName,ProTypeName:image.ProTypeName};
        $scope.proimg_form.ProGalleryImage1 = "/uploads/promoter/gallery/"+image.ProGalleryImage1;
        $scope.proimg_form.ProGalleryImage2 = "/uploads/promoter/gallery/"+image.ProGalleryImage2;
        $scope.proimg_form.ProGalleryImage3 = "/uploads/promoter/gallery/"+image.ProGalleryImage3;
        $scope.proimg_form.ProGalleryImage4 = "/uploads/promoter/gallery/"+image.ProGalleryImage4;
        $scope.proimg_form.ProGalleryImage5 = "/uploads/promoter/gallery/"+image.ProGalleryImage5;
        $scope.proimg_form.ProGalleryImage6 = image.ProGalleryImage1;
        $scope.proimg_form.ProGalleryImage7 = image.ProGalleryImage2;
        $scope.proimg_form.ProGalleryImage8 = image.ProGalleryImage3;
        $scope.proimg_form.ProGalleryImage9 = image.ProGalleryImage4;
        $scope.proimg_form.ProGalleryImage10 = image.ProGalleryImage5;
        $scope.proimg_form.ProGalleryVideo1 = image.ProGalleryVideo;

        $('#proimg_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {    
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.proimg_form.ProGalleryId)? update() : add();
    }

    function add()
    { 
        var proimage = new FormData();

        proimage.append("ProSiteId",$scope.proimg_form.Promoter.ProSiteId);
        proimage.append("ProTypeName",$scope.proimg_form.Promoter.ProTypeName);
        proimage.append("PromoterName",$scope.proimg_form.Promoter.PromoterName);
        proimage.append("ProGalleryImage1",$scope.proimg_form.ProGalleryImage1);
        proimage.append("ProGalleryImage2",$scope.proimg_form.ProGalleryImage2);
        proimage.append("ProGalleryImage3",$scope.proimg_form.ProGalleryImage3);
        proimage.append("ProGalleryImage4",$scope.proimg_form.ProGalleryImage4);
        proimage.append("ProGalleryImage5",$scope.proimg_form.ProGalleryImage5);
        proimage.append("ProGalleryVideo",$scope.proimg_form.ProGalleryVideo);
        proimage.append("ProLocation",$scope.proimg_form.ProLocation);
      
     
        $http({ url: 'promoterimage', method: 'POST',data:proimage,headers: { 'Content-Type' : undefined}}).success(function(data){
            $('#proimg_form').modal('hide');
            al('Image Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Image Not Created");
        });
    }

    function update()
    {
        var proimage = new FormData();

        proimage.append("ProSiteId",$scope.proimg_form.Promoter.ProSiteId);
        proimage.append("ProTypeName",$scope.proimg_form.Promoter.ProTypeName);
        proimage.append("PromoterName",$scope.proimg_form.Promoter.PromoterName);
        proimage.append("ProGalleryImage1",$scope.proimg_form.ProGalleryImage1);
        proimage.append("ProGalleryImage2",$scope.proimg_form.ProGalleryImage2);
        proimage.append("ProGalleryImage3",$scope.proimg_form.ProGalleryImage3);
        proimage.append("ProGalleryImage4",$scope.proimg_form.ProGalleryImage4);
        proimage.append("ProGalleryImage5",$scope.proimg_form.ProGalleryImage5);
        proimage.append("ProGalleryImage6",$scope.proimg_form.ProGalleryImage6);
        proimage.append("ProGalleryImage7",$scope.proimg_form.ProGalleryImage7);
        proimage.append("ProGalleryImage8",$scope.proimg_form.ProGalleryImage8);
        proimage.append("ProGalleryImage9",$scope.proimg_form.ProGalleryImage9);
        proimage.append("ProGalleryImage10",$scope.proimg_form.ProGalleryImage10);
        proimage.append("ProGalleryVideo",$scope.proimg_form.ProGalleryVideo);
        proimage.append("ProGalleryVideo1",$scope.proimg_form.ProGalleryVideo1);
        proimage.append("ProLocation",$scope.proimg_form.ProLocation);
      
 
        $http({ url: 'galleryimageupdate/'+$scope.proimg_form.ProGalleryId, method: 'POST',data:proimage,headers: { 'Content-Type' : undefined}}).success(function(data){
            $('#proimg_form').modal('hide');
            al('Gallery Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Gallery Not Updated");
        });
    }

    $scope.delete = function(ind,customer,ev)
    {    
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Customer?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {     
            $http({ url: 'customer/'+customer.CustomerId, method: 'DELETE'}).success(function(data){
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
})

app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('site', {
            url: '/promotersite',
            templateUrl: 'views/admin.promoters.pro_site',
            controller: 'PromoterSiteController',
            title :'site'
        })
         .state('sitedetail', {
            url: '/promotersitedetail/:id',
            templateUrl: 'views/admin.promoters.pro_sitedetail',
            controller: 'PromoterSiteDetailController',
            title :'sitedetail'
        })
         .state('promotercomment', {
            url: '/buyercommentpromoterget/:id',
            templateUrl: 'views/admin.promoters.promotercomment',
            controller: 'PromoterCommentController',
            title :'promotercomment'
        })
        //  .state('sitefollow', {
        //     url: '/promotersitefollow/:id',
        //     templateUrl: 'views/admin.promoters.pro_sitefollow',
        //     controller: 'PromoterSiteFollowController',
        //     title :'sitefollow'
        // });
})

.controller('PromoterSiteController', function($filter, $rootScope,$scope, PROMOTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES ,Storage){
    $scope.promotertype = Storage.data.promotertype; 


    $scope.states = STATES;
    $scope.form = {};

    // $http({ url: 'comtype', method: 'GET'}).success(function (result) {   
    //     $scope.comtype = result;
    // });

    $http({ url: 'area', method: 'GET'}).success(function(data){
        $scope.area = data;    
    });
  
    $scope.getTable = function(page)
    {
        $http({ url: 'sitemap', method: 'GET'}).success(function (result) {               
            $scope.sitedata = result;

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
        $scope.prosite_form = {};
        $('#prosite_form').modal();
    }

    var sitemap = new FormData();

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
            sitemap.append('file[]',file);
        })
    }


    $scope.edit = function(ind,site)
    {
        $scope.imagesrc = [];
        var image = {};
        
        $http({ url: 'promoterimageget/'+site.ProSiteId, method: 'GET'}) .success(function (result) {
            $scope.leng = result;
            angular.forEach($scope.leng, function(value) {
                value.Src = "/uploads/promoter/gallery/"+value.ProGalleryImage;
                $scope.imagesrc.push(value);
            })
        });

        index = ind;
        $scope.formType = 'EDIT';
        $scope.prosite_form = angular.copy(site);
        $scope.prosite_form.Area = {AreaId:$scope.prosite_form.AreaId,AreaName:$scope.prosite_form.AreaName};
        $scope.prosite_form.SiteMap = "/uploads/promoter/sitemap/"+site.SiteMap;
        $scope.prosite_form.SiteMap1 = site.SiteMap;
        $scope.prosite_form.ProGalleryVideo1 = site.ProGalleryVideo;

        $('#prosite_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.prosite_form.ProSiteId)? update() : add();
    }

    function add()
    { 
        sitemap.append("SiteMap",$scope.prosite_form.SiteMap);
        sitemap.append("ProTypeName",$scope.prosite_form.ProTypeName);
        sitemap.append("PromoterName",$scope.prosite_form.PromoterName);
        sitemap.append("FlatCount",$scope.prosite_form.FlatCount);
        sitemap.append("Budjet",$scope.prosite_form.Budjet);
        sitemap.append("ProArea",$scope.prosite_form.ProArea);
        sitemap.append("ProAddress",$scope.prosite_form.ProAddress);
        sitemap.append("ProPincode",$scope.prosite_form.ProPincode);
        sitemap.append("ProCity",$scope.prosite_form.ProCity);
        sitemap.append("ProStreet",$scope.prosite_form.ProStreet);
        sitemap.append("ProGalleryVideo",$scope.prosite_form.ProGalleryVideo);
        sitemap.append("ProLocation",$scope.prosite_form.ProLocation);
        sitemap.append("AreaName",$scope.prosite_form.Area.AreaName);
        sitemap.append("AreaId",$scope.prosite_form.Area.AreaId);
        sitemap.append("ProMinVal",$scope.prosite_form.ProMinVal);
        sitemap.append("ProMinType",$scope.prosite_form.ProMinType);
        sitemap.append("ProMaxVal",$scope.prosite_form.ProMaxVal);
        sitemap.append("ProMaxType",$scope.prosite_form.ProMaxType);
        sitemap.append("ProDistance",$scope.prosite_form.ProDistance);
        sitemap.append("ProUnit",$scope.prosite_form.ProUnit);

        $http({ url: 'sitemap', method: 'POST',data:sitemap,headers: { 'Content-Type' : undefined}}).success(function(data){
            $('#prosite_form').modal('hide');
            al('Site Created Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Site Not Created");
        });
    }

    function update()
    {  
        sitemap.append("SiteMap",$scope.prosite_form.SiteMap);
        sitemap.append("SiteMap1",$scope.prosite_form.SiteMap1);
        sitemap.append("ProTypeName",$scope.prosite_form.ProTypeName);
        sitemap.append("PromoterName",$scope.prosite_form.PromoterName);
        sitemap.append("FlatCount",$scope.prosite_form.FlatCount);
        sitemap.append("Budjet",$scope.prosite_form.Budjet);
        sitemap.append("ProArea",$scope.prosite_form.ProArea);
        sitemap.append("ProAddress",$scope.prosite_form.ProAddress);
        sitemap.append("ProPincode",$scope.prosite_form.ProPincode);
        sitemap.append("ProCity",$scope.prosite_form.ProCity);
        sitemap.append("ProStreet",$scope.prosite_form.ProStreet);
        sitemap.append("ProGalleryVideo",$scope.prosite_form.ProGalleryVideo);
        sitemap.append("ProGalleryVideo1",$scope.prosite_form.ProGalleryVideo1);
        sitemap.append("ProLocation",$scope.prosite_form.ProLocation);
        sitemap.append("AreaName",$scope.prosite_form.Area.AreaName);
        sitemap.append("AreaId",$scope.prosite_form.Area.AreaId);
        sitemap.append("ProMinVal",$scope.prosite_form.ProMinVal);
        sitemap.append("ProMinType",$scope.prosite_form.ProMinType);
        sitemap.append("ProMaxVal",$scope.prosite_form.ProMaxVal);
        sitemap.append("ProMaxType",$scope.prosite_form.ProMaxType);
        sitemap.append("ProDistance",$scope.prosite_form.ProDistance);
        sitemap.append("ProUnit",$scope.prosite_form.ProUnit);
        
        $http({ url: 'sitemapupdate/'+$scope.prosite_form.ProSiteId, method: 'POST',data:sitemap,headers: { 'Content-Type' : undefined}}).success(function(data){
            $('#prosite_form').modal('hide');
            al('Site Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.formError = data;
            $scope.isDisabled = false;
            al("Site Not Updated");
        });
    }

    $scope.delete = function(ind,customer,ev)
    {    
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Site?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {     
            $http({ url: 'customer/'+customer.CustomerId, method: 'DELETE'}).success(function(data){
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

        $http({ url: 'promoterstatusupdate/'+$scope.status_form.id, method: 'PUT',data:$scope.status_form}).success(function(data){
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

    $scope.getTable();
})

.controller('PromoterSiteDetailController', function($filter, $rootScope,$scope, PROMOTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES, $stateParams, Storage){
    var id = $stateParams.id;
    $scope.status = Storage.data.propertystatus;
    $scope.unit = Storage.data.unit;
    $scope.face = Storage.data.face;
    $scope.site_detail = {};

    $scope.getTable = function(page)
    {
        $http({ url: 'sitemapdetail/'+id, method: 'GET'}).success(function (result) {               
            $scope.sitedetail = result;
            $scope.site = $scope.sitedetail.detail;
        });       
    }


    $scope.edit = function(ind,site)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.site_detail = angular.copy(site);
        // $scope.site_detail.PromoterWell = true;
        $('#site_detail').modal();
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
       
        $http({ url: 'sitestatus/'+$scope.site_detail.ProSiteStatusId, method: 'PUT',data:$scope.site_detail}).success(function(data){
            $('#site_detail').modal('hide');
            al('Status Updated Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
            $scope.isDisabled = false;
            al("Status Not Updated");
        });
    }

    $scope.delete = function(ind,customer,ev)
    {    
        var confirm = $mdDialog.confirm({targetEvent:ev})
            .title('Are You Sure To Delete This Status?')
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(confirm).then(function() {     
            $http({ url: 'customer/'+customer.CustomerId, method: 'DELETE'}).success(function(data){
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

.controller('PromoterCommentController', function($window, $location, $filter, Pagination, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, $stateParams , Storage){
    var id = $stateParams.id;
    $scope.status = Storage.data.followstatus;

    $scope.comment_form = {};
    $scope.form = {};

    $http({ url: 'buyercommentpromoterget/'+id, method: 'GET'}).success(function(data)
    { 
        $scope.form = data;
    });

    $scope.change = function(ind,comment)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.comment_form = angular.copy(comment);
        $('#comment_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postStatus = function()
    {
        $scope.isDisabled = true;
        $http({ url: 'buyerstatusupdate/'+$scope.comment_form.BuyerCommentId, method: 'PUT',data:$scope.comment_form}).success(function(data){
            $('#comment_form').modal('hide');
            al('Property Comment Added Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
          al("Comment Not Updated");
        });
    }   


    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }
})


// .controller('PromoterSiteFollowController', function($filter, $rootScope,$scope, PROMOTER, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, $location, STATES, $stateParams, Storage){

// })