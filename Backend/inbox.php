<?php

	include 'connect.php';
	session_start();

	$normal = "update emails set status='normal' where id=".decrypt($_POST['ID'], 'Cyrine');

	if($connection->query($normal))
	{
		header("Location:Mailpage.php");
	}

?>