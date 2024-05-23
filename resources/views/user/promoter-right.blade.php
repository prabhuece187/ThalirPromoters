<!doctype html>
<html class="no-js" lang="zxx">


 @include('user.common.header')

<body>

<div class="wrapper">
 @include('user.common.menu')

    <!-- BREADCRUMB AREA START -->
  <div class="ltn__breadcrumb-area text-left  bg-image mb-0"  data-bg="/user-asset/img/bg/110.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 title-top">
                    <div class="ltn__breadcrumb-inner" >
                        <h1 class="page-title banner-head-color" >Promoter Property Details</h1>
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

  
    <div class="ltn__header-options ltn__header-options-2 mb-sm-20 d-xl-none" style="justify-content: normal;padding:20px 0px 0px 20px">
        <div class="mini-cart-icon">
            <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle  common_selector" style="border:1px solid #000">
                <!-- <i class="fas fa-filter"></i> -->
                <p style="color: #000">Filter</p>
            </a>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-120 banner-bottom"  style="">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-3 d-none d-xl-block">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <h3 class="mb-10">Advance Filters</h3>
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title"> Search </h4>
                            <div class="row">
                                <div class="col-lg-8 col-sm-6 col-6">
                                    <input type="text" style="height: 40px" class="prosearchdata"  value="" name="prosearchdata" />
                                </div>

                                <div class="col-lg-2">
                                    <button type="submit" class="searchbutton" style="padding:6px 14px;margin-left: 13px;"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                            
                            <!-- <hr>
                            <h4 class="ltn__widget-title">List By </h4>
                            <ul>
                                <li>
                                    <label class="checkbox-item">வாங்க/Buyer
                                        <input type="checkbox" class="common_selector need" value="">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="checkbox-item">விற்க/Seller
                                        <input type="checkbox" class="common_selector need" value="">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="checkbox-item">வாடகைக்கு தேவை/ Tenant
                                        <input type="checkbox" class="common_selector need" value="">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul> -->
                            <hr>
                            <h4 class="ltn__widget-title">Area</h4>
                            <ul>
                                @foreach ($area as $areas) 
                                <li>
                                    <label class="checkbox-item">{{ $areas['AreaName'] }}
                                        <input type="checkbox" class="common_selector area" value="{{ $areas['AreaId'] }}">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                            <hr>
                            <h4 class="ltn__widget-title">Distance</h4>
                            <div class="row">
                                <div class="col-lg-8 col-sm-6 col-6">
                                    <input type="text" style="height: 40px" class="prodistancedata"  value="" name="prodistancedata" />
                                </div>

                                <div class="col-lg-2">
                                    <button type="submit" class="searchbutton" style="padding:6px 14px;margin-left: 13px;"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                            <hr>
                            <!-- Price Filter Widget -->
                            <div class="widget--- ltn__price-filter-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">Filter by price(min - max)</h4>
                                <div class="price_filter">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" style="height: 40px"  id="hidden_minimum_price" value="0" name="hidden_minimum_price" />
                                        </div>
                                        <div class="col-lg-3">
                                          <select class="nice-select" id="minamt">
                                            <option>Lakhs</option>
                                            <option>Cr</option>
                                            <option>K</option>
                                          </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" style="height: 40px" id="hidden_maximum_price" value="0" name="hidden_maximum_price" />
                                        </div>
                                        <div class="col-lg-3">
                                          <select class="nice-select" id="maxamt">
                                            <option>Lakhs</option>
                                            <option>Cr</option>
                                            <option>K</option>
                                          </select>
                                        </div>
                                       <div class="col-lg-2">
                                            <button type="submit" class="pricechange" style="padding:6px 14px;margin-left: 13px;"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                      
                        </div>  
                        <!-- Category Widget -->
                    </aside>
                </div>
                <div class="col-lg-9 filter_data">
                   @include('user.promoterproduct')
                </div>
                
            </div>
        </div>
    </div>

  
 <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar" style="height: 125%">
            <div class="ltn__utilize-menu-head">
                <span class="ltn__utilize-menu-title">Advance Filters</span>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="mini-cart-product-area ltn__scrollbar" >
              <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar" style="margin-top: 5px">
                        <div class="widget ltn__menu-widget">

                            <h4 class="ltn__widget-title"> Search </h4>
                            <div class="row">
                                <div class="col-lg-8 col-sm-6 col-6">
                                    <input type="text" style="height: 40px" class="prosearchdata1"  value="" name="prosearchdata1" />
                                </div>
                                <div class="col-lg-2 col-sm-6 col-6">
                                    <button type="submit" class="searchbutton2" style="padding:6px 14px;margin-left: 13px;"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                            
                            <!-- <hr>
                             <h4 class="ltn__widget-title">I Am Looking </h4>
                             <ul>
                              <li>
                                    <label class="checkbox-item">வாங்க/Buyer
                                        <input type="checkbox" class="common_selector need" value="">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="checkbox-item">விற்க/Seller
                                        <input type="checkbox" class="common_selector need" value="">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="checkbox-item">வாடகைக்கு தேவை/ Tenant
                                        <input type="checkbox" class="common_selector need" value="">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul> -->

                             <hr>
                            <h4 class="ltn__widget-title">Area</h4>
                            <ul>
                                @foreach ($area as $areas) 
                                <li>
                                    <label class="checkbox-item">{{ $areas['AreaName'] }}
                                        <input type="checkbox" class="common_selector area" value="{{ $areas['AreaId'] }}">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                            <hr>
                            <h4 class="ltn__widget-title">Distance</h4>
                            <div class="row">
                                <div class="col-lg-8 col-sm-6 col-6">
                                    <input type="text" style="height: 40px" class="prodistancedata2"  value="" name="prodistancedata2" />
                                </div>

                                <div class="col-lg-2">
                                    <button type="submit" class="searchbutton" style="padding:6px 14px;margin-left: 13px;"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                            
                            <hr>
                            <!-- Price Filter Widget -->
                            <div class="widget--- ltn__price-filter-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">Filter by price(min - max)</h4>
                                <div class="price_filter">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <input type="text" style="height: 40px"  id="hidden_minimum_price1" value="0" name="hidden_minimum_price1" />
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                          <select class="nice-select" id="minamt">
                                            <option>Lakhs</option>
                                            <option>Cr</option>
                                            <option>K</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <input type="text" style="height: 40px" id="hidden_maximum_price1" value="0" name="hidden_maximum_price1" />
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                          <select class="nice-select" id="maxamt">
                                            <option>Lakhs</option>
                                            <option>Cr</option>
                                            <option>K</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-2">
                                            <button type="submit" class="pricechangemob" style="padding:6px 14px;margin-left: 13px;"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                             <h4 class="ltn__widget-title">Budget Sort</h4>
                             <ul style="list-style-type: none;">
                                <li>
                                    <label class="checkbox-item">Low To High
                                        <input type="checkbox" class="common_selector sort" value="asc">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-item">High To Low
                                        <input type="checkbox" class="common_selector sort" value="desc">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul> 
                            </div>
                            </div>
              
                 
                        </div>  
                        <!-- Category Widget -->
                    </aside>
            </div>
        </div>
  </div>
 
    
    <!-- PRODUCT DETAILS AREA END -->

    <!-- CALL TO ACTION START (call-to-action-6) -->

    <!-- CALL TO ACTION END -->
 @include('user.common.footer')

