<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title"> SITE DETAIL </h4>
                </div>    
                <!--<div class="float-right">
                    <div class="row">
                      <div class="pad-lr-5 pad-top-8">
                        <a href="" ng-click="new()" class="btn atag">ADD SITEMAP </a>
                      </div>
                    </div>
                </div>  -->                            
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <div class="row">
                   <div class="col-md-2">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">TYPE</label>
                         <div class="">
                            <input type="text"  class="form-control" value="{{sitedetail[0].ProTypeName}}" style="border: none !important;">
                         </div>
                      </fieldset>
                   </div>
                   <div class="col-md-2">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">TITLE</label>
                         <div class="">
                            <input type="text"  class="form-control"  ng-model="sitedetail[0].PromoterName" style="border: none !important;">
                         </div>
                      </fieldset>
                   </div>
                    <div class="col-md-2">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">TOTAL SITE</label>
                         <div class="">
                            <input type="text" number-to-string class="form-control"  ng-model="sitedetail[0].FlatCount" style="border: none !important;">
                         </div>
                      </fieldset>
                   </div>
                   <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">SITEMAP</label>
                         <div class="">
                            <img class="img-fluid"  src="uploads/promoter/sitemap/{{sitedetail[0].SiteMap}}" width="80px" height="80px">
                         </div>
                      </fieldset>
                   </div>
                </div>

                <table class="table table-sm" id="table_id">
                    <thead class="">
                        <tr>
                            <th>S.NO</th>
                            <th>FLAT NO </th>
                            <th>STATUS </th>
                            <th>NAME </th>
                            <th>TOTAL AREA </th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="sites in site">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{sites.FlatNo}}</td>
                            <td>{{sites.Status}}</td>
                            <td>{{sites.PromoterDetailName}}</td>
                            <td>{{sites.PromoterLandTotal}}</td>
                            <td>
                              <a href="" ng-click="edit($index, sites);" class="btn atag btn-sm btn-primary">
                               <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href="" ng-click="delete($index, site);">
                                <md-tooltip md-direction="top">DELETE</md-tooltip><i class="ft-trash-2"></i>
                              </a> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
  </div>
</section>


