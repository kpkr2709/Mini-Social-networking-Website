<?php
	session_start();
	include_once("connect.php");
	$email=$_GET["email"];
	mysql_query("INSERT INTO friends(id1,id2,relation) values ('$_SESSION[email]','$email','n')");
echo '<button onclick="cfriendr();" type="button" class="friend" ><b >Cancel Request</b></button>';
?>