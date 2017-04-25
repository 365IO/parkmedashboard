<script>
  var myapp=angular.module('app',[]);
  myapp.controller('ctrl',function($scope,$http,$interval)
  {
    // $interval(function () {
    $http.post("jsondata.php?mobilev="+<?php echo $mobile;?>).then(function success(response){
      $scope.calls_logs=response.data.calls_logs;
        },function error(response)
        {
          $scope.calls_logs=response.statusText;

        });

        $http.get("allcount.php?mobilev="+<?php echo $mobile;?>).then(function success(response){
          $scope.allcount=response.data.count;
        },function error(response)
        {
          $scope.allcount=response.statusText;
        // },1000);
        });


        var pagesShown = 1;
        var pageSize = 10;
        $scope.paginationLimit = function(data) {
          return pageSize * pagesShown;
        };
        $scope.hasMoreItemsToShow = function() {
          return pagesShown < ($scope.datalists.length / pageSize);
        };
        $scope.showMoreItems = function() {
          pagesShown = pagesShown + 1;
        };


  });




</script>
