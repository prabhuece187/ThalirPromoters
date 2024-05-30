<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Sequence</title>
    <link rel="shortcut icon" type="image/png" href="admin-asset/img/logo.png">
    <link rel="stylesheet" type="text/css" href="admin-asset/css/app.css">

    <link rel="stylesheet" type="text/css" href="admin-asset/css/poppins/popinslib.css">
    <link rel="stylesheet" type="text/css" href="admin-asset/css/poppins/poppins1.woff2">
    <link rel="stylesheet" type="text/css" href="admin-asset/css/poppins/poppins2.woff2">
    <link rel="stylesheet" type="text/css" href="admin-asset/css/poppins/poppins3.woff2">

    <link rel="stylesheet" type="text/css" href="admin-asset/select2/select2.css">

<!--      <style type="text/css">

        .login-input, .login-btn{
            border-radius: 0px;
            background-clip: unset;
            border: transparent;
        }
        .login-input:focus, .login-btn:focus{
            border-color: transparent!important;
            box-shadow: none;
        }

        .width-login{
            width: 400px;
        }

        @media (max-width: 767.98px) {
            .width-login{
                width: 750px;
            }
        }

    </style>  -->
  <style type="text/css">
    .login-input, .login-btn{
        border-radius: 0px;
        background-clip: unset;
        border: transparent;
    }
    .login-input:focus, .login-btn:focus{
        border-color: 1px solid #e7e7e7 !important;
        box-shadow: none;
    }

    .width-login{
        width: 400px;
    }

    .form-control:focus {
        border-color: #e7e7e7 !important;
    }

    .avatar{
        background-color: #fff !important;
        border-radius: 50% !important;
    }

    .submit-btn{
        color: #fff !important;
        background: #111d77 !important;
    }

    .login-input, .login-btn {
       border-radius: 5px !important;
    }

    form .form-control {
        border-color: 1px solid #e7e7e7 !important;
        border: 1px solid #e7e7e7 !important;
    }

    .ng-touched.ng-invalid {
        border-color: #f5c7cc !important;
    }

    @media (max-width: 767.98px) {
        .width-login{
            width: 750px;
        }
    }

    .modal-title{
     color: #fff !important;
    font-size: 15px !important;
    padding-left: 10px !important;
    }

     .modal-header{
      background-color: #111d77 !important;
      padding: 0.4rem !important;
      border-top-left-radius: 0 !important;
      border-top-right-radius: 0 !important;
    }

    .modal-footer{
      padding: 10px 0px 0px 0px !important;
    }


    .btn{
      font-size: 16px !important;
      color: #fff !important;
      background-color: #111d77!important;
      border-color: #111d77!important;
      border-radius: 0 !important;
      padding: 0.5rem 0.5rem !important;
      margin-bottom: 0px !important;
    }

    .atag:hover, .atag:focus{
     background-color:  #ff087f !important;
      color: #fff!important;
      text-decoration: none !important;
      border-color: transparent!important;
    }

    .close{
        opacity: 1 !important;
      font-weight: 100 !important;
      font-size: 1.3rem !important;
    }

    .close:focus{
      outline: none !important;
    }

    .btn:hover, .btn:focus{
      background-color:  #ff087f !important;
      color: #fff!important;
      text-decoration: none !important;
      border-color: transparent!important;
    }

