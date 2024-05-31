<!DOCTYPE html>
<html lang="en" class="loading" ng-app="Bill" ng-controller="billController" ng-controller="Ctrl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title> My Real Estate </title>
    <link rel="shortcut icon" type="image/png" href="admin-asset/img/logo.png">
    <link rel="apple-touch-icon" sizes="60x60" href="admin-asset/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="admin-asset/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="admin-asset/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="admin-asset/img/ico/apple-icon-152.html">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <link rel="stylesheet" type="text/css" href="admin-asset/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="admin-asset/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="admin-asset/css/coderplays_media_queries.css">
    <link rel="stylesheet" type="text/css" href="admin-asset/css/app.css">
    <link rel="stylesheet" type="text/css" href="admin-asset/css/poppins/popinslib.css">
    <link rel="stylesheet" type="text/css" href="admin-asset/css/poppins/poppins1.woff2">
    <link rel="stylesheet" type="text/css" href="admin-asset/css/poppins/poppins2.woff2">
    <link rel="stylesheet" type="text/css" href="admin-asset/css/poppins/poppins3.woff2">
    <link rel="stylesheet" type="text/css" href="admin-asset/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="admin-asset/css/custom.css">

    <link rel="stylesheet" type="text/css" href="admin-asset/css/coderplays_screen.css">
    <link rel="stylesheet" type="text/css" href="admin-asset/css/printdesign.css">
    <!-- <link rel="stylesheet" type="text/css" href="admin-asset/fonts/font-awesome/css/font-awesome.css"> -->
    <link rel="stylesheet" type="text/css" href="admin-asset/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="admin-asset/vendors/css/perfect-scrollbar.min.css">
     <link rel="stylesheet" type="text/css" href="admin-asset/vendors/css/pickadate/pickadate.css">

    <link rel="stylesheet" type="text/css" href="admin-asset/select2/select2.css">
    <link rel="stylesheet" href="admin-asset/css/angular-material.min.css">

    <link rel="stylesheet" type="text/css" href="admin-asset/css/datatables.min.css"/>


    <style type="text/css">
      .modal-open {
        overflow: unset;
      }
    </style>
