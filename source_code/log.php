<?php
$email=$_POST["email"];
$pass=$_POST["pass"];
include_once("connect.php");


$sql="SELECT * FROM user_data WHERE email = '".$email."' and password = '".$pass."'";

$result = mysql_query($sql);


$login_check = mysql_num_rows($result);
if($login_check == 1){ 
echo "1";
$result = mysql_fetch_array($result);
session_start();
$_SESSION['email']=$email;
$_SESSION['firstname']=$result['firstname'];
$_SESSION['lastname']=$result['lastname'];
$_SESSION['gender']=$result['gender'];
$_SESSION['birthday']=$result['birthday'];
$_SESSION['dp']=$result['dp'];

}
elseif ($login_check == 0){
echo "0";

}
else{

}
mysql_close($con);
?>