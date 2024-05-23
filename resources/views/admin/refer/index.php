<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title"> ROUGH DATAS </h4>
                </div>    
                <div class="float-right">
                    <div class="row">
                      <div class="pad-lr-5 mar-right-20">
                            <input type="text" class="form-control" ng-change="getTable(1,refer.search);"  ng-model="refer.search" placeholder="Search Invoice Detail">
                      </div> 
                      <div class="pad-lr-5 pad-top-8">
                        <a href="" ng-click="new()" class="btn atag">ADD DATA </a>
                      </div>
                    </div>
                </div>                             
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <table class="table table-sm table-responsive-sm table-responsive-lg table-responsive-md table-responsive" id="table_id">
                    <thead class="">
                        <tr>
                            <th>S.NO</th>
                            <th>PROPERTY ID</th>
                            <th>IMAGE</th>
                            <th>DATE </th>
                            <th>FOR </th>
                            <th>LEAD </th>
                            <th>TYPE </th>
                            <th>FACING </th>
                            <th>AREA </th>
                            <th>RATE IN LAKHS </th>
                            <th>SIZE </th>
                            <th>NAME</th>
                            <th>NUMBER</th>
                            <th>FULL DETAILS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="ref in data">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{ref.ReferId}}</td>
                            <td><img class="img-fluid"  src="uploads/refer/gallery/{{ref.photo}}" width="50px" height="50px"></td>
                            <td>{{ref.ReferDate|date:'dd/MM/yyyy'}}</td>
                            <td>{{ref.ReferFor}}</td>
                            <td>{{ref.ReferLead}}</td>
                            <td>{{ref.ReferType}}</td>
                            <td>{{ref.ReferFacing}}</td>
                            <td>{{ref.AreaName}}</td>
                            <td>{{ref.ReferVal}} {{ref.ReferPayType}}</td>
                            <td>{{ref.ReferSize}}</td>
                            <td>{{ref.ReferName}}</td>
                            <td>{{ref.ReferNumber}}</td>
                            <td>{{ref.ReferFullDetails}}</td>
                            <td>
                              <a href="" ng-click="edit($index, ref);" class="btn atag btn-sm btn-primary">
                              <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href="" ng-click="delete($index, ref);">
                                <md-tooltip md-direction="top">DELETE</md-tooltip><i class="ft-trash-2"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href=""  ng-click="newstatus(ref.ReferId)">
                                <md-tooltip md-direction="right">STATUS</md-tooltip><i class="ft-phone-forwarded"></i>
                              </a> 
                            </td>
                        </tr>
                    </tbody>
                </table>
                <label ng-if="data.length==0" class="col-xs-12 form-label text-center mt-4">
                <i>No records found...</i>
                </label>
                <div ng-if="data.length!=0" ng-include="'/views/admin.pagination'"></div>
            </div>
        </div>
    </form>
  </div>
