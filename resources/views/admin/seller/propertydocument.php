<section class="invoice-template">
    <div class="card">
        <form>
            <div class="col-sm-12">
                <div class="card-header">
                    <div class="tilte-head">
                         <h4 class="card-title"> PROPERTY DOCUMENT </h4>
                    </div>                        
                </div>
            </div>
        </form>
        <div class="card-body"> 
           <div class="card-block">
                <div class="row">
                    <div  ng-repeat="site in datas">
                        <div class="col-sm-12 col-md-12">
                            <h4 class="card-title" style="padding: 20px"> PROPERTY NAME - {{site.PropertyName}} Document - {{$index+1}}</h4>
                           <iframe class="doc" ng-src="{{site.documenturl}}" width="1000px" height="700px"></iframe>
                        </div>                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>