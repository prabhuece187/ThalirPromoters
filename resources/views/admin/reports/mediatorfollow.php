<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">MEDIATOR FOLLOW-UP STATUS WISE DATA </h4>
                </div>   
                <div class="pad-lr-15" style="padding-top: 10px">
                       <div class="row">
                            <div class="pad-lr-15">
                              <select  class="form-control" ng-model="form.status" name="status">
                              <option value="" disabled selected hidden>Choose Status</option>
                              <option value="Start">Start</option>
                              <option value="Processing">Processing</option>
                              <option value="Advanced">Advanced</option>
                              <option value="Completed">Completed</option>
                              <option value="End">End</option>
                         </select>
                            </div>
                            <div class="pad-lr-15 pad-top-8"> 
                                <a href="" class="btn btn-primary btn-corner atag"  ng-click="searchForm()">
                                    <md-tooltip md-direction="bottom">SEARCH</md-tooltip><i class="ft-search"></i>
                                </a>
                                <a href="" ng-click="getPDF()" class="btn atag">PDF</a>
                            </div> 
                       </div>
                    </div>                              
            </div>
        </div>
        <div class="card-body" id="excel">
            <div class="card-block row" >
               <div class="col-sm-7">
                <h4 class="card-title">MEDIATOR FOLLOW-UP DETAILS </h4>
                  <table class="table table-sm table-responsive-lg" id="table_id">
                          <thead class="">
                              <tr>
                                  <th>S.no</th>
                                  <th>Date </th>
                                  <th>Viewed Buyer </th>
                                  <th>Desc</th>
                                  <th>Status</th>
                                  <th>Remarks</th>
                              </tr>
                          </thead>
                          <tbody class="">
                              <tr ng-repeat="medfollows in mediatorfollow">
                                  <th scope="row">{{$index+1}}</th>
                                  <td>{{medfollows.MediatorFollowDate|date:'dd-MM-yyyy'}}</td>
                                  <td>{{medfollows.MediatorViewedBuyer}}</td>
                                  <td>{{medfollows.MediatorFollowDesc}}</td>
                                  <td>{{medfollows.MediatorFollowStatus}}</td>
                                  <td>{{medfollows.MediatorFollowRemarks}}</td>
                              </tr>
                          </tbody>
                      </table>
               </div>
            </div>
        </div>
    </form>
  </div>
</section>

