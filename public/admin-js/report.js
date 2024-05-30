app.constant('REPORT',{data:[],pagination:{page: 1, count: 50, sorting: {PropertyId: 'desc'}} })
app.config(function($stateProvider,$urlRouterProvider) {
    $stateProvider
        .state('adminprop', {
            url: '/adminprop',
            templateUrl: 'views/admin.reports.adminproplist',
            controller: 'AdminPropReportCtrl',
            menuactive:'adminprop',
            title :'adminprop'
        })
        .state('otherprop', {
            url: '/otherprop',
            templateUrl: 'views/admin.reports.otherproplist',
            controller: 'OtherPropReportCtrl',
            menuactive:'otherprop',
            title :'otherprop'
        })
        .state('completedprop', {
            url: '/completedprop',
            templateUrl: 'views/admin.reports.completedprop',
            controller: 'CompletedPropReportCtrl',
            menuactive:'completedprop',
            title :'completedprop'
        })
        .state('roughdata', {
            url: '/roughdata',
            templateUrl: 'views/admin.reports.roughdata',
            controller: 'RoughDataReportCtrl',
            menuactive:'roughdata',
            title :'roughdata'
        })
        .state('allprop', {
            url: '/allprop',
            templateUrl: 'views/admin.reports.allproplist',
            controller: 'AllPropReportCtrl',
            menuactive:'allprop',
            title :'allprop'
        })
        .state('buyerprop', {
            url: '/buyerprop/{id}',
            templateUrl: 'views/admin.seller.property',
            controller: 'buyerPropReportCtrl',
            menuactive:'buyerprop',
            title :'buyerprop'
        })
        .state('customerfollow', {
            url: '/customer_follow_report',
            templateUrl: 'views/admin.reports.customerfollow',
            controller: 'CustomerFollowReportCtrl',
            menuactive:'customerfollow',
            title :'customerfollow'
        })
        .state('customerfollowid', {
            url: '/customer_follow_report/{id}',
            templateUrl: 'views/admin.reports.customerfollow',
            controller: 'CustomerFollowReportCtrl',
            menuactive:'customerfollowid',
            title :'customerfollowid'
        })
        .state('mediatorfollow', {
            url: '/mediator_follow_report',
            templateUrl: 'views/admin.reports.mediatorfollow',
            controller: 'MediatorFollowReportCtrl',
            menuactive:'mediatorfollow',
            title :'mediatorfollow'
        });
})

.controller('AdminPropReportCtrl', function($filter, $rootScope,$scope, REPORT, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, Excel){

    $scope.form={};


    $http({ url: 'adminpropertylist', method: 'GET'}).success(function (result) {
        $scope.data = result.data;
        $scope.role = result.role;
        angular.element(document).ready( function () {
           $('#table_id').DataTable({
           dom: 'lBfrtip',
           buttons: [ 'excel', 'pdf' ],
           responsive: true
           });
        });
    });
})

.controller('OtherPropReportCtrl', function($filter, $stateParams, $rootScope,$scope, REPORT, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, Excel){

    $scope.form={};


    $http({ url: 'otherpropertylist', method: 'GET'}).success(function (result) {
        $scope.data = result.data;
        $scope.role = result.role;
        angular.element(document).ready( function () {
           $('#table_id').DataTable({
           dom: 'lBfrtip',
           buttons: [ 'excel', 'pdf' ],
           responsive: true
           });
        });
    });
})

.controller('CompletedPropReportCtrl', function($filter, $stateParams, $rootScope,$scope, REPORT, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, Excel){

    $scope.form={};


    $http({ url: 'completedproplist', method: 'GET'}).success(function (result) {
        $scope.data = result.data;
        $scope.role = result.role;
        angular.element(document).ready( function () {
           $('#table_id').DataTable({
           dom: 'lBfrtip',
           buttons: [ 'excel', 'pdf' ],
           responsive: true
           });
        });
    });
})


.controller('RoughDataReportCtrl', function($filter, $stateParams, $rootScope,$scope, REPORT, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, Excel){

    $scope.form={};

    $http({ url: 'area', method: 'GET'}).success(function (result) {
        $scope.area = result;
    });

    $scope.searchForm =  function(){

        // $scope.form.AreaId = $scope.form.Area.AreaId;
        $http({ url: 'roughreport', method: 'POST',data:$scope.form}).success(function(result){
            $scope.data = result.data;
            $scope.role = result.role;
        });
    }

    // $scope.getPDF =  function()
    // {
      // console.log("wel");
      //   kendo.drawing.drawDOM($('#excel'), {
      //   paperSize: 'A4',
      //   margin: {
      //     left: '1cm',
      //     right: '1cm',
      //     top: '1cm',
      //     bottom: '1cm'
      //   },
      //   multiPage: true,
      //   landscape: true,
      //   repeatHeaders: true,
      //   scale: 0.5
      //   }).then(function(group) {
      //       kendo.drawing.pdf.toDataURL(group, function(dataURL) {

      //       kendo.saveAs({
      //       dataURI: dataURL,
      //       fileName: 'RoughtPDF',
      //       })
      //   });

      //   });
    // }

    $scope.getExcel =  function()
    {
        var filename = 'rough_data_propertys.xls';
        var exportHref=Excel.tableToExcel("#excel", 'Report');
        var link = document.createElement('a');
        link.download = filename;
        link.href = exportHref;
        link.click();
    }
})

