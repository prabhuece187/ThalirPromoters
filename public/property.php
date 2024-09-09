<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">PROPERTY </h4>
                </div>    
                <div class="float-right">

                    <div class="row">
                      <!-- <div class="pad-lr-5 mar-right-20">
                            <input type="text" class="form-control" ng-change="getTable(1,property.search);"  ng-model="property.search" placeholder="Search Invoice Detail">
                      </div>  -->
                            <div class="pad-lr-15 wid-130" >
                                 <input class="form-control" ng-model="form.PropertyId" name="PropertyId"  value="" type="text" placeholder="T NO ">
                            </div>
                            <div class="pad-lr-15">
                                 <label>SoldOut </label> <input type="checkbox" class="form-control" ng-model="form.Sold" name="Sold"  value=""  style="height: 18px !important;"> 
                            </div>
                            <div class="pad-lr-15" >
                              <!-- <input class="form-control" ng-model="form.ReachUs" name="ReachUs"  value="" type="text" placeholder="Property Reachus "> -->
                               <select  class="form-control" ng-model="form.ReachUs" name="ReachUs">
                                    <option value="" disabled selected hidden>Select Lead By</option>
                                    <option value="Direct">Direct</option>
                                    <option value="Reference">Reference</option>
                               </select>
                            </div>
                            <div class="pad-lr-15">
                                 <ui-select  required ng-model="form.Type" theme="select2" >
                                  <ui-select-match allow-clear="true" placeholder="Select Type Name">{{$select.selected.TypeName}}</ui-select-match>
                                  <ui-select-choices repeat="par in type | filter: {TypeName: $select.search}">
                                    <div>{{par.TypeName}}</div>
                                  </ui-select-choices>
                                </ui-select> 
                            </div>
                            <div class="pad-lr-15" ng-show="isDisabledStatus == false">
                                <ui-select  required ng-model="form.Need" theme="select2" >
                                  <ui-select-match allow-clear="true" placeholder="Select Requirement">{{$select.selected.NeedName}}</ui-select-match>
                                  <ui-select-choices repeat="par in need | filter: {NeedName: $select.search}">
                                    <div>{{par.NeedName}}</div>
                                  </ui-select-choices>
                                </ui-select> 
                            </div>
                            <div class="pad-lr-15">
                                 <input class="form-control" ng-model="form.PropertyRegNo" name="PropertyRegNo"  value="" type="text" placeholder="Property Search ">
                            </div>
                            <div class="pad-lr-15">
                              <ui-select  required ng-model="form.Area" theme="select2" >
                                <ui-select-match allow-clear="true" placeholder="Select Area Name">{{$select.selected.AreaName}}</ui-select-match>
                                <ui-select-choices repeat="par in area | filter: {AreaName: $select.search}">
                                  <div>{{par.AreaName}}</div>
                                </ui-select-choices>
                              </ui-select> 
                            </div>
                            <div class="pad-lr-15 wid-130" >
                                <input class="form-control" ng-model="form.MinAmount" name="MinAmount"  value="" type="text" placeholder="PRICE FROM">
                            </div>
                            <div class="pad-lr-15 wid-130" >
                                <input class="form-control" ng-model="form.MaxAmount" name="MaxAmount"  value="" type="text" placeholder="TO">
                            </div>
                            <div class="pad-lr-15 pad-top-8"> 
                                <a href="" class="btn btn-primary btn-corner atag" ng-click="getTable(1,form)">
                                    <md-tooltip md-direction="bottom">SEARCH</md-tooltip><i class="ft-search"></i>
                                </a>
                                 <a href="" ng-click="getExcel()" class="btn atag">EXCEL</a> 
                                <!-- <a href="" ng-click="getPDF()" class="btn atag">PDF</a> -->
                            </div> 
                      <div class="pad-lr-5 pad-top-8">
                        <a href="#/newproperty"  class="btn atag">ADD POST</a>
                      </div>
                    </div>
                </div>                             
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
              <div class="table-responsive-scrollbar-top">
                <div class="div1">
                </div>
              </div>
                <table class="table table-sm table-responsive-sm table-responsive-lg table-responsive-md table-responsive" id="table_id">
                    <thead class="">
                        <tr>
                            <th>T.NO</th>
                            <th>S.NO</th>
                            <th>ACTION</th>
                            <!-- <th>IMAGE </th> -->
                            <th>REQUIREMENT</th>
                            <th>REG NO</th>
                            <th>REFER NAME</th>
                            <th>REFER NUMBER</th>
                            <th>TYPE </th>
                            <th>LAND SIZE </th>
                            <th>BUDGET </th>
                            <!--<th>NAME </th>-->
                            <!--<th>ROADSIZE </th>-->
                            <!--<th>ROADBASE </th>-->
                            <th>AREA </th>
                            <th>AREA DETAIL </th>
                            <!-- <th> DESCRIPTION </th> -->
                            <!--<th>OWNER NAME</th>-->
                            <!--<th>OWNER NUMBER</th>-->
                            <!--<th>BUILDING SIZE </th>-->
                            <!--<th>REACHUS</th>-->
                            <th>STATUS</th>
                            <th>T.NO</th>
                            <th>S.NO</th>
                            
                        </tr>
                    </thead>
                    <tbody class="">
                         <tr ng-repeat="site in data">
                            <td>{{site.PropertyId}}</td>
                            <th scope="row">{{$index+1}}</th>
                             <td>
                              <a href="#/editproperty/{{site.PropertyId}}"  class="btn atag btn-sm btn-primary">
                              <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" ng-if="site.PropertyPendingReason != null" ng-click="showStatus($index, site);"  >
                                <md-tooltip md-direction="right">STATUS</md-tooltip><i class="ft-phone-forwarded"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href=""  ng-click="delete($index, site);" >
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
                            <!-- <td ng-if="site.photo != null"><img src="uploads/property/gallery/{{site.photo}}" width="60px" height="60px"></img></td> -->
                            <!-- <td ng-if="site.photo == null"><img src="/uploads/main/noimg.jpg" width="60px" height="60px"></img></td> -->
                            <td>{{site.NeedName}}</td>
                            <td>{{site.PropertyRegNo}}</td>
                            <td>{{site.PropertyReferName}}</td>
                            <td>{{site.PropertyReferNumber}}</td>
                            <td>{{site.TypeName}}</td>
                            <td>{{site.PropertyLandSize}}</td>
                            <td>{{site.PropertyTotalBudget}} {{site.PropertyTotalValType}}</td>
                            <!--<td>{{site.PropertyName}}</td>-->
                            <!--<td>{{site.PropertyRoadSize}}</td>-->
                            <!--<td>{{site.PropertyRoadBase}}</td>-->
                            <td>{{site.AreaName}}</td>
                            <td>{{site.PropertyAreaDetail}}</td>
                           <!-- <td>{{site.PropertyDescription}}</td> -->
                            <!--<td>{{site.PropertyOwnerName}}</td>-->
                            <!--<td>{{site.PropertyOwnerNumber}}</td>-->
                            <!--<td>{{site.PropertyBuildingSize}}</td>-->
                            <!--<td>{{site.ReachUs}}</td>-->
                            <td>{{site.PropertyStatus}}</td>
                            <td>{{site.PropertyId}}</td>
                            <th>{{$index+1}}</th>
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
                 <!--  <div class="modal-footer">
                    <a href=""  type="reset" class="btn atag" data-dismiss="modal">CLOSE
                    </a>
                    <input type="submit" ng-disabled="isDisabled" ng-click="postForm();" class="btn btn-outline-primary atag btn-lg" value="SAVE">
                  </div> -->
               </div>
            </form>
        </div>
    </div>
</div>