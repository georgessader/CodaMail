<?php
	
	require 'connect.php';
	$eCheck = "select email from users where Email='".$_POST['Email']."'";
	$logIn = "select id,email from users where Email='".$_POST['Email']."' and Password=sha1('".$_POST['pass']."')";
	function EndsWith($haystack, $needle, $case=true)
	{
		$expectedPosition = strlen($haystack) - strlen($needle);
		if($case)
		{
			return strrpos($haystack, $needle, 0) == $expectedPosition;
		}
		else
		{
			return strripos($haystack, $needle, 0) == $expectedPosition;
		}
	}
	$x = "@codamail.com";
	// $a = "asd@aub.com";
	// echo EndsWith($a, $x);
	
	if($_POST['fName'] != '' && $_POST['lName'] != '' && $_POST['Email'] != '' && $_POST['pass'] != '' && $_POST['cpass'] != '' && $_POST['bday'] != '' && $_POST['nb'] != '' && $_POST['REmail'] != '' )
	{
		if(EndsWith($_POST['Email'],$x))
		{
			// if($r=$connection->query($eCheck))
			// {
			// 	if($r->num_rows=0)
			// 	{
					if($_POST['pass'] == $_POST['cpass'])
					{
						if(is_numeric($_POST['nb']) && strlen($_POST['nb']) == 8)
						{
							$Q = "INSERT INTO users(firstName,lastName, Email, Password, dateOfBirth, phoneNumber, recoveryEmail, registerDate) VALUES('".$_POST['fName']."','".$_POST['lName']."','".$_POST['Email']."',sha1('".$_POST['pass']."'),'".$_POST['bday']."','".$_POST['nb']."','".$_POST['REmail']."', CURRENT_TIMESTAMP)";
							if($connection ->query($Q))
							{
								if($R=$connection->query($logIn))
								{
									if($R->num_rows>0)
									{
										session_start();
										$rows = $R->fetch_assoc();
										$_SESSION['id'] = $rows['id'];
										header("Location:Mailpage.php");
									}
								}
							}
						}
						else
							header("Location:form.php?status=Please make sure to insert a valid Phone Number");
					}
					else
						header("Location:form.php?status=Please make sure to confirm your password");
			// 	}
			// 	else
			// 		header("Location:form.php?status=Please create another email");
			// }
		}
		else
			header("Location:form.php?status=Please make sure your email ends with @codamail.com");
	}
	else
		header("Location:form.php?status=Please make sure to fill all the required field");


?>