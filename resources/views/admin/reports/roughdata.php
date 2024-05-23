<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">ROUGH DATA PROPERTY </h4>
                </div>   
                <div class="pad-lr-15" style="padding-top: 10px">
                       <div class="row">
                            <div class="pad-lr-15">
                                <select ng-model="form.ReferLead" class="form-control">
                                  <option  value="" disabled selected hidden>Select Lead</option>
                                  <option  value="Mediater">Mediater</option>    
                                  <option  value="Owner">Owner</option>    
                                  <option  value="Friend">Friend</option>    
                                </select>
                            </div>
                            <div class="pad-lr-15">
                                <select ng-model="form.ReferFor" class="form-control">
                                  <option  value="" disabled selected hidden>Select For</option>
                                  <option  value="Sell">Sell</option>    
                                  <option  value="Buy">Buy</option>    
                                  <option  value="Rent">Rent</option>    
                                  <option  value="Tenant">Tenant</option>    
                                </select>
                            </div>
                            <div class="pad-lr-15">
                                <select ng-model="form.ReferType" class="form-control">
                                  <option  value="" disabled selected hidden>Select Type</option>
                                  <option  value="Land">Land</option>    
                                  <option  value="House">House</option>    
                                  <option  value="ComercialBuilding">ComercialBuilding</option>    
                                  <option  value="FarmLand">FarmLand</option>   
                                  <option  value="Appartment">Appartment</option>    
                                  <option  value="LandHouse">LandHouse</option>    
                                  <option  value="Godown">Godown</option>    
                                  <option  value="Others">Others</option>   
                                </select>
                            </div>
                            <div class="pad-lr-15">
                              <ui-select  required ng-model="form.Area" theme="select2" >
                                <ui-select-match allow-clear="true" placeholder="Select The Area Name">{{$select.selected.AreaName}}</ui-select-match>
                                <ui-select-choices repeat="par in area | filter: {AreaName: $select.search}">
                                  <div>{{par.AreaName}}</div>
                                </ui-select-choices>
                              </ui-select> 
                            </div>
                            <div class="pad-lr-15">
                                <input class="form-control" ng-model="form.MinAmount" name="MinAmount"  value="" type="text" placeholder="PRICE FROM">
                            </div>
                            <div class="pad-lr-15">
                                <input class="form-control" ng-model="form.MaxAmount" name="MaxAmount"  value="" type="text" placeholder="TO">
                            </div>
                            <div class="pad-lr-15 pad-top-8"> 
                                <a href="" class="btn btn-primary btn-corner atag"  ng-click="searchForm()">
                                    <md-tooltip md-direction="bottom">SEARCH</md-tooltip><i class="ft-search"></i>
                                </a>
                                <a href="" ng-click="getExcel()" class="btn atag">EXCEL</a>
                                <!-- <a href="" ng-click="getPDF()" class="btn atag">PDF</a> -->
                            </div> 
                       </div>
                    </div>                              
            </div>
        </div>
        <div class="card-body" id="excel">
            <div class="card-block" >
                <table class="table table-sm" id="table_id">
                    <thead class="">
                        <tr>
                            <th>S.NO</th>
                            <th>PROPERTY ID</th>
                            <th>IMAGE</th>
                            <th>DATE </th>
                            <th>FOR </th>
                            <th>LEAD </th>
                            <th>TYPE </th>
                            <th>FACING </th>
                            <th>AREA </th>
                            <th>BUDJET </th>
                            <th>SIZE </th>
                            <th>NAME</th>
                            <th>NUMBER</th>
                            <th>FULL DETAILS</th>
                        </tr>
                    </thead>
                    <tbody class="">
                         <tr ng-repeat="ref in data">
                           <th scope="row">{{$index+1}}</th>
                            <td>{{ref.ReferId}}</td>
                            <td><img class="img-fluid"  src="uploads/refer/gallery/{{ref.photo}}" width="50px" height="50px"></td>
                            <td>{{ref.ReferDate|date:'dd/MM/yyyy'}}</td>
                            <td>{{ref.ReferFor}}</td>
                            <td>{{ref.ReferLead}}</td>
                            <td>{{ref.ReferType}}</td>
                            <td>{{ref.ReferFacing}}</td>
                            <td>{{ref.AreaName}}</td>
                            <td>{{ref.ReferVal}} {{ref.ReferPayType}}</td>
                            <td>{{ref.ReferSize}}</td>
                            <td>{{ref.ReferName}}</td>
                            <td>{{ref.ReferNumber}}</td>
                            <td>{{ref.ReferFullDetails}}</td>
                           </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
  </div>
</section>

