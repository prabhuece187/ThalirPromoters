<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title"> ASP DATAS</h4>
                </div>
                <div class="float-right">
                    <div class="row">
                      <div class="pad-lr-5 mar-right-20">
                            <input type="text" class="form-control" ng-change="getTable(1,refer.search);"  ng-model="refer.search" placeholder="Search Invoice Detail">
                      </div>
                      <div class="pad-lr-5 pad-top-8">
                        <a href="" ng-click="new()" class="btn atag">ADD ASP DATA </a>
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
                            <td>{{ref.AspDataId}}</td>
                            <td>{{ref.AspDataDate|date:'dd/MM/yyyy'}}</td>
                            <td>{{ref.AspDataFor}}</td>
                            <td>{{ref.AspDataLead}}</td>
                            <td>{{ref.AspDataType}}</td>
                            <td>{{ref.AspDataFacing}}</td>
                            <td>{{ref.AreaName}}</td>
                            <td>{{ref.AspDataVal}} {{ref.AspDataPayType}}</td>
                            <td>{{ref.AspDataSize}}</td>
                            <td>{{ref.AspDataName}}</td>
                            <td>{{ref.AspDataNumber}}</td>
                            <td>{{ref.AspDataFullDetails}}</td>
                            <td>
                              <a href="" ng-click="edit($index, ref);" class="btn atag btn-sm btn-primary">
                              <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href="" ng-click="delete($index, ref);">
                                <md-tooltip md-direction="top">DELETE</md-tooltip><i class="ft-trash-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href=""  ng-click="newstatus(ref.AspDataId)">
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
<div class="modal fade text-left" id="asp_data_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header bg-primary white">
            <h4 class="modal-title" id="myModalLabel11"><strong>{{formType}} ASP DATA </strong></h4>
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
                            <md-datepicker ng-model="asp_data_form.AspDataDate" name="Idate"  md-placeholder="Enter date"></md-datepicker>
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">LEAD<span class="lab-span">*</span></label>
                           <div class="">
                                <select ng-model="asp_data_form.AspDataLead" class="form-control">
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
                                <select ng-model="asp_data_form.AspDataFor" class="form-control">
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
                                <select ng-model="asp_data_form.AspDataType" class="form-control">
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
                                <select ng-model="asp_data_form.AspDataFacing" class="form-control">
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
                              <input type="text" class="form-control"  ng-model="asp_data_form.AspDataSize">
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">AREA CODE</label>
                           <div class="">
                              <ui-select  required ng-model="asp_data_form.Area" theme="select2" >
                                <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.AreaName}}</ui-select-match>
                                <ui-select-choices repeat="par in area | filter: {AreaName: $select.search}">
                                  <div>{{par.AreaName}}</div>
                                </ui-select-choices>
                              </ui-select>
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-8">
                         <fieldset class="form-group floating-label-form-group">
                            <label for="title">RATE in LAKHS</label>
                            <div class="">
                                <input class="form-control" ng-model="asp_data_form.AspDataVal" name="ReferVal"  value="" type="text" >
                            </div>
                         </fieldset>
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">NAME<span class="lab-span">*</span></label>
                           <div class="">
                              <input type="text" class="form-control"  ng-model="asp_data_form.AspDataName">
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">COTACT NUMBER</label>
                           <div class="">
                             <input class="form-control" ng-model="asp_data_form.AspDataNumber" name="ReferNumber"  value="" type="text" >
                           </div>
                        </fieldset>
                      </div>

                    <div class="col-md-8">
                       <fieldset class="form-group floating-label-form-group">
                         <label for="title"> FULL DETAILS</label>
                         <div class="">
                           <textarea class="form-control" ng-model="asp_data_form.AspDataFullDetails" style="height: 100px !important;width: 100% !important;white-space: inherit !important;">
                           </textarea>
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
                          <select ng-model="status_form.AspDataStatus"class="form-control" >
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
