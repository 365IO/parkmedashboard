<?php session_start();?>
<?php error_reporting(0);?>
<?php
if(!isset($_SESSION["dashbord_mobile"]))
{
    header("location:index.php");
    exit;
}
else
{
    $mobile=$_SESSION["dashbord_mobile"];
}
?>
<html>
  <head>
    <script src="js/jq.js"></script>
    <script src="js/interactions.js"></script>
    <script src="js/alljsfunctions.js"></script>

    <script src="js/popup.js"></script>
     <link rel="stylesheet" href="css/index.css" type="text/css">
     <link rel="stylesheet" href="css/popup.css" type="text/css">
    <link rel="stylesheet" href="css/indexbr1.css" type="text/css" media="screen and (max-width:1000px)">
    <link rel="stylesheet" href="css/indexbr2.css" type="text/css" media="screen and (max-width:667px)">
    <link rel="stylesheet" href="css/indexbr3.css" type="text/css" media="screen and (max-width:450px)">



    <script>
    function logout()
    {
      window.location="logout.php";
    }
    </script>

    <title>dashbord</title>
    <link rel="stylesheet" href="css/dashbord.css" type="text/css">

  </head>
  <body>
    <?php
            include("header1.php");
            //` include("nav.php");
            include("allfunctions.php");
            $obj=new allfunctions();
            $obj->connect();
            $misscallcount=$obj->misscallcount();
            $followupcount=$obj->followupcount();
            $siteleadcount=$obj->siteleadcount();
    ?>

   <!--    <section>-->
          <!-- <div id="menu1">

               <div id="ic1"><br><?php echo $misscallcount;?></div>

                       <p id="navigation1">Miss Call</p>

               </div>


          <div id="menu2">
               <div id="ic2"><br><?php echo $siteleadcount;?></div>

                       <p id="navigation2">Web Leads</p>

               </div> -->

           <!-- <a href="followup.php"><div id="menu3">

               <div id="ic3"><br><?php echo $followupcount;?></div>

                       <p id="navigation3">Follow Up</p>

               </div></a> -->
   <!-- <br><br><br><br>
               <div class="tablediv" id="tabledv"> -->

                             <?php //$data= $obj->displayalldata();
  //                            if($data=="")
  //                            {
  //                              echo '  <table  cellspacing="0">
  //                                          <thead>
  //                                          <tr class="heading">
  //                                                    <th>Vehicle No</th>
  //                                                    <th> No</th>
   //
  //                                          </tr>
  //                                          </thead>
  //                                </table>
  //                            <div class="datatable" id="datatbl">
  //                                <table cellspacing="1">
  //                                          <tbody></tbody>
  //                                </table>
  //                            </div>';
  //                              }
  //                          else {
   //
  //    echo '  <table  cellspacing="0">
  //                <thead>
  //                <tr class="heading">
  //                          <th>Vehicle No</th>
  //                          <th>No</th>
   //
  //                </tr>
  //                </thead>
  //      </table>
  //  <div class="datatable" id="datatbl">
  //      <table cellspacing="1">
  //                <tbody>'.$data.'</tbody>
  //      </table>
  //  </div>';
  //  }
   //
  //  ?>
   //
  <!-- //              </div>
   //
  //              <div class="tablediv2">
   //
  //              </div>
  //              <div class="blackdivformisscall">
  //              </div> -->
               <!-- <center>
               <div class="datadivformisscall">
                 <input type="button" value="X" class="closemisspopup" title='Close'>
                 <div class="headdiv"><div class="nameclass">Edit Miss Call Leads</div></div><br>
                 <form method="post">
                         <table>
                                     <tr><td>Name&nbsp;&nbsp; </td><td><input type="text" name="name" class="field"  id="name"></td></tr>
                                     <tr><td>Contact No&nbsp;&nbsp; </td><td><input type="text" name="contactno" class="field" id="contactno"></td></tr>
                                     <tr><td>Requirements &nbsp;&nbsp;</td><td><textarea class="textarea"  name="requ" id="requirement"></textarea></td></tr>
                                     <tr><td>City &nbsp;&nbsp;</td><td><input type="text" name="city" class="field"  id="city"></td></tr>

                                     <tr><td>Category&nbsp;&nbsp; </td><td>
                                             <select class="field" id="typeofproperty" onchange="projectaddintopage(this.value)" onclick="projectaddintopage(this.value)">
                                                       <option value="Newly Constructed">Newly Constructed</option>
                                                       <option value="Completed">Completed</option>
                                                       <option value="Ongoing">Ongoing</option>
                                             </select>
                                     </td></tr>
                                     <tr><td>Select Project &nbsp;&nbsp;</td><td>
                                             <select  class="field" id="projects">
                                                         <option>Select Project</option>
                                             </select>
                                     </td></tr>
                                     <tr><td>Follow Up Date&nbsp;&nbsp; </td><td><input type="text" name="followup" id="datepick" class="field" ></td></tr>
                                     <tr><td colspan="2"><input type="button" name="submit" value="Update" class="updatebtn" onclick="putdata()"></td></tr>
                         </table>
                 </form>
                 </div>
                 </center> -->
                 <!-- <center>
                 <div class="datadivforwebleads">
                   <input type="button" value="X" class="closewebpopup" title='Close'>
                   <div class="headdiv"><label class="webleadname">Edit Web Leads</label></div><br>
                   <form method="post">
                           <table>
                                       <tr><td>Name : </td><td><input type="text"  class="field"  id="webname"></td><td>Contact No : </td><td><input type="text"  class="field" id="webcontactno"></td></tr>
                                       <tr><td>Email : </td><td><input type="text"  class="field" id="webemail"></td><td>Message : </td><td><textarea class="textarea"   id="webmsg"></textarea></td></tr>
                                       <tr><td>City : </td><td><input type="text"  class="field"  id="webcity"></td><td> Category : </td><td>
                                       <select class="field" id="webtypeofproperty" onchange="projectaddintopage2(this.value)" onclick="projectaddintopage2(this.value)">
                                                 <option value="Newly Constructed">Newly Constructed</option>
                                                 <option value="Completed">Completed</option>
                                                 <option value="Ongoing">Ongoing</option>
                                       </select></td></tr>
                                       <tr><td> Source : </td><td><input type="text"  class="field"  id="websource" disabled="true"></td><td>Select Project : </td><td>
                                           <select  class="field" id="webprojects">
                                                     <option>Select Project</option>
                                         </select></td></tr>
                                       <tr><td> Page Name : </td><td><input type="text"  class="field"  id="webpagename" disabled="true"></td><td>Follow Up Date : </td><td><input type="text"  id="datepick2" class="field" ></td></tr>
                                       <tr><td colspan="4"><input type="button" name="submit" value="Update" class="updatebtn" onclick="putdata2()"></td></tr>
                           </table>
                   </form>
                   </div>
                   </center> -->
                 <!-- <center>
                               <div id="thankyoupopup">Data Updated Successfully    &nbsp; &nbsp; &nbsp; <input type="button" class="closebtnt" value="X"></div>
                                 <div id="error">Please try again    &nbsp; &nbsp; &nbsp; <input type="button" class="errorbtn" value="X"></div>
   </center> -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   <link rel="stylesheet" href="/resources/demos/style.css">


      <?php include("grid.php");?>
    </div>
  </body>
</html>
