<?php session_start();?>
<?php error_reporting(0);?>
<?php
  session_unset();
  unset($_SESSION['dashbord_mobile.php']);
  header('Location:index.php');
?>
