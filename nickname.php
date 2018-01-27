<?php 
session_start(); 
include("functions.php");
include("connect.php");

if(isset($_SESSION['email']))
	{
		$email=$_SESSION['email'];
		
		$sql = "SELECT * from illushun where email='$email'";		
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if($row['nick']!='')
		{
			$lvl = $row['lvl'];
			header('Location:$lvl.php');
			
		}
		elseif (isset($_POST['nick']))
		{
			$nick = strip_tags(filter_var(clean($_POST['nick']),FILTER_SANITIZE_STRING));
		$uid = uid();
		$ip = $_SERVER['REMOTE_ADDR'];
		date_default_timezone_set('Asia/Kolkata');
		$ftime = date("d/m/Y H:i:s");
		$lclear = date("d/m/Y H:i:s");
		setcookie("username",$uid,time()+24*3600);
		$insert = mysql_query("UPDATE illushun SET nick='$nick', ip='$ip', ftime='$ftime', lclear='$lclear', uid='$uid',lvl=1 WHERE email='$email'");
			header('Location:play.php');
			exit(0);
		}
		
		
		
	
?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Illushun v2.0</title>
<link href="nickname.css" type="text/css" rel="stylesheet" />
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
<form action="nickname.php" method="post">
<table cellpadding="0">
<tr>
<td>Nickname </td><td><input type="text" name="nick" /></td></tr>
<tr>
<td colspan="2" align="center">

</td>
</tr>
</table>
</form>
</div>
<br />
</div>
<div id="content1">
<div id="content">
Hello!
Give yourself a nick name and get started.
</div>
</div>
<div id="copy">
All Rights Reserved &copy;Cognizance Evolution 2012
</div>
</body>
<?php }
else
{
	include('notfound.php');
	
}


 ?>
</html>