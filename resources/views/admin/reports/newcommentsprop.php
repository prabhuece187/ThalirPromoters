<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">PROPERTY NEW COMMENTS </h4>
                </div>    
                <!-- <div class="float-right">
                    <div class="row">
                      <div class="pad-lr-5 pad-top-8">
                        <a href="#/newproperty"  class="btn atag">ADD POST</a>
                      </div>
                    </div>
                </div> -->                             
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
                            <th>NAME </th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                         <tr ng-repeat="site in prop">
                            <td>{{site.PropertyId}}</td>
                            <th scope="row">{{$index+1}}</th>
                            <td ng-if="site.photo != null"><img src="uploads/property/gallery/{{site.photo}}" width="60px" height="60px"></img></td>
                            <td ng-if="site.photo == null"><img src="/uploads/main/noimg.jpg" width="60px" height="60px"></img></td>
                            <td>{{site.PropertyName}}</td>
                            <td>
                              <!-- <a href="#/editproperty/{{site.PropertyId}}"  class="btn atag btn-sm btn-primary">
                              <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a> -->
                              <a class="btn atag btn-sm btn-primary" href="#/buyercommentpropertyget/{{site.PropertyId}}" ng-if="role == 1">
                                <md-tooltip md-direction="bottom">COMMENT</md-tooltip><i class="ft-star"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href=""  ng-click="delete($index, site);" ng-if="role == 1">
                                <md-tooltip md-direction="top">DELETE</md-tooltip><i class="ft-trash-2"></i>
                              </a> 
                              <!-- <a class="btn atag btn-sm btn-primary" href="#/followproperty/{{site.PropertyId}}"  ng-if="role == 1">
                                <md-tooltip md-direction="right">FOLLOW</md-tooltip><i class="ft-phone-forwarded"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href="#/buyercommentpropertyget/{{site.PropertyId}}" ng-if="role == 1">
                                <md-tooltip md-direction="bottom">COMMENT</md-tooltip><i class="ft-star"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href="#/propertydocumentget/{{site.PropertyId}}" ng-if="role == 1">
                                <md-tooltip md-direction="right">DOCUMENT</md-tooltip><i class="ft-file-text"></i>
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