.controller('AllPropReportCtrl', function($filter, $stateParams, $rootScope,$scope, REPORT, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, Excel){

    $scope.form={};

    $http({ url: 'allproperty', method: 'GET'}).success(function (result) {
        $scope.data = result.data;
        $scope.role = result.role;
    });


    $scope.getExcel =  function()
    {
        var filename = 'all_properties.xls';
        var exportHref=Excel.tableToExcel("#table_id", 'Report');
        var link = document.createElement('a');
        link.download = filename;
        link.href = exportHref;
        link.click();
    }
})


.controller('buyerPropReportCtrl', function($window, $location, $filter, REPORT, Excel,Pagination, $rootScope,$scope, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES,$stateParams){

    $scope.pagination = REPORT.pagination;
    var page = REPORT.pagination.page;

    var id = $stateParams.id;
    $scope.isDisabledStatus = true;

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

            $http({ url: 'propertybuyer/'+id, method: 'GET',params:$scope.pagination}).success(function (result) {
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

            $http({ url: 'propertybuyer/'+id, method: 'GET',params:$scope.pagination}).success(function (result) {
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

.controller('CustomerFollowReportCtrl', function($filter, $stateParams, $rootScope,$scope, REPORT, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, Excel){

    var id = $stateParams.id||0;
    console.log(id);
    $scope.form={};

    $http({ url: 'propertygetdatas', method: 'GET'}).success(function (result) {
         $scope.property = result;
    });


        if(id === 0){
            $scope.searchForm =  function(){
                $scope.form.PropertyId = $scope.form.Property.PropertyId;
                $http({ url: 'customer_follow_report', method: 'POST',data:$scope.form}).success(function(result){
                    $scope.abo = result.abo;
                    $scope.mediator = result.mediator;
                    $scope.admin = result.admin;
                    $scope.mediatorfollow = result.mediatorfollow;
                });
            }
        }
        else{
            $scope.form.Property = {PropertyId:id};
            $scope.form.PropertyId = id;
            $http({ url: 'customer_follow_report', method: 'POST',data:$scope.form}).success(function(result){
                $scope.abo = result.abo;
                $scope.mediator = result.mediator;
                $scope.admin = result.admin;
                $scope.mediatorfollow = result.mediatorfollow;
            });
        }



    $scope.getPDF =  function()
    {
        kendo.drawing.drawDOM($('#excel'), {
        paperSize: 'A4',
        margin: {
          left: '0.5cm',
          right: '0.5cm',
          top: '0.5cm',
          bottom: '0.5cm'
        },
        multiPage: true,
        portrait: true,
        repeatHeaders: true,
        scale: 0.5
        }).then(function(group) {
            kendo.drawing.pdf.toDataURL(group, function(dataURL) {

            kendo.saveAs({
            dataURI: dataURL,
            fileName: 'CUSTOMER-REPORT',
            })
        });

        });
    }
})

.controller('MediatorFollowReportCtrl', function($filter, $stateParams, $rootScope,$scope, REPORT, $http, $mdDialog, $mdToast, $httpParamSerializer, $state, $timeout, STATES, Excel){

    $scope.form={};

    $scope.searchForm =  function(){

        $http({ url: 'mediator_follow_report', method: 'POST',data:$scope.form}).success(function(result){
            $scope.mediatorfollow = result;
        });
    }


    $scope.getPDF =  function()
    {
        kendo.drawing.drawDOM($('#excel'), {
        paperSize: 'A4',
        margin: {
          left: '0.5cm',
          right: '0.5cm',
          top: '0.5cm',
          bottom: '0.5cm'
        },
        multiPage: true,
        portrait: true,
        repeatHeaders: true,
        scale: 0.5
        }).then(function(group) {
            kendo.drawing.pdf.toDataURL(group, function(dataURL) {

            kendo.saveAs({
            dataURI: dataURL,
            fileName: 'CUSTOMER-REPORT',
            })
        });

        });
    }
})