</head>

  <body data-col="2-columns" class=" 2-columns ">
    <div class="wrapper nav-collapsed menu-collapsed">
      <div data-active-color="white"  class="app-sidebar">
        <div class="sidebar-header">
           <div class="logo clearfix"><a href="#/dashboard" class="logo-text float-left">
              <div class="logo-img"><img src="admin-asset/img/logo.png" style="width: 40px"/></div><span class="text align-middle" style="font-size: 1.3rem;">REALESTATE</span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="collapsed" class="ft-toggle-left toggle-icon"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a></div>
          </div>
          <div class="sidebar-content">
            <div class="nav-container">
              <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

                <li class="">
                    <a href="#"><i class="ft-user"></i>
                      <span data-i18n="" class="menu-title" style="color: #111d77;font-weight: 900;text-transform: uppercase;"><?php echo($name) ?></span>
                    </a>
                  </li >

                <li class="nav-item">
                  <a href="#/dashboard"><i class="ft-home"></i>
                    <span data-i18n="" class="menu-title">DASHBOARD</span>
                  </a>
                </li>


                <!-- <li class="has-sub nav-item">
                  <a href=""><i class="ft-user"></i>
                    <span data-i18n="" class="menu-title">ADMIN</span>
                  </a>
                  <ul class="menu-content">
                    <li class="nav-item"><a href="#/customer"><span data-i18n="" class="menu-title">COMMERCIAL</span></a>
                    </li>
                    <li class="nav-item"><a href="#/supplier"><span data-i18n="" class="menu-title"> HOME & VILLA'S</span></a>
                    </li>
                    <li class="nav-item"><a href="#/promoterland"><span data-i18n="" class="menu-title">LAND</span></a>
                    </li>
                    <li class="nav-item"><a href="#/tools"><span data-i18n="" class="menu-title">RENT & LEASE</span></a>
                    </li>
                    <li class="nav-item"><a href="#/tools"><span data-i18n="" class="menu-title">SITE</span></a>
                    </li>
                  </ul>
                </li> -->
                <?php if ($data == 1) { ?>
                <li class="has-sub nav-item">
                  <a href=""><i class="ft-edit"></i>
                    <span data-i18n="" class="menu-title">MASTER</span>
                  </a>
                  <ul class="menu-content">
                    <li class="nav-item"><a href="#/area"><span data-i18n="" class="menu-title">AREA</span></a>
                    </li>
                    <li class="nav-item"><a href="#/floor"><span data-i18n="" class="menu-title">FLOOR</span></a>
                    </li>
                    <li class="nav-item"><a href="#/knowus"><span data-i18n="" class="menu-title">HOW TO KNOW</span></a>
                    </li>
                    <li class="nav-item"><a href="#/need"><span data-i18n="" class="menu-title">REUIRMENT</span></a>
                    </li>
                    <li class="nav-item"><a href="#/oldbuyer"><span data-i18n="" class="menu-title">OLD BUYER</span></a>
                    </li>
                    <li class="nav-item"><a href="#/purpose"><span data-i18n="" class="menu-title">PURPOSE</span></a>
                    </li>
                    <li class="nav-item"><a href="#/road"><span data-i18n="" class="menu-title">ROAD TYPE</span></a>
                    </li>
                    <li class="nav-item"><a href="#/roof"><span data-i18n="" class="menu-title">ROOF</span></a>
                    </li>
                    <li class="nav-item"><a href="#/type"><span data-i18n="" class="menu-title">TYPE</span></a>
                    </li>
                    <li class="nav-item"><a href="#/role"><span data-i18n="" class="menu-title">ROLE</span></a>
                    </li>
                    <li class="nav-item"><a href="#/abo"><span data-i18n="" class="menu-title">ABO</span></a>
                    </li>
                    <li class="nav-item"><a href="#/asp"><span data-i18n="" class="menu-title">ASP</span></a>
                    </li>
                    <li class="nav-item"><a href="#/mediator"><span data-i18n="" class="menu-title">MEDIATOR</span></a>
                    </li>
                    <li class="nav-item"><a href="#/users_data"><span data-i18n="" class="menu-title">USERS</span></a>
                    </li>
                  </ul>
                </li>
                <?php }?>
                <?php if ($data == 1 || $data == 2) { ?>
                <li class="">
                  <a href="#/property"><i class="ft-package"></i>
                    <span data-i18n="" class="menu-title">PROPERTY </span>
                  </a>
                </li >
                <?php }?>

                <?php if ($data == 1 || $data == 5) { ?>
                <li class="has-sub nav-item">
                  <a href=""><i class="ft-user-plus"></i>
                    <span data-i18n="" class="menu-title">ABO</span>
                  </a>
                  <ul class="menu-content">
                    <li class="nav-item"><a href="#/abo_assign"><span data-i18n="" class="menu-title">NEW ASSIGNMENT</span></a>
                    </li>
                  </ul>
                </li>
                <?php }?>


                <?php if ($data == 1 || $data == 4 || $data == 5) { ?>
                <li class="has-sub nav-item">
                  <a href=""><i class="ft-users"></i>
                    <span data-i18n="" class="menu-title">MEDIATOR</span>
                  </a>
                  <ul class="menu-content">
                    <li class="nav-item"><a href="#/mediator_assign"><span data-i18n="" class="menu-title">NEW ASSIGNMENT</span></a>
                    </li>
                    <!-- <li class="nav-item"><a href="#/promotersite"><span data-i18n="" class="menu-title">NEW ASSIGNMENT</span></a>
                    </li>
                    <li class="nav-item"><a href="#/promotersite"><span data-i18n="" class="menu-title">NEW ASSIGNMENT</span></a>
                    </li>   -->
                  </ul>
                </li>
                <?php }?>

                <?php if ($data == 1 || $data == 2) { ?>
                    <li class="has-sub nav-item">
                      <a href=""><i class="ft-user-plus"></i>
                        <span data-i18n="" class="menu-title">ASP </span>
                      </a>
                      <ul class="menu-content">
                        <li class="nav-item"><a href="#/aspdata"><span data-i18n="" class="menu-title">ASP DATA</span></a>
                        </li>
                      </ul>
                    </li>
                <?php }?>

                <?php if ($data == 1 || $data == 3) { ?>
                    <li class="has-sub nav-item">
                      <a href=""><i class="ft-user-plus"></i>
                        <span data-i18n="" class="menu-title">PROMOTER'S</span>
                      </a>
                      <ul class="menu-content">
                        <li class="nav-item"><a href="#/promotersite"><span data-i18n="" class="menu-title">SITE</span></a>
                        </li>
                      </ul>
                    </li>
                <?php }?>



                <?php if ($data == 1) { ?>
                    <li class="">
                      <a href="#/clientdata"><i class="ft-server"></i>
                        <span data-i18n="" class="menu-title">CLIENT DATA </span>
                      </a>
                    </li >
                    <?php }?>
                    <?php if ($data == 1) { ?>
                    <li class="">
                      <a href="#/refer"><i class="ft-server"></i>
                        <span data-i18n="" class="menu-title">ALL DATAS </span>
                      </a>
                    </li >
                <?php }?>


           <!--      <li class="has-sub nav-item">
                  <a href=""><i class="ft-layers"></i>
                    <span data-i18n="" class="menu-title">RENT & LEASE</span>
                  </a>
                  <ul class="menu-content">
                    <li class="nav-item"><a href="#/rent"><span data-i18n="" class="menu-title">PROPERTY</span></a>
                    </li>
                  </ul>
                </li>  -->
           <!--<li class="has-sub nav-item">
                  <a href=""><i class="ft-user"></i>
                    <span data-i18n="" class="menu-title">BUYER</span>
                  </a>
                  <ul class="menu-content">
                    <li class="nav-item"><a href="#/buyerseller"><span data-i18n="" class="menu-title">FOR BUY</span></a>
                    </li>
                    <li class="nav-item"><a href="#/buyerrent"><span data-i18n="" class="menu-title">FOR RENT&LEASE</span></a>
                    </li>
                  </ul>
                </li>  -->
                <hr>
              <?php if ($data == 1) { ?>
                <li class="has-sub nav-item"><a href=""><i class="ft-bar-chart-2"></i><span data-i18n="" class="menu-title">REPORTS</span></a>
                  <ul class="menu-content">
                       <?php if ($data == 1) { ?>
                        <li class="">
                          <a href="#/adminprop">
                            <span data-i18n="" class="menu-title">ADMIN PROPERTIES </span>
                          </a>
                        </li >
                      <?php }?>

                      <?php if ($data == 1) { ?>
                        <li class="">
                          <a href="#/otherprop">
                            <span data-i18n="" class="menu-title">OTHER PROPERTIES </span>
                          </a>
                        </li >
                      <?php }?>

                      <?php if ($data == 1) { ?>
                        <li class="">
                          <a href="#/completedprop">
                            <span data-i18n="" class="menu-title">COMPLETED PROPERTIES </span>
                          </a>
                        </li >
                      <?php }?>

                      <?php if ($data == 1) { ?>
                        <li class="">
                          <a href="#/roughdata">
                            <span data-i18n="" class="menu-title">ALL DETAILS</span>
                          </a>
                        </li >
                      <?php }?>
                      <?php if ($data == 1) { ?>
                        <li class="">
                          <a href="#/allprop">
                            <span data-i18n="" class="menu-title">ALL PROPERTIES</span>
                          </a>
                        </li >
                      <?php }?>
                      <?php if ($data == 1) { ?>
                        <li class="">
                          <a href="#/buyerprop/1">
                            <span data-i18n="" class="menu-title">BUYER REPORT</span>
                          </a>
                        </li >
                      <?php }?>
                      <?php if ($data == 1) { ?>
                        <li class="">
                          <a href="#/customer_follow_report">
                            <span data-i18n="" class="menu-title">SINGLE PROPERTY</span>
                          </a>
                        </li >
                      <?php }?>
                      <?php if ($data == 1) { ?>
                        <li class="">
                          <a href="#/mediator_follow_report">
                            <span data-i18n="" class="menu-title">MEDIATOR STATUS WISE</span>
                          </a>
                        </li >
                      <?php }?>
                      <?php if ($data == 1) { ?>
                        <li class="">
                          <a href="#/abooverall">
                            <span data-i18n="" class="menu-title">ABO OVERALL</span>
                          </a>
                        </li >
                      <?php }?>
                      <?php if ($data == 1) { ?>
                        <li class="">
                          <a href="#/mediatoroverall">
                            <span data-i18n="" class="menu-title">MEDIATOR OVERALL</span>
                          </a>
                        </li >
                      <?php }?>
                  </ul>
                </li>
              <?php }?>
                <li class="nav-item"><a  href="http://localhost:8000" target="_blank"><i class="ft-globe"></i><span data-i18n="" class="menu-title">GOTO WEBSITE</span></a>
                </li>
                <li class="nav-item"><a href="logout"><i class="ft-power"></i><span data-i18n="" class="menu-title">LOGOUT</span></a>
                </li>
            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
      </div>


      <!-- navication  -->
      <nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          </div>
        </div>
      </nav>
      <!-- / main menu-->

       <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper">
            <ui-view></ui-view>
          </div>
        </div>
       </div>

 <!-- BEGIN VENDOR JS-->

    <script src="admin-asset/js_datatables/datatables.min.js"></script>
    <!-- <script src="admin-asset/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script> -->
    <script src="admin-asset/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="admin-asset/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>

    <script src="admin-asset/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="admin-asset/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="admin-asset/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="admin-asset/vendors/js/jqBootstrapValidation.js" type="text/javascript"></script>
    <script src="admin-asset/js/app-sidebar.js" type="text/javascript"></script>

    <script src="/angular-libraries/angular.min.js"></script>
    <script src="/angular-libraries/angular-animate.min.js"></script>
    <script src="/angular-libraries/angular-ui-router.min.js"></script>
    <script src="/angular-libraries/moment.min.js"></script>
    <script src="/angular-libraries/angular-moment.min.js"></script>
    <script src="/angular-libraries/angular-locale_en-in.min.js"></script>
    <script src="/angular-libraries/select2.js"></script>
    <script src="/angular-libraries/angular-aria.min.js"></script>
    <script src="/angular-libraries/angular-messages.min.js"></script>
    <script type="text/javascript" src="admin-asset/js/fileupload.js"></script>

    <script src="/angular-libraries/angular-material.min.js"></script>
    <script src="/angular-libraries/bootstrap-colorpicker.js"></script>
    <script src="/angular-libraries/angular-wysiwyg.js"></script>

    <script type="text/javascript" src="/common-controller/config.js"></script>
    <script type="text/javascript" src="/admin-js/promoter.js"></script>
    <script type="text/javascript" src="/admin-js/master.js"></script>
    <script type="text/javascript" src="/admin-js/property.js"></script>
    <script type="text/javascript" src="/admin-js/buyer.js"></script>
    <script type="text/javascript" src="/admin-js/report.js"></script>
    <script type="text/javascript" src="/admin-js/client.js"></script>
    <script type="text/javascript" src="/admin-js/refer.js"></script>
    <script type="text/javascript" src="/admin-js/abo.js"></script>
    <script type="text/javascript" src="/admin-js/mediator.js"></script>
    <script type="text/javascript" src="/admin-js/aspdata.js"></script>
    <!-- <script type="text/javascript" src="/admin-js/seller.js"></script> -->
   <!--  <script type="text/javascript" src="/admin-js/tools_entry.js"></script>
    <script type="text/javascript" src="/admin-js/customer.js"></script>
    <script type="text/javascript" src="/admin-js/supplier.js"></script>
    <script type="text/javascript" src="/admin-js/bill.js"></script>
    <script type="text/javascript" src="/admin-js/purchase.js"></script>
    <script type="text/javascript" src="/admin-js/payment.js"></script>

     -->
    <!-- <script type="text/javascript" src="/admin-js/dc.js"></script> -->
    <!-- <script type="text/javascript" src="/admin-js/expenses.js"></script> -->
    <!-- <script type="text/javascript" src="/admin-js/auditor.js"></script> -->
    <!-- <script type="text/javascript" src="/admin-js/split.js"></script> -->
    <script type="text/javascript" src="/admin-js/dashboard.js"></script>

    <script type="text/javascript" src="admin-asset/js_datatables/pdfmake.min.js"></script>
    <script type="text/javascript" src="admin-asset/js_datatables/vfs_fonts.js"></script>
    <script src="admin-asset/js/kendo.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>


  </body>
</html>




