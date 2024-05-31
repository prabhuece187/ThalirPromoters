<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title"> MEDIATOR FOLLOW-UP PAGE </h4>
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
                                        <label>Property.No</label><br>
                                        <label>Property Name</label><br>
                                        <label>Abo Name</label><br>
                                        <label>Mediator Name</label><br>

                                    </div>
                                    <div class="col-md-8 col-sm-6">
                                        <p>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{mediator_follow_form.PropertyId}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{mediator_follow_form.PropertyName}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{mediator_follow_form.AboName}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{mediator_follow_form.MediatorName}} </b></span><br>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <label>Assigning Date</label><br>
                                        <label>Status</label><br>
                                        <label>Day to Assigned</label><br>
                                        <label>Description</label><br>
                                    </div>
                                    <div class="col-md-8 col-sm-6">
                                        <p>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{mediator_follow_form.MediatorAssignDate}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{mediator_follow_form.MediatorAssignStatus}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{days}} </b></span><br>
                                            <span style="display: inline-block;margin-bottom: 0.5rem;font-size:12px;">: <b>{{mediator_follow_form.MediatorAssignDesc}} </b></span><br>
                                        </p>
                                    </div>
                                </div>
                            </div>




<!--
                  <div class="col-md-2">
                    <label for="title">Abo.No</label>
                    <input type="text"class="form-control"  ng-model="mediator_follow_form.AboId"  style="border: none !important;" readonly="">
                  </div>
                  <div class="col-md-2">
                    <label for="title">Abo Name</label>
                    <input type="text"class="form-control"  ng-model="mediator_follow_form.AboName" style="border: none !important;" readonly="">
                  </div>
                  <div class="col-md-2">
                    <label for="title">Mediator.No</label>
                    <input type="text"class="form-control"  ng-model="mediator_follow_form.MediatorId"  style="border: none !important;" readonly="">
                  </div>

                  <div class="col-md-2">
                    <label for="title">Mediator Name</label>
                    <input type="text"class="form-control"  ng-model="mediator_follow_form.MediatorName" style="border: none !important;" readonly="">
                  </div>
                  <div class="col-md-2">
                    <label for="title">Property Number</label>
                    <input type="text"class="form-control"  ng-model="mediator_follow_form.PropertyId" style="border: none !important;" readonly="">
                  </div>
                  <div class="col-md-2">
                    <label for="title">Property Name</label>
                    <input type="text"class="form-control"  ng-model="mediator_follow_form.PropertyName" style="border: none !important;" readonly="">
                  </div>
                  <div class="col-md-2">
                    <fieldset class="form-group floating-label-form-group">
                      <label for="title">Assigning Date</label>
                       <div class="">
                          <md-datepicker ng-model="mediator_follow_form.MediatorAssignDate" name="Idate"  md-placeholder="Enter date"></md-datepicker>
                       </div>
                    </fieldset>
                   </div>
                   <div class="col-md-2">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">Status</label>
                         <div class="">
                           <input type="text"class="form-control"  ng-model="mediator_follow_form.MediatorAssignStatus"
                           style="border: none !important;" readonly="">
                         </div>
                      </fieldset>
                   </div>
                   <div class="col-md-3">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">Description</label>
                         <div class="">
                           <textarea class="form-control" ng-model="mediator_follow_form.MediatorAssignDesc" style="height: 100px !important;width: 100% !important;white-space: inherit !important;" readonly="">
                           </textarea>
                         </div>
                      </fieldset>
                   </div>
                   <div class="col-md-1">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">Days to Assigned</label>
                         <div class="">
                           <input type="text"class="form-control"  ng-model="days"
                           style="border: none !important;" readonly="">
                           </textarea>
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
                      <input type="submit" ng-disabled="isDisabledStatus" ng-click="new();" class="btn btn-outline-primary atag btn-lg" value="ADD FOLLOW-UP">
                   </div>
                    <div class="pad-lr-5 pad-top-8" style="padding-left: 15px;padding-bottom: 10px;">
                      <input type="submit" ng-disabled="isDisabledStatus" ng-click="newperson();" class="btn btn-outline-primary atag btn-lg" value="NEED TO SHOW BUYER">

                   </div>
                    <div class="pad-lr-5 pad-top-8" style="padding-left: 15px;padding-bottom: 10px;">
                      <input type="submit" ng-disabled="isDisabledStatus" ng-click="newstatus();" class="btn btn-outline-primary atag btn-lg" value="STATUS">
                   </div>
                   <div class="pad-lr-5 pad-top-8" style="padding-left: 15px;padding-bottom: 10px;" ng-if="id === 1">
                      <a href="#/followproperty/{{mediator_follow_form.PropertyId}}"   class="btn atag"  >GO PROPERTY FOLLOW-UP</a>
                  </div>
                </div>
               <div class="row">
                   <div class="col-md-6">
                      <table class="table table-sm table-responsive-lg" id="table_id">
                          <thead class="">
                              <tr>
                                  <th>S.no</th>
                                  <th>Date </th>
                                  <th>Viewed Buyer </th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Remarks</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody class="">
                              <tr ng-repeat="follows in mediator_follow">
                                  <th scope="row">{{$index+1}}</th>
                                  <td>{{follows.MediatorFollowDate|date:'dd-MM-yyyy'}}</td>
                                  <td>{{follows.MediatorViewedBuyer}}</td>
                                  <td>{{follows.MediatorFollowDesc}}</td>
                                  <td>{{follows.MediatorFollowStatus}}</td>
                                  <td>{{follows.MediatorFollowRemarks}}</td>
                                  <td ng-show="isDisabledStatus === false">
                                    <a href=""  ng-click="edit($index, follows);" class="btn atag btn-sm btn-primary">
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
                      <table class="table table-sm table-responsive-lg" id="table_id">
                          <thead class="">
                              <tr>
                                  <th>S.no</th>
                                  <th>Name </th>
                                  <th>Number </th>
                                  <th>Date</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Remarks</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody class="">
                              <tr ng-repeat="per in mediator_buyer">
                                  <th scope="row">{{$index+1}}</th>
                                  <td>{{per.PersonName}}</td>
                                  <td>{{per.PersonNumber}}</td>
                                  <td>{{per.MediatorBuyerDate|date:'dd-MM-yyyy'}}</td>
                                  <td>{{per.MediatorBuyerDesc}}</td>
                                  <td>{{per.MediatorBuyerStatus}}</td>
                                  <td>{{per.MediatorBuyerRemarks}}</td>
                                  <td ng-show="isDisabledStatus === false">
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
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PROPERTY</label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="mediator_follow_form.PropertyId" readonly="">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PROPERTY NAME</label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="mediator_follow_form.PropertyName" readonly="">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">MEDIATOR</label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="mediator_follow_form.MediatorId" readonly="">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">MEDIATOR NAME</label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="mediator_follow_form.MediatorName" readonly="">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">DATE</label>
                         <div class="">
                          <md-datepicker ng-model="mediator_follow_form.MediatorFollowDate"   md-placeholder="Enter date"></md-datepicker>
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">VIEWED BUYER</label>
                         <div class="">
                            <input type="text" number-to-string class="form-control"  ng-model="mediator_follow_form.MediatorViewedBuyer">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">STATUS</label>
                         <div class="">
                            <select ng-model="mediator_follow_form.MediatorFollowStatus" >
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
                        <label for="title">DESCRIPTION</label>
                         <div class="">
                          <textarea class="form-control" ng-model="mediator_follow_form.MediatorFollowDesc" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea>
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">REMARKS</label>
                         <div class="">
                            <textarea class="form-control" ng-model="mediator_follow_form.MediatorFollowRemarks" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea>
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



