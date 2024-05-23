<!doctype html>
<html class="no-js" lang="zxx">


 @include('user.common.header')

<body>

<div class="wrapper">
 @include('user.common.menu')

    <!-- BREADCRUMB AREA START -->
  <div class="ltn__breadcrumb-area text-left  bg-image mb-0"  data-bg="/user-asset/img/bg/102.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 title-top">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title banner-head-color" >Buyer Rent Right Sidebar</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul class="banner-head-color">
                                <li><a href="/index"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                                <li class="banner-head-color">Buyer Rent  Right Sidebar</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-120 banner-bottom"  style="">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                               <div class="showing-product-number text-right">
                                     <span>Showing 
                                     @if($property == "no items")
                                            {{ $property }}
                                     @else 
                                     {{ $property->currentPage() }} of {{ $property->count() }} 
                                     @endif
                                     results</span>
                                </div> 
                            </li>
                            <li>
                               <div class="short-by text-center">
                                    <select class="nice-select">
                                        <option>Default Sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by new arrivals</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="#">
                                                <input type="text" name="search" placeholder="Search your keyword...">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                @if($property == "no items")
                  <div>
                    <p>{{ $property }}</p>
                  </div>
                @else
                @foreach ($property as $prop)  
                        <div class="col-lg-6">
                            <div class="ltn__product-item ltn__product-item-4 text-center---">
                                <div class="product-img">
                                    <a href=""><img src="uploads/buyer/gallery/{{ $prop['TypeData'] }}.jpg" alt=""></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge bg-green">For Sell</li>
                                        </ul>
                                    </div>
                                    <div class="product-img-location-gallery">
                                        <div class="product-img-location">
                                            <ul>
                                                <li>
                                                    <a href="locations.html"><i class="flaticon-pin"></i> {{ $prop['Area'] }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                      
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-price">
                                        <span>BR.No - {{ $prop['BuyerRentId'] }}<label></label>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>₹ {{ $prop['BudjetMin'] }} - {{ $prop['BudjetMax'] }}<label></label>
                                        </span>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Type - {{ $prop['TypeData'] }}</a></h2>
                                    
                                </div>
                                <div class="product-info-bottom">
                                    <div class="real-estate-agent">
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                           <!--  <li>
                                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                    <i class="flaticon-expand"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                    <i class="flaticon-heart-1"></i></a>
                                            </li> -->
                                            <li>
                                                <a href="/sellerproductdetail/{{ $prop['TypeId'] }}/{{ $prop['CategoryId'] }}/{{ $prop['PropertyId'] }}" title="Product Details">
                                                    <i class="flaticon-expand"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                @endif
                             
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="#">
                                                <input type="text" name="search" placeholder="Search your keyword...">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="img/product-3/1.jpg" alt="#"></a>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-badge-price">
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="sale-badg">For Rent</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>$34,900<label>/Month</label></span>
                                                    </div>
                                                </div>
                                                <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                                <div class="product-img-location">
                                                    <ul>
                                                        <li>
                                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                    <li><span>3 </span>
                                                        Bed
                                                    </li>
                                                    <li><span>2 </span>
                                                        Bath
                                                    </li>
                                                    <li><span>3450 </span>
                                                        Square Ft
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-info-bottom">
                                                <div class="real-estate-agent">
                                                    <div class="agent-img">
                                                        <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                                    </div>
                                                    <div class="agent-brief">
                                                        <h6><a href="team-details.html">William Seklo</a></h6>
                                                        <small>Estate Agents</small>
                                                    </div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="flaticon-expand"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="flaticon-heart-1"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details.html" title="Product Details">
                                                                <i class="flaticon-add"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="img/product-3/2.jpg" alt="#"></a>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-badge-price">
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="sale-badg">For Rent</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>$34,900<label>/Month</label></span>
                                                    </div>
                                                </div>
                                                <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                                <div class="product-img-location">
                                                    <ul>
                                                        <li>
                                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                    <li><span>3 </span>
                                                        Bed
                                                    </li>
                                                    <li><span>2 </span>
                                                        Bath
                                                    </li>
                                                    <li><span>3450 </span>
                                                        Square Ft
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-info-bottom">
                                                <div class="real-estate-agent">
                                                    <div class="agent-img">
                                                        <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                                    </div>
                                                    <div class="agent-brief">
                                                        <h6><a href="team-details.html">William Seklo</a></h6>
                                                        <small>Estate Agents</small>
                                                    </div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="flaticon-expand"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="flaticon-heart-1"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details.html" title="Product Details">
                                                                <i class="flaticon-add"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="img/product-3/3.jpg" alt="#"></a>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-badge-price">
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="sale-badg">For Rent</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>$34,900<label>/Month</label></span>
                                                    </div>
                                                </div>
                                                <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                                <div class="product-img-location">
                                                    <ul>
                                                        <li>
                                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                    <li><span>3 </span>
                                                        Bed
                                                    </li>
                                                    <li><span>2 </span>
                                                        Bath
                                                    </li>
                                                    <li><span>3450 </span>
                                                        Square Ft
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-info-bottom">
                                                <div class="real-estate-agent">
                                                    <div class="agent-img">
                                                        <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                                    </div>
                                                    <div class="agent-brief">
                                                        <h6><a href="team-details.html">William Seklo</a></h6>
                                                        <small>Estate Agents</small>
                                                    </div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="flaticon-expand"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="flaticon-heart-1"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details.html" title="Product Details">
                                                                <i class="flaticon-add"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="img/product-3/4.jpg" alt="#"></a>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-badge-price">
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="sale-badg">For Rent</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>$34,900<label>/Month</label></span>
                                                    </div>
                                                </div>
                                                <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                                <div class="product-img-location">
                                                    <ul>
                                                        <li>
                                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                    <li><span>3 </span>
                                                        Bed
                                                    </li>
                                                    <li><span>2 </span>
                                                        Bath
                                                    </li>
                                                    <li><span>3450 </span>
                                                        Square Ft
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-info-bottom">
                                                <div class="real-estate-agent">
                                                    <div class="agent-img">
                                                        <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                                    </div>
                                                    <div class="agent-brief">
                                                        <h6><a href="team-details.html">William Seklo</a></h6>
                                                        <small>Estate Agents</small>
                                                    </div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="flaticon-expand"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="flaticon-heart-1"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details.html" title="Product Details">
                                                                <i class="flaticon-add"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="img/product-3/5.jpg" alt="#"></a>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-badge-price">
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="sale-badg">For Rent</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>$34,900<label>/Month</label></span>
                                                    </div>
                                                </div>
                                                <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                                <div class="product-img-location">
                                                    <ul>
                                                        <li>
                                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                    <li><span>3 </span>
                                                        Bed
                                                    </li>
                                                    <li><span>2 </span>
                                                        Bath
                                                    </li>
                                                    <li><span>3450 </span>
                                                        Square Ft
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-info-bottom">
                                                <div class="real-estate-agent">
                                                    <div class="agent-img">
                                                        <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                                    </div>
                                                    <div class="agent-brief">
                                                        <h6><a href="team-details.html">William Seklo</a></h6>
                                                        <small>Estate Agents</small>
                                                    </div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="flaticon-expand"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="flaticon-heart-1"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details.html" title="Product Details">
                                                                <i class="flaticon-add"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            <ul>
                               @if($property == "no items")
                                  <div>
                                    <p>{{ $property }}</p>
                                  </div>
                                @else
                                   {{$property->links() }}
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <h3 class="mb-10">Advance Information</h3>
                        <label class="mb-30"><small>About 9,620 results (0.62 seconds) </small></label>
                        <!-- Advance Information widget -->
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title">Property Type</h4>
                            <ul>
                                <li>
                                    <label class="checkbox-item">House
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,924</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Single Family
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,610</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Apartment
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,912</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Office Villa
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,687</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Luxary Home
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">1,853</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Studio
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">893</span>
                                </li>
                            </ul>
                            <hr>
                            <h4 class="ltn__widget-title">Amenities</h4>
                            <ul>
                                <li>
                                    <label class="checkbox-item">Dishwasher
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,924</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Floor Coverings
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,610</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Internet
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,912</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Build Wardrobes
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,687</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Supermarket
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">1,853</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Kids Zone
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">893</span>
                                </li>
                            </ul>
                            <hr>
                            <h4 class="ltn__widget-title">Price Renge</h4>
                            <ul>
                                <li>
                                    <label class="checkbox-item">Low Budget
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">$5,000 - $10,000</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Medium
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">$10,000 - $30,000</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">High Budget
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">$30,000 Up</span>
                                </li>
                            </ul>
                            <hr>
                            <!-- Price Filter Widget -->
                            <div class="widget--- ltn__price-filter-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">Filter by price</h4>
                                <div class="price_filter">
                                    <div class="price_slider_amount">
                                        <input type="submit"  value="Your range:"/> 
                                        <input type="text" class="amount" name="price"  placeholder="Add Your Price" /> 
                                    </div>
                                    <div class="slider-range"></div>
                                </div>
                            </div>
                            <hr>
                            <h4 class="ltn__widget-title">Bed/bath</h4>
                            <ul>
                                <li>
                                    <label class="checkbox-item">Single
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,924</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Double
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,610</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Up To 3
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,912</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Up To 5
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,687</span>
                                </li>
                            </ul>
                            <hr>
                            <h4 class="ltn__widget-title">Catagory</h4>
                            <ul>
                                <li>
                                    <label class="checkbox-item">Buying
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,924</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Renting
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,610</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Selling
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,912</span>
                                </li>
                            </ul>
                        </div>
                        <!-- Category Widget -->
                        <div class="widget ltn__menu-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Product categories</h4>
                            <ul>
                                <li><a href="#">Body <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                <li><a href="#">Interior <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                <li><a href="#">Lights <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                <li><a href="#">Parts <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                <li><a href="#">Tires <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                <li><a href="#">Uncategorized <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                <li><a href="#">Wheel <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                            </ul>
                        </div>
                        <!-- Price Filter Widget -->
                        <div class="widget ltn__price-filter-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Filter by price</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input type="submit"  value="Your range:"/> 
                                    <input type="text" class="amount" name="price"  placeholder="Add Your Price" /> 
                                </div>
                                <div class="slider-range"></div>
                            </div>
                        </div>
                        <!-- Top Rated Product Widget -->
                        <div class="widget ltn__top-rated-product-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Top Rated Product</h4>
                            <ul>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="img/product/1.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">Mixel Solid Seat Cover</a></h6>
                                            <div class="product-price">
                                                <span>$49.00</span>
                                                <del>$65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="img/product/2.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">Brake Conversion Kit</a></h6>
                                            <div class="product-price">
                                                <span>$49.00</span>
                                                <del>$65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="img/product/3.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">Coil Spring Conversion</a></h6>
                                            <div class="product-price">
                                                <span>$49.00</span>
                                                <del>$65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Search Widget -->
                        <div class="widget ltn__search-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Search Objects</h4>
                            <form action="#">
                                <input type="text" name="search" placeholder="Search your keyword...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Tagcloud Widget -->
                        <div class="widget ltn__tagcloud-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Popular Tags</h4>
                            <ul>
                                <li><a href="#">Popular</a></li>
                                <li><a href="#">desgin</a></li>
                                <li><a href="#">ux</a></li>
                                <li><a href="#">usability</a></li>
                                <li><a href="#">develop</a></li>
                                <li><a href="#">icon</a></li>
                                <li><a href="#">Car</a></li>
                                <li><a href="#">Service</a></li>
                                <li><a href="#">Repairs</a></li>
                                <li><a href="#">Auto Parts</a></li>
                                <li><a href="#">Oil</a></li>
                                <li><a href="#">Dealer</a></li>
                                <li><a href="#">Oil Change</a></li>
                                <li><a href="#">Body Color</a></li>
                            </ul>
                        </div>
                        <!-- Size Widget -->
                        <div class="widget ltn__tagcloud-widget ltn__size-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Product Size</h4>
                            <ul>
                                <li><a href="#">S</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">XL</a></li>
                                <li><a href="#">XXL</a></li>
                            </ul>
                        </div>
                        <!-- Color Widget -->
                        <div class="widget ltn__color-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Product Color</h4>
                            <ul>
                                <li class="black"><a href="#"></a></li>
                                <li class="white"><a href="#"></a></li>
                                <li class="red"><a href="#"></a></li>
                                <li class="silver"><a href="#"></a></li>
                                <li class="gray"><a href="#"></a></li>
                                <li class="maroon"><a href="#"></a></li>
                                <li class="yellow"><a href="#"></a></li>
                                <li class="olive"><a href="#"></a></li>
                                <li class="lime"><a href="#"></a></li>
                                <li class="green"><a href="#"></a></li>
                                <li class="aqua"><a href="#"></a></li>
                                <li class="teal"><a href="#"></a></li>
                                <li class="blue"><a href="#"></a></li>
                                <li class="navy"><a href="#"></a></li>
                                <li class="fuchsia"><a href="#"></a></li>
                                <li class="purple"><a href="#"></a></li>
                                <li class="pink"><a href="#"></a></li>
                                <li class="nude"><a href="#"></a></li>
                                <li class="orange"><a href="#"></a></li>

                                <li><a href="#" class="orange"></a></li>
                                <li><a href="#" class="orange"></a></li>
                            </ul>
                        </div>
                        <!-- Banner Widget -->
                        <div class="widget ltn__banner-widget d-none">
                            <a href="shop.html"><img src="img/banner/banner-2.jpg" alt="#"></a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

    <!-- CALL TO ACTION START (call-to-action-6) -->

    <!-- CALL TO ACTION END -->
 @include('user.common.footer')

    <!-- MODAL AREA START (Quick View Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_modal" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                            <img src="img/product/4.png" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                </ul>
                                            </div>
                                            <h3>Brake Conversion Kit</h3>
                                            <div class="product-price">
                                                <span>$149.00</span>
                                                <del>$165.00</del>
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1">
                                                <ul>
                                                    <li>
                                                        <strong>Categories:</strong> 
                                                        <span>
                                                            <a href="#">Parts</a>
                                                            <a href="#">Car</a>
                                                            <a href="#">Seat</a>
                                                            <a href="#">Cover</a>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-2">
                                                <ul>
                                                    <li>
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                            <span>ADD TO CART</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-3">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i>
                                                            <span>Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="" title="Compare" data-toggle="modal" data-target="#quick_view_modal">
                                                            <i class="fas fa-exchange-alt"></i>
                                                            <span>Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="ltn__social-media">
                                                <ul>
                                                    <li>Share:</li>
                                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                    
                                                </ul>
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
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Add To Cart Modal) -->
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
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="img/product/1.png" alt="#">
                                        </div>
                                         <div class="modal-product-info">
                                            <h5><a href="product-details.html">Brake Conversion Kit</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Cart</p>
                                            <div class="btn-wrapper">
                                                <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                                                <a href="checkout.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                            </div>
                                         </div>
                                         <!-- additional-info -->
                                         <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="img/icons/payment.png" alt="#">
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
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Wishlist Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
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
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="img/product/7.png" alt="#">
                                        </div>
                                         <div class="modal-product-info">
                                            <h5><a href="product-details.html">Brake Conversion Kit</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Wishlist</p>
                                            <div class="btn-wrapper">
                                                <a href="wishlist.html" class="theme-btn-1 btn btn-effect-1">View Wishlist</a>
                                            </div>
                                         </div>
                                         <!-- additional-info -->
                                         <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="img/icons/payment.png" alt="#">
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
    <!-- MODAL AREA END -->

</div>
<!-- Body main wrapper end -->

  
</body>


</html>

