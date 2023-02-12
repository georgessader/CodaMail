<?php

	include 'connect.php';
	session_start();

	$archive = "update emails set status='archived' where id=".decrypt($_POST['ID'],'Cyrine');

	if($connection->query($archive))
	{
		header("Location:Mailpage.php");
	}

?>