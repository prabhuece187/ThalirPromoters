<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title"> AMENITIES </h4>
                </div>    
                <div class="float-right">
                    <div class="row">
                      <div class="pad-lr-5 pad-top-8">
                        <a href="" ng-click="new();" class="btn atag">ADD AMENITIES</a>
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
                            <th>TYPE </th>
                            <th>CATEGORY </th>
                            <th>TITLE</th> 
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="types in data">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{types.TypeName}}</td>
                            <td>{{types.CategoryName}}</td>
                            <td>{{types.PropertyName}}</td>
                            <td>
                              <a href="" ng-click="edit($index, types);" class="btn atag btn-sm btn-primary">
                                <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href="" ng-click="delete($index, types);">
                                <md-tooltip md-direction="right">DELETE</md-tooltip><i class="ft-trash-2"></i>
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
  <div class="modal fade text-left" id="amenities_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header ">
            <!-- <h4 class="modal-title" id="myModalLabel33"><strong>{{formType}}  TYPE </strong></h4> -->
            <label class="modal-title text-text-bold-600" id="myModalLabel33">{{formType}}  AMENITIES </strong></label>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                    <div class="row">
                      <div class="col-md-4">
                          <fieldset class="form-group floating-label-form-group">
                            <label for="title">TYPE NAME</label>
                             <div class="">
                                <ui-select  ng-change="typechange(amenities_form.Type.TypeId)" required ng-model="amenities_form.Type" theme="select2" autofocus>
                                    <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.TypeName}}</ui-select-match>
                                    <ui-select-choices repeat="par in type | filter: {TypeName: $select.search}">
                                      <div>{{par.TypeName}}</div>
                                    </ui-select-choices>
                                </ui-select>   
                             </div>
                          </fieldset>                
                      </div>
                      <div class="col-md-4">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">CATEGORY NAME</label>
                           <div class="">
                              <ui-select  ng-change="categorychange(amenities_form.Category.CategoryId)" required ng-model="amenities_form.Category" theme="select2" autofocus>
                                  <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.CategoryName}}</ui-select-match>
                                  <ui-select-choices repeat="par in category | filter: {CategoryName: $select.search}">
                                    <div>{{par.CategoryName}}</div>
                                  </ui-select-choices>
                              </ui-select>   
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-4">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">TITLE</label>
                           <div class="">
                              <ui-select  required ng-model="amenities_form.Property" theme="select2" autofocus>
                                  <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.PropertyName}}</ui-select-match>
                                  <ui-select-choices repeat="par in property | filter: {PropertyName: $select.search}">
                                    <div>{{par.PropertyName}}</div>
                                  </ui-select-choices>
                              </ui-select>   
                           </div>
                        </fieldset>                
                      </div>
                   </div>
                <div class="row">
                    <div class="col-md-12" ng-class="{'has-error': formError.CustomerName}">
                      <fieldset class="form-group floating-label-form-group">
                      <label for="title">AMENITIES</label><br>
                          <div class="row">
                           <div class="col-sm-12">
                                <div class="">
                                    <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-bordered card-table table-vcenter text-nowrap table-in table-sm">
                                        <thead>
                                            <tr>
                                                <th width="5%">SNO</th>
                                                <th width="30%">NAME</th>
                                                <th width="30%">COUNT</th>
                                                <th width="30%">DESCRIPTION</th>     
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr  ng-repeat="ament in amenities_form.details">
                                                <td>{{$index+1}}</td>
                                                <td class="ta-amt td-mob-view">
                                                   <ui-select   required ng-model="ament.Specification" theme="select2" >
                                                    <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.SpecificationName}}</ui-select-match>
                                                    <ui-select-choices repeat="par in specification | filter: {SpecificationName: $select.search}">
                                                      <div>{{par.SpecificationName}}</div>
                                                    </ui-select-choices>
                                                </ui-select>   
                                                </td>
                                                <td class="ta-amt td-mob-view">
                                                   <input type="text"  class="form-control" ng-model="ament.PropertyAmenitCount"> 
                                                </td>
                                                 <td class="ta-amt td-mob-view">
                                                   <input type="text"  class="form-control" ng-model="ament.PropertyAmenitDesc"> 
                                                </td>
                                                <td class="ta-amt">
                                                    <a href="" ng-click="add_new_line();" class="btn atag"><i class="ft-plus"></i></a>
                                                    <a href="" ng-click="remove_row($index);" class="btn atag"><i class="ft-trash-2"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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