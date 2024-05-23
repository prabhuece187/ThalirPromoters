<section id="hoverable-rows">
  <div class="card">
    <form>
        <div class="col-sm-12">
              <div class="card-header">
                <div class="tilte-head">
                      <h4 class="card-title">CLIENT REGISTER DETAILS </h4>
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
                            <th>NEED </th>
                            <th>MOBILE </th>
                            <th>EMAIL </th>
                            <th>DATE </th>
                            <th>APPROVED </th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="">
                         <tr ng-repeat="site in data">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{site.clientname}}</td>
                            <td>{{site.need}}</td>
                            <td>{{site.clientmobile}}</td>
                            <td>{{site.clientemail}}</td>
                            <td>{{site.created_at|date:'dd/MM/yyyy'}}</td>
                            <td>{{site.name}}</td>
                            <td>
                              <a ng-click="edit($index, site);" ng-hide="site.Status==1"  class="btn atag btn-sm btn-primary">
                              <md-tooltip md-direction="left">OK</md-tooltip><i class="ft-thumbs-up"></i>
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

