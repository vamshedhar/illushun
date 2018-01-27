<?php 
session_start(); 
include("functions.php");
include("connect.php");
$invalid =NULL;
$has_nick=0;
$msg=NULL;
if(isset($_POST['email']) && isset($_POST['password']))
{

	$email=clean($_POST['email']);
	$password=$_POST['password'];
	
	if($email=='' || $password =='' )
	{
	$invalid=1;
	$msg="Fill all the details";
	
	}
	
	$password=md5($password.'iloveyou');

	mysql_select_db("cognizan_main",$con);
	$sql="SELECT * From users where email='$email' AND pass= '$password'";
	$result = mysql_query($sql);
	if(!mysql_num_rows($result))
	{
		$invalid = 1;
		$msg="Invalid credentials";
		
	}
	
	
	if($row = mysql_fetch_array($result))
	{
			if($row['verified']!=1)
			{
			$invalid=1;
			$msg="Unverified user. Plz check mail and verify yourself";
			}
			else
			{
			$email=$row['email'];
			$_SESSION['email']=$email;
			
			mysql_select_db("cognizan_illu", $con);
			$sql = "SELECT * from illushun where email='$email'";		
			$result = mysql_query($sql);		
			if (mysql_num_rows($result)<1)
			{
				$sql = "INSERT into illushun SET email='$email'";	
				mysql_query($sql);
			}	
			}
	}
	}
	
	if(isset($_SESSION['email']))
	{
		$email=$_SESSION['email'];
		mysql_select_db("cognizan_illu", $con);
		$sql = "SELECT * from illushun where email='$email'";		
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if($row['nick']!='')
		$has_nick=1;
		else if (isset($_POST['nick']))
		{
			$email=$_SESSION['email'];
			$nick=isset($_POST['nick']) ? mysql_real_escape_string($_POST['nick']) : '';
			$sql="UPDATE users SET nick='$nick' WHERE email='$email'";
			mysql_query($sql);
			$has_nick=1;
		}
		
		if($has_nick)
		{
			$email1 = $_SESSION['email'];
			$uid1 = uid();
			$ip1 = $_SERVER['REMOTE_ADDR'];
			$insert1 = mysql_query("UPDATE illushun SET uid ='$uid1', ip='$ip1' WHERE email='$email1'");
			setcookie("username",$uid1,time()+24*3600);
		
		
		header('Location:level.php');
		exit(0);
		}
		else
		{
			
			
		
		header('Location:nickname.php');
		}
	}
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Illushun v2.0</title>
<link href="illu.css" type="text/css" rel="stylesheet" />


</head>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29452698-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="illu">
<img src="imgs/header.png" />

</div>




<div id="logincon">

<div id="login">
<br />
<form action="index.php" method="post">
<table>
<tr>
<td>Email :</td><td><input type="text" name="email" /></td><tr>
<tr><td>Password :</td><td><input type="password" name="password" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="login" value=" Login " /></td></tr>
<tr><td colspan="2" align="center">Register on <a href="http://cognizance.org.in/">Cognizance'12</a> to play</td></tr>
<tr>
<td colspan="2" align="center" id="error"><?php if($invalid) echo $msg; ?>
</td>
</tr>
</table>
</form>
</div>
<br />
</div>
<div id="content1">
<div id="content">


It's really weird when  Indiana Jones sits in front of a computer. But that's  exactly what is  going to happen for the next two days. As we come up with some brain twisting questions, the hunters will have to travel some extra miles to reach the goal. Country's code-breakers are already scratching their heads. So, put on your thinking  caps and get ready for the wild ride, for the students of IIT Roorkee Saharanpur Campus present to you ILLUSHUN v2.0.<br />

BON VOYAGE.


</div>
</div>
<div id="copy">
All Rights Reserved &copy;Cognizance Evolution 2012
</div>







<div><a href="http://forum.cognizance.org.in/index.php" id="forum" target="_blank"></a></div>
<div><a href="rules.php" id="instructions" target="_blank"></a></div>
</body>
</html>