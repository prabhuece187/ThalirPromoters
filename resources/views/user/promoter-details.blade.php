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

    <meta property="og:url" content="http://www.thalirpromoters.com/promoterproductdetail/{{ $promoter['ProSiteId'] }}" />
    
    @if($promoter['SiteMap'] == "no items")
      <div>
        <meta property="og:image" content="/user-asset/img/logo.jpg" />
      </div>
    @else
    <meta property="og:image" content="http:///www.thalirpromoters.com/uploads/promoter/sitemap/{{ $promoter['SiteMap'] }}" />
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
   <div class="ltn__breadcrumb-area text-left  bg-image mb-0"  data-bg="/user-asset/img/bg/110.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 title-top">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title banner-head-color">Promoter Property Details</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul class="banner-head-color">
                                <li><a href="/index"><span class="ltn__secondary-color" style="color: #fff !important"><i class="fas fa-home"></i></span> Home</a></li>
                                <li class="banner-head-color">Promoter Property Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- IMAGE SLIDER AREA START (img-slider-3) -->
    <div class="ltn__img-slider-area mb-90 banner-bottom">
        <div class="container-fluid">
             @if (count($promotergallery) > 1)
                <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                    @foreach($promotergallery as $proimg)
                        <div class="col-lg-12">
                            <div class="ltn__img-slide-item-4">
                                <a href="/uploads/promoter/gallery/{{$proimg['ProGalleryImage']}}" data-rel="lightcase:myCollection">
                                    <img src="/uploads/promoter/gallery/{{$proimg['ProGalleryImage']}}" alt="Image">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
             @elseif(count($promotergallery) == 0) 
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
                        <img src="/uploads/promoter/gallery/{{$promotergallery[0]['ProGalleryImage']}}" alt="Image">
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
                                    <a class="bg-orange">For Sell</a>
                                </li>
                               <li>
                                    <a ><i class="far fa-comments"></i> 
                                     {{$commentcount}}
                                    </a>
                                </li>
                                <li class="ltn__blog-category">
                                    <a class="bg-orange"  href="https://wa.me?text=http://www.thalirpromoters.com/promoterproductdetail/{{ $promoter['ProSiteId'] }}" target="_blank">share Link</a>
                                </li>
                            </ul>
                        </div>

                        <h1>{{$promoter['PromoterName']}}</h1>
                        <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span> {{ $promoter['ProAddress']}} , {{ $promoter['ProStreet'] }} , {{$promoter['ProCity']}} - {{$promoter['ProPincode']}}</label>
                        
                        <h4 class="title-2">Property Detail</h4>  
                       <div class="property-detail-info-list section-bg-1 clearfix mb-60">   
                        <div class="row">
                         <div class="col-md-6">                      
                            <ul>
                                <li><label>Property Name:</label> <span>{{$promoter['PromoterName']}}</span></li>
                                <li><label>Property Area: </label> <span>{{$promoter['ProArea']}} {{$promoter['ProUnit']}}</span></li>
                                <li><label>No of Sites:</label> 
                                   <span>{{$promoter['FlatCount']}}</span>
                                </li>
                            </ul>
                         </div>
                         <div class="col-md-6">
                            <ul>
                                <li><label>Property Area:</label> <span>{{$promoter['ProArea']}}</span></li>
                                <li><label>Total Budjet:</label> <span>₹ {{$promoter['Budjet']}}</span></li>
                                <li><label>Property Status:</label> <span>For Sale</span></li>
                            </ul>
                        </div>
                      </div>
                    </div>

                <h4 class="title-2">Location</h4>
                <div class="property-details-google-map mb-60" style="height: auto">
                   You need this property location please <a target="blank" href="{{$promoter['ProLocation']}}" style="color:#01580a;font-weight: bold">Click Here </a>
                </div>

                <h4 class="title-2">Site Plan</h4>
                
                <div class="ltn__apartments-tab-content-inner">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="apartments-plan-img">
                            <img src="/uploads/promoter/sitemap/{{ $promoter['SiteMap'] }}" alt="#">
                        </div>
                    </div>
                    <div class="col-lg-8">                 
                         <div class="property-details-amenities mb-60">
                            <div class="row">
                             @foreach($promoterstatus as $prosta)
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <li>  
                                               <a href="javascript:void(0)" class="flat_select">
                                                <input type="hidden" id="idvalue" name="{{$prosta['FlatNo']}}" value="{{$prosta['FlatNo']}}"/>
                                                <span class="site-plan-span site-plan-{{ $prosta['Status'] }}" >{{ $prosta['FlatNo'] }}</span>
                                               </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                             @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>

                  <h4 class="title-2">Promoter Video</h4>
                  @if($promoter['ProGalleryVideo'] != null)
                      <div class="ltn__video-bg-img  bg-overlay-black-50 bg-image mb-60" style="width: 200px;min-height: 200px">
                        <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="/uploads/promoter/video/{{$promoter['ProGalleryVideo']}}" data-rel="lightcase:myCollection">
                            <i class="fa fa-play"></i>
                        </a>
                      </div>
                  @endif
                <div class="row">
                    <div class="col-md-12">
                          <div class="ltn__shop-details-tab-content-inner--- ltn__shop-details-tab-inner-2 ltn__product-details-review-inner mb-60">
                            <h4 class="title-2">Customer Reviews</h4>
                            <hr style="margin:5px !important">
                            <!-- comment-area -->
                            @if($comment == "no items")
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
                                @if($status != null)
                                  <p style="color: #01580a">{{$status}}</p>
                                @endif
                                <form action="/buyercomment" method="POST">
                                   @csrf
                                    <h4>Add a Review</h4>
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" placeholder="Type your Star Count only (1 to 5) ...." name="StarCount">
                                    </div>
                                    <div >
                                        <input type="text" name="PromoterName" value="{{$promoter['PromoterName']}}" hidden="">
                                    </div>
                                    <div >
                                        <input type="text" name="ProSiteId"  value="{{$promoter['ProSiteId']}}" hidden="">
                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea placeholder="Type your comments...." name="CommentDesc" ></textarea>
                                    </div>
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" placeholder="Type your name...." name="Name">
                                    </div>
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" placeholder="Type your email...." name="Email">
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

                        
                </div>
            </div>
        </div>
    </div>
