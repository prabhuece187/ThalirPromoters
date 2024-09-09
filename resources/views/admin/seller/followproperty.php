<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title"> PROPERTY FOLLOW-UP PAGE </h4>
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
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <label>T.No</label><br>
                                        <label>Entry Date</label><br>
                                        <label>Refer Name</label><br>
                                        <label>Refer Number</label><br>
                                        <label>Requirement</label><br>
                                        <label>Type</label><br>
                                        <label>Area</label><br>
                                        <label>Description</label><br>

                                    </div>
                                    <div class="col-md-8 col-sm-6">
                                        <p>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{follow_form.PropertyId}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{follow_form.PropertyDate}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{follow_form.PropertyReferName}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{follow_form.PropertyReferNumber}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{follow_form.NeedName}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{follow_form.TypeName}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{follow_form.AreaName}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{follow_form.PropertyDescription}} </b></span><br>

                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <label>Budjet</label><br>
                                        <label>Abo Name</label><br>
                                        <label>Mediator Name</label><br>
                                        <label>Status</label><br>
                                        <label>Reason</label><br>
                                        <label>Area Details</label><br>
                                        <label>Image</label><br>
                                    </div>
                                    <div class="col-md-8 col-sm-6">
                                        <p>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{follow_form.PropertyTotalBudget}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{abo['0'].AboName}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{media['0'].MediatorName}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{follow_form.PropertyStatus}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{follow_form.PropertyPendingReason}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{follow_form.PropertyAreaDetail}}</b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b><img src="uploads/property/gallery/{{follow_form.PropertyGalleryImage}}" width="60px" height="60px" ng-if="follow_form.PropertyGalleryImage"> </b></span><br>
                                        </p>
                                    </div>
                                </div>
                            </div>

