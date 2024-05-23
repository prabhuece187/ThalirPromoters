var app =  angular.module('Bill',['ui.router','angularMoment','ngAnimate','ui.select','ngMaterial','ngMessages','ngFileUpload','colorpicker.module','wysiwyg.module'])
.constant('STATES', [{ id: 1, state: 'Andaman and Nicobar Islands', code: '35' }, { id: 2, state: 'Andhra Pradesh', code: '28' }, { id: 3, state: 'Andhra Pradesh (New)', code: '37' }, { id: 4, state: 'Arunachal Pradesh', code: '12' }, { id: 5, state: 'Assam', code: '18' }, { id: 6, state: 'Bihar', code: '10' }, { id: 7, state: 'Chandigarh', code: '04' }, { id: 8, state: 'Chattisgarh', code: '22' }, { id: 9, state: 'Dadra and Nagar Haveli', code: '26' }, { id: 10, state: 'Daman and Diu', code: '25' }, { id: 11, state: 'Delhi', code: '07' }, { id: 12, state: 'Goa', code: '30' }, { id: 13, state: 'Gujarat', code: '24' }, { id: 14, state: 'Haryana', code: '06' }, { id: 15, state: 'Himachal Pradesh', code: '02' }, { id: 16, state: 'Jammu and Kashmir', code: '01' }, { id: 17, state: 'Jharkhand', code: '20' }, { id: 18, state: 'Karnataka', code: '29' }, { id: 19, state: 'Kerala', code: '32' }, { id: 20, state: 'Lakshadweep Islands', code: '31' }, { id: 21, state: 'Madhya Pradesh', code: '23' }, { id: 22, state: 'Maharashtra', code: '27' }, { id: 23, state: 'Manipur', code: '14' }, { id: 24, state: 'Meghalaya', code: '17' }, { id: 25, state: 'Mizoram', code: '15' }, { id: 26, state: 'Nagaland', code: '13' }, { id: 27, state: 'Odisha', code: '21' }, { id: 28, state: 'Pondicherry', code: '34' }, { id: 29, state: 'Punjab', code: '03' }, { id: 30, state: 'Rajasthan', code: '08' }, { id: 31, state: 'Sikkim', code: '11' }, { id: 32, state: 'Tamil Nadu', code: '33' }, { id: 33, state: 'Telangana', code: '36' }, { id: 34, state: 'Tripura', code: '16' }, { id: 35, state: 'Uttar Pradesh', code: '09' }, { id: 36, state: 'Uttarakhand', code: '05' }, { id: 37, state: 'West Bengal', code: '19' }])

.filter('state', function ($filter, STATES) {
   return function(input) {
        if(input)
        {
            return $filter('filter')(STATES, {code:input})[0].state;
        }
        return '' ;
   };
})
.filter('trustAsResourceUrl', ['$sce', function($sce) {
    return function(val) {
        return $sce.trustAsResourceUrl(val);
    };
}])

.factory('Excel',function($window){
    var uri='data:application/vnd.ms-excel;base64,',
        template='<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64=function(s){return $window.btoa(unescape(encodeURIComponent(s)));},
        format=function(s,c){return s.replace(/{(\w+)}/g,function(m,p){return c[p];})};
    return {
        tableToExcel:function(tableId,worksheetName){
            var table=$(tableId),
                ctx={worksheet:worksheetName,table:table.html()},
                href=uri+base64(format(template,ctx));
            return href;
        }
    };
})

.directive('onlydigits', function() {
return {
    restrict: 'A',
    link: function(scope, element, attrs) {   
      element.on('keypress', function(event) {
        if (!isIntegerChar() ) 
          event.preventDefault();
        
        function isIntegerChar() {
          return /[0-9]|[.]|-/.test(
            String.fromCharCode(event.which))
        }

      })       
    
    }
  }
})

