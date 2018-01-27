<?php
include('connect.php');
$query = mysql_query("SELECT * FROM illushun");
$total = mysql_num_rows($query);
$a = "LoggedOut";
$query2 = mysql_query("SELECT * FROM illushun WHERE uid!='$a'");
$playin = mysql_num_rows($query2);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Leaderboard</title>
<style type="text/css">
body
{
	color:#FFF;
	font-family:"Times New Roman", Times, serif;
}
table
{
	border-color:#FFF;

}
#title
{
	font-size:22px;
}
#name
{
	font-size:36px;
	font-variant:small-caps;
}
#num
{
	font-size:26px;
}
#list
{
	font-size:17px;
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
<br />
<table align="center" cellpadding="2" border="1" cellspacing="0" width="">
<tr><td colspan="4" align="center" id="name"><img src="imgs/cognilogo.png" /><img src="imgs/header.png" /></td></tr>
<tr height="50px"><td colspan="3" align="center" id="name">Leader Board</td></tr>
<tr height="50px"><td colspan="3" align="center" id="num">No. Of Users Playing : <?php echo $total;?></td></tr>
<tr align="center" id="title"><td>Rank</td><td>Nick Name</td><td>Level</td></tr>
<?php
$i = 1;
$query1 = mysql_query("SELECT * FROM illushun ORDER BY lvl DESC , lclear ASC");
while($qarray = mysql_fetch_array($query1))
{
?>

<tr align="center" id="list" height="30px"><td><?php echo $i;?></td><td><?php echo $qarray['nick'];?></td><td><?php echo $qarray['lvl'];?></td></tr>

<?php 

if($i == 500)
{
	break;
}
$i++;
}?>
<tr height="50px"><td colspan="3" align="center" id="num">No. Of Users Online : <?php echo $playin;?></td></tr>


</table>
</body>
</html>