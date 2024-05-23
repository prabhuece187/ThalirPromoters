<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title"> BUYER RENT REQUEST </h4>
                </div>    
                <div class="float-right">
                    <div class="row">
                      <div class="pad-lr-5 pad-top-8">
                        <a href="" ng-click="new();" class="btn atag">ADD BUYER RENT</a>
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
                            <th> S.NO</th>
                            <th> BR.NO</th>
                            <th> BUYER </th>
                            <th> BUDJETMIN </th>
                            <th> BUDJETMAX </th>
                            <th> TYPEDATA </th>
                            <th> IMAGE </th>
                            <th> TYPEDETAIL </th>
                            <th> AREA </th>
                            <th> STATUS </th>
                            <th> FROM </th>
                            <th> NUMBER </th>
                            <th> DESCRIPTION </th>
                            <th> ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="request in data">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{request.BuyerRentId}}</td>
                            <td>{{request.Name}}</td>
                            <td>{{request.BudjetMin}}</td>
                            <td>{{request.BudjetMax}}</td>
                            <td>{{request.TypeData}}</td>
                            <td><img src="uploads/buyer/gallery/{{request.TypeData}}.jpg" width="60px" height="60px"></img></td>
                            <td>{{request.TypeDescription}}</td>
                            <td>{{request.Area}}</td>
                            <td>{{request.Status}}</td> 
                            <td ng-if="(request.ForWhere) == 'Webuser'" style="color: red">
                              {{request.ForWhere}} 
                            </td>
                            <td ng-if="(request.ForWhere) == 'Admin'" style="color: green">
                              {{request.ForWhere}} 
                            </td>
                            <td>{{request.Number}}</td> 
                            <td>{{request.PendingReason}}</td>
                            <td>
                              <a href="" ng-click="edit($index, request);" class="btn atag btn-sm btn-primary">
                                <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                              <!--    <a class="btn atag btn-sm btn-primary" href="" ng-click="delete($index, request);">
                                <md-tooltip md-direction="right">DELETE</md-tooltip><i class="ft-trash-2"></i>
                              </a>  -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
  </div>
</section>

<div class="modal fade text-left" id="rentrequest_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header">
            <!-- <h4 class="modal-title" id="myModalLabel33"><strong>{{formType}}  TYPE </strong></h4> -->
            <label class="modal-title text-text-bold-600" id="myModalLabel33">{{formType}}  BUYER RENT REQUEST </strong></label>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                   <div class="row">
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">NAME</label> <div class="">
                              <input type="text" class="form-control"  ng-model="rentrequest_form.Name">
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">NUMBER</label> <div class="">
                              <input type="text" class="form-control" onlydigits minlength="15" maxlength="15" ng-model="rentrequest_form.Number">
                           </div>
                        </fieldset>                
                      </div>
                    <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">TYPE</label> <div class="">
                              <!-- <input type="text" class="form-control"  ng-model="sellerrequest_form.TypeData"> -->
                             <select ng-model="rentrequest_form.TypeData"class="form-control" >
                                <option  ng-repeat="req in request" value="{{req.value}}" >{{req.value}}</option>
                             </select>
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">TypeDetail</label> <div class="">
                              <input type="text" class="form-control"  ng-model="rentrequest_form.TypeDescription">
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">BUDJET MIN</label>
                           <div class="">
                              <input type="text" class="form-control" onlydigits ng-model="rentrequest_form.BudjetMin">
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">BUDJET MAX</label>
                           <div class="">
                              <input type="text" class="form-control" onlydigits ng-model="rentrequest_form.BudjetMax">
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">AREA</label> <div class="">
                              <input type="text" class="form-control"  ng-model="rentrequest_form.Area">
                           </div>
                        </fieldset>                
                      </div>
                         <div class="col-md-3">
                        <fieldset class="form-group ">
                          <label for="title">STAUS</label>
                           <div class="">                             
                            <select ng-model="rentrequest_form.Status"class="form-control" >
                            <option  ng-repeat="stat in status" value="{{stat.value}}" >{{stat.value}}</option></select>
                        </fieldset>   
                       </div>
                    </div>
                    <div class="row">
                       <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">EMAIL</label> <div class="">
                              <input type="text" class="form-control"  ng-model="rentrequest_form.Email">
                           </div>
                        </fieldset>                
                      </div>
                       <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">FROM</label> <div class="">
                              <input type="text" class="form-control"  ng-model="rentrequest_form.ForWhere">
                           </div>
                        </fieldset>                
                      </div>
                       <div class="col-md-6">  
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">DESCRIPTION</label>
                           <div class="">
                            <textarea class="form-control" ng-model="rentrequest_form.PendingReason" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea> 
                           </div>
                        </fieldset>
                      </div>
                    </div>
                    <div class="row">
                       <div class="col-md-3">
                         <fieldset class="form-group floating-label-form-group">
                            <label for="title">OWNER NAME</label>
                             <div class="">
                                <input type="text"  class="form-control"  ng-model="rentrequest_form.BuyerRentOwnerName">
                             </div>
                         </fieldset>
                      </div>
                      <div class="col-md-3">
                         <fieldset class="form-group floating-label-form-group">
                            <label for="title">OWNER NUMBER</label>
                             <div class="">
                                <input type="text" onlydigits  maxlength="10" minlength="10" class="form-control"  ng-model="rentrequest_form.BuyerRentOwnerNumber">
                             </div>
                         </fieldset>
                      </div>
                           <div class="col-md-3">
                         <fieldset class="form-group floating-label-form-group">
                            <label for="title">REFFERD NAME</label>
                             <div class="">
                                <input type="text"  class="form-control"  ng-model="rentrequest_form.BuyerRentReferName">
                             </div>
                         </fieldset>
                      </div>
                      <div class="col-md-3">
                         <fieldset class="form-group floating-label-form-group">
                            <label for="title">REFFERD NUMBER</label>
                             <div class="">
                                <input type="text" onlydigits  maxlength="10" minlength="10" class="form-control"  ng-model="rentrequest_form.BuyerRentReferNumber">
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