<?php
	session_start();
	include_once("connect.php");
	$email=$_GET["email"];
	mysql_query("update friends set relation='y' where id1='$email' and id2='$_SESSION[email]' ");
echo '<button onclick="unfriend();" type="button" class="friend" ><b >UnFriends</b></button>';
?>