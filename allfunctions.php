<?php
class allfunctions
{
            function connect()
            {
                mysql_connect("localhost","root","root");
                mysql_select_db("parking_system");
                //mysql_connect("localhost","misscalldash","misscalldash");mysql_select_db("sagar1way_misscalldash");
            }

            function ipaddress()
            {

                    if(!empty($_SERVER['HTTP_CLIENT_IP']))
                    {
                      $ip=$_SERVER['HTTP_CLIENT_IP'];
                    }
                    elseif (!empty($_SERVER['HTTP_CLIENT_IP']))
                    {
                          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
                    }
                    else
                    {
                          $ip=$_SERVER['REMOTE_ADDR'];

                    }
                    return $ip;
            }
            function todayleadcount()
                    {
                            $counter=0;
                            date_default_timezone_get('Asia/kolkata');
                            $d=date("Y-m-d");
                            $bcquery="select count(*) as Co from buyreq";
                            $storee=mysql_query($bcquery);
                            $count=mysql_fetch_array($storee);
                            $cou = $count['Co'];
                            echo $cou;
                    }

       function insertdb() {
        $j = 0;
        $col = '';
        $val = '';
        $info = func_get_args();
        $num = func_num_args();

        $table = "`" . $info[0] . "`";

        for ($j = 1; $j < $num; $j++) {
            if (($j % 2) == 0) {
                $val = $val . "'" . $info[$j] . "',";
            }
            if (($j % 2) == 1) {

                $col = $col . "`" . $info[$j] . "`,";
            }
        }
        $val = rtrim($val, ",");
        $col = rtrim($col, ",");
        mysql_query("insert into $table($col) values($val)");
        return "Thank You";
    }

function displaymisscalldata($key)
{
if($key=="")
{
        $count=1;
        $tabledata="";
              $query=mysql_query("select * from vehicle order by V_currdate DESC,V_currtime DESC");
              while($row=mysql_fetch_array($query))
              {
                  $tabledata.= "
                    <tr>
                              <td>".$count."</td>
                              <td>".$row['V_currdate']." ".$row['V_currtime']."</td>
                              <td>".$row['CONTACTNO']."</td>
                              // <td><input type='button' onclick='getdata(".$row['SRNO'].")' value='Edit' class='editbtnmiss' ></td>
                    </tr> ";
                $count++;
              }
        if($tabledata=="")
        {
            $tabledata= "<br><br><br><center>No Record Found...</center>";
            return $tabledata;
        }
else{
        return $tabledata;
}
}
else {

  // $count=1;
  // $tabledata="";
  //       $query=mysql_query("select * from vehicle where FOLLOWUPDATE='0000-00-00' and (CONTACTNO like '%$key%' or NAME LIKE '%$key%' or CITY like '%$key%')  order by CURRENTDATE DESC,CURRENTTIME DESC");
  //       while($row=mysql_fetch_array($query))
  //       {
  //           $tabledata.= "
  //             <tr>
  //                       <td>".$count."</td>
  //                             <td>".$row['CURRENTDATE']." ".$row['CURRENTTIME']."</td>
  //                             <td>".$row['CONTACTNO']."</td>
  //                           <td><input type='button' onclick='getdata(".$row['SRNO'].")' value='Edit' class='editbtnmiss' ></td>
  //             </tr> ";
  //         $count++;
  //       }
  return $tabledata;

}
}


function displaymisscalldataviadate($sdate,$edate)
{
        $count=1;
        $tabledata="";
              $query=mysql_query("select * from misscall where FOLLOWUPDATE='0000-00-00' and CURRENTDATE BETWEEN '$sdate' and '$edate' order by CURRENTDATE DESC,CURRENTTIME DESC");
              while($row=mysql_fetch_array($query))
              {
                  $tabledata.= "
                    <tr>
                              <td>".$count."</td>
                              <td>".$row['CURRENTDATE']." ".$row['CURRENTTIME']."</td>
                              <td>".$row['CONTACTNO']."</td>
                                  <td><input type='button' onclick='getdata(".$row['SRNO'].")' value='Edit' class='editbtnmiss' ></td>
                    </tr> ";
                $count++;
              }
        return $tabledata;
}

function displayfollowupdata($key)
{
if($key=="")
{
        $count=1;
        $tabledata="";
              $query=mysql_query("select * from misscall where FOLLOWUPDATE!='0000-00-00' order by CURRENTDATE DESC,CURRENTTIME DESC");
              while($row=mysql_fetch_array($query))
              {
                $tabledata.= "
                  <tr>
                            <td>".$count."</td>
                            <td>".$row['CURRENTDATE']." ".$row['CURRENTTIME']."</td>
                            <td><input class='tabletextfiled' type='text' value='".ucfirst($row['NAME'])."'></td>
                            <td>".$row['CONTACTNO']."</td>
                            <td><input class='tabletextfiled' type='text' value='".ucfirst($row['CITY'])."''></td>
                              <td>".$row['FOLLOWUPDATE']."</td>
                              <td>Miss call</td>
                  </tr> ";
                $count++;
              }
              $query1=mysql_query("select * from sitelead where FOLLOWUPDATE!='0000-00-00' order by CURRENTDATE DESC,CURRENTTIME DESC");
              while($row1=mysql_fetch_array($query1))
              {
                  $tabledata.= "
                    <tr>
                              <td>".$count."</td>
                              <td>".$row1['CURRENTDATE']." ".$row1['CURRENTTIME']."</td>
                              <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['NAME'])."'></td>
                              <td>".$row1['CONTACTNO']."</td>
                              <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['CITY'])."''></td>
                                <td>".$row1['FOLLOWUPDATE']."</td>
                                <td>Web Lead</td>
                    </tr> ";
                $count++;
              }
              if($tabledata=="")
              {
                  $tabledata= "<br><br><br><center>No Record Found...</center>";
                  return $tabledata;
              }
      else{
              return $tabledata;
      }
}
else {

  $count=1;
  $tabledata="";
        $query=mysql_query("select * from misscall where FOLLOWUPDATE!='0000-00-00' and  (CONTACTNO like '%$key%' or NAME LIKE '%$key%' or CITY like '%$key%' ) order by CURRENTDATE DESC,CURRENTTIME DESC");
        while($row=mysql_fetch_array($query))
        {
            $tabledata.= "
              <tr>
                        <td>".$count."</td>
                        <td>".$row['CURRENTDATE']." ".$row['CURRENTTIME']."</td>
                        <td><input class='tabletextfiled' type='text' value='".ucfirst($row['NAME'])."'></td>
                        <td>".$row['CONTACTNO']."</td>
                        <td><input class='tabletextfiled' type='text' value='".ucfirst($row['CITY'])."''></td>
                          <td>".$row['FOLLOWUPDATE']."</td>
                          <td>Miss call</td>
              </tr> ";
          $count++;
        }
        $query1=mysql_query("select * from sitelead where FOLLOWUPDATE!='0000-00-00' and  (CONTACTNO like '%$key%' or NAME LIKE '%$key%' or CITY like '%$key%' or EMAIL like '%$key%' ) order by CURRENTDATE DESC,CURRENTTIME DESC");
        while($row1=mysql_fetch_array($query1))
        {
            $tabledata.= "
              <tr>
                        <td>".$count."</td>
                        <td>".$row1['CURRENTDATE']." ".$row1['CURRENTTIME']."</td>
                        <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['NAME'])."'></td>
                        <td>".$row1['CONTACTNO']."</td>
                        <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['CITY'])."''></td>
                          <td>".$row1['FOLLOWUPDATE']."</td>
                          <td>Web Lead</td>
              </tr> ";
          $count++;
        }
  return $tabledata;

}
}




