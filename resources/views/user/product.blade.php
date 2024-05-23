<div class="ltn__shop-options" style="margin-bottom: 10px !important;">
    <ul>
        <li>
            <ul class="pagination" role="navigation">
                {{-- Previous Page Link --}}
             @if($property == "no items")
                  <div>
                    <p>{{ $property }}</p>
                  </div>
             @else
                @if ($property->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $property->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                <?php
                    $start = $property->currentPage() - 2; // show 3 pagination links before current
                    $end = $property->currentPage() + 2; // show 3 pagination links after current
                    if($start < 1) {
                        $start = 1; // reset start to 1
                        $end += 1;
                    } 
                    if($end >= $property->lastPage() ) $end = $property->lastPage(); // reset end to last page
                ?>

                @if($start > 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $property->url(1) }}">{{1}}</a>
                    </li>
                    @if($property->currentPage() != 4)
                        {{-- "Three Dots" Separator --}}
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                    @endif
                @endif
                    @for ($i = $start; $i <= $end; $i++)
                        <li class="page-item {{ ($property->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $property->url($i) }}">{{$i}}</a>
                        </li>
                    @endfor
                @if($end < $property->lastPage())
                    @if($property->currentPage() + 3 != $property->lastPage())
                        {{-- "Three Dots" Separator --}}
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                    @endif
                    <li class="page-item">
                        <a class="page-link" href="{{ $property->url($property->lastPage()) }}">{{$property->lastPage()}}</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($property->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $property->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            @endif
            </ul>
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
    </ul>
</div>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="liton_product_grid">
            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                <div class="row filter_data">
                         
                @if($property == "no items")
                  <div>
                    <p>{{ $property }}</p>
                  </div>
                @else
                @foreach ($property as $prop)  
                    @if($prop['PropertyStatus'] != 'Canceled')
                    <div class="col-md-4 col-lg-4 col-12 col-sm-12">
                        <div class="ltn__product-item ltn__product-item-4 text-center---" style="margin-bottom: 10px"> 
                            <div class="row">
                             <div class="product-img col-5" style="margin:auto;">
                                <a href="/propertydetail/{{ $prop['PropertyId'] }}/{{ $prop['NeedId'] }}">
                                    @if($prop['PropertyGalleryImage'] != null)
                                      <img src="/uploads/property/gallery/{{ $prop['PropertyGalleryImage'] }}" alt="">
                                    @else
                                      <img src="/uploads/main/noimg.jpg" alt="">
                                    @endif
                                </a>

                                <!-- <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge bg-green">{{ $prop['NeedName'] }}</li>
                                    </ul>
                                </div> -->
                               
                            </div>
                            <div class="product-info col-7" style="position: relative;">
                                
                                @if($prop['PropertyStatus'] == 'Completed')
                                <p class="watermark" 
                                style=" position:absolute ;font-weight: bold;font-size: 15px;text-align: center;color: #ff0000;top:60px;transform: rotate(-35deg) scale(1.7, 1.5);" >
                                  Sold Out
                                </p>
                                @endif

                               

                                <a href="/propertydetail/{{ $prop['PropertyId'] }}/{{ $prop['NeedId'] }}">
                                    @if($prop['PropertyTotalBudget'] )
                                    <div class="product-price">
                                        <span >₹ {{ $prop['PropertyTotalBudget'] }} {{ $prop['PropertyTotalValType'] }}<label></label>
                                        </span>
                                    </div>
                                    @endif
                                    <div class="product-price">
                                        <span> {{ $prop['NeedName'] }} - {{ $prop['PropertyId'] }}<label></label>
                                        </span>
                                    </div>
                                    <!-- <div class="product-price">
                                        <span>Reg No - {{ $prop['PropertyRegNo'] }}<label></label>
                                        </span>
                                    </div> -->
                                   
                                    <!-- @if($prop['PropertyLandSize'] )
                                     <p class="marge-btm"> Size : {{ $prop['PropertyLandSize'] }} </p>
                                    @endif -->
                                    @if($prop['TypeName'])
                                        <p class="marge-btm"> Type : {{ $prop['TypeName'] }}</p>
                                    @endif 
                                    @if($prop['PropertyLandSize'])
                                        <p class="marge-btm"> Size : {{ $prop['PropertyLandSize'] }}</p>
                                    @endif 
                                    @if($prop['AreaName'] )
                                     <p class="marge-btm"> Area : {{ $prop['AreaName'] }}</p>
                                    @endif
                                    @if($prop['PropertyAreaDetail'] )
                                     <p class="marge-btm"> AreaDetail : <span style="text-transform: lowercase;">{{ $prop['PropertyAreaDetail'] }}</span> </p>
                                    @endif
                                    <!-- @if($prop['KnowusName'])
                                        <p class="marge-btm"> List By : {{ $prop['KnowusName'] }}</p>
                                    @endif  -->
                                </a>

                                 <!-- <div class="product-hover-action" style="text-align: left;padding: 10px 0px 0px 10px;">
                                    <ul>
                                        <li>
                                            <a href="/propertydetail/{{ $prop['PropertyId'] }}/{{ $prop['NeedId'] }}" title="Product Details">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->


                            </div>

                            <div class="product-hover-action" style="position: absolute;top: 0;right: 0;text-align: left;padding: 10px 10px 0px 0px;left: auto">
                                <ul>
                                    <li>
                                        <a href="/propertydetail/{{ $prop['PropertyId'] }}/{{ $prop['NeedId'] }}" title="Product Details">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                         </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="liton_product_list">
        <div class="ltn__product-tab-content-inner ltn__product-list-view">
            <div class="row ">
                @if($property == "no items")
                  <div>
                    <p>{{ $property }}</p>
                  </div>
                @else
                @foreach ($property as $prop)  
                 @if($prop['PropertyStatus'] != 'Canceled')
                    <div class="col-lg-6  col-12">
                      <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                        <div class="product-img">
                          <a href="/propertydetail/{{ $prop['PropertyId'] }}/{{ $prop['NeedId'] }}">
                                @if($prop['PropertyGalleryImage'] != null)
                                  <img src="/uploads/property/gallery/{{ $prop['PropertyGalleryImage'] }}" alt="">
                                @else
                                  <img src="/uploads/main/noimg.jpg" alt="">
                                @endif
                          </a>
                        </div>
                        <div class="product-info">
                          <a href="/propertydetail/{{ $prop['PropertyId'] }}/{{ $prop['NeedId'] }}">
                            <div class="product-badge-price">
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badg">For Sell</li>
                                    </ul>
                                </div>
                                @if($prop['PropertyTotalBudget'])
                                <div class="product-price">
                                    <span>${{ $prop['PropertyTotalBudget'] }} {{ $prop['PropertyTotalValType'] }}</span>
                                </div>
                                @endif
                            </div>
                             @if($prop['PropertyName'])
                            <h2 class="product-title">
                                <a href="/propertydetail/{{ $prop['PropertyId'] }}/{{ $prop['NeedId'] }}">{{ $prop['PropertyName'] }}
                                </a>
                            </h2>
                            @endif
                             @if($prop['PropertyAddress'])
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="/propertydetail/{{ $prop['PropertyId'] }}/{{ $prop['NeedId'] }}"><i class="flaticon-pin"></i> {{ $prop['PropertyAddress'] }}</a>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                 <!--  @if($prop['PropertyLandSize'])
                                 <li> <p> Size : {{ $prop['PropertyLandSize'] }} </p>
                                 </li>
                                 @endif -->
                                <li> 
                                 <p> Area : {{ $prop['AreaName'] }} </p>
                                 <p> AreaDetail : {{ $prop['PropertyAreaDetail'] }} </p>
                                </li>
                            </ul>
                          </a>
                        </div>
                    <div class="product-info-bottom">
                        <div class="real-estate-agent">
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="/propertydetail/{{ $prop['PropertyId'] }}/{{ $prop['NeedId'] }}" title="Product Details">
                                        <i class="flaticon-expand"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                @endif
            
                @endforeach
                @endif
            </div>
        </div>  
    </div>
</div>

         <ul class="pagination" role="navigation">
                {{-- Previous Page Link --}}
            @if($property == "no items")
                  <div>
                    <p>{{ $property }}</p>
                  </div>
            @else
                @if ($property->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $property->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                <?php
                    $start = $property->currentPage() - 2; // show 3 pagination links before current
                    $end = $property->currentPage() + 2; // show 3 pagination links after current
                    if($start < 1) {
                        $start = 1; // reset start to 1
                        $end += 1;
                    } 
                    if($end >= $property->lastPage() ) $end = $property->lastPage(); // reset end to last page
                ?>

                @if($start > 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $property->url(1) }}">{{1}}</a>
                    </li>
                    @if($property->currentPage() != 4)
                        {{-- "Three Dots" Separator --}}
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                    @endif
                @endif
                    @for ($i = $start; $i <= $end; $i++)
                        <li class="page-item {{ ($property->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $property->url($i) }}">{{$i}}</a>
                        </li>
                    @endfor
                @if($end < $property->lastPage())
                    @if($property->currentPage() + 3 != $property->lastPage())
                        {{-- "Three Dots" Separator --}}
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                    @endif
                    <li class="page-item">
                        <a class="page-link" href="{{ $property->url($property->lastPage()) }}">{{$property->lastPage()}}</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($property->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $property->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            @endif
            </ul>

