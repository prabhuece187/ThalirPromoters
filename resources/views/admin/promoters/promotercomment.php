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
                         <tr ng-repeat="comment in form">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{comment.Name}}</td>
                            <td>{{comment.Email}}</td>
                            <td>{{comment.CommentDate}}</td>
                            <td>{{comment.StarCount}}</td>
                            <td>{{comment.CommentDesc}}</td>
                            <td>{{comment.BuyerCommentStatus}}</td>
                            <td>
                              <a href="" ng-click="change($index, comment);" class="btn atag btn-sm btn-primary">
                              <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
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

<div class="modal fade text-left" id="comment_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
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
                           <select ng-model="comment_form.BuyerCommentStatus"class="form-control" >
                           <option  ng-repeat="stat in status" value="{{stat.value}}" >{{stat.value}}</option>    
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