.directive('numbersOnly', function () {
    return {
        require: 'ngModel',
        link: function (scope, element, attr, ngModelCtrl) {
            function fromUser(text) {
                if (text) {
                    var transformedInput = text.replace(/[^0-9]/g, '');
                    if (transformedInput !== text) {
                        ngModelCtrl.$setViewValue(transformedInput);
                        ngModelCtrl.$render();
                    }
                    return transformedInput;
                }
                return undefined;
            }            
            ngModelCtrl.$parsers.push(fromUser);
        }
    };
})

.directive('fileModel', ['$parse', function ($parse) {
    return {
       restrict: 'A',
       link: function(scope, element, attrs) {
          var model = $parse(attrs.fileModel);
          var modelSetter = model.assign;
          var isMultiple = attrs.multiple;
          
          element.bind('change', function(){
            var values = [];
            var size = 0;
                    angular.forEach(element[0].files, function (item) {
                        values.push(item);
                        size = size + item.size;
                    });
                    scope.$apply(function(){
                        if(size>31457280)
                        {
                            scope.filesize='Files Size Exceeded. Maximum 30MB';
                        }
                        else
                        {
                            scope.filesize='';
                            if (isMultiple) {
                                modelSetter(scope, values);
                            } else {
                                modelSetter(scope, values[0]);
                            }
                        }
                        
                    });
          });
       }
    };
    }])

.filter('propsFilter', function() {
  return function(items, props) {
    var out = [];

    if (angular.isArray(items)) {
      var keys = Object.keys(props);

      items.forEach(function(item) {
        var itemMatches = false;

        for (var i = 0; i < keys.length; i++) {
          var prop = keys[i];
          var text = props[prop].toLowerCase();
          if (item[prop].toString().toLowerCase().indexOf(text) !== -1) {
            itemMatches = true;
            break;
          }
        }

        if (itemMatches) {
          out.push(item);
        }
      });
    } else {
      out = items;

    }

    return out;
  };
})

.directive('autofocus', ['$timeout', function($timeout) {
  return {
    restrict: 'A',
    link : function($scope, $element) {
      $timeout(function() {
        $element[0].focus();
      });
    }
  }
}])

