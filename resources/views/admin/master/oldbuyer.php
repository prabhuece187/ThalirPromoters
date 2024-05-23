<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title"> OLDBUYER </h4>
                </div>    
                <div class="float-right">
                    <div class="row">
                      <div class="pad-lr-5 pad-top-8">
                        <a href="" ng-click="new();" class="btn atag">ADD OLDBUYER</a>
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
                            <th> OLDBUYER </th>
                            <th> BUDJET </th>
                            <th> TYPEDATA </th>
                            <th> AREA </th>
                            <th> NUMBER </th>
                            <th> ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="old in oldbuyer">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{old.Name}}</td>
                            <td>{{old.Budjet}}</td>
                            <td>{{old.TypeData}}</td>
                            <td>{{old.Area}}</td>
                            <td>{{old.Number}}</td> 
                            <td>
                              <a href="" ng-click="edit($index, old);" class="btn atag btn-sm btn-primary">
                                <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href="" ng-click="delete($index, old);">
                                <md-tooltip md-direction="right">DELETE</md-tooltip><i class="ft-trash-2"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href="" ng-click="detail($index, old);">
                                <md-tooltip md-direction="right">DETAIL</md-tooltip><i class="ft-file"></i>
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
<div class="modal fade text-left" id="oldbuyer_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header">
            <!-- <h4 class="modal-title" id="myModalLabel33"><strong>{{formType}}  TYPE </strong></h4> -->
            <label class="modal-title text-text-bold-600" id="myModalLabel33">{{formType}}  OLDBUYER </strong></label>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                   <div class="row">
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">BUDJET</label>
                           <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyer_form.Budjet">
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">TYPE</label>
                           <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyer_form.TypeData">
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">AREA</label> <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyer_form.Area">
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">NAME</label> <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyer_form.Name">
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">NUMBER</label> <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyer_form.Number">
                           </div>
                        </fieldset>                
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">  
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">VISITED AREA</label>
                           <div class="">
                            <textarea class="form-control" ng-model="oldbuyer_form.VisitedArea" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea> 
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-6">  
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">NEED TO SHOW AREA</label>
                           <div class="">
                            <textarea class="form-control" ng-model="oldbuyer_form.NeedToShow" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea> 
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group ">
                          <label for="title">STAUS</label>
                           <div class="">                             
                            <select ng-model="oldbuyer_form.Status"class="form-control" >
                            <option  ng-repeat="stat in status" value="{{stat.value}}" >{{stat.value}}</option></select>
                        </fieldset>   
                       </div>
                        <div class="col-md-4">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">PENDING REASON</label> <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyer_form.PendingReason">
                           </div>
                        </fieldset>                
                      </div>
                       <div class="col-md-5">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">DESCRIPTION</label> <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyer_form.Desc">
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

<div class="modal fade text-left" id="oldbuyerdetail_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header">
            <!-- <h4 class="modal-title" id="myModalLabel33"><strong>{{formType}}  TYPE </strong></h4> -->
            <label class="modal-title text-text-bold-600" id="myModalLabel33">{{formType}}  OLDBUYER </strong></label>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                   <div class="row">
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">BUDJET</label>
                           <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyerdetail_form.Budjet">
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">TYPE</label>
                           <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyerdetail_form.TypeData">
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">AREA</label> <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyerdetail_form.Area">
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">NAME</label> <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyerdetail_form.Name">
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">NUMBER</label> <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyerdetail_form.Number">
                           </div>
                        </fieldset>                
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">  
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">VISITED AREA</label>
                           <div class="">
                            <textarea class="form-control" ng-model="oldbuyerdetail_form.VisitedArea" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea> 
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-6">  
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">NEED TO SHOW AREA</label>
                           <div class="">
                            <textarea class="form-control" ng-model="oldbuyerdetail_form.NeedToShow" style="height: 100px !important;width: 100%!important;white-space: inherit!important;"></textarea> 
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group ">
                          <label for="title">STAUS</label>
                           <div class="">                             
                            <select ng-model="oldbuyerdetail_form.Status"class="form-control" >
                            <option  ng-repeat="stat in status" value="{{stat.value}}" >{{stat.value}}</option></select>
                        </fieldset>   
                       </div>
                        <div class="col-md-4">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">PENDING REASON</label> <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyerdetail_form.PendingReason">
                           </div>
                        </fieldset>                
                      </div>
                       <div class="col-md-5">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">DESCRIPTION</label> <div class="">
                              <input type="text" class="form-control"  ng-model="oldbuyerdetail_form.Desc">
                           </div>
                        </fieldset>                
                      </div>
                    </div>                                      
               <!--    <div class="modal-footer">
                    <a href=""  type="reset" class="btn atag" data-dismiss="modal" >CLOSE</a>
                    <input type="submit" ng-disabled="isDisabled" ng-click="postForm();" class="btn btn-outline-primary atag btn-lg" value="SAVE">
                  </div> -->
               </div>
            </form>
        </div>
    </div>
</div>