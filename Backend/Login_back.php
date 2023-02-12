<?php

	include 'connect.php';
	$check= "select id,email from users where Email='".$_POST['email']."' and Password='".sha1($_POST['pass'])."'";
	if(isset($_POST['email']) && $_POST['pass'])
	{
		if($r=$connection->query($check))
		{
			if($r->num_rows>0)
			{
				session_start();
				$rows = $r->fetch_assoc();
				$_SESSION['id'] = $rows['id'];
				header("Location:Mailpage.php");
			}
			else
			{
				header("Location:signInP.php?status=Email or Password Incorrect");
			}
		}
	}
	else
	{
		header("Location:signInP.php?status=Please fill all required fields");
	}

?>