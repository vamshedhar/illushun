<?php
include('dbconnect.php');
include('fun.php');
session_start();
if(isset($_SESSION['username']))
{
	$movearray = check($_SESSION['username']);
	header('Location:nick.php');


}
$invalid = 0;
$invalid2 = 0;
if(isset($_POST['login']))
{
	if($_POST['uname'] == '' || $_POST['pswd'] == '')
	{
		$invalid = 1;
		$msg = "Plz fill all the details!!!";
	}
	else
	{
	$uname = filter($_POST['uname']);
	$password = filter($_POST['pswd']);
	$unameh = hasher($uname);
	$passwordh = hasher($password);
	
	
	$checkarray = check($unameh);
	if(!$checkarray)
	{
		$invalid = 1;
		$msg = "User not Registered!!!";
	}
	else
	{
	if($checkarray['passhash'] == $passwordh)
	{
		session_start();
		$_SESSION['username'] = $unameh;
	 if($checkarray['nick'] == NULL)
	 {
		 header("Location:nick.php");
	 }
	 else
	 {
		 $uid = uid();
		 setcookie("user",$uid,time()+24*3600);
		 $ip = $_SERVER['REMOTE_ADDR'];
		 mysql_query("UPDATE use_reco SET uid='$uid', ip='$ip' WHERE emailhash='$_SESSION[username]'");
		 $lvl = $checkarray['lvl'];
		 header("Location:level".$lvl.".php");
		 
	 }
	}
	else
	{ 
		$invalid = 1;
		$msg="Invalid Login Details!!";
			
	}
	}
	}
}




if(isset($_POST['signup']))
{
	$name = filter($_POST['Name']);
	$email = filter($_POST['Email']);
	$pass = filter($_POST['Password']);
	$cpass = filter($_POST['RePassword']); 
	$phno = filter($_POST['PhoneNo']);
	$clg = filter($_POST['College']);
	$emailh = hasher($email);
	$passh = hasher($pass);
	if($pass != $cpass)
	{
		$invalid2 = 1;
		$msg2 = "Passwords do not Match!!!";
			}
	else
	{
		
	$insert = mysql_query("INSERT INTO use_reco SET name='$name', email='$email', phno=$phno, college='$clg', emailhash ='$emailh', passhash = '$passh'");
	
	if(mysql_error() == "Duplicate entry '$email' for key 'email'")
	{
		$new = mysql_query("SELECT * FROM use_reco WHERE emailhash='$emailh'");
		$newarray = mysql_fetch_array($new);
		$clean2 = hasher("neyamma");
		
		if($newarray['passhash'] == $clean2)
		{
			$nul = NULL;
			mysql_query("UPDATE use_reco SET name='$name', email='$email', phno=$phno, college='$clg', emailhash ='$emailh', passhash = '$passh', nick='$nul' WHERE emailhash='$emailh'");
			
			$invalid2 = 1;
		$msg2 = "Registration Successfull!! Start Playing!!";
			
			}
		else
		{
		$invalid2 = 1;
		$msg2 = "User already Registered with this EmailId";
		}
	}
	else
	{
		$invalid2 = 1;
		$msg2 = "Registration Successfull!! Start Playing!!";
		
	}
	}
}









?>










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CrystalClear'12</title>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>
<link href="main.css" type="text/css" rel="stylesheet" />
<body>
<form action="index.php" method="post">
<div id="login">
<table>
<tr><td colspan="2" align="center" id="log">Login</td></tr>
<tr><td colspan="2" align="center" id="dash">//////////////////////////////////////////////////////////////////////////////////////////////////////////////</td></tr>
<tr>
<td>Email :</td><td><input type="text" name="uname" /></td><tr>
<tr><td>Password :</td><td><input type="password" name="pswd" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="login" value=" Login " /></td></tr>
<tr>
<td colspan="2" align="center" id="error"><?php if($invalid) echo $msg; ?>
</td>
</tr>
</table>

</div>
<div id="prizes" align="center">
Prizes worth 10k to be WON!!!<br />
Presented By
</div>
<div id="register">
<table>
<tr><td colspan="2" width="10"></td></tr>
<tr><td colspan="2" align="center" id="reg">New User?? Register Here!!</td></tr>
<tr><td colspan="2" align="center" id="dash">//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////</td></tr>

<tr><td>Name :</td><td><input name="Name" type="text" id="Name" /></td></tr>
<tr><td>Email :</td><td><input name="Email" type="text" id="Email" /></td></tr>
<tr><td>Password :</td><td><input name="Password" type="password" id="Password" /></td></tr>
<tr><td>Confirm Password :</td><td><input name="RePassword" type="password" id="Re-Password" /></td></tr>

<tr><td>Phone No. :</td><td><input name="PhoneNo" type="text" id="Phone No." /></td></tr>
<tr><td>College :</td><td><input name="College" type="text" id="College" /></td></tr>
<tr><td colspan="2" align="center"><input name="signup" type="submit" onclick="MM_validateForm('Name','','R','Email','','RisEmail','Password','','R','Re-Password','','R','Phone No.','','RisNum','College','','R');return document.MM_returnValue" value="Register" /></td></tr>
<tr>
<td colspan="2" align="center" id="error"><?php if($invalid2) echo $msg2; ?>
</td>
</tr>
</table>
</div>
</form>
<div id="nimb">
<a href="http://www.nimbuzz.com/en/" target="_blank">
<img src="images/nimbuzzsmall.png" /></a>
</div>
</body>
</html>