</style>
</head>
<body data-col="1-column" class=" 1-column  blank-page blank-page" ng-app="billing" >
    <div class="wrapper nav-collapsed menu-collapsed">
        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <section id="login">
                        <div class="container-fluid">
                            <div class="row full-height-vh">
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <div class="card  text-center width-login">
                                        <div class="card-img overlap" >
                                            <img alt="element 06" class="mb-1" src="/user-asset/img/logo.jpg" width="190">
                                        </div>
                                           <ui-view></ui-view>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="admin-asset/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="admin-asset/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="admin-asset/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="/angular-libraries/angular.min.js"></script>
    <script src="/angular-libraries/angular-animate.min.js"></script>
    <script src="/angular-libraries/angular-ui-router.min.js"></script>
    <script src="/angular-libraries/moment.min.js"></script>
     <script src="/angular-libraries/angular-moment.min.js"></script>
    <script src="/angular-libraries/select2.js"></script>

    <script src="/angular-libraries/angular-material.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>


    <script type="text/javascript">
        var app =  angular.module('billing',['ui.router','angularMoment','ngAnimate','ui.select'])
        app.constant('LOGIN')

        app.config(function($stateProvider,$urlRouterProvider)
        {
            $stateProvider
                .state('login', {
                    url: '/admin',
                    templateUrl: 'loginpage',
                    controller: 'loginCtrl',
                    menuactive:'login',
                    title :'login'
                })
                .state('Register', {
                    url: '/register',
                    templateUrl: 'registerpage',
                    controller: 'RegisterCtrl',
                    menuactive:'Register',
                    title :'Register'
                })
                 .state('MediatorRegister', {
                    url: '/mediatorregister',
                    templateUrl: 'medregisterpage',
                    controller: 'MediatorRegisterCtrl',
                    menuactive:'MediatorRegister',
                    title :'MediatorRegister'
                })
                .state('forgot', {
                    url: '/forgotpassword/:data',
                    templateUrl: 'forgotpage',
                    controller: 'ForgotCtrl',
                    menuactive:'forgot',
                    title :'forgot'
                })
                $urlRouterProvider.otherwise('/admin');
        })

        .controller('loginCtrl', function($rootScope,$scope ,LOGIN, $http,$window){
            $scope.forget_form = {};

            $scope.postLogin = function()
            {
                $http({ url: 'admin-login', method: 'POST',data:$scope.form}).success(function(data){
                    $window.location.href = '/admin-login';
                }).error(function(data,status){
                    $scope.formError=data;
                    if(status==500)
                    { $window.location.href = '/'; }
                });
            }

            $scope.clear = function(){
                $scope.form.name ="";
                $scope.form.password ="";
            }

            $scope.onForgotPassword = function()
            {
                $scope.forget_form = {};
                $('#forget_form').modal();
            }

            $scope.postForm = function()
            {
                $http({ url: 'emaillink', method: 'POST', data:$scope.forget_form }).success(function(data) {
                    $scope.data = data;
                }).error(function(data, status) {
                    var confirm = $mdDialog.alert({
                        title: 'Warning',
                        textContent: 'Mail Configuration Error',
                        ok: 'Close'
                    });
                    $mdDialog.show(confirm);
                  });
            }
        })

        .controller('RegisterCtrl', function($rootScope,$scope ,LOGIN, $http,$window){
            $scope.form = {};

            $scope.postRegister = function()
            {
                $http({ url: 'register', method: 'POST',data:$scope.form})
                .success(function(data){

                   alert("successed");

                }).error(function(data,status){
                    $scope.formError=data;
                       if(status==500)
                       { $window.location.href = '#/login'; }
                });
            }

        })

          .controller('MediatorRegisterCtrl', function($rootScope,$scope ,LOGIN, $http,$window){
            // $scope.form = {
            //     RoleId : 4
            // };

            $scope.postRegister = function()
            {
                $http({ url: 'mediatorregister', method: 'POST',data:$scope.form})
                .success(function(data){

                   alert("successed");
                   $window.location.href = '#/login';

                }).error(function(data,status){
                    $scope.formError=data;
                       if(status==500)
                       { $window.location.href = '#/login'; }
                });
            }

        })

        .controller('ForgotCtrl', function($rootScope,$scope ,LOGIN, $http,$window,$stateParams){
            var id = $stateParams.data;
            var DataEn = id;
            var DataEncrypt = DataEn.replace('₹', '/');
            var DataKey = CryptoJS.enc.Utf8.parse("01234567890123456789012345678901");
            var DataVector = CryptoJS.enc.Utf8.parse("1234567890123412");
            var decrypted = CryptoJS.AES.decrypt(DataEncrypt, DataKey, { iv: DataVector });
            var decrypted = CryptoJS.enc.Utf8.stringify(decrypted);

            $scope.form = {};
            $scope.form.email = angular.lowercase(decrypted);

            $scope.postUpdated = function()
            {
                $http({ url: 'passwordupdate', method: 'POST',data:$scope.form}).success(function(data){
                    alert("Password Updated Successfully");
                    $window.location.href = '#/login';
                }).error(function(data,status){
                    $scope.formError="Password Not Matched . Please Check";
                });
            }


        })

    </script>


    <script type="text/ng-template" id="loginpage">
        <div class="card-body">
            <div class="card-block">
                <h4 style="color:#111d77;">Login</h4>
                <form ng-submit="postLogin()">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control login-input"  name="name" ng-model="form.name"   placeholder="Name" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control login-input" name="password" id="password" ng-model="form.password" placeholder="Password" required>
                            <span class="help-block" style="font-size:.8rem;color:#111d77;">
                            {{formError[0]}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="Submit" class="btn login-btn btn-pink">Submit</button>
                            <button type="button" class="btn login-btn btn-secondary" ng-click="clear()">Clear</button>
                            <a ng-click="onForgotPassword()" class="btn atag" >Forget Password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

     <div class="modal fade text-left" id="forget_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog " role="document">
           <div class="modal-content">
              <div class="modal-header bg-primary white">
                <h4 class="modal-title" id="myModalLabel11"><strong> Reset Password </strong></h4>
                  <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="mod-area">&times;</span>
                  </button>
                </div>
                  <form>
                    <div class="modal-body">
                      <div class="row">
                          <div class="col-md-12">
                            <fieldset class="form-group floating-label-form-group">
                              <label for="title">E-MAIL ADDRESS</label>
                               <div class="">
                                  <input type="email" class="form-control" ng-model="forget_form.email">
                               </div>
                            </fieldset>
                          </div>
                            <span class="help-block" style="font-size:.8rem;color:#111D77;padding: 0px 19px">
                            {{data}}</span>
                      </div>
                      <div class="modal-footer">
                        <a href=""  type="reset" class="btn atag" data-dismiss="modal" >Close</a>
                        <input type="submit" ng-disabled="isDisabled" ng-click="postForm();" class="btn btn-outline-primary atag btn-lg" value="Send Mail">
                      </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
    </script>

    <script type="text/ng-template" id="registerpage">
        <div class="card-body">
            <div class="card-block">
                <h4 style="color:#111d77;">Registeration</h4>
                <form ng-submit="postRegister()">
                    <div class="input-group mb-3">
                         <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-user"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" ng-model="form.name" id="name" placeholder="Name" required >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ft-mail"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control" ng-model="form.email" id="email" placeholder="Email" required >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ft-lock"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control"
                        ng-model="form.password" id="password" placeholder="Password" required >
                    </div>
                   <div class="form-group text-center">
                        <button type="submit" class="btn btn-warning btn-raised">Get Started</button>
                    </div>
                </form>
           </div>
        </div>
    </script>

    <script type="text/ng-template" id="medregisterpage">
        <div class="card-body">
            <div class="card-block">
                <h4 style="color:#111d77;">Mediator or Abo or Asp Registeration</h4>
                <form ng-submit="postRegister()">
                    <div class="input-group mb-3">
                         <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-user"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" ng-model="form.name" id="name" placeholder="Name" required >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ft-mail"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control" ng-model="form.email" id="email" placeholder="Email" required >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ft-lock"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control"
                        ng-model="form.password" id="password" placeholder="Password" required >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ft-lock"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control"
                        ng-model="form.RePassword" id="RePassword" placeholder="RePassword" required >
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ft-lock"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control"
                        ng-model="form.Mobile" id="Mobile" placeholder="Mobile No" required >
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ft-lock"></i>
                            </span>
                        </div>
                        <select class="form-control" ng-model="form.RoleId" id="RoleId" required>
                          <option value="" disabled selected>Select your option</option>
                          <option value="5">ABO</option>
                          <option value="2">ASP</option>
                          <option value="4">MEDIATOR</option>
                        </select>
                    </div>

                   <div class="form-group text-center">
                        <button type="submit" class="btn btn-warning btn-raised">Get Started</button>
                    </div>
                </form>
           </div>
        </div>
    </script>


      <script type="text/ng-template" id="forgotpage">
        <div class="card-body">
            <div class="card-block">
                <h4 style="color:#111d77;">Forgot Password</h4>
                <form ng-submit="postUpdated()">
                    <div class="input-group mb-3">
                         <!-- <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-user"></i>
                            </span>
                        </div> -->
                        <input type="hidden" class="form-control" ng-model="form.email" id="name" placeholder="email" required readonly  >
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ft-lock"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control"
                        ng-model="form.password" id="password" placeholder="Enter New Password" required >
                    </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ft-lock"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control"
                        ng-model="form.repassword" id="repassword" placeholder="Conform Password" required >
                    </div>
                    <span class="help-block" style="font-size:.8rem;color:#111D77;padding: 0px 19px">
                            {{formError}}</span>
                   <div class="form-group text-center">
                        <button type="submit" class="btn btn-warning btn-raised">Get Started</button>
                    </div>
                </form>
           </div>
        </div>
    </script>

</body>
</html>