function displayfollowupdatabydate($date)
{
        $count=1;
        $tabledata="";
              $query=mysql_query("select * from misscall where FOLLOWUPDATE!='0000-00-00' and FOLLOWUPDATE='$date'  order by CURRENTDATE DESC,CURRENTTIME DESC");
              while($row=mysql_fetch_array($query))
              {
                $tabledata.= "
                  <tr>
                            <td>".$count."</td>
                            <td>".$row['CURRENTDATE']." ".$row['CURRENTTIME']."</td>
                            <td><input class='tabletextfiled' type='text' value='".ucfirst($row['NAME'])."'></td>
                            <td>".$row['CONTACTNO']."</td>
                            <td><input class='tabletextfiled' type='text' value='".ucfirst($row['CITY'])."''></td>
                              <td>".$row['FOLLOWUPDATE']."</td>
                              <td>Miss call</td>
                  </tr> ";
                $count++;
              }
              $query1=mysql_query("select * from sitelead where FOLLOWUPDATE!='0000-00-00' and FOLLOWUPDATE='$date' order by CURRENTDATE DESC,CURRENTTIME DESC");
              while($row1=mysql_fetch_array($query1))
              {
                  $tabledata.= "
                    <tr>
                              <td>".$count."</td>
                              <td>".$row1['CURRENTDATE']." ".$row1['CURRENTTIME']."</td>
                              <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['NAME'])."'></td>
                              <td>".$row1['CONTACTNO']."</td>
                              <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['CITY'])."''></td>
                                <td>".$row1['FOLLOWUPDATE']."</td>
                                <td>Web Lead</td>
                    </tr> ";
                $count++;
              }
              if($tabledata=="")
              {
                  $tabledata= "<br><br><br><center>No Record Found...</center>";
                  return $tabledata;
              }
      else{
              return $tabledata;
      }
}





