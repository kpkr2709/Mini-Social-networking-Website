<?php
	session_start();
	include_once("connect.php");
	$email=$_GET["email"];
	mysql_query("delete from friends where id1='$_SESSION[email]' and id2='$email'");
echo '<button onclick="sfriendr();" type="button" class="friend" ><b >Send Request</b></button>';
?>