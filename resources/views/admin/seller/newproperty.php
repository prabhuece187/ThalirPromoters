 
<style type="text/css">
  #map {
  height: 100%;
}
</style>

<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
            <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">{{formType}}  PROPERTY </h4>
                </div>  
                <p style="padding-top: 10px">திருப்பூர்  பகுதியில்  உள்ளவை மட்டும்  பதிவிடவும் <br> Enter Tirupur Surrounding Properties only.</p>                               
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
               <div class="modal-body"> 
                  <div class="row">

                    <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <div class="row">
                            <div class="col-md-3">
                               <label for="title"> S.No <span class="lab-span">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" readonly  class="form-control"  ng-model="property_form.PropertyId">
                             </div>
                           </div>
                        </fieldset>
                     </div>

                    <div class="col-md-8">
                       <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                             <label for="title">LISTED BY<span class="lab-span">*</span></label>
                          </div>
                        <div class="col-md-9">
                          <ui-select required ng-model="property_form.Knowus" theme="select2" >
                            <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.KnowusName}}</ui-select-match>
                            <ui-select-choices repeat="par in knowus | filter: {KnowusName: $select.search}">
                              <div>{{par.KnowusName}}</div>
                            </ui-select-choices>
                          </ui-select>   
                        </div>
                      </div>
                     </fieldset>
                    </div>

                    <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <div class="row">
                             <div class="col-md-3">
                               <label for="title">தேவை / REQUIERMENT<span class="lab-span">*</span></label>
                             </div>
                             <div class="col-md-9">
                              <ui-select  required ng-model="property_form.Need" theme="select2" autofocus>
                                  <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.NeedName}}</ui-select-match>
                                  <ui-select-choices repeat="par in need | filter: {NeedName: $select.search}">
                                    <div>{{par.NeedName}}</div>
                                  </ui-select-choices>
                              </ui-select>   
                             </div>
                          </div>
                        </fieldset>                
                    </div>
                 </div>
                 <div class="row" ng-if="property_form.Need.NeedId == 1||property_form.Need.NeedId == 2">
                     <div class="col-md-8">
                        <div class="tilte-head">
                        <h4 class="card-title">  DEATILS </h4>
                        </div>
                        <fieldset class="form-group floating-label-form-group">
                          <div class="row">
                            <div class="col-md-3">
                              <label for="title">சொத்தின் வகை / TYPE <span class="lab-span">*</span></label>
                            </div>
                            <div class="col-md-9">
                              <ui-select   required ng-model="property_form.Type" theme="select2" >
                                  <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.TypeName}}</ui-select-match>
                                  <ui-select-choices repeat="par in type | filter: {TypeName: $select.search}">
                                    <div>{{par.TypeName}}</div>
                                  </ui-select-choices>
                              </ui-select>   
                           </div>
                         </div>
                      </fieldset>                
                     </div>
                     
                     <div class="col-md-8">
                         <fieldset class="form-group floating-label-form-group">
                          <div class="row">
                            <div class="col-md-3">
                               <label for="title">தலைப்பு / TITLE<span class="lab-span">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" number-to-string class="form-control"  ng-model="property_form.PropertyName">
                             </div>
                           </div>
                         </fieldset>
                     </div>

                     <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <div class="row">
                            <div class="col-md-3">
                               <label for="title">பதிவு எண் / REGISTER NO<span class="lab-span">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" number-to-string class="form-control"  ng-model="property_form.PropertyRegNo">
                             </div>
                           </div>
                        </fieldset>
                     </div>

                     <div class="col-md-8">
                       <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">DATE</label>
                          </div>
                           <div class="col-md-9">
                              <md-datepicker ng-model="property_form.PropertyDate" name="Idate"  md-placeholder="Enter date"></md-datepicker>
                           </div>
                         </div>
                        </fieldset> 
                     </div> 

                     <div class="col-md-8 " >  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">எப்படி வந்தார்கள்/LEAD BY<span class="lab-span">*</span></label>
                          </div>
                         <div class="col-md-9">
                          <select  class="form-control" ng-model="property_form.ReachUs">
                              <option value="" disabled selected hidden>Select Lead By</option>
                              <option value="Direct">Direct</option>
                              <option value="Reference">Reference</option>
                          </select>
                         </div>
                       </div>
                      </fieldset>
                     </div>
                     
                 
                     <div class="col-md-8  ">  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">இடத்தின் அளவு / LAND SIZE</label>
                          </div>
                          <div class="col-md-5">
                            <input type="text" class="form-control" ng-model="property_form.PropertyLandSize">
                          </div>
                          <div class="col-md-4">
                            <select  class="form-control" ng-model="property_form.PropertySize">
                              <option value="" disabled selected hidden>Select Size</option>
                              <option value="Cent">சென்ட் </option>
                              <option value="Acre">ஏக்கர்</option>
                              <option value="Sqfeet">சதுர அடி</option>
                            </select>
                         </div>
                        </div>
                      </fieldset>
                     </div>

                     <div class="col-md-8 " >  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">மொத்த விலை / TOTAL BUDGET<span class="lab-span">*</span></label>
                          </div>
                         <div class="col-md-5">
                          <input type="text" class="form-control"  allow-decimal-numbers ng-model="property_form.PropertyTotalBudget">
                         </div>
                         <div class="col-md-4">
                          <select  class="form-control" ng-model="property_form.PropertyTotalValType">
                              <option value="" disabled selected hidden>Select Type</option>
                              <option value="Lakhs">லட்சம்</option>
                              <option value="Cr">கோடி</option>
                              <option value="K">ஆயிரம்</option>
                          </select>
                         </div>
                       </div>
                      </fieldset>
                     </div>



                     <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">பகுதி / AREA CODE<span class="lab-span">*</span></label>
                          </div>
                         <div class="col-md-9">
                            <ui-select  required ng-model="property_form.Area" theme="select2" >
                              <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.AreaName}}</ui-select-match>
                              <ui-select-choices repeat="par in area | filter: {AreaName: $select.search}">
                                <div>{{par.AreaName}}</div>
                              </ui-select-choices>
                            </ui-select>   
                         </div>
                        </div>
                      </fieldset>                
                     </div>

                     <div class="col-md-8 ">  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title"> முழு விலாசம்  / FULL ADDRESS</label>
                          </div>
                         <div class="col-md-9">
                          <input type="text" class="form-control" ng-model="property_form.PropertyAreaDetail">
                         </div>
                       </div>
                      </fieldset>
                     </div>

                     <div class="col-md-8 ">  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">பயன்பாடு / PURPOSE<span class="lab-span">*</span></label>
                          </div>
                         <div class="col-md-9">
                            <ui-select  required ng-model="property_form.Purpose" theme="select2" >
                                <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.PurposeName}}</ui-select-match>
                                <ui-select-choices repeat="par in purpose | filter: {PurposeName: $select.search}">
                                  <div>{{par.PurposeName}}</div>
                                </ui-select-choices>
                            </ui-select>   
                         </div>
                       </div>
                      </fieldset>
                     </div>

                     <div class="col-md-8">  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                              <label for="title">சாலை விபரம் / ROAD TYPE<span class="lab-span">*</span></label>
                          </div>
                          <div class="col-md-9">
                            <ui-select  required ng-model="property_form.Road" theme="select2" >
                                <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.RoadName}}</ui-select-match>
                                <ui-select-choices repeat="par in road | filter: {RoadName: $select.search}">
                                  <div>{{par.RoadName}}</div>
                                </ui-select-choices>
                            </ui-select> 
                          </div>
                        </div>
                      </fieldset>
                     </div>

                     <div class="col-md-8">  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">சாலை அகலம் / ROAD SIZE(in feet)</label>
                          </div>
                         <div class="col-md-9">
                          <input type="text" class="form-control" ng-model="property_form.PropertyRoadSize">
                         </div>
                       </div>
                      </fieldset>
                     </div>

                     <div class="col-md-8">  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">சாலை முகப்பு / ROAD BASE(in feet)</label>
                          </div>
                         <div class="col-md-9">
                          <input type="text" class="form-control" ng-model="property_form.PropertyRoadBase">
                         </div>
                       </div>
                      </fieldset>
                    </div>
                    <hr> 

                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                       <div class="row">
                          <div class="col-md-3">
                            <label for="title">திசை (இடம்) / LAND FACEING</label><br>
                          </div>
                          <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyNorth"  class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyNorth=='1'">
                                  <label>வடக்கு</label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertySouth" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertySouth=='1'">
                                  <label>தெற்கு</label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyEast" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyEast=='1'">
                                  <label>கிழக்கு</label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyWest" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyWest=='1'">
                                  <label> மேற்கு</label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyCorner" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyCorner=='1'">
                                  <label> கார்னர்</label>
                                </div>
                             </div>  
                          </div>
                      </fieldset>
                    </div>

                   <div class="col-md-8">
                    <div class="tilte-head">
                      <h4 class="card-title"> OTHER DEATILS </h4>
                      </div>
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                             <label for="title">திசை (கட்டிடம்) / BUILDING FACEING</label><br>
                          </div>
                          <div class="col-md-9">
                             <div class="row">
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyBuildNorth"  class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyBuildNorth=='1'">
                                  <label>வடக்கு </label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyBuildSouth" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyBuildSouth=='1'">
                                  <label>தெற்கு </label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyBuildEast" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyBuildEast=='1'">
                                  <label>கிழக்கு </label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyBuildWest" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyBuildWest=='1'">
                                  <label> மேற்கு</label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyBuildCorner" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyBuildCorner=='1'">
                                  <label> கார்னர்</label>
                                </div>
                             </div> 
                          </div>                           
                      </fieldset>
                   </div>

                   <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">கட்டடிடத்தின் அளவு / BUILDING SIZE</label>
                          </div>
                          <div class="col-md-9">                             
                             <input class="form-control" ng-model="property_form.PropertyBuildingSize" name="PropertyBuildingSize"  value="" type="text" >
                          </div>
                        </div>
                      </fieldset>                   
                    </div> 

                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">கட்டடிடத்தின் வயது / BUILDING AGE</label>
                          </div>
                          <div class="col-md-9">                             
                             <input class="form-control" ng-model="property_form.PropertyBuildingAge" name="PropertyBuildingAge"  value="" type="text" >
                          </div>
                        </div>
                      </fieldset>                   
                    </div> 

                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">கூரை விபரம் / ROOF DETAILS<span class="lab-span">*</span></label>
                          </div>
                          <div class="col-md-9">
                            <ui-select  required ng-model="property_form.Roof" theme="select2">
                              <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.RoofName}}</ui-select-match>
                              <ui-select-choices repeat="par in roof | filter: {RoofName: $select.search}">
                                <div>{{par.RoofName}}</div>
                              </ui-select-choices>
                            </ui-select>   
                         </div>
                        </div>
                      </fieldset>                   
                    </div> 

                    <div class="col-md-8 ">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                             <label for="title">மாடிகள் எண்ணிக்கை / FLOOR DETAILS<span class="lab-span">*</span></label>
                          </div>
                         <div class="col-md-9">
                            <ui-select  required ng-model="property_form.Floor" theme="select2" >
                                <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.FloorName}}</ui-select-match>
                                <ui-select-choices repeat="par in floor | filter: {FloorName: $select.search}">
                                  <div>{{par.FloorName}}</div>
                                </ui-select-choices>
                            </ui-select>   
                         </div>
                      </fieldset>                   
                    </div>  