.constant('Storage', {data:{   
     cheque_status : [{id:1,value:'COLLECTION'},{id:2,value:'CLEARED'},
     {id:3,value:'RETURNED'}],
     request : [{id:1,value:'Land'},{id:2,value:'Home&Villas'},
     {id:3,value:'Commercial'},{id:4,value:'Others'}],
     status : [{id:1,value:'Completed'},{id:2,value:'Pending'},{id:3,value:'Approved'},{id:4,value:'Waitting'},{id:4,value:'Canceled'}],
     followstatus : [{id:1,value:'Approved'},{id:2,value:'Cancel'}],
     promotertype : [{id:1,value:'Land'},{id:2,value:'Form Land'},
     {id:3,value:'Building'}],
     propertystatus : [{id:1,value:'BOOKED'},{id:2,value:'AVAILABLE'},{id:3,value:'SOLD'},{id:4,value:'RESERVED'}],
     payment_Type : [{id:1,value:'CHEQUE'},{id:2,value:'CASH'},{id:3,value:'RTGS'}],
     dc_status : [{id:1,value:'CLEARED'},{id:0,value:'PENDING'}], 
     unit : [{id:1,value:'Sqft'},{id:2,value:'Meter'},{id:3,value:'Cent'},{id:4,value:'Acre'}], 
     water : [{id:1,value:'Well'},{id:2,value:'Bore Well'},{id:3,value:'Corparation Water'},{id:4,value:'Vaaikkal Paasanam'},{id:5,value:'Nill'}], 
     eb : [{id:1,value:'Single Phase'},{id:2,value:'Three Phase'},{id:3,value:'Free Phase Line'},{id:4,value:'Nill'}], 
     face : [{id:1,value:'North'},{id:2,value:'South'},{id:3,value:'west'},{id:4,value:'East'},{id:5,value:'Corner'}], 
     const_status : [{id:1,value:'Ready To Move '},{id:2,value:'Under Construction'},{id:3,value:'Upcoming Process'}], 
     
}})

 .filter('app_filter', function ($parse, $filter,Storage) {
       return function(input, master) {
            if(input||input==0 && input != "")
            {
                try 
                {
                    return $filter('filter')(Storage.data[master], {id:input})[0].value;
                }
                catch(err) {
                    return '';
                }
            }
            else
            {
            return '' ;
          }
       };
    })

 .filter('words', function() {
    function isInteger(x) { return x % 1 === 0; }

    function toWords(inputNumber)
    {  
    var str = new String(inputNumber)
    var splt = str.split("");
    var rev = splt.reverse();
    var once = ['Zero', ' One', ' Two', ' Three', ' Four', ' Five', ' Six', ' Seven', ' Eight', ' Nine'];
    var twos = ['Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen', ' Seventeen', ' Eighteen', ' Nineteen'];
    var tens = ['', 'Ten', ' Twenty', ' Thirty', ' Forty', ' Fifty', ' Sixty', ' Seventy', ' Eighty', ' Ninety'];

    numLength = rev.length;
    var word = new Array();
    var j = 0;

    for (i = 0; i < numLength; i++) {
        switch (i) {

            case 0:
                if ((rev[i] == 0) || (rev[i + 1] == 1)) {
                    word[j] = '';
                }
                else {
                    word[j] = '' + once[rev[i]];
                }
                word[j] = word[j];
                break;

            case 1:
                aboveTens();
                break;

            case 2:
                if (rev[i] == 0) {
                    word[j] = '';
                }
                else if ((rev[i - 1] == 0) || (rev[i - 2] == 0)) {
                    word[j] = once[rev[i]] + " Hundred";
                }
                else {
                    word[j] = once[rev[i]] + " Hundred and";
                }
                break;

            case 3:
                if (rev[i] == 0 || rev[i + 1] == 1) {
                    word[j] = '';
                }
                else {
                    word[j] = once[rev[i]];
                }
                if ((rev[i + 1] != 0) || (rev[i] > 0)) {
                    word[j] = word[j] + " Thousand";
                }
                break;

                
            case 4:
                aboveTens();
                break;

            case 5:
                if ((rev[i] == 0) || (rev[i + 1] == 1)) {
                    word[j] = '';
                }
                else {
                    word[j] = once[rev[i]];
                }
                if (rev[i + 1] !== '0' || rev[i] > '0') {
                    word[j] = word[j] + " Lakh";
                }
                 
                break;

            case 6:
                aboveTens();
                break;

            case 7:
                if ((rev[i] == 0) || (rev[i + 1] == 1)) {
                    word[j] = '';
                }
                else {
                    word[j] = once[rev[i]];
                }
                if (rev[i + 1] !== '0' || rev[i] > '0') {
                    word[j] = word[j] + " Crore";
                }                
                break;

            case 8:
                aboveTens();
                break;

            default: break;
        }
        j++;
    }

        function aboveTens() 
        {
            if (rev[i] == 0) { word[j] = ''; }
            else if (rev[i] == 1) { word[j] = twos[rev[i - 1]]; }
            else { word[j] = tens[rev[i]]; }
        }

        word.reverse();
        var finalOutput = '';
        for (i = 0; i < numLength; i++) {
            finalOutput = finalOutput + word[i];
        }
        return finalOutput;
    }


    return function(value) {
    if (value && isInteger(value))
        return  toWords(value);    
        return value;
    };

})

.factory("Pagination", function () {
    return function(total, count, pagedata) {
        var pages = [];
        var length = Math.floor(total/count);
        var floor = total/count;

        var pageSize = pageSize || 10;

        // var totalPages = Math.ceil(total / pageSize);

        if(floor>length) length++;

        var startPage, endPage;
        if (length  <= 5) {
            // less than 10 total pages so show all
            startPage = 1;
            endPage = length;
        } else {
            // more than 10 total pages so calculate start and end pages
            if (pagedata <= 3) {
                startPage = 1;
                endPage = 5;
            } else if (pagedata + 2 >= length ) {
                startPage = length  - 4;
                endPage = length ;
            } else {
                startPage = pagedata - 3;
                endPage = pagedata + 2;
            }
        }
        
        for (var i=startPage; i <= endPage; i++) {
            pages.push(i);
        }

        return {
            totallength: length,
            pages: pages
        }
    }
})

