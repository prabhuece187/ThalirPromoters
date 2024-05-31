<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title"> PROMOTER SITE </h4>
                </div>
                <div class="float-right">
                    <div class="row">
                      <div class="pad-lr-5 pad-top-8">
                        <a href="" ng-click="new()" class="btn atag">ADD SITE </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <table class="table table-sm" id="table_id">
                    <thead class="">
                        <tr>
                            <th>S.NO</th>
                            <th>TYPE </th>
                            <th>NAME </th>
                            <th>AREA </th>
                            <th>BUDJET </th>
                            <th>DESCRIPTION</th>
                            <th>MAP</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="site in sitedata">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{site.ProTypeName}}</td>
                            <td>{{site.PromoterName}}</td>
                            <td>{{site.ProArea}}</td>
                            <td>{{site.Budjet}}</td>
                            <td>{{site.ProDescription}}</td>
                            <td><img class="img-fluid"  src="uploads/promoter/sitemap/{{site.SiteMap}}" width="50px" height="80px"></td>
                            <td>
                              <a href="" ng-click="edit($index, site);" class="btn atag btn-sm btn-primary">
                              <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href="" ng-click="delete($index, site);">
                                <md-tooltip md-direction="top">DELETE</md-tooltip><i class="ft-trash-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href=""  ng-click="newstatus(site.ProSiteId)">
                                <md-tooltip md-direction="right">STATUS</md-tooltip><i class="ft-phone-forwarded"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href="#/promotersitedetail/{{site.ProSiteId}}" >
                                <md-tooltip md-direction="right">DETAIL</md-tooltip><i class="ft-file-text"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href="#/buyercommentpromoterget/{{site.ProSiteId}}" >
                                <md-tooltip md-direction="bottom">COMMENT</md-tooltip><i class="ft-star"></i>
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
<div class="modal fade text-left" id="prosite_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header bg-primary white">
            <h4 class="modal-title" id="myModalLabel11"><strong>{{formType}} SITEMAP </strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                   <div class="row">
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">PROPERTY TYPE<span class="lab-span">*</span></label>
                           <div class="">
                                <select ng-model="prosite_form.ProTypeName" class="form-control">
                                  <option ng-repeat="pro in promotertype"  value="{{pro.value}}">{{pro.value}}</option>
                                </select>
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">TITLE<span class="lab-span">*</span></label>
                           <div class="">
                            <input type="text" class="form-control"  ng-model="prosite_form.PromoterName">
                           </div>
                        </fieldset>
                      </div>

                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-8">
                             <fieldset class="form-group floating-label-form-group">
                               <label for="title">TOTAL AREA </label>
                               <div class="">
                                 <input type="text" class="form-control"  ng-model="prosite_form.ProArea">
                               </div>
                             </fieldset>
                          </div>
                          <div class="col-md-4">
                             <label for="title">UNIT</label>
                             <select  class="form-control" ng-model="prosite_form.ProUnit">
                              <option value="" disabled selected hidden>Select Size</option>
                              <option value="Cent">சென்ட் </option>
                              <option value="Acre">ஏக்கர்</option>
                              <option value="Sqfeet">சதுர அடி</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">BUDJET<span class="lab-span">*</span></label>
                           <div class="">
                              <input type="text" class="form-control"  ng-model="prosite_form.Budjet">
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">NUMBER OF SITES<span class="lab-span">*</span></label>
                           <div class="">
                              <input type="text" class="form-control"  ng-model="prosite_form.FlatCount">
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">AREA CODE</label>
                           <div class="">
                              <ui-select  required ng-model="prosite_form.Area" theme="select2" >
                                <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.AreaName}}</ui-select-match>
                                <ui-select-choices repeat="par in area | filter: {AreaName: $select.search}">
                                  <div>{{par.AreaName}}</div>
                                </ui-select-choices>
                              </ui-select>
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-8">
                             <fieldset class="form-group floating-label-form-group">
                               <label for="title">MINIMUM</label>
                               <div class="">
                                 <input class="form-control" ng-model="prosite_form.ProMinVal" name="ProMinVal"  value="" type="text" >
                               </div>
                             </fieldset>
                          </div>
                          <div class="col-md-4">
                            <label for="title">AMOUNT TYPE</label>
                             <select  class="form-control" ng-model="prosite_form.ProMinType">
                              <option value="" disabled selected hidden>Select Type</option>
                              <option value="Lakhs">லட்சம்</option>
                              <option value="Cr">கோடி</option>
                              <option value="K">ஆயிரம்</option>
                             </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-8">
                             <fieldset class="form-group floating-label-form-group">
                               <label for="title">MAXIMUM</label>
                               <div class="">
                                 <input class="form-control" ng-model="prosite_form.ProMaxVal" name="ProMaxVal"  value="" type="text" >
                               </div>
                             </fieldset>
                          </div>
                          <div class="col-md-4">
                             <label for="title">AMOUNT TYPE</label>
                             <select  class="form-control" ng-model="prosite_form.ProMaxType">
                              <option value="" disabled selected hidden>Select Type</option>
                              <option value="Lakhs">லட்சம்</option>
                              <option value="Cr">கோடி</option>
                              <option value="K">ஆயிரம்</option>
                             </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">DISTANCE<span class="lab-span">*</span></label>
                           <div class="">
                              <input type="text" class="form-control"  ng-model="prosite_form.ProDistance">
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">PROPERTY ADDRESS</label>
                           <div class="">
                             <input class="form-control" ng-model="prosite_form.ProAddress" name="ProAddress"  value="" type="text" >
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">STREET</label>
                           <div class="">
                             <input class="form-control" ng-model="prosite_form.ProStreet" name="ProStreet"  value="" type="text" >
                           </div>
                        </fieldset>
                      </div>
                      <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">CITY</label>
                           <div class="">
                             <input class="form-control" ng-model="prosite_form.ProCity" name="ProCity"  value="" type="text" >
                           </div>
                        </fieldset>
                      </div>
                        <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">PINCODE</label>
                           <div class="">
                             <input class="form-control" ng-model="prosite_form.ProPincode" name="ProPincode"  value="" type="text" >
                           </div>
                        </fieldset>
                      </div>

                     <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">LOCATION </label>
                         <div class="">
                           <input class="form-control" ng-model="prosite_form.ProLocation" name="ProLocation"  value="" type="text" >
                         </div>
                             <div id="map"></div>
                      </fieldset>
                    </div>
                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">SITE MAP<span class="lab-span">*</span></label>
                         <div class="">
                             <input id="file" fileModel file-model="prosite_form.SiteMap" name="SiteMap"  value="" type="file" >
                      </fieldset>
                      <div >
                         <img class="img-fluid"  ngf-src="prosite_form.SiteMap || fileDataUrlString"  width="60px" height="60px" >
                      </div>
                    </div>
                    <div class="col-md-8">
                    <fieldset class="form-group floating-label-form-group">
                      <label for="title">VIDEO</label>
                       <div class="">
                         <input id="file"  fileModel file-model="prosite_form.ProGalleryVideo" name="ProGalleryVideo"  value="" type="file" >
                       </div>
                    </fieldset>
                    </div>
                    <div class="col-md-8">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">5 PHOTOS ONLY</label>
                         <div class="">
                            <input type='file' multiple ng-file='uploadfiles' multiple ng-files="getTheFiles($files)" >
                         </div>
                      </fieldset>
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                          <div ng-repeat="image in imagesrc track by $index">
                           <img ng-src="{{image.Src}}" title="image.title" width="60px" height="60px" style="padding: 5px;">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-8">
                        <fieldset class="form-group floating-label-form-group">
                            <label for="title">FULL DETAILS</label>
                            <div class="">
                                <textarea class="form-control" ng-model="prosite_form.ProDescription" style="height: 200px !important;width: 100% !important;white-space: inherit !important;">
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
                           <select ng-model="status_form.ProStatus"class="form-control" >
                           <option   value="Completed" >Completed</option>
                           <option   value="Accepted" >Accepted</option>
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