</div>

 @include('user.common.footer')

    <!-- -------------------------- modal ----------------------------- -->

<div class="ltn__modal-area ltn__add-to-cart-modal-area">
    <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                 <div class="ltn__quick-view-modal-inner">
                     <div class="modal-product-item">
                        <div class="row">
                            <div class="col-12" >
                                <div class="modal-product-img" style="padding: 10px">
                                    <img src="/user-asset/img/logo.jpg" alt="#">
                                </div>
                            </div>
                            <div class="col-12">
                                 <div class="modal-product-info">
                                    <h5><a href="product-details.html">திருப்பூர் பகுதியில் இடம் வீடு தோட்டம் வாங்க விற்க
                                     தளிர் புரமோட்டர்ஸ்</a></h5>

                            <h4 class="title-2">FLAT Details</h4>  
                            <div class="property-detail-info-list section-bg-1 clearfix">
                                <div class="row">
                                  <div class="col-md-12 " id="flatdetails">

                                        
                                  </div>
                                </div>
                            </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- -------------------------- modal ----------------------------- -->

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','.flat_select',function(event){
            event.preventDefault();
             var stsid = $(this).closest('li').find('#idvalue').val();

             $.ajax({
                url:"promotersingleflat/"+stsid,
                method:"GET",
                data:{_token: "{{ csrf_token() }}"},
                success:function(data){
                  

                    var flat = data;
                    console.log(flat);


                   $('#add_to_cart_modal').modal();

                   $('#flatdetails').fadeIn().html(data);


                }
            });
             
        });


        
    });

   
</script>

</body>


</html>

