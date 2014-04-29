<?php
include_once("connect.php");
session_start();
if(isset($_SESSION['email'])){

}
else{
header("Location: register.php");
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/style1.css" />
</head>
<body>
<div class="ptop">
<b><i><div class="pq2"><a href="profile.php">P R </a></div></i></b>
<b><i><div class="pq1"><a href="profile.php">K K </a></div></i></b>


</div>
<div class="chngdp">
<form name="form" action="upload_file.php" onsubmit="return validform()" method="post" enctype="multipart/form-data">
<input type="file" name="file" id="file" /> 
<input type="submit" name="submit" value="Submit" /><input type="reset" value="Reset">
</form>
</div><a href="logu.php" ><button type="button" class="logout"  value="login"  ><b>logout</b></button></a>

</body>
</html>