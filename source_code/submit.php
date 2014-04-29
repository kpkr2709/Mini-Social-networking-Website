<?php
$email=$_POST["email"];
$pass=$_POST["pass"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$sex=$_POST["sex"];
$dob=$_POST["dob"];
include_once("connect.php");




$sql="SELECT * FROM user_data WHERE email = '".$email."'";

$result = mysql_query($sql);


$login_check = mysql_num_rows($result);
if($login_check > 0){ 
echo "<c style='color:green;'>". $email ."</c> Already in use.";

}
else{
mysql_query("INSERT INTO user_data (username,firstname,lastname,gender,birthday,email,password) values ('$fname','$fname','$lname','m','$dob','$email','$pass')");
echo "1";


	
	session_start();
$_SESSION['email']=$email;
$_SESSION['firstname']=$fname;
$_SESSION['lastname']=$lname;
$_SESSION['gender']=$sex;
$_SESSION['birthday']=$dob;
$_SESSION['dp']='images/def.jpg';
	 


}
mysql_close($con);
?>