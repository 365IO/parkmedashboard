<?php session_start();?>
<?php
    if($_SESSION['m']=="")
    {
        header('location:login.php');
    }
    $mob=$_SESSION['m'];
?>
<html>
    <head>
        <style>

body{margin:0;font-family:sans-serif;}

header{background-color:#3f51d5;height:60px;width: 100%; position: fixed;margin-top: 0px;z-index: 2;border-bottom: solid 1px white;}

/*#logout{cursor: pointer;color:mediumseagreen;text-decoration: none;position: absolute;font-size: 20px;width: 170px;padding-left: 50px;padding-top: 5px;padding-bottom: 5px;//background-color: white;margin-top:52px;}
#logout:hover{color:white;background-color: mediumseagreen;}
*/

#logout{
  position: absolute;
  width: 130px;
  height: 30px;
  float: :right;
  right: 20px;
  top:15px;
  margin-left: 800px;
  font-size: 20px;
  border:none;
  outline: none;
  color:#3f51d5;
  cursor: pointer;
  background-image: url("../images/logout1.png");
  background-size: 38% 100%;
  background-color: #ffffff;
  border-radius: 10px;
  //background-color: red;
  text-align: center;
  padding-left: 10px;
  font-family: fabs;letter-spacing: 2px;
}
#logout:hover{
  color:#2196F3;
  background-image: url("../images/logoutblue.png");
  background-color: white;
}


#settings{cursor: pointer;color:mediumseagreen;text-decoration: none;position: absolute;font-size: 20px;width: 170px;padding-left: 50px;padding-top: 5px;padding-bottom: 5px;//background-color: white;margin-top:10px;}
#settings:hover{color:white;background-color: mediumseagreen;}

#dp{position: absolute;height: 45px;width: 45px; top:3px;left:3px;border-radius: 200px;//background-image:url("user.png");background-repeat: no-repeat;cursor: pointer;border:none;}

#userlogin{position: absolute;height: 50px;width:220px;border-radius: 200px;background-color:mediumseagreen;top:5px;
                //margin-left: 50%;//left: 400px;right: 50px;}
#logouttext{position: relative;top:-20px;  font-family: fabs;letter-spacing: 2px;left: 10px;}

#hello,#username{position:absolute;color:white;}

#hello{left: 55px;}

#username{left: 100px;//border:solid black 1px;width: 100px;padding: 5px;top:-5px;border-radius: 100px;}

#username:hover{box-shadow: 0px 0px 10px #ffffff;cursor: pointer;}

#username:active{box-shadow: 0px 0px 5px #ffffff;}

#usermenu{position: absolute;height: 7px;cursor: pointer;left: 90px;top:10px;}

#userdetails{background-color: #ffffff;position: absolute;height: 100px;width: 220px;border-radius: 5px;box-shadow: 0px 0px 10px #bcbcbc;right: 50px;top:70px;display:none;position: fixed;}


#s1{position: absolute;height: 25px;left: 15px;top:4px;}

#home{color:#00a4ff;text-decoration: none;position: absolute;font-size: 20px;width: 170px;padding-left: 50px;padding-top: 5px;padding-bottom: 5px;//background-color: white;margin-top:95px;}
#home:hover{color:white;background-color: #00a4ff;cursor: pointer;}
            #home:hover  #s3{-webkit-filter:invert(100%);}

#s3{position: absolute;height: 25px;left: 15px;top:4px}
#s2{position: absolute;height: 25px;left: 15px;top:4px}

            #hh{//border: solid black 1px;position: absolute;width:350px;margin-top:-22px;margin-left: 120px;}
            #headings{width:290px;position: absolute;font-size: 25px;margin-left: 12px;top:15px;color:white;font-family: fabs;letter-spacing: 2px;}

            #hclose,#hmenu{position: absolute;color:white;}
            #hmenu{width:40px;margin-left: 20px;top:10px;opacity:0}
        </style>
        <link rel="stylesheet" href="CSS/indexbr1.css" type="text/css" media="screen and (max-width:1000px)">
        <link rel="stylesheet" href="CSS/indexbr2.css" type="text/css" media="screen and (max-width:667px)">
    <link rel="stylesheet" href="CSS/indexbr3.css" type="text/css" media="screen and (max-width:450px)">
        <script src="js/jq.js"></script>
        <script>
        $(document).ready(function(){

            $("#username").click(function(){

               $("#userdetails").slideToggle(150);

            });

              $("#dp").click(function(){

               $("#userdetails").slideToggle(150);

            });


        });

            </script>
    </head>
    <body>
         <header id="myheader">
             <img src="images/menu.png" id="hmenu">

             <div id="headings">Welcome To Park Me.</div>

            <!-- <div id="userlogin">

                <img src="images/logo.png" id="dp">
                <?php //echo $photoimgg[0];?>
                <p id="hello">Hello, </p>
                <p id="username"> Admin <img src="images/triangle.png" id="usermenu"></p>

            </div> -->

    <!-- <div id="userdetails">

        <a href="accountsetting.php"><p id="settings">Account Setting</p> </a>
        <a href="logout.php" style="text-decoration:none;"><p id="logout">logout</p></a>
    </div> -->

 <button id="logout" onclick="logout()">  <img src="images/logout.png" style="position:absolute;height:25px;float:right;right:95px;margin-top:0x;z-index:20;" ><p id="logouttext">Logout</p></button>

    </header>

    </body>
</html>
