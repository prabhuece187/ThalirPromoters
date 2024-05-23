<div class="property-detail-info-list section-bg-1 clearfix">
  <div class="row">
    <div class="col-md-12" style="position: relative;">
    @if($flat['Status'] == 'SOLD')
    <p class="watermark" 
    style=" position:absolute ;font-weight: bold;font-size: 30px;text-align: center;color: #ff0000;top:60px;transform: rotate(-35deg) scale(1.7, 1.5);left:33%" >
      Sold Out
    </p>
    @endif
        <ul>
            @if($flat['FlatNo'])
            <li>
                <label style="margin-bottom:0px !important;">Flat.No :</label> 
                <span>{{ $flat['FlatNo'] }}</span>
            </li>
            @endif
            @if($flat['PromoterDetailName'])
            <li>
                <label style="margin-bottom:0px !important;">Flat Name :</label> 
                <span>
                {{$flat['PromoterDetailName']}}
                </span>
            </li>
            @endif
            @if($flat['PromoterLandTotal'])
            <li>
                <label style="margin-bottom:0px !important;">Size :</label> 
                <span>
                {{$flat['PromoterLandTotal']}} {{$flat['PromoterLandUnit']}}
                </span>
            </li>
            @endif
            @if($flat['PromoterTotalAmount'])
            <li>
                <label style="margin-bottom:0px !important;">Flat Amount : </label> 
                <span>{{$flat['PromoterTotalAmount']}} {{$flat['PromoterFlatUnit']}}</span>
            </li>
            @endif
            @if($flat['PromoterPerSq'])
            <li>
                <label style="margin-bottom:0px !important;">Per Sqft Amount : </label> 
                <span>{{$flat['PromoterPerSq']}}</span>
            </li>
            @endif
            @if($flat['PromoterWidth'])
            <li>
                <label style="margin-bottom:0px !important;">Width & Breath:</label> 
                <span>{{$flat['PromoterWidth']}} * {{$flat['PromoterBreath']}} </span>
            </li>
            @endif
            <li>
                <label style="margin-bottom:0px !important;">Water Source :</label> 
                <span> 
                   @if($flat['PromoterWell'] == 1)
                    <!-- <li> -->
                        <label style="margin-bottom:0px !important;">Well,
                            <!-- <input type="checkbox" value="{{$flat['PromoterWell']}}" checked="checked"> -->
                            <!-- <span class="checkmark"></span> -->
                        </label>
                    <!-- </li>  -->
                    @endif  
                    @if($flat['PromoterCorporation'] == 1)
                     <!-- <li> -->
                        <label style="margin-bottom:0px !important;">Corporation,

                            <!-- <input type="checkbox" value="{{$flat['PromoterCorporation']}}" checked="checked"> -->
                            <!-- <span class="checkmark"></span> -->
                        </label>
                    <!-- </li>  -->
                     @endif 
                    @if($flat['PromoterBore'] == 1) 
                     <!-- <li> -->
                        <label style="margin-bottom:0px !important;">Bore,
                            <!-- <input type="checkbox" value="{{$flat['PromoterBore']}}" checked="checked"> -->
                            <!-- <span class="checkmark"></span> -->
                        </label>
                    <!-- </li>   -->
                     @endif 
                     @if($flat['PromoterWaterNill'] == 1) 
                     <!-- <li> -->
                        <label style="margin-bottom:0px !important;"> Nill,
                            <!-- <input type="checkbox" value="{{$flat['PromoterWaterNill']}}" checked="checked"> -->
                            <!-- <span class="checkmark"></span> -->
                        </label>
                    <!-- </li>  -->
                     @endif 
                </span>
            </li>
            <li>
                <label style="margin-bottom:0px !important;">Land Facing :</label> 
                <span> 
                   @if($flat['PromoterNorth'] == 1)
                    <!-- <li> -->
                        <label style="margin-bottom:0px !important;">North,
                            <!-- <input type="checkbox" value="{{$flat['PromoterNorth']}}" checked="checked"> -->
                            <!-- <span class="checkmark"></span> -->
                        </label>
                    <!-- </li>  -->
                    @endif  
                    @if($flat['PromoterSouth'] == 1)
                     <!-- <li> -->
                        <label style="margin-bottom:0px !important;">South,

                            <!-- <input type="checkbox" value="{{$flat['PromoterSouth']}}" checked="checked"> -->
                            <!-- <span class="checkmark"></span> -->
                        </label>
                    <!-- </li>  -->
                     @endif 
                    @if($flat['PromoterEast'] == 1) 
                     <!-- <li> -->
                        <label style="margin-bottom:0px !important;">East,
                            <!-- <input type="checkbox" value="{{$flat['PromoterEast']}}" checked="checked"> -->
                            <!-- <span class="checkmark"></span> -->
                        </label>
                    <!-- </li>   -->
                     @endif 
                     @if($flat['PromoterWest'] == 1) 
                     <!-- <li> -->
                        <label style="margin-bottom:0px !important;">West,
                            <!-- <input type="checkbox" value="{{$flat['PromoterWest']}}" checked="checked"> -->
                            <!-- <span class="checkmark"></span> -->
                        </label>
                    <!-- </li>  -->
                     @endif 
                    @if($flat['PromoterCorner'] == 1)  
                     <!-- <li> -->
                        <label style="margin-bottom:0px !important;">Corner
                            <!-- <input type="checkbox" value="{{$flat['PromoterCorner']}}" checked="checked"> -->
                            <!-- <span class="checkmark"></span> -->
                        </label>
                    <!-- </li> -->
                    @endif
                </span>
            </li>
            <li><label style="margin-bottom:0px !important;">EB Phase:</label> 
                <span> 
                   @if($flat['PromoterSingle'] == 1)
                    <!-- <li> -->
                        <label style="margin-bottom:0px !important;" >Single ,
                            <!-- <input type="checkbox" value="{{$flat['PromoterBuildNorth']}}" checked="checked">
                            <span class="checkmark"></span> -->
                        </label>
                    <!-- </li>  -->
                    @endif  
                    @if($flat['PromoterFree'] == 1)
                     <!-- <li> -->
                        <label style="margin-bottom:0px !important;" >Free ,
                            <!-- <input type="checkbox" value="{{$flat['PromoterBuildSouth']}}" checked="checked">
                            <span class="checkmark"></span> -->
                        </label>
                    <!-- </li>  -->
                     @endif 
                    @if($flat['PromoterThree'] == 1) 
                     <!-- <li> -->
                        <label style="margin-bottom:0px !important;" >Three,
                            <!-- <input type="checkbox" value="{{$flat['PromoterBuildEast']}}" checked="checked">
                            <span class="checkmark"></span> -->
                        </label>
                    <!-- </li>   -->
                     @endif 
                     @if($flat['PromoterEbNill'] == 1) 
                     <!-- <li> -->
                        <label style="margin-bottom:0px !important;">Nill,
                           <!--  <input type="checkbox" value="{{$flat['PromoterBuildWest']}}" checked="checked">
                            <span class="checkmark"></span> -->
                        </label>
                    <!-- </li>  -->
                     @endif 
                 </span>
            </li>
            @if($flat['PromoterDescription'])
            <li>
                <label style="margin-bottom:0px !important;">Description:</label> 
                <span>{{$flat['PromoterDescription']}} </span>
            </li>
            @endif
        </ul>
    </div> 
</div>
</div>