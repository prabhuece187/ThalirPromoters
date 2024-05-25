<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">PROPERTY FOLLOW-UP STATUS </h4>
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
                            <th>DATE </th>
                            <th>PROPERTY </th>
                            <th>VIEWED BUYER </th>
                            <th>DESCRIPTION</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="follows in property">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{follows.FollowDate}}</td>
                            <td>{{follows.PropertyId}}</td>
                            <td>{{follows.ViewedBuyer}}</td>
                            <td>{{follows.FollowDescription}}</td>
                            <td>
                            <a href="" ng-click="edit($index, follows);" class="btn atag btn-sm btn-primary">
                                <md-tooltip md-direction="left">EDIT</md-tooltip><i class="ft-edit-2"></i>
                            </a>
                            <a class="btn atag btn-sm btn-primary" href="" ng-click="delete($index, site);">
                                <md-tooltip md-direction="top">DELETE</md-tooltip><i class="ft-trash-2"></i>
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