<!--
                  <div class="col-md-2">
                    <label for="title">T.No</label>
                    <input type="text"class="form-control"  ng-model="follow_form.PropertyId" style="border: none !important;">
                  </div>
                  <div class="col-md-2">
                    <label for="title">Refer Name</label>
                    <input type="text"class="form-control"  ng-model="follow_form.PropertyReferName"style="border: none !important;">
                  </div>
                  <div class="col-md-2">
                    <label for="title">Refer Number</label>
                    <input type="text"class="form-control"  ng-model="follow_form.PropertyReferNumber"style="border: none !important;">
                  </div>
                  <div class="col-md-2">
                    <label for="title">REQUIRMENT</label>
                    <input type="text"class="form-control"  ng-model="follow_form.NeedName"style="border: none !important;">
                  </div>
                    <div class="col-md-2">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">TYPE</label>
                         <div class="">
                            <input type="text" number-to-string class="form-control"  ng-model="follow_form.TypeName" style="border: none !important;">
                         </div>
                      </fieldset>
                   </div>
                   <div class="col-md-2">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">BUDJET</label>
                         <div class="">
                           <input type="text"class="form-control"  ng-model="follow_form.PropertyTotalBudget"
                           style="border: none !important;">
                         </div>
                      </fieldset>
                   </div>
                   <div class="col-md-3">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">DESCRIPTION</label>
                         <div class="">
                           <textarea class="form-control" ng-model="follow_form.PropertyDescription" style="height: 100px !important;width: 100% !important;white-space: inherit !important;">
                           </textarea>
                         </div>
                      </fieldset>
                   </div>

                   <div class="col-md-2">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">STATUS</label>
                         <div class="">
                           <input type="text"class="form-control"  ng-model="follow_form.PropertyStatus"
                           style="border: none !important;">
                         </div>
                      </fieldset>
                   </div>
                    <div class="col-md-2">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">REASON</label>
                         <div class="">
                           <input type="text"class="form-control"  ng-model="follow_form.PropertyPendingReason"
                           style="border: none !important;">
                         </div>
                      </fieldset>
                   </div>
                  <div class="col-md-2">
                        <label for="title">Image</label>
                        <img src="uploads/property/gallery/{{follow_form.PropertyGalleryImage}}" width="60px" height="60px" ng-if="follow_form.PropertyGalleryImage">
                        </img>
                  </div>

                  <div class="col-md-2">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">Abo Name</label>
                         <div class="">
                           <input type="text"class="form-control"  ng-model="abo['0'].AboName"
                           style="border: none !important;">
                         </div>
                      </fieldset>
                   </div>
                   <div class="col-md-2">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">Mediator Name</label>
                         <div class="">
                           <input type="text"class="form-control"  ng-model="media['0'].MediatorName"
                           style="border: none !important;">
                         </div>
                      </fieldset>
                   </div> -->

                  <!--  <div class="col-md-2">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PENDING RESON</label>
                         <div class="">
                           <input type="text"class="form-control"  ng-model="follow_form.PropertyPendingReason"
                           style="border: none !important;">
                         </div>
                      </fieldset>
                   </div> -->
                 </div>
                 <div class="row">
                   <div class="pad-lr-5 pad-top-8" style="padding-left: 15px;padding-bottom: 10px;">
                      <a href="" ng-click="new();" class="btn atag">ADD FOLLOW-UP</a>
                   </div>
                    <div class="pad-lr-5 pad-top-8" style="padding-left: 15px;padding-bottom: 10px;">
                      <a href="" ng-click="newperson();" class="btn atag">NEED TO SHOW BUYER</a>
                   </div>
                    <div class="pad-lr-5 pad-top-8" style="padding-left: 15px;padding-bottom: 10px;">
                      <a href="" ng-click="newstatus();" class="btn atag">STATUS</a>
                   </div>
                   <div class="pad-lr-5 pad-top-8" style="padding-left: 15px;padding-bottom: 10px;" ng-if="role == 1">
                     <a href="" ng-click="newaboassign();" class="btn atag">ADD ABO ASSIGNMENT</a>
                   </div>
                   <div class="pad-lr-5 pad-top-8" style="padding-left: 15px;padding-bottom: 10px;">
                     <a href="" ng-click="newassign();" class="btn atag">ADD MEDIATOR ASSIGNMENT</a>
                   </div>
                   <div class="pad-lr-5 pad-top-8" style="padding-left: 15px;padding-bottom: 10px;">
                     <a href="" ng-click="newmediafollow();" class="btn atag">GOTO MEDIATOR PAGE</a>
                   </div>
                   <div class="pad-lr-5 pad-top-8" style="padding-left: 15px;padding-bottom: 10px;">
                     <a href="#/customer_follow_report/{{follow_form.PropertyId}}"  class="btn atag">THIS PROPERTY REPORT</a>
                   </div>
                </div>

                <div class="row">
                   <div class="col-md-6">
                      <table class="table table-sm" id="table_id">
                          <thead class="">
                              <tr>
                                  <th>S.NO</th>
                                  <th>DATE </th>
                                  <th>VIEWED BUYER </th>
                                  <th>DESCRIPTION</th>
                                  <th>ACTION</th>
                              </tr>
                          </thead>
                          <tbody class="">
                              <tr ng-repeat="follows in follow">
                                  <th scope="row">{{$index+1}}</th>
                                  <td>{{follows.FollowDate}}</td>
                                  <td>{{follows.ViewedBuyer}}</td>
                                  <td>{{follows.FollowDescription}}</td>
                                  <td>
                                    <a href="" ng-click="edit($index, follows);" class="btn atag btn-sm btn-primary">
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
                   <div class="col-md-6">
                      <table class="table table-sm" id="table_id">
                          <thead class="">
                              <tr>
                                  <th>S.NO</th>
                                  <th>NAME </th>
                                  <th>NUMBER </th>
                                  <th>DETAIL</th>
                                  <th>ACTION</th>
                              </tr>
                          </thead>
                          <tbody class="">
                              <tr ng-repeat="per in person">
                                  <th scope="row">{{$index+1}}</th>
                                  <td>{{per.PersonName}}</td>
                                  <td>{{per.PersonNumber}}</td>
                                  <td>{{per.PersonDetail}}</td>
                                  <td>
                                    <a href="" ng-click="editperson($index, per);" class="btn atag btn-sm btn-primary">
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
            </div>
        </div>
    </form>
  </div>
</section>


<div class="modal fade text-left" id="follow_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header bg-primary white">
            <h4 class="modal-title " id="myModalLabel11"><strong>{{formType}} FOLLOW-UP </strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-3" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">DATE</label>
                         <div class="">
                          <md-datepicker ng-model="follow_form.FollowDate"   md-placeholder="Enter date"></md-datepicker>
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-3">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">VIEWED BUYER</label>
                         <div class="">
                            <input type="text" number-to-string class="form-control"  ng-model="follow_form.ViewedBuyer">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">DESCRIPTION</label>
                         <div class="">
                          <textarea class="form-control" ng-model="follow_form.FollowDescription" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea>
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



