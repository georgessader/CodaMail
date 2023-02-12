<?php

	include 'connect.php';
	session_start();

	$trash = "delete from emails where status='trashed' and id=".decrypt($_POST['ID'], 'Cyrine');

	if($connection->query($trash))
	{
		header("Location:Mailpage.php");
	}

?>