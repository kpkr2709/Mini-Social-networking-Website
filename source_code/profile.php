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

<style type="text/css">

.red, #error,#errorlog,#ceerror,#cperror,#eerror,#perror,#serror,#doberror,#ferror,#lerror{
color:red;
font-size:13px;
}
#logname{
color:white;
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
<div class="ptop">
<b><i><div class="pq2"><a href="">P R </a></div></i></b>
<b><i><div class="pq1"><a href="">K K </a></div></i></b>


</div>
<table id="pro" >

  <tr>
    <td rowspan="2">
	<p id="pd1">
<?php
//$sql="SELECT * FROM user_data WHERE email = '".$_SESSION['email']."'";
//$result = mysql_query($sql);
//$row = mysql_fetch_array($result);

echo "<a href='chngdp.php'><img align='left' id='pp' src='" . $_SESSION['dp'] ."'></a>";

echo "<table><tr><td><b class='pd1l'>Name</b><td/><td>" . $_SESSION['firstname'] ." ". $_SESSION['lastname'] ."</td></tr>";
echo "<tr><td><b class='pd1l'>Email</b><td/><td>" . $_SESSION['email'] ."</td></tr>";
echo "<tr><td><b class='pd1l'>DOB</b><td/><td>" . $_SESSION['birthday'] ."</td></tr>";
if($_SESSION['gender']=='m')
$sex='Male';
else
$sex='Female';
echo "<tr><td><b class='pd1l'>Sex</b><td/><td>" . $sex ."</td></tr></table>";
?>
</p>
</td>
    <td>
<a href='msg.php'><button type='button' class='friend' ><b>messages</b></button></a>
    </td>
  </tr>
  <tr>

    <td rowspan="4" >
	<?php
$sql=mysql_query("SELECT * FROM friends WHERE ( id1='$_SESSION[email]' or id2='$_SESSION[email]' ) and relation='y' ");
$login_check = mysql_num_rows($sql);
echo "<a ><button type='button' class='friend' ><b>" . $login_check . " Friends</b></button></a>";
?>
<div style="overflow-y:auto;height:400px;">
<?php
echo "<table class='fnd'>";
$sql=mysql_query("SELECT * FROM friends INNER JOIN user_data on  friends.id1='$_SESSION[email]'  and friends.relation='y' and user_data.email=friends.id2 ");
while($row = mysql_fetch_array($sql))
  {
  echo "<br><tr ><td rowspan='2' ><a class='sear'  href=user.php?email=".$row['id2']."><img class='simg' src='" .$row['dp'] ."'></a></td>
		<td><a class='sear' style='color:#333366;' href=user.php?email=".$row['id2'].">".$row['id2']."</a></td></tr><tr><td><a class='sear' style='color:#9999FF;' href=message.php?email=".$row['id2'].">send message</a></td></td>";
  }
  
$sql=mysql_query("SELECT * FROM friends INNER JOIN user_data on  friends.id2='$_SESSION[email]'  and friends.relation='y' and user_data.email=friends.id1 ");
while($row = mysql_fetch_array($sql))
  {
  echo "<br><tr><td rowspan='2'><a class='sear' href=user.php?email=".$row['id1']."><img class='simg' src='" .$row['dp'] ."'></a></td>
		<td><a class='sear' style='color:#333366;' href=user.php?email=".$row['id1'].">".$row['id1']."</a></td></tr><tr><td><a class='sear' style='color:#9999FF;' href=message.php?email=".$row['id2'].">send message</a></td></tr>";
  }
  echo "</table>";
  ?></div>	</td>
  </tr>
    <tr>
    <td rowspan="3"></td>
    
  </tr>
  <tr>

  </tr>
    <tr>

    
  </tr>

</table>
<input type="text" id="search" onkeyup="showHint(this.value)" />
<p> <span id="txtHint"></span></p> 
<div class="pro1">

</div>
<a href="wall.php" ><button type="button" class="wall" ><b>wall</b></button></a>
<a href="logu.php" ><button type="button" class="logout"  value="login"  ><b>logout</b></button></a>
</body>
</html>