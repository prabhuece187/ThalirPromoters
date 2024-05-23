app.constant('SELLER',{data:[],pagination:{page: 1, count: 50, sorting: {PropertyId: 'desc'}} })
app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('property', {
            url: '/property',
            templateUrl: 'views/admin.seller.property',
            controller: 'PropertyController',
            title :'property'
        })
        .state('newproperty', {
            url: '/newproperty',
            templateUrl: 'views/admin.seller.newproperty',
            controller: 'PropertyNewController',
            title :'newproperty'
        })
         .state('editproperty', {
            url: '/editproperty/:id',
            templateUrl: 'views/admin.seller.newproperty',
            controller: 'PropertyNewController',
            title :'editproperty'
        })
          .state('followproperty', {
            url: '/followproperty/:id',
            templateUrl: 'views/admin.seller.followproperty',
            controller: 'PropertyFollowController',
            title :'followproperty'
        })
          .state('propertycomment', {
            url: '/buyercommentpropertyget/:id',
            templateUrl: 'views/admin.seller.sellercomment',
            controller: 'PropertyCommentController',
            title :'propertycomment'
        })
          .state('propertydocumentget', {
            url: '/propertydocumentget/:id',
            templateUrl: 'views/admin.seller.propertydocument',
            controller: 'PropertyDocumentController',
            title :'propertydocumentget'
        });
})

