<?php
include_once("connect.php");
session_start();
if(isset($_SESSION['email'])){
header("Location: profile.php");
}

?>



<html>
<head>

<link rel="stylesheet" type="text/css" href="style/style1.css" />

<style type="text/css">

.red, #error,#errorlog,#ceerror,#cperror,#eerror,#perror,#serror,#doberror,#ferror,#lerror{
color:red;
font-size:13px;
}
#logname{
color:white;
}

</style>

<script type="text/javascript">
 
var time_variable;
 
function getXMLObject() 
{
   var xmlHttp = false;
   try {
     xmlHttp = new ActiveXObject("Msxml2.XMLHTTP")  // For Old Microsoft Browsers
   }
   catch (e) {
     try {
       xmlHttp = new ActiveXObject("Microsoft.XMLHTTP")  // For Microsoft IE 6.0+
     }
     catch (e2) {
       xmlHttp = false   // No Browser accepts the XMLHTTP Object then false
     }
   }
   if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
     xmlHttp = new XMLHttpRequest();        //For Mozilla, Opera Browsers
   }
   return xmlHttp;  // Mandatory Statement returning the ajax object created
}
 
var xmlhttp = new getXMLObject();	//xmlhttp holds the ajax object


function loginform() {

  var getdate = new Date();  //Used to prevent caching during ajax call
  if(xmlhttp) {
  	var email = document.getElementById("logemail");
	var password = document.getElementById("logpass");
	
    xmlhttp.open("POST","log.php",true);

    xmlhttp.onreadystatechange  = handleServerResponse1;
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("email="+logemail.value+"&pass="+logpass.value);
  }
}





function submitform() {

  var getdate = new Date();  //Used to prevent caching during ajax call
  if(xmlhttp) {
  	var email = document.getElementById("email");
	var cemail = document.getElementById("email2");
	var password = document.getElementById("password");
	var cpassword = document.getElementById("password2");
	var fname = document.getElementById("fname");
	var lname = document.getElementById("lname");
	var sex = document.getElementById("sex");
	var day = document.getElementById("day");
	var month = document.getElementById("month");
	var year = document.getElementById("year");
var atpos=email.value.indexOf("@");
var dotpos=email.value.lastIndexOf(".");

if (fname.value.length < 4){
document.getElementById("ferror").innerHTML="Min of 4 characters";
return 0;
}
else{
document.getElementById("ferror").innerHTML="";
}
if (lname.value.length < 4){
document.getElementById("lerror").innerHTML="Min of 4 characters";
return 0;
}
else{
document.getElementById("lerror").innerHTML="";
}


if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.value.length){
document.getElementById("eerror").innerHTML="Email not valid";
return 0;
}
else{
document.getElementById("eerror").innerHTML="";
}

if (email.value != cemail.value){
document.getElementById("ceerror").innerHTML="Conformation email not matched";
return 0;
}
else{
document.getElementById("ceerror").innerHTML="";
}

if (password.value.length < 6){
document.getElementById("perror").innerHTML="Min 6 charecters ";
return 0;
}
else{
document.getElementById("perror").innerHTML="";
}

if (password.value != cpassword.value){
document.getElementById("cperror").innerHTML="Password not matched";
return 0;
}
else{
document.getElementById("cperror").innerHTML="";
}

if (sex.value == "00"){
document.getElementById("serror").innerHTML="Please select";
return 0;
}
else{
document.getElementById("serror").innerHTML="";
}



if (day.value == "00"){
document.getElementById("doberror").innerHTML="Please select";
return 0;
}
else{
document.getElementById("doberror").innerHTML="";
}
if (month.value == "00"){
document.getElementById("doberror").innerHTML="Please select";
return 0;
}
else{
document.getElementById("doberror").innerHTML="";
}
if (year.value == "0000"){
document.getElementById("doberror").innerHTML="Please select";
return 0;
}
else{
document.getElementById("doberror").innerHTML="";
}



    xmlhttp.open("POST","submit.php",true); //calling testing.php using POST method
    xmlhttp.onreadystatechange  = handleServerResponse;
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("email=" + email.value+"&pass=" + password.value+"&fname=" + fname.value+"&lname=" + lname.value+"&sex=" + sex.value+"&dob=" + year.value +":"+ month.value +":"+ day.value);
  }
}












 function handleServerResponse1() {
   if (xmlhttp.readyState == 4) {
   if(xmlhttp.status == 200) {
	 if(xmlhttp.responseText=="1"){
	 
	 
document.getElementById("errorlog").innerHTML="";


     window.location = "profile.php";
	 }
	 else if(xmlhttp.responseText=="0"){
       document.getElementById("errorlog").innerHTML="Invalid username or password"; //Update the HTML Form element 
	   }
	 else {
       document.getElementById("errorlog").innerHTML=xmlhttp.responseText; //Update the HTML Form element 
	   }
	   }
     else {
        alert("Error during AJAX call. Please try again");
     }
   }
}
 
 
 
 
function handleServerResponse() {
   if (xmlhttp.readyState == 4) {
     if(xmlhttp.status == 200) {
	 if(xmlhttp.responseText=="1"){

	 document.getElementById('register').reset();
	 window.location = "profile.php";
	 //document.getElementById("error").innerHTML="<c style='color:green;'>Login To Continue.</c>";
	 }
	 else{
       document.getElementById("error").innerHTML=xmlhttp.responseText; //Update the HTML Form element 
	   }
     }
     else {
        alert("Error during AJAX call. Please try again");
     }
   }
}
</script>

