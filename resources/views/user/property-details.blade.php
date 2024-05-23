<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thalir Promoters </title>
    <meta name="Thalir Promoters" content="realestate,sell,buy,rent" />
    <meta name="description" content="Buy and sell - land, house, garden, industry in Tirupur area...Live and grow">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta property="og:title" content="thalirpromoters" />

    <meta property="og:url" content="http://www.thalirpromoters.com/propertydetail/{{ $property['PropertyId'] }}/{{ $property['NeedId'] }}" />
    
    @if($propertygallery == "no items")
      <div>
        <meta property="og:image" content="/user-asset/img/logo.jpg" />
      </div>
    @else
    <meta property="og:image" content="http:///www.thalirpromoters.com/uploads/property/gallery/{{$propertygallery['0']['PropertyGalleryImage']}}" />
    @endif
    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="/user-asset/img/logo.jpg" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="/user-asset/css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="/user-asset/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/user-asset/css/style.css">

    <link rel="stylesheet" href="/user-asset/css/coderplays.css">
    
    <!-- Responsive css -->
    <link rel="stylesheet" href="/user-asset/css/responsive.css">
</head>


 <header class="ltn__header-area ltn__header-5 ltn__header-logo-and-mobile-menu-in-mobile ltn__header-transparent gradient-color-4---">
        <!-- ltn__header-top-area start -->
    <!--     <div class="ltn__header-top-area top-area-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li><a href="mailto:myrealestate.city@gmail.com"><i class="icon-mail"></i> myrealestate.city@gmail.com</a></li>
                                <li><a href="locations.html"><i class="icon-placeholder"></i> 15/A, Tirupur</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="top-bar-right text-right">
                            <div class="ltn__top-bar-menu">
                                <ul>
                                    <li>
                                     
                                    </li>
                                    <li>
                                        <div class="ltn__social-media">
                                            <ul>
                                                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                
                                                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- ltn__header-top-area end -->
        
        <!-- ltn__header-middle-area start -->
        <!-- style="animation: 300ms ease-in-out 0s normal none 1 running fadeInDown;left: 0;position: fixed;top: 0;width: 100%; z-index: 999;" -->
        <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-black" style="background-color: #01580a;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="site-logo-wrap">
                            <div class="site-logo">
                                <a href="/index"><img src="/user-asset/img/logo.jpg" alt="Logo"  height="80px"></a>
                            </div>
                            <div class="get-support clearfix d-none">
                                <div class="get-support-icon">
                                    <i class="icon-call"></i>
                                </div>
                                <div class="get-support-info">
                                    <h6>Get Support</h6>
                                    <h4><a href="tel:+91 98 94 009 888">+91 98940 09888</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col header-menu-column menu-color-white">
                        <div class="header-menu d-none d-xl-block">
                            <nav>
                                <div class="ltn__main-menu">
                                    <ul>
                                        <li><a href="/index">Home</a></li>
                                        <li><a href="/promoterproduct">Promoter</a></li>
                                        <li><a href="/about">About Us</a></li>
                                        <li class="menu-icon"><a href="#">Our Services</a>
                                            <ul>
                                                <li><a href="/inaguration">From Registration to Inauguration</a></li>
                                                <li><a href="/support">Our Supporting Team</a></li>
                                                <li><a href="/verification">Property Verification</a></li>
                                                <li><a href="/commission">Service Charges</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li><a href="/promoterproduct">Promoter Properties</a></li> -->
                                        <!-- <li><a href="/admin-login">AdminLogin</a></li> -->
                                        <li><a href="#">Login</a>
                                            <ul>
                                                <li><a href="/admin-login">AspLogin</a></li>
                                                <li><a href="/adminuserlogin">TM Login</a></li>
                                                @if(session()->get('name') == 1)  
                                                    <li><a href="/admin-login/mediatorregister">Mediator Register</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                        <!-- <li><a href="/buyerrequest">Login</a></li> -->
                                        <li><a href="/help">Help</a></li>
                                        <!-- <li><a href="/userregister">For Registration</a></li> -->
                                        <!-- <li><a href="/admin-login">Admin</a></li> -->
                                     <!--    <li class="menu-icon"><a href="#">Buyer</a>
                                            <ul>
                                                <li><a href="/buyerrequest">For Buy</a></li>
                                                <li><a href="/buyerrequest">For Rent</a>
                                                </li>
                                            </ul>
                                        </li> -->
                                     <!--    <li class="menu-icon"><a href="#">Pages</a>
                                            <ul class="mega-menu">
                                                <li><a href="#">Inner Pages</a>
                                                    <ul>
                                                        <li><a href="portfolio.html">Portfolio</a></li>
                                                        <li><a href="portfolio-2.html">Portfolio - 02</a></li>
                                                        <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                                        <li><a href="team.html">Team</a></li>
                                                        <li><a href="team-details.html">Team Details</a></li>
                                                        <li><a href="faq.html">FAQ</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Inner Pages</a>
                                                    <ul>
                                                        <li><a href="history.html">History</a></li>
                                                        <li><a href="add-listing.html">Add Listing</a></li>
                                                        <li><a href="locations.html">Google Map Locations</a></li>
                                                        <li><a href="404.html">404</a></li>
                                                        <li><a href="contact.html">Contact</a></li>
                                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Shop Pages</a>
                                                    <ul>
                                                        <li><a href="shop.html">Shop</a></li>
                                                        <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                                                        <li><a href="shop-right-sidebar.html">Shop right sidebar</a></li>
                                                        <li><a href="shop-grid.html">Shop Grid</a></li>
                                                        <li><a href="product-details.html">Shop details </a></li>
                                                        <li><a href="cart.html">Cart</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="shop.html"><img src="/user-asset/img/banner/menu-banner-1.jpg" alt="#"></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li class="special-link">
                                            <a href="add-listing.html">Add Listing</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="ltn__header-options ltn__header-options-2 ">
                        <!-- Mobile Menu Button -->
                        <div class="mobile-menu-toggle d-xl-none">
                            <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-middle-area end -->
    </header>

    <div class="fixed">
      <a class="scorll-icon" href="https://wa.me/919894009888?text=Hi%20Thalir%20Promoters,%20Please%20Share%20Details" target="_blank" style="position: fixed"><i class="fab fa-whatsapp" style="padding: 8px"></i></a>
      <a class="scorll-icon1" href="tel:+91 93626 88881" style="position: fixed"><i class="icon-call" style="padding: 8px"></i></a>
    </div>

