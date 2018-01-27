<?php

//second page after the user logs in

//just prints the user statistics

include('functions.php');
include('connect.php');
if(!isset($_COOKIE["username"]))

{

	echo 0;

}

if(isset($_COOKIE["username"]))

{



	$uid=$_COOKIE["username"];

	include_once "functions.php"; 



	mysql_select_db("cognizan_illu", $con);
	

		$sql="SELECT * FROM illushun WHERE uid='$uid'";

		$res=mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res)>0)

		{
			
			$row=mysql_fetch_array($res);

			$q=$row['lvl'];
			if($q == 0)
			{
				$q++;
			}

		}


header('Location:level'.$q.'.php');

}

?>