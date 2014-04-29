<?php

session_start();
if(isset($_SESSION['email'])){
include_once("connect.php");
}
else{
header("Location: register.php");
}

$sql="SELECT * FROM user_data WHERE email = '".$_SESSION['email']."'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$aa=$row['id']; 
$file=$_FILES["file"]["name"];
$mypath= "users\\" .$_SESSION['email'] . "\\image";
 if (is_dir($mypath)){
 }
 else{
   mkdir($mypath,0777,true);
	}

	
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists( "users/" . $_SESSION['email'] . "/image/" . $_FILES["file"]["name"]))
      {
$_SESSION[dp]="users/" . $_SESSION[email] . "/image/$file";
mysql_query("UPDATE user_data SET dp='$_SESSION[dp]' WHERE email='$_SESSION[email]'");
	  header("Location: register.php");
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],"users/" . $_SESSION['email'] ."/image/". $_FILES["file"]["name"]);
mysql_query("UPDATE user_data SET dp='users/$_SESSION[email]/image/$file' WHERE email='$_SESSION[email]'") ;
$_SESSION[dp]="users/" . $_SESSION[email] . "/image/$file";
mysql_query("UPDATE user_data SET dp='$_SESSION[dp]' WHERE email='$_SESSION[email]'");
header("Location: register.php");
      }
    }
  }
else
  {
  echo "Invalid file";
  }
	  ?>