<div class="ltn__shop-options" style="margin-bottom: 10px !important;">
    <ul>
        <li>
            <ul class="pagination" role="navigation">
                {{-- Previous Page Link --}}

             @if($promoter == "no items")
                        {{ $promoter }}
             @else

                @if ($promoter->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $promoter->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                <?php
                    $start = $promoter->currentPage() - 2; // show 3 pagination links before current
                    $end = $promoter->currentPage() + 2; // show 3 pagination links after current
                    if($start < 1) {
                        $start = 1; // reset start to 1
                        $end += 1;
                    }
                    if($end >= $promoter->lastPage() ) $end = $promoter->lastPage(); // reset end to last page
                ?>

                @if($start > 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $promoter->url(1) }}">{{1}}</a>
                    </li>
                    @if($promoter->currentPage() != 4)
                        {{-- "Three Dots" Separator --}}
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                    @endif
                @endif
                    @for ($i = $start; $i <= $end; $i++)
                        <li class="page-item {{ ($promoter->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $promoter->url($i) }}">{{$i}}</a>
                        </li>
                    @endfor
                @if($end < $promoter->lastPage())
                    @if($promoter->currentPage() + 3 != $promoter->lastPage())
                        {{-- "Three Dots" Separator --}}
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                    @endif
                    <li class="page-item">
                        <a class="page-link" href="{{ $promoter->url($promoter->lastPage()) }}">{{$promoter->lastPage()}}</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($promoter->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $promoter->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
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
                 @if($promoter == "no items")
                        {{ $promoter }}
                 @else
                 {{ $promoter->currentPage() }} of {{ $promoter->count() }}
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

                 @if($promoter == "no items")
                  <div>
                    <p>{{ $promoter }}</p>
                  </div>
                @else
                @foreach ($promoter as $prop)
                    @if($prop['ProStatus'] != 'Canceled')
                    <div class="col-md-4 col-lg-4 col-12 col-sm-12">
                        <div class="ltn__product-item ltn__product-item-4 text-center---" style="margin-bottom: 10px">
                            <div class="row">
                             <div class="product-img col-5" style="margin:auto;">
                                <a href="/promoterproductdetail/{{ $prop['ProSiteId'] }}">
                                    @if($prop['SiteMap'] != null)
                                      <img src="uploads/promoter/sitemap/{{ $prop['SiteMap'] }}" alt="">
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

                                {{-- @if($prop['ProStatus'] == 'Completed')
                                <p class="watermark"
                                style=" position:absolute ;font-weight: bold;font-size: 15px;text-align: center;color: #ff0000;top:90px;transform: rotate(-35deg) scale(1.7, 1.5);" >
                                  Completed
                                </p>
                                @endif --}}



                                <a href="/promoterproductdetail/{{ $prop['ProSiteId'] }}">
                                    @if($prop['PromoterName'])
                                    <h2 class="product-title">
                                        <a href="/promoterproductdetail/{{ $prop['ProSiteId'] }}" style="font-size: 16px !important">{{ $prop['PromoterName'] }} </a>
                                    </h2>
                                    @endif
                                    @if($prop['Budjet'] )
                                    <div class="product-price">
                                        <span >Project value -  ₹ {{ $prop['Budjet'] }} <label></label>
                                        </span>
                                    </div>
                                    @endif

                                    <!-- <div class="product-price">
                                        <span>Reg No - {{ $prop['PropertyRegNo'] }}<label></label>
                                        </span>
                                    </div> -->

                                    <!-- @if($prop['PropertyLandSize'] )
                                     <p class="marge-btm"> Size : {{ $prop['PropertyLandSize'] }} </p>
                                    @endif -->

                                    @if($prop['FlatCount'])
                                        <p class="marge-btm"> No of Sites : {{ $prop['FlatCount'] }}</p>
                                    @endif
                                    @if($prop['AreaName'] )
                                     <p class="marge-btm"> Area : {{ $prop['AreaName'] }}</p>
                                    @endif
                                    @if($prop['ProAddress'])
                                        <p class="marge-btm"> Size : {{ $prop['ProAddress'] }}</p>
                                    @endif
                                    <!-- @if($prop['KnowusName'])
                                        <p class="marge-btm"> List By : {{ $prop['KnowusName'] }}</p>
                                    @endif  -->
                                </a>

                                 <!-- <div class="product-hover-action" style="text-align: left;padding: 10px 0px 0px 10px;">
                                    <ul>
                                        <li>
                                            <a href="/promoterproductdetail/{{ $prop['ProSiteId'] }}" title="Product Details">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->


                            </div>

                            <div class="product-hover-action" style="position: absolute;top: 0;right: 0;text-align: left;padding: 10px 10px 0px 0px;left: auto">
                                <ul>
                                    <li>
                                        <a href="/promoterproductdetail/{{ $prop['ProSiteId'] }}" title="Product Details">
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
             @if($promoter == "no items")
                        {{ $promoter }}
             @else
                @if ($promoter->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $promoter->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                <?php
                    $start = $promoter->currentPage() - 2; // show 3 pagination links before current
                    $end = $promoter->currentPage() + 2; // show 3 pagination links after current
                    if($start < 1) {
                        $start = 1; // reset start to 1
                        $end += 1;
                    }
                    if($end >= $promoter->lastPage() ) $end = $promoter->lastPage(); // reset end to last page
                ?>

                @if($start > 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $promoter->url(1) }}">{{1}}</a>
                    </li>
                    @if($promoter->currentPage() != 4)
                        {{-- "Three Dots" Separator --}}
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                    @endif
                @endif
                    @for ($i = $start; $i <= $end; $i++)
                        <li class="page-item {{ ($promoter->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $promoter->url($i) }}">{{$i}}</a>
                        </li>
                    @endfor
                @if($end < $promoter->lastPage())
                    @if($promoter->currentPage() + 3 != $promoter->lastPage())
                        {{-- "Three Dots" Separator --}}
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                    @endif
                    <li class="page-item">
                        <a class="page-link" href="{{ $promoter->url($promoter->lastPage()) }}">{{$promoter->lastPage()}}</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($promoter->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $promoter->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            @endif

            </ul>

