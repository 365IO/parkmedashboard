<?php error_reporting(0);?>
<?php
include("allfunctions.php");
$function = new allfunctions();
$connection=$function->connect();
// $mobile=$_REQUEST["mobilev"];
$totalvehicle=mysql_query("SELECT count(`Vehicle_Number`) FROM vehpar");
$callslogs = mysql_query("SELECT `Vehicle_Number`,`Vehicle_Type`,`Check_In`,`Check_Out`,`Check_Out_Time`,`Check_In_Time`,`Charges` FROM vehicle,parking WHERE vehicle.Vehicle_Id=parking.Vehicle_Id");
$outp = "";
while ($row = mysql_fetch_array($callslogs)) {
    if ($outp != "") {$outp .= ",";}

    $vehiclenumber = $row["Vehicle_Number"];
    $vehicletype = $row["Vehicle_Type"];
    $checkin = $row["Check_In"];
    $checkout = $row["Check_Out"];
    $checkintime = $row["Check_In_Time"];
    $checkouttime = $row["Check_Out_Time"];
    $charges = $row["Charges"];
    // $newDate = date("d-m-Y", strtotime($originalDate));
    // $time = date("g:i a", strtotime($row["caller_time"]));



    $outp .= '{"vehicle_number":"'  . $vehiclenumber . '",';
    $outp .='"check_in":"'   . $checkin  .'",';
    $outp .='"check_in_time":"'   . $checkintime  .'",';
    $outp .='"check_out_time":"'   . $checkouttime  .'",';
    $outp .= '"check_out":"'   . $checkout.'",' ;
    $outp .= '"charges":"'.$charges.'"}' ;
}
$outp ='{"calls_logs":['.$outp.']}';

echo($outp);
?>