</head>
<body>
<div class="top">
<b><i><div class="q2"><a href="">P R </a></div></i></b>
<b><i><div class="q1"><a href="">K K </a></div></i></b>

</div>
<div class="register">
<table>
<form  name ="register" id="register">

  <tr>
    <td><b>First name: <span class="red">*</span></b></td>
    <td><input type="text" name="fname" id="fname" /></td>
	<td><p id="ferror"></p>
</td>
  </tr>
  <tr>
    <td><b>Last name: <span class="red">*</span></b></td>
    <td><input type="text" name="lname" id="lname"  /></td>
	<td><p id="lerror"></p>
</td>
  </tr>

    <tr>
  <tr>
    <td><b>Email: <span class="red">*</span></b></td>
    <td><input type="text"   name="email" id="email"  /></td>
<td><p id="eerror"></p>
</td>
  </tr>
    <tr>
    <td><b>Conformation Email: <span class="red">*</span></b></td>
    <td><input type="text"   name="email2" id="email2"  /></td>
<td><p id="ceerror"></p>
</td>
  </tr>
    <tr>
    <td><b>Password: <span class="red">*</span></b></td>
    <td><input type="password"   name="password" id="password"/></td>
<td><p id="perror"></p>
</td>
  </tr>
      <tr>
    <td><b>Re-enter Password: <span class="red">*</span></b></td>
    <td><input type="password"   name="password2" id="password2"/></td>
<td><p id="cperror"></p>
</td>
  </tr>
  
  
  <tr>
<td><b>I am: <span class="red">*</span></b></td>
<td colspan="2">
<select name="sex" id="sex"  >
<option value="00" disabled="disabled">sex</option>
<option value="m">Male</option>
<option value="f">Female</option>
</select> 
</td>
<td><p id="serror"></p>
</td>
</tr>
<tr>
<td><b>Birthday: <span class="red">*</span></b></td>
<td colspan="2">
<select name="day" id="day" >
<option value="00" disabled="disabled">date</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select> 

<select name="month" id="month">
<option value="00" disabled="disabled">month</option>
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>

<select name="year" id="year">
<option value="0000" disabled="disabled">year</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
<option value="1909">1909</option>
<option value="1908">1908</option>
<option value="1907">1907</option>
<option value="1906">1906</option>
<option value="1905">1905</option>
<option value="1904">1904</option>
<option value="1903">1903</option>
<option value="1902">1902</option>
<option value="1901">1901</option>
<option value="1900">1900</option>
</select>
</td>
<td><p id="doberror"></p>
</td>

</tr> 
<br>
  <tr>
<tr>
</tr>    
<tr>
</tr>	
  <td></td>
    <td><button type="reset" class="reset"><b>Reset</b></button> &nbsp&nbsp&nbsp&nbsp<button type="button" value="Submit" onclick="submitform();" class="submit"><b>Submit</b></button></td>
      </tr>
<tr><td colspan="3" style="padding-left:50px;padding-top:20px;"><div id="error" name="error"></div></td>
</tr>
</form>

</table>
</div>

<div class="login">
<table>
<form  name ="login">
    <tr>
    <td  id="logname">Email </td>
    <td id="logname">Password </td>

  </tr>
    <tr>
    <td><input type="text"   name="email" id="logemail"  /></td>
    <td><input type="password"   name="password" id="logpass"/></td>
<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<button type="button" class="logon"  value="login" onclick="loginform();" ><b>login</b></button></td>
  </tr>
  <tr><td colspan="3" style="padding-left:50px;padding-top:10px;"><div id="errorlog" name="error"></div></td>
</tr>
</form>
</table>
</div>


</body>
</html>