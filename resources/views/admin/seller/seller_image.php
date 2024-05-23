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
                            <th>CATEGORY </th>
                            <th>TITLE</th>      
                            <th>AREA</th>      
                            <th>CITY</th>      
                            <th>IMAGE1</th>
                            <th>IMAGE2</th>
                            <th>IMAGE3</th>
                            <th>IMAGE4</th>
                            <th>IMAGE5</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="seller in data">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{seller.TypeName}}</td>
                            <td>{{seller.CategoryName}}</td>
                            <td>{{seller.PropertyName}}</td>
                            <td>{{seller.PropertyAddress}}</td>
                            <td>{{seller.PropertyCity}}</td>
                            <td><img class="img-fluid"  src="uploads/seller/gallery/{{seller.PropertyGalleryImage1}}" width="50px" height="50px"></td>
                            <td><img class="img-fluid"  src="uploads/seller/gallery/{{seller.PropertyGalleryImage2}}" width="50px" height="50px"></td>
                            <td><img class="img-fluid"  src="uploads/seller/gallery/{{seller.PropertyGalleryImage3}}" width="50px" height="50px"></td>
                            <td><img class="img-fluid"  src="uploads/seller/gallery/{{seller.PropertyGalleryImage4}}" width="50px" height="50px"></td>
                            <td><img class="img-fluid"  src="uploads/seller/gallery/{{seller.PropertyGalleryImage5}}" width="50px" height="50px"></td>
                            <td>
                              <a href="" ng-click="edit($index, seller);" class="btn atag btn-sm btn-primary">
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
<div class="modal fade text-left" id="sellerimg_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
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
                       <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">TYPE NAME</label>
                           <div class="">
                              <ui-select  ng-change="typechange(sellerimg_form.Type.TypeId)" required ng-model="sellerimg_form.Type" theme="select2" autofocus>
                                  <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.TypeName}}</ui-select-match>
                                  <ui-select-choices repeat="par in type | filter: {TypeName: $select.search}">
                                    <div>{{par.TypeName}}</div>
                                  </ui-select-choices>
                              </ui-select>   
                           </div>
                        </fieldset>                
                    </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">CATEGORY NAME</label>
                           <div class="">
                              <ui-select  ng-change="categorychange(sellerimg_form.Category.CategoryId)" required ng-model="sellerimg_form.Category" theme="select2" autofocus>
                                  <ui-select-match allow-clear="true" placeholder="Select">{{$select.selected.CategoryName}}</ui-select-match>
                                  <ui-select-choices repeat="par in category | filter: {CategoryName: $select.search}">
                                    <div>{{par.CategoryName}}</div>
                                  </ui-select-choices>
                              </ui-select>   
                           </div>
                        </fieldset>                
                      </div>
                      <div class="col-md-3">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="title">TITLE</label>
                           <div class="">
                              <ui-select  required ng-model="sellerimg_form.Property" theme="select2" autofocus>
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
                    <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PHOTO</label>
                         <div class="">                             
                           <input id="file"  fileModel file-model="sellerimg_form.PropertyGalleryImage1" name="PropertyGalleryImage1"  value="" type="file" >
                         </div>
                      </fieldset>
                      <div >
                         <img class="img-fluid"  ngf-src="sellerimg_form.PropertyGalleryImage1" width="60px" height="60px">
                      </div>                    
                    </div>
                     <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PHOTO 1</label>
                         <div class="">                             
                           <input id="file"  fileModel file-model="sellerimg_form.PropertyGalleryImage2" name="PropertyGalleryImage2"  value="" type="file" >
                         </div>
                      </fieldset>
                      <div >
                         <img class="img-fluid"  width="60px" height="60px" ngf-src="sellerimg_form.PropertyGalleryImage2">
                      </div>                    
                    </div>
                    <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PHOTO 2</label>
                         <div class="">                             
                           <input id="file"  fileModel file-model="sellerimg_form.PropertyGalleryImage3" name="PropertyGalleryImage3"  value="" type="file" >
                         </div>
                      </fieldset>
                      <div >
                         <img class="img-fluid"  width="60px" height="60px" ngf-src="sellerimg_form.PropertyGalleryImage3">
                      </div>                    
                    </div>
                  </div>  
                  <div class="row">
                    <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PHOTO 3</label>
                         <div class="">                             
                           <input id="file"  fileModel file-model="sellerimg_form.PropertyGalleryImage4" name="PropertyGalleryImage4"  value="" type="file" >
                         </div>
                      </fieldset>
                      <div >
                         <img class="img-fluid"  width="60px" height="60px" ngf-src="sellerimg_form.PropertyGalleryImage4">
                      </div>                    
                    </div>
                    <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PHOTO 4</label>
                         <div class="">                             
                           <input id="file"  fileModel file-model="sellerimg_form.PropertyGalleryImage5" name="PropertyGalleryImage5"  value="" type="file" >
                         </div>
                      </fieldset>
                      <div>
                         <img class="img-fluid"  width="60px" height="60px" ngf-src="sellerimg_form.PropertyGalleryImage5">
                      </div>                    
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">VIDEO</label>
                         <div class="">                             
                           <input id="file"  fileModel file-model="sellerimg_form.PropertyGalleryVideo" name="PropertyGalleryVideo"  value="" type="file" >
                         </div>
                      </fieldset> 
                     <!--     <div>
                         <img class="img-fluid"  width="60px" height="60px" ngf-src="sellerimg_form.PropertyGalleryVideo">
                      </div>   -->              
                    </div>
                    </div>
                    <div class="row"> 
                       <div class="col-md-3">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">AREA</label>
                         <div class="">                             
                           <input class="form-control" ng-model="sellerimg_form.PropertyAddress" name="PropertyAddress"  value="" type="text" >
                         </div>
                      </fieldset>                   
                    </div> 
                     <div class="col-md-3">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">STREET</label>
                         <div class="">                             
                           <input class="form-control" ng-model="sellerimg_form.PropertyStreet" name="PropertyStreet"  value="" type="text" >
                         </div>
                      </fieldset>                   
                    </div> 
                     <div class="col-md-3">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">CITY</label>
                         <div class="">                             
                           <input class="form-control" ng-model="sellerimg_form.PropertyCity" name="PropertyCity"  value="" type="text" >
                         </div>
                      </fieldset>                   
                    </div> 
                     <div class="col-md-3">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">PINCODE</label>
                         <div class="">                             
                           <input class="form-control" ng-model="sellerimg_form.PropertyPincode" name="PropertyPincode"  value="" type="text" >
                         </div>
                      </fieldset>                   
                    </div> 
                    <div class="col-md-12">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="title">LOCATION</label>
                         <div class="">                             
                           <input class="form-control" ng-model="sellerimg_form.PropertyGalleryLocation" name="PropertyGalleryLocation"  value="" type="text" >
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