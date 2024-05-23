
<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title"> ABO TYPE </h4>
                </div>    
                <div class="float-right">
                    <div class="row">
                      <!-- <div class="pad-lr-5 pad-top-8">
                        <a href="" ng-click="new();" class="btn atag">ADD MEDIATORTYPE</a>
                      </div> -->
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
                            <th> NAME</th>
                            <th> MOBILE NO</th>
                            <th> AREA NAME</th>
                            <th> SUB AREA</th>
                            <th> ADDRESS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="types in data">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{types.AboName}}</td>
                            <td>{{types.MobileNo}}</td>
                            <td>{{types.AreaName}}</td>
                            <td>{{types.SubArea}}</td>
                            <td>{{types.Address}}</td>
                            <td>
                              <a href="" ng-click="edit($index, types);" class="btn atag btn-sm btn-primary">
                                <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href="" ng-click="delete($index, types);">
                                <md-tooltip md-direction="right">DELETE</md-tooltip><i class="ft-trash-2"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href="#/abo_per_follow_details/{{types.AboId}}"  ng-if="role == 1 || (role == 5 && types.AboAssignAccess === 'yes')">
                                <md-tooltip md-direction="right">DETAILS</md-tooltip><i class="ft-file-text"></i>
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
  <div class="modal fade text-left" id="abo_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header ">
            <!-- <h4 class="modal-title" id="myModalLabel33"><strong>{{formType}}  TYPE </strong></h4> -->
            <label class="modal-title text-text-bold-600" id="myModalLabel33">{{formType}}  ABO </strong></label>
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
                            <input type="text" class="form-control"  ng-model="abo_form.AboName">
                         </div>
                      </fieldset>                
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">MOBILE NO</label>
                         <div class="">
                            <input type="text" class="form-control"  ng-model="abo_form.MobileNo">
                         </div>
                      </fieldset>                
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">AREA NAME</label>
                         <div class="">
                          <ui-select  required ng-model="abo_form.Area" theme="select2" >
                            <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.AreaName}}</ui-select-match>
                            <ui-select-choices repeat="par in area | filter: {AreaName: $select.search}">
                              <div>{{par.AreaName}}</div>
                            </ui-select-choices>
                          </ui-select>  
                         </div>
                      </fieldset>                
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">SUB AREA</label>
                         <div class="">
                            <input type="text" class="form-control"  ng-model="abo_form.SubArea">
                         </div>
                      </fieldset>                
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">ADDRESS</label>
                         <div class="">
                            <input type="text" class="form-control"  ng-model="abo_form.Address">
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


 