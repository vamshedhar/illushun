<?php

function clean($strng)
{
	return mysql_real_escape_string($strng);
}

function pass($p)
{
	return md5($p.'iloveyou');
}

function uid()	
{
	return md5(hash(sha256,uniqid(rand(),TRUE)));
}

function ans($a)
{
	return md5(hash(sha512,$a));	
}


?>