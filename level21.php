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
		
			if($ans == "b479c64c01530f9ac16f5a85ae34b971")
			{
				if($queryarray['lvl'] == 21)
				{
				date_default_timezone_set('Asia/Kolkata');
				$clear = date("d/m/Y H:i:s");
				$update = mysql_query("UPDATE illushun SET lclear='$clear', lvl=22 WHERE email='$email'");
				}
			echo "<script type='text/javascript'>setTimeout(\"window.location = 'level22.php'\",0);</script>";
				
			}
			
			
		}
		
		
		
		$lvl = $queryarray['lvl'];
		if($lvl>=21)
		{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Level-21</title>
<link href="level.css" type="text/css" rel="stylesheet" />
<style type="text/css">
#ques
{
	position:absolute;
	top:50px;
	left:75px;
	color:#060;
	font-size:24px;

	
}
#ans
{
	position:absolute;
	bottom:60px;
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
I am on top of a hill<br />
Where, in the past, witnessed a mysterious kill<br />
Victim was a magistrate<br />
and three guys were convicted for his unfortunate fate<br />
You may wonder, why this place<br />
has so much relation with this unsolved case<br />
coz it got its name<br />
from the name of the three suspects, what a shame!
</div>
<div id="ans">
<form action="level21.php" method="post">
<input type="text"  name="ans" width="200"/>
</form>


</div>
<!--Hint :
		
-->

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