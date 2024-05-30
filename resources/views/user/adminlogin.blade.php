<!doctype html>
<html class="no-js" lang="zxx">

 @include('user.common.header')
<body>

<div class="body-wrapper">
 @include('user.common.menu')

    <!-- BREADCRUMB AREA START -->
  <div class="ltn__breadcrumb-area text-left  bg-image mb-0"  data-bg="/user-asset/img/bg/100.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 title-top">
                    <div class="ltn__breadcrumb-inner">
                        <div class="ltn__breadcrumb-list">
                            <h1 class="page-title banner-head-color">Admin Login</h1>
                            <ul class="banner-head-color">
                                <li><a href="/index" class="banner-head-color"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
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
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title" style="padding-top: 80px">Login</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="account-login-inner">

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form action="/adminuserlogin" method="POST" class="ltn__form-box contact-form-box" style="padding: 0px 50px 0px 50px;">
                             @csrf
                            <input type="text" name="name" placeholder="Name" required="">

                            <input type="password" name="password" placeholder="Password*" required="">

                            <div class="btn-wrapper">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">SUBMIT</button>
                            </div>
                        </form>
                        @if(session()->get('name') == 1)
                        <form action="/sign_out" method="GET" class="ltn__form-box contact-form-box" style="padding: 0px 50px 0px 50px;">
                            @csrf
                            <div class="btn-wrapper">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">LOGOUT</button>
                            </div>
                        </form>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->

    <!-- FOOTER AREA START -->
    @include('user.common.footer')
    <!-- FOOTER AREA END -->

</div>
<!-- Body main wrapper end -->


</body>
</html>