function displayfollowupviadate($sdate,$edate)
{
        $count=1;
        $tabledata="";
              $query=mysql_query("select * from misscall where FOLLOWUPDATE!='0000-00-00' and FOLLOWUPDATE BETWEEN '$sdate' and '$edate' order by CURRENTDATE DESC,CURRENTTIME DESC");
              while($row=mysql_fetch_array($query))
              {
                  $tabledata.= "
                    <tr>
                              <td>".$count."</td>
                              <td>".$row['CURRENTDATE']." ".$row['CURRENTTIME']."</td>
                              <td><input class='tabletextfiled' type='text' value='".ucfirst($row['NAME'])."'></td>
                              <td>".$row['CONTACTNO']."</td>
                              <td><input class='tabletextfiled' type='text' value='".ucfirst($row['CITY'])."''></td>
                              <td>".$row['FOLLOWUPDATE']."</td>
                                <td>Miss Call</td>
                    </tr> ";
                $count++;
              }
              $query1=mysql_query("select * from sitelead where FOLLOWUPDATE!='0000-00-00' and FOLLOWUPDATE BETWEEN '$sdate' and '$edate' order by CURRENTDATE DESC,CURRENTTIME DESC");
              while($row1=mysql_fetch_array($query1))
              {
                  $tabledata.= "
                    <tr>
                              <td>".$count."</td>
                              <td>".$row1['CURRENTDATE']." ".$row1['CURRENTTIME']."</td>
                              <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['NAME'])."'></td>
                              <td>".$row1['CONTACTNO']."</td>
                              <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['CITY'])."''></td>
                              <td>".$row1['FOLLOWUPDATE']."</td>
                                <td>Web Lead</td>
                    </tr> ";
                $count++;
              }
        return $tabledata;
}


function displayfollowupviadatedd($sdate,$edate)
{
        $count=1;
        $tabledata="";
              $query=mysql_query("select * from misscall where FOLLOWUPDATE!='0000-00-00' and FOLLOWUPDATE BETWEEN '$sdate' and '$edate' order by CURRENTDATE DESC,CURRENTTIME DESC");
              while($row=mysql_fetch_array($query))
              {
                  $tabledata.= "
                    <tr>
                              <td>".$count."</td>
                              <td>".$row['CURRENTDATE']." ".$row['CURRENTTIME']."</td>
                              <td><input class='tabletextfiled' type='text' value='".ucfirst($row['NAME'])."'></td>
                              <td>".$row['CONTACTNO']."</td>
                              <td><input class='tabletextfiled' type='text' value='".ucfirst($row['CITY'])."''></td>
                              <td>".$row['FOLLOWUPDATE']."</td>
                                <td>Miss Call</td>
                    </tr> ";
                $count++;
              }
              $query1=mysql_query("select * from sitelead where FOLLOWUPDATE!='0000-00-00' and FOLLOWUPDATE BETWEEN '$sdate' and '$edate' order by CURRENTDATE DESC,CURRENTTIME DESC");
              while($row1=mysql_fetch_array($query1))
              {
                  $tabledata.= "
                    <tr>
                              <td>".$count."</td>
                              <td>".$row1['CURRENTDATE']." ".$row1['CURRENTTIME']."</td>
                              <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['NAME'])."'></td>
                              <td>".$row1['CONTACTNO']."</td>
                              <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['CITY'])."''></td>
                              <td>".$row1['FOLLOWUPDATE']."</td>
                                <td>Web Lead</td>
                    </tr> ";
                $count++;
              }
        return $tabledata;
}




