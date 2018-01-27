<?php
include('connect.php');
$done = mysql_query("UPDATE illushun SET uid='LoggedOut'");
if($done){echo 1;}


?>