<!--                     <div class="col-md-8">  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                              <label for="title">வாடகை / RENT(INCOME)</label>
                          </div>
                          <div class="col-md-9">
                            <input type="text" class="form-control" ng-model="property_form.PropertyRentAmount">
                          </div>
                        </div>
                      </fieldset>
                     </div>

                     <div class="col-md-8">  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">முன்பணம் / ADVANCE</label>
                          </div>
                         <div class="col-md-9">
                          <input type="text" class="form-control" ng-model="property_form.PropertyAdvanceAmount">
                         </div>
                       </div>
                      </fieldset>
                     </div> -->

                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">நீர் ஆதாரம் / WATER SOURCES</label> 
                              <a href="" ng-click="add_new_water();" class="btn atag"><i class="ft-plus"></i>
                              </a>
                            </div>
                          <div class="col-md-9">
                            <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-bordered card-table table-vcenter text-nowrap table-in table-sm">
                                <thead>
                                    <tr>
                                        <th width="5%">SNO</th>
                                        <th width="40%">SOURCE</th>
                                        <th width="40%">DETAIL</th>     
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="wat in property_form.water">
                                        <td>{{$index+1}}</td>
                                        <td class="ta-amt td-mob-view">
                                            <select ng-model="wat.PropertyWaterSource" class="form-control">
                                              <option value="" disabled selected>SELECT WATER  SOURCE</option>
                                              <option ng-repeat="waters in waterval" value="{{waters.value}}">{{waters.value}}</option>   
                                            </select>
                                        </td>
                                        <td class="td-mob-view">
                                          <input type="text"  class="form-control" ng-model="wat.PropertyWaterDetail">            
                                        </td>
                                        <td class="ta-amt">
                                            <a href="" ng-click="add_new_water();" class="btn atag"><i class="ft-plus"></i></a>
                                            <a href="" ng-click="remove_water($index);" class="btn atag"><i class="ft-trash-2"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </fieldset>
                    </div>

                    <div class="col-md-8" >
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">மின் இணைப்பு விபரம் / EB LINE STATUS</label>
                              <a href="" ng-click="add_new_eb();" class="btn atag">
                                <i class="ft-plus"></i>
                              </a>
                          </div>
                         <div class="col-md-9">
                          <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-bordered card-table table-vcenter text-nowrap table-in table-sm">
                              <thead>
                                  <tr>
                                      <th width="5%">SNO</th>
                                      <th width="40%">LINE</th>
                                      <th width="40%">DETAIL</th>     
                                      <th>ACTION</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr  ng-repeat="eb in property_form.eb">
                                      <td>{{$index+1}}</td>
                                      <td class="ta-amt td-mob-view">
                                          <select ng-model="eb.PropertyEbStatus" class="form-control">
                                            <option value="" disabled selected>SELECT EB LINE</option>
                                            <option ng-repeat="ebs in ebval" value="{{ebs.value}}">{{ebs.value}}</option> 
                                          </select>
                                      </td>
                                      <td class="td-mob-view">
                                        <input type="text"  class="form-control" ng-model="eb.PropertyEbDetail">            
                                      </td>
                                      <td class="ta-amt">
                                          <a href="" ng-click="add_new_eb();" class="btn atag"><i class="ft-plus"></i></a>
                                          <a href="" ng-click="remove_eb($index);" class="btn atag"><i class="ft-trash-2"></i></a>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                        </div>
                      </div>
                    </fieldset>
                    </div>
               
                    <div class="col-md-8">
                       <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">முழு விபரம் / FULL DETAILS</label>
                          </div>
                         <div class="col-md-9">
                           <textarea class="form-control" ng-model="property_form.PropertyDescription" style="height: 100px !important;width: 100% !important;white-space: inherit !important;">
                           </textarea> 
                           </div>
                       </div>
                      </fieldset>
                    </div>  

                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">5 PHOTOS </label>
                          </div>
                         <div class="col-md-9">                             
                            <input type='file' multiple ng-file='uploadfiles' multiple ng-files="getTheFiles($files)">
                         </div>
                       </div>
                      </fieldset>                  
                    </div>

                    <div class="col-md-4">
                      <div class="row">
                          <div ng-repeat="image in imagesrc track by $index">
                           <img ng-src="{{image.Src}}" title="image.title" width="60px" height="60px" style="padding: 5px;">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">VIDEO</label>
                          </div>
                         <div class="col-md-9">                             
                          <input id="file"  fileModel file-model="property_form.PropertyGalleryVideo" name="PropertyGalleryVideo"  value="" type="file" >
                         </div>
                       </div>
                      </fieldset>              
                    </div>

                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                              <label for="title">5 DOCUMENTS </label>
                            </div>
                         <div class="col-md-9">                             
                            <input type='file' multiple ng-file='uploadfiles' multiple ng-files="getTheDocments($files)" >
                         </div>
                       </div>
                      </fieldset>                  
                    </div>


                    <div class="col-md-8">
                     <fieldset class="form-group floating-label-form-group">
                      <div class="row">
                          <div class="col-md-3">
                             <label for="title">பெயர் / NAME</label>
                           </div>
                         <div class="col-md-9">
                            <input type="text"  class="form-control"  ng-model="property_form.PropertyOwnerName">
                         </div>
                       </div>
                     </fieldset>
                    </div>

                    <div class="col-md-8">
                       <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">செல் எண் / CONTACT NUMBER</label>
                          </div>
                           <div class="col-md-9">
                              <input type="text" class="form-control" ng-model="property_form.PropertyOwnerNumber" onlydigits >
                           </div>
                         </div>
                       </fieldset>
                    </div>

                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">OFFICE LOCATION  </label>
                          </div>
                          <div class="col-md-9">                             
                           <input class="form-control" ng-model="property_form.PropertyLocation" name="PropertyLocation"  value="" type="text" >
                          </div>
                       </div>
                      </fieldset>                   
                    </div> 

                     <div class="col-md-8" ng-if="role == 1">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">SPOT LOCATION</label>
                          </div>
                          <div class="col-md-9">                             
                           <input class="form-control" ng-model="property_form.PropertyLocationSpot" name="PropertyLocationSpot"  value="" type="text" >
                          </div>
                       </div>
                      </fieldset>                   
                    </div> 

                    <div class="col-md-8" ng-if="property_form.Knowus.KnowusId != 5">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">REFFERED NAME</label>
                          </div>
                         <div class="col-md-9">                             
                           <input class="form-control" ng-model="property_form.PropertyReferName" name="PropertyReferName"  value="" type="text" >
                         </div>
                       </div>
                      </fieldset>                   
                    </div> 
                 
                    <div class="col-md-8" ng-if="property_form.Knowus.KnowusId != 5">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                           <label for="title">REFFERED NUMBER</label>
                         </div>
                         <div class="col-md-9">                             
                           <input class="form-control" ng-model="property_form.PropertyReferNumber" name="PropertyReferNumber"  value="" type="text" >
                         </div>
                       </div>
                      </fieldset>                   
                    </div> 
                  </div>



                  <div class="row" ng-if="property_form.Need.NeedId == 3||property_form.Need.NeedId == 4">
                    <div class="col-md-8">
                      <div class="tilte-head">
                      <h4 class="card-title">  DEATILS </h4>
                      </div>
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">சொத்தின் வகை / TYPE <span class="lab-span">*</span></label>
                          </div>
                          <div class="col-md-9">
                            <ui-select   required ng-model="property_form.Type" theme="select2" >
                                <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.TypeName}}</ui-select-match>
                                <ui-select-choices repeat="par in type | filter: {TypeName: $select.search}">
                                  <div>{{par.TypeName}}</div>
                                </ui-select-choices>
                            </ui-select>   
                         </div>
                       </div>
                      </fieldset>                
                     </div>
                     <div class="col-md-8">
                         <fieldset class="form-group floating-label-form-group">
                          <div class="row">
                            <div class="col-md-3">
                               <label for="title">தலைப்பு / TITLE<span class="lab-span">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" number-to-string class="form-control"  ng-model="property_form.PropertyName">
                             </div>
                           </div>
                         </fieldset>
                     </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <div class="row">
                            <div class="col-md-3">
                               <label for="title">பதிவு எண் / REGISTER NO<span class="lab-span">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" number-to-string class="form-control"  ng-model="property_form.PropertyRegNo">
                             </div>
                           </div>
                        </fieldset>
                     </div>
                     <div class="col-md-8">
                       <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">DATE</label>
                          </div>
                           <div class="col-md-9">
                              <md-datepicker ng-model="property_form.PropertyDate" name="Idate"  md-placeholder="Enter date"></md-datepicker>
                           </div>
                         </div>
                        </fieldset> 
                     </div> 
                     <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">பகுதி / AREA CODE<span class="lab-span">*</span></label>
                          </div>
                         <div class="col-md-9">
                            <ui-select  required ng-model="property_form.Area" theme="select2" >
                              <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.AreaName}}</ui-select-match>
                              <ui-select-choices repeat="par in area | filter: {AreaName: $select.search}">
                                <div>{{par.AreaName}}</div>
                              </ui-select-choices>
                            </ui-select>   
                         </div>
                        </div>
                      </fieldset>                
                     </div>

                     <div class="col-md-8 " >  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">மொத்த விலை / TOTAL BUDGET<span class="lab-span">*</span></label>
                          </div>
                         <div class="col-md-5">
                          <input type="text" class="form-control"  allow-decimal-numbers ng-model="property_form.PropertyTotalBudget">
                         </div>
                         <div class="col-md-4">
                          <select  class="form-control" ng-model="property_form.PropertyTotalValType">
                              <option value="" disabled selected hidden>Select Type</option>
                              <option value="Lakhs">லட்சம்</option>
                              <option value="Cr">கோடி</option>
                              <option value="K">ஆயிரம்</option>
                            </select>
                         </div>
                       </div>
                      </fieldset>
                     </div>

                      <div class="col-md-8 ">  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title"> முழு விலாசம்  / FULL ADDRESS</label>
                          </div>
                         <div class="col-md-9">
                          <input type="text" class="form-control" ng-model="property_form.PropertyAreaDetail">
                         </div>
                       </div>
                      </fieldset>
                     </div>
                     <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                       <div class="row">
                          <div class="col-md-3">
                            <label for="title">திசை (இடம்) / LAND FACEING</label><br>
                          </div>
                          <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyNorth"  class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyNorth=='1'">
                                  <label>வடக்கு</label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertySouth" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertySouth=='1'">
                                  <label>தெற்கு</label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyEast" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyEast=='1'">
                                  <label>கிழக்கு</label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyWest" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyWest=='1'">
                                  <label> மேற்கு</label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyCorner" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyCorner=='1'">
                                  <label> கார்னர்</label>
                                </div>
                             </div>  
                          </div>
                      </fieldset>
                    </div>
                    <div class="col-md-8">
                    <div class="tilte-head">
                      <h4 class="card-title"> OTHER DEATILS </h4>
                      </div>
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                             <label for="title">திசை (கட்டிடம்) / BUILDING FACEING</label><br>
                          </div>
                          <div class="col-md-9">
                             <div class="row">
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyBuildNorth"  class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyBuildNorth=='1'">
                                  <label>வடக்கு </label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyBuildSouth" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyBuildSouth=='1'">
                                  <label>தெற்கு </label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyBuildEast" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyBuildEast=='1'">
                                  <label>கிழக்கு </label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyBuildWest" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyBuildWest=='1'">
                                  <label> மேற்கு</label>
                                </div>
                                <div class="col-md-2 col-6">
                                  <input type="checkbox" ng-model="property_form.PropertyBuildCorner" class="btn btn-outline-primary atag btn-lg" ng-checked="property_form.PropertyBuildCorner=='1'">
                                  <label> கார்னர்</label>
                                </div>
                             </div> 
                          </div>                           
                      </fieldset>
                   </div>
                   <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">கூரை விபரம் / ROOF DETAILS<span class="lab-span">*</span></label>
                          </div>
                          <div class="col-md-9">
                            <ui-select  required ng-model="property_form.Roof" theme="select2">
                              <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.RoofName}}</ui-select-match>
                              <ui-select-choices repeat="par in roof | filter: {RoofName: $select.search}">
                                <div>{{par.RoofName}}</div>
                              </ui-select-choices>
                            </ui-select>   
                         </div>
                        </div>
                      </fieldset>                   
                    </div>
                    <div class="col-md-8 ">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                             <label for="title">மாடிகள் எண்ணிக்கை / FLOOR DETAILS<span class="lab-span">*</span></label>
                          </div>
                         <div class="col-md-9">
                            <ui-select  required ng-model="property_form.Floor" theme="select2" >
                                <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.FloorName}}</ui-select-match>
                                <ui-select-choices repeat="par in floor | filter: {FloorName: $select.search}">
                                  <div>{{par.FloorName}}</div>
                                </ui-select-choices>
                            </ui-select>   
                         </div>
                      </fieldset>                   
                    </div> 
                    <div class="col-md-8">  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                              <label for="title">வாடகை / RENT(INCOME)</label>
                          </div>
                          <div class="col-md-9">
                            <input type="text" class="form-control" ng-model="property_form.PropertyRentAmount">
                          </div>
                        </div>
                      </fieldset>
                     </div>
                     <div class="col-md-8">  
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">முன்பணம் / ADVANCE</label>
                          </div>
                         <div class="col-md-9">
                          <input type="text" class="form-control" ng-model="property_form.PropertyAdvanceAmount">
                         </div>
                       </div>
                      </fieldset>
                     </div> 
                     <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">நீர் ஆதாரம் / WATER SOURCES</label> 
                              <a href="" ng-click="add_new_water();" class="btn atag"><i class="ft-plus"></i>
                              </a>
                            </div>
                          <div class="col-md-9">
                            <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-bordered card-table table-vcenter text-nowrap table-in table-sm">
                                <thead>
                                    <tr>
                                        <th width="5%">SNO</th>
                                        <th width="40%">SOURCE</th>
                                        <th width="40%">DETAIL</th>     
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="wat in property_form.water">
                                        <td>{{$index+1}}</td>
                                        <td class="ta-amt td-mob-view">
                                            <select ng-model="wat.PropertyWaterSource" class="form-control">
                                              <option value="" disabled selected>SELECT WATER  SOURCE</option>
                                              <option ng-repeat="waters in waterval" value="{{waters.value}}">{{waters.value}}</option>   
                                            </select>
                                        </td>
                                        <td class="td-mob-view">
                                          <input type="text"  class="form-control" ng-model="wat.PropertyWaterDetail">            
                                        </td>
                                        <td class="ta-amt">
                                            <a href="" ng-click="add_new_water();" class="btn atag"><i class="ft-plus"></i></a>
                                            <a href="" ng-click="remove_water($index);" class="btn atag"><i class="ft-trash-2"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </fieldset>
                    </div>

                    <div class="col-md-8" >
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">மின் இணைப்பு விபரம் / EB LINE STATUS</label>
                              <a href="" ng-click="add_new_eb();" class="btn atag">
                                <i class="ft-plus"></i>
                              </a>
                          </div>
                         <div class="col-md-9">
                          <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-bordered card-table table-vcenter text-nowrap table-in table-sm">
                              <thead>
                                  <tr>
                                      <th width="5%">SNO</th>
                                      <th width="40%">LINE</th>
                                      <th width="40%">DETAIL</th>     
                                      <th>ACTION</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr  ng-repeat="eb in property_form.eb">
                                      <td>{{$index+1}}</td>
                                      <td class="ta-amt td-mob-view">
                                          <select ng-model="eb.PropertyEbStatus" class="form-control">
                                            <option value="" disabled selected>SELECT EB LINE</option>
                                            <option ng-repeat="ebs in ebval" value="{{ebs.value}}">{{ebs.value}}</option> 
                                          </select>
                                      </td>
                                      <td class="td-mob-view">
                                        <input type="text"  class="form-control" ng-model="eb.PropertyEbDetail">            
                                      </td>
                                      <td class="ta-amt">
                                          <a href="" ng-click="add_new_eb();" class="btn atag"><i class="ft-plus"></i></a>
                                          <a href="" ng-click="remove_eb($index);" class="btn atag"><i class="ft-trash-2"></i></a>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                        </div>
                      </div>
                    </fieldset>
                  </div>

                    <div class="col-md-8">
                       <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">முழு விபரம் / FULL DETAILS</label>
                          </div>
                         <div class="col-md-9">
                           <textarea class="form-control" ng-model="property_form.PropertyDescription" style="height: 200px !important;width: 100% !important;white-space: inherit !important;">
                           </textarea> 
                           </div>
                       </div>
                      </fieldset>
                    </div>  
                  <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">5 PHOTOS </label>
                          </div>
                         <div class="col-md-9">                             
                            <input type='file' multiple ng-file='uploadfiles' multiple ng-files="getTheFiles($files)">
                         </div>
                       </div>
                      </fieldset>                  
                    </div>

                    <div class="col-md-4">
                      <div class="row">
                          <div ng-repeat="image in imagesrc track by $index">
                           <img ng-src="{{image.Src}}" title="image.title" width="60px" height="60px" style="padding: 5px;">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">VIDEO</label>
                          </div>
                         <div class="col-md-9">                             
                          <input id="file"  fileModel file-model="property_form.PropertyGalleryVideo" name="PropertyGalleryVideo"  value="" type="file" >
                         </div>
                       </div>
                      </fieldset>              
                    </div>

                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                              <label for="title">5 DOCUMENTS </label>
                            </div>
                         <div class="col-md-9">                             
                            <input type='file' multiple ng-file='uploadfiles' multiple ng-files="getTheDocments($files)" >
                         </div>
                       </div>
                      </fieldset>                  
                    </div>


                    <div class="col-md-8">
                     <fieldset class="form-group floating-label-form-group">
                      <div class="row">
                          <div class="col-md-3">
                             <label for="title">பெயர் / NAME</label>
                           </div>
                         <div class="col-md-9">
                            <input type="text"  class="form-control"  ng-model="property_form.PropertyOwnerName">
                         </div>
                       </div>
                     </fieldset>
                    </div>

                    <div class="col-md-8">
                       <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">செல் எண் / CONTACT NUMBER</label>
                          </div>
                           <div class="col-md-9">
                              <input type="text" class="form-control" ng-model="property_form.PropertyOwnerNumber" onlydigits >
                           </div>
                         </div>
                       </fieldset>
                    </div>

                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">கூகுள் மேப் இடத்தின் லிங்க் / GOOGLE MAP LOCATION LINK </label>
                          </div>
                          <div class="col-md-9">                             
                           <input class="form-control" ng-model="property_form.PropertyLocation" name="PropertyLocation"  value="" type="text" >
                          </div>
                       </div>
                      </fieldset>                   
                    </div> 

                     <div class="col-md-8" ng-if="role == 1">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">இடத்தின் LOCATION</label>
                          </div>
                          <div class="col-md-9">                             
                           <input class="form-control" ng-model="property_form.PropertyLocationSpot" name="PropertyLocationSpot"  value="" type="text" >
                          </div>
                       </div>
                      </fieldset>                   
                    </div> 

                    <div class="col-md-8" ng-if="property_form.Knowus.KnowusId != 5">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">REFFERED NAME</label>
                          </div>
                         <div class="col-md-9">                             
                           <input class="form-control" ng-model="property_form.PropertyReferName" name="PropertyReferName"  value="" type="text" >
                         </div>
                       </div>
                      </fieldset>                   
                    </div> 
                 
                    <div class="col-md-8" ng-if="property_form.Knowus.KnowusId != 5">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                           <label for="title">REFFERED NUMBER</label>
                         </div>
                         <div class="col-md-9">                             
                           <input class="form-control" ng-model="property_form.PropertyReferNumber" name="PropertyReferNumber"  value="" type="text" >
                         </div>
                       </div>
                      </fieldset>                   
                    </div> 

              </div> 

              <div class="col-lg-8 col-sm-8 mt-3 mt-lg-0">
                <div class="btn-list">
                    <a href="#/invoice" back="" class="btn atag">CANCEL</a>
                    <input type="submit" ng-disabled="isDisabled" ng-click="postForm()" class="btn btn-outline-primary atag btn-lg" value="SUBMIT">
                </div>
              </div>
            </div>
         </div>
      </form>
   </div>
</section>
