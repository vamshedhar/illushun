<?php

$con=mysql_connect("localhost","root","") or die('Cannot connect to the database because: ' . mysql_error());



$db_illu=mysql_select_db("cognizan_illu",$con); if(!$db_illu){ echo mysql_error();}


?>