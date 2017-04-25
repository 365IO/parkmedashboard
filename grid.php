  <head>
    <link rel="stylesheet" href="css/grid.css" type="text/css">
    <script src="js_file/angular.min.js"></script>
  </head>

  <?php include('js_file/grid.js');?>

  <div class="main_grid_div"  ng-app="app" ng-controller="ctrl">

    <p class="allcounttext">Total Vehicle Parked</p>

    <div class="report">
    <div class="allcount" ng-repeat="all in allcount">{{all.all}}</div>
    </div>

    <div id="search">
      <div id="srchicon"></div>
      <input type="text" class="search" placeholder="Search" ng-model="search" maxlength="12">
    </div>

    <div class="main_table_div">
      <div class="table_head_div">
        <div id="th1">Vehicle No</div>
        <!-- <div id="th1">Vehicle Type</div> -->
        <div id="th2">Vehicle Check In </div>
        <div id="th3">Vehicle Check Out</div>

        <div id="th4">Charges</div>
        <!-- <div id="th2">Caller Time</div>
        <div id="th3">Caller Number</div> -->
      </div>

    <div class="table_data_div">
      <table class="table_data" border="0">
        <tr ng-repeat="data in calls_logs | filter:search | limitTo: paginationLimit()">
        <td>{{data.vehicle_number}}</td>
        <td>{{data.check_in}} / {{data.check_in_time}}</td>
        <td>{{data.check_out}} / {{data.check_out_time}}</td>
        <td>{{data.charges}}</td>
        </tr>
      </table>
    </div>
         <div id="table_end">
            <center>
              <input type="button" id="show_more" value="Show More" ng-show="hasMoreItemsToShow()"  ng-click="showMoreItems()">
            </center>
          </div>
  </div>
</div>