<div class="modal fade text-left" id="site_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header bg-primary white">
            <h4 class="modal-title " id="myModalLabel11"><strong>{{formType}} SITEMAP </strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-3" >  
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">FLAT NO</label>
                         <div class="">
                          <input type="text" class="form-control"  ng-model="site_detail.FlatNo">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-3">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">TITLE</label>
                         <div class="">
                            <input type="text" number-to-string class="form-control"  ng-model="site_detail.PromoterDetailName">
                         </div>
                      </fieldset> 
                    </div>
                    <div class="col-md-3">  
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">TOTAL LAND AREA</label>
                         <div class="">
                          <input type="text" class="form-control" ng-model="site_detail.PromoterLandTotal">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-3" ng-class="{'has-error': formError.State}"> 
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">AREA UNIT<span class="lab-span">*</span></label><br>
                        <div class="form-group" ng-class="{'has-error': formError.PromoterLandUnit}">
                          <select ng-model="site_detail.PromoterLandUnit" class="form-control">
                            <option value="" disabled selected>SELECT UNIT</option>
                            <option ng-repeat="units in unit" value="{{units.value}}">{{units.value}}</option>    
                          </select>  
                          <span class="help-block">{{formError.PromoterLandUnit}}</span>
                        </div>
                      </fieldset>  
                    </div>
                  </div>
                  <div class="row">
                       <div class="col-md-12" ng-class="{'has-error': formError.CustomerName}">
                        <fieldset class="form-group floating-label-form-group">
                        <label for="title">FACEING<span class="lab-span">*</span></label><br>
                         <div class="row">
                            <div class="col-md-2">
                              <input type="checkbox" ng-model="site_detail.PromoterNorth"  class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterNorth=='1'">
                              <label>NORTH </label>
                            </div>
                            <div class="col-md-2">
                              <input type="checkbox" ng-model="site_detail.PromoterSouth" class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterSouth=='1'">
                              <label>SOUTH </label>
                            </div>
                            <div class="col-md-2">
                              <input type="checkbox" ng-model="site_detail.PromoterEast" class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterEast=='1'">
                              <label>EAST </label>
                            </div>
                            <div class="col-md-2">
                              <input type="checkbox" ng-model="site_detail.PromoterWest" class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterWest=='1'">
                              <label> WEST</label>
                            </div>
                            <div class="col-md-2">
                              <input type="checkbox" ng-model="site_detail.PromoterCorner" class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterCorner=='1'">
                              <label> CORNER</label>
                            </div>
                          </div>                            
                        </fieldset>
                    </div>
                  </div> 
                  <div class="row">    
                     <div class="col-md-12" ng-class="{'has-error': formError.CustomerName}">
                          <fieldset class="form-group floating-label-form-group">
                          <label for="title">WATER SOURCES<span class="lab-span">*</span></label><br>
                           <div class="row">
                              <div class="col-md-3">
                                <input type="checkbox" ng-model="site_detail.PromoterWell"  class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterWell=='1'">
                                <label>WELL </label>
                              </div>
                              <div class="col-md-3">
                                <input type="checkbox" ng-model="site_detail.PromoterBore" class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterBore=='1'">
                                <label>BORE WELL </label>
                              </div>
                              <div class="col-md-3">
                                <input type="checkbox" ng-model="site_detail.PromoterCorporation" class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterCorporation=='1'">
                                <label>CORPARATION WATER </label>
                              </div>
                              <div class="col-md-3">
                                <input type="checkbox" ng-model="site_detail.PromoterWaterNill" class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterWaterNill=='1'">
                                <label> NILL</label>
                              </div>
                            </div>
                          </fieldset>
                     </div>
                  </div>  
                  <div class="row">
                    <div class="col-md-12" ng-class="{'has-error': formError.CustomerName}">
                      <fieldset class="form-group floating-label-form-group">
                      <label for="title">EB LINE STATUS<span class="lab-span">*</span></label><br>
                           <div class="row">
                            <div class="col-md-3">
                              <input type="checkbox" ng-model="site_detail.PromoterSingle"  class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterSingle=='1'">
                              <label>SINGLE PHASE LINE </label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-model="site_detail.PromoterThree" class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterThree=='1'">
                              <label>THREE PHASE LINE </label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-model="site_detail.PromoterFree" class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterFree=='1'">
                              <label>FREE PHASE LINE </label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-model="site_detail.PromoterEbNill" class="btn btn-outline-primary atag btn-lg" ng-checked="site_detail.PromoterEbNill=='1'">
                              <label> NILL</label>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                  </div> 
                   <hr> 
                  <div class="row">    
                     <div class="col-md-4">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">RATE PER UNIT</label>
                         <div class="">
                            <input type="text" number-to-string class="form-control"  ng-model="site_detail.PromoterPerSq">
                         </div>
                      </fieldset>
                    </div>
                     <div class="col-md-4">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">TOTAL AMOUNT</label>
                         <div class="">
                            <input type="text" number-to-string class="form-control"  ng-model="site_detail.PromoterTotalAmount">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-4">
                       <fieldset class="form-group ">
                        <label for="title">STAUS</label>
                         <div class="">                             
                           <select  class="form-control" ng-model="site_detail.PromoterFlatUnit">
                              <option value="" disabled selected hidden>Select Type</option>
                              <option value="Lakhs">லட்சம்</option>
                              <option value="Cr">கோடி</option>
                              <option value="K">ஆயிரம்</option>
                          </select>
                      </fieldset>   
                     </div>
                    <div class="col-md-4">
                       <fieldset class="form-group ">
                        <label for="title">STAUS</label>
                         <div class="">                             
                           <select ng-model="site_detail.Status"class="form-control" >
                           <option  ng-repeat="stat in status" value="{{stat.value}}" >{{stat.value}}</option>    
                          </select>
                      </fieldset>   
                     </div>
                     <div class="col-md-8">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">DESCRIPTION</label>
                         <div class="">
                        <!--     <input type="text" number-to-string class="form-control"  ng-model="site_detail.PromoterDescription"> -->
                            <textarea class="form-control" ng-model="site_detail.PromoterDescription" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea> 
                         </div>
                      </fieldset>
                    </div>
                  </div>   
                                                           
                  <div class="modal-footer">
                    <a href=""  type="reset" class="btn atag" data-dismiss="modal" >CLOSE</a>
                    <input type="submit" ng-disabled="isDisabled" ng-click="postForm();" class="btn btn-outline-primary atag btn-lg" value="SAVE">
                  </div>
               </div>
            </form>
        </div>
    </div>
</div>