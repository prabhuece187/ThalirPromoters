<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title"> ABO ASSIGNMENT </h4>
                </div>    
                <div class="float-right">

                    <div class="row">
                      <div class="pad-lr-15" >
                           <input class="form-control" ng-model="form.propertyid" name="propertyid"  value="" type="text" placeholder="Property Id  ">
                      </div>
                      <div class="pad-lr-15" >
                           <input class="form-control" ng-model="form.propertyname" name="propertyname"  value="" type="text" placeholder="Property Name  ">
                      </div>
                      <div class="pad-lr-15" >
                           <input class="form-control" ng-model="form.aboid" name="aboid"  value="" type="text" placeholder="Abo Id  ">
                      </div>
                      <div class="pad-lr-15" >
                           <input class="form-control" ng-model="form.aboname" name="aboname"  value="" type="text" placeholder="Abo Name  ">
                      </div>
                      <div class="pad-lr-15" ng-show="isDisabledAboStatus == false">
                         <select  class="form-control" ng-model="form.status" name="status">
                              <option value="" disabled selected hidden>Choose Status</option>
                              <option value="Start">Start</option>
                              <option value="Processing">Processing</option>
                              <option value="Advanced">Advanced</option>
                              <option value="Completed">Completed</option>
                              <option value="End">End</option>
                         </select>
                      </div>
                      <div class="pad-lr-15" ng-show="isDisabledAboAccess == false">
                         <select  class="form-control" ng-model="form.access" name="access">
                              <option value="" disabled selected hidden>Choose Abo Status</option>
                              <option value="yes">YES</option>
                              <option value="no">NO</option>
                         </select>
                      </div>
                      <div class="pad-lr-15">
                           <input class="form-control" ng-model="form.description" name="description"  value="" type="text" placeholder="Description Search ">
                      </div>
                      <div class="pad-lr-15 pad-top-8"> 
                          <a href="" class="btn btn-primary btn-corner atag" ng-click="getTable(1,form)">
                              <md-tooltip md-direction="bottom">SEARCH</md-tooltip><i class="ft-search"></i>
                          </a>
                           <a href="" ng-click="getExcel()" class="btn atag">EXCEL</a> 
                          <!-- <a href="" ng-click="getPDF()" class="btn atag">PDF</a> -->
                      </div> 

                      <div class="pad-lr-5 pad-top-8" ng-if="id === 1">
                        <a href="" ng-click="new();" class="btn atag">ADD ABO ASSIGNMENT</a>
                      </div>
                    </div>
                </div>                             
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <table class="table table-sm " id="table_id">
                    <thead class="">
                        <tr>
                            <th>S.NO</th>
                            <th>ACTION</th>
                            <th>ABO NO</th>
                            <th>ABO NAME</th>
                            <th>PROPERTY NO</th>
                            <th>PROPERTY NAME</th>
                            <th>DATE</th>
                            <th>DESCRIPTION</th>
                            <th>REMARKS</th>
                            <th>STATUS</th>
                            <th>ABO STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="types in data" ng-if="id === 1 || id === types.AboId">
                            <th scope="row">{{$index+1}}</th>
                            <td>
                              <a href="" ng-click="edit($index, types);" class="btn atag btn-sm btn-primary" ng-if="role == 1">
                                <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href="#/followproperty/{{types.PropertyId}}"  ng-if="role === 1 || role === 5">
                                <md-tooltip md-direction="right">ADMIN FOLLOW</md-tooltip><i class="ft-phone-forwarded"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href="#/mediator_follow/{{types.MediatorId}}/{{types.PropertyId}}"  ng-if="role == 1 || (role == 5 && types.AboAssignAccess === 'yes')">
                                <md-tooltip md-direction="right">MEDIATOR FOLLOW</md-tooltip><i class="ft-phone-forwarded"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href="#/mediator_follow_details/{{types.MediatorId}}/{{types.PropertyId}}"  ng-if="role == 1 || (role == 5 && types.MediatorAssignAccess === 'yes')">
                                <md-tooltip md-direction="right">DETAILS</md-tooltip><i class="ft-file-text"></i>
                              </a>  
                              <a class="btn atag btn-sm btn-primary" href="" ng-click="delete($index, types);" ng-if="role == 1">
                                <md-tooltip md-direction="right">DELETE</md-tooltip><i class="ft-trash-2"></i>
                              </a> 
                            </td>
                            <td>{{types.AboId}}</td>
                            <td>{{types.AboName}}</td>
                            <td>{{types.PropertyId}}</td>
                            <td>{{types.PropertyName}}</td>
                            <td>{{types.AboAssignDate|date:'dd/MM/yyyy'}}</td>
                            <td>{{types.AboAssignDesc}}</td>
                            <td>{{types.AboAssignRemarks}}</td>
                            <td>{{types.AboAssignStatus}}</td>
                            <td>{{types.AboAssignAccess}}</td>
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
  <div class="modal fade text-left" id="abo_assign_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header ">
            <!-- <h4 class="modal-title" id="myModalLabel33"><strong>{{formType}}  TYPE </strong></h4> -->
            <label class="modal-title text-text-bold-600" id="myModalLabel33">{{formType}}  ABO ASSIGNMENT </strong></label>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                   <div class="row">
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">ABO NAME</label>
                         <div class="">
                            <!-- <input type="text" class="form-control"  ng-model="abo_assign_form.Abo"> -->
                            <ui-select  required ng-model="abo_assign_form.Abo" theme="select2" >
                              <ui-select-match allow-clear="true" placeholder="Select Abo Name">{{$select.selected.AboName}}</ui-select-match>
                              <ui-select-choices repeat="par in abo | filter: {AboName: $select.search} ">
                                <div>{{par.AboName}}</div>
                              </ui-select-choices>
                            </ui-select> 
                         </div>
                      </fieldset>                
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PROPERTY NAME</label>
                         <div class="">
                            <ui-select  required ng-model="abo_assign_form.Property" theme="select2" >
                              <ui-select-match allow-clear="true" placeholder="Select Property Name">{{$select.selected.PropertyId}}</ui-select-match>
                              <ui-select-choices repeat="par in property | filter: {PropertyId: $select.search} | limitTo: ($select.search.length <= 1) ? 50 : 20">
                                <div>{{par.PropertyId}}</div>
                              </ui-select-choices>
                            </ui-select>
                         </div>
                      </fieldset>                
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">DATE</label>
                         <div class="">
                            <md-datepicker ng-model="abo_assign_form.AboAssignDate" name="Idate"  md-placeholder="Enter date"></md-datepicker>
                         </div>
                      </fieldset>                
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">STATUS</label>
                         <div class="">
                            <!-- <input type="text" class="form-control"  ng-model="abo_assign_form.AboAssignStatus"> -->
                            <select ng-model="abo_assign_form.AboAssignStatus" >
                              <option value="" disabled selected hidden>Choose Status</option>
                              <option value="Start">Start</option>
                              <option value="Processing">Processing</option>
                              <option value="Advanced">Advanced</option>
                              <option value="Completed">Completed</option>
                              <option value="End">End</option>
                            </select>
                         </div>
                      </fieldset>                
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">ABO STATUS</label>
                         <div class="">
                            <select ng-model="abo_assign_form.AboAssignAccess" >
                              <option value="" disabled selected hidden>Choose Status</option>
                              <option value="yes">YES</option>
                              <option value="no">NO</option>
                            </select>
                         </div>
                      </fieldset>                
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">REMARKS</label>
                         <div class="">
                            <!-- <input type="textarea" class="form-control"  ng-model="abo_assign_form.AboAssignRemarks"> -->
                            <textarea class="form-control" ng-model="abo_assign_form.AboAssignRemarks" style="height: 100px !important;width: 100% !important;white-space: inherit !important;"> </textarea>
                         </div>
                      </fieldset>                
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">DESCRIPTION</label>
                         <div class="">
                            <textarea class="form-control" ng-model="abo_assign_form.AboAssignDesc" style="height: 100px !important;width: 100% !important;white-space: inherit !important;"> </textarea>
                         </div>
                      </fieldset>                
                    </div>
                    
                    
                  </div>                                      
                  <div class="modal-footer">
                    <a href=""  type="reset" class="btn atag" data-dismiss="modal">CLOSE
                    </a>
                    <input type="submit" ng-disabled="isDisabled" ng-click="postForm();" class="btn btn-outline-primary atag btn-lg" value="SAVE">
                  </div>
               </div>
            </form>
        </div>
    </div>
  </div>

