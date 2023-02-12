<?php

	include 'connect.php';
	$check= "select id,email from users where Email='".$_POST['email']."' and Password='".sha1($_POST['password'])."'";

	if($r=$connection->query($check))
	{
		if($r->num_rows>0)
		{
			session_start();
			$rows = $r->fetch_assoc();
			$_SESSION['id'] = $rows['id'];
			header("Location:home.html");
		}
		else
		{
			header("Location:login.php?status=Email or Password Incorrect");
		}
	}

?>