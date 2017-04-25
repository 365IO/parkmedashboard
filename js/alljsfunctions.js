var idformiss;
var idforweb;

function search(valu) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      if(xhttp.responseText!="noleads")
      {
           document.getElementById("tabledv").innerHTML ='<table  cellspacing="0"><thead><tr class="heading"><th>Sr. No</th><th>Date / Time</th><th>Contact No.</th><th>Edit</th></tr></thead></table><div class="datatable" id="datatbl"><table cellspacing="1"><tbody>'+xhttp.responseText+'</tbody></table>';
      }
else {
   document.getElementById("tabledv").innerHTML="<br><br><br><center>No Record Found...</center>";
}
    }
  };
  xhttp.open("GET", "getdata.php?val="+valu, true);
  xhttp.send();
}


function searchbydate() {
var sdate=document.getElementById('from').value;
var edate=document.getElementById('to').value;
if(sdate=="" || edate=="")
{
alert("Please select date ");
return false;
}
else {


  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      if(xhttp.responseText!="noleads")
      {
           document.getElementById("tabledv").innerHTML ='<table  cellspacing="0"><thead><tr class="heading"><th>Sr. No</th><th>Date / Time</th><th>Contact No.</th><th>Edit</th></tr></thead></table><div class="datatable" id="datatbl"><table cellspacing="1"><tbody>'+xhttp.responseText+'</tbody></table>';
      }
else {
   document.getElementById("tabledv").innerHTML="<br><br><br><center>No Record Found...</center>";
}
    }
  };
  xhttp.open("GET", "getdata.php?from="+sdate+"&to="+edate, true);
  xhttp.send();
}
}


function searchfollowup(valu) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      if(xhttp.responseText!="noleads")
      {

           document.getElementById("tabledv1").innerHTML ='<table  cellspacing="0"><thead><tr class="heading"><th>Sr. No</th><th>Date / Time</th><th>Name </th><th>Contact No.</th><th>City</th><th>Follow Up Date</th><th>Source</th></tr></thead></table><div class="datatable" id="datatbl"><table cellspacing="1"><tbody>'+xhttp.responseText+'</tbody></table>';
           $(".tablediv5").fadeIn();
            $("#mmb1").css({"background-color":"mediumseagreen","color":"white"});
           $("#mmb2").css({"background-color":"mediumseagreen","color":"white"});
           $("#mmb3").css({"background-color":"mediumseagreen","color":"white"});
           $("#mmb4").css({"background-color":"mediumseagreen","color":"white"});
           $(".tablediv4").fadeOut();
           $(".tablediv3").fadeOut();
           $(".tablediv2").fadeOut();
           $(".tablediv").fadeOut();
  }
else {
   document.getElementById("tabledv1").innerHTML="<br><br><br><center>No Record Found...</center>";
}
    }
  };
  xhttp.open("GET", "getdatafollowup.php?val="+valu, true);
  xhttp.send();
}
function searchbydatefollowup() {
var sdate=document.getElementById('from').value;
var edate=document.getElementById('to').value;
if(sdate=="" || edate=="")
{
alert("Please select date ");
return false;
}
else {


  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      if(xhttp.responseText!="noleads")
      {
           document.getElementById("tabledv1").innerHTML ='<table  cellspacing="0"><thead><tr class="heading"><th>Sr. No</th><th>Date / Time</th><th>Name </th><th>Contact No.</th><th>City</th><th>Follow Up Date</th><th>Source</th></tr></thead></table><div class="datatable" id="datatbl"><table cellspacing="1"><tbody>'+xhttp.responseText+'</tbody></table>';
           $(".tablediv5").fadeIn();
           $(".tablediv4").fadeOut();
           $(".tablediv3").fadeOut();
           $(".tablediv2").fadeOut();
           $(".tablediv").fadeOut();

           $("#mmb1").css({"background-color":"mediumseagreen","color":"white"});
          $("#mmb2").css({"background-color":"mediumseagreen","color":"white"});
          $("#mmb3").css({"background-color":"mediumseagreen","color":"white"});
          $("#mmb4").css({"background-color":"mediumseagreen","color":"white"});
  }
else {
   document.getElementById("tabledv1").innerHTML="<br><br><br><center>No Record Found...</center>";
}
    }
  };
  xhttp.open("GET", "getdatafollowup.php?from="+sdate+"&to="+edate, true);
  xhttp.send();
}
}



