<?php
$email=$_POST["email"];
$message=$_POST["message"];

include_once("connect.php");
	session_start();







$date=date('Y-m-d H:i:s');

mysql_query("INSERT INTO messages (id1,id2,time,message) values ('$_SESSION[email]','$email','$date','$message')");
//echo "<a href='user.php?email=" . $_SESSION['email'] . "'>" . $_SESSION['email'] . "</a></td><td><c style='font-size:10px;color:red;'>" . $date. "</c></td>
//</tr><tr><td colspan='3'>" . $status ;


	

	 



mysql_close($con);
?>