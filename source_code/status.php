<?php
$status=$_POST["status"];

include_once("connect.php");
	session_start();







$date=date('Y-m-d H:i:s');

mysql_query("INSERT INTO wall_data (time,status,email) values ('$date','$status','$_SESSION[email]')");
//echo "<a href='user.php?email=" . $_SESSION['email'] . "'>" . $_SESSION['email'] . "</a></td><td><c style='font-size:10px;color:red;'>" . $date. "</c></td>
//</tr><tr><td colspan='3'>" . $status ;


	

	 



mysql_close($con);
?>