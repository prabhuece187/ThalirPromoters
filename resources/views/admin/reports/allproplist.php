<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">ALL 
                      PROPERTY </h4>
                </div>    
                <div class="float-right">

                    <div class="row">
                      <!-- <div class="pad-lr-5 mar-right-20">
                            <input type="text" class="form-control" ng-change="getTable(1,property.search);"  ng-model="property.search" placeholder="Search Invoice Detail">
                      </div>  -->                            
                      <div class="pad-lr-15 pad-top-8"> 
                          
                          <a href="" ng-click="getExcel('property')" class="btn atag">EXCEL</a>
                          <!-- <a href="" ng-click="getPDF()" class="btn atag">PDF</a> -->
                      </div> 
                     
                    </div>
                </div>                             
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
              <div class="table-responsive-scrollbar-top">
                <div class="div1">
                </div>
              </div>
                <table class="table table-sm table-responsive-sm table-responsive-lg table-responsive-md table-responsive" id="table_id">
                    <thead class="">
                        <tr>
                            <th>T.NO</th>
                            <th>S.NO</th>
                            <th>IMAGE </th>
                            <th>REQUIREMENT</th>
                            <th>REG NO</th>
                            <th>REACHUS</th>
                            <th>STATUS</th>
                            <th>TYPE </th>
                            <th>LAND SIZE </th>
                            <th>BUDGET </th>
                            <th>NAME </th>
                            <th>ROADSIZE </th>
                            <th>ROADBASE </th>
                            <th>AREA </th>
                            <th>AREA DETAIL </th>
                            <!-- <th> DESCRIPTION </th> -->
                            <th>REFER NAME</th>
                            <th>REFER NUMBER</th>
                            <th>OWNER NAME</th>
                            <th>OWNER NUMBER</th>
                            <th>BUILDING SIZE </th>
                            <th>T.NO</th>
                            <th>S.NO</th>
                        </tr>
                    </thead>
                    <tbody class="">
                         <tr ng-repeat="site in data">
                            <td>{{site.PropertyId}}</td>
                            <th scope="row">{{$index+1}}</th>
                            
                            <td ng-if="site.photo != null"><img src="uploads/property/gallery/{{site.photo}}" width="60px" height="60px"></img></td>
                            <td ng-if="site.photo == null"><img src="/uploads/main/noimg.jpg" width="60px" height="60px"></img></td>
                            <td>{{site.NeedName}}</td>
                            <td>{{site.PropertyRegNo}}</td>
                            <td>{{site.ReachUs}}</td>
                            <td>{{site.PropertyStatus}}</td>
                            <td>{{site.TypeName}}</td>
                            <td>{{site.PropertyLandSize}}</td>
                            <td>{{site.PropertyTotalBudget}} {{site.PropertyTotalValType}}</td>
                            <td>{{site.PropertyName}}</td>
                            <td>{{site.PropertyRoadSize}}</td>
                            <td>{{site.PropertyRoadBase}}</td>
                            <td>{{site.AreaName}}</td>
                            <td>{{site.PropertyAreaDetail}}</td>
                            <!-- <td>{{site.PropertyDescription}}</td> -->
                            <td>{{site.PropertyReferName}}</td>
                            <td>{{site.PropertyReferNumber}}</td>
                            <td>{{site.PropertyOwnerName}}</td>
                            <td>{{site.PropertyOwnerNumber}}</td>
                            <td>{{site.PropertyBuildingSize}}</td>
                            <td>{{site.PropertyId}}</td>
                            <th>{{$index+1}}</th>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
  </div>
</section>