function searchsitelead(valu) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      if(xhttp.responseText!="noleads")
      {
           document.getElementById("tabledv").innerHTML ='<table  cellspacing="0"><thead><tr class="heading"><th>Sr. No</th><th>Date / Time</th><th>Name </th><th>Contact No.</th><th>City</th><th>Project</th><th>Edit</th></tr></thead></table><div class="datatable" id="datatbl"><table cellspacing="1"><tbody>'+xhttp.responseText+'</tbody></table>';
      }
else {
   document.getElementById("tabledv").innerHTML="<br><br><br><center>No Record Found...</center>";
}
    }
  };
  xhttp.open("GET", "getdataforsitelead.php?val="+valu, true);
  xhttp.send();
}



function searchbydatesitelead() {
var sdate=document.getElementById('from').value;
var edate=document.getElementById('to').value;

if(sdate=="" || edate=="")
{
alert("Please select date ");
return false;
}
else {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {

      if(xhttp.responseText!="noleads")
      {
           document.getElementById("tabledv").innerHTML ='<table  cellspacing="0"><thead><tr class="heading"><th>Sr. No</th><th>Date / Time</th><th>Name </th><th>Contact No.</th><th>City</th><th>Project</th><th>Edit</th></tr></thead></table><div class="datatable" id="datatbl"><table cellspacing="1"><tbody>'+xhttp.responseText+'</tbody></table>';
           //document.getElementById("tabledv").innerHTML ='';
      }
else {
   document.getElementById("tabledv").innerHTML="<br><br><br><center>No Record Found...</center>";
}

  };
  xhttp.open("GET", "getdataforsitelead.php?from="+sdate+"&to="+edate, true);
  xhttp.send();
}
}






function userpasscheck()
{
    var user=document.getElementById("username").value;
    var pass=document.getElementById("password").value;
    var bu = new XMLHttpRequest();
    bu.onreadystatechange = function () {
        document.getElementById("ans").innerHTML = bu.responseText;
    }
    bu.open("GET", "loginpasscheck.php?user=" + user + "&pass=" + pass, true);
    bu.send();

    if(document.getElementById("ans").innerHTML=='*Invalid Password')
    {
        alert("Enter Correct Password");
    }
    else
    {
        //document.getElementById("subb").disabled = false;
    }

}



function accountpassup()
{
    var newpass=document.getElementById("pass").value;
    var repass=document.getElementById("repass").value;
    if(newpass!=repass)
    {
        alert("*Password Not Match");
        return false;
    }
}


function getdata(val)
{
            idformiss=val;
            var bu = new XMLHttpRequest();
            bu.onreadystatechange = function () {
            var obj=JSON.parse(bu.responseText);
            document.getElementById("name").value = obj[0].Name;
            document.getElementById("city").value = obj[0].City;
            document.getElementById("contactno").value = obj[0].Contactno;
            document.getElementById("requirement").value = obj[0].Requ;
            document.getElementById("datepick").value = obj[0].Followup;
            $(".blackdivformisscall").fadeIn();
            $(".datadivformisscall").fadeIn();
        }
        bu.open("GET", "editpage.php?id="+ val+"&type=misscall", true);
        bu.send();
}


function getdata2(val)
{
            idformiss=val;
            var bu = new XMLHttpRequest();
            bu.onreadystatechange = function () {
            var obj=JSON.parse(bu.responseText);
            document.getElementById("webname").value = obj[0].Name;
            document.getElementById("webcity").value = obj[0].City;
            document.getElementById("webcontactno").value = obj[0].Contactno;
            //document.getElementById("websubject").value = obj[0].Subject;
            document.getElementById("datepick2").value = obj[0].Followup;
            document.getElementById("webemail").value = obj[0].Email;
            document.getElementById("webmsg").value = obj[0].Msg;
            document.getElementById("websource").value = obj[0].Source;
            document.getElementById("webpagename").value = obj[0].Pagename;
            //document.getElementById("webproject").value = obj[0].Top;
            $(".blackdivformisscall").fadeIn();
            $(".datadivforwebleads").fadeIn();
        }
        bu.open("GET", "editpage.php?id="+val+"&type=webleads", true);
        bu.send();
}

