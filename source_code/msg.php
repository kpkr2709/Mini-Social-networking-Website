<?php

session_start();
if(isset($_SESSION['email'])){
include_once("connect.php");
}
else{
header("Location: register.php");
}
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

</head>
<body>
<div class="ptop">
<b><i><div class="pq2"><a href="profile.php">P R </a></div></i></b>
<b><i><div class="pq1"><a href="profile.php">K K </a></div></i></b>


</div>
<br>
<table class="owall">

<tr>

<td><p id="staterror" style='color:red;'> </p></td>
<td></td>
</tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<?php
$sql="SELECT * FROM messages WHERE id1 = '$_SESSION[email]' or id2 = '$_SESSION[email]' order by time";
 
$result = mysql_query($sql);




while($row = mysql_fetch_array($result))
  {
  if($row['id1'] == $_SESSION['email']){
  echo "<tr><td style='color:#66CC66;' >send to </td>";
  echo "<td  ><a style='color:#9999FF;' href='user.php?email=" . $row['id2'] ."' style='color:black;'>" . $row['id2'] . "</a></td>";

  echo "<td align='right'><c style='color:red;font-size:10px;'>" . $row['time'] . "</c></td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td></td><td colspan='2' style='color:#aaaaaa;'>" . $row['message'] . "</td>";
echo "</tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
  }
  
  if($row['id2'] == $_SESSION['email']){
  echo "<tr><td style='color:#FF6600;'>received from</td>";
  echo "<td  ><a style='color:#9999FF;' href='user.php?email=" . $row['id1'] ."' style='color:black;'>" . $row['id1'] . "</a></td>";

  echo "<td align='right'><c style='color:red;font-size:10px;'>" . $row['time'] . "</c></td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td></td><td colspan='2' style='color:#aaaaaa;'>" . $row['message'] . "</td>";
echo "</tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
  }
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
 
 <a href="wall.php" ><button type="button" class="wall" ><b>wall</b></button></a>

 <a href="profile.php" ><button type="button" class="profile" ><b>profile</b></button></a>
<a href="logu.php" ><button type="button" class="logout"  value="login"  ><b>logout</b></button></a>
</body>
</html>