<div class="modal fade text-left" id="mediator_buyer_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
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
                     <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PROPERTY</label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="mediator_buyer_form.PropertyId" readonly="">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PROPERTY NAME</label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="mediator_buyer_form.PropertyName" readonly="">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">MEDIATOR</label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="mediator_buyer_form.MediatorId" readonly="">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">MEDIATOR NAME</label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="mediator_buyer_form.MediatorName" readonly="">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">DATE</label>
                         <div class="">
                          <md-datepicker ng-model="mediator_buyer_form.MediatorBuyerDate"   md-placeholder="Enter date"></md-datepicker>
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PERSON NAME</label>
                         <div class="">
                          <input type="text" class="form-control"  ng-model="mediator_buyer_form.PersonName">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">NUMBER</label>
                         <div class="">
                            <input type="text" class="form-control"  ng-model="mediator_buyer_form.PersonNumber" onlydigits >
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">STATUS</label>
                         <div class="">
                            <select ng-model="mediator_buyer_form.MediatorBuyerStatus" >
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
                        <label for="title">DESCRIPTION</label>
                         <div class="">
                          <textarea class="form-control" ng-model="mediator_buyer_form.MediatorBuyerDesc" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea>
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">REMARKS</label>
                         <div class="">
                            <textarea class="form-control" ng-model="mediator_buyer_form.MediatorBuyerRemarks" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea>
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
                     <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PROPERTY</label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="status_form.PropertyId" readonly="">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PROPERTY NAME</label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="status_form.PropertyName" readonly="">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">MEDIATOR</label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="status_form.MediatorId" readonly="">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6" >
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">MEDIATOR NAME</label>
                         <div class="">
                          <input type="text" number-to-string class="form-control"  ng-model="status_form.MediatorName" readonly="">
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                       <fieldset class="form-group floating-label-form-group">
                        <label for="title">STATUS</label>
                         <div class="">
                            <select ng-model="status_form.MediatorAssignStatus" >
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