function putdata()
{
            var name=document.getElementById("name").value;
            var city=document.getElementById("city").value;
            var contactno=document.getElementById("contactno").value;
            var requ=document.getElementById("requirement").value;
            var datepick=document.getElementById("datepick").value;
            var typeofproperty=document.getElementById("typeofproperty").value;
            var project=document.getElementById("projects").value;
            var bu = new XMLHttpRequest();
            bu.onreadystatechange = function () {
            if(bu.responseText=="save")
            {
                    $(".blackdivformisscall").fadeIn();
                    $("#thankyoupopup").fadeIn();
                    $(".datadivformisscall").fadeOut();
            }
              if(bu.responseText=="notsave")
              {
              $(".blackdivformisscall").fadeIn();
              $("#error").fadeIn();
              $(".datadivformisscall").fadeOut();
            }
        }
        bu.open("GET", "putdata.php?id="+ idformiss+"&name="+name+"&city="+city+"&contactno="+contactno+"&requ="+requ+"&datepick="+datepick+"&typeofproperty="+typeofproperty+"&leadtype=misscall"+"&projectname="+project, true);
        bu.send();
}


function putdata2()
{
          var  webname=document.getElementById("webname").value;
          var  webcity=document.getElementById("webcity").value;
          var  webcontactno=document.getElementById("webcontactno").value;
          var webcategory=document.getElementById("webtypeofproperty").value;
          var datepick2=  document.getElementById("datepick2").value;
          var webemail=  document.getElementById("webemail").value;
          var webmsg=  document.getElementById("webmsg").value;
          var websource=  document.getElementById("websource").value;
          var webpagename=  document.getElementById("webpagename").value;
          var webproject=  document.getElementById("webprojects").value;
            var bu = new XMLHttpRequest();
            bu.onreadystatechange = function () {
            if(bu.responseText=="save")
            {
                    $(".blackdivformisscall").fadeIn();
                    $("#thankyoupopup").fadeIn();
                    $(".datadivforwebleads").fadeOut();
            }
              if(bu.responseText=="notsave")
              {
              $(".blackdivformisscall").fadeIn();
              $("#error").fadeIn();
              $(".datadivforwebleads").fadeOut();
            }
        }
        bu.open("GET", "putdata.php?id="+ idformiss+"&webname="+webname+"&webcity="+webcity+"&webcontactno="+webcontactno+"&webcategory="+webcategory+"&datepick2="+datepick2+"&webemail="+webemail+"&webmsg="+webmsg+"&websource="+websource+"&webpagename="+webpagename+"&webproject="+webproject+"&leadtype=web", true);
        bu.send();

}

function project()
{
          var  projectname=document.getElementById("projectname").value;
          var  type=document.getElementById("categotyofproject").value;
          if(projectname=="")
          {
                      alert("Please enter project name");
                      return false;
              }
else {
            var bu = new XMLHttpRequest();
            bu.onreadystatechange = function () {
            if(bu.responseText=="save")
            {
                    $(".blackdivformisscall").fadeIn();
                    $("#thankyoupopup").fadeIn();
            }
              if(bu.responseText=="notsave")
              {
              $(".blackdivformisscall").fadeIn();
              $("#error").fadeIn();

            }
        }
         bu.open("GET", "insertaddprojectdata.php?project="+projectname+"&type="+type, true);
        bu.send();
}
}


function projectaddintopage(val)
{
              var bu = new XMLHttpRequest();
              bu.onreadystatechange = function () {
                document.getElementById('projects').innerHTML=bu.responseText;
              }
            bu.open("GET", "addprojectname.php?type="+val, true);
            bu.send();
}

function projectaddintopage2(val)
{
              var bu = new XMLHttpRequest();
              bu.onreadystatechange = function () {
                document.getElementById('webprojects').innerHTML=bu.responseText;
              }
            bu.open("GET", "addprojectname.php?type="+val, true);
            bu.send();
}

/*
function subproject()
{
          var  projectname=document.getElementById("projectname").value;
          var  subprojectname=document.getElementById("subprojectname").value;
          var  category=document.getElementById("categotyofproject").value;
          if(projectname=="Select Project" || subprojectname=="")
          {
alert("Please enter all required fields");
return false;
}
else {
            var bu = new XMLHttpRequest();
            bu.onreadystatechange = function () {
            if(bu.responseText=="save")
            {
                    $(".blackdivformisscall").fadeIn();
                    $("#thankyoupopup").fadeIn();
            }
              if(bu.responseText=="notsave")
              {
              $(".blackdivformisscall").fadeIn();
              $("#error").fadeIn();

            }
        }
         bu.open("GET", "insertaddsubprojectdata.php?project="+projectname+"&subproject="+subprojectname+"&category="+category, true);
        bu.send();
}
}*/
