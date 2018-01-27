<style type="text/css">
table
{
	color:#FFF;

}
</style>
<?php
include('connect.php');?>
<table align="center" border="2" cellpadding="1" cellspacing="0" width="230px">
<tr><td colspan="3" align="center"><a href="leaderboard.php" target="_blank" id="leaderboard1"></a></td></tr>
<tr align="center"><td>Rank</td><td>Nick Name</td><td>Level</td></tr>
<?php
$board = mysql_query("SELECT * FROM illushun ORDER BY lvl DESC , lclear ASC");
$s = 1;
while($barray = mysql_fetch_array($board))
{
?>

<tr align="center"><td><?php echo $s;?></td><td><?php echo $barray['nick'];?></td><td><?php echo $barray['lvl'];?></td></tr>

<?php $s++;
if($s == 16)
{
break;

}
}?>

