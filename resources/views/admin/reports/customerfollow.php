<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">CUSTOMER FOLLOW-UP DATA </h4>
                </div>   
                <div class="pad-lr-15" style="padding-top: 10px">
                       <div class="row">
                            <div class="pad-lr-15">
                              <ui-select  required ng-model="form.Property" theme="select2" >
                                <ui-select-match allow-clear="true" placeholder="Select The PropertyId Name">{{$select.selected.PropertyId}}</ui-select-match>
                                <ui-select-choices repeat="par in property | filter: {PropertyId: $select.search} | limitTo: ($select.search.length <= 1) ? 50 : 20">
                                  <div>{{par.PropertyId}}</div>
                                </ui-select-choices>
                              </ui-select> 
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
              <div class="col-sm-5">
                <h4 class="card-title">ABO DETAILS </h4>
                <table class="table table-sm" id="table_id">
                    <thead class="">
                        <tr>
                            <th>S.no</th>
                            <th>Abo Id</th>
                            <th>Abo Name</th>
                            <th>Status</th>
                            <th>Access</th>
                        </tr>
                    </thead>
                    <tbody class="">
                         <tr>
                           <th scope="row">{{$index+1}}</th>
                            <td>{{abo.AboId}}</td>
                            <td>{{abo.AboName}}</td>
                            <td>{{abo.AboAssignStatus}}</td>
                            <td>{{abo.AboAssignAccess}}</td>
                    </tbody>
                </table>
              </div>
              <div class="col-sm-7">
                <h4 class="card-title">MEDIATOR DETAILS </h4>
                <table class="table table-sm" id="table_id">
                    <thead class="">
                        <tr>
                            <th>S.no</th>
                            <th>Mediator Id</th>
                            <th>Mediator Name</th>
                            <th>Status</th>
                            <th>Access</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody class="">
                         <tr ng-repeat="med in mediator">
                           <th scope="row">{{$index+1}}</th>
                            <td>{{med.MediatorId}}</td>
                            <td>{{med.MediatorName}}</td>
                            <td>{{med.MediatorAssignStatus}}</td>
                            <td>{{med.MediatorAssignAccess}}</td>
                            <td>{{med.MediatorAssignRemarks}}</td>
                           </tr>
                    </tbody>
                </table>
              </div>
              <div class="col-sm-5">
                <h4 class="card-title">ADMIN FOLLOW-UP DETAILS </h4>
                  <table class="table table-sm" id="table_id">
                      <thead class="">
                          <tr>
                              <th>S.no</th>
                              <th>Date </th>
                              <th>Viewed Buyer </th>
                              <th>Desc</th>
                          </tr>
                      </thead>
                      <tbody class="">
                          <tr ng-repeat="follows in admin">
                              <th scope="row">{{$index+1}}</th>
                              <td>{{follows.FollowDate}}</td>
                              <td>{{follows.ViewedBuyer}}</td>
                              <td>{{follows.FollowDescription}}</td>
                          </tr>
                      </tbody>
                  </table>
               </div>
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

