<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">PARTIES PROPERTY </h4>
                </div>                                 
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <table class="table table-sm" id="table_id">
                    <thead class="">
                        <tr>
                            <th>SE.NO</th>
                            <th>S.NO</th>
                            <th>IMAGE </th>
                            <th>REQUIREMENT</th>
                            <th>REG NO</th>
                            <th>TYPE </th>
                            <th>LAND SIZE </th>
                            <th>BUDGET </th>
                            <th>NAME </th>
                            <th>AREA </th>
                            <th>ROADSIZE </th>
                            <th>ROADBASE </th>
                            <th>DESCRIPTION </th>
                            <th>REFER NAME</th>
                            <th>REFER NUMBER</th>
                            <th>OWNER NAME</th>
                            <th>OWNER NUMBER</th>
                            <th>BUILDING SIZE </th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                         <tr ng-repeat="site in data">
                            <td>{{site.PropertyId}}</td>
                            <th scope="row">{{$index+1}}</th>
                            <td ng-if="site.photo != null"><img src="uploads/property/gallery/{{site.photo}}" width="60px" height="60px"></img></td>
                            <td ng-if="site.photo == null"><img src="/uploads/main/noimg.jpg" width="60px" height="60px"></img></td>
                            <td>{{site.NeedName}}</td>
                            <td>{{site.PropertyRegNo}}</td>
                            <td>{{site.TypeName}}</td>
                            <td>{{site.PropertyLandSize}}</td>
                            <td>{{site.PropertyTotalBudget}} {{site.PropertyTotalValType}}</td>
                            <td>{{site.PropertyName}}</td>
                            <td>{{site.PropertyRoadSize}}</td>
                            <td>{{site.PropertyRoadBase}}</td>
                            <td>{{site.AreaName}},{{site.PropertyAreaDetail}}</td>
                            <td>{{site.PropertyDescription}}</td>
                            <td>{{site.PropertyReferName}}</td>
                            <td>{{site.PropertyReferNumber}}</td>
                            <td>{{site.PropertyOwnerName}}</td>
                            <td>{{site.PropertyOwnerNumber}}</td>
                            <td>{{site.PropertyBuildingSize}}</td>
                            <td>
                              <a href="#/editproperty/{{site.PropertyId}}"  class="btn atag btn-sm btn-primary">
                              <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" ng-if="site.PropertyPendingReason != null" ng-click="showStatus($index, site);"  >
                                <md-tooltip md-direction="right">STATUS</md-tooltip><i class="ft-phone-forwarded"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href=""  ng-click="delete($index, site);" ng-if="role == 1">
                                <md-tooltip md-direction="top">DELETE</md-tooltip><i class="ft-trash-2"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href="#/followproperty/{{site.PropertyId}}"  ng-if="role == 1">
                                <md-tooltip md-direction="right">FOLLOW</md-tooltip><i class="ft-phone-forwarded"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href="#/buyercommentpropertyget/{{site.PropertyId}}" ng-if="role == 1">
                                <md-tooltip md-direction="bottom">COMMENT</md-tooltip><i class="ft-star"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href="#/propertydocumentget/{{site.PropertyId}}" ng-if="role == 1">
                                <md-tooltip md-direction="right">DOCUMENT</md-tooltip><i class="ft-file-text"></i>
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


<div class="modal fade text-left" id="showstatus_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog " role="document">
       <div class="modal-content">
          <div class="modal-header ">
            <label class="modal-title text-text-bold-600" id="myModalLabel33">STATUS FROM THIS PROPERTY</strong></label>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                   <div class="row">
                    <div class="col-md-12">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title"> Status</label>
                         <div class="">
                            <!-- <input type="text" class="form-control"  ng-model="showstatus_form.PropertyPendingReason"> -->
                            <textarea  ng-model="showstatus_form.PropertyPendingReason" style="width:400px;height: 300px">
                            </textarea>
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