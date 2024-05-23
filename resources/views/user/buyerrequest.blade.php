<!doctype html>
<html class="no-js" lang="zxx" ng-app="smart">

 @include('user.common.header')
<body>

<div class="body-wrapper">
 @include('user.common.menu')

    <!-- BREADCRUMB AREA START -->
  <div class="ltn__breadcrumb-area text-left  bg-image mb-0"  data-bg="/user-asset/img/bg/101.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner" style="padding: 30px;padding-top: 75px;">
                        <h1 class="page-title banner-head-color" style="color: #fff">Party Request</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul class="banner-head-color">
                                <li><a href="/index"><span class="ltn__secondary-color" style="color: #fff !important"><i class="fas fa-home"></i></span> Home</a></li>
                                <li class="banner-head-color">Party Request</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- LOGIN AREA START (Register) -->
    <div class="ltn__login-area pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="padding-top: 50px;">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Directly Add Your Post</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                    <div class="btn-wrapper">
                       <a href="/userregister" class="btn theme-btn-1 btn-effect-1 text-uppercase">Create Account</a>
                    </div>
                    <div class="btn-wrapper">
                        <a href="/admin-login" class="btn theme-btn-1 btn-effect-1 text-uppercase" style="color: #fff;" >Already have an Account ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->

 





    <!-- CALL TO ACTION END -->

    <!-- FOOTER AREA START -->
    @include('user.common.footer')
    <!-- FOOTER AREA END -->

</div>
<!-- Body main wrapper end -->


</body>

</html>

