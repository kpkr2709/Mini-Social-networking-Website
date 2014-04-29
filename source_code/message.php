<?php

session_start();
if(isset($_SESSION['email'])){
include_once("connect.php");
}
else{
header("Location: register.php");
}
$email=$_GET['email'];

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style/style1.css" />
<script type="text/javascript">
function showHint(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getsearch.php?q="+str,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
 
var time_variable;
 
function getXMLObject() 
{
   var xmlHttp = false;
   try {
     xmlHttp = new ActiveXObject("Msxml2.XMLHTTP")  // For Old Microsoft Browsers
   }
   catch (e) {
     try {
       xmlHttp = new ActiveXObject("Microsoft.XMLHTTP")  // For Microsoft IE 6.0+
     }
     catch (e2) {
       xmlHttp = false   // No Browser accepts the XMLHTTP Object then false
     }
   }
   if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
     xmlHttp = new XMLHttpRequest();        //For Mozilla, Opera Browsers
   }
   return xmlHttp;  // Mandatory Statement returning the ajax object created
}
 
var xmlhttp = new getXMLObject();	//xmlhttp holds the ajax object


function sendstatus() {
  var getdate = new Date();  //Used to prevent caching during ajax call
  if(xmlhttp) {
	var status = document.getElementById("statustxt");

	if(status.value.length < 1){document.getElementById("staterror").innerHTML="Minimum of a charecter to post a status.";return 0;}
    xmlhttp.open("POST","msgsub.php",true);
    xmlhttp.onreadystatechange  = handleServerResponse;
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("email="+"<?php echo $email; ?>"+"&message="+status.value);
  }
}

function handleServerResponse() {
   if (xmlhttp.readyState == 4) {
     if(xmlhttp.status == 200) {
	  document.getElementById('statustxt').innerHTML="";
	  window.location = "message.php?email="+"<?php echo $email; ?>";
       //document.getElementById("statu").innerHTML=document.getElementById("statu").innerHTML + xmlhttp.responseText; //Update the HTML Form element 
     }
     else {
        alert("Error during AJAX call. Please try again");
     }
   }
}
</script>
</head>
<body>
<div class="ptop">
<b><i><div class="pq2"><a href="profile.php">P R </a></div></i></b>
<b><i><div class="pq1"><a href="profile.php">K K </a></div></i></b>


</div>
<br>
<table class="owall">
<tr valign="bottom">
<td colspan='2'><textarea id="statustxt" rows="7" cols="70" name="status"></textarea></td>
 <td><button type="button" value="Submit" onclick="sendstatus();" class="submit"><b>Submit</b></button></td>
  </tr>
<tr>

<td><p id="staterror" style='color:red;'> </p></td>
<td></td>
</tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<?php
$sql="SELECT * FROM messages WHERE (id1 = '$_SESSION[email]' and id2='$email' ) or (id2 = '$_SESSION[email]' and id1='$email') order by time";

$result = mysql_query($sql);




while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td ><a href='user.php?email=" . $row['id1'] ."' style='color:black;'>" . $row['id1'] . "</a></td>";

  echo "<td align='right'><c style='color:red;font-size:10px;'>" . $row['time'] . "</c></td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td colspan='2' style='color:#aaaaaa;'>" . $row['message'] . "</td>";
echo "</tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
  }
  
  
  
?>
<tr>
<td >  
<div id="statu"></div>
</td>
</tr>
<tr></tr><tr></tr><tr></tr><tr></tr>
 </table>
 
 <input type="text" id="search" onkeyup="showHint(this.value)" />
<p> <span id="txtHint"></span></p> 
 
 <a href="profile.php" ><button type="button" class="profile" ><b>profile</b></button></a>

<a href="wall.php" ><button type="button" class="wall" ><b>wall</b></button></a>

<a href="logu.php" ><button type="button" class="logout"  value="login"  ><b>logout</b></button></a>
</body>
</html>