<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">COMPLETED PROPERTY </h4>
                </div>                                 
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <table class="table table-sm" id="table_id">
                    <thead class="">
                        <tr>
                            <th>SE.NO</th>
                            <th>S.NO</th>
                            <th>USERNAME</th>
                            <th>MOBILE</th>
                            <th>IMAGE </th>
                            <th>REQUIREMENT</th>
                            <th>REG NO</th>
                            <th>TYPE </th>
                            <th>LAND SIZE </th>
                            <th>BUDGET </th>
                            <th>NAME </th>
                            <th>AREA </th>
                            <th>ROADSIZE </th>
                            <th>ROADBASE </th>
                            <th>DESCRIPTION </th>
                            <th>REFER NAME</th>
                            <th>REFER NUMBER</th>
                            <th>OWNER NAME</th>
                            <th>OWNER NUMBER</th>
                            <th>BUILDING SIZE </th>
                        </tr>
                    </thead>
                    <tbody class="">
                         <tr ng-repeat="site in data">
                            <td>{{site.PropertyId}}</td>
                            <th scope="row">{{$index+1}}</th>
                            <th scope="row">{{site.name}}</th>
                            <th scope="row">{{site.mobile}}</th>
                            <td ng-if="site.photo != null"><img src="uploads/property/gallery/{{site.photo}}" width="60px" height="60px"></img></td>
                            <td ng-if="site.photo == null"><img src="/uploads/main/noimg.jpg" width="60px" height="60px"></img></td>
                            <td>{{site.NeedName}}</td>
                            <td>{{site.PropertyRegNo}}</td>
                            <td>{{site.TypeName}}</td>
                            <td>{{site.PropertyLandSize}}</td>
                            <td>{{site.PropertyTotalBudget}} {{site.PropertyTotalValType}}</td>
                            <td>{{site.PropertyName}}</td>
                            <td>{{site.PropertyRoadSize}}</td>
                            <td>{{site.PropertyRoadBase}}</td>
                            <td>{{site.AreaName}},{{site.PropertyAreaDetail}}</td>
                            <td>{{site.PropertyDescription}}</td>
                            <td>{{site.PropertyReferName}}</td>
                            <td>{{site.PropertyReferNumber}}</td>
                            <td>{{site.PropertyOwnerName}}</td>
                            <td>{{site.PropertyOwnerNumber}}</td>
                            <td>{{site.PropertyBuildingSize}}</td>
                           </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
  </div>
</section>

