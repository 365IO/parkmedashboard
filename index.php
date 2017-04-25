<?php session_start();?>
<?php error_reporting(0);?>
<?php
if(!isset($_SESSION['dashbord_mobile']))
{

}
else
{
  header("location:dashbord.php");
}
?>
<html>

<head>
 <title>GateWayForWeb</title>
 <link rel="stylesheet" href="css/index.css" type="text/css">
 <script src="angular.min.js"></script>
 <?php include("js_file/index.js");?>
</head>

<body>

  <div class="index_main_div">


  <div class="main_form_div">

    <div class="button_div">

      <div class="login_button"><img src="images\log.png" class="log"><p id="logintext"> Park Me Login</p> </button>
    </div>


  <form id="login_form" method="POST">
    <input type="text" id="login_mobile" name="login_mobile" name="r_password" placeholder="Mobile Number" maxlength="10" required>
    <input type="password" id="login_password" name="password"  placeholder="Password" required>
    <input type="submit" id="logsub" name="logsub" value="LogIn">
  </form>

  </div>

</div>

</body>
</html>

<?php
include("allfunctions.php");
$function = new allfunctions();
if(isset($_REQUEST['submit']))
{
  $name=$_REQUEST['r_name'];
  $mobile=$_REQUEST['r_mobile'];
  $email=$_REQUEST['r_email'];
  $business=$_REQUEST['r_business'];
  $cname=$_REQUEST['r_cname'];
  $password=$_REQUEST['r_password'];
  $r_password=$_REQUEST['r_r_password'];

  $connection=$function->connect();
  $volidmobile=$function->checkrecorsarepresentornot("user","user_mobile",$mobile);
  $regmoblie=mysql_query("SELECT `user_mobile` FROM `user` WHERE `user_mobile` like '$mobile'");
  while ($row = mysql_fetch_array($regmobile))
    {
      $databasemobile=$databasemobile['user_mobile'];
    }

    if($volidmobile=="no")
      {
        if($password==$r_password)
        {
          $_SESSION["s_name"] = $name;
          $_SESSION["s_mobile"] = $mobile;
          $_SESSION["s_email"] = $email;
          $_SESSION["s_business"] = $business;
          $_SESSION["s_cname"] = $cname;
          $_SESSION["s_password"] = $password;
          $_SESSION["s_r_password"] = $r_password;
          echo "<script>window.location='insertdata.php'</script>";
        }
        else
        {
          echo "<script>alert('password is not matched');</script>";
        }
      }
    else
    {
      echo "<script>alert('mobile is registration');</script>";
    }
  }

if(isset($_REQUEST['logsub']))
            {
              $connection=$function->connect();
              $mobile=$_REQUEST['login_mobile'];
              $password=$_REQUEST['password'];
              $md5password=md5($password);
              $ans=mysql_query("SELECT COUNT(user_mobile),COUNT(password) as cou from user where user_mobile='$mobile' and password='$md5password'");
              // $user_verify=mysql_query("SELECT `verify`  from user where user_mobile like '$mobile'");
              // while ($row = mysql_fetch_array($user_verify))
              // {
              //   $v=$row['verify'];
              // }
              $count=mysql_fetch_array($ans);
              $mobile_count = $count["cou"];
              $password_count = $count["cou"];

                if($mobile_count==1 && $password_count==1)
                {
                  // if($v==1)
                  // {
                  $_SESSION['dashbord_mobile']=$mobile;
                  // header('location:dashbord.php');
                  echo "<script>window.location.assign('dashbord.php');</script>";
                  mysql_close($connection);
                // }
                // else
                // {
                //   echo "<script>alert('mobile number is not verify');</script>";
                // }
                }
                else
                {
                  echo "<script>alert('Username or Password is not correct');</script>";
                }
           }

?>