<div class="modal fade text-left" id="person_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header bg-primary white">
            <h4 class="modal-title " id="myModalLabel11"><strong>{{formType}} NEED TO SHOWED PERSON </strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-3" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">NAME</label>
                         <div class="">
                          <input type="text" class="form-control"  ng-model="person_form.PersonName">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-3">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">NUMBER</label>
                         <div class="">
                            <input type="text" class="form-control"  ng-model="person_form.PersonNumber" onlydigits >
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">DETAILS</label>
                         <div class="">
                          <textarea class="form-control" ng-model="person_form.PersonDetail" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea>
                         </div>
                      </fieldset>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a href=""  type="reset" class="btn atag" data-dismiss="modal" >CLOSE</a>
                    <input type="submit" ng-disabled="isDisabled" ng-click="postPerson();" class="btn btn-outline-primary atag btn-lg" value="SAVE">
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
                           <select ng-model="status_form.PropertyStatus"class="form-control" >
                           <option  ng-repeat="stat in status" value="{{stat.value}}" >{{stat.value}}</option>
                          </select>
                      </fieldset>
                     </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PENDING REASON</label>
                         <div class="">
                          <textarea class="form-control" ng-model="status_form.PropertyPendingReason" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea>
                         </div>
                      </fieldset>
                    </div>
                     <div class="col-md-6" hidden>
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">USER RESPONSE</label>
                         <div class="">
                          <input type="text" class="form-control"  ng-model="status_form.PropertyUserStatus" value="add">
                         </div>
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


  <div class="modal fade text-left" id="mediator_assign_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header ">
            <!-- <h4 class="modal-title" id="myModalLabel33"><strong>{{formType}}  TYPE </strong></h4> -->
            <label class="modal-title text-text-bold-600" id="myModalLabel33">{{formType}}  MEDIATOR ASSIGNMENT </strong></label>
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
                            <input type="text" class="form-control"  ng-model="mediator_assign_form.AboName">
                            <!-- <ui-select  required ng-model="mediator_assign_form.Abo" theme="select2" >
                              <ui-select-match allow-clear="true" placeholder="Select Abo Name">{{$select.selected.AboName}}</ui-select-match>
                              <ui-select-choices repeat="par in abo | filter: {AboName: $select.search} ">
                                <div>{{par.AboName}}</div>
                              </ui-select-choices>
                            </ui-select> -->
                         </div>
                      </fieldset>
                    </div>
                    <!-- <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">ABO TO ASSIGNED PROPERTIES</label>
                         <div class="">
                            <input type="text" class="form-control"  ng-model="mediator_assign_form.Mediator">
                            <ui-select  required ng-model="mediator_assign_form.assign" theme="select2" >
                              <ui-select-match allow-clear="true" placeholder="Select Abo Name">{{$select.selected.PropertyId}}</ui-select-match>
                              <ui-select-choices repeat="par in aboassign | filter: {PropertyId: $select.search} ">
                                <div>{{par.PropertyId}}</div>
                              </ui-select-choices>
                            </ui-select>
                         </div>
                      </fieldset>
                    </div> -->
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">MEDIATOR NAME</label>
                         <div class="">
                            <!-- <input type="text" class="form-control"  ng-model="mediator_assign_form.Mediator"> -->
                            <ui-select  required ng-model="mediator_assign_form.Mediator" theme="select2" >
                              <ui-select-match allow-clear="true" placeholder="Select Mediator Name">{{$select.selected.MediatorName}}</ui-select-match>
                              <ui-select-choices repeat="par in mediator | filter: {MediatorName: $select.search} ">
                                <div>{{par.MediatorName}}</div>
                              </ui-select-choices>
                            </ui-select>
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PROPERTY ID</label>
                         <div class="">
                            <!-- <ui-select  required ng-model="mediator_assign_form.Property" theme="select2" >
                              <ui-select-match allow-clear="true" placeholder="Select Property Name">{{$select.selected.PropertyId}}</ui-select-match>
                              <ui-select-choices repeat="par in property | filter: {PropertyId: $select.search} | limitTo: ($select.search.length <= 1) ? 50 : 20">
                                <div>{{par.PropertyId}}</div>
                              </ui-select-choices>
                            </ui-select> -->
                            <input type="text" class="form-control"  ng-model="mediator_assign_form.PropertyId">
                         </div>
                      </fieldset>
                    </div>
                     <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PROPERTY NAME</label>
                         <div class="">
                            <!-- <ui-select  required ng-model="mediator_assign_form.Property" theme="select2" >
                              <ui-select-match allow-clear="true" placeholder="Select Property Name">{{$select.selected.PropertyId}}</ui-select-match>
                              <ui-select-choices repeat="par in property | filter: {PropertyId: $select.search} | limitTo: ($select.search.length <= 1) ? 50 : 20">
                                <div>{{par.PropertyId}}</div>
                              </ui-select-choices>
                            </ui-select> -->
                            <input type="text" class="form-control"  ng-model="mediator_assign_form.PropertyName">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">DATE</label>
                         <div class="">
                            <md-datepicker ng-model="mediator_assign_form.MediatorAssignDate" name="Idate"  md-placeholder="Enter date"></md-datepicker>
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">STATUS</label>
                         <div class="">
                            <!-- <input type="text" class="form-control"  ng-model="mediator_assign_form.MediatorAssignStatus"> -->
                            <select ng-model="mediator_assign_form.MediatorAssignStatus" >
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
                        <label for="title">MEDIATOR STATUS</label>
                         <div class="">
                            <select ng-model="mediator_assign_form.MediatorAssignAccess" >
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
                            <!-- <input type="textarea" class="form-control"  ng-model="mediator_assign_form.MediatorAssignRemarks"> -->
                            <textarea class="form-control" ng-model="mediator_assign_form.MediatorAssignRemarks" style="height: 100px !important;width: 100% !important;white-space: inherit !important;"> </textarea>
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">DESCRIPTION</label>
                         <div class="">
                            <textarea class="form-control" ng-model="mediator_assign_form.MediatorAssignDesc" style="height: 100px !important;width: 100% !important;white-space: inherit !important;"> </textarea>
                         </div>
                      </fieldset>
                    </div>


                  </div>
                  <div class="modal-footer">
                    <a href=""  type="reset" class="btn atag" data-dismiss="modal">CLOSE
                    </a>
                    <input type="submit" ng-disabled="isDisabled" ng-click="postFormAssign();" class="btn btn-outline-primary atag btn-lg" value="SAVE">
                  </div>
               </div>
            </form>
        </div>
    </div>
  </div>



  <div class="modal fade text-left" id="mediator_follow_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header bg-primary white">
            <h4 class="modal-title " id="myModalLabel11"><strong>{{formType}} FOLLOW-UP </strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-3" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PROPERTY ID </label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="mediator_follow_form.PropertyId">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-3">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">MEDIATOR </label>
                         <div class="">
                             <ui-select  required ng-model="mediator_follow_form.mediator" theme="select2" >
                              <ui-select-match allow-clear="true" placeholder="Select Mediator Name">{{$select.selected.MediatorName}}</ui-select-match>
                              <ui-select-choices repeat="par in media | filter: {MediatorName: $select.search} | limitTo: ($select.search.length <= 1) ? 50 : 20">
                                <div>{{par.MediatorName}}</div>
                              </ui-select-choices>
                            </ui-select>
                         </div>
                      </fieldset>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a href=""  type="reset" class="btn atag" data-dismiss="modal" >CLOSE</a>
                    <a href="#/mediator_follow/{{mediator_follow_form.mediator.MediatorId}}/{{mediator_follow_form.PropertyId}}"   class="btn atag"  >GO MEDIATOR FOLLOW-UP</a>
                  </div>
               </div>
            </form>
        </div>
    </div>
