<?php

session_start();
if(isset($_SESSION['email'])){
include_once("connect.php");
}
else{
header("Location: register.php");
}
$email=$_GET["email"];
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


function cfriendr()
{
//document.getElementById("relation").innerHTML="cancelling";
var xmlhttp;
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
    document.getElementById("relation").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","cfriendr.php?email="+ "<?php echo $email; ?>",true);
xmlhttp.send();
}



function sfriendr()
{
//document.getElementById("relation").innerHTML="sending";
var xmlhttp;
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
    document.getElementById("relation").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","sfriendr.php?email=" + "<?php echo $email; ?>",true);
xmlhttp.send();

}


function confriendr()
{
//document.getElementById("relation").innerHTML="sending";
var xmlhttp;
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
    document.getElementById("relation").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","confriendr.php?email=" + "<?php echo $email; ?>",true);
xmlhttp.send();

}



function unfriend()
{
//document.getElementById("relation").innerHTML="sending";
var xmlhttp;
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
    document.getElementById("relation").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","unfriend.php?email=" + "<?php echo $email; ?>",true);
xmlhttp.send();

}



</script>
</head>
<body>
<div class="ptop">
<b><i><div class="pq2"><a href="profile.php">P R </a></div></i></b>
<b><i><div class="pq1"><a href="profile.php">K K </a></div></i></b>


</div>
<table id="pro" >

  <tr>
    <td rowspan="2">
	<p id="pd1">
<?php


$sql=mysql_query("SELECT * FROM user_data WHERE email ='$email'");
$row = mysql_fetch_array($sql);
if($_SESSION['email']==$email){echo "<a href='chngdp.php'><img align='left' id='pp' src='" . $_SESSION['dp'] ."'></a>";}
else{echo "<img align='left' id='pp' src='" . $row['dp'] ."'>";}

echo "<table><tr><td><b class='pd1l'>Name</b><td/><td>" . $row['firstname'] ." ". $row['lastname'] ."</td></tr>";
echo "<tr><td><b class='pd1l' >Email</b><td/><td><cid='uemail'>" . $row['email'] ."</c></td></tr>";
echo "<tr><td><b class='pd1l'>DOB</b><td/><td>" . $row['birthday'] ."</td></tr>";
if($row['gender']=='m')
$sex='Male';
else
$sex='Female';
echo "<tr><td><b class='pd1l'>Sex</b><td/><td>" . $sex ."</td></tr></table>";
?>
</p>
</td>
    <td>
	<?php
	if($_SESSION['email']!=$email){
	$count=0;

$sql=mysql_query("SELECT relation FROM friends WHERE id1='$email' and id2='$_SESSION[email]' ");
$login_check = mysql_num_rows($sql);
if($login_check > 0){ 
$result=mysql_fetch_array($sql);
if($result['relation']=='n'){
echo '<a id="relation"><button onclick="confriendr();" type="button" class="friend" ><b >Confirm Friend</b></button></a>';
}
else{
echo '<a id="relation"><button onclick="unfriend();" type="button" class="friend" ><b >UnFriend</b></button></a>';
}
$count=1;
}

$sql=mysql_query("SELECT relation FROM friends WHERE id1='$_SESSION[email]' and id2='$email' ");
$login_check = mysql_num_rows($sql);
if($login_check > 0){ 
$result=mysql_fetch_array($sql);
if($result['relation']=='n'){
echo '<a id="relation"><button onclick="cfriendr();" type="button" class="friend" ><b >Cancel Request</b></button></a>';
}
else{
echo '<a id="relation"><button onclick="unfriend();" type="button" class="friend" ><b >UnFriend</b></button></a>';
}
$count=1;
}

if($count==0){
echo '<a id="relation"><button onclick="sfriendr();" type="button" class="friend" ><b >Send Request</b></button></a>';
}

}
else{
echo "<a href='msg.php'><button type='button' class='friend' ><b>messages</b></button></a>";
}
?>
    </td>

  </tr>
  
  
  <?php
  
  if($_SESSION['email']==$email){
 echo  "<td rowspan='4' >";
	
$sql=mysql_query("SELECT * FROM friends WHERE ( id1='$_SESSION[email]' or id2='$_SESSION[email]' ) and relation='y' ");
$login_check = mysql_num_rows($sql);
echo "<a ><button type='button' class='friend' ><b>" . $login_check . " Friends</b></button></a>";

echo '<div style="overflow-y:auto;height:400px;">';

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
  echo "</table></div></td>";
  
 echo '</tr>
    <tr>
    <td rowspan="3"></td>
  </tr>

    <tr>
  </tr>
</table>';
  }
  
  
 
 
 else{
echo '<tr><td><a href="message.php?email=' . $email . '" id="relation"><button type="button" class="friend" ><b >Send message</b></button></a></td></tr>';

echo '</table>


<table class="ustat">

<tr>
</tr>';



$sql="SELECT * FROM wall_data WHERE email = '".$email."'";

$result = mysql_query($sql);




while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td ><a  href='user.php?email=" .$row['email']."' style='color:111111;'>" . $row['email'] . "</a></td>";

  echo "<td align='right'><c style='color:red;font-size:10px;'>" . $row['time'] . "</c></td>";
  echo "</tr>";
  
  echo "<tr>";
  echo "<td colspan='2' style='color:#aaaaaa;'>" . $row['status'] . "</td>";
echo "</tr>";
echo "<tr></tr>";
echo "<tr></tr>";
echo "<tr></tr>";
echo "<tr></tr>";
  }
  
  }
  
?>
 </table>




<input type="text" id="search" onkeyup="showHint(this.value)" />
<p> <span id="txtHint"></span></p> 
<div class="pro1">
</div>
<a href="profile.php" ><button type="button" class="profile" ><b>profile</b></button></a>
<a href="wall.php" ><button type="button" class="wall" ><b>wall</b></button></a>
<a href="logu.php" ><button type="button" class="logout"  value="login"  ><b>logout</b></button></a>
</body>
</html>