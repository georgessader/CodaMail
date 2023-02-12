<?php

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
	$x = "@aub.com";
	// $a = "asd@aub.com";
	// echo EndsWith($a, $x);
	
	require 'connect.php';
	if($_POST['fName'] != '' && $_POST['lName'] != '' && $_POST['Email'] != '' && $_POST['pass'] != '' && $_POST['cpass'] != '' && $_POST['bday'] != '' && $_POST['nb'] != '' && $_POST['REmail'] != '' )
	{
		if(EndsWith($_POST['Email'],$x))
		{
			if($_POST['pass'] == $_POST['cpass'])
			{
				if(is_numeric($_POST['nb']) && strlen($_POST['nb']) == 8)
				{
					$Q = "INSERT INTO users(firstName,lastName, Email, Password, dateOfBirth, phoneNumber, recoveryEmail, registerDate) VALUES('".$_POST['fName']."','".$_POST['lName']."','".$_POST['Email']."',sha1('".$_POST['pass']."'),'".$_POST['bday']."','".$_POST['nb']."','".$_POST['REmail']."', CURRENT_TIMESTAMP)";
					if($connection ->query($Q))
					{
						header("Location:form.php");
					}
				}
				else
					header("Location:form.php?status=Please make sure to insert a valid Phone Number");
			}
			else
				header("Location:form.php?status=Please make sure to confirm your password");
		}
		else
			header("Location:form.php?status=Please insert a valid Email");
	}
	else
		header("Location:form.php?status=Please make sure to fill all the required field");


?>