</div>



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
                        <label for="title">PROPERTY ID</label>
                         <div class="">
                            <!-- <ui-select  required ng-model="abo_assign_form.Property" theme="select2" >
                              <ui-select-match allow-clear="true" placeholder="Select Property Name">{{$select.selected.PropertyId}}</ui-select-match>
                              <ui-select-choices repeat="par in property | filter: {PropertyId: $select.search} | limitTo: ($select.search.length <= 1) ? 50 : 20">
                                <div>{{par.PropertyId}}</div>
                              </ui-select-choices>
                            </ui-select> -->
                            <input type="text" class="form-control"  ng-model="abo_assign_form.PropertyId">
                         </div>
                      </fieldset>
                    </div>
                     <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PROPERTY NAME</label>
                         <div class="">
                            <!-- <ui-select  required ng-model="abo_assign_form.Property" theme="select2" >
                              <ui-select-match allow-clear="true" placeholder="Select Property Name">{{$select.selected.PropertyId}}</ui-select-match>
                              <ui-select-choices repeat="par in property | filter: {PropertyId: $select.search} | limitTo: ($select.search.length <= 1) ? 50 : 20">
                                <div>{{par.PropertyId}}</div>
                              </ui-select-choices>
                            </ui-select> -->
                            <input type="text" class="form-control"  ng-model="abo_assign_form.PropertyName">
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
                            <!-- <input type="text" class="form-control"  ng-model="abo_assign_form.MediatorAssignStatus"> -->
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
                            <!-- <input type="textarea" class="form-control"  ng-model="abo_assign_form.MediatorAssignRemarks"> -->
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
                    <input type="submit" ng-disabled="isDisabled" ng-click="postFormAboAssign();" class="btn btn-outline-primary atag btn-lg" value="SAVE">
                  </div>
               </div>
            </form>
        </div>
    </div>
  </div>