.controller('PropertyController', function($window, $location, $filter, SELLER, Excel,Pagination, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES){

    $scope.pagination = SELLER.pagination;
    var page = SELLER.pagination.page;
    $scope.isDisabledStatus = false;

    $http({ url: 'area', method: 'GET'}).success(function (result) {               
        $scope.area = result;
    });

    $http({ url: 'type', method: 'GET'}).success(function (result) {               
        $scope.type = result;
    });

    $http({ url: 'need', method: 'GET'}).success(function (result) {               
        $scope.need = result;
    });

    $scope.form = {Area:'',PropertyId:'',PropertyName:'',PropertyRegNo:'',MinAmount:'',MaxAmount:'',ReachUs:'',Sold:'false',Type:'',Need:''};
    // $http({ url: 'property', method: 'GET'}) .success(function (result) {
    //     $scope.data = result.data;
    //     $scope.role = result.role;
    //     angular.element(document).ready( function () {
    //        $('#table_id').DataTable({
    //        dom: 'lBfrtip',
    //         "order": [[0,"desc" ]],
    //        buttons: [ 'excel' ],
    //        responsive: true,
    //        columnDefs: [
    //                 { responsivePriority: 1, targets: 0 },
    //                 { responsivePriority: 2, targets: -1 }
    //             ]
    //        });
    //     });
    // });

    $scope.getExcel = function()
    {
        var filename = 'property_list.xls';
        var exportHref=Excel.tableToExcel("#table_id", 'Report');
        var link = document.createElement('a');
        link.download = filename;
        link.href = exportHref;
        link.click();
    }



    $scope.getTable = function(page,form)
    {
        // var page2 = page2||null;


        if((form.Area == undefined || form.Area == "") && (form.PropertyId == undefined || form.PropertyId == "") 
           && (form.Type == undefined || form.Type == "") && (form.ReachUs == undefined || form.ReachUs == "")
           && (form.MinAmount == undefined || form.MinAmount == "") && (form.Sold == undefined || form.Sold == "" || form.Sold == false) 
           && (form.MaxAmount == undefined || form.MaxAmount == "") && (form.PropertyRegNo == undefined || form.PropertyRegNo == "")
           && (form.Need == undefined || form.Need == ""))
        {
            $scope.paginat  = page;
            $scope.pagination.searchdata = "nosearch"; 

            if($scope.paginat  != 0 || $scope.paginat  == "undefined")
            {
              $scope.pagination.page = page; 
            }

            $http({ url: 'property', method: 'GET',params:$scope.pagination}).success(function (result) {              
                $scope.data = result.data;
                $scope.role = result.role;
                $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
                $scope.pages = $scope.pagevalue.pages;
                $scope.page2 = form;
            });
        }
        else
        {
            $scope.pagination.page = page; 
            $scope.pagination.searchdata = "search"; 
            $scope.pagination.propertyid = form.PropertyId; 
            // $scope.pagination.propertyname = form.PropertyName; 
            $scope.pagination.propertyreg = form.PropertyRegNo; 
            $scope.pagination.reachus = form.ReachUs; 
            $scope.pagination.MinAmount = form.MinAmount; 
            $scope.pagination.MaxAmount = form.MaxAmount; 
            if(form.Area != null){
              $scope.pagination.Area = form.Area.AreaId; 
            }
            if(form.Type != null){
              $scope.pagination.Type = form.Type.TypeId; 
            }
            if(form.Need != null){
              $scope.pagination.Need = form.Need.NeedId; 
            }
            if(form.Sold == true){
              $scope.pagination.Sold = "sold"; 
            }else{
              $scope.pagination.Sold = "unsold"; 
            }

            $http({ url: 'property', method: 'GET',params:$scope.pagination}).success(function (result) {             
                $scope.data = result.data;
                $scope.role = result.role;
                $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
                $scope.pages = $scope.pagevalue.pages;
                $scope.page2 = form;
            });

        }

        // if(page2 === null)
        // {
        //     $scope.paginat  = page;
        //     $scope.pagination.searchdata = page2; 

        //     if($scope.paginat  != 0 || $scope.paginat  == "undefined")
        //     {
        //       $scope.pagination.page = page; 
        //     }

        //     $http({ url: 'property', method: 'GET',params:$scope.pagination}).success(function (result) {              
        //         $scope.data = result.data;
        //         $scope.role = result.role;
        //         $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
        //         $scope.pages = $scope.pagevalue.pages;
        //         $scope.page2 = page2;
        //     });
        // }
        // else
        // {
        //     $scope.pagination.page = page; 
        //     $scope.pagination.searchdata = page2; 

        //     $http({ url: 'property', method: 'GET',params:$scope.pagination}).success(function (result) {             
        //         $scope.data = result.data;
        //         $scope.role = result.role;
        //         $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
        //         $scope.pages = $scope.pagevalue.pages;
        //         $scope.page2 = page2;
        //     });

        // }

    }

    $(".table-responsive-scrollbar-top").scroll(function(){
        $(".table-responsive")
            .scrollLeft($(".table-responsive-scrollbar-top").scrollLeft());
            console.log("run");
    });

    $scope.showStatus = function(ind,value)
    {
        index = ind;
        $scope.showstatus_form = angular.copy(value);
        $('#showstatus_form').modal();
    }

    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }

    $scope.getPropretySearch = function(page,datas)
    { 
         $scope.pagination.page = page; 
         $scope.pagination.propertyid = datas.PropertyId; 
         $scope.pagination.propertyname = datas.PropertyName; 
         $scope.pagination.propertyreg = datas.PropertyRegNo; 
         $scope.pagination.MinAmount = datas.MinAmount; 
         $scope.pagination.MaxAmount = datas.MaxAmount; 
         if(datas.Area != null){
          $scope.pagination.Area = datas.Area.AreaId; 
         }

         $http({ url: 'propertysearch', method: 'GET',params:$scope.pagination}).success(function (result) {             
            $scope.data = result.data;
            $scope.role = result.role;
            $scope.pagevalue = Pagination(result.total, $scope.pagination.count,page);
            $scope.pages = $scope.pagevalue.pages;
            // $scope.page2 = page2;
        });

    }

     $scope.getTable(page,$scope.form);

})

