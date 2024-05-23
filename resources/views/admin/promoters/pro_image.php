<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">IMAGE  </h4>
                </div>    
                <div class="float-right">
                    <div class="row">
                      <div class="pad-lr-5 pad-top-8">
                        <a href=""  ng-click="new();" class="btn atag">ADD IMAGE </a>
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
                            <th>TITLE</th>      
                            <th>IMAGE1</th>
                            <th>IMAGE2</th>
                            <th>IMAGE3</th>
                            <th>IMAGE4</th>
                            <th>IMAGE5</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="promoter in data">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{promoter.ProTypeName|app_filter:'promotertype'}}</td>
                            <td>{{promoter.PromoterName}}</td>
                            <td><img class="img-fluid"  src="uploads/promoter/gallery/{{promoter.ProGalleryImage1}}" width="50px" height="50px"></td>
                            <td><img class="img-fluid"  src="uploads/promoter/gallery/{{promoter.ProGalleryImage2}}" width="50px" height="50px"></td>
                            <td><img class="img-fluid"  src="uploads/promoter/gallery/{{promoter.ProGalleryImage3}}" width="50px" height="50px"></td>
                            <td><img class="img-fluid"  src="uploads/promoter/gallery/{{promoter.ProGalleryImage4}}" width="50px" height="50px"></td>
                            <td><img class="img-fluid"  src="uploads/promoter/gallery/{{promoter.ProGalleryImage5}}" width="50px" height="50px"></td>
                            <td>
                              <a href="" ng-click="edit($index, promoter);" class="btn atag btn-sm btn-primary">
                                <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                             <!--  <a class="btn atag btn-sm btn-primary" href="" ng-click="delete($index, promoter);">
                                <md-tooltip md-direction="right">DELETE</md-tooltip><i class="ft-trash-2"></i>
                              </a> --> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
  </div>
</section>
<div class="modal fade text-left" id="proimg_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header bg-primary white">
            <h4 class="modal-title" id="myModalLabel11"><strong>{{formType}} IMAGE </strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="mod-area">&times;</span>
              </button>
            </div>
              <form>
                <div class="modal-body">
                  <div class="row">
                       <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">TITLE</label>
                         <div class="">                             
                            <ui-select   ng-model="proimg_form.Promoter" theme="select2">
                             <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.PromoterName}}</ui-select-match>
                                <ui-select-choices data-id="$index" repeat="par in promoter | filter:  $select.search" refresh-delay="0">
                                  <div>{{par.PromoterName}}</div>
                              </ui-select-choices>
                            </ui-select>
                         </div>
                      </fieldset>                   
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PHOTO</label>
                         <div class="">                             
                           <input id="file"  fileModel file-model="proimg_form.ProGalleryImage1" name="ProGalleryImage1"  value="" type="file" >
                         </div>
                      </fieldset>
                      <div >
                         <img class="img-fluid"  ngf-src="proimg_form.ProGalleryImage1" width="60px" height="60px">
                      </div>                    
                    </div>
                     <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PHOTO 1</label>
                         <div class="">                             
                           <input id="file"  fileModel file-model="proimg_form.ProGalleryImage2" name="ProGalleryImage2"  value="" type="file" >
                         </div>
                      </fieldset>
                      <div >
                         <img class="img-fluid"  width="60px" height="60px" ngf-src="proimg_form.ProGalleryImage2">
                      </div>                    
                    </div>
                    <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PHOTO 2</label>
                         <div class="">                             
                           <input id="file"  fileModel file-model="proimg_form.ProGalleryImage3" name="ProGalleryImage3"  value="" type="file" >
                         </div>
                      </fieldset>
                      <div >
                         <img class="img-fluid"  width="60px" height="60px" ngf-src="proimg_form.ProGalleryImage3">
                      </div>                    
                    </div>
                  </div>  
                  <div class="row">
                    <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PHOTO 3</label>
                         <div class="">                             
                           <input id="file"  fileModel file-model="proimg_form.ProGalleryImage4" name="ProGalleryImage4"  value="" type="file" >
                         </div>
                      </fieldset>
                      <div >
                         <img class="img-fluid"  width="60px" height="60px" ngf-src="proimg_form.ProGalleryImage4">
                      </div>                    
                    </div>
                    <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PHOTO 4</label>
                         <div class="">                             
                           <input id="file"  fileModel file-model="proimg_form.ProGalleryImage5" name="ProGalleryImage5"  value="" type="file" >
                         </div>
                      </fieldset>
                      <div>
                         <img class="img-fluid"  width="60px" height="60px" ngf-src="proimg_form.ProGalleryImage5">
                      </div>                    
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">VIDEO</label>
                         <div class="">                             
                           <input id="file"  fileModel file-model="proimg_form.ProGalleryVideo" name="ProGalleryVideo"  value="" type="file" >
                         </div>
                      </fieldset> 
                     <!--     <div>
                         <img class="img-fluid"  width="60px" height="60px" ngf-src="proimg_form.ProGalleryVideo">
                      </div>   -->              
                    </div>
                    </div>
                    <div class="row"> 
                    <div class="col-md-12">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">LOCATION</label>
                         <div class="">                             
                           <input id="file" class="form-control" ng-model="proimg_form.ProGalleryLocation" name="ProGalleryLocation"  value="" type="text" >
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