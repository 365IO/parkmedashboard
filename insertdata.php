<?php session_start();?>
<?php error_reporting(0);?>
<?php
///////////////////SESSION/////////////////////
 $name=$_SESSION["s_name"];
 $mobile=$_SESSION["s_mobile"];
 $email=$_SESSION["s_email"];
 $business=$_SESSION["s_business"];
 $cname=$_SESSION["s_cname"];
 $password=$_SESSION["s_password"];
 $md5password =md5($password);
///////////////////SESSION/////////////////////
include("allfunctions.php");
$function = new allfunctions();
$connection=$function->connect();
$ip=$function->ipaddress();
$curdate=$function->date();
$curtime=$function->time();
    if($name!='' && $mobile!='' && $email!='' && $business!='' && $cname!=''  && $md5password!='' && $curdate!='' && $curtime!='' && $ip!='' )
    {
      rand(10,100);
      $otp_code=rand();

          mysql_query( "INSERT INTO `user`
              (`user_name`, `user_mobile`, `user_email`, `business`, `company_name`,  `otp_code`, `cur_date`,`cur_time`,`ip_address`, `password`)
               VALUES ('$name',$mobile,'$email','$business','$cname',$otp_code,'$curdate','$curtime','$ip','$md5password')");
                    mysql_close($connection);
                     $_SESSION["otp_mobile"]=$mobile;
                     unset($_SESSION['s_name']);
                     unset($_SESSION['s_mobile']);
                     unset($_SESSION['s_email']);
                     unset($_SESSION['s_business']);
                     unset($_SESSION['s_cname']);
                     unset($_SESSION['s_password']);
                     header('Location: otp.php');
  }
  else
  {
          header('Location: index.php');
  }
?>
