<?php
include_once("connect.php");
session_start();
if(isset($_SESSION['email'])){

}
else{
header("Location: register.php");
}
?>



<html>
<head>

<link rel="stylesheet" type="text/css" href="style/style1.css" />

<style type="text/css">
#txtHint
{
color:orange;
}
</style>
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
</head>
<body>


<form action=""> 
<input type="text" id="txt1" onkeyup="showHint(this.value)" />
</form>
<p> <span id="txtHint"></span></p> 

</body>
</html>

