<script>



function chkval(data,type){
  var id=data;
  var field=document.getElementById(id).value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
  if (type=="name") {
    document.getElementById('a1').innerHTML =xhttp.responseText;
  }
  if (type=="mobile") {
    document.getElementById('a2').innerHTML =xhttp.responseText;
  }
  if (type=="email") {
    document.getElementById('a3').innerHTML =xhttp.responseText;
  }
  if (type=="business") {
    document.getElementById('a4').innerHTML =xhttp.responseText;
  }
  if (type=="compony") {
    document.getElementById('a5').innerHTML =xhttp.responseText;
  }
  if (type=="password") {
    document.getElementById('a6').innerHTML =xhttp.responseText;
  }
  };
  xhttp.open("GET", "val.php?data="+field+"&type="+type, true);
  xhttp.send();
}
function chkpass(){
  var pass=document.getElementById('registration_user_password').value;
  var repass=document.getElementById('registration_user_re_password').value;
  var name=document.getElementById('registration_name').value;
  var name1=document.getElementById('a1').innerHTML;
  var mob=document.getElementById('registration_mobile').value;
  var mob1=document.getElementById('a2').innerHTML;
  var email=document.getElementById('registration_email').value;
  var email1=document.getElementById('a3').innerHTML;
  var busn=document.getElementById('registration_company_business').value;
  var busn1=document.getElementById('a4').innerHTML;
  var com=document.getElementById('registration_company_business').value;
  var com1=document.getElementById('a5').innerHTML;
  var pass1=document.getElementById('a6').innerHTML;
  if(name!="" && mob!=""&& email!=""&& busn!=""&& com!=""&& pass!="")
  {
    if(name1=="" && mob1==""&& email1==""&& busn1==""&& com1==""&& pass1==""){
      return true;
    }
    else {
      return false;
    }
  }
  else{
    alert("Please enter all fields");
    return false;
  }
  if(pass!=repass)
  {
    alert("Enter correct password..!");
    return false;
  }
}


</script>