</div>
<!-- Body main wrapper end -->

<script type="text/javascript">

    $(document).ready(function(){
        $(document).on('click','.pagination a',function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            filter_data(page);
        });
    });
   
    function filter_data(page)
    {  
        var action = 'promoterproduct';
        var min = $('#hidden_minimum_price').val();    
        var max = $('#hidden_maximum_price').val();
        var minamt = $('#minamt').val();
        var maxamt = $('#maxamt').val();
        var prosearch = $('.prosearchdata').val();
        var prodistance = $('.prodistancedata').val();
        
        var minimum_price = min ;
        var minimum_amt = minamt;
        var maximum_price = max ;
        var maximum_amt = maxamt;

        var area = get_filter('area');

        $.ajax({
            url:"promoterproduct?page="+ page,
            method:"GET",
            data:{action:action,minimum_price:minimum_price,maximum_price:maximum_price,minimum_amt:minimum_amt,maximum_amt:maximum_amt,prosearch:prosearch,prodistance:prodistance,area:area, _token: "{{ csrf_token() }}"},
            success:function(data){
             $('.filter_data').html(data);
            }
        });
    }


    function filter_data2(page)
    {  
        var action = 'promoterproduct';
        var min = $('#hidden_minimum_price1').val();
        var max = $('#hidden_maximum_price1').val();
        var minamt = $('#minamt').val();
        var minimum_price = min ;
        var minimum_amt = minamt;
        var maximum_price = max ;
        var maximum_amt = maxamt;

        var prodistance2 = $('.prodistancedata2').val();
        var prosearch1 = $('.prosearchdata1').val();

        var area = get_filter('area');

        $.ajax({
            url:"promoterproduct?page="+ page,
            method:"GET",
            data:{area:area,action:action,minimum_price:minimum_price,maximum_price:maximum_price,minimum_amt:minimum_amt,maximum_amt:maximum_amt,prodistance2:prodistance2,prosearch1:prosearch1, _token: "{{ csrf_token() }}"},
            success:function(data){
             $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
       var action = 'promoterproduct';
        var min = $('#hidden_minimum_price').val();    
        var max = $('#hidden_maximum_price').val();
        var minamt = $('#minamt').val();
        var maxamt = $('#maxamt').val();
        var prosearch = $('.prosearchdata').val();
        var prodistance = $('.prodistancedata').val();
        
        
        var minimum_price = min ;
        var minimum_amt = minamt;
        var maximum_price = max ;
        var maximum_amt = maxamt;

        console.log("1",min);
        console.log("2",max);
        console.log("3",prodistance);
        console.log("4",prosearch);

        var area = get_filter('area');

        console.log(area);

        let page = 1;  

        $.ajax({
            url:"promoterproduct?page="+ page,
            method:"GET",
            data:{action:action,minimum_price:minimum_price,maximum_price:maximum_price,minimum_amt:minimum_amt,maximum_amt:maximum_amt,prosearch:prosearch,prodistance:prodistance,area:area, _token: "{{ csrf_token() }}"},
            success:function(data){
             $('.filter_data').html(data);
            }
        });
    });

    $('.pricechange').click(function(){
        let page = 1;   
        history.pushState(null,null,'?page=' + page);
        filter_data(page);
    });

    $('.pricechangemob').click(function(){
        let page = 1;   
        history.pushState(null,null,'?page=' + page);
        filter_data2(page);
    });

   $(".searchbutton").click(function () {
        let page = 1;   
        history.pushState(null,null,'?page=' + page);
        filter_data(page);
    });

    $(".searchbutton2").click(function () {
        let page = 1;   
        history.pushState(null,null,'?page=' + page);
        filter_data(page);
    });

    $(".prodistancedata").click(function () {
        let page = 1;   
        history.pushState(null,null,'?page=' + page);
        filter_data(page);
    });

    $(".prodistancedata2").click(function () {
        let page = 1;   
        history.pushState(null,null,'?page=' + page);
        filter_data2(page);
    });





</script>

  
</body>


</html>