</section>
<div class="modal fade text-left" id="refer_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header bg-primary white">
            <h4 class="modal-title" id="myModalLabel11"><strong>{{formType}} ROUGH DATA </strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                   <div class="row">
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">DATE<span class="lab-span">*</span></label>
                           <div class="">                   
                            <md-datepicker ng-model="refer_form.ReferDate" name="Idate"  md-placeholder="Enter date"></md-datepicker>
                           </div>
                        </fieldset>                   
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">LEAD<span class="lab-span">*</span></label>
                           <div class="">            
                                <select ng-model="refer_form.ReferLead" class="form-control">
                                  <option  value="" disabled selected hidden>Select Lead</option>
                                  <option  value="Mediater">Mediater</option>    
                                  <option  value="Owner">Owner</option>    
                                  <option  value="Friend">Friend</option>    
                                </select>
                           </div>
                        </fieldset>                 
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">FOR<span class="lab-span">*</span></label>
                           <div class="">            
                                <select ng-model="refer_form.ReferFor" class="form-control">
                                  <option  value="" disabled selected hidden>Select For</option>
                                  <option  value="Sell">Sell</option>    
                                  <option  value="Buy">Buy</option>    
                                  <option  value="Rent">Rent</option>    
                                  <option  value="Tenant">Tenant</option>    
                                </select>
                           </div>
                        </fieldset>                 
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">TYPE<span class="lab-span">*</span></label>
                           <div class="">            
                                <select ng-model="refer_form.ReferType" class="form-control">
                                  <option  value="" disabled selected hidden>Select Type</option>
                                  <option  value="Land">Land</option>    
                                  <option  value="House">House</option>    
                                  <option  value="ComercialBuilding">ComercialBuilding</option>    
                                  <option  value="FarmLand">FarmLand</option>   
                                  <option  value="Appartment">Appartment</option>    
                                  <option  value="LandHouse">LandHouse</option>    
                                  <option  value="Godown">Godown</option>    
                                  <option  value="Others">Others</option>   
                                </select>
                           </div>
                        </fieldset>                 
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">FACING<span class="lab-span">*</span></label>
                           <div class="">            
                                <select ng-model="refer_form.ReferFacing" class="form-control">
                                  <option  value="" disabled selected hidden>Select Facing</option>    
                                  <option  value="East">East</option>    
                                  <option  value="North">North</option>    
                                  <option  value="West">West</option>    
                                  <option  value="South">South</option>   
                                  <option  value="EastNorth">EastNorth</option>    
                                  <option  value="WestSouth">WestSouth</option>    
                                  <option  value="EastSouth">EastSouth</option>    
                                  <option  value="NorthWest"> NorthWest</option>   
                                  <option  value="Others"> Others</option>   
                                </select>
                           </div>
                        </fieldset>                 
                      </div>

                     <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">SIZE<span class="lab-span">*</span></label>
                           <div class="">
                              <input type="text" class="form-control"  ng-model="refer_form.ReferSize">
                           </div>
                        </fieldset> 
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">AREA CODE</label>
                           <div class="">                             
                              <ui-select  required ng-model="refer_form.Area" theme="select2" >
                                <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.AreaName}}</ui-select-match>
                                <ui-select-choices repeat="par in area | filter: {AreaName: $select.search}">
                                  <div>{{par.AreaName}}</div>
                                </ui-select-choices>
                              </ui-select>   
                           </div>
                        </fieldset>                   
                      </div>
                      <div class="col-md-8">
                        <!-- <div class="row"> -->
                          <!-- <div class="col-md-8"> -->
                             <fieldset class="form-group floating-label-form-group">
                               <label for="title">RATE in LAKHS</label>
                               <div class="">                             
                                 <input class="form-control" ng-model="refer_form.ReferVal" name="ReferVal"  value="" type="text" >
                               </div>
                             </fieldset>  
                          </div>
                          <!-- <div class="col-md-4">
                            <label for="title">AMOUNT TYPE</label>
                             <select  class="form-control" ng-model="refer_form.ReferPayType">
                              <option value="" disabled selected hidden>Select Type</option>
                              <option value="Lakhs">லட்சம்</option>
                              <option value="Cr">கோடி</option>
                              <option value="K">ஆயிரம்</option>
                             </select>
                          </div> -->
                        <!-- </div> -->
                      </div> 
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">NAME<span class="lab-span">*</span></label>
                           <div class="">
                              <input type="text" class="form-control"  ng-model="refer_form.ReferName">
                           </div>
                        </fieldset> 
                      </div> 
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">COTACT NUMBER</label>
                           <div class="">                             
                             <input class="form-control" ng-model="refer_form.ReferNumber" name="ReferNumber"  value="" type="text" >
                           </div>
                        </fieldset>                   
                      </div> 

                      <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">VIDEO</label>
                          </div>
                         <div class="col-md-9">                             
                          <input id="file"  fileModel file-model="refer_form.ReferVideo" name="PropertyGalleryVideo"  value="" type="file" >
                         </div>
                       </div>
                      </fieldset>              
                    </div>
                      
                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="title">3 PHOTOS ONLY</label>
                          </div>
                          <div class="col-md-9">                             
                            <input type='file' multiple ng-file='uploadfiles' multiple ng-files="getTheFiles($files)" >
                          </div>
                      </fieldset>                  
                    </div>
                    <div class="col-md-8">
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
                            <label for="title"> FULL DETAILS</label>
                          </div>
                         <div class="col-md-9">
                           <textarea class="form-control" ng-model="refer_form.ReferFullDetails" style="height: 100px !important;width: 100% !important;white-space: inherit !important;">
                           </textarea> 
                           </div>
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

<div class="modal fade text-left" id="status_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog " role="document">
       <div class="modal-content">
          <div class="modal-header bg-primary white">
            <h4 class="modal-title " id="myModalLabel11"><strong>STATUS UPDATE </strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                  <div class="row">
                     <div class="col-md-6">
                       <fieldset class="form-group ">
                        <label for="title">STAUS</label>
                         <div class="">                             
                          <select ng-model="status_form.ReferStatus"class="form-control" >
                           <option  value="" disabled selected hidden>Select Status</option> 
                           <option   value="Completed" >Completed</option>    
                           <option   value="Pending" >Pending</option>    
                           <option   value="Cancelled" >Cancelled</option>    
                          </select>
                      </fieldset>   
                     </div>
                  </div>    
                  <div class="modal-footer">
                    <a href=""  type="reset" class="btn atag" data-dismiss="modal" >CLOSE</a>
                    <input type="submit" ng-disabled="isDisabled" ng-click="postStatus();" class="btn btn-outline-primary atag btn-lg" value="SAVE">
                  </div>
               </div>
            </form>
        </div>
    </div>
</div>