function allleadtable()
            {

                    date_default_timezone_get('Asia/kolkata');
                    $d=date("Y-m-d");
                    $bcquery="select * from buyreq order by(CurrDate) DESC";
                    $storee=mysql_query($bcquery);
                    echo '<table  style="width:1440px;margin-left:0px;position:absolute;z-index:5;background:white;top:0px;">
                    <tr>
                        <td style="width:110px;" class="tabhead">Date/Time</td>
                        <td style="width:130px;" class="tabhead">Name</td>
                        <td style="width:90px;" class="tabhead">Mobile No.</td>
                        <td style="width:180px;" class="tabhead">Requirement</td>
                        <td style="width:90px;" class="tabhead">Configuration</td>
                        <td style="width:90px;" class="tabhead">Sqft/Sqmt</td>

                        <td style="width:110px;" class="tabhead">City</td>
                        <td style="width:90px;" class="tabhead">Area</td>
                        <td style="width:90px;" class="tabhead">Budget(Lakh)</td>
                        <td style="width:90px;" class="tabhead">SMS Details</td>
                        <td style="width:80px;" class="tabhead">Delete</td>
                    </tr>

                </table><div id="contenttable">
                <table  id="tbl" style="width:1440px;margin-left:0px;margin-top:40px;top:0px;position:relative;z-index:4;background:transparent;">';
                    while($count=mysql_fetch_array($storee))
                    {
                      $category =$count["prop_cat"];
                      $city=$count["location"];
                      $area=$count["sub_area"];
                       $pq=mysql_query("select title from prop_category where cat_id='".$category."' ");
                      $ct=mysql_fetch_array($pq);
                      $cat=$ct['title'];

                      $cq=mysql_query("select city from city where cid='".$city."' ");
                     $cty=mysql_fetch_array($cq);
                     $ccity=$cty['city'];

                     $aq=mysql_query("select Area from area where area_id='".$area."' ");
                    $carea=mysql_fetch_array($aq);
                    $ccarea=$carea['Area'];
                       echo '<tr>
                        <td style="width:110px;">'.$count["CurrDate"]." ".$count["CurrTime"].'</td>
                        <td style="width:130px;">'.$count["cname"].'</td>
                        <td style="width:90px;">'.$count["cmobno"].'</td>

                        <td style="width:180px;"><input type="text" class="eitltd" value="'.$cat.'"></td>
                        <td style="width:90px;">'.$count["no_of_rooms"].'</td>
                        <td style="width:90px;">'.$count["area"].'</td>
                        <td style="width:110px;">'.$ccity.'</td>
                        <td style="width:90px;">'.$ccarea.'</td>
                        <td style="width:90px;">'.$count["budget"].'</td>
                        <td style="width:90px;"></td>
                       <td style="width:80px;cursor:pointer;"><input type="button" value="Delete" onclick="verification('.$count["req_id"].')"  class="editbutton"></td>
                        </tr>';
                    }
                    echo " </table>
                </div>
                ";

              }






              function todayleadtable()
                          {

                                  date_default_timezone_get('Asia/kolkata');
                                  $d=date("Y-m-d");
                                  $bcquery="select * from buyreq where CurrDate='".$d."' order by(CurrDate) DESC";
                                  $storee=mysql_query($bcquery);
                                  if (mysql_num_rows($storee) > 0)
                                  {
                                  echo '<table  style="width:1350px;margin-left:0px;position:absolute;z-index:5;background:white;top:0px;">
                                  <tr>
                                      <td style="width:110px;" class="tabhead">Date/Time</td>
                                      <td style="width:130px;" class="tabhead">Name</td>
                                      <td style="width:90px;" class="tabhead">Mobile No.</td>
                                      <td style="width:180px;" class="tabhead">Requirement</td>
                                      <td style="width:90px;" class="tabhead">Configuration</td>
                                      <td style="width:90px;" class="tabhead">Sqft/Sqmt</td>

                                      <td style="width:110px;" class="tabhead">City</td>
                                      <td style="width:90px;" class="tabhead">Area</td>
                                      <td style="width:90px;" class="tabhead">Budget(Lakh)</td>
                                      <td style="width:80px;" class="tabhead">Delete</td>
                                  </tr>

                              </table><div id="contenttable">
                              <table  id="tbl" style="width:1350px;margin-left:0px;margin-top:40px;top:0px;position:relative;z-index:4;background:transparent;">';
                                  while($count=mysql_fetch_array($storee))
                                  {
                                    $category =$count["prop_cat"];
                                    $city=$count["location"];
                                    $area=$count["sub_area"];
                                     $pq=mysql_query("select title from prop_category where cat_id='".$category."' ");
                                    $ct=mysql_fetch_array($pq);
                                    $cat=$ct['title'];

                                    $cq=mysql_query("select city from city where cid='".$city."' ");
                                   $cty=mysql_fetch_array($cq);
                                   $ccity=$cty['city'];

                                   $aq=mysql_query("select Area from area where area_id='".$area."' ");
                                  $carea=mysql_fetch_array($aq);
                                  $ccarea=$carea['Area'];
                                     echo '<tr>
                                      <td style="width:110px;">'.$count["CurrDate"]." ".$count["CurrTime"].'</td>
                                      <td style="width:130px;">'.$count["cname"].'</td>
                                      <td style="width:90px;">'.$count["cmobno"].'</td>

                                      <td style="width:180px;"><input type="text" class="eitltd" value="'.$cat.'"></td>
                                      <td style="width:90px;">'.$count["no_of_rooms"].'</td>
                                      <td style="width:90px;">'.$count["area"].'</td>
                                      <td style="width:110px;">'.$ccity.'</td>
                                      <td style="width:90px;">'.$ccarea.'</td>
                                      <td style="width:90px;">'.$count["budget"].'</td>
                                     <td style="width:80px;cursor:pointer;"><input type="button" value="Delete" onclick="verification('.$count["req_id"].')"  class="editbutton"></td>
                                      </tr>';
                                  }
                                  echo " </table>
                              </div>
                              ";

                            }
                            else {
                                echo "<div class='nomatchrecords'>Sorry ...no record found</div>";
                            }
                            }







