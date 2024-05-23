<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">COMMENT </h4>
                </div>    
              <!--   <div class="float-right">
                    <div class="row">
                      <div class="pad-lr-5 pad-top-8">
                        <a href="#/newrent"  class="btn atag">ADD RENT</a>
                      </div>
                    </div>
                </div>  -->                            
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <table class="table table-sm" id="table_id">
                    <thead class="">
                      <tr>
                            <th>S.NO</th>
                            <th>NAME </th>
                            <th>EMAIL </th>
                            <th>DATE </th>
                            <th>STAR </th>
                            <th>DETAIL </th>
                            <th>STATUS </th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                         <tr ng-repeat="comment in data">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{comment.Name}}</td>
                            <td>{{comment.Email}}</td>
                            <td>{{comment.CommentDate}}</td>
                            <td>{{comment.StarCount}}</td>
                            <td>{{comment.CommentDesc}}</td>
                            <td>{{comment.BuyerCommentStatus}}</td>
                            <td>
                              <a href="#/editrent/{{site.TypeId}}/{{site.CategoryId}}/{{site.RentId}}"  class="btn atag btn-sm btn-primary">
                              <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                              </a>
                              <a class="btn atag btn-sm btn-primary" href="" ng-click="delete($index, site);">
                                <md-tooltip md-direction="top">DELETE</md-tooltip><i class="ft-trash-2"></i>
                              </a> 
                              <a class="btn atag btn-sm btn-primary" href="#/rentfollowproperty/{{site.TypeId}}/{{site.CategoryId}}/{{site.RentId}}" >
                                <md-tooltip md-direction="right">FOLLOW</md-tooltip><i class="ft-phone-forwarded"></i>
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