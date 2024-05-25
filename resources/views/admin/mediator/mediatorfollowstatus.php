<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">MEDIATOR FOLLOW-UP STATUS </h4>
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
                <table class="table table-sm table-responsive-lg" id="table_id">
                    <thead class="">
                        <tr>
                            <th>S.no</th>
                            <th>Date </th>
                            <th>PropertyId </th>
                            <th>Viewed Buyer </th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="follows in mediator">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{follows.MediatorFollowDate|date:'dd-MM-yyyy'}}</td>
                            <td>{{follows.PropertyId}}</td>
                            <td>{{follows.MediatorViewedBuyer}}</td>
                            <td>{{follows.MediatorFollowDesc}}</td>
                            <td>{{follows.MediatorFollowStatus}}</td>
                            <td>{{follows.MediatorFollowRemarks}}</td>
                            <td>
                            <a href=""  ng-click="edit($index, follows);" class="btn atag btn-sm btn-primary">
                                <md-tooltip md-direction="left">Done</md-tooltip><i class="ft-check-square"></i>
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