.controller('PropertyNewController', function($window, $location, $filter, Pagination, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, $stateParams , Storage){
    var id = $stateParams.id;
    // var val = $stateParams.data;
    // var val1 = $stateParams.data1;
    $scope.isDisabled = false;

    $scope.unit = Storage.data.unit; 
    $scope.waterval = Storage.data.water; 
    $scope.ebval = Storage.data.eb; 
    $scope.eb = Storage.data.eb; 
    $scope.const = Storage.data.const_status; 

    $scope.property_form = {
        PropertyDate: moment(new Date()).format('YYYY-MM-DD 00:00:00'),
        water:[],
        eb:[],
        Type:{TypeId:'26',TypeName:'மற்றவை'},
        Roof:{RoofId:'15',RoofName:'மற்றவை'},
        Road:{RoadId:'12',RoadName:'மற்றவை'},
        Area:{AreaId:'27',AreaName:'மற்றவை'},
        Purpose:{PurposeId:'17',PurposeName:'மற்றவை'},
        Floor:{FloorId:'16',FloorName:'மற்றவை'},
    };

    $http({ url: 'rolevalueget', method: 'GET'}).success(function(data){
        $scope.role = data;  
    });

    $http({ url: 'type', method: 'GET'}).success(function(data){
        $scope.type = data;    
    });


    $http({ url: 'need', method: 'GET'}).success(function (result) {               
        $scope.need = result;
    });

    $http({ url: 'roof', method: 'GET'}).success(function (result) {               
        $scope.roof = result;
    });

    $http({ url: 'knowus', method: 'GET'}).success(function (result) {               
        $scope.knowus = result;
    });

    $http({ url: 'floor', method: 'GET'}).success(function(data){
        $scope.floor = data;    
    });

    $http({ url: 'area', method: 'GET'}).success(function(data){
        $scope.area = data;    
    });

    $http({ url: 'purpose', method: 'GET'}).success(function(data){
        $scope.purpose = data;    
    });

    $http({ url: 'road', method: 'GET'}).success(function(data){
        $scope.road = data;    
    });

    var sellerimage = new FormData();

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
            sellerimage.append('file[]',file);
        })
    }

     $scope.getTheDocments = function($documents) {
        $scope.documentsrc = [];

        for(var i = 0; i < $documents.length; i++) {
            var reader = new FileReader();
            reader.fileName = $documents[i].name;

            reader.onload = function (event) {
                var docs = {};
                docs.Name = event.target.fileName;
                docs.Size = (event.total / 1024).toFixed(2);
                docs.Src = event.target.result;
                $scope.documentsrc.push(docs);
                $scope.$apply();
            }

            reader.readAsDataURL($documents[i]);
        }

        angular.forEach($documents, function(docs) {
            sellerimage.append('document[]',docs);
        })
    }



    $scope.totalfind = function()
    {
        $scope.property_form.PropertyLandTotal = $scope.property_form.PropertyWidth * $scope.property_form.PropertyBreath;
    }


    $scope.add_new_water = function()
    {
        $scope.property_form.water.push({PropertyWaterSource:null})
    }

    $scope.add_new_water();

    $scope.remove_water = function(index)
    {
        $scope.property_form.water.splice(index,1);
    }

     $scope.add_new_eb = function()
    {
        $scope.property_form.eb.push({PropertyEbStatus:null})
    }

    $scope.add_new_eb();

    $scope.remove_eb = function(index)
    {
        $scope.property_form.eb.splice(index,1);
    }


    if(id)
    {
       $scope.formType = 'EDIT';
       $scope.imagesrc = [];
       var image = {};
    

       $http({ url: 'propertyedit/'+id, method: 'GET'}).success(function(data)
       {  
            $scope.temp = data;
            $scope.leng = data.gallery;
            angular.forEach($scope.leng, function(value) {
                value.Src = "/uploads/property/gallery/"+value.PropertyGalleryImage;
                $scope.imagesrc.push(value);
            })
            
            $scope.property_form = $scope.temp;            
            $scope.property_form.PropertyGalleryVideo1 = $scope.property_form.PropertyGalleryVideo||null;
            $scope.inform = data.amenities;    
            $scope.property_form.Type = {TypeId:$scope.property_form.TypeId,TypeName:$scope.property_form.TypeName};     
            $scope.property_form.Area = {AreaId:$scope.property_form.AreaId,AreaName:$scope.property_form.AreaName};     
            $scope.property_form.Need = {NeedId:$scope.property_form.NeedId,NeedName:$scope.property_form.NeedName};     
            $scope.property_form.Floor = {FloorId:$scope.property_form.FloorId,FloorName:$scope.property_form.FloorName};     
            $scope.property_form.Purpose = {PurposeId:$scope.property_form.PurposeId,PurposeName:$scope.property_form.PurposeName};     
            $scope.property_form.Knowus = {KnowusId:$scope.property_form.KnowusId,KnowusName:$scope.property_form.KnowusName};     
            $scope.property_form.Roof = {RoofId:$scope.property_form.RoofId,RoofName:$scope.property_form.RoofName};     
            $scope.property_form.Road = {RoadId:$scope.property_form.RoadId,RoadName:$scope.property_form.RoadName};     
         
            $scope.indsize = $scope.property_form.PropertyLandSize;
            if($scope.indsize != null){
               $scope.y = $scope.indsize.split(' ');
               $scope.property_form.PropertyLandSize = $scope.y[0];                  
               $scope.property_form.PropertySize = $scope.y[1];   
            }
            
            $scope.property_form.amenities = [];
            
            angular.forEach($scope.inform, function(value){
               value.Specification = {SpecificationId:value.SpecificationId, SpecificationName:value.SpecificationName};
               $scope.property_form.amenities.push(value);
            });  
        });
    }
    else
    {
        $scope.formType = 'NEW';
    }

    $scope.postForm = function(print)
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];             
        (id)? update() : add();
    }    
  
    function add()
    {
        $scope.property_form.TypeId =  $scope.property_form.Type.TypeId;
        $scope.property_form.NeedId =  $scope.property_form.Need.NeedId;
        $scope.property_form.PurposeId =  $scope.property_form.Purpose.PurposeId;
        $scope.property_form.RoofId =  $scope.property_form.Roof.RoofId;
        $scope.property_form.FloorId =  $scope.property_form.Floor.FloorId;
        $scope.property_form.AreaId =  $scope.property_form.Area.AreaId;
        $scope.property_form.RoadId =  $scope.property_form.Road.RoadId;
        $scope.property_form.KnowusId =  $scope.property_form.Knowus.KnowusId;
        $scope.property_form.TypeName =  $scope.property_form.Type.TypeName;
        $scope.property_form.NeedName =  $scope.property_form.Need.NeedName;
        $scope.property_form.PurposeName =  $scope.property_form.Purpose.PurposeName;
        $scope.property_form.RoofName =  $scope.property_form.Roof.RoofName;
        $scope.property_form.FloorName =  $scope.property_form.Floor.FloorName;
        $scope.property_form.AreaName =  $scope.property_form.Area.AreaName;
        $scope.property_form.KnowusName =  $scope.property_form.Knowus.KnowusName;
        $scope.property_form.RoadName =  $scope.property_form.Road.RoadName;
        $scope.property_form.PropertyLandSize = $scope.property_form.PropertyLandSize +" "+$scope.property_form.PropertySize;
        
        $http({ url: 'property', method: 'POST',data:$scope.property_form}).success(function(result){
        var data = result.data;
        var proid = data.PropertyId;
        sellerimage.append("PropertyId",data.PropertyId);
        sellerimage.append("PropertyName",data.PropertyName);
        sellerimage.append("PropertyGalleryVideo",$scope.property_form.PropertyGalleryVideo);
      
        
        $http({ url: 'sellerimage/'+proid, method: 'POST',data:sellerimage,headers: { 'Content-Type' : undefined}}).success(function(data){
           $location.path('/property');
        }).error(function(data){
           $scope.formError = data;
           al("Image Not Created");
        });
          $scope.role = result.role;
          if($scope.role == 2){
              al("PROPERTY ADDED SUCCESSFULLY.. PLEASE WAIT ADMIN APPROVEL");   
              $location.path('/property');
          }
          else{
              al("PROPERTY ADDED SUCCESSFULLY");  
              $location.path('/property'); 
          }
           
        }).error(function(data){
           $scope.formError = data;
           al("PROPERTY NOT UPDATED");
        });
    }

    function update() 
    {
        $scope.property_form.TypeId =  $scope.property_form.Type.TypeId;
        $scope.property_form.NeedId =  $scope.property_form.Need.NeedId;
        $scope.property_form.PurposeId =  $scope.property_form.Purpose.PurposeId;
        $scope.property_form.RoofId =  $scope.property_form.Roof.RoofId;
        $scope.property_form.FloorId =  $scope.property_form.Floor.FloorId;
        $scope.property_form.AreaId =  $scope.property_form.Area.AreaId;
        $scope.property_form.KnowusId =  $scope.property_form.Knowus.KnowusId;
        $scope.property_form.RoadId =  $scope.property_form.Road.RoadId;
        $scope.property_form.TypeName =  $scope.property_form.Type.TypeName;
        $scope.property_form.NeedName =  $scope.property_form.Need.NeedName;
        $scope.property_form.PurposeName =  $scope.property_form.Purpose.PurposeName;
        $scope.property_form.RoofName =  $scope.property_form.Roof.RoofName;
        $scope.property_form.FloorName =  $scope.property_form.Floor.FloorName;
        $scope.property_form.AreaName =  $scope.property_form.Area.AreaName;
        $scope.property_form.KnowusName =  $scope.property_form.Knowus.KnowusName;
        $scope.property_form.RoadName =  $scope.property_form.Road.RoadName;
        $scope.property_form.videovalue =  $scope.property_form.PropertyGalleryVideo1;
        $scope.property_form.PropertyLandSize = $scope.property_form.PropertyLandSize +" "+$scope.property_form.PropertySize;

        $http({ url: 'propertyupdate/'+$scope.property_form.PropertyId, method: 'POST',data:$scope.property_form}).success(function(result){
        sellerimage.append("PropertyId",$scope.property_form.PropertyId);
        sellerimage.append("PropertyName",$scope.property_form.PropertyName);
        sellerimage.append("PropertyGalleryVideo",$scope.property_form.PropertyGalleryVideo);
        sellerimage.append("PropertyGalleryVideo1",$scope.property_form.PropertyGalleryVideo1);
        
        $http({ url: 'sellerimageupdate/'+$scope.property_form.PropertyId, method: 'POST',data:sellerimage,headers: { 'Content-Type' : undefined}}).success(function(data){
            al('Gallery Updated Successfully');
        }).error(function(data){
            $scope.formError = data;
            al("Gallery Not Updated");
        });

          $scope.role = result.role;
          if($scope.role == 2){
              al("PROPERTY UPDATED SUCCESSFULLY.. PLEASE WAIT ADMIN APPROVEL");   
                $location.path('/property');
          }
          else{
              al("PROPERTY UPDATED SUCCESSFULLY");   
                $location.path('/property');
          }
        }).error(function(data){
           $scope.formError = data;
           al("PROPERTY NOT UPDATED");
        });
    }

    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }

})

