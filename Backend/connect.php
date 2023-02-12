<?php

	$connection = new mysqli('localhost','root','','project');
	if($connection->connect_error)
	{
		echo "Error: ".$connection->connect_error;
	}
	 function encrypt($pt, $k)
	 {
	 	$method = "AES-256-CBC";
	 	$key = sha1($k);
	 	$iv = substr(sha1(mt_rand()), 0, 16);
	 	$ct = openssl_encrypt($pt, $method, $key, 0, $iv);
	 	return $iv.$ct;
	 }

	 function decrypt($ct, $k)
	 {
	 	$method = "AES-256-CBC";
	 	$key = sha1($k);
	 	$iv = substr($ct, 0, 16);
	 	$c = substr($ct,16);
	 	$pt = openssl_decrypt($c, $method, $key, 0, $iv);
	 	return $pt;
	 }
?>