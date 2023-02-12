<?php

	include 'connect.php';
	session_start();

	$trash = "update emails set status='trashed' where id=".decrypt($_POST['ID'],'Cyrine');

	if($connection->query($trash))
	{
		header("Location:Mailpage.php");
	}

?>