.controller('PropertyFollowController', function($window, $location, $filter, Pagination, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, $stateParams , Storage){
    var id = $stateParams.id;
    $scope.status = Storage.data.status;

    $scope.follow_form = {};
    $scope.person_form = {};
    $scope.status_form = {};
    $scope.mediator_assign_form = {};
    $scope.mediator_follow_form = {};
    $scope.abo_assign_form = {};

    // $http({ url: 'mediator', method: 'GET'}).success(function (result) {               
    //      $scope.mediator = result.data;
    // });

    $http({ url: 'abo', method: 'GET'}).success(function (result) {               
         $scope.abo = result.data;
    });

    $http({ url: 'propertyfollow/'+id, method: 'GET'}).success(function(data)
    { 
         $scope.follow_form = data;
         $scope.PropertyAmount = $scope.follow_form.PropertyAmount;
         $scope.PropertyAddress = $scope.follow_form.PropertyAddress;
         $scope.abo_assign_form.PropertyId = $scope.follow_form.PropertyId;
         $scope.abo_assign_form.PropertyName = $scope.follow_form.PropertyName;
         $scope.mediator_assign_form.PropertyId = $scope.follow_form.PropertyId;
         $scope.mediator_assign_form.PropertyName = $scope.follow_form.PropertyName;
         $scope.media = data.mediator;
         $scope.mediator_follow_form.PropertyId = $scope.follow_form.PropertyId;
         
    });

    $http({ url: 'propertyfollowget/'+id, method: 'GET'}).success(function (result) {               
         $scope.follow = result;
    });

    $http({ url: 'propertypersonget/'+id, method: 'GET'}).success(function (result) {               
         $scope.person = result.person;
         $scope.person_form.PropertyId = result.property.PropertyId;
         $scope.person_form.PropertyName = result.property.PropertyName;
    });

    $scope.newmediafollow = function()
    {
        $scope.formType = 'NEW';
        $('#mediator_follow_form').modal();
    }
    
    $scope.new = function()
    {
        $scope.formType = 'NEW';
        $scope.follow_form.FollowDate = moment(new Date()).format('YYYY-MM-DD 00:00:00');
        $('#follow_form').modal();
    }

    $scope.edit = function(ind,follow)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.follow_form = angular.copy(follow);
        $('#follow_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postForm = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.follow_form.FollowId)? updatefollow() : addfollow();
    }

    function addfollow()
    {        
        $http({ url: 'propertyfollow', method: 'POST',data:$scope.follow_form}).success(function(data){
            $('#follow_form').modal('hide');
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
        $http({ url: 'propertyfollowupdate/'+$scope.follow_form.FollowId, method: 'PUT',data:$scope.follow_form}).success(function(data){
            $('#follow_form').modal('hide');
            al('Property Follow Added Successfully');
            $state.go($state.current, {}, {reload: true});
        }).error(function(data){
          al("Follow Not Updated");
        });
    }


    $scope.newperson = function()
    {
        $scope.formType = 'NEW';
        $('#person_form').modal();
    }

    $scope.editperson = function(ind,person)
    {
        index = ind;
        $scope.formType = 'EDIT';
        $scope.person_form = angular.copy(person);
        $('#person_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postPerson = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        ($scope.person_form.PersonId)? updateprson() : addperson();
    }

    function addperson()
    {      
        $http({ url: 'propertyperson', method: 'POST',data:$scope.person_form}).success(function(data){
            $('#person_form').modal('hide');
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
        $http({ url: 'propertypersonupdate/'+$scope.person_form.PersonId, method: 'PUT',data:$scope.person_form}).success(function(data){
            $('#person_form').modal('hide');
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

        $http({ url: 'propertystatusupdate/'+id, method: 'PUT',data:$scope.status_form}).success(function(data){
           al('Person Status Updated Successfully');
           $state.go($state.current, {}, {reload: true});
        }).error(function(data){
           al("Person Not Updated");
        });
    }

    $scope.newassign = function()
    {
        $scope.formType = 'NEW';
        $scope.mediator_assign_form.MediatorAssignDate = moment(new Date()).format('YYYY-MM-DD 00:00:00');
        $('#mediator_assign_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postFormAssign = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        addassign();
    }

    function addassign()
    {    
        $scope.mediator_assign_form.MediatorId = $scope.mediator_assign_form.Mediator.MediatorId; 
        $scope.mediator_assign_form.MediatorName = $scope.mediator_assign_form.Mediator.MediatorName; 
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

    $scope.newaboassign = function()
    {
        $scope.formType = 'NEW';
        $scope.abo_assign_form.AboAssignDate = moment(new Date()).format('YYYY-MM-DD 00:00:00');
        $('#abo_assign_form').modal();
    }

    $scope.isDisabled = false;
    $scope.postFormAboAssign = function()
    {
        $scope.isDisabled = true;
        $scope.formError={};
        var errors=[];
        $rootScope.processing=true;
        addaboassign();
    }

    function addaboassign()
    {    
        $scope.abo_assign_form.AboId = $scope.abo_assign_form.Abo.AboId; 
        $scope.abo_assign_form.AboName = $scope.abo_assign_form.Abo.AboName;  


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
})

.controller('PropertyCommentController', function($window, $location, $filter, Pagination, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, $stateParams , Storage){
    var id = $stateParams.id;
    var val = $stateParams.data;
    var val1 = $stateParams.data1;
    $scope.status = Storage.data.followstatus;

    $scope.comment_form = {};
    $scope.form = {};

    $http({ url: 'buyercommentpropertyget/'+id, method: 'GET'}).success(function(data)
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

.controller('PropertyDocumentController', function($window, $location, $filter, Pagination, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, $stateParams , Storage){
    var id = $stateParams.id;

    $http({ url: 'propertydocumentget/'+id, method: 'GET'}).success(function(data)
    { 
        $scope.document = data;
        $scope.datas = []; 
        angular.forEach($scope.document, function(value){
            value.documenturl = '/uploads/property/document/'+value.PropertyDocumentName;
            $scope.datas.push(value);
        });             
    });

 

    function al(text)
    {
        $mdToast.show($mdToast.simple().textContent(text).position('bottom right').hideDelay(3000));
    }
})