function misscallcount()
{
  $query=mysql_query("select count(*) as cou from misscall where FOLLOWUPDATE='0000-00-00'");
  $row=mysql_fetch_array($query);
  return $row['cou'];
  }

  function siteleadcount()
  {
    $query=mysql_query("select count(*) as cou from sitelead where FOLLOWUPDATE='0000-00-00'");
    $row=mysql_fetch_array($query);
    return $row['cou'];
    }

  function followupcount()
  {
    $query=mysql_query("select count(*) as cou from misscall where FOLLOWUPDATE!='0000-00-00'");
    $row=mysql_fetch_array($query);
    $query1=mysql_query("select count(*) as cou from sitelead where FOLLOWUPDATE!='0000-00-00'");
    $row1=mysql_fetch_array($query1);
    return $row['cou']+$row1['cou'];
    }


    function displaysiteleadsdata($key)
    {
    if($key=="")
    {
            $count=1;
            $tabledata="";
                  $query=mysql_query("select * from sitelead where FOLLOWUPDATE='0000-00-00' order by CURRENTDATE DESC,CURRENTTIME DESC");
                  while($row=mysql_fetch_array($query))
                  {
                      $tabledata.= "
                        <tr>
                                  <td>".$count."</td>
                                  <td>".$row['CURRENTDATE']." ".$row['CURRENTTIME']."</td>
                                  <td><input class='tabletextfiled' type='text' value='".ucfirst($row['NAME'])."'></td>
                                  <td>".$row['CONTACTNO']."</td>
                                  <td><input class='tabletextfiled' type='text' value='".ucfirst($row['CITY'])."''></td>
                                  <td>".$row['PROJECTNAME']."</td>
                                  <td><input type='button' onclick='getdata2(".$row['SR_NO'].")' value='Edit' class='editbtnweb'></td>
                        </tr> ";
                    $count++;
                  }
                  if($tabledata=="")
                  {
                      $tabledata= "<br><br><br><center>No Record Found...</center>";
                      return $tabledata;
                  }
          else{
                  return $tabledata;
          }
    }
    else {

      $count=1;
      $tabledata="";
            $query=mysql_query("select * from sitelead where FOLLOWUPDATE='0000-00-00' and (CONTACTNO like '%$key%' or NAME LIKE '%$key%' or CITY like '%$key%' or EMAIL like '%$key%')  order by CURRENTDATE DESC,CURRENTTIME DESC");
            while($row=mysql_fetch_array($query))
            {
                $tabledata.= "
                  <tr>
                            <td>".$count."</td>
                            <td>".$row['CURRENTDATE']." ".$row['CURRENTTIME']."</td>
                            <td><input class='tabletextfiled' type='text' value='".ucfirst($row['NAME'])."'></td>
                            <td>".$row['CONTACTNO']."</td>
                            <td><input class='tabletextfiled' type='text' value='".ucfirst($row['CITY'])."''></td>
                            <td>".$row['PROJECTNAME']."</td>
                              <td><input type='button' onclick='getdata2(".$row['SR_NO'].")' value='Edit' class='editbtnweb' ></td>
                  </tr> ";
              $count++;
            }
      return $tabledata;

    }
    }

    function displaysiteleaddataviadate($sdate,$edate)
    {
            $count=1;
            $tabledata="";
                  $query=mysql_query("select * from sitelead where FOLLOWUPDATE='0000-00-00' and CURRENTDATE BETWEEN '$sdate' and '$edate' order by CURRENTDATE DESC,CURRENTTIME DESC");
                  while($row=mysql_fetch_array($query))
                  {
                    $tabledata.= "
                      <tr>
                                <td>".$count."</td>
                                <td>".$row['CURRENTDATE']." ".$row['CURRENTTIME']."</td>
                                <td><input class='tabletextfiled' type='text' value='".ucfirst($row['NAME'])."'></td>
                                <td>".$row['CONTACTNO']."</td>
                                <td><input class='tabletextfiled' type='text' value='".ucfirst($row['CITY'])."''></td>
                                <td>".$row['PROJECTNAME']."</td>
                                <td><input type='button' onclick='getdata2(".$row['SR_NO'].")' value='Edit' class='editbtnweb'></td>
                      </tr> ";
                    $count++;
                  }
            return $tabledata;
    }

    function displayalldata()
    {
            $count=1;
            $tabledata="";
                  $query=mysql_query("select * from misscall where FOLLOWUPDATE='0000-00-00'  order by CURRENTDATE DESC,CURRENTTIME DESC limit 5");
                  while($row=mysql_fetch_array($query))
                  {
                      $tabledata.= "
                        <tr>
                                  <td>".$count."</td>
                                  <td>".$row['CURRENTDATE']." ".$row['CURRENTTIME']."</td>
                                  <td><input class='tabletextfiled' type='text' value='".ucfirst($row['NAME'])."'></td>
                                  <td>".$row['CONTACTNO']."</td>
                                  <td><input class='tabletextfiled' type='text' value='".ucfirst($row['CITY'])."''></td>
                                  <td>Miss Call</td>
                                    <td><input class='tabletextfiled' type='text' value='".ucfirst($row['PAGENAME'])."''></td>
                                      <td><input type='button' onclick='getdata(".$row['SRNO'].")' value='Edit' class='editbtnmiss' ></td>
                        </tr> ";
                    $count++;
                  }
                  $query1=mysql_query("select * from sitelead where FOLLOWUPDATE='0000-00-00' order by CURRENTDATE DESC,CURRENTTIME DESC limit 5");
                  while($row1=mysql_fetch_array($query1))
                  {
                      $tabledata.= "
                        <tr>
                                  <td>".$count."</td>
                                  <td>".$row1['CURRENTDATE']." ".$row1['CURRENTTIME']."</td>
                                  <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['NAME'])."'></td>
                                  <td>".$row1['CONTACTNO']."</td>
                                  <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['CITY'])."''></td>
                                    <td>Web Lead</td>
                                      <td><input class='tabletextfiled' type='text' value='".ucfirst($row1['PAGENAME'])."''></td>
                                    <td><input type='button' onclick='getdata2(".$row1['SR_NO'].")' value='Edit' class='editbtnweb' ></td>
                        </tr> ";
                    $count++;
                  }
            return $tabledata;
    }

            function displayprojects()
            {

              $query1=mysql_query("select * from project");
              while($row1=mysql_fetch_array($query1))
              {
                  $projectdata.= "
                  <option value='".$row1['SRNO']."'>".$row1['PROJECTNAME']."</option>";
              }
            if($projectdata=="")
            {
            echo "<option>No Project Available</option>";
            }
            else {
              # code...
            return $projectdata;
            }

            }
            function displaybroker()
            {

            }

}
    ?>
