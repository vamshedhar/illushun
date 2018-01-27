<?php
session_start();
include('connect.php');
include('functions.php');
if(isset($_SESSION['email']))
{
	$email = $_SESSION['email'];
	$query = mysql_query("SELECT * FROM illushun WHERE email='$email'");
	$queryarray = mysql_fetch_array($query);
	
	$uid = $_COOKIE['username'];
	if($queryarray['uid'] == $uid)
	{
		if(isset($_POST['ans']))
		{
			$ans = ans($_POST['ans']);
		
			if($ans == "300c0587e47f0196a0502b72132fe09e")
			{
				if($queryarray['lvl'] == 6)
				{
				date_default_timezone_set('Asia/Kolkata');
				$clear = date("d/m/Y H:i:s");
				$update = mysql_query("UPDATE illushun SET lclear='$clear', lvl=7 WHERE email='$email'");
				}
			echo "<script type='text/javascript'>setTimeout(\"window.location = 'level7.php'\",0);</script>";
				
			}
			
			
		}
		
		
		
		$lvl = $queryarray['lvl'];
		if($lvl>=6)
		{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Level6</title>
<link href="level.css" type="text/css" rel="stylesheet" />
<style type="text/css">
#ques
{
	position:absolute;
	top:0px;
	left:15px;
	
}
#ans
{
	position:absolute;
	bottom:50px;
	left:245px;
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
<body bgcolor="#000000">
<?php include_once("analyticstracking.php") ?>
<div id="title"><img src="imgs/header.png" alt="Illushun v2.0" /></div>
<div id="logo"><img src="imgs/cognilogo.png" alt="Cognizance12" /></div>
<div id="left">

<?php include('leftbar.php');?>
</div>

<div id="main" align="center">
<div id="ques">
<img src="0/lkf.jpg" height="300" width="300" />
<img src="0/ioe.jpg" height="300" width="300" />
</div>
<div id="ans">
<form action="level6.php" method="post">
<input type="text" name="ans" width="200" />
</form>
<font color="#FFFFFF">Check source For hint!!!</font>

</div>
<!--Hint: Guys check Forums for hints!!!You will find many GiveAwayHints there!!!-->

</div>
<div id="fb">
*Hints
<a href="https://www.facebook.com/pages/EvolutionCognizance-2012/218054008287181" id="facebook" target="_blank"><img src="0/fb.png" height="50" width="50" /></a></div>
<div id="leaderboard">
<?php include('leadermin.php');?>
</div>
</body>
<?php

}
else
{include('notfound.php');}
}
else{echo "<script type='text/javascript'>setTimeout(\"window.location = 'wrong.php'\",0);</script>";}
}
else{echo "<script type='text/javascript'>setTimeout(\"window.location = 'wrong.php'\",0);</script>";}
?>
</html>