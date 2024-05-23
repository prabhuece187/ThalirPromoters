<div class="col-lg-12 col-md-12 col-sm-6">
    <nav aria-label="Page navigation mb-3">
        <ul class="pagination" style="flex-wrap: wrap;">
            <li ng-show="pages.length>1" class="page-item active" ng-class="{'disabled':pagination.page==1}" style="padding: 5px;"><a class="page-link" href="" ng-click="page=pagination.page-1; getTable(1,page2);" aria-label="Last">First
            </a>
            </li>

            <li ng-show="pages.length>1" class="page-item active" ng-class="{'disabled':pagination.page==1}" style="padding: 5px;"><a class="page-link" href="" ng-click="page=pagination.page-1; getTable(page,page2);" aria-label="Last"> <<
            </a>
            </li>
            <li  class="page-item" ng-class="{'active':{{page}}==pagination.page}" ng-repeat="page in pages" style="padding: 5px 0px;">
              <a class="page-link"  ng-click="getTable(page,page2)">{{page}}</a>
            </li>

            <li ng-show="pages.length>1" class="page-item active" ng-class="{'disabled':pagination.page==pagevalue.totallength}" style="padding: 5px;">
              <a class="page-link" href="" ng-click="page=pagination.page+1; getTable(page,page2);" aria-label="Last"> >> </a>
            </li>
            <li ng-show="pages.length>1" class="page-item active" ng-class="{'disabled':pagination.page==pagevalue.totallength}" style="padding: 5px;">
              <a class="page-link" href="" ng-click="page=pagination.page; getTable(pagevalue.totallength,page2);" aria-label="Last">Last</a>
            </li>
        </ul>
    </nav>
</div>

