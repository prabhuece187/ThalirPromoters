<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">MEDIATOR OVER ALL REPORT </h4>
                </div>
                <div class="pad-lr-15" style="padding-top: 10px">
                    <div class="row">
                        <div class="pad-lr-15">
                            <ui-select  required ng-model="form.Mediator" theme="select2" >
                            <ui-select-match allow-clear="true" placeholder="Select The Mediator Name">{{$select.selected.MediatorName}}</ui-select-match>
                            <ui-select-choices repeat="par in mediator | filter: {MediatorName: $select.search} | limitTo: ($select.search.length <= 1) ? 50 : 20">
                                <div>{{par.MediatorName}}</div>
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
              <div class="col-sm-12">
                <h4 class="card-title">MEDIATOR DETAILS </h4>
                <table class="table table-sm " id="table_id">
                    <thead class="">
                        <tr>
                            <th>S.NO</th>
                            <th>ACTION</th>
                            <th>ABO NO</th>
                            <th>ABO NAME</th>
                            <th>MEDIATOR NO</th>
                            <th>MEDIATOR NAME</th>
                            <th>PROPERTY NO</th>
                            <th>PROPERTY NAME</th>
                            <th>DATE</th>
                            <th>DESCRIPTION</th>
                            <th>REMARKS</th>
                            <th>STATUS</th>
                            <th>MEDIATOR STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr ng-repeat="types in data" >
                            <th scope="row">{{$index+1}}</th>
                            <td>
                              <a href="#/mediator_follow/{{types.MediatorId}}/{{types.PropertyId}}"  class="btn atag btn-sm btn-primary" >
                                <md-tooltip md-direction="left">DETAILS</md-tooltip><i class="ft-file-text"></i>
                              </a>
                            </td>
                            <td>{{types.AboId}}</td>
                            <td>{{types.AboName}}</td>
                            <td>{{types.MediatorId}}</td>
                            <td>{{types.MediatorName}}</td>
                            <td>{{types.PropertyId}}</td>
                            <td>{{types.PropertyName}}</td>
                            <td>{{types.MediatorAssignDate|date:'dd/MM/yyyy'}}</td>
                            <td>{{types.MediatorAssignDesc}}</td>
                            <td>{{types.MediatorAssignRemarks}}</td>
                            <td>{{types.MediatorAssignStatus}}</td>
                            <td>{{types.MediatorAssignAccess}}</td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </form>
  </div>
</section>

