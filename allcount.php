<?php error_reporting(0);?>
<?php
include("allfunctions.php");
$function = new allfunctions();
$connection=$function->connect();
$totalvehicle=$_REQUEST["mobilev"];

  $all = mysql_query("SELECT COUNT(*) as cou FROM vehpar WHERE '$totalvehicle'");
  $all=mysql_fetch_array($all);
  $all=$all['cou'];

  // $daily = strtotime(date('Y-m-d'));
  // $daily = strtotime("0 day", $daily);
  // $daily=date('Y-m-d', $daily);
  // $dailyrow = mysql_query("SELECT COUNT(*) as cou FROM logs WHERE mobile = '$totalvehicle' AND caller_date like '$daily'");
  // $dailylogs=mysql_fetch_array($dailyrow);
  // $dailylogs=$dailylogs['cou'];
  //
  // $week = strtotime(date('Y-m-d'));
  // $week = strtotime("-7 day", $week);
  // $week=date('Y-m-d', $week);
  // $weekrow = mysql_query("SELECT COUNT(*) as cou FROM logs WHERE mobile = '$totalvehicle' AND caller_date >= '$week'");
  // $weeklylogs=mysql_fetch_array($weekrow);
  // $weeklylogs=$weeklylogs['cou'];
  //
  // $month = strtotime(date('Y-m-d'));
  // $month = strtotime("-30 day", $month);
  // $month=date('Y-m-d', $month);
  // $monthrow = mysql_query("SELECT COUNT(*) as cou FROM logs WHERE mobile = '$totalvehicle' AND caller_date >= '$month'");
  // $monthlylogs=mysql_fetch_array($monthrow);
  // $monthlylogs=$monthlylogs['cou'];

  echo '{"count":[
    {"all":"'.$all.'"}
    ]}';
// }
?>