<body>

<div class="body-wrapper">

 @include('user.common.menu')

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left  bg-image mb-0"  data-bg="/user-asset/img/bg/100.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 title-top">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title banner-head-color"> Property Details</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul class="banner-head-color">
                                <li><a href="/index"><span class="ltn__secondary-color" style="color: #fff !important"><i class="fas fa-home"></i></span> Home</a></li>
                                <li class="banner-head-color"> Property Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- IMAGE SLIDER AREA START (img-slider-3) -->
    <div class="ltn__img-slider-area mb-90 banner-bottom" >
        <div class="container-fluid">
             @if($propertygallery == "no items")
                <div class="row">
                    <div class="col-12 ">
                      <div class="col-6 align-self-center ">
                        <img src="/user-asset/img/logo.jpg" alt="Image">
                      </div>
                    </div>
                </div>
             @elseif (count($propertygallery) > 1)
                <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                    @foreach($propertygallery as $proimg)
                        <div class="col-lg-12">
                            <div class="ltn__img-slide-item-4">
                                <a href="/uploads/property/gallery/{{$proimg['PropertyGalleryImage']}}" data-rel="lightcase:myCollection">
                                <img src="/uploads/property/gallery/{{$proimg['PropertyGalleryImage']}}" alt="Image">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
             @elseif(count($propertygallery) == 0) 
               <div class="row">
                    <div class="col-12 ">
                      <div class="col-6 align-self-center ">
                        <img src="/uploads/main/noimg.jpg" alt="Image">
                      </div>
                    </div>
                </div>
             @else
                <div class="row">
                    <div class="col-12 ">
                      <div class="col-6 align-self-center ">
                        <img src="/uploads/property/gallery/{{$propertygallery[0]['PropertyGalleryImage']}}" alt="Image">
                      </div>
                    </div>
                </div>
             @endif
        </div>
    </div>
    <!-- IMAGE SLIDER AREA END -->

    <!-- SHOP DETAILS AREA START -->



    <div class="ltn__shop-details-area pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a class="bg-orange">{{ $property['NeedName'] }}</a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i>{{ date_format (new DateTime($property['PropertyDate']), 'd-m-Y')}}
                                </li>
                                <li>
                                    <a><i class="far fa-comments"></i> 
                                      {{$commentcount}}
                                    </a>
                                </li>
                                <li class="ltn__blog-category">
                                    <a class="bg-orange"  href="https://wa.me?text=http://www.thalirpromoters.com/propertydetail/{{ $property['PropertyId'] }}/{{ $property['NeedId'] }}" target="_blank">share Link</a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-price">
                        <!-- <span>Se.No - {{ $property['PropertyId'] }}<label></label></span>
                        <br><span>Reg.No - {{ $property['PropertyRegNo'] }}<label></label></span> -->
                        </div>
                        <h4 style="margin:10px">{{$property['PropertyName']}}  ₹ {{$property['PropertyTotalBudget']}} {{$property['PropertyTotalValType']}}</h4>
                        @if($property['PropertyAddress'])
                        <label>
                            <span class="ltn__secondary-color">
                                <i class="flaticon-pin"></i>
                            </span>{{ $property['PropertyAddress']}}
                        </label>
                        @endif

                        <h4 class="title-2">Property Details</h4>  
                           <div class="property-detail-info-list section-bg-1 clearfix">
                              <div class="row">
                                <div class="col-md-6" style="position: relative;">


                                @if($property['PropertyStatus'] == 'Completed')
                                <p class="watermark" 
                                style=" position:absolute ;font-weight: bold;font-size: 30px;text-align: center;color: #ff0000;top:60px;transform: rotate(-35deg) scale(1.7, 1.5);" >
                                  Sold Out
                                </p>
                                @endif
                                    <ul>
                                        @if($property['PropertyId'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Se.No :</label> 
                                            <span>{{ $property['PropertyId'] }}</span>
                                        </li>
                                        @endif
                                        @if($property['PropertyRegNo'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Reg.No Name :</label> 
                                            <span>{{ $property['PropertyRegNo'] }}</span>
                                        </li>
                                        @endif
                                        @if($property['PropertyName'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Property Name :</label> 
                                            <span>
                                            {{$property['PropertyName']}}
                                            </span>
                                        </li>
                                        @endif
                                        @if($property['PropertyLandSize'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Size :</label> 
                                            <span>
                                            {{$property['PropertyLandSize']}}
                                            </span>
                                        </li>
                                        @endif
                                        @if($property['NeedName'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Requirement : </label> 
                                            <span>{{$property['NeedName']}}</span>
                                        </li>
                                        @endif
                                        @if($property['TypeName'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Type : </label> 
                                            <span>{{$property['TypeName']}}</span>
                                        </li>
                                        @endif
                                        @if($property['PropertyIndividualBudget'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Rate Per Unit :</label> 
                                            <span>₹ {{$property['PropertyIndividualBudget']}}</span>
                                        </li>
                                        @endif
                                        @if($property['PropertyTotalBudget'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Rate :</label> 
                                            <span>₹ {{$property['PropertyTotalBudget']}}
                                              @if($property['PropertyTotalValType'] == 'Lakhs')   
                                                 Lakhs
                                              @endif  
                                              @if($property['PropertyTotalValType'] == 'K')   
                                                 Thousand
                                              @endif
                                              @if($property['PropertyTotalValType'] == 'Cr')   
                                                 Crore
                                              @endif  
                                            </span>
                                        </li>
                                        @endif
                                        <li>
                                            <label style="margin-bottom:0px !important;">Land Facing :</label> 
                                            <span> 
                                               @if($property['PropertyNorth'] == 1)
                                                <!-- <li> -->
                                                    <label style="margin-bottom:0px !important;">North,
                                                        <!-- <input type="checkbox" value="{{$property['PropertyNorth']}}" checked="checked"> -->
                                                        <!-- <span class="checkmark"></span> -->
                                                    </label>
                                                <!-- </li>  -->
                                                @endif  
                                                @if($property['PropertySouth'] == 1)
                                                 <!-- <li> -->
                                                    <label style="margin-bottom:0px !important;">South,

                                                        <!-- <input type="checkbox" value="{{$property['PropertySouth']}}" checked="checked"> -->
                                                        <!-- <span class="checkmark"></span> -->
                                                    </label>
                                                <!-- </li>  -->
                                                 @endif 
                                                @if($property['PropertyEast'] == 1) 
                                                 <!-- <li> -->
                                                    <label style="margin-bottom:0px !important;">East,
                                                        <!-- <input type="checkbox" value="{{$property['PropertyEast']}}" checked="checked"> -->
                                                        <!-- <span class="checkmark"></span> -->
                                                    </label>
                                                <!-- </li>   -->
                                                 @endif 
                                                 @if($property['PropertyWest'] == 1) 
                                                 <!-- <li> -->
                                                    <label style="margin-bottom:0px !important;">West,
                                                        <!-- <input type="checkbox" value="{{$property['PropertyWest']}}" checked="checked"> -->
                                                        <!-- <span class="checkmark"></span> -->
                                                    </label>
                                                <!-- </li>  -->
                                                 @endif 
                                                @if($property['PropertyCorner'] == 1)  
                                                 <!-- <li> -->
                                                    <label style="margin-bottom:0px !important;">Corner
                                                        <!-- <input type="checkbox" value="{{$property['PropertyCorner']}}" checked="checked"> -->
                                                        <!-- <span class="checkmark"></span> -->
                                                    </label>
                                                <!-- </li> -->
                                                @endif
                                            </span>
                                        </li>
                                         <li><label style="margin-bottom:0px !important;">Building Facing:</label> 
                                            <span> 
                                               @if($property['PropertyBuildNorth'] == 1)
                                                <!-- <li> -->
                                                    <label style="margin-bottom:0px !important;" >North,
                                                        <!-- <input type="checkbox" value="{{$property['PropertyBuildNorth']}}" checked="checked">
                                                        <span class="checkmark"></span> -->
                                                    </label>
                                                <!-- </li>  -->
                                                @endif  
                                                @if($property['PropertyBuildSouth'] == 1)
                                                 <!-- <li> -->
                                                    <label style="margin-bottom:0px !important;" >South,
                                                        <!-- <input type="checkbox" value="{{$property['PropertyBuildSouth']}}" checked="checked">
                                                        <span class="checkmark"></span> -->
                                                    </label>
                                                <!-- </li>  -->
                                                 @endif 
                                                @if($property['PropertyBuildEast'] == 1) 
                                                 <!-- <li> -->
                                                    <label style="margin-bottom:0px !important;" >East,
                                                        <!-- <input type="checkbox" value="{{$property['PropertyBuildEast']}}" checked="checked">
                                                        <span class="checkmark"></span> -->
                                                    </label>
                                                <!-- </li>   -->
                                                 @endif 
                                                 @if($property['PropertyBuildWest'] == 1) 
                                                 <!-- <li> -->
                                                    <label style="margin-bottom:0px !important;">West,
                                                       <!--  <input type="checkbox" value="{{$property['PropertyBuildWest']}}" checked="checked">
                                                        <span class="checkmark"></span> -->
                                                    </label>
                                                <!-- </li>  -->
                                                 @endif 
                                                @if($property['PropertyBuildCorner'] == 1)  
                                                 <!-- <li> -->
                                                    <label style="margin-bottom:0px !important;">Corner
                                                        <!-- <input type="checkbox" value="{{$property['PropertyBuildCorner']}}" checked="checked">
                                                        <span class="checkmark"></span> -->
                                                    </label>
                                                 <!-- </li> -->
                                                @endif
                                             </span>
                                        </li>
                                    </ul>
                                </div> 
                                <div class="col-md-6">
                                   <ul>
                                        @if($property['AreaName'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Property Area : </label> 
                                            <span>{{$property['AreaName']}}</span>
                                        </li>
                                        @endif
                                        @if($property['PropertyAreaDetail'])
                                        <li>
                                            <label style="margin-bottom:0px !important;"> Area Detail : </label> 
                                            <span>{{$property['PropertyAreaDetail']}}</span>
                                        </li>
                                        @endif
                                        @if($property['RoadName'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Road Type :</label> 
                                            <span>{{$property['RoadName']}}</span>
                                        </li>
                                        @endif
                                        @if($property['PropertyRoadSize'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Road Wide :</label> 
                                            <span> {{$property['PropertyRoadSize']}}</span>
                                        </li>
                                        @endif
                                        @if($property['PropertyRoadBase'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Road Base :</label> 
                                            <span> {{$property['PropertyRoadBase']}}</span>
                                        </li>
                                        @endif
                                        @if($property['PropertyBuildingSize'])
                                         <li>
                                            <label style="margin-bottom:0px !important;">Building Size :</label> 
                                            <span> {{$property['PropertyBuildingSize']}}</span>
                                        </li>
                                        @endif
                                        @if($property['PropertyBuildingAge'])
                                         <li>
                                            <label style="margin-bottom:0px !important;">Building Size :</label> 
                                            <span> {{$property['PropertyBuildingAge']}}</span>
                                        </li>
                                        @endif
                                        @if($property['PropertyOwnerName'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Name :</label> 
                                            <span> {{$property['PropertyOwnerName']}}</span>
                                        </li>
                                        @endif
                                         @if($property['PropertyOwnerName'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Cell Number :</label> 
                                            <span> {{$property['PropertyOwnerNumber']}}</span>
                                        </li>
                                        @endif
                                        @if($property['PurposeName'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Purpose :</label> 
                                            <span>{{$property['PurposeName']}}</span>
                                        </li>
                                        @endif
                                        @if($property['FloorName'])
                                        <li>
                                            <label style="margin-bottom:0px !important;">Floor :</label> 
                                            <span>{{$property['FloorName']}}</span>
                                        </li>
                                        @endif

                                        @if(session()->get('name') == 1)
                                            @if($property['PropertyReferName'])
                                                <li>
                                                    <label style="margin-bottom:0px !important;">Name :</label> 
                                                    <span> {{$property['PropertyReferName']}}</span>
                                                </li>
                                            @endif
                                             @if($property['PropertyReferNumber'])
                                                <li>
                                                    <label style="margin-bottom:0px !important;">Cell Number :</label> 
                                                    <span> {{$property['PropertyReferNumber']}}</span>
                                                </li>
                                            @endif
                                        @endif


                                    </ul>
                                </div>
                            </div>
                         </div>
<!-- 
                        <h4 class="title-2">NOTED</h4>
                        <p style="background-color: var(--section-bg-1);">Kindly check the availability of this property with thalir Promoters.. இந்த இடம் உள்ளதா என்று தளிர் புரமோட்டர்ஸ் கேட்டு உறுதி செய்து கொள்ளுங்கள்</p> -->

                        

                        <h4 class="title-2">Full Details</h4>
                        @if($property['PropertyDescription'])
                          <p style="color:#000;font-weight: bold;border: 20px double #01580a;padding: 14px;" >{!! $property['PropertyDescription'] !!}</p>
                        @endif


                        <h4 class="title-2">Additional Property Details</h4>  
                        <div class="property-detail-info-list section-bg-1 clearfix ">
                          <div  class="row">
                              @if($propertyeb != "no items")
                              <div class="col-lg-6">
                                <ul>
                                    <li><label>EB Source:</label> 
                                        <span> 
                                            <li>
                                              <table class="table"> 
                                                <thead>
                                                  <th>Source</th>
                                                  <th>Count</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($propertyeb as $proeb)
                                                    <tr>
                                                        <td>{{$proeb['PropertyEbStatus']}}</td>
                                                        <td>{{$proeb['PropertyEbDetail']}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                              </table>
                                            </li> 
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @if($propertyeb != "no items")
                            <div class="col-lg-6">
                                <ul>
                                    <li><label>Water Source:</label> 
                                        <span> 
                                            <li>
                                              <table class="table"> 
                                                <thead>
                                                  <th>Source</th>
                                                  <th>Count</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($propertywater as $prowate)
                                                    <tr>
                                                        <td>{{$prowate['PropertyWaterSource']}}</td>
                                                        <td>{{$prowate['PropertyWaterDetail']}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                              </table>
                                            </li> 
                                         </span>
                                    </li>
                                </ul>
                            </div>
                            @endif
                          </div>  
                        </div> 


                    <h4 class="title-2">Property Video</h4>
                      @if($property['PropertyGalleryVideo'] != null)
                          <div class="ltn__video-bg-img  bg-overlay-black-50 bg-image mb-60" style="width: 200px;min-height: 200px">
                            <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="/uploads/property/video/{{$property['PropertyGalleryVideo']}}" data-rel="lightcase:myCollection">
                                <i class="fa fa-play"></i>
                            </a>
                          </div>
                      @endif 

                    @if(session()->get('name') == 1)  
                    <h4 class="title-2">Document Images</h4>
                        @if($propertydocument != "no items")
                        <div class="row">
                              @foreach($propertydocument as $prodoc)
                              
                                  <div class="col-4" >
                                        <img class="img-fluid" style="width: 250px;height: 250px;padding: 5px" src="/uploads/property/document/{{$prodoc['PropertyDocumentName']}}" alt="Image">
                                  </div>
                              
                              @endforeach
                              </div>
                        @endif      
                     @endif           

                    <h4 class="title-2">Location</h4>
                    <div class="property-details-google-map mb-60" style="height: auto">
                       You need this property location please <a target="blank" href="{{$property['PropertyLocation']}}" style="color:#01580a;font-weight: bold">Click Here </a>
                    </div>

                    @if(session()->get('name') == 1) 
                    <h4 class="title-2">Spot Location</h4>
                    <div class="property-details-google-map mb-60" style="height: auto">
                       You need this property location please <a target="blank" href="{{$property['PropertyLocationSpot']}}" style="color:#01580a;font-weight: bold">Click Here </a>
                    </div>
                    @endif
               
                    <div class="ltn__shop-details-tab-content-inner--- ltn__shop-details-tab-inner-2 ltn__product-details-review-inner mb-60">
                        <h4 class="title-2">Customer Reviews</h4>
                        <div class="product-ratting">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                <li class="review-total"> <a href="#"> ( {{$commentcount}} Reviews )</a></li>
                            </ul>
                        </div>
                        <hr style="margin: 0px">
                        <!-- comment-area -->
                           <!-- comment-area -->
                        @if($comment == "no comments")
                          <div>
                            <p>{{ $comment }}</p>
                          </div>
                        @else
                        @foreach ($comment as $comments) 
                        <div class="ltn__comment-area mb-30">
                            <div class="ltn__comment-inner">
                                <ul>
                                    <li>
                                        <div class="ltn__comment-item clearfix">
                                            <div class="ltn__commenter-comment">
                                                <h6><a href="#">  {{$comments['Name']}}</a></h6>
                                                <div class="product-ratting">
                                                    <ul>
                                                       @for ($i =0; $i <  $comments['StarCount']; $i++)
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                       @endfor  
                                                    </ul>
                                                </div>
                                                <p>  {{$comments['CommentDesc']}}</p>
                                                <span class="ltn__comment-reply-btn">  {{ date_format (new DateTime($comments['CommentDate']), 'd-m-Y')}}</span>
                                            </div>
                                        </div>
                                    </li>
                                
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!-- comment-reply -->
                        <div class="ltn__comment-reply-area ltn__form-box mb-30">
                            <form action="/buyercomment" method="POST">
                               @csrf
                                <h4>Add a Review</h4>
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input type="text" placeholder="Type your Star Count only (1 to 5) ...." name="StarCount">
                                </div>
                                <div >
                                    <input type="text" name="PropertyName" value="{{$property['PropertyName']}}" hidden="">
                                </div>
                                <div >
                                    <input type="text" name="PropertyId"  value="{{$property['PropertyId']}}" hidden="">
                                </div>
                                <div >
                                    <input type="text" name="TypeId"  value="{{$property['TypeId']}}" hidden="">
                                </div>
                                <div class="input-item input-item-textarea ltn__custom-icon">
                                    <textarea placeholder="Type your comments...." name="CommentDesc" ></textarea>
                                </div>
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input type="text" placeholder="Type your name...." name="Name">
                                </div>
                                <div class="input-item input-item-call ltn__custom-icon">
                                    <input type="text" placeholder="Type your Number...." name="Email">
                                </div>
                                <div class="btn-wrapper">
                                    <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>

             
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

 @include('user.common.footer')
    <!-- FOOTER AREA END -->

</div>
<!-- Body main wrapper end -->

  
</body>


</html>

