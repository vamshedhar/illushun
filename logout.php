<?php
include("connect.php");
include("functions.php");




session_start();
if(isset($_SESSION['email']))
{
	$email = $_SESSION['email'];
	$query = mysql_query("SELECT * FROM illushun WHERE email='$email'");
	$queryarray = mysql_fetch_array($query);
	
	$uid = $_COOKIE['username'];
	if($queryarray['uid'] == $uid)
	{
		if($queryarray['lvl'] == 24)
		{$invalid=1;
		$msg = "Game Completed!!! Wait for Results!!!!";
		}
	}
	
}
setcookie("username","NoMore",time()-24*3600);
$query=mysql_query("UPDATE illushun SET uid='LoggedOut' WHERE email='$_SESSION[email]'");
if(!$query){echo "error";}
session_destroy();

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Illushun v2.0 Logout</title>
<style type="text/css">
body
{
	background:url(imgs/backtest2.jpg);
	color:#FFF;
	font-size:16px;
}
#illu
{
	position:absolute;
	top:80px;
	left:450px;
	right:450px;
	}

#login
{
	margin:20px 20px 20px 20px;

}
#login1
{
	
	position:absolute;
	top:300px;
	left:530px;
	height::auto;
	width:400px;
	opacity:0.8;
	background:#000;
	border-radius:15px;
	-moz-border-radius:25px;
}
#copy
{
	position:absolute;
	top:600px;
	left:1050px;	
}

</style>
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

<br>
<div id="login1">
<div id="login">
<table border="0" align="center">
<tr>
<td align="center">
You were successfully logged out!!</td>
</tr>
<tr>
<td>
<a href="index.php"> Click Here</a> to Login Again!!!
</td>
</tr>
<?php 
if($invalid == 1)
{
	
	echo $msg;
	}
?>
</table>

</div>

</div>

<div id="copy">
All Rights Reserved &copy;Cognizance Evolution 2012
</div>


</body>
</html>