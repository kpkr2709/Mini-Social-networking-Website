
<html>
<body>

<?php
include_once("connect.php");
?>

<!----<?php

if (mysql_query("CREATE DATABASE kpkrdb",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }
 ?>---->

<?php
 $profile = "CREATE TABLE user_data (
		 		
				 username varchar(255) NOT NULL,
		 		 firstname varchar(255) NOT NULL,
		 		 lastname varchar(255) NOT NULL,
				 gender enum('m','f') NOT NULL default 'm',
				 birthday date NOT NULL default '0000-00-00',
		 		 email varchar(255) NOT NULL,
		 		 password varchar(255) NOT NULL,
				 dp varchar(255) DEFAULT 'images/def.jpg', 
		 		 PRIMARY KEY (email),
		 		 ) "; 

 $wall = "CREATE TABLE wall_data (
				 time datetime NOT NULL default '0000-00-00 00:00:00',
		 		 email varchar(255) NOT NULL,
				 status varchar(10000) NOT NULL,
		 		 PRIMARY KEY (email,time),
		 		 ) "; 
				 
 $wall = "CREATE TABLE messages (
 id1 varchar(255) NOT NULL,
 id2 varchar(255) NOT NULL,
				 time datetime NOT NULL default '0000-00-00 00:00:00',
		 		 
				 message varchar(10000) NOT NULL,
		 		 PRIMARY KEY (id1,id2,time),
		 		 ) "; 
				 
				 
?>
<?php
				 
mysql_query($profile,$con);
mysql_close($con); 
?>

 
 
 
</body>
</html>