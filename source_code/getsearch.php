<?php
include_once("connect.php");
$q=$_GET["q"];
session_start();
$sql=mysql_query("SELECT * FROM user_data WHERE  email LIKE '$q%' ");
$hint="";
while($result=mysql_fetch_array($sql)){
if($result['email']!=$_SESSION['email']){
      if ($hint=="")
        {
        $hint="<br><tr><td rowspan='2'><a class='sear' href=user.php?email=".$result['email']."><img class='simg' src='" .$result['dp'] ."'></a></td>
		<td><a class='sear' style='color:#333366;font-size:11px;'  href=user.php?email=".$result['email'].">".$result['email']."</a></td></tr><tr><td><a class='sear' style='color:#9999FF;font-size:11px;' href=message.php?email=".$result['email'].">send message</a></td></tr>";
        }
      else
        {
        $hint=$hint."   <tr><td rowspan='2'><a class='sear' href=user.php?email=".$result['email']."><img class='simg' src='" .$result['dp'] ."'></a></td>
		<td><a class='sear' style='color:#333366;font-size:11px;' href=user.php?email=".$result['email'].">".$result['email']."</a></td></tr><tr><td><a class='sear' style='color:#9999FF;font-size:11px;' href=message.php?email=".$result['email'].">send message</a></td></tr>";
        }
		}
}








// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint == "")
  {
  $response="";
  }
else
  {
  $response=$hint;
  }

//output the response
echo "<table>" . $response . "</table>";
?>