.config(function($mdDateLocaleProvider) {
    $mdDateLocaleProvider.formatDate = function(date) {
        return moment(date).format('DD-MM-YYYY');
    };
})
 
.directive('mdDatepicker', function() {
    function link(scope, element, attrs, ngModel) {
        var parser = function(val) {
            val = moment(val).format('YYYY-MM-DD');
            return val;
        };
        var formatter = function(val) {
            if (!val) return val;
            val = moment(val).toDate();
            return val;
        };
        ngModel.$parsers.push(parser);
        ngModel.$formatters.push(formatter);
    }
    return {
        require: 'ngModel',
        link: link,
        restrict: 'EA',
        priority: 1
    }

})


.controller('billController', function($rootScope,$scope,$http){

    $scope.change_password = function()
    {
        $scope.password_form = {};
        $("#change_password").modal();
    }

    $scope.update_password = function()
    {
        $scope.formError={};
        var errors=[];
        if($rootScope.processing==true||errors.length>0){$scope.formError.errors={errors:errors}; return;}
        $rootScope.processing=true;
        $http({ url: 'update_password', method: 'POST',data:$scope.password_form}).success(function(data){
            $rootScope.processing=false;
            $("#change_password").modal('hide');
            Messenger({extraClasses: 'messenger-fixed messenger-on-right messenger-on-top',theme: 'flat', showCloseButton: true}).post({message:'Saved successfully', showCloseButton: true});
        }).error(function(data,status){
            $scope.formError = data;
            $rootScope.processing=false;
        });
    }

    //   $scope.get_area = function() {
    //     $http({ url: 'area', method: 'GET'}).success(function(data){
    //         $scope.service_billing_item_list=data;
    //     });
    // };


})

.directive('allowDecimalNumbers', function () {  
    return {  
        restrict: 'A',  
        link: function (scope, elm, attrs, ctrl) {  
            elm.on('keydown', function (event) {  
                var $input = $(this);  
                var value = $input.val();  
                value = value.replace(/[^0-9\.]/g, '')  
                var findsDot = new RegExp(/\./g)  
                var containsDot = value.match(findsDot)  
                if (containsDot != null && ([46, 110, 190].indexOf(event.which) > -1)) {  
                    event.preventDefault();  
                    return false;  
                }  
                $input.val(value);  
                if (event.which == 64 || event.which == 16) {  
                    // numbers  
                    return false;  
                } if ([8, 13, 27, 37, 38, 39, 40, 110].indexOf(event.which) > -1) {  
                    // backspace, enter, escape, arrows  
                    return true;  
                } else if (event.which >= 48 && event.which <= 57) {  
                    // numbers  
                    return true;  
                } else if (event.which >= 96 && event.which <= 105) {  
                    // numpad number  
                    return true;  
                } else if ([46, 110, 190].indexOf(event.which) > -1) {  
                    // dot and numpad dot  
                    return true;  
                } else {  
                    event.preventDefault();  
                    return false;  
                }  
            });  
        }  
    }  
})


.directive('ngFiles', ['$parse', function ($parse) {

    function fn_link(scope, element, attrs) {

        var onChange = $parse(attrs.ngFiles);

        element.on('change', function (event) {
            onChange(scope, { $files: event.target.files });
        });
        element.on('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
        });
        element.on('dragenter', function(e) {
            e.preventDefault();
            e.stopPropagation();
        });
        element.on('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            if (e.originalEvent.dataTransfer) {
                if (e.originalEvent.dataTransfer.files.length > 0) {
                    //upload(e.originalEvent.dataTransfer.files);
                    onChange(scope, { $files: e.originalEvent.dataTransfer.files });
                }
            }
            return false;
        });

    };

    return {
        link: fn_link
    }
}])

app.directive('fileModel', function ($parse) {
     return {
        scope: {
            fileModel: "="
        },
        link: function (scope, element, attributes) {
            element.bind("change", function (changeEvent) {
                scope.$apply(function () {
                    scope.fileModel = changeEvent.target.files[0];
                });
            });
        }
    }
});







