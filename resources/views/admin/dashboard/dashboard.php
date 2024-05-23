
<div class="tilte-head">
      <h4 class="card-title"> Thalir Promoters </h4>
</div>   
<div class="row">
     <div class="col-xl-2 col-lg-2 col-md-2 col-12" ng-if="role == 1">
        <a href="#/newcommentsprom" ng-if="client != 0 || client == null">
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;position: relative;">NEW CLIENT DATA</span>
                                <span class="span-sty" >{{client}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-12" ng-if="role == 1 || role == 3">
        <a href="#/promotersite">
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;">PROMOTER</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-12" ng-if="role == 1 || role == 2">
        <a href="#/newproperty">
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;">PROPERTY</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-12" ng-if="role === 1">
        <a href="#/newcomeproperty" ng-if="new != 0 || new == null">
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;position: relative;">NEW PROPERTY </span>
                                <span class="span-sty" >{{new}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-12" ng-if="role === 1 || role === 2">
        <a href="#/newuserstatus" ng-if="stat != 0 || stat == null">
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;position: relative;"> NEW INFORMATION </span>
                                <span class="span-sty" >{{stat}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-12" ng-if="role === 1">
        <a href="#/newcommentsprop" ng-if="commentprop != 0 || commentprop == null">
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;position: relative;">NEW COMMENTS FROM PROPERTY</span>
                                <span class="span-sty" >{{commentprop}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-12" ng-if="role === 1">
        <a href="#/newcommentsprom" ng-if="commentprom != 0 || commentprom == null">
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;position: relative;">NEW COMMENTS FROM PROMOTER</span>
                                <span class="span-sty" >{{commentprom}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>   
</div>

<div class="tilte-head">
      <h4 class="card-title"> Mediator Details </h4>
</div>   

<div class="row">
     <div class="col-xl-3 col-lg-3 col-md-3 col-12" >
        <a href="" >
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;position: relative;">Total Assignments : {{totalassign}} nos </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> 

    <div class="col-xl-3 col-lg-3 col-md-3 col-12" >
        <a href="#/mediator_report/Processing" >
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;position: relative;">Total Processing Assignments : {{totalassignprocess}} nos </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> 

    <div class="col-xl-3 col-lg-3 col-md-3 col-12" >
        <a href="#/mediator_report/Completed" >
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;position: relative;">Total Completed Assignments :  {{totalassigncomplete}} nos</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> 

    <div class="col-xl-3 col-lg-3 col-md-3 col-12" >
        <a href="#/mediator_report/Start" >
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;position: relative;">Total Started Assignments : {{totalassignstart}} nos</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> 

    <div class="col-xl-3 col-lg-3 col-md-3 col-12" >
        <a href="#/mediator_report/no" >
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;position: relative;">Total Failed Assignments : {{totalassignno}} nos</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> 

    <div class="col-xl-3 col-lg-3 col-md-3 col-12" >
        <a href="#/mediator_report/yes" >
            <div class="card atag" style="padding-bottom: 8px;background-color: #101d76 !important">
                <div class="card-body">
                    <div class=" pt-2 pb-0">
                        <div class="media">
                            <div class="media-body  text-center" style="font-size:15px;">
                                <span style="color: #fff;position: relative;">Total Accepted Assignments : {{totalassignyes}} nos</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> 
</div>




